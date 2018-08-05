<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$post_meta = get_post_meta(get_the_ID());
$sku = $post_meta['_sku'][0];
$reg_price = $post_meta['_regular_price'][0];
$sale_price = $post_meta['_sale_price'][0];

$shipping_info = get_field('shipping_info', 'options');
$return_policy = get_field('return_policy', 'options');

$product_info = get_field('product_information');


?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

	<div class="row">
		<div class="summary entry-summary col-12 col-md-6 order-md-1">
			<h2><?php the_title(); ?></h2>
			<?php if ($sku) { ?>
			<p>SKU: <?php echo $sku; ?></p>
			<?php } ?>
			<?php
			wc_get_template( 'single-product/price.php' );
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
			?>
		</div>
		<div class="col-12 col-md-6 order-md-0">
		<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
		</div>

		<div class="col-12 product-description">
			<?php 
			wc_get_template( 'single-product/short-description.php' );
			?>
		</div>

		<div class="col-12 product-cta">
		<?php
			woocommerce_template_single_add_to_cart() 
			/**
			* Hook: woocommerce_single_product_summary.
			*
			* @hooked woocommerce_template_single_title - 5
			* @hooked woocommerce_template_single_rating - 10
			* @hooked woocommerce_template_single_price - 10
			* @hooked woocommerce_template_single_excerpt - 20
			* @hooked woocommerce_template_single_add_to_cart - 30
			* @hooked woocommerce_template_single_meta - 40
			* @hooked woocommerce_template_single_sharing - 50
			* @hooked WC_Structured_Data::generate_product_data() - 60
			*/
			// do_action( 'woocommerce_single_product_summary' );
	 	?>
	 	</div>
	 	<div class="col-12 additional-info">
	 		<div class="additional-info__section">
	 			<button class="additional-info__toggle">PRODUCT INFO<span class="toggle-icon">+</span></button>
	 			<div class="additional-info__content d-none">
	 			<?php echo $product_info; ?>
	 			</div>
	 		</div>
	 		<div class="additional-info__section">
	 			<button class="additional-info__toggle">RETURN AND REFUND POLICY<span class="toggle-icon">+</span></button>
	 			<div class="additional-info__content d-none">
	 			<?php foreach ($return_policy as $text) { $text = $text['paragraph']; ?>
	 				<p><?php echo $text; ?></p>
	 			<?php } ?>
	 			</div>
	 		</div>
	 		<div class="additional-info__section">
	 			<button class="additional-info__toggle">SHIPPING INFO<span class="toggle-icon">+</span></button>
	 			<div class="additional-info__content d-none">
	 			<?php foreach ($shipping_info as $text) { $text = $text['paragraph']; ?>
	 				<p><?php echo $text; ?></p>
	 			<?php } ?>
	 			</div>
	 		</div>
	 	</div>
	</div>

	<?php

		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
	?>
</div>



<?php do_action( 'woocommerce_after_single_product' ); ?>
