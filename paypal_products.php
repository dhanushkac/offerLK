<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 3/11/2016
 * Time: 8:52 PM
 */

require_once 'core/init.php';

$domain_name = 'www.easypaysl.com/paypal';

$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='testprojectseller@gmail.com'; // Business email ID
$return_success_url = "http://$domain_name/paypal_success.php";
$return_cancel_url = "http://$domain_name/paypal_cancel.php";

echo $return_success_url;
echo "<br>";
echo $return_cancel_url;
?>
<h4>Welcome, Guest</h4>

<div>

    <div >
        Item Price:$10
    </div>
    <div class="btn">
        <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
            <!--<input type="hidden" name="at" value="lwS--PNm_CUVgO4J3aJMxUOAoQKQMPff0SI490Co4p3U64xwpmbz_dTjCGC">-->
            <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="item_name" value="test payment">
            <input type="hidden" name="item_number" value="1">
            <input type="hidden" name="credits" value="510">
            <input type="hidden" name="userid" value="1">
            <input type="hidden" name="amount" value="1000">
            <!--            <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">-->
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="handling" value="0">
            <input type="hidden" name="cancel_return" value="<?php echo $return_cancel_url?>">
            <input type="hidden" name="return" value="<?php echo $return_success_url?>">
            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>
</div>

