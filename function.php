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

/* set minimum order amount
add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
function wc_minimum_order_amount() {
	global $woocommerce;
	$minimum = 2500;
	if ( $woocommerce->cart->get_cart_total() < $minimum ) {
           $woocommerce->add_error( sprintf( 'You must have an order with a minimum of %s to place your order.' , $minimum ) );
	}
}
  */
  
/* Adding Custom Currency to WooCommerce */
  add_filter( 'woocommerce_currencies', 'add_my_currency' ); function add_my_currency( $currencies ) { $currencies['DZD'] = __( 'Algerian Dinar', 'woocommerce' ); return $currencies;}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2); function add_my_currency_symbol( $currency_symbol, $currency ) { switch( $currency ) { case 'DZD': $currency_symbol = 'DZD'; break; } return $currency_symbol;}


