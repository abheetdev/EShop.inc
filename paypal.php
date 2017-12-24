<?php
session_start();

if($_SEESION['pay']==""){
	?>

	<script type="text/javascript">
		window.location="shop.php";
	</script>

<?php
}
$_SESSION['paypalphp']="yes";
?>

<h1>Please wait we are transferring you in paypal....</h1>
<?php

//for the live version just remove the sandbox
$paypal_url = 'https://www.sandbox.paypal.com/'; 

//this variable is taken from cart.php
$pay=$_SESSION["pay"];

//this variable is taken from checkout.php
$order_id=$_SESSION["order_id"];
?>
<form action="<?php echo $paypal_url;?>/cgi-bin/webscr" method="post" name="buyCredits" id="buyCredits">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="abheetdevasthale@gmail.com">       <!-- this is the business address or the paypal add where the money would be transferred-->
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="item_name" value="payment for testing">        <!-- payment for vpn registration given earlier so estimate the project-->
    <input type="hidden" name="item_number" value="1212">
    <input type="hidden" name="amount" value="<?php echo $pay; ?>">
    <input type="hidden" name="return" value="http://localhost/youtube_project/user/payment_success.php?id=<?php echo $order_id; ?>">
</form>
<script type="text/javascript">
    document.getElementById("buyCredits").submit();
</script>