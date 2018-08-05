<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

$contact_email = get_field('contact_email', 'options');
$contact_number = get_field('contact_tel', 'options');

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<h2 class="text-center gold">Get in Touch</h2>

		<div class="contact-info">
			<p class="text-center"><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email ? $contact_email : ''; ?></a>  <span class="gold separator">/</span>  <a href="tel:<?php echo $contact_number; ?>">Tel. <?php echo $contact_number ? $contact_number : ''; ?></a></p>
		</div>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
