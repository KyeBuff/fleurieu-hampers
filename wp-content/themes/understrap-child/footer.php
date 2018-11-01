<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
$help_pages = get_field('help_pages', 'options');
$about_pages = get_field('about_us_pages', 'options');

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );

$title = get_the_title();

?>

<!-- WooCommerce Archive loop bug fix -->
</a>

<div class="paypal">
	<p>We accept <span class="d-none">PayPal</span></p>
	<img class="icon" src="<?php echo get_stylesheet_directory_uri() . '/img/pp.png'; ?>" alt="PayPal logo">
</div>

<div class="wrapper footer-wrapper <?php echo $title === 'My account' ? 'static-footer' : null; ?>" id="wrapper-footer" style="">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">
				<footer class="site-footer" id="colophon">

					<div class="site-info footer-content">

						<div class="links">
							<div class="links__list">
								<p class="links__header">HELP AND INFORMATION</p>
							<?php foreach ($help_pages as $page) { $page = $page['page']; ?>
								<a class="links__link" href="<?php the_permalink($page); ?>"><?php echo get_the_title($page); ?></a>
							<?php } ?>
							</div>
							<div class="links__list">
								<p class="links__header">ABOUT FLEURIEU HAMPERS</p>
							<?php foreach ($about_pages as $page) { $page = $page['page']; ?>
								<a class="links__link" href="<?php the_permalink($page); ?>"><?php echo get_the_title($page); ?></a>
							<?php } ?>
							</div>
						</div>
						<div class="social">
							<a class="social__link" href="<?php echo get_field('facebook', 'options'); ?>" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-social-icon fa-stack-1x"></i></span></a>
							<a class="social__link" href="<?php echo get_field('instagram', 'options'); ?>" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-instagram fa-social-icon fa-stack-1x"></i></span></a>
						</div>

						<p class="legal-text">&copy; <?php echo bloginfo('name') . ' ' . date("Y"); ?></p>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

	<?php get_template_part( 'global-templates/cart', 'overlay' ); ?>

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
</body>

</html>