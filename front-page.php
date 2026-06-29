<?php
/**
 * Front page template — centered green hero.
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$site_logo    = arv2_get_logo_url();
$cursor_image = arv2_get_image_url( 'cursor png.png' );

if ( ! $cursor_image ) {
	$cursor_image = get_template_directory_uri() . '/assets/images/cursor%20png.png';
}

$marquee_icons = array(
	'Group 1876.svg',
	'Group 1877.svg',
	'Group 1878.svg',
	'Group 1879.svg',
);

/**
 * Resolve a marquee icon URL from assets/images.
 *
 * @param string $filename SVG filename.
 * @return string
 */
if ( ! function_exists( 'arv2_marquee_icon_src' ) ) {
	function arv2_marquee_icon_src( $filename ) {
		$url = arv2_get_image_url( $filename );

		if ( ! $url ) {
			$url = get_template_directory_uri() . '/assets/images/' . rawurlencode( $filename );
		}

		return $url;
	}
}

$partner_logos = arv2_get_partner_logos();

/**
 * Resolve a statement section asset URL.
 *
 * @param string $filename Asset filename.
 * @return string
 */
if ( ! function_exists( 'arv2_statement_asset' ) ) {
	function arv2_statement_asset( $filename ) {
		$url = arv2_get_image_url( $filename );

		if ( ! $url ) {
			$url = get_template_directory_uri() . '/assets/images/' . rawurlencode( $filename );
		}

		return $url;
	}
}

get_header();
?>

<div class="ar-home">
	<section class="ar-hero" aria-labelledby="ar-hero-title">
		<a class="ar-hero__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				class="ar-hero__brand-logo"
				src="<?php echo esc_url( $site_logo ); ?>"
				alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
				width="467"
				height="187"
				decoding="async"
			>
		</a>

		<button class="ar-hero__menu" type="button" aria-label="<?php esc_attr_e( 'Open menu', 'activate-rights-v2' ); ?>">
			<?php esc_html_e( 'Menu', 'activate-rights-v2' ); ?>
		</button>

		<div class="ar-hero__stage">
			<img
				class="ar-hero__cursor"
				src="<?php echo esc_url( $cursor_image ); ?>"
				alt=""
				aria-hidden="true"
				decoding="async"
			>

			<div class="ar-hero__content">
				<h1 class="ar-hero__title" id="ar-hero-title">
					<span class="ar-hero__line ar-hero__line--1">internet</span>
					<span class="ar-hero__line ar-hero__line--2">demands</span>
					<span class="ar-hero__line ar-hero__line--3">freedom</span>
				</h1>

				<p class="ar-hero__subtitle">and we work for that</p>

				<a class="ar-hero__cta" href="#contact">Let&rsquo;s Collab?</a>
			</div>
		</div>
	</section>
</div>

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

