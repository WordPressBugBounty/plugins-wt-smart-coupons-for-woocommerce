<?php
/**
 * BOGO edit page step 2
 *
 * @since 2.0.0
 * @package    Wt_Smart_Coupon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
.wbte_sc_bogo_email_select_inner span.invalid::after{ content:"<?php esc_html_e( 'Invalid email address', 'wt-smart-coupons-for-woocommerce' ); ?>"; }
</style>

<div class="wbte_sc_bogo_edit_step">
	<div class="wbte_sc_bogo_edit_step_head">
		<p class="wbte_sc_bogo_edit_step_title"><?php esc_html_e( 'Step 2', 'wt-smart-coupons-for-woocommerce' ); ?></p>
		<p><?php esc_html_e( 'Trigger', 'wt-smart-coupons-for-woocommerce' ); ?></p>
		<span class="wbte_sc_bogo_step_arrow dashicons"></span>
	</div>
	<div class="wbte_sc_bogo_edit_step_content">
		<div class="wbte_sc_bogo_step_opened">
			<table class="wbte_sc_bogo_edit_table">
				<tbody>
					<tr valign="top">
						<th>
							<p><?php esc_html_e( 'Customer', 'wt-smart-coupons-for-woocommerce' ); ?></p>
						</th>
						<td class="wbte_sc_bogo_edit_radio_fields" >
						<?php
							echo $ds_obj->get_component(
								'radio-group multi-line',
								array(
									'values' => array(
										'name'  => 'wbte_sc_bogo_triggers_when',
										'items' => array(
											array(
												'label' => esc_html__( 'Buys quantities of', 'wt-smart-coupons-for-woocommerce' ),
												'value' => 'wbte_sc_bogo_triggers_qty',
												'is_checked' => esc_attr( 'wbte_sc_bogo_triggers_qty' === $selected_triggers_when ),
											),
											array(
												'label' => esc_html__( 'Spends subtotal of', 'wt-smart-coupons-for-woocommerce' ),
												'value' => 'wbte_sc_bogo_triggers_subtotal',
												'is_checked' => esc_attr( 'wbte_sc_bogo_triggers_subtotal' === $selected_triggers_when ),
											),
										),
									),
								)
							);
							?>
						</td>
					</tr>
					<tr class="<?php echo 'wbte_sc_bogo_triggers_subtotal' === $selected_triggers_when ? '' : 'wbte_sc_bogo_conditional_hidden '; ?> wbte_sc_bogo_edit_minmax_amount">
						<th>
							<label for="_wbte_sc_bogo_min_amount"><?php esc_html_e( 'Min amount', 'wt-smart-coupons-for-woocommerce' ); ?></label>
						</th>
						<td>
							<div class="wbte_sc_bogo_icon_input">
								<input type="text" id="_wbte_sc_bogo_min_amount" name="_wbte_sc_bogo_min_amount" class="wbte_sc_bogo_input_only_numbers_with_decimal" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_min_amount' ) ); ?>">
								<div class="wbte_sc_bogo_icon_input_symbol">
									<?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
								</div>
							</div>
						</td>
					</tr>
					<tr class="<?php echo 'wbte_sc_bogo_triggers_subtotal' === $selected_triggers_when ? '' : 'wbte_sc_bogo_conditional_hidden '; ?> wbte_sc_bogo_edit_minmax_amount">
						<th>
							<label for="_wbte_sc_bogo_max_amount" class="wbte_sc_bogo_edit_flex_label"><?php esc_html_e( 'Max amount', 'wt-smart-coupons-for-woocommerce' ); ?></label><span><?php esc_html_e( '(optional)', 'wt-smart-coupons-for-woocommerce' ); ?></span>
						</th>
						<td>
							<div class="wbte_sc_bogo_icon_input">
								<input type="text" id="_wbte_sc_bogo_max_amount" name="_wbte_sc_bogo_max_amount" class="wbte_sc_bogo_input_only_numbers_with_decimal" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_max_amount' ) ); ?>">
								<div class="wbte_sc_bogo_icon_input_symbol">
									<?php echo esc_html( get_woocommerce_currency_symbol() ); ?>
								</div>
							</div>
						</td>
					</tr>
					<tr class="<?php echo 'wbte_sc_bogo_triggers_qty' === $selected_triggers_when ? '' : 'wbte_sc_bogo_conditional_hidden '; ?> wbte_sc_bogo_edit_minmax_qty">
						<th>
							<label for="_wbte_sc_bogo_min_qty"><?php esc_html_e( 'Min quantity', 'wt-smart-coupons-for-woocommerce' ); ?></label>
						</th>
						<td>
							<input type="text" id="_wbte_sc_bogo_min_qty" name="_wbte_sc_bogo_min_qty" class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_min_qty' ) ); ?>">
						</td>
					</tr>
					<tr class="<?php echo 'wbte_sc_bogo_triggers_qty' === $selected_triggers_when ? '' : 'wbte_sc_bogo_conditional_hidden '; ?> wbte_sc_bogo_edit_minmax_qty">
						<th>
							<label for="_wbte_sc_bogo_max_qty" class="wbte_sc_bogo_edit_flex_label"><?php esc_html_e( 'Max quantity', 'wt-smart-coupons-for-woocommerce' ); ?></label><span><?php esc_html_e( '(optional)', 'wt-smart-coupons-for-woocommerce' ); ?></span>
						</th>
						<td>
							<input type="text" id="_wbte_sc_bogo_max_qty" name="_wbte_sc_bogo_max_qty" class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_max_qty' ) ); ?>">
						</td>
					</tr>
				</tbody>
			</table>
			<!-- Customer buys -->
			<table class="wbte_sc_bogo_edit_table wbte_sc_bogo_customer_buys_table">
				<tbody>
					<tr>
						<th colspan="2">
							<div class="wbte_sc_bogo_edit_add_div">
								<p><?php esc_html_e( 'Customer buys', 'wt-smart-coupons-for-woocommerce' ); ?>
									<span class="wbte_sc_bogo_edit_add_button wbte_sc_bogo_edit_add_customer_buys"><?php esc_html_e( '+ Add', 'wt-smart-coupons-for-woocommerce' ); ?></span>
								</p>
								<div class="wbte_sc_bogo_edit_customer_buys_select wbte_sc_bogo_edit_custom_drop_down">
									<p class="wbte_sc_bogo_edit_products_row_btn"><?php esc_html_e( 'Product restriction', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<p class="wbte_sc_bogo_disabled_drop_down_btn"><?php esc_html_e( 'Category restriction', 'wt-smart-coupons-for-woocommerce' ); ?>
										<img src="<?php echo esc_url( $admin_img_path . 'prem_crown_2.svg' ); ?>" alt="<?php esc_attr_e( 'premium', 'wt-smart-coupons-for-woocommerce' ); ?>" />
									</p>
								</div>
							</div>
						</th>
					</tr>
					<?php
						$specific_products   = array_filter( explode( ',', self::get_coupon_meta_value( $coupon_id, 'wbte_sc_bogo_product_ids' ) ) );
						$excluded_products   = array_filter( explode( ',', self::get_coupon_meta_value( $coupon_id, 'wbte_sc_bogo_exclude_product_ids' ) ) );
					?>
					<!-- Product restriction -->
					<tr class="<?php echo ( empty( $specific_products ) && empty( $excluded_products ) ) ? 'wbte_sc_bogo_conditional_hidden ' : ' '; ?> wbte_sc_bogo_edit_products_row">
						<td colspan="2">
							<div class="wbte_sc_bogo_edit_products_tab">
								<div class="wbte_sc_bogo_edit_prod_restriction_tab_head">
									<div class="wbte_sc_bogo_product_restriction_select_btn wbte_sc_bogo_edit_custom_drop_down_btn">
										<p><?php ! empty( $excluded_products ) ? esc_html_e( 'Any product(s) except', 'wt-smart-coupons-for-woocommerce' ) : esc_html_e( 'Specific product(s) only', 'wt-smart-coupons-for-woocommerce' ); ?></p>
										<span class="dashicons dashicons-arrow-down-alt2"></span>
									</div>
									<div class="wbte_sc_bogo_product_restriction_select_option wbte_sc_bogo_edit_custom_drop_down">
										<p class="wbte_sc_bogo_edit_specific_prod_btn wbte_sc_bogo_prod_cat_restriction_sub_btn"><?php esc_html_e( 'Specific product(s) only', 'wt-smart-coupons-for-woocommerce' ); ?></p>
										<p class="wbte_sc_bogo_edit_excluded_prod_btn wbte_sc_bogo_prod_cat_restriction_sub_btn"><?php esc_html_e( 'Any product(s) except', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									</div>
									<span style="height: 24px;"  class="wbte_sc_bogo_edit_trash"><?php echo wp_kses_post( $ds_obj->render_html( array( 'html' => '{{wbte-ds-icon-trash}}' ) ) ); ?></span>
								</div>

								<div class="wbte_sc_bogo_edit_specific_products_row <?php echo ! empty( $excluded_products ) ? 'wbte_sc_bogo_conditional_hidden ' : ' '; ?>">
									<select id="wbte_sc_bogo_specific_products" class="wc-product-search" multiple="multiple" style="width: 95%;" name="wbte_sc_bogo_product_ids[]" data-placeholder="<?php esc_attr_e( 'Search for product', 'wt-smart-coupons-for-woocommerce' ); ?>" data-action="woocommerce_json_search_products_and_variations">
									<?php
									foreach ( $specific_products as $product_id ) {
										$product = wc_get_product( $product_id );
										if ( is_object( $product ) ) {
											echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . esc_html( wp_strip_all_tags( $product->get_formatted_name() ) ) . '</option>';
										}
									}
									?>
									</select>
									<br>
									<?php
									echo $ds_obj->get_component(
										'checkbox normal',
										array(
											'values' => array(
												'name'  => '_wt_product_condition',
												'id'    => 'wbte_sc_bogo_specific_products_all',
												'value' => 'and',
												'is_checked' => esc_attr( 'and' === self::get_coupon_meta_value( $coupon_id, '_wt_product_condition' ) ),
												'label' => esc_html__( 'Apply coupon only if all the selected products are in the cart', 'wt-smart-coupons-for-woocommerce' ),
											),
											'class'  => array( 'wbte_sc_bogo_prod_condition_checkbox' ),
										)
									);
									?>
								</div>

								<div class="wbte_sc_bogo_edit_excluded_products_row <?php echo empty( $excluded_products ) ? 'wbte_sc_bogo_conditional_hidden ' : ' '; ?>">
									<select id="wbte_sc_bogo_excluded_products" class="wc-product-search" multiple="multiple" style="width: 95%;" name="wbte_sc_bogo_exclude_product_ids[]" data-placeholder="<?php esc_attr_e( 'Search for product', 'wt-smart-coupons-for-woocommerce' ); ?>" data-action="woocommerce_json_search_products_and_variations">
									<?php
									foreach ( $excluded_products as $product_id ) {
										$product = wc_get_product( $product_id );
										if ( is_object( $product ) ) {
											echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . esc_html( wp_strip_all_tags( $product->get_formatted_name() ) ) . '</option>';
										}
									}
									?>
									</select>
								</div>
							</div>
						</td>
					</tr>
					<tr class="<?php echo ( ! empty( $specific_products ) || ! empty( $excluded_products ) ) ? 'wbte_sc_bogo_conditional_hidden ' : ''; ?> wbte_sc_bogo_prod_default_row">
						<td colspan="2"><?php esc_html_e( 'Any product (default)', 'wt-smart-coupons-for-woocommerce' ); ?></td>
					</tr>
				</tbody>
			</table>
			<!-- Additonal conditions -->
			<table class="wbte_sc_bogo_edit_table wbte_sc_bogo_additional_fields_table">
				<tbody>
					<tr>
						<th colspan="2">
							<div class="wbte_sc_bogo_edit_add_div">
								<p><?php esc_html_e( 'Optional conditions', 'wt-smart-coupons-for-woocommerce' ); ?>
									<span class="wbte_sc_bogo_edit_add_button wbte_sc_bogo_edit_addition_conditions"><?php esc_html_e( '+ Add', 'wt-smart-coupons-for-woocommerce' ); ?></span>
								</p>
								<div class="wbte_sc_bogo_edit_additional_condition_select wbte_sc_bogo_edit_custom_drop_down">
									<p class="wbte_sc_bogo_edit_custom_select_head"><?php esc_html_e( 'Additional', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<p class="wbte_sc_bogo_qty_row wbte_sc_bogo_qty_row_to_hide"><?php esc_html_e( 'Total quantity', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<p class="wbte_sc_bogo_each_qty_row wbte_sc_bogo_each_qty_row_to_hide"><?php esc_html_e( 'Quantity of each product', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<p class="wbte_sc_bogo_per_coupon_row"><?php esc_html_e( 'Usage limit per offer', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<p class="wbte_sc_bogo_per_user_row"><?php esc_html_e( 'Usage limit per user', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<p class="wbte_sc_bogo_email_row"><?php esc_html_e( 'Allowed emails', 'wt-smart-coupons-for-woocommerce' ); ?></p>
								</div>
							</div>
						</th>
					</tr>
					<tr class="<?php echo ( 0 >= self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_min_qty_add' ) && empty( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_max_qty_add' ) ) ) ? ' wbte_sc_bogo_conditional_hidden ' : ' '; ?> wbte_sc_bogo_qty_row wbte_sc_bogo_qty_row_to_hide">
						<td colspan="2">
							<div class="wbte_sc_bogo_additional_fields wbte_sc_bogo_qty_field">
								<span style="height: 24px;"  class="wbte_sc_bogo_edit_trash"><?php echo wp_kses_post( $ds_obj->render_html( array( 'html' => '{{wbte-ds-icon-trash}}' ) ) ); ?></span>
								<div class="wbte_sc_bogo_additional_flex">
									<p><?php esc_html_e( 'Minimum quantity', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<input type="text" name="_wbte_sc_bogo_min_qty_add" id="_wbte_sc_bogo_min_qty_add" class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_min_qty_add' ) ); ?>">
								</div>
								<br>
								<div class="wbte_sc_bogo_additional_flex">
									<p><?php esc_html_e( 'Maximum quantity', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<input type="text" name="_wbte_sc_bogo_max_qty_add" id="_wbte_sc_bogo_max_qty_add" placeholder="<?php esc_attr_e( 'Optional', 'wt-smart-coupons-for-woocommerce' ); ?>" class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_bogo_max_qty_add' ) ); ?>">
								</div>
							</div>
						</td>
					</tr>
					<tr class="<?php echo empty( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_min_qty_each' ) ) && empty( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_max_qty_each' ) ) ? ' wbte_sc_bogo_conditional_hidden ' : ' '; ?> wbte_sc_bogo_each_qty_row wbte_sc_bogo_each_qty_row_to_hide">
						<td colspan="2">
							<div class="wbte_sc_bogo_additional_fields wbte_sc_bogo_qty_field">
								<span style="height: 24px;"  class="wbte_sc_bogo_edit_trash"><?php echo wp_kses_post( $ds_obj->render_html( array( 'html' => '{{wbte-ds-icon-trash}}' ) ) ); ?></span>
								<div class="wbte_sc_bogo_additional_flex">
									<p><?php esc_html_e( 'Min quantity of each item', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<input type="text" name="_wbte_sc_min_qty_each" id="_wbte_sc_min_qty_each" class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_min_qty_each' ) ); ?>">
								</div>
								<br>
								<div class="wbte_sc_bogo_additional_flex">
									<p><?php esc_html_e( 'Max quantity of each item', 'wt-smart-coupons-for-woocommerce' ); ?></p>
									<input type="text" name="_wbte_sc_max_qty_each" id="_wbte_sc_max_qty_each" placeholder=<?php esc_attr_e( 'Optional', 'wt-smart-coupons-for-woocommerce' ) ?> class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, '_wbte_sc_max_qty_each' ) ); ?>">
								</div>
							</div>
						</td>
					</tr>
					<tr class="<?php echo empty( self::get_coupon_meta_value( $coupon_id, 'usage_limit' ) ) ? ' wbte_sc_bogo_conditional_hidden ' : ' '; ?> wbte_sc_bogo_per_coupon_row">
						<td colspan="2">
							<div class="wbte_sc_bogo_additional_fields">
								<span style="height: 24px;"  class="wbte_sc_bogo_edit_trash"><?php echo wp_kses_post( $ds_obj->render_html( array( 'html' => '{{wbte-ds-icon-trash}}' ) ) ); ?></span>
								<div class="wbte_sc_bogo_additional_flex">
									<p>
                                        <?php 
                                        esc_html_e( 'Usage limit per offer', 'wt-smart-coupons-for-woocommerce' ); 
                                        echo ' ';
                                        echo wp_kses_post( wc_help_tip( __( 'The total number of times this offer can be used in the store, including multiple redemptions by the same user', 'wt-smart-coupons-for-woocommerce' ) ) );
                                        ?>
									</p>
									<input type="text" name="usage_limit" id="usage_limit" class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, 'usage_limit' ) ); ?>">
								</div>
							</div>
						</td>
					</tr>
					<tr class="<?php echo empty( self::get_coupon_meta_value( $coupon_id, 'usage_limit_per_user' ) ) ? ' wbte_sc_bogo_conditional_hidden ' : ' '; ?> wbte_sc_bogo_per_user_row">
						<td colspan="2">
							<div class="wbte_sc_bogo_additional_fields">
								<span style="height: 24px;"  class="wbte_sc_bogo_edit_trash"><?php echo wp_kses_post( $ds_obj->render_html( array( 'html' => '{{wbte-ds-icon-trash}}' ) ) ); ?></span>
								<div class="wbte_sc_bogo_additional_flex">
									<p>
                                        <?php 
                                        esc_html_e( 'Usage limit per user', 'wt-smart-coupons-for-woocommerce' ); 
                                        echo ' ';
                                        echo wp_kses_post( wc_help_tip( __( 'The maximum number of times a single user can redeem this offer. It must be less than the overall usage limit per offer', 'wt-smart-coupons-for-woocommerce' ) ) );
                                        ?>
									</p>
									<input type="text" name="usage_limit_per_user" id="usage_limit_per_user" class="wbte_sc_bogo_edit_input wbte_sc_bogo_input_only_number" value="<?php echo esc_attr( self::get_coupon_meta_value( $coupon_id, 'usage_limit_per_user' ) ); ?>">
								</div>
							</div>
						</td>
					</tr>
					<tr class="<?php echo empty( $coupon->get_email_restrictions( 'edit' ) ) ? ' wbte_sc_bogo_conditional_hidden ' : ' '; ?> wbte_sc_bogo_email_row">
						<td colspan="2">
							<div class="wbte_sc_bogo_additional_fields wbte_sc_bogo_email_flex">
								<span style="height: 24px;"  class="wbte_sc_bogo_edit_trash"><?php echo wp_kses_post( $ds_obj->render_html( array( 'html' => '{{wbte-ds-icon-trash}}' ) ) ); ?></span>
								<label for="customer_email"><?php esc_html_e( 'Allowed emails', 'wt-smart-coupons-for-woocommerce' ); ?></label>
								<?php echo wp_kses_post( wc_help_tip( __( 'The BOGO deal is only valid for recipients of the selected emails.', 'wt-smart-coupons-for-woocommerce' ) ) ); ?>
								<div>
									<select style="width: 333px; height: 55px;" name="wbte_sc_bogo_emails[]" multiple="multiple" class="wbte_sc_bogo_email_search" data-placeholder="<?php echo esc_attr( 'mail@example.com' ); ?>">
									<?php
										$emails = $coupon->get_email_restrictions( 'edit' );
									foreach ( $emails as $email ) {
										echo '<option value="' . esc_attr( $email ) . '" selected="selected">' . esc_html( $email ) . '</option>';
									}
									?>
									</select>
									<p class="wbte_sc_bogo_email_field_caption"><?php echo wp_kses_post( __( 'Offer won’t be auto-applied for guest users when email restriction is enabled.', 'wt-smart-coupons-for-woocommerce' ) ); ?></p>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="wbte_sc_bogo_step_short_description wbte_sc_bogo_step2_short_description">
			<!-- Values will assign from js -->
			<p></p>
		</div>
		<br>
		<div class="wbte_sc_bogo_step_add_desc"></div>
	</div>
</div>