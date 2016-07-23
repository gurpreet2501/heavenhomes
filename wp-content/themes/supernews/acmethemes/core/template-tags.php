<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AcmeThemes
 * @subpackage SuperNews
 */

if ( ! function_exists( 'supernews_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function supernews_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'supernews' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-calendar"></i>' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'supernews' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'supernews_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function supernews_entry_footer( $edit = 0 ) {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'supernews' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tags"></i>' . esc_html__( '%1$s', 'supernews' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comment-o"></i>';
		comments_popup_link( esc_html__( '0 comment', 'supernews' ), esc_html__( '1 Comment', 'supernews' ), esc_html__( '% Comments', 'supernews' ) );
		echo '</span>';
	}
	if( $edit == 1 ){
		edit_post_link(
			sprintf(
			/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'supernews' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link"><i class="fa fa-edit "></i>',
			'</span>'
		);
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'supernews_categorized_blog' ) ) :
	function supernews_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'supernews_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'supernews_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so supernews_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so supernews_categorized_blog should return false.
			return false;
		}
	}
endif;


/**
 * Flush out the transients used in supernews_categorized_blog.
 */
if ( ! function_exists( 'supernews_category_transient_flusher' ) ) :
	function supernews_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'supernews_categories' );
	}
endif;


add_action( 'edit_category', 'supernews_category_transient_flusher' );
add_action( 'save_post',     'supernews_category_transient_flusher' );
