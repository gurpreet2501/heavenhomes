<?php
/**
 * The front-page template file.
 *
 * @package AcmeThemes
 * @subpackage SuperNews
 * @since Supernews 1.0.0
 */
get_header(); ?>
<?php
/**
 * supernews_action_front_page hook
 * @since supernews 1.0.0
 *
 * @hooked supernews_front_page -  10
 */
do_action( 'supernews_action_front_page' );
?>
<?php get_sidebar( 'left' ); ?>
<?php get_sidebar( ); ?>
<?php get_footer();