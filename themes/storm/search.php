<?php get_header(); ?>
	
	<div class="row">
		<!-- section -->
		<section class="main col_2tiers" role="main">
	
			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
			<div class="liste-articles">
				<?php get_template_part('loop'); ?>
				
				<?php get_template_part('pagination'); ?>
			</div>
		</section>
		<!-- /section -->
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>