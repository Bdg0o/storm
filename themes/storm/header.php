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
		<!-- wrapper -->
		<div class="wrapper">
	
			<!-- header -->
			<header class="header row" role="banner">
				
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>

					<div id="connexion">
					<?php 
					if( is_user_logged_in() ) { ?>
						<a href="<?php echo home_url(); ?>/wp-admin/profile.php">Mon profil</a> / <a href="<?php echo wp_logout_url( $redirect ); ?>">Déconnexion</a>
					<?php 					
					}
					else { ?>
						<a href="#connexion-popup" class="connexion open-popup-link" data-effect="mfp-zoom-out">Connexion</a> / <a href="#inscription-popup" class="inscription open-popup-link" data-effect="mfp-zoom-out">Inscription</a>
						<!-- /logo -->
						<div id="connexion-popup" class="white-popup mfp-hide mfp-with-anim">
						 	<div class="title">  
					            <h1>Connexion</h1>
					        </div>  
						 	<?php wp_login_form(); ?>
						</div>
						<div id="inscription-popup" class="white-popup mfp-hide mfp-with-anim">
							
						    <div id="register-form">  
						        <div class="title">  
						            <h1>S'inscrire</h1>
						        </div>  
					            <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">  
						            <input type="text" name="user_login" value="Login" id="user_login" class="input" />  
						            <input type="text" name="user_email" value="E-Mail" id="user_email" class="input"  />  
						                <?php do_action('register_form'); ?>  
						                <input type="submit" value="S'inscrire" id="register" />  
						            <hr />  
						            <p class="statement">Un mot de passe vous sera envoyé par mail.</p>    
					            </form>  
						    </div> 
						</div>
					<?php } ?>
					</div>
			</header>
			<!-- /header -->
			<!-- nav -->
			<nav class="nav" role="navigation">
				<div class="row">
					<?php get_template_part('searchform'); ?>
					<?php html5blank_nav(); ?>
				</div>
			</nav>
			<!-- /nav -->
			