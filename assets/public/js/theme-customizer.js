/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Theme colors

	wp.customize( 'primary_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-primary", newval);
		} );
	} );
	wp.customize( 'secondary_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-secondary", newval);
		} );
	} );
	wp.customize( 'tertiary_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-tertiary", newval);
		} );
	} );
	wp.customize( 'fourth_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-fourth", newval);
		} );
	} );
	wp.customize( 'fifth_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-fifth", newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-text", newval);
		} );
	} );

	wp.customize( 'headings_font', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--title-font", newval);

		} );
	} );

	// Header behavior

	wp.customize( 'fixed_header', function( value ) {
		value.bind( function( newval ) {
			newval == true ? $(".header").addClass("fixed") : $(".header").removeClass("fixed");
		} );
	} );

	wp.customize( 'shrinked_header', function( value ) {
		value.bind( function( newval ) {
			newval == true ? $(".header").addClass("shrink") : $(".header").removeClass("shrink");
		} );
	} );

	wp.customize( 'transparent_header', function( value ) {
		value.bind( function( newval ) {
			newval == true ? $(".header").addClass("transparentNav") : $(".header").removeClass("transparentNav");
		} );
	} );


	// Headings colors

	wp.customize( 'h1_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-h1", newval);
		} );
	} );

	wp.customize( 'h2_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-h2", newval);
		} );
	} );

	wp.customize( 'h3_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-h3", newval);
		} );
	} );

	wp.customize( 'h4_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-h4", newval);
		} );
	} );

	wp.customize( 'nav_text_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-nav-text", newval);
		} );
	} );

	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-footer-text", newval);
		} );
	} );

	wp.customize( 'nav_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-nav", newval);
		} );
	} );

	wp.customize( 'footer_color', function( value ) {
		value.bind( function( newval ) {
			$("html").get(0).style.setProperty("--color-footer", newval);
		} );
	} );


	// Text sizes

	wp.customize( 'h1_size', function( value ) {
		value.bind( function( newval ) {
			$("h1").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--h1-size", newval/10 + "rem");
		} );
	} );
	wp.customize( 'h2_size', function( value ) {
		value.bind( function( newval ) {
			$("h2").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--h2-size", newval/10 + "rem");

		} );
	} );
	wp.customize( 'h3_size', function( value ) {
		value.bind( function( newval ) {
			$("h3").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--h3-size", newval/10 + "rem");

		} );
	} );
	wp.customize( 'h4_size', function( value ) {
		value.bind( function( newval ) {
			$("h4").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--h4-size", newval/10 + "rem");

		} );
	} );
	wp.customize( 'text_size', function( value ) {
		value.bind( function( newval ) {
			$("body").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--text-size", newval/10 + "rem");

		} );
	} );
	wp.customize( 'btn_size', function( value ) {
		value.bind( function( newval ) {
			$(".btn:not(.big)").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--btn-size", newval/10 + "rem");

		} );
	} );
	wp.customize( 'big_btn_size', function( value ) {
		value.bind( function( newval ) {
			$(".btn.big").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--btn-size", newval/10 + "rem");

		} );
	} );
	wp.customize( 'menu_size', function( value ) {
		value.bind( function( newval ) {
			$(".header nav .menu-navigation-haute-container .mainNav > .menu-item > a").css("font-size", newval/10 + "rem");
			$("html").get(0).style.setProperty("--nav-size", newval/10 + "rem");
		} );
	} );

	/* Logo */

	wp.customize( 'logo_width', function( value ) {
		value.bind( function( newval ) {
			$(".header.scrolled .custom-logo-link img, .header .custom-logo-link svg").css("width", newval/10 + "rem");
			$("html").get(0).style.setProperty("--logo-width", newval/10 + "rem");
		} );
	} );

	wp.customize( 'logo_height', function( value ) {
		value.bind( function( newval ) {
			$(".header.scrolled .custom-logo-link img, .header .custom-logo-link svg").css("height", newval/10 + "rem");
			$("html").get(0).style.setProperty("--logo-height", newval/10 + "rem");
		} );
	} );




	// Section image

	wp.customize('section_before', function (value) {
		value.bind(function (newval) {
			$("section::before").css("background-image", "url(" + newval + ")");
			$("html").get(0).style.setProperty("--before-image", "url(" + newval + ")");
		});
	});
	wp.customize('section_after', function (value) {
		value.bind(function (newval) {
			$("section::after").css("background-image", "url(" + newval + ")");
			$("html").get(0).style.setProperty("--after-image", "url(" + newval + ")");
		});
	});


	// Footer content

	wp.customize('bottom_footer_content', function (value) {
		value.bind(function (newval) {
			$("#bottomFooterSection").html(newval);
		});
	});
	wp.customize('bottom_footer_content', function (value) {
		value.bind(function (newval) {
			$("#bottomFooterSection").html(newval);
		});
	});


} )( jQuery );