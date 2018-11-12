/**
 * Auto Plus
 *
 * This file contains all template JS functions
 *
 * @package Auto Plus
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------

 * 01 - Owl Carousel
          - Home Slider    
          - Work Gallery Slider
          - Testimonials Slider    
          - Clients Slider    
 * 02 - Video Play
 * 03 - Smooth Scroll
 * 04 - Mailchimp Form
 * 05 - Popup Dialog
 * 06 - Navigation 
 * 07 - Datepicker
 * 08 - Facts Count 
 * 09 - Event Countdown 
 * 10 - Progress Bar 
 * 11 - Quantity Increase Decrease
 * 12 - Price Slider / Filter
 * 13 - Product Zoom 
 * 14 - Dropdown Select
 * 15 - Dropdown Values
 * 16 - Preloader

--------------------------------------------------------------*/
(function($) {
  "use strict";

// Owl Carousel 

    // Home Slider    
      $("#home-slider").owlCarousel({
      loop: true,
      items: 1,
      dots: false,
      nav: true,
      autoplayTimeout: 2500,
      smartSpeed: 2000,
      autoHeight: false,
      touchDrag: true,
      mouseDrag: true,
      margin: 0,
      autoplay: true,
      slideSpeed: 600,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
            items: 1,
            nav: false,
            dots: false,
        },
        600: {
            items: 1,
            nav: false,
            dots: false,
        },
        768: {
            items: 1,
            nav: true,
        },
        1100: {
            items: 1,
            nav: true,
        }
      }
    });

    // Work Gallery Slider
    $("#work-gallery-slider").owlCarousel({
      loop: true,
      items: 4,
      dots: false,
      nav: true,
      autoplayTimeout: 2500,
      smartSpeed: 2000,
      autoHeight: false,
      touchDrag: true,
      mouseDrag: true,
      margin: 30,
      autoplay: true,
      slideSpeed: 300,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
            items: 1,
            nav: false,
            dots: false,
        },
        600: {
            items: 2,
            nav: false,
            dots: false,
        },
        768: {
            items: 3,
            nav: true,
        },
        1100: {
            items: 4,
            nav: true,
        }
      }
    });

    // Testimonials Slider    
    $("#testimonials-slider").owlCarousel({
      loop: true,
      items: 1,
      dots: true,
      nav: false,
      autoplayTimeout: 2500,
      smartSpeed: 2000,
      autoHeight: false,
      touchDrag: true,
      mouseDrag: true,
      margin: 0,
      autoplay: true,
      slideSpeed: 600,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
            items: 1,
            nav: false,
            dots: false,
        },
        600: {
            items: 1,
            nav: false,
            dots: false,
        },
        768: {
            items: 1,
            nav: false,
            dots: true,
        },
        1100: {
            items: 1,
            nav: false,
            dots: true,
        }
      }
    });
    
    // Clients Slider    
    $("#client-slider").owlCarousel({
      loop: true,
      items: 6,
      dots: false,
      nav: false,
      autoplayTimeout: 2500,
      smartSpeed: 2000,
      autoHeight: false,
      touchDrag: true,
      mouseDrag: true,
      margin: 0,
      autoplay: true,
      slideSpeed: 600,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
            items: 1,
            nav: false,
            dots: false,
        },
        600: {
            items: 4,
            nav: false,
            dots: false,
        },
        768: {
            items: 4,
            nav: false,
            dots: false,
        },
        1100: {
            items: 6,
            nav: false,
            dots: false,
        }
      }
    });

//Video Play     
    $('.btn-video-play').on('click',function() {
      $('.video-item .video-preview').append(video_url);
      $(this).hide();
    });     

// Smooth Scroll
    smoothScroll.init();
    
// Mailchimp Form
    $('#subscribe-form').ajaxChimp({
        url: 'http://blahblah.us1.list-manage.com/subscribe/post?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh9'
    });

// Popup Dialog    
    $('.work-gallery-slider').magnificPopup({
      delegate: 'a',
      type: 'image',    
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',    
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return item.el.attr('title') + '<small>by Car Wash</small>';
        }
      }
    });    

// Navigation 
    // Navigation / Menu
    $("#cssmenu").menumaker({
      title: "Menu",
      format: "multitoggle"
    });

// Datepicker
    if ($('.date-pick').length) {
      $('.date-pick').datepicker({
        format : "dd/mm/yyyy"
      });
    }

// Facts Count 
    if ($('.counter').length) {   
      $('.counter').counterUp({
        delay: 20,
        time: 2000
      });
    }

// Event Countdown 
    // Comming Soon or Underconstruction Page
    if($('.comming-countdown').length){  
      $('.comming-countdown').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        var $this = $(this).html(event.strftime('' + '<div class="counter-col-days"><span class="count-days">%D </span>:</div> ' + '<div class="counter-col"><span class="count-hours">%H</span> <span class="count-number">:</span> </div>  ' + '<div class="counter-col"><span class="count-minutes">%M</span> <span class="count-number">:</span> </div>  ' + '<div class="counter-col"><span class="count-seconds">%S</span></div>'));
      });
     });
    }
    
// Progress Bar 
    // For Team Deatils Page
    if ($('.scroll-bar').length) {    
      $('.scroll-bar').appear(function(){
        var el = $(this);
        var percent = el.data('percent');
        $(el).css('width',percent);
      },{accY: -50});
    }

// Quantity Increase Decrease
    $(".cart-plus-minus").append('<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>');
      $(".qtybutton").on("click", function() {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == " ") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
       // Don't allow decrementing below zero
      if (oldValue > 0) {
      var newVal = parseFloat(oldValue) - 1;
      } else {
      newVal = 0;
        }
        }
    $button.parent().find("input").val(newVal);
    });    

// Price Slider / Filter
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1000,
        values: [ 50, 250 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );

// Product Zoom     
    $("#zoom-01").elevateZoom({gallery:'gallery-01', zoomType: 'lens', lensShape: 'round', lensSize : 200, galleryActiveClass: 'active', imageCrossfade: true}); 
    $("#zoom-01").on("click", function(e) {  
      var ez =   $('#zoom-01').data('elevateZoom'); 
      $.fancybox(ez.getGalleryList());
      return false;
    }); 
      
// Dropdown Select
    $( document.body ).on( 'click', '.dropdown-menu li', function( event ) {
      var $target = $( event.currentTarget );
      $target.closest( '.dropdown' )
         .find( '[data-bind="label"]' ).text( $target.text() )
            .end()
         .children( '.dropdown-toggle' ).dropdown( 'toggle' );
      return false;
   });
    
// Dropdown Values
  //Listen for a click on any of the dropdown items
    $(".service-type li").on('click', function(){
        //Get the value
        var value = $(this).attr("value");
        //Put the retrieved value into the hidden input
        $("input[name='service-type']").val(value);
    });
    $(".vehical-make li").on('click', function(){
        //Get the value
        var value = $(this).attr("value");
        //Put the retrieved value into the hidden input
        $("input[name='vehical-make']").val(value);
    });
    $(".appointment-time li").on('click', function(){
        //Get the value
        var value = $(this).attr("value");
        //Put the retrieved value into the hidden input
        $("input[name='appointment-time']").val(value);
    });        

// Preloader   
    $(window).on('load', function()  { 
      $('.status').fadeOut();
      $('.preloader').delay(350).fadeOut('slow'); 
    }); 
    
})(jQuery);