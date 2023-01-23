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
	

	

} )( jQuery );