<?php

/**
 * bbPress - Forum Archive
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<?php get_header(); ?>

	<div class="row">
		<!-- section -->
		<h1 class="entry-title"><?php bbp_forum_archive_title(); ?></h1>
		<aside class="sidebar col_tier" role="complementary">
			<?php if ( bbp_has_forums() ) : ?>
				<?php while ( bbp_forums() ) : bbp_the_forum(); ?>

					<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
						<li class="bbp-forum-info">
							<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>" title="<?php bbp_forum_title(); ?>"><?php bbp_forum_title(); ?></a>
							<?php bbp_list_forums(); ?>
							<span class="count-topic"><?php bbp_forum_topic_count(); ?></span>
						</li>
					</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

				<?php endwhile; ?>
			<?php endif; ?>
		</aside>
		<section class="main col_2tiers" role="main">

			<div id="forum-front" class="bbp-forum-front">
				<div class="entry-content">
					<div id="bbpress-forums">
							<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">
								<li class="bbp-header">
									<ul class="forum-titles">
										<li class="bbp-topic-title"><?php _e( 'Topic', 'bbpress' ); ?></li>
										<li class="bbp-topic-voice-count"><?php _e( 'Voices', 'bbpress' ); ?></li>
										<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? _e( 'Replies', 'bbpress' ) : _e( 'Posts', 'bbpress' ); ?></li>
										<li class="bbp-topic-freshness"><?php _e( 'Freshness', 'bbpress' ); ?></li>
									</ul>
								</li>
								<li class="bbp-body">
									<?php if ( bbp_has_topics() ) : ?>
									<?php while ( bbp_topics() ) : bbp_the_topic(); ?>
										<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
											<!-- Affiche l'icone de vue -->
											<?php do_action( 'bbp_theme_before_topic_title' ); ?>
											<?php do_action( 'bbp_theme_after_topic_meta' ); ?>
											<!-- FIN affiche l'icone de vue -->
											<li class="bbp-topic-title">
												<?php if ( bbp_is_user_home() ) : ?>
													<?php if ( bbp_is_favorites() ) : ?>
														<span class="bbp-topic-action">
															<?php bbp_user_favorites_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>
														</span>
													<?php elseif ( bbp_is_subscriptions() ) : ?>
														<span class="bbp-topic-action">
															<?php bbp_user_subscribe_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>
														</span>
													<?php endif; ?>
												<?php endif; ?>
												<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>" title="<?php bbp_topic_title(); ?>"><?php bbp_topic_title(); ?></a>
											</li>
											<li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(); ?></li>
											<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></li>
											<li class="bbp-topic-freshness">
												<?php bbp_topic_freshness_link(); ?>
												<p class="bbp-topic-meta">
													<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 14 ) ); ?></span>
												</p>
											</li>

										</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
									<?php endwhile; ?>
									<?php endif; ?>
								</li>

								<li class="bbp-footer">
									<div class="tr">
										<p>
											<span class="td colspan<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</span>
										</p>
									</div><!-- .tr -->
								</li>
							</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
					</div>
				</div>
			</div><!-- #forum-front -->

		</section>
		<!-- /section -->
	</div>

<?php get_footer(); ?>