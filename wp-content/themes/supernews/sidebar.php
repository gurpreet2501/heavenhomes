<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AcmeThemes
 * @subpackage SuperNews
 */

if ( ! is_active_sidebar( 'supernews-sidebar' ) ) {
	return;
}
$sidebar_layout = supernews_sidebar_selection();
if( $sidebar_layout == "right-sidebar" || empty( $sidebar_layout ) ) : ?>
	<div id="secondary-right" class="widget-area sidebar secondary-sidebar float-right" role="complementary">
		<div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php dynamic_sidebar( 'supernews-sidebar' ); ?>
		</div>
	</div>
<?php endif; ?>
