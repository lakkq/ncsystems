<?php
/*
Template Name: Библиография
*/
?>

<?php get_header() ?>
<section class="bibliography-page">
    <div class="bibliography-page__header">
        <div class="container">
            <div class="bibliography-page__header-row">
                <div class="bibliography-page__header-title">
                    <h1>
                        <?php wp_title('') ?>
                    </h1>
                </div>
                <div class="bibliography-page__header-button">
                    <a href="<?php echo get_site_url()."/библиография/библиографическая-статистика"?>">
                        <img src="<?php echo get_template_directory_uri() . "/img/statistics.svg" ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="bibliography-page__all-articles">Всего найдено: <span id="all-articles"></span></div>
        <div class="bibliography__filter-curtain"></div>
        <div class="bibliography__filter">
            <div class="bibliography__filter-button" id="filter-button-open">
                <img src="<?php echo get_template_directory_uri() . "/img/filter.svg" ?>" alt="">
            </div>
            <div class="bibliography__filter-button bibliography__filter-button-close" id="filter-button-close">
                <div class="triangle"></div>
            </div>
            <div class="bibliography__filter-body">
                <div class="bibliography__filter-authors bibliography__filter-item">
                    <h3>Выбрать авторов</h3>
                    <div class="bibliography__filter-subitem" id="authors-list">
                        <p>Авторы:</p>
                        <ul class="bibliography__filter-authors-list">
                            <?php
                            $posts = get_posts([
                                'numberposts' => -1,
                                'post_type' => 'staff',
                            ]);
                            foreach ($posts as $post) {
                                setup_postdata($post);
                                ?>
                                <li>
                                    <input class="checkbox" type="checkbox" data-author-id="<?php the_field('id'); ?>"
                                        id="author-<?php the_field('id'); ?>">
                                    <label for="author-<?php the_field('id'); ?>">
                                        <p>
                                            <?php the_field('initials'); ?>
                                        </p>
                                    </label>
                                </li>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                        <p>Искать по совпадению:</p>
                        <div class="bibliography__filter-authors-princip">
                            <div class=""><input type="radio" id="I" name="princip" checked><label for="I">И</label>
                            </div>
                            <div class=""><input type="radio" id="ILI" name="princip"><label for="ILI">ИЛИ</label></div>
                        </div>
                    </div>
                </div>
                <div class="bibliography__filter-period bibliography__filter-item">
                    <h3>Выбрать период</h3>
                    <div class="bibliography__filter-period-list bibliography__filter-subitem">
                        <p>Период:</p>
                        <div class="input-year">
                            <label for="start-year">От:</label>
                            <input type="number" id="start-year" placeholder="1994">
                            <label for="start-year">г.</label>
                        </div>
                        <div class="input-year">
                            <label for="end-year">До:</label>
                            <input type="number" id="end-year">
                            <label for="end-year">г.</label>
                        </div>
                    </div>
                </div>
                <div class="bibliography__filter-citied bibliography__filter-item">
                    <label for="citied">Сначала цитируемые:</label>
                    <input type="checkbox" id="citied">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <main class="bibliography-page__main">
            <div class="bibliography-page__main-title main-title">
                <h2>
                    Научные статьи и публикации
                </h2>
            </div>
            <div class="bibliography-page__articles" id="bibliography-page__articles">
                <!-- <?php
                $posts = get_posts([
                    'numberposts' => -1,
                    'post_type' => 'article',
                ]);
                foreach ($posts as $post) {
                    setup_postdata($post);
                    ?>
                    <div class="bibliography-page__article">
                        <div class="bibliography-page__article-head">
                            <div class="bibliography-page__article-arrow"></div>
                            <div class="bibliography-page__article-title">
                                <p>
                                    <?php the_title(); ?>
                                </p>
                            </div>
                            <div class="bibliography-page__article-inf-publ">
                                <div class="bibliography-page__article-indexator">
                                    <?php the_field('indexator'); ?>
                                </div>
                                <div class="bibliography-page__article-year">
                                    <?php the_field('year'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="bibliography-page__article-info">
                            <div class="bibliography-page__article-authors">
                                <p><b>Авторы: </b>
                                    <span>
                                        <?php the_field('authors'); ?>
                                    </span>
                                </p>
                            </div>
                            <div class="bibliography-page__article-doi">
                                <p><b>doi: </b>
                                    <span>
                                        <?php if (get_post_meta($post->ID, 'doi', true)) { ?>
                                            <?php the_field('doi'); ?>
                                        <?php } else { ?>
                                            <?php echo 'не указано' ?>
                                        <?php } ?>
                                    </span>
                                </p>
                            </div>
                            <div class="bibliography-page__article-journal">
                                <p><b>Журнал: </b>
                                    <span>
                                        <?php if (get_post_meta($post->ID, 'journal', true)) { ?>
                                            <?php the_field('journal'); ?>
                                        <?php } else { ?>
                                            <?php echo 'не указано' ?>
                                        <?php } ?>
                                    </span>
                                </p>
                            </div>
                            <div class="bibliography-page__article-citied">
                                <p><b>Кол-во цитирования: </b>
                                    <span>
                                        <?php if (get_post_meta($post->ID, 'citied-by-count', true)) { ?>
                                            <?php the_field('citied-by-count'); ?>
                                        <?php } else { ?>
                                            <?php echo '0' ?>
                                        <?php } ?>
                                    </span>
                                </p>
                            </div>
                            <div class="bibliography-page__article-authorsID" style="display: none">
                                <p><b>ID авторов: </b>
                                    <span>
                                        <?php if (get_post_meta($post->ID, 'id_authors', true)) { ?>
                                            <?php the_field('id_authors'); ?>
                                        <?php } else { ?>
                                            <?php echo 'не указано' ?>
                                        <?php } ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?> -->
            </div>
        </main>
        <div class="bibliography-page__pages">
            <div class="bibliography-page__pages-row">
                <div class="bibliography-page__pages-back" id="page-back">
                    <div class="bibliography-page__pages-arrow"></div>
                </div>
                <div class="bibliography-page__first-page" id="firstPage"><p>1</p></div>
                <div class="bibliography-page__points1">...</div>
                <div class="bibliography-page__pages-number"></div>
                <div class="bibliography-page__points2">...</div>
                <div class="bibliography-page__last-page" id="lastPage"><p>10</p></div>
                <div class="bibliography-page__pages-forward" id="page-forward">
                    <div class="bibliography-page__pages-arrow"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer() ?>