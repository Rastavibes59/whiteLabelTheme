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
		} );
	} );
	wp.customize( 'h2_size', function( value ) {
		value.bind( function( newval ) {
			$("h2").css("font-size", newval/10 + "rem");
		} );
	} );
	wp.customize( 'h3_size', function( value ) {
		value.bind( function( newval ) {
			$("h3").css("font-size", newval/10 + "rem");
		} );
	} );
	wp.customize( 'h4_size', function( value ) {
		value.bind( function( newval ) {
			$("h4").css("font-size", newval/10 + "rem");
		} );
	} );
	wp.customize( 'text_size', function( value ) {
		value.bind( function( newval ) {
			$("body").css("font-size", newval/10 + "rem");
		} );
	} );
	wp.customize( 'btn_size', function( value ) {
		value.bind( function( newval ) {
			$(".btn").css("font-size", newval/10 + "rem");
		} );
	} );

} )( jQuery );