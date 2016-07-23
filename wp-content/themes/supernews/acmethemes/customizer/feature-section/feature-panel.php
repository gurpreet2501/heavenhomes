<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'supernews-feature-panel', array(
    'priority'       => 105,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Section Options', 'supernews' ),
    'description'    => __( 'Customize your awesome site feature section ', 'supernews' )
) );

/*
* file for feature slider category
*/
$supernews_customizer_feature_category_file_path = supernews_file_directory('acmethemes/customizer/feature-section/feature-category.php');
require $supernews_customizer_feature_category_file_path;

/*
* file for feature section enable
*/
$supernews_customizer_feature_enable_file_path = supernews_file_directory('acmethemes/customizer/feature-section/feature-enable.php');
require $supernews_customizer_feature_enable_file_path;