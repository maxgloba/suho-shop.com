<?php
/*
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>

<section class="page404">
	<div class="container">
		<div class="bg-num">
			<h1>Упс! <br> Что то пошло не так, такой страницы не существует</h1>
			<span>404</span>
		</div>
		<a href="<?php echo home_url(); ?>/" class="btn">вернуться на Главную</a>
	</div>
</section>

<?php get_footer(); ?>