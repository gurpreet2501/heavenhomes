<?php
/**
 * Excerpt length 90 return
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('supernews_alter_excerpt') ) :
    function supernews_alter_excerpt(){
        return 90;
    }
endif;

add_filter('excerpt_length', 'supernews_alter_excerpt');

/**
 * Add ... for more view
 *
 * @since supernews 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('supernews_excerpt_more') ) :
    function supernews_excerpt_more($more) {
        return '...';
    }
endif;
add_filter('excerpt_more', 'supernews_excerpt_more');