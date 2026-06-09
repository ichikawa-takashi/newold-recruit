<?php get_header(); ?>
<main class="sub-page">

    <div class="sub-page__hero">
        <div class="sub-page__hero-inner inner">
            <nav class="breadcrumb pc" aria-label="パンくずリスト">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </nav>

            <div class="sub-page__title-wrapper">
                <h1 class="sub-page__title-en sub-page__title-en--90">Business</h1>
                <p class="sub-page__title-ja">事業について</p>
            </div>
        </div>
    </div>

    <div class="sub-page__layout sub-page__layout--business inner">

        <aside class="sub-page__side sub-page__side--business" aria-label="ページ内ナビゲーション">
            <nav class="sub-page__nav">
                <ul class="sub-page__nav-list">
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec01">事業紹介</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec02">M&amp;A</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec03">Agent</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec04">Exparts</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec05">Asia</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="sub-page__section-wrapper sub-business__section-wrapper">

            <section class="sub-business__section sub-business__intro" id="sec01">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <p class="sub-page__section-number">〔01〕</p>
                        <h2 class="sub-page__section-title">事業紹介</h2>
                    </div>

                    <div class="sub-business__intro-body">
                        <h3 class="sub-business__intro-heading">
                            さまざまな成長支援アプローチで<br>企業の経営課題に向き合います。
                        </h3>
                        <div class="sub-business__intro-content">
                            <div class="sub-business__intro-desc">
                                <p>私たちは「成長支援といえばNEWOLD」と言っていただける存在を目指しています。<br>
                                    M&A実行支援、経営幹部人材紹介、エキスパート活用ソリューション、東南アジアM&A・進出支援のアプローチを組み合わせ、課題に応じた最適な支援をワンストップでご提供します。
                                </p>
                            </div>
                            <a href="https://newold.co.jp/service/" class="sub-business__intro-cta right-up-button">
                                <span class="sub-business__intro-cta-label">事業案内へ（コーポレート）</span>
                                <div class="right-up-button__arrow">
                                    <span class="sub-business__intro-cta-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                        </div>
                        <figure class="sub-business__intro-image">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/business/intro-image.jpg" alt="">
                        </figure>
                    </div>
                </div>
            </section>

            <div class="sub-business__service-wrapper">
                <section class="sub-business__section sub-business__service" id="sec02">
                    <div class="sub-page__section-inner inner">
                        <div class="sub-business__service-card">
                            <div class="sub-business__service-head">
                                <span class="sub-business__service-num">01</span>
                                <div class="sub-business__service-head-right">
                                    <span class="sub-business__service-name-ja">Ｍ＆Ａ実行支援</span>
                                    <span class="sub-business__service-name-en">NEWOLD M&amp;A</span>
                                </div>
                            </div>

                            <div class="sub-business__service-block-wrapper">
                                <div class="sub-business__service-block sub-business__service-block--content">
                                    <p class="sub-business__service-block-label">事業内容</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs01_content = get_field('business_01_content'); ?>
                                        <?php if (!empty($bs01_content)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs01_content); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--appeal">
                                    <p class="sub-business__service-block-label">仕事の魅力</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs01_appeal = get_field('business_01_appeal'); ?>
                                        <?php if (!empty($bs01_appeal)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs01_appeal); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--people">
                                    <p class="sub-business__service-block-label">働いてる人</p>
                                    <div class="sub-business__service-block-body">
                                        <?php
                                        $bs01_raw    = get_field('business_01_people');
                                        $bs01_people = ($bs01_raw instanceof WP_Post) ? [$bs01_raw] : (is_array($bs01_raw) ? $bs01_raw : []);
                                        ?>
                                        <?php if (!empty($bs01_people)): ?>
                                            <ul class="sub-business__people-list">
                                                <?php foreach ($bs01_people as $bp):
                                                    $bp_portrait   = get_field('people_portrait', $bp->ID);
                                                    $bp_name_ja    = get_field('people_name_ja', $bp->ID);
                                                    $bp_department = get_field('people_department', $bp->ID);
                                                    $bp_img_alt    = !empty($bp_portrait['alt']) ? $bp_portrait['alt'] : esc_attr($bp_name_ja) . ' のポートレート';
                                                ?>
                                                    <li class="sub-business__people-item">
                                                        <figure class="sub-business__people-avatar">
                                                            <?php if (!empty($bp_portrait)): ?>
                                                                <img src="<?php echo esc_url($bp_portrait['url']); ?>" alt="<?php echo esc_attr($bp_img_alt); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($bp_name_ja); ?> のポートレート">
                                                            <?php endif; ?>
                                                        </figure>
                                                        <?php if (!empty($bp_name_ja)): ?>
                                                            <p class="sub-business__people-name"><?php echo esc_html($bp_name_ja); ?></p>
                                                        <?php endif; ?>
                                                        <?php if (!empty($bp_department)): ?>
                                                            <p class="sub-business__people-role"><?php echo esc_html($bp_department); ?></p>
                                                        <?php endif; ?>
                                                        <a href="<?php echo esc_url(get_permalink($bp->ID)); ?>" class="sub-business__people-link right-up-button">
                                                            <span class="sub-business__people-link-label">記事を読む</span>
                                                            <div class="right-up-button__arrow">
                                                                <span class="sub-business__people-link-icon right-up-button__icon">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sub-business__section sub-business__service" id="sec03">
                    <div class="sub-page__section-inner inner">
                        <div class="sub-business__service-card">
                            <div class="sub-business__service-head">
                                <span class="sub-business__service-num">02</span>
                                <div class="sub-business__service-head-right">
                                    <span class="sub-business__service-name-ja">経営幹部人材紹介</span>
                                    <span class="sub-business__service-name-en">NEWOLD Agent</span>
                                </div>
                            </div>

                            <div class="sub-business__service-block-wrapper">
                                <div class="sub-business__service-block sub-business__service-block--content">
                                    <p class="sub-business__service-block-label">事業内容</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs02_content = get_field('business_02_content'); ?>
                                        <?php if (!empty($bs02_content)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs02_content); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--appeal">
                                    <p class="sub-business__service-block-label">仕事の魅力</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs02_appeal = get_field('business_02_appeal'); ?>
                                        <?php if (!empty($bs02_appeal)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs02_appeal); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--people">
                                    <p class="sub-business__service-block-label">働いてる人</p>
                                    <div class="sub-business__service-block-body">
                                        <?php
                                        $bs02_raw    = get_field('business_02_people');
                                        $bs02_people = ($bs02_raw instanceof WP_Post) ? [$bs02_raw] : (is_array($bs02_raw) ? $bs02_raw : []);
                                        ?>
                                        <?php if (!empty($bs02_people)): ?>
                                            <ul class="sub-business__people-list">
                                                <?php foreach ($bs02_people as $bp):
                                                    $bp_portrait   = get_field('people_portrait', $bp->ID);
                                                    $bp_name_ja    = get_field('people_name_ja', $bp->ID);
                                                    $bp_department = get_field('people_department', $bp->ID);
                                                    $bp_img_alt    = !empty($bp_portrait['alt']) ? $bp_portrait['alt'] : esc_attr($bp_name_ja) . ' のポートレート';
                                                ?>
                                                    <li class="sub-business__people-item">
                                                        <figure class="sub-business__people-avatar">
                                                            <?php if (!empty($bp_portrait)): ?>
                                                                <img src="<?php echo esc_url($bp_portrait['url']); ?>" alt="<?php echo esc_attr($bp_img_alt); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($bp_name_ja); ?> のポートレート">
                                                            <?php endif; ?>
                                                        </figure>
                                                        <?php if (!empty($bp_name_ja)): ?>
                                                            <p class="sub-business__people-name"><?php echo esc_html($bp_name_ja); ?></p>
                                                        <?php endif; ?>
                                                        <?php if (!empty($bp_department)): ?>
                                                            <p class="sub-business__people-role"><?php echo esc_html($bp_department); ?></p>
                                                        <?php endif; ?>
                                                        <a href="<?php echo esc_url(get_permalink($bp->ID)); ?>" class="sub-business__people-link right-up-button">
                                                            <span class="sub-business__people-link-label">記事を読む</span>
                                                            <div class="right-up-button__arrow">
                                                                <span class="sub-business__people-link-icon right-up-button__icon">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sub-business__section sub-business__service" id="sec04">
                    <div class="sub-page__section-inner inner">
                        <div class="sub-business__service-card">
                            <div class="sub-business__service-head">
                                <span class="sub-business__service-num">03</span>
                                <div class="sub-business__service-head-right">
                                    <span class="sub-business__service-name-ja">エキスパート活用ソリューション</span>
                                    <span class="sub-business__service-name-en">NEWOLD Exparts</span>
                                </div>
                            </div>

                            <div class="sub-business__service-block-wrapper">
                                <div class="sub-business__service-block sub-business__service-block--content">
                                    <p class="sub-business__service-block-label">事業内容</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs03_content = get_field('business_03_content'); ?>
                                        <?php if (!empty($bs03_content)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs03_content); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--appeal">
                                    <p class="sub-business__service-block-label">仕事の魅力</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs03_appeal = get_field('business_03_appeal'); ?>
                                        <?php if (!empty($bs03_appeal)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs03_appeal); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--people">
                                    <p class="sub-business__service-block-label">働いてる人</p>
                                    <div class="sub-business__service-block-body">
                                        <?php
                                        $bs03_raw    = get_field('business_03_people');
                                        $bs03_people = ($bs03_raw instanceof WP_Post) ? [$bs03_raw] : (is_array($bs03_raw) ? $bs03_raw : []);
                                        ?>
                                        <?php if (!empty($bs03_people)): ?>
                                            <ul class="sub-business__people-list">
                                                <?php foreach ($bs03_people as $bp):
                                                    $bp_portrait   = get_field('people_portrait', $bp->ID);
                                                    $bp_name_ja    = get_field('people_name_ja', $bp->ID);
                                                    $bp_department = get_field('people_department', $bp->ID);
                                                    $bp_img_alt    = !empty($bp_portrait['alt']) ? $bp_portrait['alt'] : esc_attr($bp_name_ja) . ' のポートレート';
                                                ?>
                                                    <li class="sub-business__people-item">
                                                        <figure class="sub-business__people-avatar">
                                                            <?php if (!empty($bp_portrait)): ?>
                                                                <img src="<?php echo esc_url($bp_portrait['url']); ?>" alt="<?php echo esc_attr($bp_img_alt); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($bp_name_ja); ?> のポートレート">
                                                            <?php endif; ?>
                                                        </figure>
                                                        <?php if (!empty($bp_name_ja)): ?>
                                                            <p class="sub-business__people-name"><?php echo esc_html($bp_name_ja); ?></p>
                                                        <?php endif; ?>
                                                        <?php if (!empty($bp_department)): ?>
                                                            <p class="sub-business__people-role"><?php echo esc_html($bp_department); ?></p>
                                                        <?php endif; ?>
                                                        <a href="<?php echo esc_url(get_permalink($bp->ID)); ?>" class="sub-business__people-link right-up-button">
                                                            <span class="sub-business__people-link-label">記事を読む</span>
                                                            <div class="right-up-button__arrow">
                                                                <span class="sub-business__people-link-icon right-up-button__icon">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="sub-business__section sub-business__service" id="sec05">
                    <div class="sub-page__section-inner inner">
                        <div class="sub-business__service-card">
                            <div class="sub-business__service-head">
                                <span class="sub-business__service-num">04</span>
                                <div class="sub-business__service-head-right">
                                    <span class="sub-business__service-name-ja">東南アジアM&amp;A・進出支援</span>
                                    <span class="sub-business__service-name-en">NEWOLD Asia</span>
                                </div>
                            </div>

                            <div class="sub-business__service-block-wrapper">
                                <div class="sub-business__service-block sub-business__service-block--content">
                                    <p class="sub-business__service-block-label">事業内容</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs04_content = get_field('business_04_content'); ?>
                                        <?php if (!empty($bs04_content)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs04_content); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--appeal">
                                    <p class="sub-business__service-block-label">仕事の魅力</p>
                                    <div class="sub-business__service-block-body">
                                        <?php $bs04_appeal = get_field('business_04_appeal'); ?>
                                        <?php if (!empty($bs04_appeal)): ?>
                                            <div class="sub-business__service-text">
                                                <?php echo wp_kses_post($bs04_appeal); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="sub-business__service-block sub-business__service-block--people">
                                    <p class="sub-business__service-block-label">働いてる人</p>
                                    <div class="sub-business__service-block-body">
                                        <?php
                                        $bs04_raw    = get_field('business_04_people');
                                        $bs04_people = ($bs04_raw instanceof WP_Post) ? [$bs04_raw] : (is_array($bs04_raw) ? $bs04_raw : []);
                                        ?>
                                        <?php if (!empty($bs04_people)): ?>
                                            <ul class="sub-business__people-list">
                                                <?php foreach ($bs04_people as $bp):
                                                    $bp_portrait   = get_field('people_portrait', $bp->ID);
                                                    $bp_name_ja    = get_field('people_name_ja', $bp->ID);
                                                    $bp_department = get_field('people_department', $bp->ID);
                                                    $bp_img_alt    = !empty($bp_portrait['alt']) ? $bp_portrait['alt'] : esc_attr($bp_name_ja) . ' のポートレート';
                                                ?>
                                                    <li class="sub-business__people-item">
                                                        <figure class="sub-business__people-avatar">
                                                            <?php if (!empty($bp_portrait)): ?>
                                                                <img src="<?php echo esc_url($bp_portrait['url']); ?>" alt="<?php echo esc_attr($bp_img_alt); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="<?php echo esc_attr($bp_name_ja); ?> のポートレート">
                                                            <?php endif; ?>
                                                        </figure>
                                                        <?php if (!empty($bp_name_ja)): ?>
                                                            <p class="sub-business__people-name"><?php echo esc_html($bp_name_ja); ?></p>
                                                        <?php endif; ?>
                                                        <?php if (!empty($bp_department)): ?>
                                                            <p class="sub-business__people-role"><?php echo esc_html($bp_department); ?></p>
                                                        <?php endif; ?>
                                                        <a href="<?php echo esc_url(get_permalink($bp->ID)); ?>" class="sub-business__people-link right-up-button">
                                                            <span class="sub-business__people-link-label">記事を読む</span>
                                                            <div class="right-up-button__arrow">
                                                                <span class="sub-business__people-link-icon right-up-button__icon">
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                    <img src="<?php echo esc_url(get_theme_file_uri('/img/common/button-arrow-white.svg')); ?>" alt="右向き矢印アイコン" />
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <section class="sub-business__cta cta-recruit">
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