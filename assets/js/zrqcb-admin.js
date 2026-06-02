( function() {
	'use strict';

	function syncColor( picker, hex ) {
		if ( ! picker || ! hex ) {
			return;
		}

		picker.addEventListener( 'input', function() {
			hex.value = picker.value;
		} );

		hex.addEventListener( 'input', function() {
			var value = ( hex.value || '' ).replace( /^#/, '' );

			if ( /^[0-9A-Fa-f]{6}$/.test( value ) ) {
				picker.value = '#' + value;
				picker.dispatchEvent( new Event( 'input' ) );
			}
		} );
	}

	function activateTab( tabId ) {
		var tabs = document.querySelectorAll( '.zrqcb-nav-tabs .nav-tab' );
		var panels = document.querySelectorAll( '.zrqcb-tab-panel' );
		var targetPanel = document.getElementById( 'zrqcb-tab-' + tabId );
		var formFooter = document.querySelector( '.zrqcb-form-footer' );

		if ( ! targetPanel ) {
			return;
		}

		tabs.forEach( function( tab ) {
			var isActive = tab.getAttribute( 'data-zrqcb-tab' ) === tabId;

			tab.classList.toggle( 'nav-tab-active', isActive );
			tab.setAttribute( 'aria-selected', isActive ? 'true' : 'false' );
		} );

		panels.forEach( function( panel ) {
			var isActive = panel.id === 'zrqcb-tab-' + tabId;

			panel.classList.toggle( 'is-active', isActive );
			panel.hidden = ! isActive;
		} );

		if ( formFooter ) {
			formFooter.hidden = tabId === 'about';
		}

		if ( window.history && window.history.replaceState ) {
			window.history.replaceState( null, '', '#zrqcb-tab-' + tabId );
		}
	}

	function initTabs() {
		var tabLinks = document.querySelectorAll( '.zrqcb-nav-tabs .nav-tab' );
		var hash = window.location.hash.replace( /^#/, '' );

		tabLinks.forEach( function( link ) {
			link.addEventListener( 'click', function( event ) {
				event.preventDefault();
				activateTab( link.getAttribute( 'data-zrqcb-tab' ) );
			} );
		} );

		if ( hash.indexOf( 'zrqcb-tab-' ) === 0 ) {
			activateTab( hash.replace( 'zrqcb-tab-', '' ) );
		}
	}

	function initExclusiveChecks() {
		document.querySelectorAll( '[data-zrqcb-exclusive]' ).forEach( function( input ) {
			input.addEventListener( 'change', function() {
				var targetName;
				var target;

				if ( ! input.checked ) {
					return;
				}

				targetName = input.getAttribute( 'data-zrqcb-exclusive' );
				target = document.querySelector( 'input[name$="[' + targetName + ']"]' );

				if ( target ) {
					target.checked = false;
				}
			} );
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function() {
		document.querySelectorAll( '.zrqcb-color-picker' ).forEach( function( picker ) {
			syncColor( picker, document.getElementById( picker.getAttribute( 'data-hex-target' ) ) );
		} );

		initTabs();
		initExclusiveChecks();
	} );
}() );
