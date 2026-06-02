( function() {
	'use strict';

	function setCookie( name, value, duration ) {
		document.cookie = name + '=' + value + '; max-age=' + duration + '; path=/; SameSite=Lax';
	}

	function getCookie( name ) {
		return document.cookie.split( ';' ).some( function( cookie ) {
			return cookie.trim().indexOf( name + '=' ) === 0;
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function() {
		var bar = document.querySelector( '[data-zrqcb-bar]' );
		var closeButton;
		var config = window.ZRQCB || {};
		var cookieName = config.cookieName || 'zrqcb_bar_closed';

		if ( ! bar ) {
			return;
		}

		if ( bar.getAttribute( 'data-zrqcb-remember' ) === '1' && getCookie( cookieName ) ) {
			bar.classList.add( 'zrqcb-is-hidden' );
			return;
		}

		closeButton = bar.querySelector( '[data-zrqcb-close]' );

		if ( closeButton ) {
			closeButton.addEventListener( 'click', function() {
				bar.classList.add( 'zrqcb-is-hidden' );

				if ( bar.getAttribute( 'data-zrqcb-remember' ) === '1' ) {
					setCookie( cookieName, '1', parseInt( config.duration, 10 ) || 2592000 );
				}
			} );
		}
	} );
}() );
