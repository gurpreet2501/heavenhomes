<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'supernews_front_page' ) ) :

    function supernews_front_page() {

        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        elseif( is_active_sidebar( 'supernews-home' ) ){
            ?>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                    dynamic_sidebar( 'supernews-home' );
                    ?>
                </main>
                <!-- #main -->
            </div><!-- #primary -->
            <?php
        }
        else {
            include( get_page_template() );
        }

    }
endif;
add_action( 'supernews_action_front_page', 'supernews_front_page', 10 );