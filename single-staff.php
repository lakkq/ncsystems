<?php get_header() ?>

<main id="primary" class="site-main">
    <div class="page-title">
        <div class="container">
            <h1>Сотрудник</h1>
        </div>
    </div>
    <section class="page-body">
        <div class="container">
            <div class="profile">
                <div class="profile__row">
                    <div class="profile__img">
                        <img src="<?php the_field('avatarUrl') ?>" alt="">
                    </div>
                    <div class="profile__info">
                        <div class="profile__name">
                            <p><?php the_title() ?></p>
                        </div>
                        <div class="profile__data">
                            <p><b>Научная степень: </b><?php the_field('degree') ?></p>
                            <p><b>Должность: </b><?php the_field('position') ?></p>
                            <p><b>Опыт работы: </b><?php the_field('experience') ?> лет</p>
                            <p><b>E-mail: </b><a
                                    href="mailto:<?php the_field('e-mail') ?>"><?php the_field('e-mail') ?></a></p>
                            <p><b>Опубликовано работ: </b><?php the_field('publications') ?></p>
                            <p><b>Всего цитирований: </b><?php the_field('allCitied') ?></p>
                            <p><b>Самая цитируемая работа: </b><?php the_field('mostSitied') ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile__content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
    <div class="bibliography-page__main-title main-title">
        <h2>Научные статьи и публикации</h2>
    </div>
        <div id="bibliography-page__articles" class="profile__articles">
        </div>
        <div class="bibliography-page__pages">
            <div class="bibliography-page__pages-row">
                <div class="bibliography-page__pages-back" id="page-back">
                    <div class="bibliography-page__pages-arrow"></div>
                </div>
                <div class="bibliography-page__first-page" id="firstPage">
                    <p>1</p>
                </div>
                <div class="bibliography-page__points1">...</div>
                <div class="bibliography-page__pages-number"></div>
                <div class="bibliography-page__points2">...</div>
                <div class="bibliography-page__last-page" id="lastPage">
                    <p>10</p>
                </div>
                <div class="bibliography-page__pages-forward" id="page-forward">
                    <div class="bibliography-page__pages-arrow"></div>
                </div>
            </div>
        </div>
        <div id="all-articles" style="display:none"><?php the_field('id') ?></div>
    </div>
</main>

<?php get_footer() ?>