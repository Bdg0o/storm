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
						<a href="https://twitter.com/Storm_commu" class="twitter" alt="Twitter">twitter</a>
						<a href="https://www.facebook.com/pages/Storm/1420891144789352?fref=ts" class="facebook" alt="Facebook">facebook</a>
						<a href="../feed/" class="rss" alt="rss">rss</a>
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
					&copy; <?php echo date("Y"); ?> Copyright <?php bloginfo('name'); ?>. Tous droits réservés. <br /> Site réalisé par <a href="http://maximegengler.be" title="Maxime Gengler" target="_blank">Maxime Gengler</a> et <a href="http://antoine-royer.me" title="Antoine Royer" target="_blank">Antoine Royer</a>, propulsé par <a href="//wordpress.org" target="_blank" title="WordPress">WordPress</a>.
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