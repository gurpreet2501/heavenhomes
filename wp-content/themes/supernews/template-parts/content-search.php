<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AcmeThemes
 * @subpackage SuperNews
 */
global $supernews_customizer_all_values;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( $supernews_customizer_all_values['supernews-blog-archive-layout'] == 'show-image') {
		?>
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
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
			<?php supernews_list_category(); ?>
		</div><!-- .post-thumb-->
		<?php
	}
	?>
	<div class="post-content">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<div class="entry-meta">
				<?php if ( 'post' === get_post_type() ) : ?>
					<?php supernews_posted_on(); ?>
				<?php endif; ?>
				<?php supernews_entry_footer(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			the_excerpt();
			?>
			<a class="read-more" href="<?php the_permalink(); ?> "><?php esc_html_e('Read More', 'supernews'); ?></a>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->

