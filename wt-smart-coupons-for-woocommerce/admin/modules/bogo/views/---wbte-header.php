<?php
/**
 * Smart coupon header
 *
 * @package    Wt_Smart_Coupon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wbte_sc_edit_header">
	<div class="wbte_sc_left_bogo_title">
		<h1><?php esc_html_e( 'Smart Coupon', 'wt-smart-coupons-for-woocommerce' ); ?></h1>
	</div>
	<div class="wbte_sc_right_logo">
		<h2><?php esc_html_e( 'Developed by', 'wt-smart-coupons-for-woocommerce' ); ?></h2>
		<img src="<?php echo esc_url( $admin_img_path ); ?>wbte_logo.svg" alt="<?php esc_html_e( 'WebToffee', 'wt-smart-coupons-for-woocommerce' ); ?>">
	</div>
</div>