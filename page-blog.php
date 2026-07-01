<?php
/**
 * Blog page template.
 *
 * WordPress automatically uses this file for any Page with the slug "blog".
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$featured_article = array(
	'title'    => 'Faith, Fear, and Falsehoods: Mapping Communal Misinformation and Hate in Bangladesh\'s 2026 Election',
	'excerpt'  => 'A research report on how communal misinformation, AI-generated deception, and coordinated narrative manipulation shaped Bangladesh\'s 2026 election.',
	'date'     => __( 'February 27, 2026', 'activate-rights-v2' ),
	'author'   => __( 'Minhaj Aman', 'activate-rights-v2' ),
	'category' => __( 'Investigation', 'activate-rights-v2' ),
	'thumb'    => 'blue',
	'url'      => '#',
);

$archive_articles = array(
	array(
		'title'    => 'Right to Record in Elections: A Guide to Documenting Electoral Irregularities and Violence',
		'excerpt'  => 'A practical guide on safely documenting election violence, irregularities, and protecting citizens\' right to record for accountability.',
		'author'   => 'Subinoy Mustofi Eron',
		'date'     => 'February 10, 2026',
		'category' => 'Field Notes',
		'thumb'    => 'green',
		'url'      => '#',
	),
	array(
		'title'    => 'When Visibility Becomes Vulnerability: TFGBV in Post-Uprising Bangladesh',
		'excerpt'  => 'An analysis of technology-facilitated gender-based violence in Bangladesh after the uprising and its implications for digital safety.',
		'author'   => 'Subinoy Mustofi Eron',
		'date'     => 'February 9, 2026',
		'category' => 'Investigation',
		'thumb'    => 'yellow',
		'url'      => '#',
	),
	array(
		'title'    => 'Frequently Asked Questions — Archive & Resist Conclave',
		'excerpt'  => 'Everything participants need to know about the Archive & Resist Conclave, including sessions, logistics, and participation details.',
		'author'   => 'Subinoy Mustofi Eron',
		'date'     => 'December 25, 2025',
		'category' => 'Event',
		'thumb'    => 'red',
		'url'      => '#',
	),
	array(
		'title'    => 'Call for Proposals: Archive & Resist Conclave 2026 — Now Open',
		'excerpt'  => 'An open invitation for practitioners, researchers, and activists to submit session proposals for the 2026 conclave.',
		'author'   => 'Subinoy Mustofi Eron',
		'date'     => 'December 24, 2025',
		'category' => 'Event',
		'thumb'    => 'blue',
		'url'      => '#',
	),
	array(
		'title'    => 'Biometric SIMs: A Relic of Authoritarianism Bangladesh Forgot to Question',
		'excerpt'  => 'A critical reflection on biometric SIM registration and its long-term implications for privacy, surveillance, and state control.',
		'author'   => 'Subinoy Mustofi Eron',
		'date'     => 'December 4, 2025',
		'category' => 'Opinion',
		'thumb'    => 'green',
		'url'      => '#',
	),
);

get_header();
?>

<div class="blog-page">
	<section class="blog-intro home-section" aria-labelledby="blog-intro-title">
		<div class="home-section__grid">
			<p class="blog-intro__lead" id="blog-intro-title">
				<?php esc_html_e( 'Stories, reflections, investigations, and timely writing on digital rights, surveillance, resistance, and collective memory.', 'activate-rights-v2' ); ?>
			</p>
		</div>
	</section>

	<article class="blog-featured home-section" aria-labelledby="blog-featured-title">
		<div class="home-section__grid">
			<hr class="blog-featured__rule">

			<a class="blog-featured__media-link" href="<?php echo esc_url( $featured_article['url'] ); ?>">
				<div class="blog-featured__thumb blog-featured__thumb--<?php echo esc_attr( $featured_article['thumb'] ); ?>" aria-hidden="true"></div>
			</a>

			<div class="blog-featured__content">
				<h2 class="blog-featured__title" id="blog-featured-title">
					<a href="<?php echo esc_url( $featured_article['url'] ); ?>"><?php echo esc_html( $featured_article['title'] ); ?></a>
				</h2>

				<p class="blog-featured__excerpt"><?php echo esc_html( $featured_article['excerpt'] ); ?></p>

				<p class="blog-featured__meta">
					<?php
					echo esc_html( $featured_article['author'] );
					echo ' / ';
					echo esc_html( $featured_article['category'] );
					?>
				</p>

				<time class="blog-featured__date" datetime="2026-02-27"><?php echo esc_html( $featured_article['date'] ); ?></time>

				<a class="blog-featured__cta" href="<?php echo esc_url( $featured_article['url'] ); ?>">
					<?php esc_html_e( 'Read More', 'activate-rights-v2' ); ?>
					<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
				</a>
			</div>
		</div>
	</article>

	<section class="blog-archive home-section" id="blog-archive" aria-label="<?php esc_attr_e( 'Blog archive', 'activate-rights-v2' ); ?>">
		<ul class="blog-archive__list">
			<?php foreach ( $archive_articles as $article ) : ?>
				<li class="blog-archive__item">
					<a class="blog-archive__link" href="<?php echo esc_url( $article['url'] ); ?>">
						<div class="home-section__grid blog-archive__grid">
							<div class="blog-archive__content">
								<h3 class="blog-archive__title"><?php echo esc_html( $article['title'] ); ?></h3>
								<p class="blog-archive__excerpt"><?php echo esc_html( $article['excerpt'] ); ?></p>
								<p class="blog-archive__meta">
									<?php
									echo esc_html( $article['author'] );
									echo ' / ';
									echo esc_html( $article['category'] );
									?>
								</p>
								<time class="blog-archive__date"><?php echo esc_html( $article['date'] ); ?></time>
							</div>

							<div class="blog-archive__media">
								<div class="blog-archive__thumb blog-archive__thumb--<?php echo esc_attr( $article['thumb'] ); ?>" aria-hidden="true"></div>
							</div>
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
</div>

<?php
get_footer();
