<?php get_header(); ?>
	
	<!-- Affiche le slider -->
	<ul class="rs-slider">
		<?php
		$argslider = array('post_type' => array('slider'));
		query_posts($argslider);
		while ( have_posts() ) : the_post();
		    echo '<li>';
		    the_post_thumbnail( $size, $attr );
		    ?>
		    <div class="row">
			    <div class="contenu">
				    <?php
				    echo '<h2>'. the_title() .'</h2>';
				    the_content();
				    ?>
			    </div>
		    </div>
		    <?php
		    echo '</li>';
		endwhile;
		wp_reset_query();
		?>
	</ul>
	
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