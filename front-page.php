<?php
$newold_latest_news_items = get_transient('newold_latest_news_items');

if (false === $newold_latest_news_items) {
    $newold_latest_news_items = [];
    $news_response = wp_remote_get(
        'https://newold.co.jp/wp-json/wp/v2/posts?per_page=5&_fields=date,link,title',
        [
            'timeout' => 5,
        ]
    );

    if (!is_wp_error($news_response) && 200 === wp_remote_retrieve_response_code($news_response)) {
        $news_items = json_decode(wp_remote_retrieve_body($news_response), true);

        if (is_array($news_items)) {
            foreach ($news_items as $news_item) {
                if (!is_array($news_item)) {
                    continue;
                }

                $news_timestamp = !empty($news_item['date']) ? strtotime($news_item['date']) : false;
                $news_title     = !empty($news_item['title']['rendered']) ? $news_item['title']['rendered'] : '';

                $newold_latest_news_items[] = [
                    'url'          => !empty($news_item['link']) ? esc_url_raw($news_item['link']) : 'https://newold.co.jp/news/',
                    'title'        => wp_strip_all_tags(html_entity_decode($news_title, ENT_QUOTES, get_bloginfo('charset'))),
                    'date_iso'     => $news_timestamp ? date('Y-m-d', $news_timestamp) : '',
                    'date_display' => $news_timestamp ? date_i18n('Y.m.d', $news_timestamp) : '',
                ];
            }
        }
    }

    if (!empty($newold_latest_news_items)) {
        set_transient('newold_latest_news_items', $newold_latest_news_items, 30 * MINUTE_IN_SECONDS);
    } else {
        $newold_latest_news_items = [[
            'url'          => 'https://newold.co.jp/news/',
            'title'        => 'お知らせ一覧はこちら',
            'date_iso'     => '',
            'date_display' => '',
        ]];
        set_transient('newold_latest_news_items', $newold_latest_news_items, 5 * MINUTE_IN_SECONDS);
    }
}

