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

<div class="membre-infos">
	<div class="image-membre">
	</div>
	<div class="infos">
		<div class="name">
			<span class="membre-name">Biffi</span>
			<span class="membre-rank"> (admin)</span>
			<div class="ligne-membre"></div>
		</div>
		<div class="game">
			Joue à : <span class="color-membre">Smite</span>
		</div>
		<div class="age">
			Age : <span class="color-membre">23 ans</span>
		</div>
		<div class="nationalite">
			Nationalité : <span class="color-membre">Belge</span>
		</div>
	</div>
</div>

<div class="membre-infos">
	<div class="image-membre">
	</div>
	<div class="infos">
		<div class="name">
			<span class="membre-name">Bdg</span>
			<span class="membre-rank"> (admin)</span>
			<div class="ligne-membre"></div>
		</div>
		<div class="game">
			Joue à : <span class="color-membre">League of Legends</span>
		</div>
		<div class="age">
			Age : <span class="color-membre">22 ans</span>
		</div>
		<div class="nationalite">
			Nationalité : <span class="color-membre">Français</span>
		</div>
	</div>
</div>

<div class="membre-infos">
	<div class="image-membre">
	</div>
	<div class="infos">
		<div class="name">
			<span class="membre-name">Thuzak</span>
			<span class="membre-rank"> </span>
			<div class="ligne-membre"></div>
		</div>
		<div class="game">
			Joue à : <span class="color-membre">Dragon's prophet</span>
		</div>
		<div class="age">
			Age : <span class="color-membre">24 ans</span>
		</div>
		<div class="nationalite">
			Nationalité : <span class="color-membre">Français</span>
		</div>
	</div>
</div>

<div class="membre-infos">
	<div class="image-membre">
	</div>
	<div class="infos">
		<div class="name">
			<span class="membre-name">Jay</span>
			<span class="membre-rank"></span>
			<div class="ligne-membre"></div>
		</div>
		<div class="game">
			Joue à : <span class="color-membre">World of tank</span>
		</div>
		<div class="age">
			Age : <span class="color-membre">20 ans</span>
		</div>
		<div class="nationalite">
			Nationalité : <span class="color-membre">Français</span>
		</div>
	</div>
</div>

<div class="membre-infos">
	<div class="image-membre">
	</div>
	<div class="infos">
		<div class="name">
			<span class="membre-name">MaisOuais</span>
			<span class="membre-rank"></span>
			<div class="ligne-membre"></div>
		</div>
		<div class="game">
			Joue à : <span class="color-membre">Guild Wars 2</span>
		</div>
		<div class="age">
			Age : <span class="color-membre">23 ans</span>
		</div>
		<div class="nationalite">
			Nationalité : <span class="color-membre">Français</span>
		</div>
	</div>
</div>

<div class="membre-infos">
	<div class="image-membre">
	</div>
	<div class="infos">
		<div class="name">
			<span class="membre-name">Wiid</span>
			<span class="membre-rank"></span>
			<div class="ligne-membre"></div>
		</div>
		<div class="game">
			Joue à : <span class="color-membre">Pay Day 2</span>
		</div>
		<div class="age">
			Age : <span class="color-membre">25 ans</span>
		</div>
		<div class="nationalite">
			Nationalité : <span class="color-membre">Français</span>
		</div>
	</div>
</div>

<div id="construct" style="color: red">/!\ En construction /!\</div>

<br class="clear">

<?php edit_post_link(); ?>

</article>
<!-- /article -->

<?php endwhile; ?>

</section>
<!-- /section -->

<?php get_footer(); ?>