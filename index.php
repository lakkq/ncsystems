<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ncsystems
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="banners">
		<?php
		echo do_shortcode('[smartslider3 slider="1"]');
		?>
	</div>
	<div class="container">
		<section class="section-one">
			<div class="section-one__news">
				<div class="section-one__news-title section-one__title">
					<h1>Новости</h1>
				</div>
				<div class="news-articles__row">
					<?php if (have_posts()): ?>
						<?php for ($i = 0; $i < 4; $i++):
							the_post(); ?>
							<?php if (in_category('Новости')) { ?>
								<article class="article">
									<div class="article__row">
										<div class="article__data">
											<p>
												<?php the_time('F jS, Y') ?>
											</p>
										</div>
										<div class="article__title">
											<p>
												<?php the_title(); ?>
											</p>
										</div>
										<div class="article__button">
											<a href="<?php the_permalink() ?>">
												<p>Подробнее</p>
											</a>
										</div>
									</div>
									<div id="NewsTrigger"></div>
								</article>
							<?php } ?>
						<?php endfor; ?>
					<?php else: ?>
						<p>Нет постов в цикле.</p>
					<?php endif; ?>
				</div>
			</div>
			<div class="section-one__SMI">
				<div class="section-one__SMI-title section-one__title">
					<h1>СМИ о нас</h1>
				</div>
				<div class="SMI-articles">
					<?php
					global $post;
					$myposts = get_posts([
						'posts_per_page' => 5,
						'category_name' => 'СМИ о нас',
					]);
					foreach ($myposts as $post) {
						setup_postdata($post);
						?>
						<div class="SMI-article" id="SMI-article">
							<a href="<?php the_title(); ?>">
								<p>
									<?php the_excerpt(); ?>
								</p>
							</a>
						</div>
						<div id="SMITrigger"></div>
						<?php
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
	</div>
	<section class="menues">
		<div class="container">
			<div class="menues__row">
				<div class="teaching active-menues">
					<div class="teaching__title menues__title">
						<h1>Библиография</h1>
					</div>
					<div class="teaching__menu">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'teachingMenu',
								'container' => 'false',
							)
						); ?>
					</div>
				</div>
				<button class="menues__button" id="menues__button">
					<div class="menues__arrow"></div>
					<div class="menues__btn-title">Обучение</div>
				</button>
				<div class="bibliography">
					<div class="bibliography__title menues__title">
						<h1>Обучение</h1>
					</div>
					<div class="bibliography__menu">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'bibliographyMenu'
							)
						); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<section class="section-two">
			<div class="section-two__background">
				<img src="<?php echo get_template_directory_uri() . "/img/main-background.png" ?>" alt="">
			</div>
			<div class="section-two__title">
				<h1>
					Добро пожаловать на сайт
					<br>
					Научно-исследовательской лаборатории систем ЧПУ
				</h1>
			</div>
			<div class="section-two__row1">
				<div class="section-two__row2">
					<div class="section-two__text">
						<p>
							Научно-исследовательская лаборатория систем ЧПУ занимается разработкой и внедрением
							иновационных технологий в области автоматизации технический процессов. Мы стремимся к
							созданию высокоэффективных систем, которые позволяют повышать эффективность производства.
							Наша деятельность связана с разработкой, тестированием и внедрению систем ЧПУ.
						</p>
					</div>
					<div class="section-two__questions">
						<div class="questions__title section-two__block-title">
							<h2><span>Вопросы</span>, которые освещаются в разделе</h2>
						</div>
						<ul class="questions__list">
							<li class="questions__question">
								<p>Поступление абитуриентов на кафедру</p>
							</li>
							<div id="questionsTrigger"></div>
							<li class="questions__question">
								<p>Обучение на кафедре</p>
							</li>
							<li class="questions__question">
								<p>Курсовое и дипломное проектирование</p>
							</li>
							<li class="questions__question">
								<p>Информация о трудоустройстве выпускников кафедры</p>
							</li>
							<li class="questions__question">
								<p>Поддержка связи с нашими выпускниками</p>
							</li>
						</ul>
					</div>
					<div class="section-two__story">
						<div class="story__title section-two__block-title">
							<h2><span>История</span> нашего роста</h2>
						</div>
						<div class="story__blocks">
							<div class="story__block">
								<p>
									В 1986 году была организована кафедра компьютерных систем управления под
									первоначальным
									наименованием «Числовое программное управление станками и комплексами».
								</p>
							</div>
							<div id="storyTrigger"></div>
							<div class="story__arrow">
								<img src="<?php echo get_template_directory_uri() . "/img/arrow-2.svg" ?>" alt="">
							</div>
							<div class="story__block">
								<p>
									Затем название было изменено в связи с расширением спектра задач и существенными
									коррективами в учебном плане.
								</p>
							</div>
							<div class="story__arrow">
								<img src="<?php echo get_template_directory_uri() . "/img/arrow-2.svg" ?>" alt="">
							</div>
							<div class="story__block">
								<p>
									В настоящее время кафедра выпускает инженеров по специальности 210200 «Автоматизация
									технологических процессов и производств», бакалавров по направлению 550200
									«Автоматизация и управление», магистров по магистерской программе 550207
									«Распределенные компьютерные информационно-управляющие системы».
								</p>								
							</div>
						</div>
					</div>
				</div>
				<div class="section-two__targets">
					<div class="targets__target">
						<div class="targets__number">
							<p>01</p>
						</div>
						<div class="targets__text">
							<p>
								Первая цель, которая стоит перед кафедрой при обучении студентов, заключается в
								преподавании
								основ классической информатики, цифровой микроэлектроники, технологии создания
								программных
								систем, интеграции компьютеров в сети, организации коммерческих баз данных, разработки
								web-сайтов, основ разработки и моделирования бизнес-процессов. Важной составляющей для
								студентов служит здесь изучение Internet-технологий и инструментов доступа к информации
								и
								средствам накопления знаний.
							</p>
						</div>
					</div>
					<div id="targetTrigger"></div>
					<div class="targets__target">
						<div class="targets__number">
							<p>02</p>
						</div>
						<div class="targets__text">
							<p>
								Вторая цель состоит в изучении «информатики реального времени». При этом кафедра исходит
								из
								того, что персональные компьютеры составляют аппаратную основу всех направлений
								современных
								информационных технологий и сегодня они обрели способность работать в реальном времени.
								Важной компонентой для студентов служит здесь изучение основ теории управления
								дискретными
								процессами с помощью промышленных программируемых контроллеров и систем числового
								программного управления.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();
