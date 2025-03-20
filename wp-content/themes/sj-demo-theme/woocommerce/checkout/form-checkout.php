<?php
/**
 * The template for displaying product content in the form-checkout.php template .
 * @package SJ_Demo_Theme
 */
?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    wc_print_notice(__('Hey You! You must be logged in to checkout.', 'sj-demo-theme'), 'notice');
    return;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <div class="woocommerce-checkout-review-order">
        <?php 
            do_action('woocommerce_checkout_before_order_review');  
            do_action('woocommerce_checkout_order_review');     
            do_action('woocommerce_checkout_after_order_review'); 
        ?>
    </div>
</form>

<?php 
    do_action('woocommerce_after_checkout_form', $checkout); 
?>