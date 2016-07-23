<?php
/**
 * Header logo/text display options alternative
 *
 * @since supernews 1.0.2
 *
 * @param null
 * @return array $supernews_header_id_display_opt
 *
 */
if ( !function_exists('supernews_header_id_display_opt') ) :
    function supernews_header_id_display_opt() {
        $supernews_header_id_display_opt =  array(
            'logo-only' => __( 'Logo Only ( First Select Logo Above )', 'supernews' ),
            'title-only' => __( 'Site Title Only', 'supernews' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'supernews' ),
            'disable' => __( 'Disable', 'supernews' )
        );
        return apply_filters( 'supernews_header_id_display_opt', $supernews_header_id_display_opt );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return array $supernews_sidebar_layout
 *
 */
if ( !function_exists('supernews_sidebar_layout') ) :
    function supernews_sidebar_layout() {
        $supernews_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'supernews' ),
            'left-sidebar'  => __( 'Left Sidebar' , 'supernews' ),
            'no-sidebar'    => __( 'No Sidebar', 'supernews' )
        );
        return apply_filters( 'supernews_sidebar_layout', $supernews_sidebar_layout );
    }
endif;


/**
 * Blog layout options
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return array $supernews_blog_layout
 *
 */
if ( !function_exists('supernews_blog_layout') ) :
    function supernews_blog_layout() {
        $supernews_blog_layout =  array(
            'show-image' => __( 'Show Image', 'supernews' ),
            'no-image'   => __( 'Hide Image', 'supernews' )
        );
        return apply_filters( 'supernews_blog_layout', $supernews_blog_layout );
    }
endif;

/**
 * Related posts layout options
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('supernews_reset_options') ) :
    function supernews_reset_options() {
        $supernews_reset_options =  array(
            '0'  => __( 'Do Not Reset', 'supernews' ),
            'reset-color-options'  => __( 'Reset Colors Options', 'supernews' ),
            'reset-all' => __( 'Reset All', 'supernews' )
        );
        return apply_filters( 'supernews_reset_options', $supernews_reset_options );
    }
endif;

/**
 *  Default Theme layout options
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return array $supernews_theme_layout
 *
 */
if ( !function_exists('supernews_get_default_theme_options') ) :
    function supernews_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'supernews-feature-cat'  => 0,
            'supernews-enable-feature'  => '',

            /*header options*/
            'supernews-header-logo'  => '',
            'supernews-header-id-display-opt' => 'title-and-tagline',
            'supernews-show-date'  => 1,
            'supernews-breaking-news-title'  => __( 'Breaking News', 'supernews' ),
            'supernews-enable-breaking-news'  => '',
            'supernews-facebook-url'  => '',
            'supernews-twitter-url'  => '',
            'supernews-youtube-url'  => '',
            'supernews-enable-social'  => '',
            'supernews-header-main-banner-ads'  => '',
            'supernews-header-main-banner-ads-link'  => '',
            'supernews-header-show-search'  => 1,

            /*footer options*/
            'supernews-footer-copyright'  => __( 'Your Own Copyright Text', 'supernews' ),

            /*layout/design options*/
            'supernews-sidebar-layout'  => 'right-sidebar',
            'supernews-blog-archive-layout'  => 'show-image',
            'supernews-primary-color'  => '#f73838',
            'supernews-custom-css'  => '',

            /*single related post options*/
            'supernews-show-related'  => 1,

            /*theme options*/
            'supernews-search-placholder'  => __( 'Search', 'supernews' ),
            'supernews-show-breadcrumb'  => 1,
            'supernews-side-show-message'  => '',
            'supernews-side-image-message'  => '',

            /*Reset*/
            'supernews-reset-options'  => '0',

        );

        return apply_filters( 'supernews_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return array supernews_theme_options
 *
 */
if ( !function_exists('supernews_get_theme_options') ) :
    function supernews_get_theme_options() {

        $supernews_default_theme_options = supernews_get_default_theme_options();
        $supernews_get_theme_options = get_theme_mod( 'supernews_theme_options');
        if( is_array( $supernews_get_theme_options )){
            return array_merge( $supernews_default_theme_options, $supernews_get_theme_options );
        }
        else{
            return $supernews_default_theme_options;
        }

    }
endif;