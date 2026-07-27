<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <span class="bg-grid"></span>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="header__logo--common" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/logo.svg" alt="NEWOLD CAPITAL">
                    <span class="header__logo-text">Recruiting Site</span>
                </a>
                <span class="header__logo-text--new-graduate pc">Recruiting Information</span>
            </h1>
            <div class="header__right">
                <ul class="header__sns">
                    <li class="header__sns-link header__nav-sns-link--instagram"><a href="https://www.instagram.com/newoldcapital.official" target="_blank" rel="noopener">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/insta-gray.svg" alt="Instagram">
                        </a></li>
                    <li class="header__sns-link header__nav-sns-link--youtube"><a href="https://www.youtube.com/@newoldcapital" target="_blank" rel="noopener">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/youtube-gray.svg" alt="YouTube">
                        </a></li>
                </ul>
                <div class="header__nav-wrapper">
                    <nav class="header__nav">
                        <ul class="header__nav-list">
                            <li class="header__nav-item">
                                <a href="<?php echo esc_url(home_url('/new-graduate/')); ?>">新卒採用</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="<?php echo esc_url(home_url('/recruitment/')); ?>">中途採用</a>
                            </li>
                            <li class="header__nav-item header__nav-item--casual">
                                <a href="https://hrmos.co/pages/newold/jobs/0000001" target="_blank" rel="noopener noreferrer">カジュアル面談</a>
                            </li>
                        </ul>
                    </nav>
                    <button class="header__hamburger js-hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="header__drawer js-drawer" data-lenis-prevent>
        <div class="header__drawer-inner">
                    <div class="header__drawer-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/logo-header.svg" alt="NEWOLD CAPITAL">
                        </a>
                    </div>
                    <div class="header__drawer-content">
                        <nav class="header__drawer-nav">
                            <ul class="header__drawer-list">
                                <li class="header__drawer-item">
                                    <a href="<?php echo esc_url(home_url('/about/')); ?>">
                                        <span class="header__drawer-item-en">About</span>
                                        <span class="header__drawer-item-ja">NEWOLD CAPITALについて</span>
                                    </a>
                                </li>
                                <li class="header__drawer-item">
                                    <a href="<?php echo esc_url(home_url('/business/')); ?>">
                                        <span class="header__drawer-item-en">Business</span>
                                        <span class="header__drawer-item-ja">事業を知る</span>
                                    </a>
                                </li>
                                <li class="header__drawer-item">
                                    <a href="<?php echo esc_url(home_url('/people/')); ?>">
                                        <span class="header__drawer-item-en">People</span>
                                        <span class="header__drawer-item-ja">働く人を知る</span>
                                    </a>
                                </li>
                                <li class="header__drawer-item">
                                    <a href="<?php echo esc_url(home_url('/environment/')); ?>">
                                        <span class="header__drawer-item-en">Environment</span>
                                        <span class="header__drawer-item-ja">働く環境</span>
                                    </a>
                                </li>
                                <li class="header__drawer-item">
                                    <a href="<?php echo esc_url(home_url('/recruitment/')); ?>">
                                        <span class="header__drawer-item-en">Recruitment</span>
                                        <span class="header__drawer-item-ja">採用情報</span>
                                    </a>
                                </li>
                                <li class="header__drawer-item">
                                    <a href="<?php echo esc_url(home_url('/new-graduate/')); ?>">
                                        <span class="header__drawer-item-en">New Graduate</span>
                                        <span class="header__drawer-item-ja">新卒採用</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <ul class="header__drawer-sns">
                            <li class="header__drawer-sns-item header__drawer-sns-item--instagram">
                                <a href="https://www.instagram.com/newoldcapital.official" target="_blank" rel="noopener"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/insta-white.svg" alt="Instagram"></a>
                            </li>
                            <li class="header__drawer-sns-item header__drawer-sns-item--youtube">
                                <a href="https://www.youtube.com/@newoldcapital" target="_blank" rel="noopener"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/youtube-white.svg" alt="YouTube"></a>
                            </li>
                            <li class="header__drawer-sns-item header__drawer-sns-item--x">
                                <a href="https://x.com/newold_official" target="_blank" rel="noopener"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/x-white.svg" alt="X"></a>
                            </li>
                            <li class="header__drawer-sns-item header__drawer-sns-item--facebook">
                                <a href="https://www.facebook.com/newoldcapital.official/" target="_blank" rel="noopener"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/facebook-fill-white.svg" alt="Facebook"></a>
                            </li>
                            <li class="header__drawer-sns-item header__drawer-sns-item--linkedin">
                                <a href="https://www.linkedin.com/company/newold-official" target="_blank" rel="noopener"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/linked-in-square.svg" alt="LinkedIn"></a>
                            </li>
                        </ul>
                        <div class="header__drawer-cta">
                            <a href="https://hrmos.co/pages/newold" target="_blank" rel="noopener noreferrer" class="header__drawer-cta-btn header__drawer-cta-btn--white right-up-button">
                                <span>現在募集中の職種</span>
                                <div class="right-up-button__arrow">
                                    <span class="header__drawer-cta-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                            <a href="https://hrmos.co/pages/newold/jobs/0000001" target="_blank" rel="noopener noreferrer" class="header__drawer-cta-btn header__drawer-cta-btn--green right-up-button">
                                <span>カジュアル面談へ</span>
                                <div class="right-up-button__arrow">
                                    <span class="header__drawer-cta-icon right-up-button__icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                                        <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/button-arrow-white.svg" alt="右向き矢印アイコン" />
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    <span class="header__hamburger-close">CLOSE</span>