<?php
/*adding sections for header social options */
$wp_customize->add_section( 'supernews-header-social', array(
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Social Options', 'supernews' ),
    'panel'          => 'supernews-header-panel'
) );

/*facebook url*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-facebook-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-facebook-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'supernews_theme_options[supernews-facebook-url]', array(
    'label'		=> __( 'Facebook url', 'supernews' ),
    'section'   => 'supernews-header-social',
    'settings'  => 'supernews_theme_options[supernews-facebook-url]',
    'type'	  	=> 'url',
    'priority'  => 20
) );

/*twitter url*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-twitter-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-twitter-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'supernews_theme_options[supernews-twitter-url]', array(
    'label'		=> __( 'Twitter url', 'supernews' ),
    'section'   => 'supernews-header-social',
    'settings'  => 'supernews_theme_options[supernews-twitter-url]',
    'type'	  	=> 'url',
    'priority'  => 25
) );

/*youtube url*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-youtube-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-youtube-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'supernews_theme_options[supernews-youtube-url]', array(
    'label'		=> __( 'Youtube url', 'supernews' ),
    'section'   => 'supernews-header-social',
    'settings'  => 'supernews_theme_options[supernews-youtube-url]',
    'type'	  	=> 'url',
    'priority'  => 25
) );

/*enable social*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-enable-social]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-enable-social'],
    'sanitize_callback' => 'supernews_sanitize_checkbox',
) );
$wp_customize->add_control( 'supernews_theme_options[supernews-enable-social]', array(
    'label'		=> __( 'Enable social', 'supernews' ),
    'section'   => 'supernews-header-social',
    'settings'  => 'supernews_theme_options[supernews-enable-social]',
    'type'	  	=> 'checkbox',
    'priority'  => 30
) );