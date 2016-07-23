<?php
/**
 * Reset options
 * Its outside options panel
 *
 * @param  array $reset_options
 * @return void
 *
 * @since supernews 1.0.0
 */
if ( ! function_exists( 'supernews_reset_db_options' ) ) :
    function supernews_reset_db_options( $reset_options ) {
        set_theme_mod( 'supernews_theme_options', $reset_options );
    }
endif;

function supernews_reset_setting_callback( $input, $setting ){
    // Ensure input is a slug.
    $input = sanitize_text_field( $input );
    if( '0' == $input ){
        return '0';
    }
    $supernews_default_theme_options = supernews_get_default_theme_options();
    $supernews_get_theme_options = get_theme_mod( 'supernews_theme_options');

    switch ( $input ) {
        case "reset-color-options":
            $supernews_get_theme_options['supernews-primary-color'] = $supernews_default_theme_options['supernews-primary-color'];
            supernews_reset_db_options($supernews_get_theme_options);
            break;

        case "reset-all":
            supernews_reset_db_options($supernews_default_theme_options);
            break;

        default:
            break;
    }
}
/*adding sections for Reset Options*/
$wp_customize->add_section( 'supernews-reset-options', array(
    'priority'       => 220,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Reset Options', 'supernews' )
) );

/*Reset Options*/
$wp_customize->add_setting( 'supernews_theme_options[supernews-reset-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supernews-reset-options'],
    'sanitize_callback' => 'supernews_reset_setting_callback',
    'transport'			=> 'postMessage'
) );

$choices = supernews_reset_options();
$wp_customize->add_control( 'supernews_theme_options[supernews-reset-options]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Reset Options', 'supernews' ),
    'description'=> __( 'Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects. ', 'supernews' ),
    'section'   => 'supernews-reset-options',
    'settings'  => 'supernews_theme_options[supernews-reset-options]',
    'type'	  	=> 'select'
) );