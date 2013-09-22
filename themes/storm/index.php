<?php get_header(); ?>
	
	<!-- Affiche le slider -->
	<?php nivo_slider(41); ?> 
	
	<div class="row">
		<!-- section -->
		<section class="main col_2tiers" role="main">
		
			<h1><?php _e( 'News', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>
			
			<?php get_template_part('pagination'); ?>
		
		</section>
		<!-- /section -->
	
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>