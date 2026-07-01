<?php
/**
 * Site header template.
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#main-content">
	<?php esc_html_e( 'Skip to content', 'activate-rights-v2' ); ?>
</a>

<header class="site-header<?php echo is_front_page() ? ' site-header--transparent' : ''; ?>" role="banner">
	<div class="container site-header__inner">

		<div class="site-branding">
			<a class="site-branding__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
				$site_logo = arv2_get_logo_url();

				if ( $site_logo ) :
					?>
					<img
						class="site-branding__logo"
						src="<?php echo esc_url( $site_logo ); ?>"
						alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
						width="467"
						height="187"
						decoding="async"
					>
				<?php elseif ( has_custom_logo() ) : ?>
					<?php
					$logo_id  = get_theme_mod( 'custom_logo' );
					$logo_alt = $logo_id ? get_post_meta( $logo_id, '_wp_attachment_image_alt', true ) : '';
					echo wp_get_attachment_image(
						$logo_id,
						'medium',
						false,
						array(
							'class' => 'site-branding__logo',
							'alt'   => $logo_alt ? $logo_alt : get_bloginfo( 'name' ),
						)
					);
					?>
				<?php else : ?>
					<span class="site-branding__title"><?php bloginfo( 'name' ); ?></span>
				<?php endif; ?>

				<?php if ( get_bloginfo( 'description' ) ) : ?>
					<p class="site-branding__tagline"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</a>
		</div>

		<button
			class="nav-toggle"
			type="button"
			aria-controls="primary-navigation"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'activate-rights-v2' ); ?>"
		>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
			<span class="nav-toggle__bar" aria-hidden="true"></span>
		</button>

		<nav
			id="primary-navigation"
			class="primary-nav"
			role="navigation"
			aria-label="<?php esc_attr_e( 'Primary navigation', 'activate-rights-v2' ); ?>"
		>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'primary-nav__list',
					'fallback_cb'    => 'arv2_fallback_menu',
					'depth'          => 1,
				)
			);
			?>
		</nav>

	</div>
</header>

<?php
if ( is_front_page() || is_page( 'about' ) || is_page_template( 'page-about.php' ) || is_page( 'reports' ) || is_page_template( 'page-reports.php' ) || is_page( 'blog' ) || is_page_template( 'page-blog.php' ) || is_page( 'contact' ) || is_page_template( 'page-contact.php' ) ) {
	get_template_part( 'template-parts/hero', 'navbar' );
}
?>

<main id="main-content" class="site-main">
