<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ncsystems
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/style.css" ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="header">
			<div class="header__top">
				<div class="container">
					<div class="header__row1">
						<div class="header__home">
							<a href="<?php bloginfo('url') ?>">
								<img src="<?php echo get_template_directory_uri() . "/img/Icon-House.svg" ?>" alt="">
								<p>На главную</p>
							</a>
						</div>
						<div class="header__menu">
							<?php wp_nav_menu(
								array(
									'theme_location' => 'topMenu'
								)
							); ?>
						</div>
						<div class="header__burger" id="call-menu-button">
							<img src="<?php echo get_template_directory_uri() . "/img/burger.svg" ?>" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="header__bottom">
				<div class="container">
					<div class="header__row2">
						<div class="header__logo">
							<?php the_custom_logo(0); ?>
						</div>
						<div class="header__title">
							<p>Научно-исследовательская лаборатория <span>систем ЧПУ</span></p>
						</div>
					</div>
				</div>
			</div>
			<nav class="main-menu" id="main-menu">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'mainMenu',
						'container' => 'div',
						'container_class' => 'main-menu__container',
						'menu_class' => 'main-menu__row',
					)
				); ?>
				<div class="main-menu__bottom">
					<div class="header__menu">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'topMenu'
							)
						); ?>
					</div>
					<div class="main-menu__button" id="main-menu-button">
						<img src="<?php echo get_template_directory_uri() . "/img/arrow-1.svg" ?>" alt="">
					</div>
				</div>
			</nav>
			<div class="main-menu__curtain"></div>
		</header><!-- #masthead -->