		</div>
		<!-- /wrapper -->

			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="row">
					<div class="col_tier">
						<h5>Archives :</h5>
						<ul class="listeArchives">
							<?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'custom', 'before' => '<li>', 'after' => '</li>' ) ); ?>
						</ul>
					</div>
					<div class="col_tier">
						<h5>Suivez-nous :</h5>
						<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Twitter"></a>
						<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Facebook"></a>
						<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/rss.png" alt="Flux RSS"></a>
					</div>
					<div class="col_tier">
						<h5>Twittes :</h5>
						<div id="last-tweet">
							<?php
								// ini_set('display_errors', 1);
								// require_once('TwitterAPIExchange.php');

								// /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
								// $settings = array(
								//     'oauth_access_token' => "",
								//     'oauth_access_token_secret' => "",
								//     'consumer_key' => "",
								//     'consumer_secret' => ""
								// );

								// /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
								// $url = 'https://api.twitter.com/1.1/blocks/create.json';
								// $requestMethod = 'POST';

								// /** POST fields required by the URL above. See relevant docs as above **/
								// $postfields = array(
								//     'screen_name' => 'usernameToBlock', 
								//     'skip_status' => '1'
								// );

								// /** Perform a POST request and echo the response **/
								// $twitter = new TwitterAPIExchange($settings);
								// echo $twitter->buildOauth($url, $requestMethod)
								//              ->setPostfields($postfields)
								//              ->performRequest();
							?>
						</div>
					</div>

				<div class="clear"></div>

				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date("Y"); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'html5blank'); ?> 
					<a href="//wordpress.org" title="WordPress">WordPress</a>.
				</p>
				<!-- /copyright -->

				</div>

				
			</footer>
			<!-- /footer -->

		<?php wp_footer(); ?>
		
		<!-- analytics -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXXXXX-XX'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)})(document,'script');
		</script>
	
	</body>
</html>