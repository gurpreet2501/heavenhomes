<?php
global $woocommerce;

$product = new WC_Product_Factory();
$_product = $product->get_product($_GET['product_id']);

if (isset($_POST['post_hidden'])) {
  //user posted variables
  $name = $_POST['quote_name'];
  $email = $_POST['quote_email'];
  $phone = $_POST['quote_phone'];

  //product variables
  $pname = $_POST['pname'];
  $psku = $_POST['psku'];

  //php mailer variables
  $to = 'jasstoor89@gmail.com, jass.toor@hotmail.com';
 
 //get_option('admin_email');
  $subject = "Quotation Request from ". $name;
  $headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";
  $message = 'From: '. $name . "\r\n";
  $message .= 'Email: ' . $email . "\r\n";
  $message .= 'Product Name: ' . $pname . "\r\n";
  $message .= 'SKU: ' . $psku . "\r\n\n";
  $message .= 'Phone No: ' . $phone . "\r\n\n";

  $nameErr = $emailErr = "";

  if (empty($name)) {
    $nameErr = "Name is required";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Email is invalid";
  }
  if (empty($nameErr) && empty($emailErr)) {
    $sent = wp_mail($to, $subject, strip_tags($message), $headers);
  }

} 

if (!empty($sent)) {
  echo "<h3>Thanks for the quote request!</h3><h3>We'll get back to you soon!</h3><h5>www.jjbuilders.com</h5>";
} else {
?>
  <form action="" method="post" enctype='multipart/form-data'>
    <?php if (isset($_GET['product_id'])) { ?>
    <?php if (get_option("boopis_rfq_pname_active") == "on") { ?>
    <p class="form-row">
      <label for="pname"><?php echo __('Product Name', 'boopis-rfq'); ?><abbr class="required" title="required">*</abbr></label>
      <?php echo "<input type=\"text\" name=\"pname\" readonly=\"readonly\" value=\"" . $_product->get_title() . "\">"; ?>
    </p>
  <?php } ?>
  <?php if (get_option("boopis_rfq_psku_active") == "on") { ?>
    <p class="form-row">
      <label for="psku"><?php echo __('Product ', 'boopis-rfq'); ?></label>
      <?php echo "<input type=\"text\" name=\"psku\" readonly=\"readonly\" value=\"" . $_product->get_sku() . "\">"; ?>
    </p>
    <?php } ?>
    <?php } ?>
   <p class="form-row">
      <label for="quote_name"><?php echo __('Name', 'boopis-rfq'); ?><abbr class="required" title="required">* <?php echo empty($nameErr) ? '' : $nameErr; ?></abbr></label>
      <input type="text" name="quote_name" value="<?php echo isset($name) ? esc_attr($_POST['quote_name']) : ''; ?>">
    </p> 
  <p class="form-row">
      <label for="quote_email"><?php echo __('Email', 'boopis-rfq'); ?><abbr class="required" title="required">* <?php echo empty($emailErr) ? '' : $emailErr; ?></abbr></label>
      <input type="email" name="quote_email" value="<?php echo isset($email) ? esc_attr($_POST['quote_email']) : ''; ?>">
    </p>
  <p class="form-row">
      <label for="quote_email"><?php echo __('Phone No.', 'boopis-rfq'); ?><abbr class="required" title="required">* </abbr></label>
      <input type="text" name="quote_phone" value="<?php echo isset($phone) ? esc_attr($_POST['quote_phone']) : ''; ?>">
    </p>
    <div class="form-row form-row-wide">
      <input type="submit" class="button alt" value="<?php echo __('Send for quote', 'boopis-rfq'); ?>" />
      <input type="hidden" name="post_hidden"  value="Y" />
    </div>
  </form>

  <div class="boopis-credit" style="float:right;font-size:12px;text-align:right;">
    <a href="http://theheavenhomes.com" target="_blank">Powered by JassToor</a>
  </div>
<?php } ?>