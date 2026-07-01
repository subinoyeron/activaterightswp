<?php
/**
 * Contact page template.
 *
 * WordPress automatically uses this file for any Page with the slug "contact".
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_url = home_url( '/contact' );

get_header();
?>

<div class="contact-page">
	<section class="contact-intro home-section" aria-labelledby="contact-intro-title">
		<div class="home-section__grid">
			<h1 class="contact-intro__title" id="contact-intro-title"><?php esc_html_e( 'contact', 'activate-rights-v2' ); ?></h1>
		</div>
	</section>

	<section class="contact-main home-section" aria-labelledby="contact-form-title">
		<div class="home-section__grid contact-main__grid">
			<aside class="contact-meta" aria-label="<?php esc_attr_e( 'Contact information', 'activate-rights-v2' ); ?>">
				<div class="contact-meta__group">
					<p class="contact-meta__label"><?php esc_html_e( 'Email', 'activate-rights-v2' ); ?></p>
					<p class="contact-meta__value">
						<a class="contact-meta__link" href="mailto:info@activaterights.org">info@activaterights.org</a>
					</p>
				</div>

				<div class="contact-meta__group">
					<p class="contact-meta__label"><?php esc_html_e( 'Office', 'activate-rights-v2' ); ?></p>
					<p class="contact-meta__value"><?php esc_html_e( 'Dhaka, Bangladesh', 'activate-rights-v2' ); ?></p>
				</div>

				<div class="contact-meta__group">
					<p class="contact-meta__label"><?php esc_html_e( 'Availability', 'activate-rights-v2' ); ?></p>
					<p class="contact-meta__value">
						<?php esc_html_e( 'Open for collaborations, research inquiries, media partnerships, and speaking.', 'activate-rights-v2' ); ?>
					</p>
				</div>

				<div class="contact-meta__group">
					<p class="contact-meta__label"><?php esc_html_e( 'Social', 'activate-rights-v2' ); ?></p>
					<nav class="contact-meta__social" aria-label="<?php esc_attr_e( 'Social links', 'activate-rights-v2' ); ?>">
						<a class="contact-meta__social-link editorial-link" href="#" rel="noopener noreferrer">
							<?php esc_html_e( 'X', 'activate-rights-v2' ); ?>
							<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
						</a>
						<a class="contact-meta__social-link editorial-link" href="#" rel="noopener noreferrer">
							<?php esc_html_e( 'Facebook', 'activate-rights-v2' ); ?>
							<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
						</a>
						<a class="contact-meta__social-link editorial-link" href="#" rel="noopener noreferrer">
							<?php esc_html_e( 'Instagram', 'activate-rights-v2' ); ?>
							<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
						</a>
					</nav>
				</div>
			</aside>

			<form
				class="contact-form"
				action="<?php echo esc_url( $contact_url ); ?>"
				method="post"
				aria-labelledby="contact-form-title"
			>
				<h2 class="screen-reader-text" id="contact-form-title"><?php esc_html_e( 'Send a message', 'activate-rights-v2' ); ?></h2>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-name"><?php esc_html_e( 'Name', 'activate-rights-v2' ); ?></label>
					<input class="contact-form__input" type="text" id="contact-name" name="contact_name" autocomplete="name" required>
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-email"><?php esc_html_e( 'Email', 'activate-rights-v2' ); ?></label>
					<input class="contact-form__input" type="email" id="contact-email" name="contact_email" autocomplete="email" required>
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-organization"><?php esc_html_e( 'Organization', 'activate-rights-v2' ); ?></label>
					<input class="contact-form__input" type="text" id="contact-organization" name="contact_organization" autocomplete="organization">
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-subject"><?php esc_html_e( 'Subject', 'activate-rights-v2' ); ?></label>
					<input class="contact-form__input" type="text" id="contact-subject" name="contact_subject" required>
				</div>

				<div class="contact-form__field">
					<label class="contact-form__label" for="contact-message"><?php esc_html_e( 'Message', 'activate-rights-v2' ); ?></label>
					<textarea class="contact-form__textarea" id="contact-message" name="contact_message" rows="5" required></textarea>
				</div>

				<button class="section-meta__cta contact-form__submit" type="submit">
					<?php esc_html_e( 'Send Message', 'activate-rights-v2' ); ?>
					<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
				</button>
			</form>
		</div>
	</section>
</div>

<?php
get_footer();
