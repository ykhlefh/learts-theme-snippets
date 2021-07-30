/* Redirect empty Woocommerce checkout page to shop page*/

add_action( 'template_redirect', 'redirect_empty_checkout' );
 
function redirect_empty_checkout() {
    if ( is_checkout() && 0 == WC()->cart->get_cart_contents_count() && ! is_wc_endpoint_url( 'order-pay' ) && ! is_wc_endpoint_url( 'order-received' ) ) {
   wp_safe_redirect( get_permalink( wc_get_page_id( 'shop' ) ) ); 
        exit;
    }
}

/* Alternative option: Show “Return to shop” button in empty checkout page */
add_filter( 'woocommerce_checkout_redirect_empty_cart', '__return_false' );
add_filter( 'woocommerce_checkout_update_order_review_expired', '__return_false' );

