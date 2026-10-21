<?php
/**
 * Premium features sidebar
 *
 * @package Wt_Smart_Coupon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$wbte_custom_tick = '<img src="' . esc_url( WT_SMARTCOUPON_MAIN_URL ) . 'admin/images/prem_crown.svg" alt="' . esc_attr__( 'Crown', 'wt-smart-coupons-for-woocommerce' ) . '" style="margin-right:9.5px;">';

/**
 * BFCM season sidebar. The coupon edit page Pro meta box sets $wbte_sc_always_new_layout to use this layout
 * all year; the BFCM deal strip and wording are shown only during the season.
 *
 * @since 2.3.3
 */
$wbte_sc_is_bfcm = method_exists( 'Wt_Smart_Coupon_Admin', 'is_bfcm_season' ) && Wt_Smart_Coupon_Admin::is_bfcm_season();
if ( $wbte_sc_is_bfcm || ! empty( $wbte_sc_always_new_layout ) ) {
	$wbte_bfcm_features = array(
		__( 'Auto-apply coupons', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Create tiered Buy X Get Y (BOGO) offers', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Create product quantity/subtotal-based discounts', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Schedule coupons by date, time, or day of the week', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Display countdown banners and coupon widgets', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Set advanced coupon rules and conditions', 'wt-smart-coupons-for-woocommerce' ),
	);

	// Shown on clicking "View more".
	$wbte_bfcm_more_features = array(
		__( 'Create shareable URL coupons', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Offer free shipping coupons', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Offer store credits and gift cards', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Set up smart giveaway campaigns', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Shipping, purchase history, and payment method-based coupons', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Sign-up coupons', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Cart abandonment coupons', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Bulk generate and export coupons', 'wt-smart-coupons-for-woocommerce' ),
		__( 'Import coupons via CSV', 'wt-smart-coupons-for-woocommerce' ),
	);
	?>
	<div class="wt_smart_coupon_pro_features wbte_sc_bfcm_sidebar">
		<?php if ( $wbte_sc_is_bfcm ) : ?>
			<div class="wbte_sc_bfcm_sidebar_deal">
				<img class="wbte_sc_bfcm_sidebar_tag" src="<?php echo esc_url( WT_SMARTCOUPON_MAIN_URL . 'admin/images/bfcm_tag.svg' ); ?>" alt="<?php esc_attr_e( '30% OFF', 'wt-smart-coupons-for-woocommerce' ); ?>">
				<div>
					<p class="wbte_sc_bfcm_sidebar_deal_hd"><?php esc_html_e( 'BFCM Deal of the Year is Here!', 'wt-smart-coupons-for-woocommerce' ); ?></p>
					<p class="wbte_sc_bfcm_sidebar_deal_desc"><?php esc_html_e( 'Grab huge offers on our premium plugins.', 'wt-smart-coupons-for-woocommerce' ); ?></p>
				</div>
			</div>
		<?php endif; ?>
		<div class="wbte_sc_bfcm_sidebar_intro">
			<img src="<?php echo esc_url( WT_SMARTCOUPON_MAIN_URL . 'admin/images/upgrade_box_icon.svg' ); ?>" alt="">
			<p>
				<?php
				if ( $wbte_sc_is_bfcm ) {
					esc_html_e( 'Get BFCM-ready & boost sales with advanced WooCommerce coupon features.', 'wt-smart-coupons-for-woocommerce' );
				} else {
					esc_html_e( 'Create better coupon campaigns with advanced WooCommerce coupon features', 'wt-smart-coupons-for-woocommerce' );
				}
				?>
			</p>
		</div>
		<div class="wbte_sc_bfcm_sidebar_content">
			<h3 class="wbte_sc_bfcm_sidebar_content_hd"><?php esc_html_e( 'Smart Coupons Premium features:', 'wt-smart-coupons-for-woocommerce' ); ?></h3>
			<ul class="wbte_sc_bfcm_sidebar_list">
				<?php foreach ( $wbte_bfcm_features as $wbte_bfcm_feature ) : ?>
					<li><?php echo esc_html( $wbte_bfcm_feature ); ?></li>
				<?php endforeach; ?>
				<?php foreach ( $wbte_bfcm_more_features as $wbte_bfcm_feature ) : ?>
					<li class="wbte_sc_bfcm_sidebar_more"><?php echo esc_html( $wbte_bfcm_feature ); ?></li>
				<?php endforeach; ?>
			</ul>
			<button type="button" class="wbte_sc_bfcm_sidebar_view_more" aria-expanded="false" data-less="<?php esc_attr_e( 'View less', 'wt-smart-coupons-for-woocommerce' ); ?>"><?php esc_html_e( 'View more', 'wt-smart-coupons-for-woocommerce' ); ?></button>
			<a class="wbte_sc_bfcm_sidebar_btn" href="<?php echo esc_url( $wbte_premium_url ); ?>" target="_blank"><?php esc_html_e( 'Check Out Premium', 'wt-smart-coupons-for-woocommerce' ); ?> <span class="dashicons dashicons-arrow-right-alt"></span></a>
			<?php if ( ! empty( $wbte_sc_always_new_layout ) ) : ?>
				<?php // Handled by the shared cross-promotion banners script. ?>
				<a href="#" class="wt-cta-dismiss wbte_sc_bfcm_sidebar_dismiss"><?php esc_html_e( 'Dismiss', 'wt-smart-coupons-for-woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<script>
		jQuery( function ( $ ) {
			$( '.wbte_sc_bfcm_sidebar_view_more' ).on( 'click', function () {
				const btn      = $( this );
				const expanded = 'true' !== btn.attr( 'aria-expanded' );
				const label    = btn.attr( 'data-less' );

				btn.closest( '.wbte_sc_bfcm_sidebar' ).toggleClass( 'wbte_sc_bfcm_sidebar_expanded', expanded );
				btn.attr( { 'aria-expanded': expanded, 'data-less': btn.text() } ).text( label );
			} );
		} );
	</script>
	<?php
	return;
}
?>
<div class="wt_smart_coupon_pro_features">
	<div class="wt_smart_coupon_premium">
		<div class="wt_sc_upgrade_pro_main">
			<span><img src="<?php echo esc_url( WT_SMARTCOUPON_MAIN_URL . 'admin/images/upgrade_box_icon.svg' ); ?>"></span>
			<div class="wt_sc_upgrade_pro_main_hd"><?php esc_html_e( 'Make Irresistible Coupon Campaigns with Powerful Features', 'wt-smart-coupons-for-woocommerce' ); ?></div>
		</div>
		<div class="wt_sc_upgrade_pro_content">
			<h3 class="wt_sc_upgrade_pro_content_head"><?php esc_html_e( 'Smart Coupons for WooCommerce Pro', 'wt-smart-coupons-for-woocommerce' ); ?></h3>
			<ul class="ticked-list">
				<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Create advanced BOGO coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Offer store credits and gift cards', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Set up smart giveaway campaigns', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<div class="wt-sc-pro-features-all-features">
					<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Bulk generate coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Coupons to boost conversion rate:', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<ul class="wt-sc-pro-features-all-features-bullet">
						<li><?php esc_html_e( 'Purchase history-based coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
						<li><?php esc_html_e( 'Sign up coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
						<li><?php esc_html_e( 'Cart abandonment coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					</ul>
					<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Create day-specific deals', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Display coupon banners and widgets', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li><?php echo wp_kses_post( $wbte_custom_tick ); ?></span><?php esc_html_e( 'Import coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				</div>
				<p class="wt-sc-pro-features-view-all"><?php esc_html_e( 'View all powerful options..', 'wt-smart-coupons-for-woocommerce' ); ?></p>
				<p class="wt-sc-pro-features-view-less"><?php esc_html_e( 'View less...', 'wt-smart-coupons-for-woocommerce' ); ?></p>
			</ul>
		</div>
		<div class="wt_sc_upgrade_pro_lower_green">
			<div class="wt_sc_upgrade_pro_button">
				<a style="background:#4750CB; font-size:16px; font-weight:500; border-radius:11px; line-height:58px; width:calc(100% - 32px); color:#fff; border:none; background-color:#4750CB;" class="button button-secondary" href="<?php echo esc_attr( $wbte_premium_url ); ?>" target="_blank"><?php esc_html_e( 'Unlock pro features', 'wt-smart-coupons-for-woocommerce' ); ?> <span class="dashicons dashicons-arrow-right-alt" style="line-height:58px;font-size:14px;"></span> </a>
			</div>
			<div class="wt_sc_upgrade_pro_icon_box" >
				<img src="<?php echo esc_url( WT_SMARTCOUPON_MAIN_URL . 'admin/images/prem_money.svg' ); ?>">
				<p><?php esc_html_e( '30 Day Money Back Guarantee', 'wt-smart-coupons-for-woocommerce' ); ?></p>
			</div>
			<div class="wt_sc_upgrade_pro_icon_box">
				<img src="<?php echo esc_url( WT_SMARTCOUPON_MAIN_URL . 'admin/images/prem_love.svg' ); ?>">
				<p><?php esc_html_e( '99% Customer Satisfaction rating', 'wt-smart-coupons-for-woocommerce' ); ?></p>
			</div>
		</div>
		

	</div>
</div>
<script>
	jQuery(document).ready(function ($) {
		$('.wt-sc-pro-features-view-all, .wt-sc-pro-features-view-less').on('click', function() {
			$('.wt-sc-pro-features-all-features').toggle();
			$('.wt-sc-pro-features-view-all, .wt-sc-pro-features-view-less').toggle();
		});
	});
</script>