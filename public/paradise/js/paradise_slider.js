/*
* Paradise Slider v4.0.0 (https://codecanyon.net/user/szthemes/portfolio)
* Copyright 2014-2018 The szthemes Authors
 */
;(function ($) {

    /*-----------------------------------------------------------------*/
    /* ANIMATE SLIDER CAPTION
    /* Demo Scripts for Bootstrap Carousel and Animate.css article on SitePoint by Maria Antonietta Perna
    /*-----------------------------------------------------------------*/
    "use strict";
    function doAnimations(elems) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elems.each(function () {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }
    //Variables on page load
    var $paradiseSlider = $('.carousel'),
        $firstAnimatingElems = $paradiseSlider.find('.carousel-item:first').find("[data-animation ^= 'animated']");
    //Initialize carousel
    $paradiseSlider.carousel();
    //Animate captions in first slide on page load
    doAnimations($firstAnimatingElems);
    //Other slides to be animated on carousel slide event
    $paradiseSlider.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });
	
    /*-----------------------------------------------------------------*/
    /* CAROUSEL SLIDING DURATION
    /*-----------------------------------------------------------------*/
    var nameSlider = $('.carousel');
    var lengthSlider = nameSlider.length;

    for(var i=0; i < lengthSlider; i++){
      $.fn.carousel.Constructor.TRANSITION_DURATION = 9999999;
      var sliderDurationIndex = nameSlider.eq(i);
      var sliderDurationVal = sliderDurationIndex.data('duration');
      var sliderDurationAttr = $('[data-duration=' + sliderDurationVal + '] > .carousel-inner > .carousel-item');
        $(sliderDurationAttr).each(function(){
          $(this).css({
            '-webkit-transition-duration': sliderDurationVal + 'ms',
            '-moz-transition-duration': sliderDurationVal + 'ms',
            'transition-duration': sliderDurationVal + 'ms'
          });
        });
    }

    /*-----------------------------------------------------------------*/
    /* CAROUSEL MOUSE WHEEL
    /*-----------------------------------------------------------------*/
    var mouseWheelY = $(".carousel").find('[class=mouse_wheel_y]');
    var mouseWheelXY = $(".carousel").find('[class=mouse_wheel_xy]');

    if(mouseWheelXY){
        $('.mouse_wheel_xy').bind('mousewheel', function(e){
            if(e.originalEvent.wheelDelta /120 > 0) {
                $(this).carousel('prev');
            }else {
                $(this).carousel('next');
            }
        });
    }if(mouseWheelY){
        $('.mouse_wheel_y').bind('mousewheel', function(e){
            if(e.originalEvent.wheelDelta /120 > 0) {
                $(this).carousel('next');
            }
        });
    }

    /*-----------------------------------------------------------------*/
    /* MOBILE SWIPE
    /*-----------------------------------------------------------------*/
    //Enable swiping...
    var verticalSwipe = $(".carousel").find('[class=swipe_y]');
    var horizontalSwipe = $(".carousel").find('[class=swipe_x]');

    if(verticalSwipe){
      $(".swipe_y .carousel-inner").swipe({
        //Generic swipe handler for vertical directions
        swipeUp: function (event, direction, distance, duration, fingerCount) {
          $(this).parent().carousel('next');
        },
        swipeDown: function () {
          $(this).parent().carousel('prev');
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold: 0
      });
    }if(horizontalSwipe){
      $(".swipe_x .carousel-inner").swipe({
        //Generic swipe handler for horizontal directions
        swipeLeft: function (event, direction, distance, duration, fingerCount) {
          $(this).parent().carousel('next');
        },
        swipeRight: function () {
          $(this).parent().carousel('prev');
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold: 0
      });
    }

    /*-----------------------------------------------------------------*/
    /* Thumbnails Indicators Scroll
    /*-----------------------------------------------------------------*/
    "use strict";
    var indicatorPositionY = 0;
    var indicatorPositionX = 0;
    var thumbnailScrollY = $(".carousel").find('[class=thumb_scroll_y]');
    var thumbnailScrollX = $(".carousel").find('[class=thumb_scroll_x]');

    if(thumbnailScrollY){
      $('.thumb_scroll_y').on('slid.bs.carousel', function(){
        var heightEstimate = -1 * $(".thumb_scroll_y .carousel-indicators li:first").position().top + $(".thumb_scroll_y .carousel-indicators li:last").position().top + $(".thumb_scroll_y .carousel-indicators li:last").height();
        var newIndicatorPositionY = $(".thumb_scroll_y .carousel-indicators li.active").position().top + $(".thumb_scroll_y .carousel-indicators li.active").height() / 1;
        var toScrollY = newIndicatorPositionY + indicatorPositionY;
        var adjustedScrollY = toScrollY - ($(".thumb_scroll_y .carousel-indicators").height() / 1);
        if (adjustedScrollY < 0)
          adjustedScrollY = 0;
        if (adjustedScrollY > heightEstimate - $(".thumb_scroll_y .carousel-indicators").height())
          adjustedScrollY = heightEstimate - $(".thumb_scroll_y .carousel-indicators").height();
        $('.thumb_scroll_y .carousel-indicators').animate({ scrollTop: adjustedScrollY }, 800);
          indicatorPositionY = adjustedScrollY;
      });
    } if(thumbnailScrollX){
      $('.thumb_scroll_x').on('slid.bs.carousel', function(){
        var widthEstimate = -1 * $(".thumb_scroll_x .carousel-indicators li:first").position().left + $(".thumb_scroll_x .carousel-indicators li:last").position().left + $(".thumb_scroll_x .carousel-indicators li:last").width();
        var newIndicatorPositionX = $(".thumb_scroll_x .carousel-indicators li.active").position().left + $(".thumb_scroll_x .carousel-indicators li.active").width() / 1;
        var toScrollX = newIndicatorPositionX + indicatorPositionX;
        var adjustedScrollX = toScrollX - ($(".thumb_scroll_x .carousel-indicators").width() / 1);
        if (adjustedScrollX < 0)
          adjustedScrollX = 0;
        if (adjustedScrollX > widthEstimate - $(".thumb_scroll_x .carousel-indicators").width())
          adjustedScrollX = widthEstimate - $(".thumb_scroll_x .carousel-indicators").width();
        $('.thumb_scroll_x .carousel-indicators').animate({ scrollLeft: adjustedScrollX }, 800);
          indicatorPositionX = adjustedScrollX;
      });
    }

    /*-----------------------------------------------------------------*/
    /* On Class Change Triggering Sliding Effects For Columns Layouts
    /*-----------------------------------------------------------------*/
    $(nameSlider).each(function(){
      var $this = $(this);
      var colAttrCheck = $this[0].hasAttribute('data-column');
      if(colAttrCheck == true){
        //A closure function that run when classes change dynamically
        (function(){
          var originalAddClassMethod = jQuery.fn.addClass;
          jQuery.fn.addClass = function(){
            var result = originalAddClassMethod.apply( this, arguments );
            //Trigger a custom event that is using below
            jQuery(this).trigger('slideIsChanging');
            return result;
          }
        })();
        //A function that run on document ready and when we resize the browser
        function colMediaQuery(){
          //Slider's Ids
          var sliderId = $this.attr('id');
          //Find carousel-item elements
          var findCarouselItems = $this.find('.carousel-item');
          //Length of carousel-item
          var carouselItemLength = $(findCarouselItems).length;
          //@media (min-width: 1201px)
          var colAttrVal = $this.attr('data-column');
          //@media (min-width: 993px) and (max-width: 1200px)
          var m1200AttrVal = $this.attr('data-m1200');
          var m1200AttrCheck = $this[0].hasAttribute('data-m1200');
          //@media (min-width: 769px) and (max-width: 992px)
          var m992AttrVal = $this.attr('data-m992');
          var m992AttrCheck = $this[0].hasAttribute('data-m992');
          //@media (min-width: 577px) and (max-width: 768px)
          var m768AttrVal = $this.attr('data-m768');
          var m768AttrCheck = $this[0].hasAttribute('data-m768');
          //@media (max-width: 576px)
          var m576AttrVal = $this.attr('data-m576');
          var m576AttrCheck = $this[0].hasAttribute('data-m576');
		  function detectViewSize(atrChk,size,width,attr){
            $('#' + sliderId).css({'display': 'block'});
            if(atrChk == true){
              var colAtrVal = size;
            }else{
              var colAtrVal = colAttrVal;
            }
            if(colAtrVal !== '' && colAtrVal > 0 && colAtrVal <= carouselItemLength){
              if(window.matchMedia(width).matches){
                $(findCarouselItems).each(function(){
                  var thisItem = $(this);
                  thisItem.find('.cloneditems').remove();
                  for(var i=1; i < colAtrVal; i++){
                    thisItem = thisItem.next();
                    // wrap around if at end of item collection
                    if(!thisItem.length){
                      thisItem = $(this).siblings(':first');
                    }
                    thisItem.children(':first-child').children(':first-child').clone().addClass('cloneditem-'+(i) + ' cloneditems').appendTo($(this).children(':first-child'));
                  }
                });
                var colAtrValDivide = 100/colAtrVal;
                var colAtrValTranslate = colAtrValDivide + '%';
                //Code of trigger that is using above
                $(findCarouselItems).on('slideIsChanging', function(){
                  $this.find('.active.carousel-item-left, .carousel-item-prev').css({
                    '-webkit-transform': 'translateX(-' + colAtrValTranslate + ')',
                    'transform': 'translateX(-' + colAtrValTranslate + ')',
                    '-webkit-transform': '-webkit-translate3d(-' + colAtrValTranslate + ',0,0)',
                    'transform': 'translate3d(-' + colAtrValTranslate + ',0,0)'
                  });
                  $this.find('.carousel-item-next, .active.carousel-item-right').css({
                    '-webkit-transform': 'translateX(' + colAtrValTranslate + ')',
                    'transform': 'translateX(' + colAtrValTranslate + ')',
                    '-webkit-transform': '-webkit-translate3d(' + colAtrValTranslate + ',0,0)',
                    'transform': 'translate3d(' + colAtrValTranslate + ',0,0)'
                  });
                  $this.find('.carousel-item-next.carousel-item-left, .carousel-item-prev.carousel-item-right').css({
                    '-webkit-transform': 'translateX(0)',
                    'transform': 'translateX(0)',
                    '-webkit-transform': '-webkit-translate3d(0,0,0)',
                    'transform': 'translate3d(0,0,0)'
                  });
                });
              }
            }else{
              var alertTxtCol = 'In Slider Id : #' + sliderId;
              alertTxtCol += '\n';
              alertTxtCol += 'You are assigning the value (' + colAtrVal + ') to the (data-' + attr + ') attribute. Which is greater than numbers of carousel-item those you are creating (' + carouselItemLength + ')';
              alertTxtCol += '\n\n';
              alertTxtCol += 'Please make sure the value of (data-' + attr + ') should be <= to numbers of carousel-item (' + carouselItemLength + ').';
              alertTxtCol += '\n\n';
              alertTxtCol += 'Note : The values should not be 0 or empty And also (Positive Integers only)';
              alert(alertTxtCol);
              $('#' + sliderId).css({'display': 'none'});
            }
          }
          detectViewSize(colAttrCheck,colAttrVal,'(min-width: 1201px)','column');
          detectViewSize(m1200AttrCheck,m1200AttrVal,'(min-width: 993px) and (max-width: 1200px)','m1200');
          detectViewSize(m992AttrCheck,m992AttrVal,'(min-width: 769px) and (max-width: 992px)','m992');
          detectViewSize(m768AttrCheck,m768AttrVal,'(min-width: 577px) and (max-width: 768px)','m768');
          detectViewSize(m576AttrCheck,m576AttrVal,'(max-width: 576px)','m576');
        }; //Ending colMediaQuery();

        //Initializing media queries function on page load
        colMediaQuery();

        //Run media queries function on page resizing
        $(window).resize(function(){
          clearTimeout($this.id);
          $this.id = setTimeout(colMediaQuery, 100);
        });
      }
    });

    /*-----------------------------------------------------------------*/
    /* VIDEO PAUSING ON SLIDE
    /*-----------------------------------------------------------------*/
    //It will work on .pauseVideo class only
    $(".pauseVideo").on('slide.bs.carousel', function () {
      $("video").each(function(){
        this.pause();
      });
    });

    /*-----------------------------------------------------------------*/
    /* YOUTUBE, VIMEO VIDEO PAUSING ON SLIDE
    /*-----------------------------------------------------------------*/
    //It will work on .onlinePauseVideo class only
    $(".onlinePauseVideo").on('slide.bs.carousel', function (e) {
      var $psiFrames = $(e.target).find("iframe");
      $psiFrames.each(function(index, iframe){
        $(iframe).attr("src", $(iframe).attr("src"));
      });
    });

    /*-----------------------------------------------------------------*/
    /* FULL SCREEN OPTION
    /*-----------------------------------------------------------------*/
    var $ps_item = $('.carousel.ps_full_screen > .carousel-inner > .carousel-item'); 
    var $ps_Height = $(window).height();
    $ps_item.eq(0).addClass('active');
    $ps_item.height($ps_Height); 
    $ps_item.addClass('ps_full_s');
    $('.carousel.ps_full_screen > .carousel-inner > .carousel-item > img').each(function() {
      var $src = $(this).attr('src');
      $(this).parent().css({
        'background-image' : 'url(' + $src + ')'
      });
      $(this).remove();
    });
    $(window).on('resize', function (){
      $ps_Height = $(window).height();
      $ps_item.height($ps_Height);
    });
	
	

})(jQuery);