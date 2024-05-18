<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ncsystems
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<header class="page-title">
			<div class="container">
				<h1>Страница не найдена</h1>
			</div>
		</header><!-- .page-header -->

		<div class="page404-body">
			<div class="container">
				<h1>404</h1>
				<h2>Такой страницы не существует</h2>
			</div>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
