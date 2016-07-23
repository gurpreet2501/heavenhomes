<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'supernews-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Blog/Archive Layout', 'supernews' ),
    'panel'          => 'supernews-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-blog-archive-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-blog-archive-layout'],
    'sanitize_callback' => 'supernews_sanitize_select'
) );
$choices = supernews_blog_layout();
$wp_customize->add_control( 'supernews_theme_options[supernews-blog-archive-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Blog/Archive Layout', 'supernews' ),
    'description'=> __( 'Image display options', 'supernews' ),
    'section'   => 'supernews-design-blog-layout-option',
    'settings'  => 'supernews_theme_options[supernews-blog-archive-layout]',
    'type'	  	=> 'select'
) );