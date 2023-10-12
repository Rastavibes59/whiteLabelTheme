/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Update the site title in real time...
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
	// Footer image
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

} )( jQuery );