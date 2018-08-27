<?php  

$query = new WC_Product_Query( array(
    'limit' => 4,
    'orderby' => 'date',
    'order' => 'DESC',
    'return' => 'ids',
) );
$products = $query->get_products();

?>

<section class="section featured-products">
	<h2 class="section__header">Most Popular</h2>
	<div class="featured-products__carousel">
		<?php foreach ($products as $product) {
		    $product_meta = get_post_meta($product);?>
			<a class="slick-link" href="<?php echo get_the_permalink($product->ID); ?>">
			<?php echo wp_get_attachment_image($product_meta['_thumbnail_id'][0], 'all'); ?>
			</a>
		<?php } ?>
	</div>
	<p class="featured-products__text"><?php echo get_field('popular_text'); ?></p>
</section>