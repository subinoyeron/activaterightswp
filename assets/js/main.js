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
} )();
