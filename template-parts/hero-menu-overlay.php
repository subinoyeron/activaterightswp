<?php
/**
 * Fullscreen hero menu overlay panel.
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$menu_links = array(
	array(
		'label' => __( 'Home', 'activate-rights-v2' ),
		'url'   => home_url( '/' ),
	),
	array(
		'label' => __( 'About', 'activate-rights-v2' ),
		'url'   => home_url( '/about' ),
	),
	array(
		'label' => __( 'Reports', 'activate-rights-v2' ),
		'url'   => home_url( '/reports' ),
	),
	array(
		'label' => __( 'Blog', 'activate-rights-v2' ),
		'url'   => home_url( '/blog' ),
	),
	array(
		'label' => __( 'Contact', 'activate-rights-v2' ),
		'url'   => home_url( '/contact' ),
	),
);
?>
<div
	class="ar-menu-overlay"
	id="ar-menu-overlay"
	aria-hidden="true"
>
	<div class="ar-menu-overlay__panel">
		<div class="ar-menu-overlay__grid">
			<nav class="ar-menu-overlay__nav" aria-label="<?php esc_attr_e( 'Fullscreen menu', 'activate-rights-v2' ); ?>">
				<ul class="ar-menu-overlay__list">
					<?php foreach ( $menu_links as $menu_link ) : ?>
						<li class="ar-menu-overlay__item">
							<a class="ar-menu-overlay__link" href="<?php echo esc_url( $menu_link['url'] ); ?>">
								<?php echo esc_html( $menu_link['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="ar-menu-overlay__meta">
				<p class="ar-menu-overlay__org"><?php esc_html_e( 'Activate Rights', 'activate-rights-v2' ); ?></p>
				<p class="ar-menu-overlay__description">
					<?php esc_html_e( 'Digital rights, internet freedom,', 'activate-rights-v2' ); ?><br>
					<?php esc_html_e( 'collective memory, accountability.', 'activate-rights-v2' ); ?>
				</p>
				<a class="ar-menu-overlay__email" href="mailto:info@activaterights.org">info@activaterights.org</a>
			</div>
		</div>
	</div>
</div>
