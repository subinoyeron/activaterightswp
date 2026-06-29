<?php
/**
 * Main template — fallback for archives, blog index, and search results.
 *
 * @package Activate_Rights_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container">

	<header class="page-header">
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1 class="page-header__title"><?php single_post_title(); ?></h1>
		<?php elseif ( is_archive() ) : ?>
			<?php the_archive_title( '<h1 class="page-header__title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="section__description">', '</div>' ); ?>
		<?php elseif ( is_search() ) : ?>
			<h1 class="page-header__title">
				<?php
				printf(
					/* translators: %s: search query */
					esc_html__( 'Search Results for: %s', 'activate-rights-v2' ),
					'<span>' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
		<?php else : ?>
			<h1 class="page-header__title"><?php esc_html_e( 'Latest Posts', 'activate-rights-v2' ); ?></h1>
		<?php endif; ?>
	</header>

	<?php if ( have_posts() ) : ?>

		<div class="posts-list">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-entry' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php the_post_thumbnail( 'medium_large', array( 'class' => 'card__media' ) ); ?>
						</a>
					<?php endif; ?>

					<p class="post-entry__meta">
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
							<?php echo esc_html( get_the_date() ); ?>
						</time>
						<?php if ( get_the_category_list() ) : ?>
							&middot; <?php the_category( ', ' ); ?>
						<?php endif; ?>
					</p>

					<h2 class="post-entry__title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>

					<div class="card__excerpt">
						<?php the_excerpt(); ?>
					</div>

					<a class="btn btn--primary" href="<?php the_permalink(); ?>">
						<?php esc_html_e( 'Read More', 'activate-rights-v2' ); ?>
					</a>
				</article>
			<?php endwhile; ?>
		</div>

		<nav class="pagination" aria-label="<?php esc_attr_e( 'Posts navigation', 'activate-rights-v2' ); ?>">
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => __( '&larr; Previous', 'activate-rights-v2' ),
					'next_text' => __( 'Next &rarr;', 'activate-rights-v2' ),
				)
			);
			?>
		</nav>

	<?php else : ?>

		<div class="section">
			<p><?php esc_html_e( 'No posts found.', 'activate-rights-v2' ); ?></p>
			<?php get_search_form(); ?>
		</div>

	<?php endif; ?>

</div>

<?php
get_footer();
