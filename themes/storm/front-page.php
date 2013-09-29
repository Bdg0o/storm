<?php get_header(); ?>
	
	<!-- Affiche le slider -->
	<div id="slider-wrapper">
		<div id="slider">
			<ul class="slides">
				<?php
				$argslider = array('post_type' => array('slider'));
				query_posts($argslider);
				while ( have_posts() ) : the_post();
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-thumb' );
				    echo '<li data-thumb="'. $thumb[0] .'">';
				    the_post_thumbnail('slider-image');
				    ?>
				    <div class="row">
					    <div class="contenu">
						    <?php
						    echo '<h2>';
						    	the_title();
    						echo '</h2>';

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
		</div>
	</div>
	
	<div class="row">
		<!-- section -->
		<section class="main col_2tiers" role="main">
		
			<h1><?php _e( 'News', 'html5blank' ); ?></h1>
			<div class="liste-articles">
				<?php get_template_part('loop'); ?>
			</div>
			<?php get_template_part('pagination'); ?>
		
		</section>
		<!-- /section -->
	
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>