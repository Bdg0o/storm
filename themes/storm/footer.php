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
					</div>

				<div class="clear"></div>

				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date("Y"); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'html5blank'); ?> 
					<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
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