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
                <div class="statistic-page__block1-wrapper">
                    <div class="statistic-page__block1-diagram statistic-diagram">
                        <div class="statistic-diagram__stolbiki" id="columns"></div>
                        <div class="statistic-diagram__shkala"></div>
                    </div>
                </div>
            </div>
            <div class="statistic-page__block2">
                <div class="statistic-page__block2-title main-title just-title">
                    <h2>Самые цитируемые работы и авторы</h2>
                </div>
                <div class="statistic-page__block2-diagrams">
                    <div class="main-title statistic-page__block2-title title-ad">
                        <h2>Самые цитируемые работы:</h2>
                    </div>
                    <div class="statistic-page__block2-diagram1 statistic2-diagram1" id="columns2">

                    </div>
                    <div class="main-title statistic-page__block2-title title-ad">
                        <h2>Самые цитируемые авторы:</h2>
                    </div>
                    <div class="statistic-page__block2-diagram2 statistic2-diagram2" id="authors">

                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<?php get_footer() ?>