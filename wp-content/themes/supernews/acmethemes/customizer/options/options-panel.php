<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'supernews-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'supernews' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'supernews' )
) );

/*
* file for header breadcrumb options
*/
$supernews_customizer_options_breadcrumb_file_path = supernews_file_directory('acmethemes/customizer/options/breadcrumb.php');
require $supernews_customizer_options_breadcrumb_file_path;

/*
* file for header search options
*/
$supernews_customizer_options_search_file_path = supernews_file_directory('acmethemes/customizer/options/search.php');
require $supernews_customizer_options_search_file_path;