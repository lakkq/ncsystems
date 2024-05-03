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
</section>

<?php get_footer() ?>