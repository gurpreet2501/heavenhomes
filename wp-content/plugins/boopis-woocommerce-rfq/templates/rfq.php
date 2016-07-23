<?php
/**
 * Quote Page
 *
 * @author 		Boopis Media
 * @package 	Boopis Rfq
 * @version     1.2.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );

?>

<?php do_action( 'boopis_before_quote' ); ?>

<div class="woocommerce">

<?php do_action( 'boopis_before_quote_table' ); ?>

<?php

$op_fb = !get_option('boopis_rfq_formbuilder_active') ? false : true;

if ( class_exists( 'BOOPIS_Formbuilder' ) && $op_fb == true ) {

  global $boopis_formbuilder;

  $boopis_formbuilder->get_form_page(); 

} elseif ( class_exists( 'BOOPIS_Mprfq' ) ) {

  global $boopis_mprfq;

  $boopis_mprfq->get_form_page(); 

} elseif ( isset($_GET['product_id']) ) {

  global $boopis_rfq;

  $boopis_rfq->get_form_page();

} else {

  echo '<h4>' . __("You have not added any items to your quotation form. Continue ", "boopis-rfq") . '<a href="' . $shop_page_url . '">' . __("shopping.", "boopis-rfq") .'</a></h4>';

} 

?>  

</div>