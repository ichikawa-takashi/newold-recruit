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
                <h1 class="sub-page__title-en">Recruitment</h1>
                <p class="sub-page__title-ja">採用情報</p>
            </div>
        </div>
    </div>

    <div class="sub-page__layout inner">
        <!-- PCのみ：左追従ナビ -->
        <aside class="sub-page__side" aria-label="ページ内ナビゲーション">
            <nav class="sub-page__nav">
                <ul class="sub-page__nav-list">
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec01">カジュアル面談</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec02">募集職種一覧</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec03">採用フロー</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec04">よくある質問</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="sub-page__section-wrapper sub-recruitment__section-wrapper">
            <section class="sub-recruitment__section sub-recruitment__interview" id="sec01">
                <div class="sub-page__section-inner inner">
                    <div class="sub-recruitment__interview-grid">
                        <div class="sub-recruitment__interview-content">
                            <div class="sub-page__section-heading">
                                <p class="sub-page__section-number">〔01〕</p>
                                <h2 class="sub-page__section-title">カジュアル面談</h2>
                            </div>

                            <p class="sub-recruitment__interview-lead">
                                まずはカジュアルに<br>
                                話をしてみませんか？
                            </p>

                            <p class="sub-recruitment__interview-description">
                                私たちNEWOLD CAPITALが皆さまの求めている環境なのか力を発揮いただけるのかなど、ズレを生まないために、カジュアルにお話しする場をご用意しています。
                            </p>

                            <div class="sub-recruitment__interview-action">
                                <a href="#" class="sub-recruitment__interview-button button-anchor">
                                    <span class="sub-recruitment__interview-button-text">カジュアル面談へ進む</span>
                                    <div class="sub-recruitment__interview-button-arrow">
                                        <span class="sub-recruitment__interview-button-icon button-anchor__icon">
                                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="→">
                                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="→">
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="sub-recruitment__interview-media">
                            <figure class="sub-recruitment__interview-image">
                                <picture>
                                    <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/recruitment/interview-pc.jpg">
                                </picture>
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/recruitment/interview.jpg" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sub-recruitment__section sub-recruitment__entry" id="sec02">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <p class="sub-page__section-number">〔02〕</p>
                        <h2 class="sub-page__section-title">募集職種一覧</h2>
                    </div>
                    <div class="sub-recruitment__entry-content">
                        <div class="sub-recruitment__entry-top">
                            <p class="sub-recruitment__entry-label">Entry</p>
                            <p class="sub-recruitment__entry-text">
                                私たちNEWOLD CAPITALが皆さまの求めている環境なのか力を発揮いただけるのかなど、ズレを生まないために、カジュアルにお話しする場をご用意しています。
                            </p>
                        </div>

                        <ul class="sub-recruitment__entry-list">
                            <li class="sub-recruitment__entry-item">
                                <a href="#" class="sub-recruitment__entry-link right-up-button"
                                    aria-label="新卒採用の詳細を見る">
                                    <div class="sub-recruitment__entry-image">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/recruitment/entry-graduate.jpg" alt="スーツ姿の女性社員の写真"
                                            loading="lazy">
                                    </div>
                                    <div class="sub-recruitment__entry-link-body">
                                        <span class="sub-recruitment__entry-link-text">新卒採用</span>
                                        <span class="sub-recruitment__entry-link-arrow right-up-button__arrow"
                                            aria-hidden="true">
                                            <span class="sub-recruitment__entry-link-icon right-up-button__icon">
                                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
                                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
                                            </span>
                                        </span>
                                    </div>
                                </a>
                            </li>

                            <li class="sub-recruitment__entry-item">
                                <a href="#" class="sub-recruitment__entry-link right-up-button"
                                    aria-label="中途採用の詳細を見る">
                                    <div class="sub-recruitment__entry-image">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/recruitment/entry-career.jpg" alt="スーツ姿の男性社員の写真"
                                            loading="lazy">
                                    </div>
                                    <div class="sub-recruitment__entry-link-body">
                                        <span class="sub-recruitment__entry-link-text">中途採用</span>
                                        <span class="sub-recruitment__entry-link-arrow right-up-button__arrow"
                                            aria-hidden="true">
                                            <span class="sub-recruitment__entry-link-icon right-up-button__icon">
                                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
                                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="→">
                                            </span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="sub-recruitment__section sub-recruitment__flow" id="sec03">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <p class="sub-page__section-number">〔03〕</p>
                        <h2 class="sub-page__section-title">採用フロー</h2>
                    </div>

                    <div class="sub-recruitment__flow-content">
                        <div class="sub-recruitment__flow-duration">
                            <p class="sub-recruitment__flow-duration-text">約1ヶ月程度</p>
                        </div>

                        <ol class="sub-recruitment__flow-list">
                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP1</span>
                                    <h3 class="sub-recruitment__flow-item-title">エントリー</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">まずは「募集職種」からお申し込みください。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP2</span>
                                    <h3 class="sub-recruitment__flow-item-title">書類選考</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">エントリー後、書類選考の結果をメールでお知らせします。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP3</span>
                                    <h3 class="sub-recruitment__flow-item-title">面接</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">3回程度の面接を予定しています。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP4</span>
                                    <h3 class="sub-recruitment__flow-item-title">内定</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">エントリーから内定まで、通常3〜4週間程度かかります。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP5</span>
                                    <h3 class="sub-recruitment__flow-item-title">オファー面談</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">NEWOLD
                                    CAPITALに入社いただきたい想いや条件面などをお伝えさせてください。</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="sub-recruitment__section sub-recruitment-faq" id="sec04">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <p class="sub-page__section-number">〔04〕</p>
                        <h2 class="sub-page__section-title">よくある質問</h2>
                    </div>

                    <div class="sub-recruitment-faq__list">
                        <details class="sub-recruitment-faq__item" open>
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    応募にあたり、特定の学部や資格が必要ですか？
                                </span>
                            </summary>

                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。
                                    </p>
                                </div>

                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    応募にあたり、特定の学部や資格が必要ですか？
                                </span>
                            </summary>

                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    応募にあたり、特定の学部や資格が必要ですか？
                                </span>
                            </summary>

                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。
                                    </p>
                                </div>
                            </div>
                        </details>
                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    応募にあたり、特定の学部や資格が必要ですか？
                                </span>
                            </summary>

                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。
                                    </p>
                                </div>
                            </div>
                        </details>
                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    応募にあたり、特定の学部や資格が必要ですか？
                                </span>
                            </summary>

                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。
                                    </p>
                                </div>
                            </div>
                        </details>
                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    応募にあたり、特定の学部や資格が必要ですか？
                                </span>
                            </summary>

                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。
                                    </p>
                                </div>
                            </div>
                        </details>
                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    応募にあたり、特定の学部や資格が必要ですか？
                                </span>
                            </summary>

                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。
                                    </p>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="sub-recruitment__cta cta-recruit">
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