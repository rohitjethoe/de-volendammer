<?php
/**
 * @package De_Volendammer
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				de_volendammer_posted_on();
				de_volendammer_posted_by();
				?>
			</div>
		<?php endif; ?>
	</div>

	<?php de_volendammer_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'de-volendammer' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'de-volendammer' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<div class="entry-footer">
		<?php de_volendammer_entry_footer(); ?>
	</div>
</div><?php the_ID(); ?>
