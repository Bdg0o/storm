<?php get_header(); ?>
	<div class="row">
		<!-- section -->
		<section class="col_2tiers" role="main">
		
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail('image-post'); // Fullsize image for the single post ?>
				<?php endif; ?>
				<!-- /post thumbnail -->
				
				<!-- post title -->
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>
				<!-- /post title -->
				
				<!-- post details -->
				<div class="bg-date-author">
					<span class="date">Le <?php the_time('d/m/Y'); ?>, </span>
					<span class="author">par <?php the_author_posts_link(); ?></span>
					<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
				</div>
				<!-- /post details -->
				
				<!-- une ligne -->
				<div class="ligne"></div>
				<!-- /une ligne -->
				
				<?php the_content(); // Dynamic Content ?>
				
				<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
				
				<!-- <p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p> -->
				
				<!-- <p><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p> -->
				
				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
				
				<!-- une ligne -->
				<div class="ligne"></div>
				<!-- /une ligne -->
				
				<?php comments_template(); ?>
				
			</article>
			<!-- /article -->
			
		<?php endwhile; ?>
		
		<?php else: ?>
		
			<!-- article -->
			<article>
				
				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
				
			</article>
			<!-- /article -->
		
		<?php endif; ?>
		
		</section>
		<!-- /section -->
	
	<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>