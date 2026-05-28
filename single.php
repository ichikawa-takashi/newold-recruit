<?php get_header(); ?>

<main class="sub-page">

    <!-- ヒーロー -->
    <div class="sub-page__hero">
        <div class="sub-page__hero-inner inner">
            <nav class="breadcrumb pc" aria-label="パンくずリスト">
                <?php
                $bc_blog_id    = (int) get_option('page_for_posts');
                $bc_blog_url   = $bc_blog_id ? get_permalink($bc_blog_id) : home_url('/');
                $bc_blog_title = $bc_blog_id ? get_the_title($bc_blog_id) : 'NEWOLDCAPITALの人';
                ?>
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="HOMEへ移動する" href="<?php echo esc_url(home_url('/')); ?>" class="home">
                        <span property="name">HOME</span>
                    </a>
                    <meta property="position" content="1">
                </span>
                &gt;
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="<?php echo esc_attr($bc_blog_title); ?>へ移動する" href="<?php echo esc_url($bc_blog_url); ?>">
                        <span property="name"><?php echo esc_html($bc_blog_title); ?></span>
                    </a>
                    <meta property="position" content="2">
                </span>
                &gt;
                <span property="itemListElement" typeof="ListItem">
                    <span property="name" class="post current-item"><?php the_title(); ?></span>
                    <meta property="url" content="<?php the_permalink(); ?>">
                    <meta property="position" content="3">
                </span>
            </nav>
            <div class="sub-page__title-wrapper">
                <h1 class="sub-page__title-en">People</h1>
                <p class="sub-page__title-ja">NEWOLD CAPITALの人</p>
            </div>
        </div>
    </div>

    <section class="single-people">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>

                <?php
                // 基本情報
                $people_title      = get_field('people_title');
                $people_name_ja    = get_field('people_name_ja');
                $people_name_en    = get_field('people_name_en');
                $people_department = get_field('people_department');
                $people_year       = get_field('people_year');
                $people_portrait   = get_field('people_portrait');

                // 動画関連
                $video_url         = get_field('people_video_url');
                $video_thumb       = get_field('people_video_thumb');
                $video_catch       = get_field('people_video_catch');
                $video_description = get_field('people_video_text');

                // 動画URLに入力があるかで表示を分岐
                $has_video = !empty($video_url);

                // Q&Aをまとめて取得
                $qa_items = [];

                for ($i = 1; $i <= 15; $i++) {
                    $question = get_field('people_q' . $i);
                    $answer   = get_field('people_a' . $i);

                    // 質問または回答のどちらかに入力があるものだけ表示
                    if (!empty($question) || !empty($answer)) {
                        $qa_items[] = [
                            'number'   => $i,
                            'question' => $question,
                            'answer'   => $answer,
                        ];
                    }
                }
                ?>

                <div class="inner single-people__inner">
                    <div class="single-people__lead">

                        <!-- アイキャッチ -->
                        <?php if (has_post_thumbnail()): ?>
                        <div class="single-people__thumbnail">
                            <?php the_post_thumbnail('full', ['alt' => get_the_title() . ' サムネイル画像']); ?>
                        </div>
                        <?php endif; ?>

                        <div class="single-people__intro">
                            <?php if (!empty($people_title)): ?>
                                <h2 class="single-people__catch">
                                    <?php echo nl2br(esc_html($people_title)); ?>
                                </h2>
                            <?php endif; ?>

                            <div class="single-people__profile">
                                <div class="single-people__profile-name">
                                    <?php if (!empty($people_name_ja)): ?>
                                        <p class="single-people__name-ja">
                                            <?php echo esc_html($people_name_ja); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($people_name_en)): ?>
                                        <p class="single-people__name-en">
                                            <?php echo esc_html($people_name_en); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($people_department)): ?>
                                    <p class="single-people__department">
                                        <?php echo esc_html($people_department); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($people_year)): ?>
                                    <p class="single-people__year">
                                        <?php echo esc_html($people_year); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- 動画：動画URLが入力されている時のみ表示 -->
                        <?php if ($has_video): ?>
                            <div class="single-people__video">
                                <div class="single-people__video-wrap">

                                    <?php if (!empty($video_thumb)): ?>
                                        <img
                                            src="<?php echo esc_url($video_thumb['url']); ?>"
                                            alt="<?php echo esc_attr(!empty($video_thumb['alt']) ? $video_thumb['alt'] : 'インタビュー動画サムネイル'); ?>"
                                            class="single-people__video-img" />
                                    <?php else: ?>
                                        <img
                                            src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>"
                                            alt="インタビュー動画サムネイル"
                                            class="single-people__video-img" />
                                    <?php endif; ?>

                                    <div class="single-people__video-play">
                                        <a
                                            href="<?php echo esc_url($video_url); ?>"
                                            class="single-people__video-play-button"
                                            target="_blank"
                                            rel="noopener noreferrer">
                                            <span class="single-people__video-play-text top-movie__play-text">PLAY</span>

                                            <div class="single-people__video-play-icon top-movie__play-icon">
                                                <img
                                                    src="<?php echo esc_url(get_theme_file_uri('/img/common/youtube-black.svg')); ?>"
                                                    alt="YouTubeのアイコン">
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="single-people__body">

                        <!-- サイドバー -->
                        <div class="single-people__sidebar-column">
                            <aside class="single-people__sidebar">
                                <div class="single-people__portrait-wrapper pc">
                                    <div class="single-people__portrait">
                                        <?php if (!empty($people_portrait)): ?>
                                            <img
                                                src="<?php echo esc_url($people_portrait['url']); ?>"
                                                alt="<?php echo esc_attr(!empty($people_portrait['alt']) ? $people_portrait['alt'] : $people_name_ja . ' プロフィール写真'); ?>"
                                                class="single-people__portrait" />
                                        <?php endif; ?>
                                    </div>

                                    <div class="single-people__sidebar-meta">
                                        <?php if (!empty($people_name_ja)): ?>
                                            <p class="single-people__sidebar-name">
                                                <?php echo esc_html($people_name_ja); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (!empty($people_department)): ?>
                                            <p class="single-people__sidebar-dept">
                                                <?php echo esc_html($people_department); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </aside>

                            <div class="single-people__sidebar-cta">
                                <div class="single-people__sidebar-cta-head">
                                    <p class="single-people__sidebar-cta-text">まずは気軽に話したい人向け</p>
                                </div>

                                <div class="single-people__sidebar-cta-buttons">
                                    <a
                                        href="#"
                                        class="single-people__sidebar-btn single-people__sidebar-btn--casual right-up-button">
                                        <span>カジュアル面談へ</span>
                                        <div class="right-up-button__arrow">
                                            <span class="single-people__sidebar-btn-icon right-up-button__icon">
                                                <img
                                                    src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>"
                                                    alt="右向き矢印アイコン" />
                                                <img
                                                    src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>"
                                                    alt="右向き矢印アイコン" />
                                            </span>
                                        </div>
                                    </a>

                                    <a
                                        href="#"
                                        class="single-people__sidebar-btn single-people__sidebar-btn--position right-up-button">
                                        <span>現在募集中の職種</span>
                                        <div class="right-up-button__arrow">
                                            <span class="single-people__sidebar-btn-icon right-up-button__icon">
                                                <img
                                                    src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>"
                                                    alt="右向き矢印アイコン" />
                                                <img
                                                    src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>"
                                                    alt="右向き矢印アイコン" />
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- 右側コンテンツ -->
                        <div class="single-people__qa">

                            <?php if ($has_video): ?>

                                <!-- 動画あり：キャッチフレーズ＋説明文 -->
                                <div class="single-people__movie-content">

                                    <?php if (!empty($video_catch)): ?>
                                        <p class="single-people__movie-catch single-people__qa-question">
                                            <?php echo nl2br(esc_html($video_catch)); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($video_description)): ?>
                                        <div class="single-people__movie-description single-people__qa-answer">
                                            <p>
                                                <?php echo nl2br(esc_html($video_description)); ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>

                                </div>

                            <?php else: ?>

                                <!-- 動画なし：Q&A -->
                                <?php if (!empty($qa_items)): ?>
                                    <div class="single-people__qa-list">

                                        <?php foreach ($qa_items as $qa): ?>
                                            <div class="single-people__qa-item">
                                                <div class="single-people__qa-header">
                                                    <span class="single-people__qa-number">
                                                        Q<span class="single-people__qa-num-digit"><?php echo esc_html($qa['number']); ?></span>
                                                    </span>

                                                    <div class="single-people__qa-question-wrap">
                                                        <p class="single-people__qa-question">
                                                            <?php echo nl2br(esc_html($qa['question'])); ?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <?php if (!empty($qa['answer'])): ?>
                                                    <div class="single-people__qa-answer">
                                                        <p><?php echo nl2br(esc_html($qa['answer'])); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                <?php endif; ?>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

        <!-- 他のメンバー -->
        <div class="single-people__others">
            <div class="people-others__slide">
                <div class="inner people-others__inner">
                    <div class="people-others__head">
                        <h2 class="people-others__title">他のメンバー</h2>
                        <div class="people-others__nav">
                            <button class="people-others__btn people-others__btn--prev" type="button"
                                aria-label="前の社員を見る">
                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/link-arrow-white.svg')); ?>" alt="" />
                            </button>
                            <button class="people-others__btn people-others__btn--next" type="button"
                                aria-label="次の社員を見る">
                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/link-arrow-white.svg')); ?>" alt="" />
                            </button>
                        </div>
                    </div>

                    <div class="swiper people-others__swiper">
                        <ul class="swiper-wrapper">
                            <?php
                            $others_query = new WP_Query([
                                'post_type'      => 'post',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                                'post__not_in'   => [get_the_ID()],
                            ]);

                            if ($others_query->have_posts()):
                                while ($others_query->have_posts()):
                                    $others_query->the_post();
                                    $o_name_ja    = get_field('people_name_ja');
                                    $o_name_en    = get_field('people_name_en');
                                    $o_department = get_field('people_department');
                                    $o_year       = get_field('people_year');
                                    $o_portrait   = get_field('people_portrait');
                                    $o_alt        = !empty($o_portrait['alt']) ? $o_portrait['alt'] : esc_attr($o_name_ja) . ' プロフィール写真';
                            ?>
                                    <li class="swiper-slide people-others__item">
                                        <a href="<?php the_permalink(); ?>" class="people-others__item-link right-up-button">
                                            <div class="people-others__image">
                                                <?php if (!empty($o_portrait)): ?>
                                                    <img src="<?php echo esc_url($o_portrait['url']); ?>" alt="<?php echo esc_attr($o_alt); ?>" />
                                                <?php elseif (has_post_thumbnail()): ?>
                                                    <?php the_post_thumbnail('full', ['alt' => esc_attr($o_name_ja) . ' プロフィール写真']); ?>
                                                <?php else: ?>
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($o_name_ja); ?> プロフィール写真" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="people-others__content">
                                                <div class="people-others__profile-name">
                                                    <?php if (!empty($o_name_ja)): ?>
                                                        <p class="people-others__name-ja"><?php echo esc_html($o_name_ja); ?></p>
                                                    <?php endif; ?>
                                                    <?php if (!empty($o_name_en)): ?>
                                                        <p class="people-others__name-en"><?php echo esc_html($o_name_en); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (!empty($o_department)): ?>
                                                    <p class="people-others__department"><?php echo esc_html($o_department); ?></p>
                                                <?php endif; ?>
                                                <?php if (!empty($o_year)): ?>
                                                    <p class="people-others__year"><?php echo esc_html($o_year); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </li>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="single-people__link link">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/')); ?>" class="single-people__link-anchor link__anchor">
                    <div class="link__icon">
                        <span class="image01">
                            <img
                                src="<?php echo esc_url(get_theme_file_uri('/img/common/link-arrow-white.svg')); ?>"
                                alt="左向き矢印アイコン"
                                loading="lazy" />
                        </span>
                        <span class="image02">
                            <img
                                src="<?php echo esc_url(get_theme_file_uri('/img/common/link-arrow-white.svg')); ?>"
                                alt="左向き矢印アイコン"
                                loading="lazy" />
                        </span>
                    </div>
                    <p class="text-wrap">
                        <span class="text01">一覧へ戻る</span>
                        <span class="text02">一覧へ戻る</span>
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA -->
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
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-green.svg')); ?>" alt="→">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-green.svg')); ?>" alt="→">
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
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-green.svg')); ?>" alt="→">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-green.svg')); ?>" alt="→">
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