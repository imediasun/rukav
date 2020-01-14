'use strict';

$(document).ready(function () {
    //bootstrap select
//    $('.selectpicker').selectpicker({
////    style: 'btn-info',
////    size: 4
//    });


    // enable tooltips
    $('[data-toggle="tooltip"]').each(function() {
        $(this).data('default-title', $(this).attr('title'));
    });
    $('[data-toggle="tooltip"]').tooltip({
        container: '#content-form',
        html: true,
        placement: 'top',
        trigger: 'hover',
    });

    //force numbers in inputs
    function forceNumericInputValue (e) {
        var fieldValue = $.trim($(this).val().replace(/\D+/g, ''));
        var caretPosition = {start : this.selectionStart, end : this.selectionEnd}; //remember caret position
        $(this).val(fieldValue);
        this.setSelectionRange(caretPosition.start, caretPosition.end); // restore caret position
    }
    $(document).on('keydown', '.forced-numeric',function (e) {
        forceNumericInputValue.call(this);

        if (
            // Allow: backspace, delete, tab, escape, enter and .
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A, Ctrl+R, Command+R
        ((e.keyCode === 65 || e.keyCode === 82) && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40))
        {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $(document).on('change onkeypress', '.forced-numeric', forceNumericInputValue);


    function forceNumericAndLettersInputValue (e) {
        var fieldValue = $.trim($(this).val().replace(/[^A-Za-z0-9]+/g, ''));
        var caretPosition = {start : this.selectionStart, end : this.selectionEnd}; //remember caret position
        $(this).val(fieldValue);
        this.setSelectionRange(caretPosition.start, caretPosition.end); // restore caret position
    }
    $(document).on('keydown', '.forced-numeric-and-letters', function (e) {
        forceNumericAndLettersInputValue.call(this);

        if (
            // Allow: backspace, delete, tab, escape, enter and .
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A, Command+A, Ctrl+R, Command+R
        ((e.keyCode === 65 || e.keyCode === 82) && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40))
        {
            // let it happen, don't do anything
            return;
        }

        // Ensure that it is a number or letter and stop the keypress
        if ((e.shiftKey && (e.keyCode >= 48 && e.keyCode <= 57))) {
            e.preventDefault();
        }
    });
    $(document).on('change onkeypress', '.forced-numeric-and-letters', forceNumericAndLettersInputValue);


    function forceCapitalLettersInputValue (e) {
        var fieldValue = $.trim($(this).val().toUpperCase());
        var caretPosition = {start : this.selectionStart, end : this.selectionEnd}; //remember caret position
        $(this).val(fieldValue);
        this.setSelectionRange(caretPosition.start, caretPosition.end); // restore caret position
    }
    $(document).on('keydown', '.forced-capital-letters', function (e) {
        forceCapitalLettersInputValue.call(this);
    });
    $(document).on('change onkeypress', '.forced-capital-letters', forceCapitalLettersInputValue);

    // data sliders
    $('.widget-calculator input.slider').slider({
        tooltip: 'hide',
        handle: 'custom'
    });

    /* Toggle blocks */
    $(document).on('change', '.toggle-control', function () {

        var controlName = $(this).attr('id');
        var controlValue = $(this).val();

        // if element value will toggle blocks avaiting for it
        $('.selected-by-option[data-control="' + controlName + '"]').each(function () {

            //return if inside hidden parent
            if($(this).parents('.hidden').length > 0) return;

            var compareOperator = $(this).data('control-value-operator');
            compareOperator = compareOperator || 'eq';

            var compareValue = $(this).data('control-value');
            var isShown = true;
            switch(compareOperator) {
                case 'eq' :
                    isShown = (controlValue == compareValue);
                    break;
                case 'neq' :
                    isShown = (controlValue != compareValue);
                    break;
                case 'more' :
                    isShown = (controlValue > parseFloat(compareValue));
                    break;
                case 'less' :
                    isShown = (controlValue < parseFloat(compareValue));
                    break;
                case 'in' :
                    var compareValues = compareValue.split(',').map(function(item) { return item.trim(); });
                    isShown = (compareValues.indexOf(controlValue) != -1);
                    break;
                case 'nin' :
                    var compareValues = compareValue.split(',').map(function(item) { return item.trim(); });
                    isShown = (compareValues.indexOf(controlValue) == -1);
                    break;
                default : break;
            }
            console.log(controlName, controlValue, compareValue, compareOperator, isShown);
            var isHidden = !isShown;
            $(this).toggleClass('hidden', isHidden);

            //toogle validation for all child elements
            $(this)
                .find( "input, select, textarea, [contenteditable]" )
                .not( ":submit, :reset, :image, :disabled" )
                .toggleClass('ignore-validation', isHidden)
                .trigger('change');

            $(this).find('.glyphicon').tooltip('hide');

        });

    });
    $('.toggle-control').trigger('change');

    //error container
    $(document).on('click', '.error-container, .success-container', function () {
        $(this).fadeOut('slow');
    });


    /* Validator */
    var invalidFields = [];
    var validationGeneralErrorText = 'Fehler! Bitte korrigieren oder erg&auml;nzen Sie Ihre Angaben in den gekennzeichneten Feldern!';

    console.log(999)
    var response
    $.validator.addMethod(
        "checkIban",
        function(value, element) {
            console.log("uniqueUserName");
            $.ajax({
                type: "POST",
                url: creditFormUrls.checkIban,
                data: {iban:value},
                async:false,
                dataType:"json",
                success: function(msg)
                {
                    console.log('msg=>',msg);
                    //If username exists, set response to true
                    response = ( msg == true ) ? true : false;console.log('r1=>',response);

                }
            });
            console.log('r2=>',response);
            window.validationGeneralErrorText = 'Bitte geben Sie eine gültige IBAN ein';
            return response;
        },
        "Bitte geben Sie eine gГјltige IBAN ein"
    );






    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);

            if(element!=='item[iban]'){
                return this.optional(element) || re.test(value);}
        },
        validationGeneralErrorText
    );

    $.validator.setDefaults({
        ignore : ".ignore-validation",
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error').addClass('has-feedback');
            $(element).closest('.form-group').find('.glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');

            var elementId = $(element).attr('id');

            //show general error
            var errorContainer =  $(element).closest('form').find('.error-container');
            console.log('elem',element)
            if(element.id=='iban'){
                errorContainer.html(window.validationGeneralErrorText);
            }
            else{errorContainer.html(validationGeneralErrorText);}

            errorContainer.show();
            //add invalid field to a list
            if(invalidFields.indexOf(elementId) == -1) invalidFields.push(elementId);
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success').addClass('has-feedback');
            $(element).closest('.form-group').find('.glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');

            //update tooltip title to default
            var elementId = $(element).attr('id');
            var tooltip = $(element).closest('.form-group').find('label[for="'+ elementId +'"]').find('.glyphicon-info-sign');
            if(!tooltip.length) {
                tooltip = $(element).closest('.form-group:has(.glyphicon-info-sign)').find('.glyphicon-info-sign');
            }
            if(!tooltip.length) return;


            //remove current elemet from tooltip data
            var tooltipErrorElements = tooltip.data('errorElement', []);
            var tooltipErrorElements = tooltip.data('errorElements');
            if(!tooltipErrorElements) tooltipErrorElements = [];
            var tooltipErrorElementIndex = tooltipErrorElements.indexOf(elementId)
            if(tooltipErrorElementIndex !== -1) {
                tooltipErrorElements.splice(tooltipErrorElementIndex, 1);
            }
            tooltip.data('errorElements', tooltipErrorElements);

            //return if there is any error elements left
            if(tooltipErrorElements.length) return;

            //hide tooltip
            tooltip.tooltip('hide');
            tooltip.attr('title', tooltip.data('default-title'));
            tooltip.tooltip('fixTitle');

            //remove valid field from invalid list
            var invalidFieldIndex = invalidFields.indexOf(elementId)
            if(invalidFieldIndex != -1) invalidFields.splice(invalidFieldIndex, 1);
            //hide general error if no more errors present
            if(!invalidFields.length) {
                $(element).closest('form').find('.error-container').hide();
            }
        },
        onfocusout: function(element) {
            // "eager" validation
            this.element(element);
        },

        errorPlacement: function(error, element) {
            if(!element.length) return;

            var elementId = element.attr('id');
            if(!elementId) return;

            var tooltip = $(element).closest('.form-group').find('label[for="'+ elementId +'"]').find('.glyphicon-info-sign');
            if(!tooltip.length) {
                tooltip = $(element).closest('.form-group:has(.glyphicon-info-sign)').find('.glyphicon-info-sign');
            }
            if(!tooltip.length) return;
            console.log('errorPlacement', elementId, error.html(), tooltip[0]);

            var errorHtml = error.html();

            //add current elemet to tooltip data
            var tooltipErrorElements = tooltip.data('errorElements');
            if(!tooltipErrorElements) tooltipErrorElements = [];
            if(tooltipErrorElements.indexOf(elementId) === -1) {
                tooltipErrorElements.push(elementId);
                tooltip.data('errorElements', tooltipErrorElements);
            }

            //show tooltip
            tooltip.attr('title', errorHtml);
            tooltip.tooltip('fixTitle');
            if(element.attr('id')!=='iban'){
                tooltip.tooltip('show');
            }

        },
//        debug:true,
    });

    //on element deselect set it for revalidation
    $(document).on('blur', 'input, select, textarea, [contenteditable]', function () {
        if($(this).is(':submit, :reset, :image, :disabled')) return;
        var form = $(this).closest('form');

        form.validate({

            rules: {
                "item[iban]": {
                    checkIban: true
                },
            },
            messages: {

                /*   "item[iban]": {
                 checkIban: "Bitte geben Sie eine gültige IBAN ein"
                 } */

            }

        });

        if(!form.length) return;
        var validator = form.data("validator");
        if(!validator) return;

        if(this.value.length){
            validator.element(this);
        };
    });

    //update fields to contain only correct date possible
    $(document).on('change', ".credicom-date-picker select", function() {
        var container = $(this).closest('.credicom-date-picker');
        var dateDom = {
            day : container.find('.credicom-date-picker-day'),
            month : container.find('.credicom-date-picker-month'),
            year : container.find('.credicom-date-picker-year'),
        };
        var dateValue = {
            day : dateDom.day.val(),
            month :  dateDom.month.val(),
            year :  dateDom.year.val(),
        };

        if(!dateValue.day || !dateValue.month || !dateValue.year) return;

//        var date = new Date(dateValue.year +'-'+ dateValue.month +'-'+ dateValue.day);
        var dateString = new Date(dateValue.year, dateValue.month - 1, dateValue.day).toString();
        var date = new Date(dateString);

        //force correct date
        if(date.getFullYear() != dateValue.year) dateDom.year.val(date.getFullYear());
        if(date.getMonth() != (dateValue.month - 1)) dateDom.month.val(date.getMonth()+1);
        if(date.getDate() != dateValue.day) dateDom.day.val(date.getDate());
    });


    function creditFormValidate(form)
    {

        //reset tooltips
        form.find('[data-toggle="tooltip"]').each(function() {
            $(this).data('errorElements', []);
        });

        if(!form.data("validator")) form.validate();

        var validator = form.data("validator");

        var errorContainer = form.find('.error-container');
        var successContainer = form.find('.success-container');
        errorContainer.hide();
        successContainer.hide();
//form.data("validator").elements().each(function(index, element) {
//    console.log("'"+$(element).attr('id')+"' => '"+$(element).val()+"',");
//});


        var result = form.valid();
        console.log('result=>',result)
        if(result) {
            //validate and save form data via ajax
            $.ajax({
                type: "POST",
                url: creditFormUrls.ajaxSubmit,
                data: form.serialize(),
                async: false,
                dataType: 'json',
                success: function(response) {
                    console.log('response=>',response);

                    if(response.switchSubForm) {
                        $('a[href="#'+ response.switchSubForm +'"]').tab('show');
                        if(response.location) {
                            window.location = response.location;
                        }
                    }

                    result = response.success;
                    if(!result) {
                        console.log('error');
                        console.log($('.ibanbic').find('.form-group').attr('class'))
                        window.erriban=true

                        var errors = {
                            text : [],
                            elements : {}
                        };

                        for(var elementId in response.errors) {
                            var error = response.errors[elementId];

                            var element = form.find('#'+elementId);
                            if(!element.length) {
                                errors.text.push(error);
                                continue;
                            }

                            var tooltip = element.closest('.form-group').find('label[for="'+ elementId +'"]').find('.glyphicon-info-sign');
                            if(!tooltip.length) {
                                tooltip = element.closest('.form-group:has(.glyphicon-info-sign)').find('.glyphicon-info-sign');
                            }
                            if(!tooltip.length) {
                                errors.text.push(error);
                            } else {
                                var callback = function() { this.tooltip('show'); };
                                window.setTimeout(callback.bind(tooltip), 200);
                            }

                            errors.elements[element.attr('name')] = error;
                        }

                        validator.showErrors(errors.elements);

                        if(errors.text.length) {
                            errorContainer.html(errors.text.join('<br/>'));
                            errorContainer.show();
                        }
                    } else {
                        var message = response.message || null;
                        if(message) {
                            successContainer.html(message);
                            successContainer.show();
                        }
                    }
                }
            });
        }
        return result;
    }

    function creditFormShowNext(tab) {
        tab = tab || null;

        if($('#betrag').val() < 1000) return false; //do not switch

        if(!tab) {
            var element = $('.nav-tabs > .active').next('li').find('a');
            if(!element.length) {
                console.warn('No tabs after this one');
                return;
            }
            tab = element.attr("href").replace('#', '');
        }

        creditFormsSaved[tab] = false;

        var index = creditFormsOrder.indexOf(tab);


        //check that previous forms are valid
        for(var i in creditFormsOrder) {
            var formName = creditFormsOrder[i];


            if(i >= index) {
                //mark "next" form as not saved
                creditFormsSaved[formName] = false;
                //hide tooltips for "next" forms
                $('.tab-pane[id="'+ formName +'"] form').find('[data-toggle="tooltip"]').tooltip('hide');
                continue;
            }

            if(creditFormsSaved[formName]) continue; //skipped saved forms

            var form = $('.tab-pane[id="'+ formName +'"] form');
            if(creditFormValidate(form)) {
                creditFormsSaved[formName] = true;
            } else {
                //report errors
                $('a[href="#'+ formName +'"]').tab('show');
                return false;
            }
        }

        //add validator for current tab, if there is none
        var form = $('.tab-pane[id="'+ tab +'"] form');
        if(!form.data("validator")) form.validate();

        return true;
    }

    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var target = $(e.target).attr("href").replace('#', '');
        var result = creditFormShowNext(target);
        if(!result) e.preventDefault();
        return result;
    });

    $('form[data-toggle="validator"]').validate();

    $(document).on('click', '.creditform-previous', function(event) {
        event.preventDefault();
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        return false;
    });

    $(document).on('click', '.creditform-next', function(event) {
        event.preventDefault();
        $('.nav-tabs > .active').next('li').find('a').trigger('click');

        return false;
    });
    $(document).on('click', '.creditform-submit', function(event) {
        console.log('popali');
        event.preventDefault();

        var form = $('.tab-pane.active form');
        if(creditFormValidate(form)) {
            var redirectUrl = $(this).data('url') ||  creditFormUrls.result;
            //redirect to results
            //console.log(redirectUrl);
            window.location = redirectUrl;
        }

        return false;
    });
    $(document).on('click', '.freecreditform-submit', function(event) {
        event.preventDefault();

        var form = $('.tab-pane.active form');
        if(!form.valid()) {
            return;
        }
        form.submit();

        return false;
    });
    function explode(event){

    }


    $(document).on('click', '.creditform-edit-submit', function(event) {




        event.preventDefault();

        var form = $('.tab-pane.active form');

        if(creditFormValidate(form)) {
            $('.hide-on-valid-form').hide();
        }
        else{
            if($('select[name="item[bank_account_type]"] option:selected').val()=='ibanbic'){
                console.log('IBANbic')
            }
            else{
                console.log('KONTOblz')
                $('input[name="item[kto]"]').parent('div').removeClass('has-success').addClass('has-error')
                $('input[name="item[blz]"]').parent('div').removeClass('has-success').addClass('has-error')
            }

        }



        return false;
    });


    //credit calc
    $('#credit-calcutator').creditCalculator({
        submit : function(data) {

            var postData = {
                item : {
                    betrag : data.amount,
                    rate: data.rate,
                }
            };

            $.ajax({
                type: "POST",
                url: '/kreditanfrage-update.ajax',
                data: postData,
                dataType: 'json',
                success: function(response) {
                    var success = response.success;
                    if(!success) return;

                    window.location = '/kreditanfrage';
                },

            });
        }
    });

});