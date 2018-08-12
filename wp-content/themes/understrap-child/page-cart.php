<?php
/**
 * The template is for displaying the contact page

 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

$cart_total = WC()->cart->get_cart_contents_count();

$sub_total = WC()->cart->get_cart_subtotal();

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<div class="wrapper cart-wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main col-12 cart-page" id="main">

				<div class="row cart__top">
					<?php if(!$cart_total) { ?>
					<div class="col-12 pb-2">
						<h2 class="cart__header text-center">Your shopping cart is empty...</h2>
					</div>
					<?php } ?>
					<div class="col-12 <?php echo $cart_total ? 'col-md-6 d-none d-md-block' : 'text-center'; ?> pb-3">
						<a class="gold cart__back" href="<?php echo get_site_url(); ?>/shop"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
					</div>
					<?php if($cart_total) { ?>
					<div class="col-12 col-md-6">
						<a href="<?php echo get_site_url(); ?>/checkout/" class="btn btn-primary float-md-right cart__btn"><i class="fa fa-lock mr-2 mt-1"></i>Checkout</a>
					</div>
					<div class="col-12 col-md-6 d-md-none">
						<h2 class="cart__header">My Cart <?php echo $cart_total ? "($cart_total)" : '' ?></h2>
					</div>
					<?php } ?>
				</div>
				<?php if($cart_total) { ?>
				<form class="woocommerce-cart-form row" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

					<?php do_action( 'woocommerce_before_cart_table' ); ?>
					<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
						<div class="d-none d-md-block">
							<div class="row">
								<div class="col-6">
									<h2 class="cart__header">My Cart <?php echo $cart_total ? "($cart_total)" : '' ?></h2>
								</div>
								<div class="product-price col-2"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
								<div class="product-quantity col-2"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></div>
								<div class="product-subtotal col-2"><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
							</div>
						</div>
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<div class="row woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

									<div class="col-3 col-md-1 product-thumbnail">
										<?php
										$sku = esc_attr( $_product->get_sku());
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo wp_kses_post( $thumbnail );
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
										}
										?>
									</div>

									<div class="col-md-5 product-name d-none d-md-block">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
										?>
										<?php if ($sku) { ?>
										<div class="product-item-sku text-left">
											<span class="d-block">SKU: <?php echo esc_attr( $_product->get_sku()); ?></span>
										</div>
										<?php } ?>
										<div class="product-remove d-none d-md-block">
										<?php
											// @codingStandardsIgnoreLine
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="cart__remove--md" aria-label="%s" data-product_id="%s" data-product_sku="%s">Remove</a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );

										?>
										</div>
									</div>
									<div class="product-name col-9 col-md-6 d-md-none" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="d-md-none" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>' ) );
										}
										?>
										<span class="d-md-none">
										<?php
											// @codingStandardsIgnoreLine
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );

										?>
										</span>
										<?php 
										?>
										<?php if ($sku) { ?>
										<div class="product-item-sku text-left d-md-none">
											SKU: <span class="d-block"><?php echo esc_attr( $_product->get_sku()); ?></span>
										</div>
										<?php } ?>
										<div class="product-item-total-price text-left d-md-none">
										Price: 
										<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>

										</div>
									</div>

									<div class="product-quantity col-6 d-md-none" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
									<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
									?>
									</div>

									<div class="product-price col-6 d-md-none" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
										<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
									</div>
									<div class="d-none d-md-block col-md-2">
										<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
									</div>
									<div class="d-none d-md-block col-md-2">
									<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
									?>
									</div>
									<div class="d-none d-md-block col-md-2">
									<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</div>
							</div>
								<?php
							}
						}
						?>
						
						</div>
						<div class="actions col-12 col-md-6">
							<div class="update-cart d-md-none">
								<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update', 'woocommerce' ); ?></button>
							</div>
							<?php if ( wc_coupons_enabled() ) { ?>
							<div class="coupon-container">
								<button id="show-coupon" class="d-block gold btn-action"><i class="fa fa-tags mr-2"></i>Enter a promo code</button>
								<div id="coupon-group" class="coupon hide-form-meta-field">
									<label class="d-none" for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text coupon_code" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Enter a coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button gold btn-apply" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply', 'woocommerce' ); ?></button>
									<?php do_action( 'woocommerce_cart_coupon' ); ?>
								</div>
							</div>
							<?php } ?>
							<div class="note-container">
								<button id="add-note" class="d-block gold btn-action"><i class="fa fa-envelope mr-2"></i>Add a note</button>
								<div id="note" class="hide-form-meta-field">
									<textarea id="special-note" class="special-note" name="special-note" placeholder="Instructions? Special requests? Add them here."></textarea>
								</div>
							</div>

							<?php do_action( 'woocommerce_cart_actions' ); ?>

							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
						</div>

						<?php do_action( 'woocommerce_after_cart_contents' ); ?>
					<?php do_action( 'woocommerce_after_cart_table' ); ?>
					<div class="cart__bottom col-md-6">
						<div class="cart-collaterals">
							<p class="cart-collaterals__subtotal">Subtotal <span class="float-right"><?php echo $sub_total; ?></span></p>
						</div>
						<a href="<?php echo get_site_url(); ?>/checkout/" class="btn btn-primary float-md-right cart__btn"><i class="fa fa-lock mr-2 mt-1"></i>Checkout</a>
						<a class="gold cart__back d-md-none" href="<?php echo get_site_url(); ?>/shop"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
					</div>

				</form>
				<?php } ?>

				<?php do_action( 'woocommerce_after_cart' ); ?>
			</main>
		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->


<?php get_footer(); ?>
