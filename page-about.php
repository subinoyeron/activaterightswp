<?php
/**
 * About page template.
 *
 * WordPress automatically uses this file for any Page with the slug "about".
 * No post loop — static sections only.
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$marquee_icons = array(
	'Group 1876.svg',
	'Group 1877.svg',
	'Group 1878.svg',
	'Group 1879.svg',
);

if ( ! function_exists( 'arv2_marquee_icon_src' ) ) {
	/**
	 * Resolve a marquee icon URL from assets/images.
	 *
	 * @param string $filename SVG filename.
	 * @return string
	 */
	function arv2_marquee_icon_src( $filename ) {
		$url = arv2_get_image_url( $filename );

		if ( ! $url ) {
			$url = get_template_directory_uri() . '/assets/images/' . rawurlencode( $filename );
		}

		return $url;
	}
}

$partner_logos = arv2_get_partner_logos();

get_header();
?>

<section
	class="collective-statement"
	aria-labelledby="collective-statement-title"
	style="background-image: url('<?php echo esc_url( arv2_statement_asset( 'bgbluebirdss.jpg' ) ); ?>');"
>
	<div class="collective-statement__grid">
		<blockquote class="collective-statement__block" id="collective-statement-title">
			<div class="collective-statement__line collective-statement__line--1">
				<span class="collective-statement__slashes">//</span>
				<span>we are a collective</span>
			</div>
			<div class="collective-statement__line collective-statement__line--media">
				fighting for
				<span class="collective-statement__image-pair">
					<img class="collective-statement__inline collective-statement__inline--ear" src="<?php echo esc_url( arv2_statement_asset( 'ear.jpg' ) ); ?>" alt="">
					<img class="collective-statement__inline collective-statement__inline--lips" src="<?php echo esc_url( arv2_statement_asset( 'lips.jpg' ) ); ?>" alt="">
				</span>
			</div>
			<div class="collective-statement__line">free speech, human rights,</div>
			<div class="collective-statement__line collective-statement__line--media">
				and
				<img class="collective-statement__inline collective-statement__inline--eyes" src="<?php echo esc_url( arv2_statement_asset( 'eyes red.jpg' ) ); ?>" alt="">
				an open internet
			</div>
		</blockquote>
	</div>
</section>

