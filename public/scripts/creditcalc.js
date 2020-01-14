(function ( $ ) {
 
    $.fn.creditCalculator = function( options ) {

        if(!this.length) return;

        var settings = $.extend({
            minAmount: 3000,
            maxAmount: 80000,
            stepAmount: 1000,
            initAmount: 9000,
            initMonth: 72,
            maxRate: 2500,

            amountBorders :  [
                {from:3000,  minMonth: 12, maxMonth: 84}, //106050
                {from:5000,  minMonth: 36, maxMonth: 84},
                {from:8000,  minMonth: 48, maxMonth: 84},
                {from:15000, minMonth: 48, maxMonth: 84},
                {from:20000, minMonth: 48, maxMonth: 120},
            ],
            
            termBorders :  [
                {from: 12, rate:6.95},
                {from: 60, rate:5.95},
                {from: 84, rate:4.95}
            ],
            
            gui : {
                form : 'form',
                slider : {
                    amount : '.slider-amount',
                    term : '.slider-term',
                },
                input : {
                    amount : '.input-amount',
                    term : '.input-term',
                    rate : '.input-rate',
                },
            },
            
            submit : null,
        }, options );
        
        var self = this;
        
        self.gui = {};
        self.data = {};

        
        self.initGui = function(guiSettings, gui) 
        {
            guiSettings = guiSettings || settings.gui
            gui = gui || self.gui;
            for(var key in guiSettings) {
                var guiSettingsItem = guiSettings[key];
                if(typeof guiSettingsItem === 'object') {
                    gui[key] = {};
                    self.initGui(guiSettingsItem, self.gui[key])
                } else {
                    gui[key] = self.find(guiSettingsItem);
                }
            }
        }
        
        self.initData = function()
        {
            self.data.amount = settings.initAmount;
            self.data.term = settings.initMonth;
        }

        self.init = function() {
            self.initGui();
            self.initData();

            self.gui.form.submit(function(e) {
                e.preventDefault();
                
                self.data.rate = self.getCurrentRateValue();
                for(var key in self.data) {
                    $(this).find('[name="'+ key +'"]').val(self.data[key]);
                }
                
                if(settings.submit) {
                    settings.submit(self.data)
                }

                return false;
            });

            self.gui.slider.amount.slider({
                min: settings.minAmount,
                max: settings.maxAmount,
                step: settings.stepAmount,
                value: settings.initAmount,
            }).on('slide', function( event ) {
//                if(event.value == settings.maxAmount){
//                    $('.calc.tipp').fadeIn();
//                }else{
//                    $('.calc.tipp').fadeOut();
//                }
                self.setBorders();
                self.changeField("amount", event.value);
                self.displayRate();
            });

            self.gui.slider.term.slider({
                min: self.getMinMonth(),
                max: self.getMaxMonth(),
                step: 6,
                value: settings.initMonth,
            }).on('slide', function( event ) {
                self.changeField("term", event.value, 'Monate');
                self.displayRate();
            });

            self.gui.input.amount.bind("click", function() {
                self.gui.input.amount.val(self.data.amount);
            });
            self.gui.input.term.bind("click", function() {
                self.gui.input.term.val(self.data.term);
            });

            self.gui.input.amount.bind("blur", function() {
                var val = self.gui.input.amount.val();
                if (!isNaN(val)) {
                    self.changeField("amount", val);
                    self.displayRate();
                }
            });
            self.gui.input.term.bind("blur", function() {
                var val = self.gui.input.term.val();
                if (!isNaN(val)) {
                    self.changeField("term", val, 'Monate');
                    self.displayRate();
                }
            });
            self.gui.slider.amount.trigger("slide");
        };
        
        self.refresh = function() {
            if (!isNaN(settings.initAmount)) {
                self.changeField("amount", settings.initAmount);
                self.displayRate();
            }
            if (!isNaN(settings.initMonth)) {
                self.changeField("term", settings.initMonth, 'Monate');
                self.displayRate();
            }
        };

        self.setBorders = function() {
            var min = self.getMinMonth(),
                max = self.getMaxMonth(),
                val = Math.min(self.data.term, max);

            self.gui.slider.term.slider('setAttribute', 'min', min);
            self.gui.slider.term.slider('setAttribute', 'max', max);
            self.gui.slider.term.slider('setValue', val);
            self.gui.slider.term.slider('refresh');

            self.gui.slider.term.trigger("slide");
            self.changeField("term", val, 'Monate');
            self.displayRate();
        };

        

        self.getCurrentRate = function() {
            var month = self.data.term;
            var rate;
            $(settings.termBorders).each(function(e,v) {
                if (month >= v.from) {
                    rate = v.rate;
                }
            });
            return rate;
        }


        self.getMinMonth = function () {
            var amount = self.data.amount;
            var min;
            $(settings.amountBorders).each(function(e,v) {
                if (amount >= v.from) {
                    min = v.minMonth;
                }
            });
            return min;
        };

        self.getMaxMonth = function() {
            var amount = self.data.amount;
            var max;
            $(settings.amountBorders).each(function(e,v) {
                if (amount >= v.from) {
                    max = v.maxMonth;
                }
            });
            return max;
        };

        self.getCurrentRateValue = function() {
            var rate = self.getCurrentRate() / 100,
                month = self.data.term,
                amount = self.data.amount;
            var result = Math.round(((((rate*(Math.pow((1+rate),(month/12))))/((Math.pow((1+rate),(month/12))-1)))*amount)/12)*100)/100;

            return result;
        };

        self.displayRate = function(rate){
            if(!self.data.term || !self.data.amount) return;

            rate = rate || self.getCurrentRateValue();

            self.gui.input.rate.val(self.formatNumber(rate, 2, ",", "." ));
            self.gui.input.rate.attr('readonly', true);
        };
        
        self.changeField = function(field, value, suffix) {
            if(!field || isNaN(value)) return;
            suffix = suffix || '';

            self.data[field] = value;
            self.gui.input[field].val(self.formatNumber(value, 0, ",", "." ) + (suffix != '' ? " "+suffix : ''));
            self.gui.slider[field].slider('setValue', value);
        };
        
        self.formatNumber = function(num,dig,dec,sep) {
            var x = [];
            var s = (num < 0 ? "-" : "");
            var num = Math.abs(num).toFixed(dig).split(".");
            var r = num[0].split("").reverse();
            for(var i=1;i<=r.length;i++){
                x.unshift(r[i-1]);
                if(i%3 == 0 && i != r.length) x.unshift(sep);
            }
            return s+x.join("")+(num[1]?dec+num[1]:"");
        };
        
        
        self.init();
        self.refresh();

        return self;
     };
 
}( jQuery ));
