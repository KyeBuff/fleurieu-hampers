<?php 
/**
 * The shopping cart preview.
 *
 * @package understrap
 */
?>

<div class="cart-preview d-none" id="cart-preview">
	<div class="cart-preview__content">
		<div class="cart-preview__heading">
			<button id="close-cart" class="cart-preview__close" id="close-cart-preview"><i class="fa fa-chevron-right"></i></button>
			<p class="cart-preview__header text-center">Cart</p>
		</div>
		<?php woocommerce_mini_cart(); ?>
		<a class="btn cart-preview__btn" href="<?php echo get_site_url(); ?>/cart">View Cart</a>
	</div>
</div>