$newold_first_news = !empty($newold_latest_news_items[0]) ? $newold_latest_news_items[0] : [
    'url'          => 'https://newold.co.jp/news/',
    'title'        => 'お知らせ一覧はこちら',
    'date_iso'     => '',
    'date_display' => '',
];
?>
<?php get_header(); ?>
<main class="main" id="main">
    <div class="fv">
        <div class="fv_inner inner">
            <div class="fv__top">
                <div class="fv__top-contents">
                    <h1 class="fv__title">
                        <p class="fv__title01">どこに向かい、</p>
                        <p class="fv__title02">だれと組むか。</p>
                    </h1>
                    <div class="fv__image">
                        <picture>
                            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv.jpg" media="(min-width: 768px)" />
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-sp.jpg" alt="newoldの社員が写っている写真">
                        </picture>
                    </div>
                </div>
                <div class="fv__news">
                    <a href="<?php echo esc_url($newold_first_news['url']); ?>" class="fv__news-anchor js-fv-news-anchor" target="_blank" rel="noopener noreferrer">
                        <h2 class="fv__news-title">news</h2>
                        <div class="fv__news-content">
                            <div class="fv__news-viewport">
                                <?php foreach ($newold_latest_news_items as $news_index => $news_item): ?>
                                    <div class="fv__news-item<?php echo 0 === $news_index ? ' is-active' : ''; ?>" data-url="<?php echo esc_url($news_item['url']); ?>">
                                        <?php if (!empty($news_item['date_display'])): ?>
                                            <time datetime="<?php echo esc_attr($news_item['date_iso']); ?>" class="fv__news-date"><?php echo esc_html($news_item['date_display']); ?></time>
                                        <?php endif; ?>
                                        <p class="fv__news-description"><?php echo esc_html($news_item['title']); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <span class="fv__news-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.88797 4.78825C5.76485 4.79399 5.64906 4.84841 5.56607 4.93953C5.48307 5.03065 5.43968 5.15101 5.44542 5.27412C5.45117 5.39724 5.50559 5.51303 5.59671 5.59602C5.68783 5.67902 5.80819 5.72241 5.9313 5.71667L13.6771 5.36408L4.59645 14.4447C4.50938 14.5318 4.46047 14.6499 4.46047 14.773C4.46047 14.8962 4.50938 15.0143 4.59645 15.1013C4.68352 15.1884 4.80161 15.2373 4.92475 15.2373C5.04788 15.2373 5.16597 15.1884 5.25304 15.1013L14.3324 6.02198L13.9798 13.7652C13.9741 13.8882 14.0176 14.0084 14.1006 14.0994C14.1836 14.1904 14.2993 14.2447 14.4223 14.2504C14.5454 14.256 14.6656 14.2126 14.7566 14.1296C14.8476 14.0466 14.9019 13.9309 14.9076 13.8078L15.3028 5.12114C15.3077 5.02432 15.2922 4.92756 15.2574 4.83709C15.2225 4.74663 15.1691 4.66447 15.1005 4.59592C15.032 4.52738 14.9498 4.47396 14.8594 4.43912C14.7689 4.40427 14.6722 4.38878 14.5753 4.39363L5.88797 4.78825Z"
                                    fill="white" />
                            </svg>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.88797 4.78825C5.76485 4.79399 5.64906 4.84841 5.56607 4.93953C5.48307 5.03065 5.43968 5.15101 5.44542 5.27412C5.45117 5.39724 5.50559 5.51303 5.59671 5.59602C5.68783 5.67902 5.80819 5.72241 5.9313 5.71667L13.6771 5.36408L4.59645 14.4447C4.50938 14.5318 4.46047 14.6499 4.46047 14.773C4.46047 14.8962 4.50938 15.0143 4.59645 15.1013C4.68352 15.1884 4.80161 15.2373 4.92475 15.2373C5.04788 15.2373 5.16597 15.1884 5.25304 15.1013L14.3324 6.02198L13.9798 13.7652C13.9741 13.8882 14.0176 14.0084 14.1006 14.0994C14.1836 14.1904 14.2993 14.2447 14.4223 14.2504C14.5454 14.256 14.6656 14.2126 14.7566 14.1296C14.8476 14.0466 14.9019 13.9309 14.9076 13.8078L15.3028 5.12114C15.3077 5.02432 15.2922 4.92756 15.2574 4.83709C15.2225 4.74663 15.1691 4.66447 15.1005 4.59592C15.032 4.52738 14.9498 4.47396 14.8594 4.43912C14.7689 4.40427 14.6722 4.38878 14.5753 4.39363L5.88797 4.78825Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </a>
                    <?php if (count($newold_latest_news_items) > 1): ?>
                    <div class="fv__news-controls">
                        <button class="fv__news-btn js-fv-news-prev" aria-label="前のニュース">
                            <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6L5 2L9 6" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <button class="fv__news-btn js-fv-news-next" aria-label="次のニュース">
                            <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="inner fv__photo-inner">
                <div class="fv__photo01 parallax-image-wrap">
                    <picture class="">
                        <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/top-image01.jpg" media="(min-width: 768px)" />
                        <img class="parallax-image" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/top-image01_sp.jpg" alt="役員の2人が向かい合って会話している写真">
                    </picture>
                </div>
            </div>
        </div>
    </div>

    <section class="top-where">
        <div class="top-where__inner inner">
            <div class="top-where__heading-group">
                <h2 class="top-where__title">
                    次世代を担う<br>
                    「成長実現ファーム」へ
                </h2>
            </div>

            <div class="top-where__lead-group">
                <p class="top-where__lead-text">
                    予測不可能な時代において、<br class="sp">私たちNEWOLD CAPITALは
                </p>
                <h3 class="top-where__lead-text top-where__lead-text--emphasis">
                    成長を支える<br class="sp">経営パートナーとして<br>
                    プロ集団であり続ける。
                </h3>
            </div>

            <div class="top-where__image01">
                <figure class="top-where__figure parallax-image-wrap">
                    <img class="parallax-image" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/top-image02.jpg" alt="ノートパソコンを前に笑顔で話すスーツ姿の男性">
                </figure>
            </div>

            <div class="top-where__description-group js-karaoke">
                <p class="top-where__description-text">NEWOLD CAPITALは、</p>
                <p class="top-where__description-text">
                    「温故知新」の精神を大切にしながら、歴史や想いを受け継ぎ、<br>
                    次世代へとつながる持続的な成長を共に実現していく存在を目指しています。
                </p>
                <p class="top-where__description-text top-where__description-text--bottom">
                    私たちの志は、「企業・人・地域」の成長を実現し、<br>
                    次世代の幸せを増やすことにあります。
                </p>
            </div>

            <div class="top-where__button-group">
                <a href="<?php echo esc_url(home_url('/about/')); ?>" class="top-where__button">
                    <p class="top-where__button-text">私たちについて</p>
                    <div class="top-where__button-arrow">
                        <span class="top-where__button-icon">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
                        </span>
                    </div>
                </a>
            </div>
            <div class="top-where__image02">
                <figure class="top-where__figure parallax-image-wrap">
                    <picture class="">
                        <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/top-image03.jpg" media="(min-width: 768px)" />
                        <img class="parallax-image" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/top-image03_sp.jpg" alt="ネイビースーツの男性が笑顔で話す様子">
                    </picture>
                </figure>
            </div>
        </div>
    </section>


    <section class="top-business top-col02">
        <div class="top-business__inner top-col02__inner">
            <div class="top-business__header-side top-header-side">
                <a href="<?php echo esc_url(home_url('/business/')); ?>" class="top-business__header-link top-header-side__link button-anchor">
                    <h3 class="top-business__header-ja top-header-side__title">事業を知る</h3>
                    <div class="top-business__header-button-arrow button-anchor__arrow">
                        <span class="top-business__header-button-icon button-anchor__icon">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="→">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="→">
                        </span>
                    </div>
                    <p class="top-business__link-text top-header-side__link-text">Read More</p>
                </a>
            </div>
            <div class="top-business__main">
                <div class="top-business__header top-col02__header">
                    <h2 class="top-business__header-title top-sec-title">Business</h2>
                    <p class="top-business__header-description top-sec-description">
                        私たちは、企業・人・地域の成長を実現するサービスを提供しています。
                    </p>
                    <a href="<?php echo esc_url(home_url('/business/')); ?>" class="top-business__header-button top-sec-button sp">詳しく見る</a>
                </div>
                <div class="top-business__visual">
                    <div class="top-business__visual__bg">
                        <picture class="">
                            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/top-business-bgi.svg" media="(min-width: 768px)" />
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/top-business-bgi_sp.svg" alt="未来">
                        </picture>
                    </div>
                    <ul class="top-business__visual-list pc" aria-label="事業一覧">
                        <li class="top-business__visual-item top-business__visual-item--01 is-active">
                            <div class="top-business__visual-link">
                                <span class="top-business__visual-number">01</span>
                                <span class="top-business__visual-logo">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo01.svg')); ?>" alt="NEWOLD M&amp;A">
                                </span>
                                <span class="top-business__visual-text">M&amp;A実行支援</span>
                            </div>
                        </li>
                        <li class="top-business__visual-item top-business__visual-item--02">
                            <div class="top-business__visual-link">
                                <span class="top-business__visual-number">02</span>
                                <span class="top-business__visual-logo">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo02.svg')); ?>" alt="NEWOLD Agent">
                                </span>
                                <span class="top-business__visual-text">経営幹部人材<br>紹介</span>
                            </div>
                        </li>
                        <li class="top-business__visual-item top-business__visual-item--03">
                            <div class="top-business__visual-link">
                                <span class="top-business__visual-number">03</span>
                                <span class="top-business__visual-logo">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo03.svg')); ?>" alt="NEWOLD Exparts">
                                </span>
                                <span class="top-business__visual-text">エキスパート活用<br>ソリューション</span>
                            </div>
                        </li>
                        <li class="top-business__visual-item top-business__visual-item--04">
                            <div class="top-business__visual-link">
                                <span class="top-business__visual-number">04</span>
                                <span class="top-business__visual-logo">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo04.svg')); ?>" alt="NEWOLD Asia">
                                </span>
                                <span class="top-business__visual-text">東南アジア<br>M&A・進出支援</span>
                            </div>
                        </li>
                    </ul>
                    <ul class="top-business__visual-sp-list sp" aria-label="事業一覧">
                        <li class="top-business__visual-sp-item top-business__visual-sp-item--01 is-active">
                            <div class="top-business__visual-sp-circle">
                                <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo01.svg')); ?>" alt="NEWOLD M&amp;A">
                            </div>
                            <div class="top-business__visual-sp-content">
                                <span class="top-business__visual-sp-number">01</span>
                                <span class="top-business__visual-sp-label">NEWOLD M&amp;A</span>
                                <span class="top-business__visual-sp-title">M&amp;A実行支援</span>
                            </div>
                        </li>
                        <li class="top-business__visual-sp-item top-business__visual-sp-item--02">
                            <div class="top-business__visual-sp-circle">
                                <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo02.svg')); ?>" alt="NEWOLD Agent">
                            </div>
                            <div class="top-business__visual-sp-content">
                                <span class="top-business__visual-sp-number">02</span>
                                <span class="top-business__visual-sp-label">NEWOLD Agent</span>
                                <span class="top-business__visual-sp-title">経営幹部人材紹介</span>
                            </div>
                        </li>
                        <li class="top-business__visual-sp-item top-business__visual-sp-item--03">
                            <div class="top-business__visual-sp-circle">
                                <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo03.svg')); ?>" alt="NEWOLD Exparts">
                            </div>
                            <div class="top-business__visual-sp-content">
                                <span class="top-business__visual-sp-number">03</span>
                                <span class="top-business__visual-sp-label">NEWOLD Exparts</span>
                                <span class="top-business__visual-sp-title">エキスパート<br>活用ソリューション</span>
                            </div>
                        </li>
                        <li class="top-business__visual-sp-item top-business__visual-sp-item--04">
                            <div class="top-business__visual-sp-circle">
                                <img src="<?php echo esc_url(get_theme_file_uri('/img/top/top-business-logo04.svg')); ?>" alt="NEWOLD Asia">
                            </div>
                            <div class="top-business__visual-sp-content">
                                <span class="top-business__visual-sp-number">04</span>
                                <span class="top-business__visual-sp-label">NEWOLD Asia</span>
                                <span class="top-business__visual-sp-title">東南アジア<br>M&amp;A・進出支援</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="top-business__nav">
                    <button class="top-business__nav-btn top-business__nav-btn--prev js-business-prev" aria-label="前の事業">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M12.5 4.5L7.5 10L12.5 15.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <span class="top-business__nav-counter js-business-nav-counter">01 / 04</span>
                    <button class="top-business__nav-btn top-business__nav-btn--next js-business-next" aria-label="次の事業">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M7.5 4.5L12.5 10L7.5 15.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>

                <ul class="top-business__list">

                    <!-- M&A実行支援 -->
                    <li class="top-business__detail is-active">
                        <div class="top-business__detail-inner">
                            <div class="top-business__detail-content">
                                <p class="top-business__detail-label">NEWOLD M&amp;A</p>
                                <p class="top-business__detail-title">M&amp;A実行支援</p>
                                <p class="top-business__detail-text">
                                    NEWOLD M&amp;Aは、「繋ぐ」だけでなく「伸ばす」ことを目的とした成長戦略型M&Aです。<br class="pc">
                                    業種特化の専門性を活かし、初期段階からPMIや事業計画を議論し、最適な戦略を描きます。<br class="pc">その戦略をスキームへと落とし込み、実効性の高いM&Aを実現します。
                                </p>
                                <div class="top-business__detail-button">
                                    <a href="<?php echo esc_url(home_url('/business/#sec02')); ?>" class="top-business__detail-link right-up-button">
                                        <p class="top-business__detail-link-text">詳細を見る</p>
                                        <div class="top-business__detail-button-arrow right-up-button__arrow">
                                            <span class="top-business__detail-icon right-up-button__icon">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $ma_raw    = get_field('top_ma_people');
                            $ma_person = ($ma_raw instanceof WP_Post) ? $ma_raw : (is_array($ma_raw) && !empty($ma_raw) ? $ma_raw[0] : null);
                            if ($ma_person):
                                $ma_portrait   = get_field('people_portrait', $ma_person->ID);
                                $ma_name_ja    = get_the_title($ma_person->ID);
                                $ma_department = get_field('people_department', $ma_person->ID);
                                $ma_img_alt    = !empty($ma_portrait['alt']) ? $ma_portrait['alt'] : esc_attr($ma_name_ja) . ' のポートレート';
                            ?>
                                <a href="<?php echo esc_url(get_permalink($ma_person->ID)); ?>" class="top-business__voice right-up-button">
                                    <div class="top-business__voice-profile">
                                        <div class="top-business__voice-image">
                                            <?php if (!empty($ma_portrait)): ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url($ma_portrait['url']); ?>" alt="<?php echo esc_attr($ma_img_alt); ?>" />
                                            <?php else: ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($ma_name_ja); ?> のポートレート" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="top-business__voice-info">
                                            <?php if (!empty($ma_name_ja)): ?>
                                                <p class="top-business__voice-name"><?php echo esc_html($ma_name_ja); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($ma_department)): ?>
                                                <p class="top-business__voice-position"><?php echo esc_html($ma_department); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="top-business__voice-content">
                                        <p class="top-business__voice-title">Members Voice</p>
                                        <span class="top-business__voice-link">
                                            <span class="top-business__voice-link-text">働く人を知る</span>
                                            <div class="top-business__button-arrow right-up-button__arrow">
                                                <span class="top-business__button-icon right-up-button__icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>

                    <!-- 経営幹部人材紹介 -->
                    <li class="top-business__detail">
                        <div class="top-business__detail-inner">
                            <div class="top-business__detail-content">
                                <p class="top-business__detail-label">NEWOLD Agent</p>
                                <p class="top-business__detail-title">経営幹部人材紹介</p>
                                <p class="top-business__detail-text">
                                    NEWOLD Agentは、企業変革を担うキーパーソンの採用を支援します。<br class="pc">
                                    連続的なM&Aを推進する責任者から、次期後継者やCxOクラスまで、経営課題に応じた最適な人材をご紹介。<br class="pc">経営幹部人材の採用を通じて、持続的な成長を実現します。
                                <div class="top-business__detail-button">
                                    <a href="<?php echo esc_url(home_url('/business/#sec03')); ?>" class="top-business__detail-link right-up-button">
                                        <p class="top-business__detail-link-text">詳細を見る</p>
                                        <div class="top-business__detail-button-arrow right-up-button__arrow">
                                            <span class="top-business__detail-icon right-up-button__icon">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $agent_raw    = get_field('top_agent_people');
                            $agent_person = ($agent_raw instanceof WP_Post) ? $agent_raw : (is_array($agent_raw) && !empty($agent_raw) ? $agent_raw[0] : null);
                            if ($agent_person):
                                $agent_portrait   = get_field('people_portrait', $agent_person->ID);
                                $agent_name_ja    = get_the_title($agent_person->ID);
                                $agent_department = get_field('people_department', $agent_person->ID);
                                $agent_img_alt    = !empty($agent_portrait['alt']) ? $agent_portrait['alt'] : esc_attr($agent_name_ja) . ' のポートレート';
                            ?>
                                <a href="<?php echo esc_url(get_permalink($agent_person->ID)); ?>" class="top-business__voice right-up-button">
                                    <div class="top-business__voice-profile">
                                        <div class="top-business__voice-image">
                                            <?php if (!empty($agent_portrait)): ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url($agent_portrait['url']); ?>" alt="<?php echo esc_attr($agent_img_alt); ?>" />
                                            <?php else: ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($agent_name_ja); ?> のポートレート" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="top-business__voice-info">
                                            <?php if (!empty($agent_name_ja)): ?>
                                                <p class="top-business__voice-name"><?php echo esc_html($agent_name_ja); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($agent_department)): ?>
                                                <p class="top-business__voice-position"><?php echo esc_html($agent_department); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="top-business__voice-content">
                                        <p class="top-business__voice-title">Members Voice</p>
                                        <span class="top-business__voice-link">
                                            <span class="top-business__voice-link-text">働く人を知る</span>
                                            <div class="top-business__button-arrow right-up-button__arrow">
                                                <span class="top-business__button-icon right-up-button__icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>

                    <!-- エキスパート活用ソリューション -->
                    <li class="top-business__detail">
                        <div class="top-business__detail-inner">
                            <div class="top-business__detail-content">
                                <p class="top-business__detail-label">NEWOLD Exparts</p>
                                <p class="top-business__detail-title">エキスパート活用ソリューション</p>
                                <p class="top-business__detail-text">
                                    NEWOLD Expartsは、企業の新しい挑戦において不足するリソースを、最適なエキスパートで補うソリューションです。<br class="pc">
                                    経営課題を正確に把握し、最適なエキスパートを迅速にアサイン。スピーディーな課題解決と、未来に向けた成長の実現を支援します。
                                </p>
                                <div class="top-business__detail-button">
                                    <a href="<?php echo esc_url(home_url('/business/#sec04')); ?>" class="top-business__detail-link right-up-button">
                                        <p class="top-business__detail-link-text">詳細を見る</p>
                                        <div class="top-business__detail-button-arrow right-up-button__arrow">
                                            <span class="top-business__detail-icon right-up-button__icon">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $experts_raw    = get_field('top_experts_people');
                            $experts_person = ($experts_raw instanceof WP_Post) ? $experts_raw : (is_array($experts_raw) && !empty($experts_raw) ? $experts_raw[0] : null);
                            if ($experts_person):
                                $experts_portrait   = get_field('people_portrait', $experts_person->ID);
                                $experts_name_ja    = get_the_title($experts_person->ID);
                                $experts_department = get_field('people_department', $experts_person->ID);
                                $experts_img_alt    = !empty($experts_portrait['alt']) ? $experts_portrait['alt'] : esc_attr($experts_name_ja) . ' のポートレート';
                            ?>
                                <a href="<?php echo esc_url(get_permalink($experts_person->ID)); ?>" class="top-business__voice right-up-button">
                                    <div class="top-business__voice-profile">
                                        <div class="top-business__voice-image">
                                            <?php if (!empty($experts_portrait)): ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url($experts_portrait['url']); ?>" alt="<?php echo esc_attr($experts_img_alt); ?>" />
                                            <?php else: ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($experts_name_ja); ?> のポートレート" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="top-business__voice-info">
                                            <?php if (!empty($experts_name_ja)): ?>
                                                <p class="top-business__voice-name"><?php echo esc_html($experts_name_ja); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($experts_department)): ?>
                                                <p class="top-business__voice-position"><?php echo esc_html($experts_department); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="top-business__voice-content">
                                        <p class="top-business__voice-title">Members Voice</p>
                                        <span class="top-business__voice-link">
                                            <span class="top-business__voice-link-text">働く人を知る</span>
                                            <div class="top-business__button-arrow right-up-button__arrow">
                                                <span class="top-business__button-icon right-up-button__icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>

                    <!-- アジア事業支援 -->
                    <li class="top-business__detail">
                        <div class="top-business__detail-inner">
                            <div class="top-business__detail-content">
                                <p class="top-business__detail-label">NEWOLD Asia</p>
                                <p class="top-business__detail-title">東南アジアM&A・進出支援</p>
                                <p class="top-business__detail-text">
                                    NEWOLD Asiaは、東南アジアにおける市場調査・戦略立案から、M&Aのソーシング・実行、PMIまでを一気通貫で支援。<br class="pc">現地事情に精通したプロフェッショナルが、日本企業の海外成長を実現します。
                                </p>
                                <div class="top-business__detail-button">
                                    <a href="<?php echo esc_url(home_url('/business/#sec05')); ?>" class="top-business__detail-link right-up-button">
                                        <p class="top-business__detail-link-text">詳細を見る</p>
                                        <div class="top-business__detail-button-arrow right-up-button__arrow">
                                            <span class="top-business__detail-icon right-up-button__icon">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $asia_raw    = get_field('top_asia_people');
                            $asia_person = ($asia_raw instanceof WP_Post) ? $asia_raw : (is_array($asia_raw) && !empty($asia_raw) ? $asia_raw[0] : null);
                            if ($asia_person):
                                $asia_portrait   = get_field('people_portrait', $asia_person->ID);
                                $asia_name_ja    = get_the_title($asia_person->ID);
                                $asia_department = get_field('people_department', $asia_person->ID);
                                $asia_img_alt    = !empty($asia_portrait['alt']) ? $asia_portrait['alt'] : esc_attr($asia_name_ja) . ' のポートレート';
                            ?>
                                <a href="<?php echo esc_url(get_permalink($asia_person->ID)); ?>" class="top-business__voice right-up-button">
                                    <div class="top-business__voice-profile">
                                        <div class="top-business__voice-image">
                                            <?php if (!empty($asia_portrait)): ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url($asia_portrait['url']); ?>" alt="<?php echo esc_attr($asia_img_alt); ?>" />
                                            <?php else: ?>
                                                <img class="top-business__voice-photo" src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($asia_name_ja); ?> のポートレート" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="top-business__voice-info">
                                            <?php if (!empty($asia_name_ja)): ?>
                                                <p class="top-business__voice-name"><?php echo esc_html($asia_name_ja); ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($asia_department)): ?>
                                                <p class="top-business__voice-position"><?php echo esc_html($asia_department); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="top-business__voice-content">
                                        <p class="top-business__voice-title">Members Voice</p>
                                        <span class="top-business__voice-link">
                                            <span class="top-business__voice-link-text">働く人を知る</span>
                                            <div class="top-business__button-arrow right-up-button__arrow">
                                                <span class="top-business__button-icon right-up-button__icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-black.svg')); ?>" alt="→">
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>


    <!-- peopleセクション -->
    <section class="top-people top-col02">
        <div class="top-people__inner top-col02__inner">
            <div class="top-people__header-side top-header-side">
                <a href="<?php echo esc_url(home_url('/people/')); ?>" class="top-people__header-link top-header-side__link button-anchor">
                    <p class="top-people__header-ja top-header-side__title">働く人を知る</p>
                    <div class="top-people__header-button-arrow button-anchor__arrow">
                        <span class="top-people__header-button-icon button-anchor__icon">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                        </span>
                    </div>
                    <p class="top-people__link-text top-header-side__link-text">Read More</p>
                </a>
            </div>

            <div class="top-people__main">
                <div class="top-people__header top-col02__header">
                    <div class="top-people__header-inner">
                        <p class="top-people__header-title top-sec-title">People</p>
                        <p class="top-people__header-description top-sec-description">
                            多様なバックグラウンドを持つプロフェッショナルたちが、それぞれの強みを活かしながら、<br class="pc">経営パートナーとして企業の成長に向き合っています。
                        </p>
                        <a href="<?php echo esc_url(home_url('/people/')); ?>" class="top-people__header-button top-sec-button sp">詳しく見る</a>
                    </div>
                </div>

                <div class="top-people__body">
                    <?php
                    $top_people_raw  = get_field('top_people_list');
                    $top_people_list = ($top_people_raw instanceof WP_Post) ? [$top_people_raw] : (is_array($top_people_raw) ? $top_people_raw : []);
                    if (!empty($top_people_list)):
                    ?>
                        <ul class="people-card__list">
                            <?php foreach ($top_people_list as $tp):
                                $tp_title      = get_field('people_title', $tp->ID);
                                $tp_name_ja    = get_the_title($tp->ID);
                                $tp_department = get_field('people_department', $tp->ID);
                                $tp_year       = get_field('people_year', $tp->ID);
                                $tp_portrait   = get_field('people_portrait', $tp->ID);
                                $tp_img_alt    = !empty($tp_portrait['alt']) ? $tp_portrait['alt'] : esc_attr($tp_name_ja) . ' ポートレート';
                            ?>
                                <li class="people-card__item">
                                    <a href="<?php echo esc_url(get_permalink($tp->ID)); ?>" class="people-card__item-link right-up-button">
                                        <div class="people-card__image">
                                            <?php if (!empty($tp_portrait)): ?>
                                                <img src="<?php echo esc_url($tp_portrait['url']); ?>" alt="<?php echo esc_attr($tp_img_alt); ?>" />
                                            <?php else: ?>
                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($tp_name_ja); ?> ポートレート" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="people-card__content">
                                            <?php if (!empty($tp_title)): ?>
                                                <p class="people-card__text"><?php echo esc_html($tp_title); ?></p>
                                            <?php endif; ?>
                                            <div class="people-card__meta">
                                                <div class="people-card__info">
                                                    <?php if (!empty($tp_department)): ?>
                                                        <p class="people-card__department"><?php echo nl2br(esc_html($tp_department)); ?></p>
                                                    <?php endif; ?>
                                                    <?php if (!empty($tp_name_ja)): ?>
                                                        <p class="people-card__name"><?php echo esc_html($tp_name_ja); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="people-card__bottom">
                                                    <?php if (!empty($tp_year)): ?>
                                                        <time class="people-card__year" datetime="<?php echo esc_attr($tp_year); ?>"><?php echo esc_html($tp_year); ?>年入社</time>
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
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <section class="top-environment top-col02">
        <div class="top-environment__inner top-col02__inner">
            <div class="top-environment__header-side top-header-side">
                <a href="<?php echo esc_url(home_url('/environment/')); ?>" class="top-environment__header-link top-header-side__link button-anchor">
                    <p class="top-environment__header-ja top-header-side__title">働く環境を知る</p>
                    <div class="top-environment__header-button-arrow button-anchor__arrow">
                        <span class="top-environment__header-button-icon button-anchor__icon">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                        </span>
                    </div>
                    <p class="top-environment__link-text top-header-side__link-text">Read More</p>
                </a>
            </div>

            <div class="top-environment__main">
                <div class="top-environment__header top-col02__header">
                    <h2 class="top-environment__header-title top-sec-title">Environment</h2>
                    <p class="top-environment__header-description top-sec-description">
                        NEWOLD CAPITALでは、社員一人ひとりが最大限の力を発揮できるよう、働きやすい環境や制度を用意しています。<br />
                        キャリア形成の仕組みや数字で見るNEWOLDをご紹介します。
                    </p>
                </div>

                <div class="top-environment__content">
                    <div class="top-environment__media">
                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/environment-image.jpg" alt="スーツ姿で話す男性のインタビュー風景" />
                    </div>

                    <ul class="top-environment__list">
                        <li class="top-environment__item">
                            <a href="<?php echo esc_url(home_url('/environment/#sec00')); ?>" class="top-environment__link right-up-button">
                                <dl class="top-environment__item-head">
                                    <dt class="top-environment__item-label">NEWOLD Office</dt>
                                    <dd class="top-environment__item-title">オフィス紹介</dd>
                                </dl>
                                <div class="top-environment__button-arrow right-up-button__arrow">
                                    <span class="top-environment__button-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="top-environment__item">
                            <a href="<?php echo esc_url(home_url('/environment/#sec01')); ?>" class="top-environment__link right-up-button">
                                <dl class="top-environment__item-head">
                                    <dt class="top-environment__item-label">NEWOLD Growth Path</dt>
                                    <dd class="top-environment__item-title">キャリアステップ</dd>
                                </dl>
                                <div class="top-environment__button-arrow right-up-button__arrow">
                                    <span class="top-environment__button-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                        </li>

                        <li class="top-environment__item">
                            <a href="<?php echo esc_url(home_url('/environment/#sec02')); ?>" class="top-environment__link right-up-button">
                                <dl class="top-environment__item-head">
                                    <dt class="top-environment__item-label">NEWOLD Learning Program</dt>
                                    <dd class="top-environment__item-title">教育研修制度</dd>
                                </dl>
                                <div class="top-environment__button-arrow right-up-button__arrow">
                                    <span class="top-environment__button-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                        </li>

                        <li class="top-environment__item">
                            <a href="<?php echo esc_url(home_url('/environment/#sec03')); ?>" class="top-environment__link right-up-button">
                                <dl class="top-environment__item-head">
                                    <dt class="top-environment__item-label">NEWOLD Benefits</dt>
                                    <dd class="top-environment__item-title">福利厚生・制度</dd>
                                </dl>
                                <div class="top-environment__button-arrow right-up-button__arrow">
                                    <span class="top-environment__button-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                        </li>

                        <li class="top-environment__item">
                            <a href="<?php echo esc_url(home_url('/environment/#sec04')); ?>" class="top-environment__link right-up-button">
                                <dl class="top-environment__item-head">
                                    <dt class="top-environment__item-label">NEWOLD Insights</dt>
                                    <dd class="top-environment__item-title">数字で見るNEWOLD</dd>
                                </dl>
                                <div class="top-environment__button-arrow right-up-button__arrow">
                                    <span class="top-environment__button-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <section class="top-recruit">
        <div class="inner top-recruit__visual-wrap">
            <div class="top-recruit__visual">
                <picture class="">
                    <img class="top-recruit__image" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/recruitment-image.jpg" alt="スーツ姿の男女が並ぶ採用イメージ" />
                </picture>
            </div>
        </div>

        <div class="top-recruit__content">
            <div class="top-recruit__inner">
                <div class="top-recruit__heading">
                    <h2 class="top-recruit__title">Recruitment</h2>
                    <p class="top-recruit__subtitle">採用情報</p>
                </div>
                <div class="top-recruit__lead">
                    <p class="top-recruit__lead-text">
                        NEWOLD CAPITALでは、<br class="pc">私たちと候補者の双方が納得したうえで入社いただけるよう、<br class="pc">丁寧な選考プロセスを設けています。
                    </p>
                </div>

                <!-- <dl class="top-recruit__nav">
                    <div class="top-recruit__nav-item top-recruit__nav-item--flow">
                        <dt class="top-recruit__nav-title">Flow</dt>
                        <dd class="top-recruit__nav-text">採用フローについて</dd>
                    </div>
                    <div class="top-recruit__nav-item top-recruit__nav-item--interview">
                        <dt class="top-recruit__nav-title">Interview</dt>
                        <dd class="top-recruit__nav-text">カジュアル<br class="sp">面談について</dd>
                    </div>
                    <div class="top-recruit__nav-item top-recruit__nav-item--positions">
                        <dt class="top-recruit__nav-title">Positions</dt>
                        <dd class="top-recruit__nav-text">募集職種一覧</dd>
                    </div>
                </dl> -->

                <div class="top-recruit__cta">
                    <a href="<?php echo esc_url(home_url('/recruitment/')); ?>" class="top-recruit__button right-up-button">
                        <span class="top-recruit__button-text">採用情報を見る</span>
                        <div class="top-recruit__button-arrow right-up-button__arrow">
                            <span class="top-recruit__button-icon right-up-button__icon">
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section class="top-movie top-col02">
        <div class="top-movie__inner top-col02__inner">
            <div class="top-movie__header-side top-header-side">
                <div class="top-movie__header-link top-header-side__link">
                    <p class="top-movie__header-ja top-header-side__title">会社紹介動画</p>
                </div>
            </div>

            <div class="top-movie__main">
                <div class="top-movie__header top-col02__header">
                    <p class="top-movie__header-title top-sec-title">Company <br>introduction <br class="sp">video
                    </p>
                    <p class="top-movie__header-description top-sec-description">
                        NEWOLD CAPITALの事業や価値観、働く人の想いが分かる会社案内動画です。<br>私たちが目指す未来や仕事の魅力を、ぜひご覧ください。
                    </p>
                </div>

                <?php $top_movie_embed_src = add_query_arg('enablejsapi', 1, get_youtube_embed_url('https://youtu.be/oUgEB1ux_60?si=XBzwz5TIacJBwRDt')); ?>
                <div class="top-movie__content">
                    <div class="top-movie__media js-scroll-shield">
                        <iframe
                            class="top-movie__video-iframe js-scroll-shield-iframe"
                            src="<?php echo esc_url($top_movie_embed_src); ?>"
                            title="会社紹介動画"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                        <button type="button" class="top-movie__media-shield js-scroll-shield-btn" aria-label="動画を再生"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="cta-recruit">
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
                        <a class="cta-recruit__button button-anchor" href="https://hrmos.co/pages/newold" target="_blank" rel="noopener noreferrer">
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
                        <p class="cta-recruit__card-label">Casual Interview</p>
                        <p class="cta-recruit__card-title">カジュアル面談</p>
                        <p class="cta-recruit__card-text">
                            まずはざっくばらんに情報交換することを目的としています。<br>
                            ぜひお気軽にお申し込みください。
                        </p>
                    </div>
                    <div class="cta-recruit__card-action">
                        <a class="cta-recruit__button button-anchor" href="https://hrmos.co/pages/newold/jobs/0000001" target="_blank" rel="noopener noreferrer">
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

    <section class="cta-join">
        <div class="inner cta-join__inner">
            <div class="cta-join__visual">
                <picture class="">
                    <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/join-image.jpg" media="(min-width: 768px)" />
                    <img class="cta-join__image" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/join-image_sp.jpg" alt="スーツ姿の男女が笑顔で会話する様子" />
                </picture>
                <div class="cta-join__overlay">
                    <div class="cta-join__heading">
                        <h2 class="cta-join__title">Join our team!</h2>
                    </div>
                </div>
            </div>
            <!-- <div class="cta-join__links">
                <div class="cta-join__link-item cta-join__link-item--graduate">
                    <a href="#" class="cta-join__link right-up-button">
                        <p class="cta-join__link-text">新卒採用<span>はこちら</span></p>
                        <div class="cta-join__button-arrow right-up-button__arrow">
                            <span class="cta-join__button-icon right-up-button__icon">
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                            </span>
                        </div>
                    </a>
                </div>
                <div class="cta-join__link-item cta-join__link-item--career">
                    <a href="#" class="cta-join__link right-up-button">
                        <p class="cta-join__link-text">中途採用<span>はこちら</span></p>
                        <div class="cta-join__button-arrow right-up-button__arrow">
                            <span class="cta-join__button-icon right-up-button__icon">
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                            </span>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
    </section>
</main>
<!-- フローティングボタン -->
<div class="floating-buttons">
    <a href="https://hrmos.co/pages/newold" target="_blank" rel="noopener noreferrer" class="floating-buttons__item right-up-button">
        <span class="floating-buttons__label">募集一覧</span>
        <div class="floating-buttons__arrow right-up-button__arrow">
            <span class="floating-buttons__icon right-up-button__icon">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
            </span>
        </div>
    </a>
    <a href="https://www.youtube.com/@newoldcapital" class="floating-buttons__item floating-buttons__item--youtube" target="_blank"
        rel="noopener noreferrer">
        <span class="floating-buttons__label">YouTube</span>
        <img class="floating-buttons__youtube-icon" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/youtube-green.svg" alt="YouTube">
    </a>
</div>
<?php get_footer(); ?>