<section class="what-we-do home-section" aria-labelledby="what-we-do-title">
	<header class="section-header">
		<h2 class="section-title" id="what-we-do-title">what we do</h2>

		<?php
		arv2_section_meta(
			'Research, archives, and community-driven interventions defending digital rights and collective memory.'
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

<section class="projects home-section" aria-labelledby="projects-title">
	<header class="section-header">
		<h2 class="section-title" id="projects-title">projects</h2>

		<?php
		arv2_section_meta(
			'Tools and infrastructures built to monitor censorship, preserve resistance, and document public history.'
		);
		?>
	</header>

	<div class="projects__grid">
			<article class="projects__item">
				<a
					class="projects__card"
					href="https://shutdown.activaterights.org/"
					target="_blank"
					rel="noopener noreferrer"
				>
					<div class="projects__thumb projects__thumb--green">
						<span class="projects__thumb-label">Shutdown Watch</span>
						<span class="card-circle-arrow card-circle-arrow--light" aria-hidden="true">
							<svg class="card-circle-arrow__icon" width="40" height="40" viewBox="0 0 48 48" fill="none" aria-hidden="true">
								<circle cx="24" cy="24" r="22.5" stroke="currentColor" stroke-width="1"/>
								<path d="M18 24h12M28 20l4 4-4 4" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
					</div>
					<div class="projects__meta">
						<h3 class="projects__name">Shutdown Watch</h3>
					</div>
				</a>
			</article>

			<article class="projects__item">
				<a
					class="projects__card"
					href="https://www.bangladeshprotestarchive.com/"
					target="_blank"
					rel="noopener noreferrer"
				>
					<div class="projects__thumb projects__thumb--yellow">
						<span class="projects__thumb-label">Bangladesh Protest Archive</span>
						<span class="card-circle-arrow card-circle-arrow--dark" aria-hidden="true">
							<svg class="card-circle-arrow__icon" width="40" height="40" viewBox="0 0 48 48" fill="none" aria-hidden="true">
								<circle cx="24" cy="24" r="22.5" stroke="currentColor" stroke-width="1"/>
								<path d="M18 24h12M28 20l4 4-4 4" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
					</div>
					<div class="projects__meta">
						<h3 class="projects__name">Bangladesh Protest Archive</h3>
					</div>
				</a>
			</article>

			<article class="projects__item">
				<a
					class="projects__card"
					href="https://wherewestood.activaterights.org/"
					target="_blank"
					rel="noopener noreferrer"
				>
					<div class="projects__thumb projects__thumb--blue">
						<span class="projects__thumb-label">Where We Stood</span>
						<span class="card-circle-arrow card-circle-arrow--light" aria-hidden="true">
							<svg class="card-circle-arrow__icon" width="40" height="40" viewBox="0 0 48 48" fill="none" aria-hidden="true">
								<circle cx="24" cy="24" r="22.5" stroke="currentColor" stroke-width="1"/>
								<path d="M18 24h12M28 20l4 4-4 4" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
					</div>
					<div class="projects__meta">
						<h3 class="projects__name">Where We Stood</h3>
					</div>
				</a>
			</article>
		</div>
</section>

<section class="initiatives home-section" aria-labelledby="initiatives-title">
	<header class="section-header">
		<h2 class="section-title" id="initiatives-title">initiatives</h2>

		<?php
		arv2_section_meta(
			'Collaborative gatherings, exhibitions, and solidarity-driven spaces for memory and justice.'
		);
		?>
	</header>

	<div class="initiatives__list">
			<article class="initiatives__card">
				<div class="initiatives__media-wrap">
					<div class="initiatives__media initiatives__media--blue">
						<span class="initiatives__media-label">Bangladesh Protest Archive</span>
					</div>
					<a class="card-circle-arrow card-circle-arrow--light" href="#" aria-label="<?php esc_attr_e( 'View Bangladesh Protest Archive', 'activate-rights-v2' ); ?>">
						<svg class="card-circle-arrow__icon" width="40" height="40" viewBox="0 0 48 48" fill="none" aria-hidden="true">
							<circle cx="24" cy="24" r="22.5" stroke="currentColor" stroke-width="1"/>
							<path d="M18 24h12M28 20l4 4-4 4" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</a>
				</div>
				<div class="initiatives__footer">
					<div class="initiatives__content">
						<h3 class="initiatives__name">Bangladesh Protest Archive</h3>
						<p class="initiatives__desc">A living archive documenting protest memories, testimonies, and resistance across Bangladesh.</p>
					</div>
				</div>
			</article>

			<article class="initiatives__card">
				<div class="initiatives__media-wrap">
					<div class="initiatives__media initiatives__media--red">
						<span class="initiatives__media-label">Archive &amp; Resist Fest Conclave</span>
					</div>
					<a class="card-circle-arrow card-circle-arrow--light" href="#" aria-label="<?php esc_attr_e( 'View Archive &amp; Resist Fest Conclave', 'activate-rights-v2' ); ?>">
						<svg class="card-circle-arrow__icon" width="40" height="40" viewBox="0 0 48 48" fill="none" aria-hidden="true">
							<circle cx="24" cy="24" r="22.5" stroke="currentColor" stroke-width="1"/>
							<path d="M18 24h12M28 20l4 4-4 4" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</a>
				</div>
				<div class="initiatives__footer">
					<div class="initiatives__content">
						<h3 class="initiatives__name">Archive &amp; Resist Fest Conclave</h3>
						<p class="initiatives__desc">A gathering of films, conversations, and solidarity practices on torture prevention, transitional justice, and collective memory.</p>
					</div>
				</div>
			</article>
		</div>
</section>

<section class="published-reports home-section" aria-labelledby="published-reports-title">
	<header class="section-header">
		<h2 class="section-title" id="published-reports-title">reports</h2>

		<?php
		arv2_section_meta(
			'Research, investigations, and publications unpacking surveillance, violence, and internet freedom.'
		);
		?>
	</header>

	<div class="published-reports__track" tabindex="0">
			<article class="published-reports__card">
				<a class="published-reports__card-link" href="#">
					<div class="published-reports__thumb-wrap">
						<div class="published-reports__thumb published-reports__thumb--green" aria-hidden="true"></div>
					</div>
					<h3 class="published-reports__name">Internet Shutdowns in Bangladesh</h3>
					<p class="published-reports__excerpt">An investigation into how network blackouts are used to suppress dissent, silence journalists, and reshape civic life across Bangladesh.</p>
					<span class="published-reports__cta">
						<span class="published-reports__cta-text">Read Report</span>
						<span class="published-reports__cta-arrow" aria-hidden="true">→</span>
					</span>
				</a>
			</article>

			<article class="published-reports__card">
				<a class="published-reports__card-link" href="#">
					<div class="published-reports__thumb-wrap">
						<div class="published-reports__thumb published-reports__thumb--blue" aria-hidden="true"></div>
					</div>
					<h3 class="published-reports__name">Surveillance and Civic Space</h3>
					<p class="published-reports__excerpt">Mapping the expansion of digital surveillance tools and their chilling effect on activists, lawyers, and independent media.</p>
					<span class="published-reports__cta">
						<span class="published-reports__cta-text">Read Report</span>
						<span class="published-reports__cta-arrow" aria-hidden="true">→</span>
					</span>
				</a>
			</article>

			<article class="published-reports__card">
				<a class="published-reports__card-link" href="#">
					<div class="published-reports__thumb-wrap">
						<div class="published-reports__thumb published-reports__thumb--yellow" aria-hidden="true"></div>
					</div>
					<h3 class="published-reports__name">Digital Authoritarianism in South Asia</h3>
					<p class="published-reports__excerpt">A regional analysis of laws, platforms, and state practices that are narrowing the space for free expression online.</p>
					<span class="published-reports__cta">
						<span class="published-reports__cta-text">Read Report</span>
						<span class="published-reports__cta-arrow" aria-hidden="true">→</span>
					</span>
				</a>
			</article>

			<article class="published-reports__card">
				<a class="published-reports__card-link" href="#">
					<div class="published-reports__thumb-wrap">
						<div class="published-reports__thumb published-reports__thumb--red" aria-hidden="true"></div>
					</div>
					<h3 class="published-reports__name">The Cost of Censorship</h3>
					<p class="published-reports__excerpt">Examining the human, economic, and democratic toll when governments restrict access to information and public debate.</p>
					<span class="published-reports__cta">
						<span class="published-reports__cta-text">Read Report</span>
						<span class="published-reports__cta-arrow" aria-hidden="true">→</span>
					</span>
				</a>
			</article>
		</div>
</section>

<section class="updates-blog home-section" aria-labelledby="updates-blog-label">
	<header class="section-header">
		<h2 class="section-title" id="updates-blog-label">updates</h2>

		<?php
		arv2_section_meta(
			'Latest reports, resources, and updates from our work on digital rights, surveillance, accountability, and collective memory.'
		);
		?>
	</header>

	<div class="updates-blog__layout">
		<div class="updates-blog__content">
			<article class="updates-blog__featured">
					<a class="updates-blog__featured-link" href="#">
						<span class="updates-blog__category">Report</span>
						<div class="updates-blog__featured-thumb-wrap">
							<div class="updates-blog__featured-thumb updates-blog__thumb--blue" aria-hidden="true"></div>
						</div>
						<h3 class="updates-blog__featured-title">Faith, Fear, and Falsehoods: Mapping Communal Misinformation and Hate in Bangladesh&rsquo;s 2026 Election</h3>
						<p class="updates-blog__featured-excerpt">A research report on how communal misinformation, AI-generated deception, and coordinated narrative manipulation shaped Bangladesh&rsquo;s 2026 election.</p>
						<p class="updates-blog__meta">Minhaj Aman · February 27, 2026</p>
						<span class="updates-blog__cta">Read More <span aria-hidden="true">→</span></span>
					</a>
					<hr class="updates-blog__divider">
				</article>

				<ul class="updates-blog__list">
					<li class="updates-blog__item">
						<a class="updates-blog__item-link" href="#">
							<div class="updates-blog__item-thumb-wrap">
								<div class="updates-blog__item-thumb updates-blog__thumb--green" aria-hidden="true"></div>
							</div>
							<div class="updates-blog__item-body">
								<span class="updates-blog__category">Resource</span>
								<h3 class="updates-blog__item-title">Right to Record in Elections: A Guide to Documenting Electoral Irregularities and Violence</h3>
								<p class="updates-blog__item-excerpt">A practical guide on safely documenting election violence, irregularities, and protecting citizens&rsquo; right to record for accountability.</p>
								<p class="updates-blog__meta">Subinoy Mustofi Eron · February 10, 2026</p>
							</div>
							<span class="updates-blog__item-arrow" aria-hidden="true">→</span>
						</a>
					</li>
					<li class="updates-blog__item">
						<a class="updates-blog__item-link" href="#">
							<div class="updates-blog__item-thumb-wrap">
								<div class="updates-blog__item-thumb updates-blog__thumb--yellow" aria-hidden="true"></div>
							</div>
							<div class="updates-blog__item-body">
								<span class="updates-blog__category">Report</span>
								<h3 class="updates-blog__item-title">When Visibility Becomes Vulnerability: TFGBV in Post-Uprising Bangladesh</h3>
								<p class="updates-blog__item-excerpt">An analysis of technology-facilitated gender-based violence in Bangladesh after the uprising and its implications for digital safety.</p>
								<p class="updates-blog__meta">Subinoy Mustofi Eron · February 9, 2026</p>
							</div>
							<span class="updates-blog__item-arrow" aria-hidden="true">→</span>
						</a>
					</li>
					<li class="updates-blog__item">
						<a class="updates-blog__item-link" href="#">
							<div class="updates-blog__item-thumb-wrap">
								<div class="updates-blog__item-thumb updates-blog__thumb--red" aria-hidden="true"></div>
							</div>
							<div class="updates-blog__item-body">
								<span class="updates-blog__category">Update</span>
								<h3 class="updates-blog__item-title">Frequently Asked Questions — Archive &amp; Resist Conclave</h3>
								<p class="updates-blog__item-excerpt">Everything participants need to know about the Archive &amp; Resist Conclave, including sessions, logistics, and participation details.</p>
								<p class="updates-blog__meta">Subinoy Mustofi Eron · December 25, 2025</p>
							</div>
							<span class="updates-blog__item-arrow" aria-hidden="true">→</span>
						</a>
					</li>
					<li class="updates-blog__item">
						<a class="updates-blog__item-link" href="#">
							<div class="updates-blog__item-thumb-wrap">
								<div class="updates-blog__item-thumb updates-blog__thumb--blue" aria-hidden="true"></div>
							</div>
							<div class="updates-blog__item-body">
								<span class="updates-blog__category">Update</span>
								<h3 class="updates-blog__item-title">Call for Proposals: Archive &amp; Resist Conclave 2026 — Now Open</h3>
								<p class="updates-blog__item-excerpt">An open invitation for practitioners, researchers, and activists to submit session proposals for the 2026 conclave.</p>
								<p class="updates-blog__meta">Subinoy Mustofi Eron · December 24, 2025</p>
							</div>
							<span class="updates-blog__item-arrow" aria-hidden="true">→</span>
						</a>
					</li>
					<li class="updates-blog__item">
						<a class="updates-blog__item-link" href="#">
							<div class="updates-blog__item-thumb-wrap">
								<div class="updates-blog__item-thumb updates-blog__thumb--green" aria-hidden="true"></div>
							</div>
							<div class="updates-blog__item-body">
								<span class="updates-blog__category">Opinion</span>
								<h3 class="updates-blog__item-title">Biometric SIMs: A Relic of Authoritarianism Bangladesh Forgot to Question</h3>
								<p class="updates-blog__item-excerpt">A critical reflection on biometric SIM registration and its long-term implications for privacy, surveillance, and state control.</p>
								<p class="updates-blog__meta">Subinoy Mustofi Eron · December 4, 2025</p>
							</div>
							<span class="updates-blog__item-arrow" aria-hidden="true">→</span>
						</a>
					</li>
			</ul>
		</div>
	</div>
</section>

<section class="partners home-section" aria-labelledby="partners-title">
	<header class="section-header">
		<h2 class="section-title" id="partners-title">partners</h2>

		<?php
		arv2_section_meta(
			'Partnerships with organizations, journalists, artists, and communities building collective resistance.'
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
