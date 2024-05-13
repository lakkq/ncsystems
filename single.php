<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ncsystems
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="page-title">
		<div class="container">
			<h1><?php the_title() ?></h1>
		</div>
	</div>
	<section class="page-body">
		<div class="container">
			<?php the_content() ?>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();
