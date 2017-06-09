/**
 * This file adds some LIVE to the Theme Customizer live preview.
 */
( function( $ ) {
	// Colors
	wp.customize( 'color_scheme', function( value ) {
		value.bind( function( newval ) {
			$( '#style-css' ).attr( 'href', felynx_data.template_directory + '/css/' + newval + '.css?ver=' + felynx_data.theme_version );
		} );
	} );

	// Logo
	function display_only_logo( bool ) {
		var site_name   = $( '#site-logo strong' ),
			append_name = false;

		if( $( '#site-logo .logo' ).length ) { // if there is at least one logo
			if (typeof variable === 'undefined') {
			    var bool = wp.customize( 'only_logo' )();
			}
			if( bool ) {
				site_name.remove();
			} else {
				append_name = true;
			}
		} else { // if no logos
			append_name = true;
		}

		if ( append_name && ! site_name.length ) { // if no site name
			$( '<strong>', { text: felynx_data.site_name } ).appendTo( '#site-logo' );
		}
	}

	wp.customize( 'logo_dark', function( value ) {
		value.bind( function( newval ) {
			var logo = $( '#site-logo .dark' );
			if ( newval.length ) {
				if ( logo.length ) {
					logo.attr( 'src', newval ) ;
				} else {
					$( '<img />', { src: newval, class: 'dark logo' } ).prependTo( '#site-logo' );
				}
				if( $( '#site-logo .light' ).length ) {
					$( '#site-logo' ).addClass( 'logos' );
				}
			} else {
				logo.remove();
				$( '#site-logo' ).removeClass( 'logos' );
			}
			display_only_logo();
		} );
	} );

	wp.customize( 'logo_light', function( value ) {
		value.bind( function( newval ) {
			var logo = $( '#site-logo .light' );
			if ( newval.length ) {
				if ( logo.length ) {
					logo.attr( 'src', newval ) ;
				} else {
					$( '<img />', { src: newval, class: 'light logo' } ).prependTo( '#site-logo' );
				}
				if( $( '#site-logo .dark' ).length ) {
					$( '#site-logo' ).addClass( 'logos' );
				}
			} else {
				logo.remove();
				$( '#site-logo' ).removeClass( 'logos' );
			}
			display_only_logo();
		} );
	} );

	wp.customize( 'only_logo', function( value ) {
		value.bind( function( newval ) {
			display_only_logo( newval );
		} );
	} );

	// Site name
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '#site-logo strong' ).html( newval );
		} );
	} );
	
	// Site tagline
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.home.blog #header h1' ).html( newval );
		} );
	} );

	
} )( jQuery );