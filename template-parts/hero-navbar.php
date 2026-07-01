<?php
/**
 * Fixed homepage-style hero navigation (logo + menu button).
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$site_logo    = arv2_get_logo_url();
$brand_attrs  = arv2_get_hero_brand_attrs();
$brand_track  = $brand_attrs['track'];
?>
<a
	class="<?php echo esc_attr( $brand_attrs['class'] ); ?>"
	href="<?php echo esc_url( home_url( '/' ) ); ?>"
	rel="home"
	<?php if ( $brand_track ) : ?>
		data-hero-brand-track="<?php echo esc_attr( $brand_track ); ?>"
	<?php endif; ?>
>
	<img
		class="ar-hero__brand-logo"
		src="<?php echo esc_url( $site_logo ); ?>"
		alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
		width="467"
		height="187"
		decoding="async"
	>
</a>

<button
	class="ar-hero__menu"
	type="button"
	aria-controls="ar-menu-overlay"
	aria-expanded="false"
	aria-label="<?php esc_attr_e( 'Open menu', 'activate-rights-v2' ); ?>"
	data-menu-label="<?php esc_attr_e( 'Menu', 'activate-rights-v2' ); ?>"
	data-close-label="<?php esc_attr_e( 'Close', 'activate-rights-v2' ); ?>"
	data-open-aria-label="<?php esc_attr_e( 'Open menu', 'activate-rights-v2' ); ?>"
	data-close-aria-label="<?php esc_attr_e( 'Close menu', 'activate-rights-v2' ); ?>"
>
	<?php esc_html_e( 'Menu', 'activate-rights-v2' ); ?>
</button>

<?php get_template_part( 'template-parts/hero', 'menu-overlay' ); ?>
