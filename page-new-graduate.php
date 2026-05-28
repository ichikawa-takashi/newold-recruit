<?php get_header(); ?>
<main class="ng-page">

    <!-- ====================================================
            HERO
        ==================================================== -->
    <section class="ng-hero">
        <div class="ng-hero__inner">
            <h1 class="ng-hero__lead inner">
                ビジネス<br>アスリート<br>として生きる
            </h1>
            <div class="ng-hero__image-wrapper">
                <picture>
                    <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/hero-pc.jpg">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/hero-sp.jpg" alt="">
                </picture>
                <div class="ng-hero__deck">
                    <p class="ng-hero__deck-label">Recruit</p>
                    <p class="ng-hero__deck-title">新卒採用情報</p>
                    <div class="ng-hero__deck-content">
                        <p class="ng-hero__deck-group ng-hero__deck-group--highlight">
                            <span class="ng-hero__deck-item">日本国内全体の99.7％を</span>
                            <span class="ng-hero__deck-item">占める中小企業。</span>
                        </p>
                        <p class="ng-hero__deck-group">
                            <span class="ng-hero__deck-item">いわば日本経済の基盤であり、</span>
                            <span class="ng-hero__deck-item">一社一社の挑戦が、<br class="pc">国全体を動かす力となる。</span>
                        </p>
                        <p class="ng-hero__deck-group">
                            <span class="ng-hero__deck-item">しかし、</span>
                            <span class="ng-hero__deck-item">企業を取り巻く経営環境は複雑化し、</span>
                            <span class="ng-hero__deck-item">絶えず変化し続けている。</span>
                        </p>
                        <p class="ng-hero__deck-group">
                            <span class="ng-hero__deck-item">企業の挑戦は、<br class="pc">決して簡単なものではない。</span>
                        </p>
                        <p class="ng-hero__deck-group">
                            <span class="ng-hero__deck-item">それでも、前に進まなければならない。</span>
                        </p>
                        <p class="ng-hero__deck-group ng-hero__deck-group--highlight">
                            <span class="ng-hero__deck-item">その再成長を支える存在が、</span>
                            <span class="ng-hero__deck-item">いま求められている。</span>
                        </p>
                    </div>
                </div>
            </div>
            <img class="ng-hero__decoration ng-hero__decoration--e" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/hero-deco-E.svg" alt="">
            <img class="ng-hero__decoration ng-hero__decoration--circle"
                src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/hero-deco-circle.svg" alt="">
            <img class="ng-hero__decoration ng-hero__decoration--w" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/hero-deco-W.svg" alt="">

        </div>
    </section>

    <!-- ====================================================
            MESSAGE
        ==================================================== -->
    <section class="ng-message" id="sec01">
        <div class="ng-inner ng-massage__inner inner">
            <p class="ng-message__label">message</p>
            <div class="ng-message__body">
                <!-- SP版 -->
                <div class="ng-message__texts sp">
                    <p class="ng-message__para">
                        <span class="ng-message__line">中小企業の成長が、巡り巡って</span>
                        <span class="ng-message__line">未来を担う子どもたちや地域へとつながり、</span>
                        <span class="ng-message__line">日本の未来を明るくする。</span>
                    </p>
                    <p class="ng-message__para">
                        <span class="ng-message__line">その成長を実現するためなら、</span>
                        <span class="ng-message__line">M&amp;A、成長支援、</span>
                        <span class="ng-message__line">ビジネスマッチング、経営人材紹介。</span>
                        <span class="ng-message__line">手段は問わない。</span>
                    </p>
                    <p class="ng-message__para">
                        <span class="ng-message__line">クライアントの成長を実現するために、</span>
                        <span class="ng-message__line">私たち自身も成長し続ける必要がある。</span>
                    </p>
                    <p class="ng-message__para">
                        <span class="ng-message__line">その覚悟があるなら。</span>
                        <span class="ng-message__line">あなたのこれまでの全てを、</span>
                        <span class="ng-message__line">ここで活かしてほしい。</span>
                        <span class="ng-message__line">経験、知識、スキル、人脈、そして情熱。</span>
                        <span class="ng-message__line">その全てで、次世代の幸せをともに増やそう。</span>
                    </p>
                </div>
                <!-- PC版 -->
                <div class="ng-message__texts pc">
                    <p class="ng-message__para">
                        <span class="ng-message__line">中小企業の成長が、巡り巡って</span>
                        <span class="ng-message__line">未来を担う子どもたちや地域へとつながり、</span>
                        <span class="ng-message__line">日本の未来を明るくする。</span>
                    </p>
                    <p class="ng-message__para">
                        <span class="ng-message__line">その成長を実現するためなら、</span>
                        <span class="ng-message__line">M&amp;A、成長支援、</span>
                        <span class="ng-message__line">ビジネスマッチング、経営人材紹介。</span>
                        <span class="ng-message__line">手段は問わない。</span>
                    </p>
                    <p class="ng-message__para">
                        <span class="ng-message__line">クライアントの成長を実現するために、</span>
                        <span class="ng-message__line">私たち自身も成長し続ける必要がある。</span>
                    </p>
                    <p class="ng-message__para">
                        <span class="ng-message__line">その覚悟があるなら。</span>
                        <span class="ng-message__line">あなたのこれまでの全てを、</span>
                        <span class="ng-message__line">ここで活かしてほしい。</span>
                        <span class="ng-message__line">経験、知識、スキル、人脈、そして情熱。</span>
                        <span class="ng-message__line">その全てで、次世代の幸せをともに増やそう。</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================================================
            LAYOUT (sidebar + sections)
        ==================================================== -->
    <div class="sub-page__layout sub-page__layout--new-graduate inner">

        <!-- PC sidebar nav -->
        <aside class="sub-page__side" aria-label="ページ内ナビゲーション">
            <nav class="sub-page__nav">
                <ul class="sub-page__nav-list">
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec01">メッセージ</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec02">先輩のインタビュー</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec03">NEWOLD CAPITALで<br>働くということ</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec04">選考の流れ</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec05">よくある質問</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="sub-page__section-wrapper">

            <!-- ============================================
                    INTERVIEW
                ============================================ -->
            <section class="ng-interview" id="sec02">
                <div class="ng-interview__inner inner">
                    <div class="ng-interview__header">
                        <div class="ng-interview__header-titles">
                            <span class="ng-section-header__ja">先輩の声</span>
                            <span class="ng-section-header__en" aria-hidden="true">INTERVIEW</span>
                        </div>
                        <div class="ng-interview__nav">
                            <button class="ng-interview__prev is-boundary" aria-label="前のスライド">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 14" aria-hidden="true">
                                    <polygon points="8,1 1,7 8,13" />
                                </svg>
                            </button>
                            <button class="ng-interview__next" aria-label="次のスライド">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 14" aria-hidden="true">
                                    <polygon points="2,1 9,7 2,13" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="swiper ng-interview__swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide ng-interview__slide">
                                <div class="ng-interview__img-wrap">
                                    <a href="#" class="ng-interview__img">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/interview-01.jpg" alt="山本 太郎">
                                    </a>
                                    <div class="ng-interview__counter" aria-hidden="true">
                                        <span class="ng-interview__counter-cur">01</span><span
                                            class="ng-interview__counter-tot">/03</span>
                                    </div>
                                    <a href="#" class="ng-interview__link-btn" aria-label="インタビューを読む">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 12 12" fill="none">
                                            <path
                                                d="M1.49515 0.413717C1.36624 0.419734 1.24499 0.476715 1.1581 0.572123C1.0712 0.667531 1.02576 0.793553 1.03178 0.922463C1.03779 1.05137 1.09477 1.17262 1.19018 1.25951C1.28559 1.34641 1.41161 1.39185 1.54052 1.38583L9.65087 1.01665L0.142847 10.5247C0.0516801 10.6159 0.000462816 10.7395 0.00046289 10.8685C0.000462634 10.9974 0.0516799 11.121 0.142847 11.2122C0.234014 11.3034 0.357664 11.3546 0.486594 11.3546C0.615524 11.3546 0.739173 11.3034 0.83034 11.2122L10.337 1.70552L9.9678 9.81315C9.96188 9.94197 10.0074 10.0679 10.0943 10.1631C10.1812 10.2584 10.3024 10.3153 10.4312 10.3212C10.56 10.3271 10.6859 10.2816 10.7812 10.1947C10.8764 10.1078 10.9333 9.98666 10.9392 9.85784L11.3531 0.762277C11.3582 0.6609 11.342 0.559583 11.3055 0.464861C11.269 0.37014 11.2131 0.284117 11.1413 0.212343C11.0695 0.140568 10.9835 0.0846374 10.8888 0.0481543C10.7941 0.0116716 10.6927 -0.00455191 10.5914 0.000531681L1.49515 0.413717Z"
                                                fill="#191E25" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="ng-interview__quote">
                                    <p class="ng-interview__quote-text ng-interview__quote-main">愚直な積み重ね</p>
                                    <p class="ng-interview__quote-text ng-interview__quote-sub">それこそが成果につながる。</p>
                                </div>
                                <div class="ng-interview__profile">
                                    <p class="ng-interview__name">山本 太郎</p>
                                    <div class="ng-interview__department">
                                        <p class="ng-interview__pos">入社4年目 / 産業革新本部第一部
                                        </p>
                                        <p class="ng-interview__role">シニアアナリスト</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide ng-interview__slide">
                                <div class="ng-interview__img-wrap">
                                    <a href="#" class="ng-interview__img">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/interview-01.jpg" alt="丸山 まつり">
                                    </a>
                                    <div class="ng-interview__counter" aria-hidden="true">
                                        <span class="ng-interview__counter-cur">02</span><span
                                            class="ng-interview__counter-tot">/03</span>
                                    </div>
                                    <div class="ng-interview__link-btn" aria-label="インタビューを読む">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 12 12" fill="none">
                                            <path
                                                d="M1.49515 0.413717C1.36624 0.419734 1.24499 0.476715 1.1581 0.572123C1.0712 0.667531 1.02576 0.793553 1.03178 0.922463C1.03779 1.05137 1.09477 1.17262 1.19018 1.25951C1.28559 1.34641 1.41161 1.39185 1.54052 1.38583L9.65087 1.01665L0.142847 10.5247C0.0516801 10.6159 0.000462816 10.7395 0.00046289 10.8685C0.000462634 10.9974 0.0516799 11.121 0.142847 11.2122C0.234014 11.3034 0.357664 11.3546 0.486594 11.3546C0.615524 11.3546 0.739173 11.3034 0.83034 11.2122L10.337 1.70552L9.9678 9.81315C9.96188 9.94197 10.0074 10.0679 10.0943 10.1631C10.1812 10.2584 10.3024 10.3153 10.4312 10.3212C10.56 10.3271 10.6859 10.2816 10.7812 10.1947C10.8764 10.1078 10.9333 9.98666 10.9392 9.85784L11.3531 0.762277C11.3582 0.6609 11.342 0.559583 11.3055 0.464861C11.269 0.37014 11.2131 0.284117 11.1413 0.212343C11.0695 0.140568 10.9835 0.0846374 10.8888 0.0481543C10.7941 0.0116716 10.6927 -0.00455191 10.5914 0.000531681L1.49515 0.413717Z"
                                                fill="#191E25" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ng-interview__quote">
                                    <p class="ng-interview__quote-text ng-interview__quote-main">人生の分岐点を支える</p>
                                    <p class="ng-interview__quote-text ng-interview__quote-sub">そんなプロになりたい。</p>
                                </div>
                                <div class="ng-interview__profile">
                                    <p class="ng-interview__name">山本 太郎</p>
                                    <div class="ng-interview__department">
                                        <p class="ng-interview__pos">入社4年目 / 産業革新本部第一部
                                        </p>
                                        <p class="ng-interview__role">シニアアナリスト</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide ng-interview__slide">
                                <div class="ng-interview__img-wrap">
                                    <a href="#" class="ng-interview__img">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/interview-01.jpg" alt="飯田 悠生">
                                    </a>
                                    <div class="ng-interview__counter" aria-hidden="true">
                                        <span class="ng-interview__counter-cur">03</span><span
                                            class="ng-interview__counter-tot">/03</span>
                                    </div>
                                    <div class="ng-interview__link-btn" aria-label="インタビューを読む">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 12 12" fill="none">
                                            <path
                                                d="M1.49515 0.413717C1.36624 0.419734 1.24499 0.476715 1.1581 0.572123C1.0712 0.667531 1.02576 0.793553 1.03178 0.922463C1.03779 1.05137 1.09477 1.17262 1.19018 1.25951C1.28559 1.34641 1.41161 1.39185 1.54052 1.38583L9.65087 1.01665L0.142847 10.5247C0.0516801 10.6159 0.000462816 10.7395 0.00046289 10.8685C0.000462634 10.9974 0.0516799 11.121 0.142847 11.2122C0.234014 11.3034 0.357664 11.3546 0.486594 11.3546C0.615524 11.3546 0.739173 11.3034 0.83034 11.2122L10.337 1.70552L9.9678 9.81315C9.96188 9.94197 10.0074 10.0679 10.0943 10.1631C10.1812 10.2584 10.3024 10.3153 10.4312 10.3212C10.56 10.3271 10.6859 10.2816 10.7812 10.1947C10.8764 10.1078 10.9333 9.98666 10.9392 9.85784L11.3531 0.762277C11.3582 0.6609 11.342 0.559583 11.3055 0.464861C11.269 0.37014 11.2131 0.284117 11.1413 0.212343C11.0695 0.140568 10.9835 0.0846374 10.8888 0.0481543C10.7941 0.0116716 10.6927 -0.00455191 10.5914 0.000531681L1.49515 0.413717Z"
                                                fill="#191E25" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ng-interview__quote">
                                    <p class="ng-interview__quote-text ng-interview__quote-main">自ら考え、行動する</p>
                                    <p class="ng-interview__quote-text ng-interview__quote-sub">そして、期待値を超え続ける。</p>
                                </div>
                                <div class="ng-interview__profile">
                                    <p class="ng-interview__name">山本 太郎</p>
                                    <div class="ng-interview__department">
                                        <p class="ng-interview__pos">入社4年目 / 産業革新本部第一部
                                        </p>
                                        <p class="ng-interview__role">シニアアナリスト</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                    CULTURE
                ============================================ -->
            <section class="ng-culture" id="sec03">
                <div class="ng-inner inner">
                    <div class="ng-section-header">
                        <span class="ng-section-header__ja">NEWOLD CAPITALで</span>
                        <span class="ng-section-header__ja">働くということ</span>
                        <span class="ng-section-header__en" aria-hidden="true">OUR CULTURE</span>
                    </div>
                    <div class="ng-culture__list">
                        <div class="ng-culture__item">
                            <div class="ng-culture__item-head">
                                <p class="ng-culture__label">CULTURE 01</p>
                                <h3 class="ng-culture__title">早期から成長できる環境</h3>
                            </div>
                            <p class="ng-culture__text">
                                <span>弊社オリジナルの教育システムを活用し、早期にM&amp;Aアドバイザーとしてキャッチアップいただく体制を整えています。</span>また、自らのソーシングに加え、連携部署のバックアップ体制が整っているため、サポート体制は万全です。
                            </p>
                        </div>
                        <div class="ng-culture__item">
                            <div class="ng-culture__item-head">
                                <p class="ng-culture__label">CULTURE 02</p>
                                <h3 class="ng-culture__title">フラットな組織体制</h3>
                            </div>
                            <p class="ng-culture__text">
                                <span>360度評価やMBOを取り入れ、多角的な目線で評価できる環境</span>を整えています。また、社内では「役職」呼びはせず、座席もフリーアドレスのため、様々なメンバーとすぐにコミュニケーションをとることができ、仕事がしやすい雰囲気です。
                            </p>
                        </div>
                        <div class="ng-culture__item">
                            <div class="ng-culture__item-head">
                                <p class="ng-culture__label">CULTURE 03</p>
                                <h3 class="ng-culture__title">迅速な意思決定</h3>
                            </div>
                            <p class="ng-culture__text">
                                <span>社内外に対して迅速に対応できるよう、メンバーの意識向上と社内連携体制の強化に取り組んでいます。</span>役員陣との距離が近いことも、意思決定のスピードを支える要因の一つです。
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                    FLOW
                ============================================ -->
            <section class="ng-flow" id="sec04">
                <div class="ng-inner inner">
                    <div class="ng-section-header">
                        <span class="ng-section-header__ja">選考の流れ</span>
                        <span class="ng-section-header__en" aria-hidden="true">FLOW</span>
                    </div>
                    <ol class="ng-flow__list">
                        <li class="ng-flow__item">
                            <div class="ng-flow__step">
                                <span class="ng-flow__step-label">STEP</span>
                                <span class="ng-flow__step-num">01</span>
                                <div class="ng-flow__step-triangle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="6" viewBox="0 0 12 6"
                                        fill="none">
                                        <path d="M0 -5.24537e-07L12 0L6 6L0 -5.24537e-07Z" fill="#191E25" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ng-flow__step-text">
                                <div class="ng-flow__label">エントリー</div>
                                <p class="ng-flow__desc">まずは「募集職種」からお申し込みください。</p>
                            </div>
                        </li>
                        <li class="ng-flow__item">
                            <div class="ng-flow__step">
                                <span class="ng-flow__step-label">STEP</span>
                                <span class="ng-flow__step-num">02</span>
                                <div class="ng-flow__step-triangle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="6" viewBox="0 0 12 6"
                                        fill="none">
                                        <path d="M0 -5.24537e-07L12 0L6 6L0 -5.24537e-07Z" fill="#191E25" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ng-flow__step-text">
                                <div class="ng-flow__label">一次面接</div>
                                <p class="ng-flow__desc">まずは「募集職種」からお申し込みください。</p>
                            </div>
                        </li>
                        <li class="ng-flow__item">
                            <div class="ng-flow__step">
                                <span class="ng-flow__step-label">STEP</span>
                                <span class="ng-flow__step-num">03</span>
                                <div class="ng-flow__step-triangle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="6" viewBox="0 0 12 6"
                                        fill="none">
                                        <path d="M0 -5.24537e-07L12 0L6 6L0 -5.24537e-07Z" fill="#191E25" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ng-flow__step-text">
                                <div class="ng-flow__label">二次面接</div>
                                <p class="ng-flow__desc">まずは「募集職種」からお申し込みください。</p>
                            </div>
                        </li>
                        <li class="ng-flow__item">
                            <div class="ng-flow__step">
                                <span class="ng-flow__step-label">STEP</span>
                                <span class="ng-flow__step-num">04</span>
                                <div class="ng-flow__step-triangle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="6" viewBox="0 0 12 6"
                                        fill="none">
                                        <path d="M0 -5.24537e-07L12 0L6 6L0 -5.24537e-07Z" fill="#191E25" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ng-flow__step-text">
                                <div class="ng-flow__label">最終面接</div>
                                <p class="ng-flow__desc">まずは「募集職種」からお申し込みください。</p>
                            </div>
                        </li>
                        <li class="ng-flow__item ng-flow__item--last">
                            <div class="ng-flow__step">
                                <span class="ng-flow__step-label">STEP</span>
                                <span class="ng-flow__step-num">05</span>
                            </div>
                            <div class="ng-flow__step-text">
                                <div class="ng-flow__label">内定</div>
                                <p class="ng-flow__desc">エントリーから内定まで、<br class="sp">通常3〜4週間程度かかります。</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </section>

            <!-- ============================================
                    IMAGE STRIP
                ============================================ -->
            <div class="ng-img-strip" aria-hidden="true">
                <div class="ng-img-strip__track">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip01.jpg" alt="" width="150" height="187">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip02.jpg" alt="" width="150" height="187">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip03.jpg" alt="" width="150" height="187">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip04.jpg" alt="" width="150" height="187">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip01.jpg" alt="" width="150" height="187">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip02.jpg" alt="" width="150" height="187">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip03.jpg" alt="" width="150" height="187">
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/new-graduate/strip04.jpg" alt="" width="150" height="187">
                </div>
            </div>

            <!-- ============================================
                    ENTRY
                ============================================ -->
            <section class="ng-entry">
                <div class="ng-inner inner">
                    <div class="ng-entry__panel">
                        <div class="ng-entry__content">
                            <p class="ng-entry__label">ENTRY</p>
                            <div class="ng-entry__tag">
                                <span class="ng-entry__tag-line" aria-hidden="true"></span>
                                <span class="ng-entry__tag-text">2027年卒積極採用活動中</span>
                                <span class="ng-entry__tag-line ng-entry__tag-line--after"
                                    aria-hidden="true"></span>
                            </div>
                            <p class="ng-entry__desc">私たちと一緒に、<br>日本の中小企業および地域の発展に貢献していきませんか。<br>エントリーお待ちしています。</p>
                        </div>
                        <a href="#" class="ng-entry__btn">
                            <span>2027年卒　ENTRY</span>
                            <span class="ng-entry__btn-arrow"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg"
                                    alt=""></span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- ============================================
                    FAQ
                ============================================ -->
            <section class="ng-faq" id="sec05">
                <div class="ng-inner inner">
                    <div class="ng-section-header">
                        <span class="ng-section-header__ja">よくある質問</span>
                        <span class="ng-section-header__en" aria-hidden="true">FAQ</span>
                    </div>
                    <div class="ng-faq__list">
                        <details class="ng-faq__item" open>
                            <summary class="ng-faq__q">
                                <span class="ng-faq__q-label">Q</span>
                                <span class="ng-faq__q-text">応募にあたり、特定の学部や資格が必要ですか？</span>
                                <span class="ng-faq__icon" aria-hidden="true"></span>
                            </summary>
                            <div class="ng-faq__a">
                                <span class="ng-faq__a-label">A</span>
                                <span
                                    class="ng-faq__a-text">回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                            </div>
                        </details>
                        <details class="ng-faq__item">
                            <summary class="ng-faq__q">
                                <span class="ng-faq__q-label">Q</span>
                                <span class="ng-faq__q-text">選考にはどのくらいの期間がかかりますか？</span>
                                <span class="ng-faq__icon" aria-hidden="true"></span>
                            </summary>
                            <div class="ng-faq__a">
                                <span class="ng-faq__a-label">A</span>
                                <span
                                    class="ng-faq__a-text">回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                            </div>
                        </details>
                        <details class="ng-faq__item">
                            <summary class="ng-faq__q">
                                <span class="ng-faq__q-label">Q</span>
                                <span class="ng-faq__q-text">インターンシップや説明会はありますか？</span>
                                <span class="ng-faq__icon" aria-hidden="true"></span>
                            </summary>
                            <div class="ng-faq__a">
                                <span class="ng-faq__a-label">A</span>
                                <span
                                    class="ng-faq__a-text">回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                            </div>
                        </details>
                        <details class="ng-faq__item">
                            <summary class="ng-faq__q">
                                <span class="ng-faq__q-label">Q</span>
                                <span class="ng-faq__q-text">文系・理系問わず応募できますか？</span>
                                <span class="ng-faq__icon" aria-hidden="true"></span>
                            </summary>
                            <div class="ng-faq__a">
                                <span class="ng-faq__a-label">A</span>
                                <span
                                    class="ng-faq__a-text">回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                            </div>
                        </details>
                        <details class="ng-faq__item">
                            <summary class="ng-faq__q">
                                <span class="ng-faq__q-label">Q</span>
                                <span class="ng-faq__q-text">入社後の研修制度について教えてください。</span>
                                <span class="ng-faq__icon" aria-hidden="true"></span>
                            </summary>
                            <div class="ng-faq__a">
                                <span class="ng-faq__a-label">A</span>
                                <span
                                    class="ng-faq__a-text">回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                            </div>
                        </details>
                        <details class="ng-faq__item">
                            <summary class="ng-faq__q">
                                <span class="ng-faq__q-label">Q</span>
                                <span class="ng-faq__q-text">勤務地はどこになりますか？</span>
                                <span class="ng-faq__icon" aria-hidden="true"></span>
                            </summary>
                            <div class="ng-faq__a">
                                <span class="ng-faq__a-label">A</span>
                                <span
                                    class="ng-faq__a-text">回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                            </div>
                        </details>
                        <details class="ng-faq__item">
                            <summary class="ng-faq__q">
                                <span class="ng-faq__q-label">Q</span>
                                <span class="ng-faq__q-text">選考途中で辞退することはできますか？</span>
                                <span class="ng-faq__icon" aria-hidden="true"></span>
                            </summary>
                            <div class="ng-faq__a">
                                <span class="ng-faq__a-label">A</span>
                                <span
                                    class="ng-faq__a-text">回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。回答が入ります。</span>
                            </div>
                        </details>
                    </div>
                </div>
            </section>

        </div><!-- /.sub-page__section-wrapper -->
    </div><!-- /.sub-page__layout -->

    <section class="ng__cta cta-recruit">
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