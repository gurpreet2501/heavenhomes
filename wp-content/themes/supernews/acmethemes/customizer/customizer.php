<?php
/**
 * SuperNews Theme Customizer.
 *
 * @package AcmeThemes
 * @subpackage SuperNews
 */

/*
* file for customizer core functions
*/
$supernews_custom_controls_file_path = supernews_file_directory('acmethemes/customizer/customizer-core.php');
require $supernews_custom_controls_file_path;

/*
* file for customizer sanitization functions
*/
$supernews_sanitize_functions_file_path = supernews_file_directory('acmethemes/customizer/sanitize-functions.php');
require $supernews_sanitize_functions_file_path;

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function supernews_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = supernews_get_theme_options();

    /*defaults options*/
    $defaults = supernews_get_default_theme_options();

    /*
    * file for customizer custom controls classes
    */
    $supernews_custom_controls_file_path = supernews_file_directory('acmethemes/customizer/custom-controls.php');
    require $supernews_custom_controls_file_path;

    /*
     * file for feature panel of home page
     */
    $supernews_customizer_feature_option_file_path = supernews_file_directory('acmethemes/customizer/feature-section/feature-panel.php');
    require $supernews_customizer_feature_option_file_path;

    /*
    * file for header panel
    */
    $supernews_customizer_header_options_file_path = supernews_file_directory('acmethemes/customizer/header-options/header-panel.php');
    require $supernews_customizer_header_options_file_path;

    /*
    * file for customizer footer section
    */
    $supernews_customizer_footer_options_file_path = supernews_file_directory('acmethemes/customizer/footer-section/footer-section.php');
    require $supernews_customizer_footer_options_file_path;

    /*
    * file for design/layout panel
    */
    $supernews_customizer_design_options_file_path = supernews_file_directory('acmethemes/customizer/design-options/design-panel.php');
    require $supernews_customizer_design_options_file_path;

    /*
    * file for single post sections
    */
    $supernews_customizer_single_post_section_file_path = supernews_file_directory('acmethemes/customizer/single-posts/single-post-section.php');
    require $supernews_customizer_single_post_section_file_path;

    /*
     * file for options panel
     */
    $supernews_customizer_options_panel_file_path = supernews_file_directory('acmethemes/customizer/options/options-panel.php');
    require $supernews_customizer_options_panel_file_path;

    /*
  * file for options reset
  */
    $supernews_customizer_options_reset_file_path = supernews_file_directory('acmethemes/customizer/options/options-reset.php');
    require $supernews_customizer_options_reset_file_path;

    /*removing*/
    $wp_customize->remove_panel('header_image');
    $wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'supernews_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function supernews_customize_preview_js() {
    wp_enqueue_script( 'supernews-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'supernews_customize_preview_js' );

/**
 * Enqueue scripts for customizer
 */
function supernews_customizer_js() {
    wp_enqueue_script('supernews-customizer', get_template_directory_uri() . '/assets/js/supernews-customizer.js', array('jquery'), '1.3.0', 1);

    wp_localize_script( 'supernews-customizer', 'supernews_customizer_js_obj', array(
        'pro' => __('Upgrade To Pro','supernews')
    ) );
    wp_enqueue_style( 'supernews-customizer', get_template_directory_uri() . '/assets/css/supernews-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'supernews_customizer_js' );

/**
 * Theme Update Script
 *
 * For backward compatibility
 */
function supernews_update_check() {

    global $wp_version;
    // Return if wp version less than 4.5
    if ( version_compare( $wp_version, '4.5', '<' ) ) {
        return;
    }
    $supernews_saved_theme_options = supernews_get_theme_options();
    $site_logo = '';
    if( isset( $supernews_saved_theme_options['supernews-header-logo'] )){
        $site_logo = esc_url( $supernews_saved_theme_options['supernews-header-logo'] );
    }
    if ( empty( $site_logo ) ) {
        return;
    }
    /*converting url into attachment ID*/
    $logo = attachment_url_to_postid( $site_logo );
    if ( is_int( $logo ) ) {
        set_theme_mod( 'custom_logo', attachment_url_to_postid( $site_logo ) );
        $supernews_saved_theme_options['supernews-header-logo'] = '';
        set_theme_mod( 'supernews_theme_options', $supernews_saved_theme_options );
    }

}
add_action( 'after_setup_theme', 'supernews_update_check' );
