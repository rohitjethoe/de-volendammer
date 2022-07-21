<?php
/**
 * @package De_Volendammer
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php 
			if (is_shop()) {
				$image = get_template_directory_uri() . "/images/shop-background.png";
				$video = get_template_directory_uri() . "/images/video.mp4";

				echo "
				<div class='background-video'>
					<img src='$image' />
					<video autoplay muted>
						<source src='$video' type='video/mp4'>
					</video>
				</div>
				";
			}
		?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>

	<?php de_volendammer_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if (is_cart()) {
			echo '<div class="entry-content-cart-header">' . 'Uw Bestelling' . '</div>';
		}

		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'de-volendammer' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<div class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						__( 'Edit <span class="screen-reader-text">%s</span>', 'de-volendammer' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div>
	<?php endif; ?>
</div><?php the_ID(); ?>
