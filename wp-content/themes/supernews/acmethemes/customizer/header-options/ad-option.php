<?php
/*adding sections for header ad */
$wp_customize->add_section( 'supernews-header-ad-option', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Advertisement', 'supernews' ),
    'panel'          => 'supernews-header-panel'
) );

/*header ad img*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-header-main-banner-ads]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-header-main-banner-ads'],
    'sanitize_callback' => 'supernews_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'supernews_theme_options[supernews-header-main-banner-ads]',
        array(
            'label'		=> __( 'Header Ad Image', 'supernews' ),
            'section'   => 'supernews-header-ad-option',
            'settings'  => 'supernews_theme_options[supernews-header-main-banner-ads]',
            'type'	  	=> 'image',
            'priority'  => 10,
            'description' => __( 'Recommended image size of 728*90', 'supernews' )

        )
    )
);

/*header ad img link*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-header-main-banner-ads-link]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-header-main-banner-ads-link'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'supernews_theme_options[supernews-header-main-banner-ads-link]', array(
    'label'		=> __( 'Header Ad Image Link', 'supernews' ),
    'section'   => 'supernews-header-ad-option',
    'settings'  => 'supernews_theme_options[supernews-header-main-banner-ads-link]',
    'type'	  	=> 'url',
    'priority'  => 20
) );
