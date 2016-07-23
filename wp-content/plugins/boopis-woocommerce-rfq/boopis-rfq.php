<?php
/*
Plugin Name: Boopis WooCommerce RFQ
Plugin URI: https://boopis.com/products/1-wordpress-woocommerce-request-for-quotation
Description: Replaces products with a price of zero to an open form for inquiry
Version: 1.2.1
Author: Boopis Media
Author URI: http://boopis.com/

    Copyright: © 2014 Boopis Media (email : info@boopis.com)
    License: GNU General Public License v3.0
    License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
    if ( ! class_exists( 'BOOPIS_Rfq' ) ) {

        define('BOOPIS_RFQ_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ));
        define( 'BOOPIS_RFQ_URL', plugin_dir_url( __FILE__ ) );

        register_activation_hook( __FILE__, 'boopis_add_rfq_page' ); 

        function boopis_add_rfq_page() {
            global $wpdb;

            $option_value = get_option( 'boois_rfq_page_id' );

            if ( $option_value > 0 && get_post( $option_value ) )
              return;

            $page_found = $wpdb->get_var( "SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = 'rfq' LIMIT 1;" );
            if ( $page_found ) :
                if ( ! $option_value )
                    update_option( 'boopis_rfq_page_id', $page_found );
                return;
            endif;

            $page_data = array(
                'post_status'     => 'publish',
                'post_type'     => 'page',
                'post_author'     => 1,
                'post_name'     => esc_sql( _x( 'rfq', 'page_slug', 'boopis' ) ),
                'post_title'    => __( 'RFQ', 'boopis-rfq' ),
                'post_content'    => '[boopis_rfq]',
                'post_parent'     => 0,
                'comment_status'  => 'closed'
                );

            $page_id = wp_insert_post( $page_data );

            update_option( 'boopis_rfq_page_id', $page_id );
        }

        function boopis_rfq_handler ( $atts ) {
            global $woocommerce;
            woocommerce_get_template( 'rfq.php', array(), '', BOOPIS_RFQ_PATH . '/templates/' );
        }

        /**
         * Localisation
         **/
        load_plugin_textdomain( 'boopis_rfq', false, dirname( plugin_basename( __FILE__ ) ) . '/' );

        class BOOPIS_Rfq {
            public function __construct() {
                add_action( 'woocommerce_init', array( &$this, 'woocommerce_loaded' ) );
                add_action( 'init', array( &$this, 'include_template_functions' ), 20 );
                add_action( 'admin_menu', array(&$this, 'add_menu') );
                add_filter( 'plugin_action_links', array( &$this, 'plugin_action_links' ), 10, 2 );
            }
            
            public function woocommerce_loaded() {
                global $woocommerce;
            }
        
            public function include_template_functions() {
                include( 'templates/overrides.php' );
            }

            public function add_menu() {
                add_menu_page('Boopis Settings', 'Boopis', 'manage_options', 'boopis_settings', array(&$this, 'plugin_settings_page')); 
                add_submenu_page('boopis_settings', 'Boopis RFQ Settings', 'Boopis RFQ', 'manage_options', 'boopis_rfq_settings', array(&$this, 'plugin_settings_subpage')); 
            }

            public function plugin_settings_page() { 
                if(!current_user_can('manage_options')) { 
                    wp_die(__('You do not have sufficient permissions to access this page.')); 
                }
                include(sprintf("%s/templates/settings.php", dirname(__FILE__))); 
            }

            public function plugin_settings_subpage() { 
                if(!current_user_can('manage_options')) { 
                    wp_die(__('You do not have sufficient permissions to access this page.')); 
                }
                include(sprintf("%s/templates/rfq_settings.php", dirname(__FILE__))); 
            }

            public function plugin_action_links( $links, $file ) {
                if ( $file == plugin_basename( __FILE__ ) )
                    $links[] = '<a href="admin.php?page=boopis_rfq_settings">' . __( 'Settings' , 'boopis_settings') . '</a>';

                return $links;
            }

            public function get_form_page() { 
                include(sprintf("%s/templates/form.php", dirname(__FILE__))); 
            }

        }

        // finally instantiate our plugin class and add it to the set of globals
        $GLOBALS['boopis_rfq'] = new BOOPIS_Rfq();
    }

    add_shortcode( 'boopis_rfq', 'boopis_rfq_handler' );

}

