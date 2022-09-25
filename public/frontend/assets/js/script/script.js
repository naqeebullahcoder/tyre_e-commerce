//console.log("Load script.js");

// Instantiating the global app object
//var app = {};

function sideMenu() {

    "use strict";

    jQuery(".mainMenu").on("click", "li.hasSubmenu > span.navArrow", function() {
        //event.preventDefault();
        if (jQuery(this).siblings("ul.subMenu").hasClass("opened")) {
            jQuery(this).siblings("ul.subMenu").slideUp(500, function() {
                jQuery(this).removeClass("opened");
            });
        } else {
            jQuery(this).siblings("ul.subMenu").slideDown(500, function() {
                jQuery(this).addClass("opened");
            });
        }

    });


    jQuery(".toggler-menu").on("click", function() {
        var menuUL = jQuery(".maindiv");
        var bodyOverlay = jQuery(".body-overlay");
        menuUL.addClass("visibleMenu");
		jQuery("body, html").addClass('blockScroll');
        bodyOverlay.toggle();
    });

    jQuery(".closeMenu").on("click", function() {
        var menuUL = jQuery(".maindiv");
        menuUL.removeClass("visibleMenu");
		jQuery("body, html").removeClass('blockScroll');
        var bodyOverlay = jQuery(".body-overlay");
        bodyOverlay.toggle();
	});
    
    jQuery(".body-overlay").on("click", function() {
        var menuUL = jQuery(".maindiv");
        menuUL.removeClass("visibleMenu");
		jQuery("body, html").removeClass('blockScroll');
        jQuery(this).toggle();
    });


}

//----------------------

//sticky header
var header = jQuery(".top-head");
var hheight = header.outerHeight();
// console.log(hheight);
var coverUp = jQuery(".header");
jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();
    var device = jQuery(window).width();
    if (scroll > 200) {
        header.removeClass('positioning').addClass("fixedUp");

    } else {
        header.removeClass("fixedUp").addClass('positioning');

    }
    if (scroll > 300) {
        header.removeClass('clearHeader').addClass("fixedHeader");
        coverUp.removeClass('noCoverUp').addClass("coverUp").css({ "padding-top": hheight + "px" });

        if (device > 991) {
            coverUp.css({ "padding-top": hheight + "px" });
        }


    } else {
        header.removeClass("fixedHeader").addClass('clearHeader');
        coverUp.removeClass('coverUp').addClass("noCoverUp").css({ "padding-top": 0 });
        if (device > 991) {
            coverUp.css({ "padding-top": 0 });
        }
    }
    if (scroll > 950) {
        header.removeClass('oldColor').addClass("diffColor");
    } else {
        header.removeClass("diffColor").addClass('oldColor');
    }

    var resizeFixed = function() {
        var mediasize = 991;
        if (jQuery(window).width() > mediasize) {
            header.removeClass("yes-mobile");
            header.addClass("not-mobile");
            coverUp.removeClass("yes-mobile");
            coverUp.addClass("not-mobile");
        }
        if (jQuery(window).width() <= mediasize) {
            header.removeClass("not-mobile")
            header.addClass("yes-mobile");
            coverUp.removeClass("not-mobile");
            coverUp.addClass("yes-mobile").css({ "margin-top": 0 });
        }
    };
    resizeFixed();
    return jQuery(window).on('resize', resizeFixed);

});

// //sticky header
// function stickyHeader() {
//     jQuery('.top-head').addClass('fixedHeader');
  
//     var topHeadHeight = jQuery('.top-head').outerHeight();
  
//     jQuery('.header').css({ 'margin-top': topHeadHeight + 'px' });
  
//     jQuery(window).scroll(function() {
//       var scroll = jQuery(window).scrollTop();
  
//       if (scroll > 1) {
//         jQuery('.fixedHeader').addClass('header-shadow');
//       } else {
//         jQuery('.fixedHeader').removeClass('header-shadow');
//       }
//     });
// }

// =============

/**/




jQuery(document).ready(function() {
    "use strict";
    
    jQuery(".mainMenu li").has("ul").addClass("hasSubmenu");
    jQuery(".mainMenu li > ul").addClass("subMenu");

    if (jQuery(".mainMenu li").hasClass("hasSubmenu")) {
        jQuery(".mainMenu li.hasSubmenu").append('<span class="navArrow fa fa-angle-down"></span>');
    }

    //stickyHeader();
    sideMenu();

    jQuery( window ).resize(function() {

        //stickyHeader();
		sideMenu();

    });
    
    // jQuery('.alumni-slider-home').slick({
	// 	rows: 2,
	// 	dots: false,
	// 	arrows: true,
	// 	infinite: true,
	// 	speed: 300,
	// 	slidesToShow: 4,
    //     slidesToScroll: 1,
    //     //appendArrows: '.alumni-slider-btns',
    //     prevArrow: '.slider-left',
    //     nextArrow: '.slider-right',
    // });

    // ===== Scroll to Top ==== 
	// jQuery(window).scroll(function() {
	// 	if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
	// 		jQuery('.goTop').fadeIn(200);    // Fade in the arrow
	// 	} else {
	// 		jQuery('.goTop').fadeOut(200);   // Else fade out the arrow
	// 	}
    // });
    
    
    // $('.count').each(function () {
    //     $(this).prop('Counter',0).animate({
    //         Counter: $(this).text()
    //     }, {
    //         duration: 4000,
    //         easing: 'swing',
    //         step: function (now) {
    //             $(this).text(Math.ceil(now));
    //         }
    //     });
    // });

    // $('.counter').counterUp({
    //     delay: 10,
    //     time: 1000
    // });

    // $( "#year-range" ).slider({
    //     range: true,
    //     min: 1990,
    //     max: 2015,
    //     values: [ 1990, 2015],
    //     slide: function( event, ui ) {
    //         $( "#year-start" ).html( ui.values[ 0 ]);
    //         $( "#year-end" ).html( ui.values[ 1 ] );
            
    //         $( "#year-min" ).val( ui.values[ 0 ]);
    //         $( "#year-max" ).val( ui.values[ 1 ] );
    //     }
    // });

	jQuery('.quston-arrow').click(function() {      // When arrow is clicked
		jQuery('body,html').animate({
			scrollTop : 0                       // Scroll to top of body
		}, 1000);
    });
    
    jQuery( ".toggleBtnSearch" ).click(function() {
        jQuery( ".top-search" ).slideToggle();
    });
});