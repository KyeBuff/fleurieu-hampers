<?php 
	$slides = get_field('slides');
?>
		
<section class="section__carousel">
	<div class="main__carousel">
		<?php foreach ($slides as $i => $slide) { $slide = $slide['slide']; ?>
			<?php 
				$type = $slide['type'];
				$class = 'header';

				if ($type === 'Header and text overlay') {
					$class = 'header-overlay';
				} 

			?>
			<div class="carousel-slick-item" style="background-image: url(<?php echo $slide['image']; ?>)">
				<div class="carousel-slick-item__overlay">
					<h3 class="carousel-slick-item__header"><span class="carousel-slick-item__header--styled"><?php echo $slide['header']['styled_text']; ?></span><?php echo $slide['header']['text']; ?></h3>
					<?php if ($class === 'header-overlay') { ?>
						<p class="carousel-slick-item__text"><?php echo $slide['sub_text']; ?></p>
					<?php } ?>
				</div>
				<?php if ($slide['sale_tag']) { ?>
					<a class="carousel-slick-item__tag d-none d-sm-inline" href="<?php echo get_site_url() . '/shop'; ?>">Sale</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</section>