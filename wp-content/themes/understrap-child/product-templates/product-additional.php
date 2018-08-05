<?php 

$shipping_info = get_field('shipping_info', 'options');
$return_policy = get_field('return_policy', 'options');

$product_info = get_field('product_information');

?>

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