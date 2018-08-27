<?php  

$featured_products = get_field('products');

?>

<section class="section featured-products">
	<h2 class="section__header">Featured</h2>
	<div class="featured-products__carousel">
		<?php foreach ($featured_products as $product) {
			$product = $product['product'];
		    $product_meta = get_post_meta($product->ID);?>
			<a class="slick-link" href="<?php echo get_the_permalink($product->ID); ?>">
			<?php echo wp_get_attachment_image($product_meta['_thumbnail_id'][0], 'all'); ?>
			</a>
		<?php } ?>
	</div>
</section>