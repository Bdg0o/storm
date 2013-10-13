<?php
/*
Template Name: Page membre
*/
?>

<?php get_header(); ?>

<!-- section -->
<section class="row" role="main">

<h1><?php the_title(); ?></h1>

<?php while (have_posts()) : the_post(); ?>

<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- Ton html pour les membres -->
<!-- 
[ID] => 1
[user_login] => admin
[user_pass] => $P$Bxudi6gJMk2GRt2ed3xvZ06c1BPZXi/
[user_nicename] => admin
[user_email] => admin@host.com
[user_url] => http://localhost/
[user_registered] => 2010-06-29 07:08:55
[user_activation_key] => 
[user_status] => 0
[display_name] => Richard Branson -->

<ul>
<?php
// The Query
$user_query = new WP_User_Query( array( 'role' => 'Administrator' ) );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		loopMembre($user, 'Administrateur');
	}
}

// The Query
$user_query = new WP_User_Query( array( 'role' => 'Editor' ) );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		loopMembre($user, 'Editeur');
	}
}

// The Query
$user_query = new WP_User_Query( array( 'role' => 'Author' ) );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		loopMembre($user, 'Auteur');
	}
}

// The Query
$user_query = new WP_User_Query( array( 'role' => 'membre' ) );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) {
		loopMembre($user, 'Membre');
	}
}

 //    $blogusers = get_users('orderby=nicename&role=Administrator');
	// get_template_part('loop-membre');

	// $blogusers = get_users('orderby=nicename&role=Editor');
	// get_template_part('loop-membre');

	// $blogusers = get_users('orderby=nicename&role=Author');
	// get_template_part('loop-membre');

	// $blogusers = get_users('orderby=nicename&role=membre');
	// get_template_part('loop-membre');
?>
</ul>

<?php edit_post_link(); ?>

</article>
<!-- /article -->

<?php endwhile; ?>

</section>
<!-- /section -->

<?php get_footer(); ?>