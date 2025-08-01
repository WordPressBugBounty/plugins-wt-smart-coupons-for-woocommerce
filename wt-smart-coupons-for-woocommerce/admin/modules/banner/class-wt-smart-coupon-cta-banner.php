<?php
/**
 * Smart Coupons for WooCommerce Pro CTA meta box.
 *
 * @link
 * @since 2.2.1
 *
 * @package  Wt_Smart_Coupon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Wt_Smart_Coupon_Cta_Banner
 *
 * @since  2.2.1
 */
if ( ! class_exists( 'Wt_Smart_Coupon_Cta_Banner' ) ) {

	/**
	 * Class Wt_Smart_Coupon_Cta_Banner
	 *
	 * @since 2.2.1
	 */
	class Wt_Smart_Coupon_Cta_Banner {
		/**
		 * Constructor.
		 *
		 * @since 2.2.1
		 */
		public function __construct() {
			/**
			 * Filter hook to get the active plugins.
			 *
			 * @since 2.2.1
			 */
			if ( ! in_array( 'wt-smart-coupon-pro/wt-smart-coupon-pro.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true )
				&& ! get_option( 'wt_hide_smart_coupon_cta_banner', false )
			) {
				add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
				add_action( 'wp_ajax_wt_dismiss_smart_coupon_cta_banner', array( $this, 'dismiss_banner' ) );
				add_action( 'admin_print_footer_scripts', array( $this, 'add_cta_scripts' ) );
			}
		}


		/**
		 * Add the meta box to the coupon edit screen
		 *
		 * @since 2.2.1
		 */
		public function add_meta_box() {
			if ( ! defined( 'WT_SMART_COUPON_DISPLAY_BANNER' ) ) {
				add_meta_box(
					'wbte-sc-upgrade-to-pro',
					__( 'Create better coupon campaigns with advanced WooCommerce coupon features', 'wt-smart-coupons-for-woocommerce' ),
					array( $this, 'render_banner' ),
					'shop_coupon',
					'side',
					'core'
				);
				define( 'WT_SMART_COUPON_DISPLAY_BANNER', true );
			}
		}

		/**
		 * Enqueue styles.
		 *
		 * @since 2.2.1
		 *
		 * @param string $hook The current admin page.
		 */
		public function enqueue_scripts( $hook ) {
			if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) || get_post_type() !== 'shop_coupon' ) {
				return;
			}

			wp_enqueue_style(
				'wt-sc-pro-cta-metabox',
				plugin_dir_url( __FILE__ ) . 'assets/css/wt-sc-pro-cta-metabox.css',
				array(),
				WEBTOFFEE_SMARTCOUPON_VERSION
			);
		}

		/**
		 * Render the banner HTML.
		 *
		 * @since 2.2.1
		 */
		public function render_banner() {

			$plugin_url = 'https://www.webtoffee.com/product/smart-coupons-for-woocommerce/?utm_source=free_plugin_cross_promotion&utm_medium=marketing_coupons_tab&utm_campaign=Smart_coupons';

			?>
			<style type="text/css">
				#wbte-sc-upgrade-to-pro .postbox-header{  height: 80px; background: url( <?php echo esc_attr( WT_SMARTCOUPON_MAIN_URL . 'admin/images/upgrade_box_icon.svg' ); ?> ) no-repeat 18px 18px #F9FCFF; padding-left: 65px; margin-bottom: 18px; background-size: 45px 45px; border-bottom: 1px dotted #CDE1F5; }
			</style>
			
			<p class="wt-sc-metabox-pro-features-heading"><?php esc_html_e( 'Smart Coupons for WooCommerce Pro', 'wt-smart-coupons-for-woocommerce' ); ?></p>
			<ul class="wt-sc-metabox-pro-features">

				<li></span><?php esc_html_e( 'Auto-apply coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<li></span><?php esc_html_e( 'Create attractive Buy X Get Y (BOGO) offers', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<li></span><?php esc_html_e( 'Create product quantity/subtotal based discounts', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<li></span><?php esc_html_e( 'Offer store credits and gift cards', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<li></span><?php esc_html_e( 'Set up smart giveaway campaigns', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				<li></span><?php esc_html_e( 'Set advanced coupon rules and conditions', 'wt-smart-coupons-for-woocommerce' ); ?></li>

				<div class="wt-sc-pro-features-all-features">
					<li></span><?php esc_html_e( 'Bulk generate coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li></span><?php esc_html_e( 'Shipping, purchase history, and payment method-based coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li></span><?php esc_html_e( 'Sign up coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li></span><?php esc_html_e( 'Cart abandonment coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li></span><?php esc_html_e( 'Create day-specific deals', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li></span><?php esc_html_e( 'Display coupon banners and widgets', 'wt-smart-coupons-for-woocommerce' ); ?></li>
					<li></span><?php esc_html_e( 'Import coupons', 'wt-smart-coupons-for-woocommerce' ); ?></li>
				</div>
				<p class="wt-sc-pro-features-view-all"><?php esc_html_e( 'View all premium features', 'wt-smart-coupons-for-woocommerce' ); ?></p>
				<p class="wt-sc-pro-features-view-less"><?php esc_html_e( 'Show less', 'wt-smart-coupons-for-woocommerce' ); ?></p>
			</ul>
			<div style="text-align: center;">
				<a href="<?php echo esc_attr( $plugin_url ); ?>" class="wt-sc-metabox-upgrade-to-pro-btn" target="_blank">
				<img src="<?php echo esc_url( WT_SMARTCOUPON_MAIN_URL . 'admin/modules/banner/assets/images/promote_crown.png' ); ?>" style="width: 15.01px; height: 10.08px; margin-right: 8px;"><?php esc_html_e( 'Get the plugin', 'wt-smart-coupons-for-woocommerce' ); ?>
				</a>
				<p class="wt-cta-dismiss" style="display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; cursor: pointer; margin: 0"><?php esc_html_e( 'Dismiss', 'wt-woocommerce-related-products' ); ?></p>
			</div>
			<?php
		}

		/**
		 * Handle the dismiss action via AJAX
		 *
		 * @since 2.2.1
		 */
		public function dismiss_banner() {
			check_ajax_referer( 'wt_dismiss_smart_coupon_cta_banner_nonce', 'nonce' );

			// Check if user has permission.
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'Insufficient permissions', 'wt-smart-coupons-for-woocommerce' ) );
			}

			// Update the option to hide the banner.
			update_option( 'wt_hide_smart_coupon_cta_banner', true );

			wp_send_json_success();
		}

		/**
		 * Add the CTA scripts.
		 *
		 * @since 2.2.1
		 */
		public function add_cta_scripts() {
			$ajax_url = admin_url( 'admin-ajax.php' );
			$nonce    = wp_create_nonce( 'wt_dismiss_smart_coupon_cta_banner_nonce' );
			?>
			<script>
				jQuery(document).ready(function($) {
					$(document).on('click', '.wt-sc-pro-features-view-all', function(){
						$(".wt-sc-pro-features-all-features").show();
						$(".wt-sc-pro-features-view-all").hide();
						$(".wt-sc-pro-features-view-less").show();
					});

					$(document).on('click', '.wt-sc-pro-features-view-less', function(){
						$(".wt-sc-pro-features-all-features").hide();
						$(".wt-sc-pro-features-view-less").hide();
						$(".wt-sc-pro-features-view-all").show();
					});

					$( document ).on('click', '#wbte-sc-upgrade-to-pro .wt-cta-dismiss', function( e ){
						e.preventDefault();
						$.ajax({
							url: '<?php echo esc_url( $ajax_url ); ?>',
							type: 'POST',
							data: {
								action: 'wt_dismiss_smart_coupon_cta_banner',
								nonce: '<?php echo esc_attr( $nonce ); ?>'
							},
							success: function(response) {
								if (response.success) {
									$('#wbte-sc-upgrade-to-pro').hide();
								} else {
									wbte_sc_notify_msg.error( response.data );
								}
							},
							error: function() {
								wbte_sc_notify_msg.error( WTSmartCouponAdminOBJ.msgs.error );
							}
						});
					});
				});
			</script>
			<?php
		}
	}

	new Wt_Smart_Coupon_Cta_Banner();
}
