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
                                <h2 class="sub-page__section-title">カジュアル面談</h2>
                            </div>

                            <p class="sub-recruitment__interview-lead">
                                まずはカジュアルに<br>
                                話をしてみませんか？
                            </p>

                            <p class="sub-recruitment__interview-description">
                                私たちNEWOLD CAPITALが皆さまの求めている環境なのか、力を発揮いただけるのかなど、ズレを生まないために、カジュアルにお話しする場をご用意しています。
                            </p>

                            <div class="sub-recruitment__interview-action">
                                <a href="https://hrmos.co/pages/newold/jobs/0000001" target="_blank" rel="noopener noreferrer" class="sub-recruitment__interview-button button-anchor">
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
                        <h2 class="sub-page__section-title">募集職種一覧</h2>
                    </div>
                    <div class="sub-recruitment__entry-content">
                        <div class="sub-recruitment__entry-top">
                            <p class="sub-recruitment__entry-label">Entry</p>
                            <p class="sub-recruitment__entry-text">
                                NEWOLD CAPITALでは積極的に採用を行なっています。<br>
                                エントリーお待ちしています。
                            </p>
                        </div>

                        <ul class="sub-recruitment__entry-list">
                            <li class="sub-recruitment__entry-item">
                                <a href="https://hrmos.co/pages/newold/jobs?category=2161342350921977857" target="_blank" rel="noopener noreferrer" class="sub-recruitment__entry-link right-up-button"
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
                                <a href="https://hrmos.co/pages/newold/jobs?category=2161342350921977858" target="_blank" rel="noopener noreferrer" class="sub-recruitment__entry-link right-up-button"
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
                        <h2 class="sub-page__section-title">採用フロー</h2>
                    </div>

                    <div class="sub-recruitment__flow-content">
                        <div class="sub-recruitment__flow-duration">
                            <p class="sub-recruitment__flow-duration-text">約1か月程度</p>
                        </div>

                        <ol class="sub-recruitment__flow-list">
                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP 01</span>
                                    <h3 class="sub-recruitment__flow-item-title">エントリー</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">まずは「募集職種」からお申し込みください。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP 02</span>
                                    <h3 class="sub-recruitment__flow-item-title">一次面接</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">人事による面接を実施します。Web面接も可能です。<br>一次面接前にWebにて適性検査①を受検いただきます。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP 03</span>
                                    <h3 class="sub-recruitment__flow-item-title">二次面接</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">事業部長による面接を行なう予定です。Web面接も可能です。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP 04</span>
                                    <h3 class="sub-recruitment__flow-item-title">最終面接</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">役員による面接を実施します。原則、対面面接です。<br>最終面接前にWebにて適性検査②を受検いただきます。</p>
                            </li>

                            <li class="sub-recruitment__flow-item">
                                <div class="sub-recruitment__flow-item-head">
                                    <span class="sub-recruitment__flow-item-step">STEP 05</span>
                                    <h3 class="sub-recruitment__flow-item-title">内定</h3>
                                </div>
                                <p class="sub-recruitment__flow-item-text">エントリーから内定まで、通常3〜4週間程度かかります。</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="sub-recruitment__section sub-recruitment-faq" id="sec04">
                <div class="sub-page__section-inner inner">
                    <div class="sub-page__section-heading">
                        <h2 class="sub-page__section-title">よくある質問</h2>
                    </div>

                    <div class="sub-recruitment-faq__list">
                        <details class="sub-recruitment-faq__item" open>
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    研修や教育体制について教えてください。
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        約1か月間の入社時研修からスタートし、その後正式配属予定です。配属後は、等級別の定期的なロールプレイングテストや成約事例研修、中小M&A資格試験対策に関する学習支援など、継続的に成長できる教育体制を整えています。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    入社後の配属先はどのように決まりますか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        ご本人の希望と適性を総合的に考慮したうえで、最終的な配属先を決定します。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    テレアポにノルマはありますか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        ノルマは設けていません。ただし、最終目標の達成に向けて、案件状況に応じた月次のKPIを設定しています。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    何名体制のチームですか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        1部署あたり約5名で構成されています。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    今後、新規事業展開の予定はありますか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        はい、あります。当社の志や信念に合致する事業領域については、積極的に新規事業の立ち上げを検討しています。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    新卒入社の社員に求められるスキル・能力は何ですか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        特定のスキルや能力は求めていません。一方で、主体的に行動できること、素直に学ぶ姿勢があること、そして誠実に物事へ向き合えることは、M&Aアドバイザーやエージェントコンサルタントとして活躍するうえで重要な資質だと考えています。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    活躍している社員の特徴を教えてください。
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        物事を前向きに捉え、自らの行動を振り返りながら改善を続けられる人が活躍しています。また、困難な状況でも粘り強く物事に取り組む力があり、高い成長意欲を持ちながらも、謙虚な姿勢で物事を受け止められる力があることも共通する特徴です。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    どのような社風ですか？また、どのような社員が多いですか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        高い成果を出したメンバーやプロジェクトを賞賛する文化があり、個人はもちろんですが、チームで成果を出すことに喜びを感じる社員が多く在籍しています。また、分からないことはすぐに上司や先輩に相談できる環境が整っています。互いに教え合う文化で、風通しが良く、コミュニケーションが活発な職場です。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    事前に取得しておくべき資格はありますか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        入社前までに日商簿記2級の取得を必須としています。既に取得されている方は、マイクロソフト オフィス スペシャリスト（MOS）の取得を推奨しています。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    M&Aアドバイザーのやりがいを教えてください。
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        経営者の人生の節目となる重要な意思決定の場面に寄り添い、会社や雇用、技術の承継に貢献できることです。また、財務・法務・労務など幅広い専門性を活かしながら、譲渡企業様・譲受企業様双方に最良の着地点を導く達成感も大きな魅力の一つです。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    キャリアアップのイメージを知りたいです。
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        まずは1人で案件の対応が十分にできるレベル（アソシエイトポジション）を目指していただきます。その後は、所属部門でマネジメント職への昇進や、他部署への異動によるスキルアップなど、多様なキャリアパスがあります。将来的には、新規事業責任者や投資先企業の役員など、さらにキャリアアップを目指すことも可能です。
                                    </p>
                                </div>
                            </div>
                        </details>

                        <details class="sub-recruitment-faq__item">
                            <summary class="sub-recruitment-faq__question">
                                <span class="sub-recruitment-faq__icon" aria-hidden="true">Q</span>
                                <span class="sub-recruitment-faq__question-text">
                                    初成約までにどのくらいの期間がかかりますか？
                                </span>
                            </summary>
                            <div class="sub-recruitment-faq__answer">
                                <div class="sub-recruitment-faq__answer-inner">
                                    <span class="sub-recruitment-faq__icon sub-recruitment-faq__icon--answer"
                                        aria-hidden="true">A</span>
                                    <p class="sub-recruitment-faq__answer-text">
                                        M&A実行支援事業においては、約7～8か月ほどです。経営幹部人材紹介事業においては、約3～4か月ほどです。
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
</main>
<?php get_footer(); ?>