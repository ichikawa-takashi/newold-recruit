<?php get_header(); ?>
<main class="sub-page">
    <div class="sub-page__hero">
        <div class="sub-page__hero-inner inner">
            <nav class="breadcrumb pc" aria-label="パンくずリスト">
                <?php if (function_exists('bcn_display')) { bcn_display(); } ?>
            </nav>

            <div class="sub-page__title-wrapper">
                <h1 class="sub-page__title-en">People</h1>
                <p class="sub-page__title-ja">NEWOLD CAPITALの人</p>
            </div>
        </div>
    </div>

    <section class="sub-people">
        <div class="sub-people__inner inner">
            <div class="sub-people__body">
                <ul class="people-card__list">
                    <?php if (have_posts()): while (have_posts()): the_post();
                            $p_title      = get_field('people_title');
                            $p_name_ja    = get_field('people_name_ja');
                            $p_department = get_field('people_department');
                            $p_year       = get_field('people_year');
                            $p_portrait   = get_field('people_portrait');
                            $p_year_num   = preg_replace('/[^0-9]/', '', (string) $p_year);
                            $p_img_alt    = esc_attr($p_name_ja) . ' ポートレート';
                    ?>
                        <li class="people-card__item">
                            <a href="<?php the_permalink(); ?>" class="people-card__item-link right-up-button">
                                <div class="people-card__image">
                                    <?php if (!empty($p_portrait)): ?>
                                        <img src="<?php echo esc_url($p_portrait['url']); ?>" alt="<?php echo esc_attr(!empty($p_portrait['alt']) ? $p_portrait['alt'] : $p_img_alt); ?>" />
                                    <?php elseif (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full', ['alt' => $p_img_alt]); ?>
                                    <?php else: ?>
                                        <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo $p_img_alt; ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="people-card__content">
                                    <?php if (!empty($p_title)): ?>
                                        <p class="people-card__text"><?php echo esc_html($p_title); ?></p>
                                    <?php endif; ?>
                                    <div class="people-card__meta">
                                        <div class="people-card__info">
                                            <?php if (!empty($p_department)): ?>
                                                <p class="people-card__department"><?php echo esc_html($p_department); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($p_name_ja)): ?>
                                                <p class="people-card__name"><?php echo esc_html($p_name_ja); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="people-card__bottom">
                                            <?php if (!empty($p_year)): ?>
                                                <time class="people-card__year" datetime="<?php echo esc_attr($p_year_num); ?>"><?php echo esc_html($p_year); ?></time>
                                            <?php endif; ?>
                                            <div class="people-card__button-arrow right-up-button__arrow">
                                                <span class="people-card__button-icon right-up-button__icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="右向き矢印アイコン" />
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="sub-people__cta cta-recruit">
        <div class="cta-recruit__inner inner">
            <div class="cta-recruit__heading">
                <p class="cta-recruit__label">採用情報</p>
                <h2 class="cta-recruit__title">Recruitment<br>Information</h2>
            </div>

            <div class="cta-recruit__cards">
                <div class="cta-recruit__card cta-recruit__card--primary">
                    <div class="cta-recruit__card-content">
                        <p class="cta-recruit__card-label">Job Position</p>
                        <p class="cta-recruit__card-title">現在募集中の職種</p>
                        <p class="cta-recruit__card-text">
                            NEWOLD CAPITALでは積極的に採用を行なっています。<br>
                            エントリーお待ちしています。
                        </p>
                    </div>
                    <div class="cta-recruit__card-action">
                        <a class="cta-recruit__button button-anchor" href="#">
                            <span class="cta-recruit__button-text">募集職種を確認する</span>
                            <div class="cta-recruit__button-arrow">
                                <span class="cta-recruit__button-icon button-anchor__icon">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg" alt="→">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg" alt="→">
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="cta-recruit__card cta-recruit__card--casual">
                    <div class="cta-recruit__card-content">
                        <p class="cta-recruit__card-label">Casual interview</p>
                        <p class="cta-recruit__card-title">カジュアル面談</p>
                        <p class="cta-recruit__card-text">
                            お互いにまずは知っていくことを目的としています。<br>
                            ぜひお気軽にお申し込みください。
                        </p>
                    </div>
                    <div class="cta-recruit__card-action">
                        <a class="cta-recruit__button button-anchor" href="#">
                            <span class="cta-recruit__button-text">面談を希望する</span>
                            <div class="cta-recruit__button-arrow">
                                <span class="cta-recruit__button-icon button-anchor__icon">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg" alt="→">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg" alt="→">
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>