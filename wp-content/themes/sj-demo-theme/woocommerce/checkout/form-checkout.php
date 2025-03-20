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
    wc_print_notice(__('Sorry! You must be logged in first to checkout.', 'sj-demo-theme'), 'notice');
    return;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

?>

<div class="custom-checkout-wrapper">
    <h2>Secure Checkout</h2>
    <?php do_action('woocommerce_before_checkout_form', $checkout); ?>
    
    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
        
        <!-- Start of Billing Details and Shipping Details  -->
            <?php if ($checkout->get_checkout_fields()) : ?>
                <?php do_action('woocommerce_checkout_before_customer_details'); ?>
                
                <div class="col2-set" id="customer_details">
                    <div class="col-1 billing-details">
                        <?php do_action('woocommerce_checkout_billing'); ?>
                    </div>
                    <div class="col-2 shipping-details">
                        <?php do_action('woocommerce_checkout_shipping'); ?>
                    </div>
                </div>
                
                <?php do_action('woocommerce_checkout_after_customer_details'); ?>
            <?php endif; ?>
        <!-- End of Billing Details and Shipping Details  -->
        
        <!-- Start of Order Review Details  -->
            <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

            <h3><?php esc_html_e('Your Order', 'sj-demo-theme'); ?></h3>
            

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        <!-- End of Order Review Details  -->

    </form>

    <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
</div>