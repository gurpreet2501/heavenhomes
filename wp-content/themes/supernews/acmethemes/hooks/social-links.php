<?php
/**
 * Display Social Links
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('supernews_social_links') ) :

    function supernews_social_links( ) {

        global $supernews_customizer_all_values;
        ?>
        <div class="socials">
            <?php
            if ( !empty( $supernews_customizer_all_values['supernews-facebook-url'] ) ) { ?>
                <a href="<?php echo esc_url( $supernews_customizer_all_values['supernews-facebook-url'] ); ?>" class="facebook" data-title="Facebook" target="_blank">
                    <span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span>
                </a>
            <?php }
            if ( !empty( $supernews_customizer_all_values['supernews-twitter-url'] ) ) { ?>
                <a href="<?php echo esc_url( $supernews_customizer_all_values['supernews-twitter-url'] ); ?>" class="twitter" data-title="Twitter" target="_blank">
                    <span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span>
                </a>
            <?php }
            if ( !empty( $supernews_customizer_all_values['supernews-youtube-url'] ) ) { ?>
                <a href="<?php echo esc_url( $supernews_customizer_all_values['supernews-youtube-url'] ); ?>" class="youtube" data-title="Youtube" target="_blank">
                    <span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span>
                </a>
            <?php } ?>
        </div>
        <?php
    }

endif;

add_filter( 'supernews_action_social_links', 'supernews_social_links', 10 );