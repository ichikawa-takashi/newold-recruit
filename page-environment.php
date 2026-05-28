<?php get_header(); ?>
<main class="sub-page">
        <div class="sub-page__hero">
            <div class="sub-page__hero-inner inner">
                <nav class="breadcrumb pc" aria-label="パンくずリスト">
                    <?php if (function_exists('bcn_display')) { bcn_display(); } ?>
                </nav>

                <div class="sub-page__title-wrapper">
                    <h1 class="sub-page__title-en sub-page__title-en--90">Environment</h1>
                    <p class="sub-page__title-ja">働く環境を知る</p>
                </div>
            </div>
        </div>

        <div class="sub-page__layout sub-page__layout--environment inner">
            <!-- PCのみ：左追従ナビ -->
            <aside class="sub-page__side sub-page__side--environment" aria-label="ページ内ナビゲーション">
                <nav class="sub-page__nav">
                    <ul class="sub-page__nav-list">
                        <li class="sub-page__nav-item">
                            <a class="sub-page__nav-link" href="#sec01">キャリアステップ</a>
                        </li>
                        <li class="sub-page__nav-item">
                            <a class="sub-page__nav-link" href="#sec02">教育研修制度 / フォロー制度</a>
                        </li>
                        <li class="sub-page__nav-item">
                            <a class="sub-page__nav-link" href="#sec03">福利厚生・制度</a>
                        </li>
                        <li class="sub-page__nav-item">
                            <a class="sub-page__nav-link" href="#sec04">数字で見るNEWOLD</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <div class="sub-page__section-wrapper sub-environment__section-wrapper">

                <section class="sub-environment__section sub-environment__career" id="sec01">
                    <div class="sub-environment__section-inner inner">
                        <div class="sub-page__section-heading">
                            <p class="sub-page__section-number">〔01〕</p>
                            <h2 class="sub-page__section-title">キャリアステップ</h2>
                        </div>
                        <p class="sub-environment__career-lead">企業や人の成長を支援し、自身の成長に繋がる</p>
                        <p class="sub-environment__career-desc">
                            お客様の成長実現を支援するなかでご自身の経験が積み重なっていくのはもちろん、<br class="pc">結果として更なるプロフェッショナル人材と成長していきます。<br>
                            そして、当社の業態だからこその強みを活かし、当社内でのキャリアステップだけでなく、買収先や投資先での責任者、<br
                                class="pc">ご自身の起業支援など幅広い可能性を提供できます。</p>

                        <div class="sub-environment__career-diagram">
                            <p class="sub-environment__career-vision-label">キャリアビジョンイメージ</p>
                            <div class="sub-environment__career-flow">
                                <div class="sub-environment__career-tier sub-environment__career-tier--dark">
                                    <p class="sub-environment__career-tier-heading">成長実現の支援</p>
                                    <ul class="sub-environment__career-tier-list">
                                        <li class="sub-environment__career-tier-item">M&amp;A<br>アドバイザー</li>
                                        <li class="sub-environment__career-tier-item">リクルーティング<br>アドバイザー</li>
                                    </ul>
                                </div>
                                <div class="sub-environment__career-arrow" aria-hidden="true"></div>
                                <div class="sub-environment__career-tier sub-environment__career-tier--dark">
                                    <p class="sub-environment__career-tier-heading">自身のキャリアも広がる</p>
                                    <ul class="sub-environment__career-tier-list">
                                        <li class="sub-environment__career-tier-item">マネジメント<br>プロフェッショナル</li>
                                        <li class="sub-environment__career-tier-item">グロース<br>アドバイザー</li>
                                    </ul>
                                </div>
                                <div class="sub-environment__career-arrow" aria-hidden="true"></div>
                                <div class="sub-environment__career-tier sub-environment__career-tier--brown">
                                    <p class="sub-environment__career-tier-heading">キャリアの可能性</p>
                                    <ul class="sub-environment__career-tier-list">
                                        <li class="sub-environment__career-tier-item">当社経営陣<br>or 社内専門家</li>
                                        <li class="sub-environment__career-tier-item">ファンド投資担当<br>投資先CxO / サーチャーVC</li>
                                        <li class="sub-environment__career-tier-item">買収先子会社社長</li>
                                        <li class="sub-environment__career-tier-item">当社出資における起業<br>起業支援</li>
                                        <li class="sub-environment__career-tier-item">コーポレート部門に<br>おける責任者</li>
                                        <li class="sub-environment__career-tier-item">新規事業責任者</li>
                                    </ul>
                                </div>
                            </div>
                            <img class="sub-environment__career-deco pc" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/career-deco.svg" alt=""
                                aria-hidden="true">
                        </div>
                    </div>
                </section>

                <section class="sub-environment__section sub-environment__training" id="sec02">
                    <div class="sub-environment__section-inner inner">
                        <div class="sub-page__section-heading">
                            <p class="sub-page__section-number">〔02〕</p>
                            <h2 class="sub-page__section-title">教育研修制度 / フォロー制度</h2>
                        </div>

                        <ol class="sub-environment__training-list">
                            <li class="sub-environment__training-item">
                                <div class="sub-environment__training-marker">
                                    <span class="sub-environment__training-timing">入社初週</span>
                                </div>
                                <div class="sub-environment__training-content">
                                    <div class="sub-environment__training-block">
                                        <h3 class="sub-environment__training-title">入社時研修</h3>
                                        <p class="sub-environment__training-text">
                                            入社後１ヶ月間にわたり、弊社オリジナルの教育システムを使用した研修を受講いただきます。<br>必要知識のインプットとアウトプットを繰り返し、着実に必須となる基礎知識を習得いただきます。
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="sub-environment__training-item">
                                <div class="sub-environment__training-marker">
                                    <span class="sub-environment__training-timing">入社1〜5ヶ月</span>
                                </div>
                                <div class="sub-environment__training-content">
                                    <div class="sub-environment__training-block">
                                        <h3 class="sub-environment__training-title">入社後面談</h3>
                                        <p class="sub-environment__training-text">入社１ヶ月、３ヶ月、５ヶ月後に役員との1on1面談がございます。</p>
                                    </div>
                                </div>
                            </li>

                            <li class="sub-environment__training-item">
                                <div class="sub-environment__training-marker">
                                    <span class="sub-environment__training-timing">適宜実施</span>
                                </div>
                                <div
                                    class="sub-environment__training-content sub-environment__training-content--double">
                                    <div class="sub-environment__training-block">
                                        <h3 class="sub-environment__training-title">職位別研修</h3>
                                        <p class="sub-environment__training-text">
                                            月一でアナリスト、アソシエイトなど職位に応じた専門研修を受講いただきます。<br>時には外部講師や譲渡オーナーから、より専門的で成長できる研修内容を準備しています。
                                        </p>
                                    </div>
                                    <div class="sub-environment__training-block">
                                        <h3 class="sub-environment__training-title">上長との1on1</h3>
                                        <p class="sub-environment__training-text">
                                            必要に応じて1on1を実施しています。<br>日々の業務内容での不明点や悩み事などを解消する場として活用いただいています。</p>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </section>

                <section class="sub-environment__section sub-environment__welfare" id="sec03">
                    <div class="sub-environment__section-inner inner">
                        <div class="sub-page__section-heading">
                            <p class="sub-page__section-number">〔03〕</p>
                            <h2 class="sub-page__section-title">福利厚生・制度</h2>
                        </div>

                        <ul class="sub-environment__welfare-list">
                            <li class="sub-environment__welfare-item">
                                <h3 class="sub-environment__welfare-title">各種保険</h3>
                                <p class="sub-environment__welfare-text">健康保険、厚生年金、企業年金基金、雇用保険を完備しています。</p>
                            </li>
                            <li class="sub-environment__welfare-item">
                                <h3 class="sub-environment__welfare-title">交通費</h3>
                                <p class="sub-environment__welfare-text">上限30,000円/月を支給しています。</p>
                            </li>
                            <li class="sub-environment__welfare-item">
                                <h3 class="sub-environment__welfare-title">産休/育休制度</h3>
                                <p class="sub-environment__welfare-text">その他にも、育児短期間利用勤務も可能です。</p>
                            </li>
                            <li class="sub-environment__welfare-item">
                                <h3 class="sub-environment__welfare-title">資格取得補助制度</h3>
                                <p class="sub-environment__welfare-text">XXXXやXXXXXなどの資格取得を支援しています。</p>
                            </li>
                            <li class="sub-environment__welfare-item">
                                <h3 class="sub-environment__welfare-title">慶弔見舞金</h3>
                                <p class="sub-environment__welfare-text">
                                    この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
                            </li>
                            <li class="sub-environment__welfare-item">
                                <h3 class="sub-environment__welfare-title">定期健康診断</h3>
                                <p class="sub-environment__welfare-text">年に1回、健康診断を実施。人間ドッグの補助も行っています。</p>
                            </li>
                            <li class="sub-environment__welfare-item">
                                <h3 class="sub-environment__welfare-title">インフルエンザ<br>予防接種補助金</h3>
                                <p class="sub-environment__welfare-text">
                                    この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="sub-environment__section sub-environment__stats" id="sec04">
                    <div class="sub-environment__section-inner inner">
                        <div class="sub-page__section-heading">
                            <p class="sub-page__section-number">〔04〕</p>
                            <h2 class="sub-page__section-title">数字で見るNEWOLD</h2>
                        </div>

                        <!-- NEWOLD CAPITAL全体 -->
                        <div class="sub-environment__stats-group">
                            <h3 class="sub-environment__stats-group-heading">NEWOLD CAPITAL全体</h3>
                            <ul class="sub-environment__stats-list">
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-01-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-01.svg" alt="平均年齢32歳">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-02-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-02.svg" alt="男女比率6:4">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-03-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-03.svg" alt="新卒・中途入社比率87%:13%">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-04-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-04.svg" alt="未経験者の割合75%">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-05-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-05.svg" alt="職種の割合フロント職75%・ミドルバック職25%">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-06-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-06.svg" alt="有給休暇消化率75%">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item sub-environment__stats-item--wide">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-07-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-capital-07.svg" alt="出身業界の割合">
                                    </picture>
                                </li>
                            </ul>
                        </div>

                        <!-- NEWOLD M&A -->
                        <div class="sub-environment__stats-group">
                            <h3 class="sub-environment__stats-group-heading">NEWOLD M&amp;A</h3>
                            <ul class="sub-environment__stats-list">
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-01-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-01.svg" alt="累計成約件数32件">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-02-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-02.svg" alt="仲介業種内訳">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-03-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-03.svg" alt="ご依頼から成約までの最短期間1.4ヶ月">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-04-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-04.svg" alt="成約平均期間1.4ヶ月">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-05-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-05.svg" alt="初成約までの期間1.4ヶ月">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-06-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-06.svg" alt="最短昇格年数1.4ヶ月">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-07-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-07.svg" alt="資格者数75%">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-08-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-08.svg" alt="年齢割合">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-09-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-09.svg" alt="役職者平均年齢32歳">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-10-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-10.svg" alt="お客様からの評価9.2/10">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-11-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-11.svg" alt="平均年収1,800万円">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-12-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-ma-12.svg" alt="最多インセンティブ額300万円">
                                    </picture>
                                </li>
                            </ul>
                        </div>

                        <!-- NEWOLD Agent -->
                        <div class="sub-environment__stats-group">
                            <h3 class="sub-environment__stats-group-heading">NEWOLD Agent</h3>
                            <ul class="sub-environment__stats-list sub-environment__stats-list--agent">
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-01-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-01.svg" alt="年齢割合">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-02-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-02.svg" alt="未経験者の割合75%">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-03-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-03.svg" alt="最年少コンサルタント32歳">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-04-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-04.svg" alt="男女比率6:4">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-05-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-05.svg" alt="初成約までの期間1.4ヶ月">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-06-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-06.svg" alt="平均年収1,200万円">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item sub-environment__stats-item--half">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-07-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-07.svg" alt="ハイクラス求人100%">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item sub-environment__stats-item--half">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-08-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-agent-08.svg" alt="インセンティブ率50%">
                                    </picture>
                                </li>
                            </ul>
                        </div>

                        <!-- NEWOLD Exparts -->
                        <div class="sub-environment__stats-group">
                            <h3 class="sub-environment__stats-group-heading">NEWOLD Exparts</h3>
                            <ul class="sub-environment__stats-list">
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-01-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-01.svg" alt="担当者の平均プロジェクト数32件">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-02-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-02.svg" alt="プロジェクトの平均期間1.4ヶ月">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-03-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-03.svg" alt="顧客紹介割合">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-04-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-04.svg" alt="経営課題内訳">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-05-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-05.svg" alt="企業規模感">
                                    </picture>
                                </li>
                                <li class="sub-environment__stats-item">
                                    <picture>
                                        <source media="(min-width: 768px)"
                                            srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-06-pc.svg">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/environment/stat-exparts-06.svg" alt="1年間で出会える人数">
                                    </picture>
                                </li>
                            </ul>
                        </div>

                    </div>
                </section>

            </div>
        </div>

        <section class="sub-environment__cta cta-recruit">
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
