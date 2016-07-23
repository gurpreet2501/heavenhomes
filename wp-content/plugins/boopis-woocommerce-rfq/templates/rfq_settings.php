<div class="wrap">
<?php

if (isset($_POST["update_settings"])):

	$formbuilder_active = isset($_POST["formbuilder_active"]) ? $_POST["formbuilder_active"] : '';
	$send_address = isset($_POST["send_address"]) ? $_POST["send_address"] : '';
	$pname_active = isset($_POST["pname_active"]) ? $_POST["pname_active"] : '';
	$psku_active = isset($_POST["psku_active"]) ? $_POST["psku_active"] : '';
	$quote_trigger = isset($_POST["quote_trigger"]) ? $_POST["quote_trigger"] : '';
	$tag_trigger_value = isset($_POST["tag_trigger_value"]) ? $_POST["tag_trigger_value"] : '';
	$replace_price = isset($_POST["replace_price"]) ? $_POST["replace_price"] : '';

	update_option("boopis_rfq_formbuilder_active", $formbuilder_active);
	update_option("boopis_rfq_send_address", $send_address);
	update_option("boopis_rfq_pname_active", $pname_active);
	update_option("boopis_rfq_psku_active", $psku_active);
	update_option("boopis_rfq_quote_trigger", $quote_trigger);
	update_option("boopis_rfq_tag_trigger_value", $tag_trigger_value);
	update_option("boopis_rfq_replace_price", $replace_price);
?> 
<div id="message" class="updated">Settings saved</div>  
<?php endif; ?>

	<h2>Boopis RFQ Settings</h2>

	<form method="POST" action="">  
		<table class="form-table">  
			<tr valign="top">  
				<th scope="row">  
					<label for="formbuilder_active">  
						Use Formbuilder? 
					</label>   
				</th>  
				<td>
					<input type="checkbox" id="formbuilder_active" name="formbuilder_active" <?php echo class_exists( 'BOOPIS_Formbuilder' ) ? (get_option("boopis_rfq_formbuilder_active") ? ' checked="checked"' : '') : ' disabled'; ?> />
					<?php echo class_exists( 'BOOPIS_Formbuilder' ) ? 'Check to use formbuilder fields' : '<a href="https://boopis.com/products/2-wordpress-formbuilder-add-on-for-wc-rfq" target="_blank">Boopis Formbuilder addon required.</a>'; ?>
				</td>  
			</tr> 
			<tr valign="top">  
				<th scope="row">  
					<label for="send_address">  
						Quotation recipient e-mail address
					</label>   
				</th>  
				<td>
					<input type="email" id="send_address" name="send_address" <?php echo class_exists( 'BOOPIS_Formbuilder' ) || class_exists( 'BOOPIS_Mprfq' ) ? ' value="' . get_option("boopis_rfq_send_address") . '"' : ' disabled '. update_option("boopis_rfq_send_address", "") .' '; ?> />
					<?php echo class_exists( 'BOOPIS_Formbuilder' ) || class_exists( 'BOOPIS_Mprfq' ) ? '' : '<a href="http://boopis.com/products?category=1" target="_blank">Addon required.</a>'; ?>
				</td>  
			</tr> 
			<tr valign="top">  
				<th scope="row">  
					<label for="quote_trigger">  
						Change Quotation Trigger (Default - Zero Price Recommended): 
					</label>   
				</th>  
				<td>
					<input type="checkbox" id="quote_trigger" name="quote_trigger" <?php echo class_exists( 'BOOPIS_Formbuilder' ) || class_exists( 'BOOPIS_Mprfq' ) ? get_option("boopis_rfq_quote_trigger") ? ' checked="checked"' : '' : ' disabled '. update_option("boopis_rfq_quote_trigger", "") .' '; ?> />Define by Tag<br>
					<?php echo class_exists( 'BOOPIS_Formbuilder' ) || class_exists( 'BOOPIS_Mprfq' ) ? '' : '<a href="http://boopis.com/products?category=1" target="_blank">Addon required (Default is zero).</a>'; ?>
					<div class="hidden-tag">
						<label for="tag_trigger_value">  
							Tag Name
						</label> 
						<input type="text" id="tag_trigger_value" name="tag_trigger_value" <?php echo class_exists( 'BOOPIS_Formbuilder' ) || class_exists( 'BOOPIS_Mprfq' ) ? ' value="' . get_option("boopis_rfq_tag_trigger_value") . '"' : ' disabled '. update_option("boopis_rfq_tag_trigger_value", "") .' '; ?> />
					</div> 
				</td> 

			</tr>
			<tr valign="top">  
				<th scope="row">  
					<label for="replace_price">  
						Replace "Free" with "Request Quote" on triggered items? 
					</label>   
				</th>  
				<td>
					<input type="checkbox" id="replace_price" name="replace_price" <?php echo get_option("boopis_rfq_replace_price") ? ' checked="checked"' : ''; ?> />Check to replace price
				</td>  
			</tr> 
			<tr valign="top" class="not-formbuilder">  
				<th scope="row">  
					<label for="pname_active">  
						Add Product Name? 
					</label>   
				</th>  
				<td>
					<input type="checkbox" id="pname_active" name="pname_active" <?php echo get_option("boopis_rfq_pname_active") ? ' checked="checked"' : ''; ?> />Check to add product name to form
				</td>  
			</tr> 
			<tr valign="top" class="not-formbuilder">  
				<th scope="row">  
					<label for="psku_active">  
						Add Product SKU? 
					</label>   
				</th>  
				<td>
					<input type="checkbox" id="psku_active" name="psku_active" <?php echo get_option("boopis_rfq_psku_active") ? ' checked="checked"' : ''; ?> />Check to add product sku to form
				</td>  
			</tr>
		</table>  
		<p>  
			<input type="hidden" name="update_settings" value="Y" />  
			<input type="submit" value="Save settings" class="button-primary"/>  
		</p>  
	</form>

</div>
<?php $mprfq = class_exists( 'BOOPIS_Mprfq' ) ? true : false; ?>
<?php $fb = class_exists( 'BOOPIS_Formbuilder' ) ? true : false; ?>
<script>
jQuery('[name=quote_trigger]').click(function(){
	if (jQuery(this).attr('checked')) {
		jQuery('.hidden-tag').show();
	} else {
		jQuery('.hidden-tag').hide();   
	}

});
var tag_trigger = '<?php echo get_option('boopis_rfq_quote_trigger'); ?>';
if ( tag_trigger == '' ) {
	jQuery('.hidden-tag').hide();   
}
if (<?php echo json_encode($mprfq); ?> == true || <?php echo json_encode($fb); ?> == true) {
	jQuery('.not-formbuilder').hide();   
}
var formbuilder = '<?php echo get_option('boopis_rfq_formbuilder_active'); ?>';
if (<?php echo json_encode($fb); ?> == true && formbuilder == '') {
	jQuery('.not-formbuilder').show();   
}
jQuery('[name=formbuilder_active]').click(function(){
	if (jQuery(this).attr('checked')) {
		jQuery('.not-formbuilder').hide();  
	} else {
		jQuery('.not-formbuilder').show();
	}
});
</script>