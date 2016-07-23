<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'supernews-feature-category', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category Selection For Featured Section', 'supernews' ),
    'panel'          => 'supernews-feature-panel'
) );

/* feature cat selection */
$wp_customize->add_setting( 'supernews_theme_options[supernews-feature-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-feature-cat'],
    'sanitize_callback' => 'supernews_sanitize_number'
) );

$wp_customize->add_control(
    new Supernews_Customize_Category_Dropdown_Control(
        $wp_customize,
        'supernews_theme_options[supernews-feature-cat]',
        array(
            'label'		=> __( 'Select Category For Featured Section', 'supernews' ),
            'section'   => 'supernews-feature-category',
            'settings'  => 'supernews_theme_options[supernews-feature-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);
