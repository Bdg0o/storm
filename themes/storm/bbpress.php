<?php get_header(); ?>

	<?php 
	if ( has_post_thumbnail() ) {
		echo '<div class="image-post-contener">';
	  	the_post_thumbnail('image-post');
	  	echo '</div>';
	} 
	?>

	<div class="row">
		<!-- section -->
		<section class="main" role="main">
			
			<h1><?php the_title(); ?></h1>
		
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php the_content(); ?>
				
				<br class="clear">
				
				<?php edit_post_link(); ?>
				
			</article>
			<!-- /article -->
			
		<?php endwhile; ?>
		
		<?php else: ?>
		
			<!-- article -->
			<article>
				
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->
		
		<?php endif; ?>
		
		</section>
		<!-- /section -->
	</div>

<?php get_footer(); ?>