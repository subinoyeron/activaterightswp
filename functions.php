<?php
/**
 * Activate Rights V2 theme functions.
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 */
function arv2_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'activate-rights-v2' ),
			'footer'  => __( 'Footer Navigation', 'activate-rights-v2' ),
		)
	);
}
add_action( 'after_setup_theme', 'arv2_setup' );

/**
 * Get the theme assets directory URI.
 *
 * @return string
 */
function arv2_assets_uri() {
	return get_template_directory_uri() . '/assets';
}

/**
 * Get the theme assets directory path.
 *
 * @return string
 */
function arv2_assets_path() {
	return get_template_directory() . '/assets';
}

/**
 * Get a theme asset URL if the file exists.
 *
 * @param string $relative_path Path relative to the theme root.
 * @return string
 */
function arv2_get_asset_url( $relative_path ) {
	$relative_path = ltrim( $relative_path, '/' );
	$file_path     = get_template_directory() . '/' . $relative_path;

	if ( ! file_exists( $file_path ) ) {
		return '';
	}

	return get_template_directory_uri() . '/' . $relative_path;
}

/**
 * Get an image URL from assets/images.
 *
 * @param string $filename Image filename.
 * @return string
 */
function arv2_get_image_url( $filename ) {
	return arv2_get_asset_url( 'assets/images/' . $filename );
}

/**
 * Site logo URL (public root, with theme fallback).
 *
 * @return string
 */
function arv2_get_logo_url() {
	$public_logo = ABSPATH . 'activate-rights-logo.svg';

	if ( file_exists( $public_logo ) ) {
		return home_url( '/activate-rights-logo.svg' );
	}

	return arv2_get_image_url( 'activate rights logo.svg' );
}

/**
 * Get partner logo files from assets/partnerlogos.
 *
 * @return array<int, array{filename: string, url: string, color_url: string, alt: string}>
 */
function arv2_get_partner_logos() {
	$directory = get_template_directory() . '/assets/partnerlogos';

	if ( ! is_dir( $directory ) ) {
		return array();
	}

	$files = scandir( $directory );

	if ( false === $files ) {
		return array();
	}

	$allowed_extensions = array( 'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg' );
	$logos              = array();

	foreach ( $files as $filename ) {
		if ( '.' === $filename || '..' === $filename ) {
			continue;
		}

		$extension = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );

		if ( ! in_array( $extension, $allowed_extensions, true ) ) {
			continue;
		}

		if ( preg_match( '/(?:-color| color)\.[^.]+$/i', $filename ) ) {
			continue;
		}

		$alt = pathinfo( $filename, PATHINFO_FILENAME );
		$alt = preg_replace( '/\s*(logo|logos|logoo)s?\s*/i', ' ', $alt );
		$alt = preg_replace( '/[-_]+/', ' ', $alt );
		$alt = preg_replace( '/\d+x\d+/i', ' ', $alt );
		$alt = preg_replace( '/\b(scaled|original|one|\d+px)\b/i', ' ', $alt );
		$alt = preg_replace( '/\b\d{4}\b/', ' ', $alt );
		$alt = trim( preg_replace( '/\s+/', ' ', $alt ) );
		$alt = ucwords( strtolower( $alt ) );

		$logo_url = get_template_directory_uri() . '/assets/partnerlogos/' . rawurlencode( $filename );

		$color_url = '';
		$base_name = pathinfo( $filename, PATHINFO_FILENAME );
		$color_candidates = array(
			$base_name . '-color.' . $extension,
			$base_name . ' color.' . $extension,
		);

		foreach ( $color_candidates as $color_filename ) {
			if ( is_file( $directory . '/' . $color_filename ) ) {
				$logo_url_color = get_template_directory_uri() . '/assets/partnerlogos/' . rawurlencode( $color_filename );
				$color_url      = $logo_url_color;
				break;
			}
		}

		$logos[] = array(
			'filename'  => $filename,
			'url'       => $logo_url,
			'color_url' => $color_url,
			'alt'       => $alt,
		);
	}

	usort(
		$logos,
		static function ( $a, $b ) {
			return strnatcasecmp( $a['filename'], $b['filename'] );
		}
	);

	return $logos;
}

/**
 * Render the homepage section meta block (description + View All CTA).
 *
 * @param string $description Section description text.
 * @param string $url         Optional CTA URL.
 */
function arv2_section_meta( $description, $url = '#' ) {
	?>
	<div class="section-meta">
		<p class="section-meta__description"><?php echo esc_html( $description ); ?></p>
		<a class="section-meta__cta" href="<?php echo esc_url( $url ); ?>">
			<?php esc_html_e( 'View All', 'activate-rights-v2' ); ?>
			<span class="section-meta__cta-arrow" aria-hidden="true">→</span>
		</a>
	</div>
	<?php
}

