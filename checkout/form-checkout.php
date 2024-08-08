<?php
if (!defined('ABSPATH')) {
   exit;
}

wc_print_notices();
do_action('woocommerce_before_checkout_form', $checkout);

if ($checkout->get_checkout_fields()) : ?>

   <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
       <div class="row">
           <div class="col-1">
               <?php do_action('woocommerce_checkout_billing'); ?>
               <?php do_action('woocommerce_checkout_shipping'); ?>
           </div>
           <div class="col-2">
               <?php do_action('woocommerce_checkout_order_review'); ?>
           </div>
       </div>
   </form>

<?php endif; ?>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
