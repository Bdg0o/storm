<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('loop-thumb'); // Declare pixel size you need inside the array ?>
			</a>
		<?php else : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img class="wp-post-image" src="<?php echo get_template_directory_uri(); ?>/img/no-img-petit.png" alt="">
			</a>
		<?php endif; ?>
		<!-- /post thumbnail -->
		<div class="content clear">
			<!-- post title -->
			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php 
						$jeu = get_post_meta($post->ID, "nom_jeu", true);

						if(!empty($jeu))
						{
							echo '<span class="jeu">'. $jeu .'</span>, ';
						}

						?>
					<?php the_title(); ?>
				</a>
			</h2>
			<!-- /post title -->
			
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
	
<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>