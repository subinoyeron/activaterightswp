<?php
/**
 * Reports page template.
 *
 * WordPress automatically uses this file for any Page with the slug "reports".
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$report_filters = array(
	'all'            => __( 'All', 'activate-rights-v2' ),
	'reports'        => __( 'Reports', 'activate-rights-v2' ),
	'resources'      => __( 'Resources', 'activate-rights-v2' ),
	'guides'         => __( 'Guides', 'activate-rights-v2' ),
	'investigations' => __( 'Investigations', 'activate-rights-v2' ),
);

$featured_report = array(
	'title'    => 'Faith, Fear, and Falsehoods: Mapping Communal Misinformation and Hate in Bangladesh\'s 2026 Election',
	'excerpt'  => 'A research report on how communal misinformation, AI-generated deception, and coordinated narrative manipulation shaped Bangladesh\'s 2026 election.',
	'date'     => __( 'February 27, 2026', 'activate-rights-v2' ),
	'author'   => __( 'Minhaj Aman', 'activate-rights-v2' ),
	'category' => __( 'Report', 'activate-rights-v2' ),
	'thumb'    => 'blue',
	'url'      => '#',
	'pdf'      => '',
);

$archive_reports = array(
	array(
		'title'    => 'Internet Shutdowns in Bangladesh',
		'excerpt'  => 'An investigation into how network blackouts are used to suppress dissent, silence journalists, and reshape civic life across Bangladesh.',
		'author'   => 'Shoeb Abdullah',
		'date'     => 'January 18, 2026',
		'thumb'    => 'green',
		'url'      => '#',
	),
	array(
		'title'    => 'Surveillance and Civic Space',
		'excerpt'  => 'Mapping the expansion of digital surveillance tools and their chilling effect on activists, lawyers, and independent media.',
		'author'   => 'Subinoy Eron',
		'date'     => 'December 4, 2025',
		'thumb'    => 'blue',
		'url'      => '#',
	),
	array(
		'title'    => 'Digital Authoritarianism in South Asia',
		'excerpt'  => 'A regional analysis of laws, platforms, and state practices that are narrowing the space for free expression online.',
		'author'   => 'Maruf Hossain',
		'date'     => 'November 12, 2025',
		'thumb'    => 'yellow',
		'url'      => '#',
	),
	array(
		'title'    => 'The Cost of Censorship',
		'excerpt'  => 'Examining the human, economic, and democratic toll when governments restrict access to information and public debate.',
		'author'   => 'Activate Rights',
		'date'     => 'October 8, 2025',
		'thumb'    => 'red',
		'url'      => '#',
	),
	array(
		'title'    => 'Biometric IDs and Exclusion',
		'excerpt'  => 'How national biometric systems create new barriers to civic participation, welfare access, and political organizing.',
		'author'   => 'Shoeb Abdullah',
		'date'     => 'September 21, 2025',
		'thumb'    => 'blue',
		'url'      => '#',
	),
	array(
		'title'    => 'Platform Accountability in Crisis',
		'excerpt'  => 'Documenting how major platforms amplify harm during elections, shutdowns, and periods of mass protest.',
		'author'   => 'Subinoy Eron',
		'date'     => 'August 30, 2025',
		'thumb'    => 'green',
		'url'      => '#',
	),
);

get_header();
?>

<section class="reports-hero home-section" aria-labelledby="reports-hero-title">
	<header class="section-header">
		<h1 class="section-title" id="reports-hero-title">reports</h1>

		<?php
		arv2_section_meta(
			'Research reports, investigations, and public-interest publications on digital rights, surveillance, internet shutdowns, and accountability.',
			'#reports-archive',
			true,
			__( 'Browse reports archive', 'activate-rights-v2' ),
			__( 'Browse Archive', 'activate-rights-v2' )
		);
		?>
	</header>
</section>

<section class="reports-page home-section" aria-label="<?php esc_attr_e( 'Reports archive', 'activate-rights-v2' ); ?>">
	<div class="home-section__grid">
		<article class="reports-featured" aria-labelledby="reports-featured-title">
			<div class="reports-featured__thumb-wrap">
				<div class="reports-featured__thumb published-reports__thumb published-reports__thumb--<?php echo esc_attr( $featured_report['thumb'] ); ?>" aria-hidden="true"></div>
			</div>

			<div class="reports-featured__body">
				<span class="reports-featured__category"><?php echo esc_html( $featured_report['category'] ); ?></span>

				<h2 class="reports-featured__title" id="reports-featured-title">
					<a href="<?php echo esc_url( $featured_report['url'] ); ?>"><?php echo esc_html( $featured_report['title'] ); ?></a>
				</h2>

				<p class="reports-featured__excerpt"><?php echo esc_html( $featured_report['excerpt'] ); ?></p>

				<p class="reports-featured__meta">
					<?php
					echo esc_html( $featured_report['author'] );
					echo ' / ';
					echo esc_html( $featured_report['category'] );
					?>
				</p>

				<time class="reports-featured__date" datetime="2026-02-27"><?php echo esc_html( $featured_report['date'] ); ?></time>

				<div class="reports-featured__actions">
					<a class="reports-featured__read" href="<?php echo esc_url( $featured_report['url'] ); ?>">
						<?php esc_html_e( 'Read Report', 'activate-rights-v2' ); ?>
						<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
					</a>
					<?php if ( ! empty( $featured_report['pdf'] ) && '#' !== $featured_report['pdf'] ) : ?>
						<a class="reports-featured__pdf" href="<?php echo esc_url( $featured_report['pdf'] ); ?>">
							<?php esc_html_e( 'Download PDF', 'activate-rights-v2' ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</article>

		<div class="reports-toolbar" role="search">
			<div class="reports-filters" role="group" aria-label="<?php esc_attr_e( 'Filter reports', 'activate-rights-v2' ); ?>">
				<?php foreach ( $report_filters as $filter_id => $filter_label ) : ?>
					<button
						class="reports-filters__chip<?php echo 'all' === $filter_id ? ' is-active' : ''; ?>"
						type="button"
						data-filter="<?php echo esc_attr( $filter_id ); ?>"
					>
						<?php echo esc_html( $filter_label ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<label class="reports-search">
				<span class="screen-reader-text"><?php esc_html_e( 'Search reports', 'activate-rights-v2' ); ?></span>
				<input
					class="reports-search__input"
					type="search"
					name="reports-search"
					placeholder="<?php esc_attr_e( 'Search reports...', 'activate-rights-v2' ); ?>"
					autocomplete="off"
				>
			</label>
		</div>

		<div class="reports-archive" id="reports-archive">
			<div class="reports-archive__grid">
				<?php foreach ( $archive_reports as $report ) : ?>
					<article class="published-reports__card">
						<a class="published-reports__card-link" href="<?php echo esc_url( $report['url'] ); ?>">
							<div class="published-reports__thumb-wrap">
								<div class="published-reports__thumb published-reports__thumb--<?php echo esc_attr( $report['thumb'] ); ?>" aria-hidden="true"></div>
							</div>
							<h3 class="published-reports__name"><?php echo esc_html( $report['title'] ); ?></h3>
							<p class="published-reports__excerpt"><?php echo esc_html( $report['excerpt'] ); ?></p>
							<p class="reports-archive__meta">
								<?php echo esc_html( $report['author'] ); ?>
							</p>
							<time class="reports-archive__date"><?php echo esc_html( $report['date'] ); ?></time>
							<span class="published-reports__cta">
								<span class="published-reports__cta-text"><?php esc_html_e( 'Read Report', 'activate-rights-v2' ); ?></span>
								<?php echo arv2_editorial_arrow(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
							</span>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<nav class="reports-pagination" aria-label="<?php esc_attr_e( 'Reports archive pagination', 'activate-rights-v2' ); ?>">
			<a class="reports-pagination__link reports-pagination__link--prev" href="#" aria-disabled="true">
				<?php esc_html_e( 'Previous', 'activate-rights-v2' ); ?>
			</a>
			<a class="reports-pagination__link reports-pagination__link--next" href="#">
				<?php esc_html_e( 'Next', 'activate-rights-v2' ); ?>
			</a>
		</nav>
	</div>
</section>

<?php
get_footer();
