<?php  

$featured_products = get_field('products');
$featured_title = get_field('featured_title');

?>

<section class="section featured-products">
	<h2 class="section__header"><?php echo $featured_title ? $featured_title : 'Featured'; ?></h2>
	<div class="featured-products__carousel">
		<?php foreach ($featured_products as $product) {
			$product = $product['product'];
		    $product_meta = get_post_meta($product->ID);
		    $image_id = isset($product_meta['_thumbnail_id']) ? $product_meta['_thumbnail_id'] : null;
		    ?>
		    <?php if ($image_id) { ?>
			<a class="slick-link" href="<?php echo get_the_permalink($product->ID); ?>">
			<?php echo wp_get_attachment_image($image_id[0], 'all') ?>
			</a>
			<?php } ?>
		<?php } ?>
	</div>
</section>