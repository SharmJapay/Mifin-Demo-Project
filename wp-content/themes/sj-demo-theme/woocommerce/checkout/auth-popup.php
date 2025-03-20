<?php
/**
 * Rendering the Checkout Authentication Popup .
 * @package SJ_Demo_Theme
 */
?>

<?php if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ): ?>
    <div id="auth-popup" class="auth-popup">
        <p>Hi! You must log in to proceed to checkout.</p>
        <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="btn">Log in</a>
        <button class="close-popup">Dismiss</button>
    </div>
<?php endif; ?>