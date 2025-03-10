<?php
/**
 * Fired during plugin activation
 *
 * @link       http://www.webtoffee.com
 * @since      1.0.0
 *
 * @package    Wt_Smart_Coupon
 * @subpackage Wt_Smart_Coupon/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wt_Smart_Coupon
 * @subpackage Wt_Smart_Coupon/includes
 * @author     markhf <info@webtoffee.com>
 */
if( !class_exists('Wt_Smart_Coupon_Activator') )  {
	class Wt_Smart_Coupon_Activator {

		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function activate() {
			/**
			 *  Enable woocommmerce coupon settings
			 * @since 1.1.8
			 */
			if ( ! class_exists( 'WooCommerce' ) ) {
				deactivate_plugins( WT_SMARTCOUPON_BASE_NAME );
				wp_die(__("Oops! Woocommerce not activated..", 'wt-smart-coupons-for-woocommerce'), "", array('back_link' => 1));
				
			}
			if( defined('WT_SMARTCOUPON_INSTALLED_VERSION') && WT_SMARTCOUPON_INSTALLED_VERSION == 'PREMIUM' ) {
				
				return;
			}
			
			update_option( 'woocommerce_enable_coupons', 'yes' );

			/**
		     *	Install necessary tables
		     *	@since 1.4.3
		     */
			Wt_Smart_Coupon::install_tables();

			$is_existing_user = get_option( 'wt-smart-coupon-for-woo' );
			if ( ! $is_existing_user ) {
				
				//Activate new BOGO as default.
				update_option( 'wbte_sc_new_bogo_actvated', true );
			}

			do_action( 'after_wt_smart_coupon_for_woocommerce_is_activated' );
			update_option( 'wbte_sc_basic_activation_hook_version', WEBTOFFEE_SMARTCOUPON_VERSION );

			self::migrate();
		}

		/**
		 * 	@since 1.3.7
		 *	Migrate data from old versions
		 */
		public static function migrate()
		{
			global $wpdb;

			/**
			 * 	@since 1.3.7
			 *	Migrate option for coupon visibility sections 
			 */
			$couponlist = $wpdb->get_results("SELECT `post_id`, `meta_value` FROM `".$wpdb->postmeta."` WHERE `meta_key`='_wt_make_coupon_available_in_myaccount'", ARRAY_A);
			$couponlist = (isset($couponlist) && is_array($couponlist)) ? $couponlist : array();

			foreach ($couponlist as $row)
    		{
    			if(1==$row['meta_value'])
    			{
					add_post_meta($row['post_id'], '_wc_make_coupon_available', 'my_account', true);
					delete_post_meta($row['post_id'], '_wt_make_coupon_available_in_myaccount');
    			}
			}
		}	
	}
}
