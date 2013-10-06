<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
			
		<!-- css + javascript -->
		<?php wp_head(); ?>
		<script>
		!function(){
			// configure legacy, retina, touch requirements @ conditionizr.com
			conditionizr()
		}()
		</script>
	</head>
	<body <?php body_class(); ?>>	
	<div class="wrapper">
		<header class="header row" role="banner">
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
				</a>
			</div>
		</header>

		<!-- section -->
		<section role="main" class="row">
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h1>Vous avez été emporté par un ouragan...<br />Vous ne devriez pas vous trouver ici...</h1>
				<h2>
					<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
				</h2>
				
			</article>
			<!-- /article -->
			
		</section>
		<!-- /section -->
	</div>	

<?php get_footer(); ?>