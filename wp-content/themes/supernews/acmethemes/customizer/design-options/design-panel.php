<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'supernews-design-panel', array(
    'priority'       => 190,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'supernews' )
) );

/*
* file for sidebar layout
*/
$supernews_customizer_sidebar_layout_file_path = supernews_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');
require $supernews_customizer_sidebar_layout_file_path;

/*
* file for blog layout
*/
$supernews_customizer_blog_layout_file_path = supernews_file_directory('acmethemes/customizer/design-options/blog-layout.php');
require $supernews_customizer_blog_layout_file_path;

/*
* file for color options
*/
$supernews_customizer_colors_options_file_path = supernews_file_directory('acmethemes/customizer/design-options/colors-options.php');
require $supernews_customizer_colors_options_file_path;

/*
* file for background image layout
*/
$supernews_customizer_background_image_file_path = supernews_file_directory('acmethemes/customizer/design-options/background-image.php');
require $supernews_customizer_background_image_file_path;

/*
* file for custom css
*/
$supernews_customizer_custom_css_file_path = supernews_file_directory('acmethemes/customizer/design-options/custom-css.php');
require $supernews_customizer_custom_css_file_path;
