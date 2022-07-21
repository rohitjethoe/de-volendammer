<?php
/**
 * @package De_Volendammer
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="error-404 not-found">
			<div class="page-content">
				<div class="error">
					<div class="error-header">
						Oeps...
					</div>
					<div class="error-content">
						404 - Pagina niet gevonden.
					</div>
					<div class="error-rectangle"></div>
					<div class="error-return">
						Wil je terug naar de home pagina? <br> <br>
						<a href="<?php echo get_site_url(); ?>">Terug naar home</a>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php
get_footer();
