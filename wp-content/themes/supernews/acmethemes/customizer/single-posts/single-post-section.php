<?php
/*adding sections for Single post options*/
$wp_customize->add_section( 'supernews-single-post', array(
    'priority'       => 200,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Single Post Options', 'supernews' )
) );

/*show rlated posts*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-show-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-show-related'],
    'sanitize_callback' => 'supernews_sanitize_checkbox'
) );
$wp_customize->add_control( 'supernews_theme_options[supernews-show-related]', array(
    'label'		=> __( 'Show Related Posts In Single Post', 'supernews' ),
    'section'   => 'supernews-single-post',
    'settings'  => 'supernews_theme_options[supernews-show-related]',
    'type'	  	=> 'checkbox',
    'priority'  => 10
) );
