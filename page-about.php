<?php get_header(); ?>
<main class="sub-page sub-about">
    <div class="sub-page__hero">
        <div class="sub-page__hero-inner inner">
            <nav class="breadcrumb pc" aria-label="パンくずリスト">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </nav>

            <div class="sub-page__title-wrapper">
                <h1 class="sub-page__title-en sub-page__title-en--90">ABOUT</h1>
                <p class="sub-page__title-ja">NEWOLD CAPITAL <br class="br-title-about">について</p>
            </div>
        </div>
    </div>

    <div class="sub-page__layout sub-page__layout--about inner">
        <!-- PCのみ：左追従ナビ -->
        <aside class="sub-page__side sub-page__side--about" aria-label="ページ内ナビゲーション">
            <nav class="sub-page__nav">
                <ul class="sub-page__nav-list">
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec01">NEWOLD CAPITAL<br>
                            について</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec02">今後の展望</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec03">NEWOLDの取り組み</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec04">代表挨拶</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec05">経営陣紹介</a>
                    </li>
                    <li class="sub-page__nav-item">
                        <a class="sub-page__nav-link" href="#sec06">書籍紹介</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="sub-page__section-wrapper sub-about__section-wrapper">
            <section class="sub-about__section sub-about__about" id="sec01">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <h2 class="sub-page__section-title">NEWOLD CAPITALについて</h2>
                    </div>
                    <div class="sub-about__topics">

                        <!-- 創業理由 -->
                        <div class="sub-about__topic">
                            <div class="sub-about__topic-head">
                                <p class="sub-about__topic-label-en">Reason For Founding</p>
                                <h3 class="sub-about__topic-title">創業理由</h3>
                            </div>
                            <div class="sub-about__topic-body">
                                <p class="sub-about__topic-lead">構造的課題を乗り越え、<br>
                                    本質的成長支援を実現する</p>
                                <div class="sub-about__topic-desc">
                                    <p>
                                        NEWOLD CAPITALの創業メンバーは、長年、大手M&A仲介会社の最前線でM&A支援業務に携わってきました。<br>
                                        その中で、「M&Aという手段だけを提供する環境では、企業の成長戦略支援として本当に十分と言えるのだろうか」という共通の課題意識を持っていました。<br>
                                        現場で経営者の声に向き合う中で実感したのは、M&Aそのものではなく、その先にある企業変革と持続的な成長こそが、経営者の本質的な関心であるということでした。
                                    </p>
                                    <p>
                                        ワンストップで企業変革や成長戦略のご支援ができる会社を作りたい——そんな想いから、2022年6月にNEWOLD CAPITALを創業しました。<br>
                                        「企業・人・地域」の成長を実現し、次世代の幸せを増やすという志のもと、過去の知恵を大切にしながら、新しい未来を切り拓いていく。<br>
                                        私たちは、その架け橋となる存在であり続けます。
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 社名の由来 -->
                        <div class="sub-about__topic">
                            <div class="sub-about__topic-head">
                                <p class="sub-about__topic-label-en">Corporate Name and Logo</p>
                                <h3 class="sub-about__topic-title">社名・ロゴ</h3>
                            </div>
                            <div class="sub-about__topic-body">
                                <p class="sub-about__topic-lead">過去と未来をつなぐ「温故知新」</p>
                                <div class="sub-about__topic-desc">
                                    <p>社名「NEWOLD」には「温故知新」の想いが込められています。過去の知恵（OLD）を大切にしながら、新しい未来（NEW）を切り拓いていくという想いを社名とロゴに込めています。
                                    </p>
                                </div>
                                <div class="sub-about__logo-diagram">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/logo-diagram-pc.jpg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/logo-diagram.jpg"
                                            alt="">
                                    </picture>
                                </div>
                                <div class="sub-about__topic-desc">
                                    <p>上部は「山」を表現し、地域に根ざした企業や人の力、そして長い歴史の中で培われてきた知恵を表しています。<br>
                                        中央は「ビル」を表現し、最先端の知識や人材、資本が集まり、変化を生み出すエネルギーを表しています。<br>
                                        下部の「アーチ」は、繋がりと融合を象徴しています。
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 私たちの志 -->
                        <div class="sub-about__topic">
                            <div class="sub-about__topic-head">
                                <p class="sub-about__topic-label-en">Our Vision</p>
                                <h3 class="sub-about__topic-title">私たちの志</h3>
                            </div>
                            <div class="sub-about__topic-body">
                                <p class="sub-about__topic-lead">「企業・人・地域」の成長を実現し、<br class="pc">
                                    次世代の幸せを増やす</p>
                                <div class="sub-about__topic-desc">
                                    <p>企業の成長を実現することは、働く人の成長につながり、やがて地域全体の活性化へと広がっていくと考えています。当社は企業の成長支援を通じて、その循環を広げ、未来を担う世代の幸せを増やすことを使命としています。
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 私たちの信念 -->
                        <div class="sub-about__topic">
                            <div class="sub-about__topic-head">
                                <p class="sub-about__topic-label-en">Our Belief</p>
                                <h3 class="sub-about__topic-title">私たちの信念</h3>
                            </div>
                            <div class="sub-about__topic-body">
                                <p class="sub-about__topic-lead">期待値を超え続ける<br class="sp">
                                    プロ集団たれ</p>
                                <p class="sub-about__topic-desc">
                                    私たちは、経営者の期待に応えることにとどまらず、常にその一歩先の価値を提供することを信念としています。<br>
                                    誠実な姿勢と確かな専門性を磨き続け、経営者に「任せてよかった」と心から感じていただける存在を目指しています。経営者ご自身がまだ気付いていない選択肢や、想定を超える成果を提示することこそが、真のプロフェッショナルの責務であると考えています。
                                </p>

                                <div class="sub-about__belief-image">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/belief-img.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>

                        <!-- 私たちの価値観 -->
                        <div class="sub-about__topic sub-about__values">
                            <div class="sub-about__topic-head">
                                <p class="sub-about__topic-label-en">Our Values</p>
                                <h3 class="sub-about__topic-title">私たちの価値観</h3>
                            </div>
                            <div class="sub-about__topic-body">
                                <div class="sub-about__topic-desc sub-about__topic-desc--mt0">
                                    <p>私たちの信念は、5つの価値観として日々の業務に落とし込まれています。一人ひとりが「期待値を超える」ことに本気で向き合うプロ集団であり続けること。それが、お客様から長く信頼される存在であるための私たちの揺るぎない姿勢です。
                                    </p>
                                </div>
                                <ul class="sub-about__values-list">
                                    <li class="sub-about__values-item">
                                        <p class="sub-about__values-num">01</p>
                                        <div class="sub-about__values-item-body">
                                            <p class="sub-about__values-en">Performance</p>
                                            <h4 class="sub-about__values-title">期待値以上の成果で応える</h4>
                                        </div>
                                    </li>
                                    <li class="sub-about__values-item">
                                        <p class="sub-about__values-num">02</p>
                                        <div class="sub-about__values-item-body">
                                            <p class="sub-about__values-en">Ownership</p>
                                            <h4 class="sub-about__values-title">責任を持ち、主体的に動く</h4>
                                        </div>
                                    </li>
                                    <li class="sub-about__values-item">
                                        <p class="sub-about__values-num">03</p>
                                        <div class="sub-about__values-item-body">
                                            <p class="sub-about__values-en">Commitment</p>
                                            <h4 class="sub-about__values-title">意思を表明し、成果を出し続ける</h4>
                                        </div>
                                    </li>
                                    <li class="sub-about__values-item">
                                        <p class="sub-about__values-num">04</p>
                                        <div class="sub-about__values-item-body">
                                            <p class="sub-about__values-en">Teamwork</p>
                                            <h4 class="sub-about__values-title">チームで協働し、役割を果たす</h4>
                                        </div>
                                    </li>
                                    <li class="sub-about__values-item">
                                        <p class="sub-about__values-num">05</p>
                                        <div class="sub-about__values-item-body">
                                            <p class="sub-about__values-en">Growth</p>
                                            <h4 class="sub-about__values-title">進化し続ける</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="sub-about__values-images">
                        <div class="swiper sub-about__values-swiper">
                            <div class="swiper-wrapper sub-about__values-images-inner">
                                <?php for ($i = 0; $i < 3; $i++) : // 画像3枚をループ再生できるだけの枚数分複製 ?>
                                <figure class="swiper-slide sub-about__values-image">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/value-01.jpg"
                                        alt="" width="" height="">
                                </figure>
                                <figure class="swiper-slide sub-about__values-image">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/value-02.jpg"
                                        alt="" width="" height="">
                                </figure>
                                <figure class="swiper-slide sub-about__values-image">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/value-03.jpg"
                                        alt="" width="" height="">
                                </figure>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sub-about__section sub-about__vision" id="sec02">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <h2 class="sub-page__section-title">今後の展望</h2>
                    </div>
                    <div class="sub-about__vision-body">
                        <p class="sub-about__topic-lead">「成長実現ファーム」として挑戦し続ける</p>
                        <div class="sub-about__topic-desc">
                            <p>私たちが目指すのは、「成長実現ファーム」としての確立です。<br>
                                M&A実行支援、経営幹部人材紹介、エキスパート活用ソリューション、東南アジアM&A・進出支援と、事業の一つひとつに確かな存在感を持たせ、企業の成長戦略をワンストップで実現できる独自のポジションを築きます。加えて、「企業・人・地域」の成長実現に資する新たな事業も継続的に展開してまいります。
                            </p>
                            <p>
                                お客様の成長を支えるためには、私たち自身が誰よりも成長し続けなければなりません。一人ひとりが学び、挑戦し、進化を重ねる。その積み重ねが、「成長実現ファーム」としての真価を支える原動力です。<br>
                                そして、「THANKS by
                                NEWOLD（未来への再投資）」を通じて、企業や人が歩んできた歴史（OLD）を踏まえ、未来（NEW）へ再投資をすることで、「企業・人・地域」の成長実現の一役を担っていきます。
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sub-about__section sub-about__initiatives" id="sec03">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <h2 class="sub-page__section-title">NEWOLDの取り組み</h2>
                    </div>
                    <div class="sub-about__initiative-list">
                        <div class="sub-about__initiative-card">
                            <div class="sub-about__initiative-content">
                                <p class="sub-about__initiative-label-en">THANKS by NEWOLD </p>
                                <h3 class="sub-about__initiative-title">未来への再投資</h3>
                                <p class="sub-about__initiative-desc">
                                    私たちは、お客様からいただいた報酬の一部を地域や教育機関等に再配分することで、子どもたちや地域を幸せにしていきたいと考えています。<br>
                                    各地域や業界の資源を「報酬」という形でお預かりしている私たちには、それを未来へと繋いでいく責務があります。
                                </p>
                                <div class="sub-about__initiative-image">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/initiative-01-pc.jpg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/initiative-01.jpg"
                                            alt="">
                                    </picture>
                                </div>
                            </div>
                            <div class="sub-about__initiative-movies">
                                <div class="sub-about__initiative-movie">
                                    <div class="sub-about__initiative-movie__thumbnail js-youtube-facade"
                                        data-video-id="sK9V2cw000A">
                                        <img src="https://img.youtube.com/vi/sK9V2cw000A/maxresdefault.jpg" alt=""
                                            width="480" height="360">
                                        <div class="sub-about__movie-play">
                                            <button class="sub-about__movie-play-button" type="button"
                                                aria-label="動画を再生">
                                                <span
                                                    class="sub-about__movie-play-text top-movie__play-text">PLAY</span>
                                                <div class="sub-about__movie-play-icon top-movie__play-icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/youtube-black.svg"
                                                        alt="YouTubeのアイコン">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="sub-about__initiative-movie">
                                    <div class="sub-about__initiative-movie__thumbnail js-youtube-facade"
                                        data-video-id="UtKOjyCe6AA">
                                        <img src="https://img.youtube.com/vi/UtKOjyCe6AA/maxresdefault.jpg" alt=""
                                            width="480" height="360">
                                        <div class="sub-about__movie-play">
                                            <button class="sub-about__movie-play-button" type="button"
                                                aria-label="動画を再生">
                                                <span
                                                    class="sub-about__movie-play-text top-movie__play-text">PLAY</span>
                                                <div class="sub-about__movie-play-icon top-movie__play-icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/youtube-black.svg"
                                                        alt="YouTubeのアイコン">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sub-about__initiative-card">
                            <div class="sub-about__initiative-content">
                                <p class="sub-about__initiative-label-en">M&amp;A eラーニングサービス</p>
                                <h3 class="sub-about__initiative-title">NEWOLD ABLE</h3>
                                <div class="sub-about__initiative-able-wrapper">
                                    <figure class="sub-about__initiative-image sub-about__initiative-image--able">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/initiative-02.jpg"
                                            alt="">
                                    </figure>
                                    <div class="sub-about__initiative-able-body">
                                        <p class="sub-about__initiative-desc sub-about__initiative-desc--able">
                                            NEWOLD ABLEは、M&Aを正しく学び、より身近に感じていただくための教育コンテンツです。<br>
                                            約100本のアニメーション動画と「M&A辞書」を無料で提供し、基礎から実務までをサポートします。
                                        </p>
                                        <a href="https://able.newold.co.jp/" target="_blank"
                                            class="sub-about__initiative-link right-up-button">
                                            <span class="sub-about__initiative-link-text">詳細はこちら</span>
                                            <div class="right-up-button__arrow">
                                                <span class="sub-about__initiative-link-icon right-up-button__icon">
                                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg"
                                                        alt="右向き矢印アイコン" />
                                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg"
                                                        alt="右向き矢印アイコン" />
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sub-about__section sub-about__ceo" id="sec04">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <h2 class="sub-page__section-title">代表挨拶</h2>
                    </div>
                    <div class="sub-about__ceo-body">
                        <div class="sub-about__ceo-info">
                            <figure class="sub-about__ceo-image">
                                <picture>
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/ceo-pc.jpg">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/ceo-sp.jpg"
                                        alt="代表取締役 栗原弘行">
                                </picture>
                            </figure>
                            <div class="sub-about__ceo-meta">
                                <div class="sub-about__ceo-meta-inner">
                                    <p class="sub-about__ceo-name">栗原 弘行</p>
                                    <p class="sub-about__ceo-name-en">Hiroyuki Kurihara</p>
                                    <p class="sub-about__ceo-role">代表取締役CEO</p>
                                </div>
                            </div>
                        </div>
                        <div class="sub-about__ceo-message">
                            <h3>貴方の情熱、経験、知識、人脈の全てをお客様の成長実現と自己実現に繋げませんか？</h3>
                            <p>当社は、「企業・人・地域の成長を実現し、次世代の幸せを増やす」という志を実現させるために、M&A（国内・東南アジア）、経営人材紹介、プロ人材の活用事業を行なっています。
                            </p>
                            <p>中堅中小企業の成長を実現することで、その地域に雇用が生まれ、働く従業員の生活水準が上がり、地域が活性化すると考えています。そして、それらの経済効果が未来を担う次世代の子どもたちに循環され、結果的に、日本の未来を明るくすると考えています。
                            </p>
                            <p>我々は、日々、様々な業界、規模の経営者の方とお話をさせていただいています。<br>
                                百戦錬磨の経営者の方から信頼していただくことは、とても難しいことです。</p>
                            <p>我々は、経営者の方から信頼されるための努力を常にできる方、自ら考え、学び、行動し、素直に成長し続ける方を求めています。<br>
                                未経験者であっても自らの努力次第でキャッチアップしていただくことは十分可能です。</p>
                            <p>当社は、『人』が唯一の資産です。<br>
                                入社いただいた方に成長していただくことでしか、会社は成長できません。<br>
                                したがって、貴方が成長したいという意欲を持ち、努力し続ける限りは、会社としても本気で向き合い続けます。</p>
                            <p>当社の、志、信念、価値観をぜひご覧ください。<br>
                                企業の成長を実現するという最高峰の仕事を一緒に楽しみましょう！</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sub-about__section sub-about__members" id="sec05">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <h2 class="sub-page__section-title">経営陣紹介</h2>
                    </div>
                    <ul class="sub-about__member-list">
                        <li class="sub-about__member-item">
                            <figure class="sub-about__member-image">
                                <picture>
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-01-pc.jpg">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-01.jpg"
                                        alt="塚田 壮一朗">
                                </picture>
                            </figure>
                            <div class="sub-about__member-info">
                                <div class="sub-about__member-name-block">
                                    <p class="sub-about__member-name">塚田 壮一朗</p>
                                    <p class="sub-about__member-name-en">Soichiro Tsukada</p>
                                </div>
                                <p class="sub-about__member-role">共同創業者 /<br class="sp"> 取締役COO</p>
                            </div>
                            <p class="sub-about__member-message">
                                これからの日本は、どうあるべきでしょうか。<br>
                                人口減少、後継者不足、産業構造の変化など多くの課題が存在する一方で、世界に誇る技術やサービス、地域資源も数多く存在しています。<br>
                                今を生きる私たちには、その価値を次の時代へ繋ぎ、変化を生み出す責任があります。<br>
                                当社は、M&A、人材ビジネス、海外進出、投資などを通じて企業の成長を支え、雇用や産業を生み出し、地域が発展する循環を創り続けます。<br>
                                私が求めるのは、与えられた仕事をこなす人ではなく、自ら考え、動き、「変化をつくる側」に立ちたい人です。<br>当社では多くの挑戦が待っています。それを機会と捉え、日本と自らの未来を重ねながら、本気で成長したい人と共に歩んでいきたいと思っています。
                            </p>
                            <!-- <a href="#" class="sub-about__member-link right-up-button">
                                <span class="sub-about__member-link-text">インタビューを見る(聴く)</span>
                                <div class="right-up-button__arrow">
                                    <span class="sub-about__member-link-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-black.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a> -->
                        </li>
                        <li class="sub-about__member-item">
                            <figure class="sub-about__member-image">
                                <picture>
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-02-pc.jpg">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-02.jpg"
                                        alt="大野 智明">
                                </picture>
                            </figure>
                            <div class="sub-about__member-info">
                                <div class="sub-about__member-name-block">
                                    <p class="sub-about__member-name">大野 智明</p>
                                    <p class="sub-about__member-name-en">Tomoaki Ohno</p>
                                </div>
                                <p class="sub-about__member-role"> 取締役CSO</p>
                            </div>
                            <p class="sub-about__member-message">
                                私たちは、「企業の未来をつくる成長支援」に本気で向き合っています。<br>
                                当社は、経験や年次に関係なく、挑戦したいという想いを持つ仲間に、多くの機会と裁量を提供する環境が整っています。<br>
                                そうした環境の中で、私自身も国内M&Aの実行支援にとどまらず、「東南アジアM&A・進出支援事業」を立ち上げました。一人ひとりの挑戦が新たな機会を生み、それが企業の成長を、ひいては地域や産業の未来を支える力になっていくと考えています。こうした好循環を実現したいと思っています。<br>
                                国内外の垣根無く成長する企業を仲間と共に創っていきたい。そんな想いに共感してくださる方と、一緒に挑戦できることを楽しみにしています。
                            </p>
                        </li>
                        <li class="sub-about__member-item">
                            <figure class="sub-about__member-image">
                                <picture>
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-03-pc.jpg">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-03.jpg"
                                        alt="岩木 保樹">
                                </picture>
                            </figure>
                            <div class="sub-about__member-info">
                                <div class="sub-about__member-name-block">
                                    <p class="sub-about__member-name">岩木 保樹</p>
                                    <p class="sub-about__member-name-en">Yasuki Iwaki</p>
                                </div>
                                <p class="sub-about__member-role">取締役CQO</p>
                            </div>
                            <p class="sub-about__member-message">
                                当社は、M&Aや人材紹介を通じて、多くの経営者や企業の未来に向き合っています。<br>
                                その中で私たちが大切にしているのは、目の前の成果だけではなく、「この会社に任せて良かった」と思っていただける仕事を積み重ねることです。私自身、単に知識や経験がある人よりも、相手に真摯に向き合い、自ら考え、より良い仕事を追求できる人と一緒に働きたいと思っています。<br>
                                成長途中の組織だからこそ、一人ひとりの挑戦や提案が、会社を大きく変えていきます。<br>
                                高い基準を持ちながらも、失敗を恐れず挑戦できる。そんな環境で、自分自身も成長させながら、日本の未来を支える仕事に本気で向き合いたい方と、お会いできることを楽しみにしています。
                            </p>
                        </li>
                        <li class="sub-about__member-item">
                            <figure class="sub-about__member-image">
                                <picture>
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-04-pc.jpg">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/member-04.jpg"
                                        alt="冨田 誠">
                                </picture>
                            </figure>
                            <div class="sub-about__member-info">
                                <div class="sub-about__member-name-block">
                                    <p class="sub-about__member-name">冨田 誠</p>
                                    <p class="sub-about__member-name-en">Makoto Tomita</p>
                                </div>
                                <p class="sub-about__member-role">取締役CFO</p>
                            </div>
                            <p class="sub-about__member-message">
                                当社のCFOとして私が大切にしているのは、人が育ち、事業が育つための「土壌を作る」ことです。<br>
                                この豊かな土壌があってこそ、私たちの志である『「企業・人・地域」の成長を実現し、次世代の幸せを増やす』ことができると考えています。
                                そして、この志における「人」には、他ならぬ自分自身も含まれています。
                                まずは自らが成長し、幸せになること。その姿勢こそが豊かな土壌となり、周囲へ良い影響を与えながら、次世代へ渡す最高のバトンになると信じています。<br>
                                この志を共有し、自らの人生と社会の成長を重ね合わせながら、共に挑戦し続けていける方と、一緒に働けることを楽しみにしています。 </p>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="sub-about__section sub-about__books" id="sec06">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <h2 class="sub-page__section-title">書籍紹介</h2>
                    </div>
                    <?php
                    $books = [];

                    for ($i = 1; $i <= 5; $i++) {
                        $num = sprintf('%02d', $i);

                        $image_id = get_field('about_book_image_' . $num);
                        $title    = get_field('about_book_title_' . $num);
                        $author   = get_field('about_book_author_' . $num);

                        if ($image_id || $title || $author) {
                            $books[] = [
                                'image_id' => $image_id,
                                'title'    => $title,
                                'author'   => $author,
                            ];
                        }
                    }
                    ?>

                    <?php if (!empty($books)) : ?>
                    <ul class="sub-about__book-list">
                        <?php foreach ($books as $book) : ?>
                        <li class="sub-about__book-item">
                            <?php if (!empty($book['image_id'])) : ?>
                            <figure class="sub-about__book-cover">
                                <?php
                                            echo wp_get_attachment_image(
                                                $book['image_id'],
                                                'medium',
                                                false,
                                                [
                                                    'alt' => !empty($book['title']) ? esc_attr($book['title']) : '',
                                                ]
                                            );
                                            ?>
                            </figure>
                            <?php endif; ?>

                            <div class="sub-about__book-info">
                                <?php if (!empty($book['title'])) : ?>
                                <h3 class="sub-about__book-title">
                                    <?php echo esc_html($book['title']); ?>
                                </h3>
                                <?php endif; ?>

                                <?php if (!empty($book['author'])) : ?>
                                <p class="sub-about__book-author">
                                    <?php echo esc_html($book['author']); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                </div>
            </section>

        </div>
    </div>

    <!-- CTA -->
    <section class="sub-about__cta cta-recruit">
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
                        <a class="cta-recruit__button button-anchor" href="https://hrmos.co/pages/newold"
                            target="_blank" rel="noopener noreferrer">
                            <span class="cta-recruit__button-text">募集職種を確認する</span>
                            <div class="cta-recruit__button-arrow">
                                <span class="cta-recruit__button-icon button-anchor__icon">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg"
                                        alt="→">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg"
                                        alt="→">
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
                        <a class="cta-recruit__button button-anchor" href="https://hrmos.co/pages/newold/jobs/0000001"
                            target="_blank" rel="noopener noreferrer">
                            <span class="cta-recruit__button-text">面談を希望する</span>
                            <div class="cta-recruit__button-arrow">
                                <span class="cta-recruit__button-icon button-anchor__icon">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg"
                                        alt="→">
                                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-green.svg"
                                        alt="→">
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