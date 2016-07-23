<?php
/**
 * Template Function Overrides for WooCommerce > 2.2.0
 *
 */

// prices with value
add_filter( 'woocommerce_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_sale_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_get_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_variation_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_get_variation_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_variation_sale_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_variable_sale_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_variable_price_html', 'boopis_price_replace', 1, 2 ); 


// prices with no value or zero
add_filter( 'woocommerce_empty_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_variable_empty_price_html', 'boopis_price_replace', 1, 2 ); 
add_filter( 'woocommerce_variation_empty_price_html', 'boopis_price_replace', 1, 2 ); 
// add_filter( 'woocommerce_variable_free_price_html', 'boopis_price_replace' ); 
// add_filter( 'woocommerce_variable_free_sale_price_html', 'boopis_price_replace' ); 
add_filter( 'woocommerce_free_price_html', 'boopis_price_replace', 1, 2 );
add_filter( 'woocommerce_free_sale_price_html', 'boopis_price_replace', 1, 2 );
add_filter( 'woocommerce_variation_free_price_html', 'boopis_price_replace', 1, 2 );
add_filter( 'woocommerce_grouped_price_html', 'boopis_price_replace', 1, 2 );

//add to cart button
add_filter( 'add_to_cart_text', 'boopis_add_to_quote_text' );
add_filter( 'add_to_cart_url', 'boopis_add_to_quote_url' );
add_filter( 'add_to_cart_class', 'boopis_add_to_quote_class' );
add_action( 'woocommerce_before_add_to_cart_button', 'boopis_before_add_to_quote_button' );
add_action( 'woocommerce_after_add_to_cart_button', 'boopis_after_add_to_quote_button' );
add_action( 'woocommerce_before_add_to_cart_form', 'boopis_before_add_to_quote_form' );


function searchForTag($tag, $array) {
	if ($array) {
		foreach ($array as $term) {
			if ($term->name === $tag) {
				return true;
			}
		}
	}
	return null;
}

function boopis_price_replace( $price, $_product ) {
	global $product;

	if ( get_option("boopis_rfq_replace_price") == true ) {
    	if ( get_option('boopis_rfq_quote_trigger') == true && searchForTag(get_option('boopis_rfq_tag_trigger_value'), get_the_terms($product->id, 'product_tag')) ) {
			return __( 'Request Quote', 'boopis-rfq' );
    	} elseif ( get_option('boopis_rfq_quote_trigger') == false && $_product->get_price() == 0 ) {
    		return __( 'Request Quote', 'boopis-rfq' );
    	}
	}
	return $price;
}

function boopis_add_to_quote_text( $link ) {
	global $product;

	if ( get_option('boopis_rfq_quote_trigger') == true && searchForTag(get_option('boopis_rfq_tag_trigger_value'), get_the_terms($product->id, 'product_tag')) ) {
		$link = __( 'Inquire', 'boopis-rfq' );
	} elseif ( get_option('boopis_rfq_quote_trigger') == false && $product->get_price() == 0 ) {
		$link = __( 'Inquire', 'boopis-rfq' );
	}

	return $link;
}

function boopis_add_to_quote_url( $link ) {
	global $product;

	if ( get_option('boopis_rfq_quote_trigger') == true && searchForTag(get_option('boopis_rfq_tag_trigger_value'), get_the_terms($product->id, 'product_tag')) || ( get_option('boopis_rfq_quote_trigger') == false && $product->get_price() == 0 ) ) {
		if( class_exists( 'BOOPIS_Mprfq' ) ) {
			$link = esc_url( remove_query_arg( 'added-to-quote', add_query_arg( 'add-to-quote', $product->id ) ) );
		} else {
			$link = add_query_arg('product_id', $product->id, get_permalink( get_option('boopis_rfq_page_id') ));
		}
	}

	return $link;
}

function boopis_add_to_quote_class( $link ) {
	global $product;

	if ( get_option('boopis_rfq_quote_trigger') == true && searchForTag(get_option('boopis_rfq_tag_trigger_value'), get_the_terms($product->id, 'product_tag')) || ( get_option('boopis_rfq_quote_trigger') == false && $product->get_price() == 0 ) ) {
		$link = 'add_to_quote_button';
	}

	return $link;
}

function boopis_before_add_to_quote_form() {
	echo "<script type=\"text/javascript\">" . "\r\n";
	echo "function changeMethod() {" . "\r\n";
	echo "$(\".cart\").attr(\"method\", \"get\");" . "\r\n";
	echo "}" . "\r\n";
	echo "</script>";
}

