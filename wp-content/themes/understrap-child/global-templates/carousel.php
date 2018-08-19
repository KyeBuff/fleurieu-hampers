<?php 
	$slides = get_field('slides');
?>
<div id="carousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php foreach ($slides as $i => $slide) { ?>
		<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"></li>
		<?php } ?>
	</ol>
	<div class="carousel-inner">
		<?php foreach ($slides as $i => $slide) { $slide = $slide['slide']; ?>
			<?php 
				$type = $slide['type'];
				$class = 'header';

				if ($type === 'Header and text overlay') {
					$class = 'header-overlay';
				} else if ($type === 'Header overlay with sale tag') {
					$class = 'header-sale';
				}

			?>
			<div class="carousel-item <?php echo $class; ?> <?php echo $i === 0 ? 'active' : '' ?>" style="background-image: url(<?php echo $slide['image']; ?>)">
				<div class="carousel-item__overlay">
					<h3 class="carousel-item__header"><?php echo $slide['header']; ?></h3>
					<?php if ($class === 'header-overlay') { ?>
						<p class="carousel-item__text"><?php echo $slide['sub_text']; ?></p>
					<?php } ?>
				</div>
				<?php if ($class === 'header-sale') { ?>
					<a class="carousel-item__tag d-none d-sm-inline" href="<?php echo get_site_url() . '/shop'; ?>">Sale</a>
				<?php } ?>
			</div>
		<?php } ?>

	</div>
	<a class="carousel-nav carousel-control-prev" href="#carousel" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-nav carousel-control-next" href="#carousel" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>