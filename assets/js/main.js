/**
 * Activate Rights V2 — main theme script.
 */
( function () {
	'use strict';

	const header = document.querySelector( '.site-header--transparent' );
	const toggle = document.querySelector( '.nav-toggle' );
	const nav = document.querySelector( '.primary-nav' );
	const hero = document.querySelector( '.cinematic-hero' );
	const heroVideo = document.querySelector( '.cinematic-hero__video' );

	/* Mobile navigation */
	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			const isOpen = toggle.getAttribute( 'aria-expanded' ) === 'true';
			toggle.setAttribute( 'aria-expanded', String( ! isOpen ) );
			nav.classList.toggle( 'is-open', ! isOpen );
		} );

		document.addEventListener( 'click', function ( event ) {
			if (
				nav.classList.contains( 'is-open' ) &&
				! nav.contains( event.target ) &&
				! toggle.contains( event.target )
			) {
				toggle.setAttribute( 'aria-expanded', 'false' );
				nav.classList.remove( 'is-open' );
			}
		} );

		window.addEventListener( 'resize', function () {
			if ( window.innerWidth >= 768 && nav.classList.contains( 'is-open' ) ) {
				toggle.setAttribute( 'aria-expanded', 'false' );
				nav.classList.remove( 'is-open' );
			}
		} );
	}

	/* Sticky header: transparent → solid on scroll */
	if ( header ) {
		const onScroll = function () {
			header.classList.toggle( 'is-scrolled', window.scrollY > 48 );
		};

		onScroll();
		window.addEventListener( 'scroll', onScroll, { passive: true } );
	}

	/* Hero background video */
	if ( heroVideo && hero ) {
		const markPlaying = function () {
			hero.classList.add( 'is-video-playing' );
		};

		heroVideo.addEventListener( 'playing', markPlaying );
		heroVideo.addEventListener( 'canplay', markPlaying );

		heroVideo.addEventListener( 'error', function () {
			heroVideo.remove();
			hero.classList.remove( 'cinematic-hero--has-video' );
		} );

		const playVideo = function () {
			const promise = heroVideo.play();
			if ( promise && typeof promise.catch === 'function' ) {
				promise.catch( function () {
					heroVideo.removeAttribute( 'autoplay' );
				} );
			}
		};

		playVideo();
	}

	/* Hero staggered fade-in */
	const heroReveals = document.querySelectorAll( '[data-hero-reveal]' );
	const prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	if ( heroReveals.length ) {
		if ( prefersReducedMotion ) {
			heroReveals.forEach( function ( item ) {
				item.classList.add( 'is-hero-visible' );
			} );
		} else {
			window.requestAnimationFrame( function () {
				heroReveals.forEach( function ( item ) {
					const delay = item.getAttribute( 'data-hero-delay' ) || '0';
					item.style.setProperty( '--hero-delay', delay + 'ms' );
					item.classList.add( 'is-hero-visible' );
				} );
			} );
		}
	}

	/* Scroll reveal animations */
	const revealItems = document.querySelectorAll( '[data-reveal]' );

	if ( revealItems.length && ! prefersReducedMotion ) {
		const observer = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( ! entry.isIntersecting ) {
						return;
					}

					const delay = entry.target.getAttribute( 'data-reveal-delay' );
					if ( delay ) {
						entry.target.style.setProperty( '--reveal-delay', delay + 'ms' );
					}

					entry.target.classList.add( 'is-visible' );
					observer.unobserve( entry.target );
				} );
			},
			{
				root: null,
				rootMargin: '0px 0px -8% 0px',
				threshold: 0.12,
			}
		);

		revealItems.forEach( function ( item ) {
			observer.observe( item );
		} );
	} else {
		revealItems.forEach( function ( item ) {
			item.classList.add( 'is-visible' );
		} );
	}

	/* Hero navbar logo: native SVG on light sections, invert only over dark hero */
	const heroBrand = document.querySelector( '.ar-hero__brand[data-hero-brand-track]' );

	if ( heroBrand ) {
		const trackSelector = heroBrand.getAttribute( 'data-hero-brand-track' );
		const trackTarget = trackSelector ? document.querySelector( trackSelector ) : null;

		if ( trackTarget ) {
			const syncHeroBrandTheme = function ( isOverDark ) {
				heroBrand.classList.toggle( 'ar-hero__brand--on-dark', isOverDark );
			};

			if ( 'undefined' !== typeof IntersectionObserver ) {
				const brandObserver = new IntersectionObserver(
					function ( entries ) {
						entries.forEach( function ( entry ) {
							syncHeroBrandTheme( entry.isIntersecting );
						} );
					},
					{
						root: null,
						threshold: 0,
						rootMargin: '-1px 0px 0px 0px',
					}
				);

				brandObserver.observe( trackTarget );
			}
		}
	}

	/* Fixed hero logo: fade out when footer enters viewport */
	const siteFooter = document.querySelector( '.site-footer' );
	const fixedHeroBrand = document.querySelector( '.ar-hero__brand' );

	if ( siteFooter && fixedHeroBrand && 'undefined' !== typeof IntersectionObserver ) {
		const footerObserver = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					document.body.classList.toggle( 'is-footer-visible', entry.isIntersecting );
				} );
			},
			{
				root: null,
				threshold: 0,
			}
		);

		footerObserver.observe( siteFooter );
	}

	/* Hero fullscreen menu */
	const menuButton = document.querySelector( '.ar-hero__menu' );
	const menuOverlay = document.getElementById( 'ar-menu-overlay' );

	if ( menuButton && menuOverlay ) {
		const menuPanel = menuOverlay.querySelector( '.ar-menu-overlay__panel' );
		const menuLabel = menuButton.getAttribute( 'data-menu-label' ) || 'Menu';
		const closeLabel = menuButton.getAttribute( 'data-close-label' ) || 'Close';
		const openAriaLabel = menuButton.getAttribute( 'data-open-aria-label' ) || 'Open menu';
		const closeAriaLabel = menuButton.getAttribute( 'data-close-aria-label' ) || 'Close menu';
		const menuLinks = menuOverlay.querySelectorAll( '.ar-menu-overlay__link, .ar-menu-overlay__email' );
		let isClosing = false;

		const setMenuButtonState = function ( isOpen ) {
			menuButton.setAttribute( 'aria-expanded', String( isOpen ) );
			menuButton.textContent = isOpen ? closeLabel : menuLabel;
			menuButton.setAttribute( 'aria-label', isOpen ? closeAriaLabel : openAriaLabel );
		};

		const finishMenuClose = function () {
			menuOverlay.classList.remove( 'is-active', 'is-closing' );
			menuOverlay.setAttribute( 'aria-hidden', 'true' );
			document.body.classList.remove( 'ar-menu-open' );
			setMenuButtonState( false );
			isClosing = false;
		};

		const openMenu = function () {
			if ( isClosing || menuOverlay.classList.contains( 'is-open' ) ) {
				return;
			}

			menuOverlay.classList.add( 'is-active' );
			menuOverlay.setAttribute( 'aria-hidden', 'false' );
			document.body.classList.add( 'ar-menu-open' );
			setMenuButtonState( true );

			if ( prefersReducedMotion ) {
				menuOverlay.classList.add( 'is-open' );
				return;
			}

			window.requestAnimationFrame( function () {
				window.requestAnimationFrame( function () {
					menuOverlay.classList.add( 'is-open' );
				} );
			} );
		};

		const closeMenu = function () {
			if ( ! menuOverlay.classList.contains( 'is-open' ) || isClosing ) {
				return;
			}

			isClosing = true;
			menuOverlay.classList.add( 'is-closing' );
			menuOverlay.classList.remove( 'is-open' );
			setMenuButtonState( false );

			if ( prefersReducedMotion ) {
				finishMenuClose();
				return;
			}
		};

		if ( menuPanel ) {
			menuPanel.addEventListener( 'transitionend', function ( event ) {
				if ( event.target !== menuPanel || event.propertyName !== 'transform' ) {
					return;
				}

				if ( isClosing && ! menuOverlay.classList.contains( 'is-open' ) ) {
					finishMenuClose();
				}
			} );
		}

		menuButton.addEventListener( 'click', function () {
			if ( menuOverlay.classList.contains( 'is-open' ) ) {
				closeMenu();
				return;
			}

			openMenu();
		} );

		menuLinks.forEach( function ( link ) {
			link.addEventListener( 'click', function () {
				closeMenu();
			} );
		} );

		document.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' && menuOverlay.classList.contains( 'is-open' ) ) {
				closeMenu();
				menuButton.focus();
			}
		} );
	}

	/* Reports page filter chips */
	const reportsFilterChips = document.querySelectorAll( '.reports-filters__chip' );

	if ( reportsFilterChips.length ) {
		reportsFilterChips.forEach( function ( chip ) {
			chip.addEventListener( 'click', function () {
				reportsFilterChips.forEach( function ( item ) {
					item.classList.remove( 'is-active' );
				} );
				chip.classList.add( 'is-active' );
			} );
		} );
	}

} )();