<section class="what-we-do home-section" aria-labelledby="what-we-do-title">
	<header class="section-header">
		<h2 class="section-title" id="what-we-do-title">what we do</h2>

		<?php
		arv2_section_meta(
			'Research, archives, and community-driven interventions defending digital rights and collective memory.',
			home_url( '/about' ),
			true,
			__( 'About us', 'activate-rights-v2' ),
			__( 'About Us', 'activate-rights-v2' )
		);
		?>
	</header>

	<div class="what-we-do__grid">
		<div class="what-we-do__categories">
			<div class="what-we-do__row">
				<p class="what-we-do__category">
					<span class="what-we-do__prefix"><span class="what-we-do__slashes">//</span> <?php esc_html_e( 'Censorship', 'activate-rights-v2' ); ?></span>
					<span class="what-we-do__line"><?php esc_html_e( 'Monitoring', 'activate-rights-v2' ); ?></span>
				</p>
				<p class="what-we-do__description">
					<?php esc_html_e( 'We monitor censorship, internet shutdowns, and state-led digital restrictions to document abuses and demand accountability.', 'activate-rights-v2' ); ?>
				</p>
			</div>

			<div class="what-we-do__row">
				<p class="what-we-do__category">
					<span class="what-we-do__prefix"><span class="what-we-do__slashes">//</span> <?php esc_html_e( 'Archive', 'activate-rights-v2' ); ?></span>
					<span class="what-we-do__line"><?php esc_html_e( 'Violence', 'activate-rights-v2' ); ?></span>
				</p>
				<p class="what-we-do__description">
					<?php esc_html_e( 'We archive stories, violence, resistance, and collective memory to preserve erased histories.', 'activate-rights-v2' ); ?>
				</p>
			</div>

			<div class="what-we-do__row">
				<p class="what-we-do__category">
					<span class="what-we-do__prefix"><span class="what-we-do__slashes">//</span> <?php esc_html_e( 'Empower', 'activate-rights-v2' ); ?></span>
					<span class="what-we-do__line"><?php esc_html_e( 'Community', 'activate-rights-v2' ); ?></span>
				</p>
				<p class="what-we-do__description">
					<?php esc_html_e( 'We build tools, train communities, and strengthen digital rights awareness for collective action.', 'activate-rights-v2' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>

<section class="rights-marquee" aria-label="<?php esc_attr_e( 'Digital rights are human rights', 'activate-rights-v2' ); ?>">
	<div class="marquee-track">
		<?php for ( $group = 0; $group < 2; $group++ ) : ?>
			<div class="marquee-track__group"<?php echo 1 === $group ? ' aria-hidden="true"' : ''; ?>>
				<?php for ( $repeat = 0; $repeat < 4; $repeat++ ) : ?>
					<span class="marquee-item marquee-item--text"><?php esc_html_e( 'Digital', 'activate-rights-v2' ); ?></span>

					<img class="marquee-icon" src="<?php echo esc_url( arv2_marquee_icon_src( $marquee_icons[0] ) ); ?>" alt="">

					<span class="marquee-item marquee-item--text"><?php esc_html_e( 'Rights', 'activate-rights-v2' ); ?></span>

					<img class="marquee-icon" src="<?php echo esc_url( arv2_marquee_icon_src( $marquee_icons[1] ) ); ?>" alt="">

					<span class="marquee-item marquee-item--text"><?php esc_html_e( 'Are Human', 'activate-rights-v2' ); ?></span>

					<img class="marquee-icon" src="<?php echo esc_url( arv2_marquee_icon_src( $marquee_icons[2] ) ); ?>" alt="">

					<span class="marquee-item marquee-item--text"><?php esc_html_e( 'Rights', 'activate-rights-v2' ); ?></span>

					<img class="marquee-icon" src="<?php echo esc_url( arv2_marquee_icon_src( $marquee_icons[3] ) ); ?>" alt="">
				<?php endfor; ?>
			</div>
		<?php endfor; ?>
	</div>
</section>

<section class="our-team home-section" aria-labelledby="our-team-title">
	<header class="section-header">
		<h2 class="section-title" id="our-team-title">our team</h2>
	</header>

	<div class="our-team__grid">
		<div class="our-team__cards">
			<article class="our-team__card">
				<div class="our-team__photo" aria-hidden="true"></div>
				<div class="our-team__body">
					<h3 class="our-team__name">Shoeb Abdullah</h3>
					<p class="our-team__role">Co-founder</p>
				</div>
			</article>

			<article class="our-team__card">
				<div class="our-team__photo" aria-hidden="true"></div>
				<div class="our-team__body">
					<h3 class="our-team__name">Subinoy Eron</h3>
					<p class="our-team__role">Co-founder</p>
				</div>
			</article>

			<article class="our-team__card">
				<div class="our-team__photo" aria-hidden="true"></div>
				<div class="our-team__body">
					<h3 class="our-team__name">Maruf Hossain</h3>
					<p class="our-team__role">Community &amp; Research</p>
				</div>
			</article>
		</div>
	</div>
</section>

<section class="partners home-section" aria-labelledby="partners-title">
	<header class="section-header">
		<h2 class="section-title" id="partners-title">partners</h2>

		<?php
		arv2_section_meta(
			'Partnerships with organizations, journalists, artists, and communities building collective resistance.',
			home_url( '/contact' ),
			true,
			__( 'Contact us', 'activate-rights-v2' ),
			__( 'Contact Us', 'activate-rights-v2' )
		);
		?>
	</header>

	<?php if ( ! empty( $partner_logos ) ) : ?>
		<div class="partners__logo-wall">
				<?php foreach ( $partner_logos as $partner_logo ) : ?>
					<?php if ( empty( $partner_logo['url'] ) ) : ?>
						<?php continue; ?>
					<?php endif; ?>
					<div class="partners__logo-cell">
						<img
							class="partners__logo"
							src="<?php echo esc_url( $partner_logo['url'] ); ?>"
							alt="<?php echo esc_attr( $partner_logo['alt'] ); ?>"
							loading="lazy"
							decoding="async"
						>
					</div>
				<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>

<?php
get_footer();
