<?php
/**
 * Site footer template.
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_home = home_url( '/' );
$footer_logo = arv2_get_logo_url();
?>

</main><!-- #main-content -->

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">

		<div class="site-footer__row site-footer__row--top">
			<div class="site-footer__grid">
				<a class="site-footer__logo" href="<?php echo esc_url( $footer_home ); ?>" rel="home">
					<img
						class="site-footer__logo-image"
						src="<?php echo esc_url( $footer_logo ); ?>"
						alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
						width="467"
						height="187"
						decoding="async"
					>
				</a>

				<nav class="site-footer__contact" aria-label="<?php esc_attr_e( 'Footer contact links', 'activate-rights-v2' ); ?>">
					<p class="site-footer__contact-label"><?php esc_html_e( 'Stay in touch', 'activate-rights-v2' ); ?></p>
					<a class="site-footer__contact-link editorial-link" href="#" rel="noopener noreferrer">
						<?php esc_html_e( 'Instagram', 'activate-rights-v2' ); ?>
						<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
					</a>
					<a class="site-footer__contact-link editorial-link" href="#" rel="noopener noreferrer">
						<?php esc_html_e( 'Facebook', 'activate-rights-v2' ); ?>
						<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
					</a>
					<a class="site-footer__contact-link editorial-link" href="mailto:info@activaterights.org">
						<?php esc_html_e( 'Contact us', 'activate-rights-v2' ); ?>
						<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
					</a>
				</nav>
			</div>
		</div>

		<div class="site-footer__row site-footer__row--cta" id="contact">
			<div class="site-footer__cta">
				<p class="site-footer__cta-lead"><?php esc_html_e( 'Interested in working with us?', 'activate-rights-v2' ); ?></p>
				<a class="site-footer__inquiry" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Send Inquiry', 'activate-rights-v2' ); ?></a>
			</div>
		</div>

		<div class="site-footer__row site-footer__row--bottom">
			<hr class="site-footer__divider">
			<div class="site-footer__grid site-footer__grid--bottom">
				<p class="site-footer__legal site-footer__legal--left"><?php esc_html_e( 'All rights reserved', 'activate-rights-v2' ); ?></p>
				<a class="site-footer__legal site-footer__legal--center" href="#"><?php esc_html_e( 'Privacy policy', 'activate-rights-v2' ); ?></a>
				<p class="site-footer__legal site-footer__legal--right">&copy;2026</p>
			</div>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
