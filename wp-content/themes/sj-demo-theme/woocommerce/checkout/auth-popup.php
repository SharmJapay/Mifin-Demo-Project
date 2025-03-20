<?php
/**
 * Rendering the Custom Checkout Authentication Popup Feature for Woocommerce.
 * @package SJ_Demo_Theme
 */	
?>

<div id="auth-popup" class="auth-popup">
    <div class="popup-content">
        <h2>You need to log in</h2>
        <p>Please log in to proceed to checkout.</p>
        
        <div class="auth-button-container">
            <div class="login-button-container">
                <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="login-btn">Log in</a>
            </div>
            <div class="close-popup">Dismiss</div>
        </div>
    </div>
</div>
