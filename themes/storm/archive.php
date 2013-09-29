<?php get_header(); ?>

	<div class="row">
		<!-- section -->
		<section class="main col_2tiers" role="main">
		
			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>
			<div class="liste-articles">
				<?php get_template_part('loop'); ?>
			</div>

			<?php get_template_part('pagination'); ?>
		
		</section>
		<!-- /section -->
	
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>