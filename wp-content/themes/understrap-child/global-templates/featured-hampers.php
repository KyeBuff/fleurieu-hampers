<?php  

$featured_products = get_field('products');

?>

<section class="section featured-products">
	<h2 class="section__header">Most Popular</h2>
	<div class="featured-products__carousel">
		<?php foreach ($featured_products as $product) {
			$product = $product['product'];
		    $product_meta = get_post_meta($product->ID);?>
			<?php echo wp_get_attachment_image($product_meta['_thumbnail_id'][0], 'all'); ?>
		<?php } ?>
	</div>
	<p class="featured-products__text"><?php echo get_field('featured_text'); ?></p>
</section>