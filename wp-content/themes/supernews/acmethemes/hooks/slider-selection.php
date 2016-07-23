<?php
/**
 * Display default slider
 *
 * @since supernews 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('supernews_default_featured') ) :
    function supernews_default_featured(){
        ?>
        <div class="acme-col-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-660-365.png" ); ?>')">

        </div>
        <div class="acme-col-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-660-365.png" ); ?>')">

        </div>
        <div class="clearfix"></div>
        <div class="acme-col-3" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-660-365.png" ); ?>')">

        </div>
        <div class="acme-col-3" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-660-365.png" ); ?>')">

        </div>
        <div class="acme-col-3" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-660-365.png" ); ?>')">

        </div>
        <?php
    }
endif;

/**
 * Featured Slider display
 *
 * @since Supernews 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'supernews_display_feature_slider' ) ) :

    function supernews_display_feature_slider( ){

        global $supernews_customizer_all_values;
        $supernews_feature_cat = $supernews_customizer_all_values['supernews-feature-cat'];
        if ( 0 != $supernews_feature_cat ) {
            $supernews_cat_post_args = array(
                'cat'                 => $supernews_feature_cat,
                'posts_per_page'      => 5,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            );
            $slider_query = new WP_Query($supernews_cat_post_args);
            if ($slider_query->have_posts()):
                $i = 1;
                $col = 'no-media acme-col-2';
                $total_posts = $slider_query->post_count;
                while ($slider_query->have_posts()): $slider_query->the_post();
                    if (has_post_thumbnail()) {
                        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                    } else {
                        $image_url[0] = get_template_directory_uri() . '/assets/img/no-image-660-365.png';
                    }
                    if( $i > 5 ){
                        $i = 1;
                    }
                    if( $i > 2 ){
                        $col = 'no-media acme-col-3';
                    }
                    if( $total_posts < 5 ){
                        if( 1 == $total_posts ){
                            $col = 'no-media acme-col-1';
                        }
                        elseif( $total_posts % 2 == 0 ){
                            $col = 'no-media acme-col-2';
                        }
                        elseif( 3 == $total_posts ){
                            $col = 'no-media acme-col-2';
                            if( $i < 2 ){
                                $col = 'no-media acme-col-1';
                            }
                        }
                    }
                    ?>
                    <div class="<?php echo $col; ?>" style="background-image:url(<?php echo esc_url( $image_url[0] ); ?>);">
                        <a class="at-overlay" href="<?php the_permalink()?>">
                        </a>
                        <div class="slider-desc">
                            <div class="above-slider-details">
                                <?php
                                supernews_list_category();
                                ?>
                            </div>
                            <div class="slider-details">
                                <a href="<?php the_permalink()?>">
                                    <div class="slide-title">
                                        <?php the_title(); ?>
                                    </div>
                                </a>
                            </div>
                            <div class="below-slider-details">
                                <?php supernews_posted_on(); ?>
                                <?php supernews_entry_footer(); ?>
                            </div>
                        </div>
                    </div>
                <?php
                $i++;
                endwhile;
                wp_reset_postdata();?>
            <?php endif; ?>
        <?php
        }
        else{
            supernews_default_featured();
        }
    }
endif;
/**
 * Display related posts from same category
 *
 * @since supernews 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('supernews_feature_slider') ) :
    function supernews_feature_slider() {
        ?>
        <div class="slider-section">
            <div class="home-bxslider">
                <?php supernews_display_feature_slider(); ?>
            </div>
        </div>
        <?php
    }
endif;
add_action( 'supernews_action_feature_slider', 'supernews_feature_slider', 0 );