function boopis_before_add_to_quote_button() {
	global $product;

	if ( get_option('boopis_rfq_quote_trigger') == true && searchForTag(get_option('boopis_rfq_tag_trigger_value'), get_the_terms($product->id, 'product_tag')) || ( get_option('boopis_rfq_quote_trigger') == false && $product->get_price() == 0 ) ) {
		if( $product->is_type( 'simple' ) ) {

			if ( ! $product->is_sold_individually() ) {
				woocommerce_quantity_input( array(
					'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
					'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
					) );
			}
			if( class_exists( 'BOOPIS_Mprfq' ) ) {
				echo "<input type=\"hidden\" name=\"add-to-quote\" value=\"". esc_attr( $product->id ) . "\" />";
				echo "<button type=\"submit\" class=\"single_add_to_quote_button button alt\">" . apply_filters('single_add_to_cart_text', __( 'Inquire', 'boopis-rfq' ), $product->product_type) . "</button>";
			} else {
				echo "<button type=\"submit\" onclick='this.form.action=\"" . add_query_arg('product_id', $product->id, get_permalink( get_option('boopis_rfq_page_id') )) . "\";' class=\"single_add_to_quote_button button alt\">" . apply_filters('single_add_to_cart_text', __( 'Inquire', 'boopis-rfq' ), $product->product_type) . "</button>";
			}

		} elseif( $product->is_type( 'variable' ) ) {

			echo "<div class=\"single_variation_wrap\" style=\"display:none;\">";
			echo "<div class=\"single_variation\"></div>";
			echo "<div class=\"variations_button\">";
			echo "<input type=\"hidden\" name=\"variation_id\" value=\"\" />";
			woocommerce_quantity_input();
			if( class_exists( 'BOOPIS_Mprfq' ) ) {
			    echo "<button type=\"submit\" class=\"single_add_to_quote_button button alt\">" . apply_filters('single_add_to_cart_text', __( 'Inquire', 'boopis-rfq' ), $product->product_type) . "</button>";
			} else {
				echo "<button type=\"submit\" onclick='this.form.action=\"" . add_query_arg('product_id', $product->id, get_permalink( get_option('boopis_rfq_page_id') )) . "\";' class=\"single_add_to_quote_button button alt\">" . apply_filters('single_add_to_cart_text', __( 'Inquire', 'boopis-rfq' ), $product->product_type) . "</button>";
			}
			echo "</div>";
			echo "</div>";
			echo "<div>";
			echo "<input type=\"hidden\" name=\"add-to-quote\" value=\"" . $product->id . "\" />";
			echo "<input type=\"hidden\" name=\"product_id\" value=\"" . esc_attr( $post->ID ) . "\" />";
			echo "</div>";

		} elseif( $product->is_type( 'grouped' ) ) {

			if( class_exists( 'BOOPIS_Mprfq' ) ) {
          		echo "<button type=\"submit\" class=\"single_add_to_quote_button button alt\">" . apply_filters('single_add_to_cart_text', __( 'Inquire', 'boopis-rfq' ), $product->product_type) . "</button>";
			} else {
				echo "<button type=\"submit\" onclick='this.form.action=\"" . add_query_arg('product_id', $product->id, get_permalink( get_option('boopis_rfq_page_id') )) . "\";' class=\"single_add_to_quote_button button alt\">" . apply_filters('single_add_to_cart_text', __( 'Inquire', 'boopis-rfq' ), $product->product_type) . "</button>";
			}

		} elseif( $product->is_type( 'external' ) ) {

			echo "<p class=\"quote\"><a href=\"" . esc_url( $product_url ) . "\" rel=\"nofollow\" class=\"single_add_to_quote_button button alt\">" . apply_filters('single_add_to_cart_text', $button_text, 'external') . "</a></p>";

		}

		echo "<!--";
	}

} 

function boopis_after_add_to_quote_button() {
	global $product;

	if ( get_option('boopis_rfq_quote_trigger') == true && searchForTag(get_option('boopis_rfq_tag_trigger_value'), get_the_terms($product->id, 'product_tag')) || ( get_option('boopis_rfq_quote_trigger') == false && $product->get_price() == 0 ) ) {
		echo "-->";
	}
}

/**
 * Template Function Overrides for WooCommerce 2.1.0
 *
 */

add_filter( 'woocommerce_loop_add_to_cart_link', 'boopis_loop_add_to_quote_link' );

function boopis_loop_add_to_quote_link( $link ) {
	global $product;

	if ( get_option('boopis_rfq_quote_trigger') == true && searchForTag(get_option('boopis_rfq_tag_trigger_value'), get_the_terms($product->id, 'product_tag')) || ( get_option('boopis_rfq_quote_trigger') == false && $product->get_price() == 0 ) ) {

		if( class_exists( 'BOOPIS_Mprfq' ) ) {
			if ( $product->product_type == 'variable' ) {
				$link = '<a href="'.esc_url( $product->add_to_cart_url() ).'" rel="nofollow" data-product_id="'.$product->id.'" data-product_sku="'.$product->get_sku().'" class="button add_to_quote_button product_type_'.$product->product_type.'">' . esc_html( $product->add_to_cart_text() ) .'</a>';
			} else {
				$link = '<a href="'.esc_url( remove_query_arg( 'added-to-quote', add_query_arg( 'add-to-quote', $product->id ) ) ).'" rel="nofollow" data-product_id="'.$product->id.'" data-product_sku="'.$product->get_sku().'" class="button add_to_quote_button product_type_'.$product->product_type.'">' . __( "Inquire", "boopis-rfq" ) .'</a>';
			}
		} else {
			$link = '<a href="'.add_query_arg('product_id', $product->id, get_permalink( get_option('boopis_rfq_page_id') )).'" rel="nofollow" data-product_id="'.$product->id.'" data-product_sku="'.$product->get_sku().'" class="button add_to_quote_button product_type_'.$product->product_type.'">' . __( "Inquire", "boopis-rfq" ) .'</a>';
		}	

	}

	return $link;
}