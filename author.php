<?php get_header(); ?>

	<div class="row">
		<!-- section -->
		<section class="main col_2tiers" role="main">
			<?php if (have_posts()): the_post(); ?>
			
				<h1><?php _e( 'Author Archives for ', 'html5blank' ); echo get_the_author(); ?></h1>
		
			<?php if ( get_the_author_meta('description')) : ?>
			
			<?php echo get_avatar(get_the_author_meta('user_email')); ?>
			
				<h2><?php e_( 'About', 'html5blank' ); echo get_the_author() ; ?></h2>
			
			<?php the_author_meta('description'); ?>
			
			<?php endif; ?>
			
			<?php rewind_posts(); while (have_posts()) : the_post(); ?>
			<div class="liste-articles">
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('loop-thumb'); // Declare pixel size you need inside the array ?>
						</a>
					<?php endif; ?>
					<!-- /post thumbnail -->
					<div class="content clear">
					<!-- post title -->
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<!-- /Post title -->
					
					<!-- post details -->
					<span class="date">Le <?php the_time('d/m/Y'); ?></span>
					<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
					<span class="category"><?php the_category(', ') ?></span>
					<!-- /post details -->
					
					<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
					
					</div>
					<div class="comment"><?php comments_popup_link('0', '1', '%'); ?></div>
					<?php edit_post_link(); ?>
					
				</article>
				<!-- /article -->
			</div>
			<?php endwhile; ?>
			
			<?php else: ?>
			
				<!-- article -->
				<article>
					
					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
					
				</article>
				<!-- /article -->
			
			<?php endif; ?>
				
				<?php get_template_part('pagination'); ?>
		</section>
		<!-- /section -->
	
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>