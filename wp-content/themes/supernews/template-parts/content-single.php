<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AcmeThemes
 * @subpackage SuperNews
 */
global $supernews_customizer_all_values;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--post thumbnal options-->
	<div class="post-thumb">
		<?php
		$thumb = 'large';
		if( 'no-sidebar' == $supernews_customizer_all_values['supernews-sidebar-layout'] ){
			$thumb = 'full';
		}
		if( has_post_thumbnail() ):
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumb );
		else:
			$image_url[0] = get_template_directory_uri().'/assets/img/no-image-840-480.png';
		endif;
		?>
		<img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
		<?php supernews_list_category(); ?>
	</div><!-- .post-thumb-->

	<div class="post-content">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
				<?php if ( 'post' === get_post_type() ) : ?>
					<?php supernews_posted_on(); ?>
				<?php endif; ?>
				<?php supernews_entry_footer( 1 ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'supernews' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->