/**
 * Get a video URL from assets/videos.
 *
 * @param string $filename Video filename.
 * @return string
 */
function arv2_get_video_url( $filename ) {
	return arv2_get_asset_url( 'assets/videos/' . $filename );
}

/**
 * Render a theme image with a CSS-class fallback when the file is missing.
 *
 * @param string $filename Image filename inside assets/images.
 * @param array  $args     Optional arguments.
 */
function arv2_render_theme_image( $filename, $args = array() ) {
	$defaults = array(
		'class'   => '',
		'alt'     => '',
		'loading' => 'lazy',
	);

	$args = wp_parse_args( $args, $defaults );
	$url  = arv2_get_image_url( $filename );

	if ( $url ) {
		printf(
			'<img class="%1$s" src="%2$s" alt="%3$s" loading="%4$s" decoding="async">',
			esc_attr( $args['class'] ),
			esc_url( $url ),
			esc_attr( $args['alt'] ),
			esc_attr( $args['loading'] )
		);
		return;
	}

	printf(
		'<div class="%1$s" role="img" aria-label="%2$s"></div>',
		esc_attr( $args['class'] ),
		esc_attr( $args['alt'] )
	);
}

/**
 * Enqueue theme fonts.
 */
function arv2_enqueue_fonts() {
	$fonts = array(
		'activate-rights-v2-font-source-serif-4'     => 'https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;500;700&display=swap',
		'activate-rights-v2-font-roboto-mono'        => 'https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500;700&display=swap',
		'activate-rights-v2-font-stack-sans-headline' => 'https://fonts.googleapis.com/css2?family=Stack+Sans+Headline:wght@400;500;600;700&display=swap',
		'activate-rights-v2-font-stack-sans-notch'   => 'https://fonts.googleapis.com/css2?family=Stack+Sans+Notch:wght@400;500;600;700&display=swap',
	);

	foreach ( $fonts as $handle => $url ) {
		wp_enqueue_style( $handle, $url, array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'arv2_enqueue_fonts', 5 );

/**
 * Enqueue theme assets.
 */
function arv2_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$assets_uri    = arv2_assets_uri();
	$font_deps     = array(
		'activate-rights-v2-font-source-serif-4',
		'activate-rights-v2-font-roboto-mono',
		'activate-rights-v2-font-stack-sans-headline',
		'activate-rights-v2-font-stack-sans-notch',
	);

	wp_enqueue_style(
		'activate-rights-v2-style',
		get_stylesheet_uri(),
		array(),
		$theme_version
	);

	wp_enqueue_style(
		'activate-rights-v2-main',
		$assets_uri . '/css/main.css',
		array_merge( array( 'activate-rights-v2-style' ), $font_deps ),
		$theme_version
	);

	$main_js = get_template_directory() . '/assets/js/main.js';

	if ( file_exists( $main_js ) ) {
		wp_enqueue_script(
			'activate-rights-v2-scripts',
			$assets_uri . '/js/main.js',
			array(),
			$theme_version,
			true
		);
	}

	if ( is_front_page() ) {
		wp_enqueue_style(
			'activate-rights-v2-front-page',
			$assets_uri . '/css/front-page.css',
			array( 'activate-rights-v2-main' ),
			$theme_version
		);
	}
}
add_action( 'wp_enqueue_scripts', 'arv2_enqueue_assets' );

/**
 * Body classes for homepage cinematic layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function arv2_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'has-cinematic-hero';
	}

	return $classes;
}
add_filter( 'body_class', 'arv2_body_classes' );

/**
 * Hero background video URL.
 *
 * @return string
 */
function arv2_get_hero_video_url() {
	$default = arv2_get_video_url( 'hero.mp4' );

	return apply_filters( 'arv2_hero_video_url', $default );
}

/**
 * Hero poster image URL.
 *
 * @return string
 */
function arv2_get_hero_poster_url() {
	$default = arv2_get_image_url( 'hero-poster.jpg' );

	return apply_filters( 'arv2_hero_poster_url', $default );
}

/**
 * Fallback menu when no Primary Navigation is assigned.
 */
function arv2_fallback_menu() {
	$links = array(
		home_url( '/' )           => __( 'Home', 'activate-rights-v2' ),
		home_url( '/campaigns/' ) => __( 'Campaigns', 'activate-rights-v2' ),
		home_url( '/reports/' )   => __( 'Reports', 'activate-rights-v2' ),
		home_url( '/resources/' ) => __( 'Resources', 'activate-rights-v2' ),
		home_url( '/events/' )    => __( 'Events', 'activate-rights-v2' ),
	);

	echo '<ul class="primary-nav__list">';

	foreach ( $links as $url => $label ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( $url ),
			esc_html( $label )
		);
	}

	echo '</ul>';
}
