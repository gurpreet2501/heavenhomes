<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function supernews_widget_init(){
    register_sidebar(array(
        'name' => __('Main Sidebar Area', 'supernews'),
        'id'   => 'supernews-sidebar',
        'description' => __('Displays items on sidebar.', 'supernews'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Home Main Content Area', 'supernews'),
        'id'   => 'supernews-home',
        'description' => __('Displays widgets on home page main content area.', 'supernews'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title"><span>',
        'after_title' => '</span></h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column One', 'supernews'),
        'id' => 'footer-col-one',
        'description' => __('Displays items on top footer section.', 'supernews'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column Two', 'supernews'),
        'id' => 'footer-col-two',
        'description' => __('Displays items on top footer section.', 'supernews'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column Three', 'supernews'),
        'id' => 'footer-col-three',
        'description' => __('Displays items on top footer section.', 'supernews'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
}
add_action('widgets_init', 'supernews_widget_init');