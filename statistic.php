<?php
/*
Template Name: Библиографическая статистика
*/
?>

<?php get_header() ?>
<section class="statistic-page">
    <div class="statistic-page__header">
        <div class="container">
            <h1>Библиографическая статистика</h1>
        </div>
    </div>
    <main class="statistic-page__main">
        <div class="container">
            <div class="statistic-page__block1">
                <div class="statistic-page__block1-title main-title">
                    <h2>Всего опубликовано работ: <span id="articles-counter"></span></h2>
                </div>
                <div class="statistic-page__block1-diagram statistic-diagram">
                    <div class="statistic-diagram__stolbiki" id="columns"></div>
                    <div class="statistic-diagram__shkala"></div>
                </div>
            </div>
            <div class="statistic-page__block2">
                <div class="statistic-page__block2-title main-title">
                    <h2>Самые цитируемые работы и авторы</h2>
                </div>
                <div class="statistic-page__block2-diagrams">
                    <div class="statistic-page__block2-diagram1 statistic2-diagram1" id="columns2">
                        <!-- <div class="statistic2-diagram1__column-wrapper">
                            <div class="statistic2-diagram1__column-count">159</div>
                            <div class="statistic2-diagram1__column" id="column2">
                                <p>СИСТЕМЫ ЧИСЛОВОГО ПРОГРАММНОГО УПРАВЛЕНИЯ</p>
                            </div>
                        </div>
                        <div class="statistic2-diagram1__column-wrapper">
                            <div class="statistic2-diagram1__column-count">159</div>
                            <div class="statistic2-diagram1__column" id="column2"></div>
                        </div>
                        <div class="statistic2-diagram1__column-wrapper">
                            <div class="statistic2-diagram1__column-count">159</div>
                            <div class="statistic2-diagram1__column" id="column2"></div>
                        </div> -->
                    </div>
                    <div class="statistic-page__block2-diagram2 statistic2-diagram2" id="authors">
                        <!-- <div class="statistic2-diagram2__item">
                            <div class="statistic2-diagram2__item-avatar">
                                <img src="<?php echo get_template_directory_uri() . "/img/default-user.png" ?>" alt="">
                            </div>
                            <div class="statistic2-diagram2__item-info">
                                <div class="statistic2-diagram2__item-name"><p>Мартинов Григори Мартинов</p></div>
                                <div class="statistic2-diagram2__item-body">
                                    <p><b>Всего работ: </b>4321</p>
                                    <p><b>Всего цитирований: </b>4321</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="bibliography-page__articles" id="bibliography-page__articles">
        <?php
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
        ?>
    </div>
</section>

<?php get_footer() ?>