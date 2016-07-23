<?php
/*adding header options panel*/
$wp_customize->add_panel( 'supernews-header-panel', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Options', 'supernews' ),
    'description'    => __( 'Customize your awesome site header ', 'supernews' )
) );

/*
* file for header logo options
*/
$supernews_customizer_header_logo_file_path = supernews_file_directory('acmethemes/customizer/header-options/header-logo.php');
require $supernews_customizer_header_logo_file_path;

/*
* file for header date options
*/
$supernews_customizer_header_date_file_path = supernews_file_directory('acmethemes/customizer/header-options/header-date.php');
require $supernews_customizer_header_date_file_path;

/*
* file for header news options
*/
$supernews_customizer_header_news_file_path = supernews_file_directory('acmethemes/customizer/header-options/header-news.php');
require $supernews_customizer_header_news_file_path;

/*
* file for header social options
*/
$supernews_customizer_header_social_file_path = supernews_file_directory('acmethemes/customizer/header-options/social-options.php');
require $supernews_customizer_header_social_file_path;

/*
* file for header add options
*/
$supernews_customizer_header_ad_file_path = supernews_file_directory('acmethemes/customizer/header-options/ad-option.php');
require $supernews_customizer_header_ad_file_path;

/*
* file for header menu options
*/
$supernews_customizer_header_search_option_file_path = supernews_file_directory('acmethemes/customizer/header-options/search-option.php');
require $supernews_customizer_header_search_option_file_path;



