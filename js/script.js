jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

    // ナビ側（SNS・リンク・ハンバーガー）だけを画面上部に固定して追従させる。
    // align-items: center 等でページ／ブレークポイントごとに実際の表示位置が変わるため、
    // 一旦 static に戻して本来の配置位置を計測 → その座標で fixed 化する
    const headerRight = document.querySelector(".header__right");
    if (headerRight) {
        const pinHeaderRight = () => {
            headerRight.classList.remove("js-fixed");
            headerRight.style.top = "";
            headerRight.style.left = "";
            const rect = headerRight.getBoundingClientRect();
            // getBoundingClientRect() はビューポート基準のため、リロード時など
            // スクロール位置が復元された状態で計測すると画面外の座標を拾ってしまう。
            // スクロール量を足して「ページ最上部を基準にした座標」に変換してから固定する。
            headerRight.style.top = (rect.top + window.scrollY) + "px";
            headerRight.style.left = (rect.left + window.scrollX) + "px";
            headerRight.classList.add("js-fixed");
        };
        pinHeaderRight();
        window.addEventListener("resize", pinHeaderRight);
        window.addEventListener("load", pinHeaderRight);
    }

    const businessVisuals = Array.from(document.querySelectorAll(".top-business__visual-list, .top-business__visual-sp-list"));
    if (businessVisuals.length) {
        const businessPcItems = Array.from(document.querySelectorAll(".top-business__visual-item"));
        const businessSpItems = Array.from(document.querySelectorAll(".top-business__visual-sp-item"));
        const businessDetails = Array.from(document.querySelectorAll(".top-business__detail"));

        const businessNavCounter = document.querySelector(".js-business-nav-counter");
        const businessTotal = businessDetails.length;
        let currentBusinessIndex = businessDetails.findIndex((d) => d.classList.contains("is-active"));
        if (currentBusinessIndex < 0) currentBusinessIndex = 0;

        function updateBusinessNav(activeIndex) {
            if (!businessNavCounter) return;
            const current = String(activeIndex + 1).padStart(2, "0");
            const total = String(businessTotal).padStart(2, "0");
            businessNavCounter.textContent = current + " / " + total;
        }

        function activateBusinessIndex(activeIndex) {
            if (activeIndex < 0) return;

            businessPcItems.forEach((item, index) => {
                item.classList.toggle("is-active", index === activeIndex);
            });

            businessSpItems.forEach((item, index) => {
                item.classList.toggle("is-active", index === activeIndex);
            });

            businessDetails.forEach((detail, index) => {
                detail.classList.toggle("is-active", index === activeIndex);
            });

            currentBusinessIndex = activeIndex;
            updateBusinessNav(activeIndex);
        }

        updateBusinessNav(currentBusinessIndex);

        const businessPrevBtn = document.querySelector(".js-business-prev");
        const businessNextBtn = document.querySelector(".js-business-next");

        if (businessPrevBtn) {
            businessPrevBtn.addEventListener("click", () => {
                const next = (currentBusinessIndex - 1 + businessTotal) % businessTotal;
                activateBusinessIndex(next);
            });
        }

        if (businessNextBtn) {
            businessNextBtn.addEventListener("click", () => {
                const next = (currentBusinessIndex + 1) % businessTotal;
                activateBusinessIndex(next);
            });
        }

        function getBusinessCircularTarget(event, targets) {
            for (const target of targets) {
                const rect = target.getBoundingClientRect();
                const radius = Math.min(rect.width, rect.height) / 2;
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                const distance = Math.hypot(event.clientX - centerX, event.clientY - centerY);

                if (distance <= radius) {
                    return target.closest(".top-business__visual-item, .top-business__visual-sp-item");
                }
            }

            return null;
        }

        businessVisuals.forEach((visual) => {
            const targets = Array.from(visual.querySelectorAll(".top-business__visual-link, .top-business__visual-sp-circle"));
            const isSpVisual = visual.classList.contains("top-business__visual-sp-list");

            function getBusinessTarget(event) {
                if (isSpVisual) {
                    const spItem = event.target.closest(".top-business__visual-sp-item");
                    return spItem && visual.contains(spItem) ? spItem : null;
                }

                return getBusinessCircularTarget(event, targets);
            }

            visual.addEventListener("pointermove", (event) => {
                const target = getBusinessTarget(event);
                if (!target) return;

                const pcItem = target.closest(".top-business__visual-item");
                const spItem = target.closest(".top-business__visual-sp-item");
                const activeIndex = pcItem ? businessPcItems.indexOf(pcItem) : businessSpItems.indexOf(spItem);

                activateBusinessIndex(activeIndex);
            });

            visual.addEventListener("pointerdown", (event) => {
                const target = getBusinessTarget(event);
                if (!target) return;

                const pcItem = target.closest(".top-business__visual-item");
                const spItem = target.closest(".top-business__visual-sp-item");
                const activeIndex = pcItem ? businessPcItems.indexOf(pcItem) : businessSpItems.indexOf(spItem);

                activateBusinessIndex(activeIndex);
            });
        });
    }

    const newsAnchor = document.querySelector(".js-fv-news-anchor");
    const newsItems = Array.from(document.querySelectorAll(".fv__news-item"));

    if (newsAnchor && newsItems.length > 1) {
        let activeNewsIndex = newsItems.findIndex((item) => item.classList.contains("is-active"));
        activeNewsIndex = activeNewsIndex >= 0 ? activeNewsIndex : 0;
        let autoTimer = null;

        function activateNewsItem(nextIndex) {
            if (nextIndex === activeNewsIndex) return;

            const currentItem = newsItems[activeNewsIndex];
            const nextItem = newsItems[nextIndex];

            currentItem.classList.add("is-leaving");
            currentItem.classList.remove("is-active");
            nextItem.classList.add("is-active");

            const nextUrl = nextItem.dataset.url;
            if (nextUrl) {
                newsAnchor.setAttribute("href", nextUrl);
            }

            window.setTimeout(() => {
                currentItem.classList.remove("is-leaving");
            }, 700);

            activeNewsIndex = nextIndex;
        }

        function startAutoPlay() {
            autoTimer = window.setTimeout(() => {
                activateNewsItem((activeNewsIndex + 1) % newsItems.length);
                autoTimer = window.setInterval(() => {
                    activateNewsItem((activeNewsIndex + 1) % newsItems.length);
                }, 6000);
            }, 6500);
        }

        function resetAutoPlay() {
            window.clearInterval(autoTimer);
            startAutoPlay();
        }

        startAutoPlay();

        const prevBtn = document.querySelector(".js-fv-news-prev");
        const nextBtn = document.querySelector(".js-fv-news-next");

        if (prevBtn) {
            prevBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                const prevIndex = (activeNewsIndex - 1 + newsItems.length) % newsItems.length;
                activateNewsItem(prevIndex);
                resetAutoPlay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                activateNewsItem((activeNewsIndex + 1) % newsItems.length);
                resetAutoPlay();
            });
        }
    }

    var topBtn = $('.pagetop');
    topBtn.hide();

    // ボタンの表示設定
    $(window).scroll(function () {
        if ($(this).scrollTop() > 70) {
            // 指定px以上のスクロールでボタンを表示
            topBtn.fadeIn();
        } else {
            // 画面が指定pxより上ならボタンを非表示
            topBtn.fadeOut();
        }
    });

    // ボタンをクリックしたらスクロールして上に戻る
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 300, 'swing');
        return false;
    });

    //ドロワーメニュー
    $("#MenuButton").click(function () {
        // $(".l-drawer-menu").toggleClass("is-show");
        // $(".p-drawer-menu").toggleClass("is-show");
        $(".js-drawer-open").toggleClass("open");
        $(".drawer-menu").toggleClass("open");
        $("html").toggleClass("is-fixed");

    });



    // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)
    const HEADER_HEIGHT = 100;

    $(document).on('click', 'a[href*="#"]', function () {
        let target = $(this.hash);
        if (!target.length) return;
        let offset = -HEADER_HEIGHT;
        if (window.lenis) {
            window.lenis.scrollTo(target[0], { offset: offset, duration: 1.2 });
        } else {
            $('html,body').animate({
                scrollTop: target.offset().top + offset
            }, 400, 'swing');
        }
        return false;
    });

    // ハンバーガーメニュー
    $(function () {
        $(".js-hamburger").click(function () {
            $(this).toggleClass("is-open");
            if ($(this).hasClass("is-open")) {
                openDrawer();
            } else {
                closeDrawer();
            }
        });

        // ドロワー内リンクをクリックで閉じる
        $(".js-drawer a[href]").on("click", function () {
            closeDrawer();
        });

        // ドロワーの外をクリックで閉じる
        $(document).on("click.drawer", function (e) {
            if (!$(e.target).closest(".js-drawer, .js-hamburger").length) {
                closeDrawer();
            }
        });

        // ブレークポイントを超えた時だけ閉じる
        window.matchMedia("(min-width: 768px)").addEventListener('change', function (e) {
            if (e.matches) {
                closeDrawer();
            }
        });
    });

    function openDrawer() {
        $(".js-drawer").addClass("is-open");
        $(".js-hamburger").addClass("is-open");
        $("html").addClass("is-drawer-open");
        if (typeof lenis !== "undefined") lenis.stop();
    }

    function closeDrawer() {
        $(".js-drawer").removeClass("is-open");
        $(".js-hamburger").removeClass("is-open");
        $("html").removeClass("is-drawer-open");
        if (typeof lenis !== "undefined") lenis.start();
        $(".js-drawer").one("transitionend", function () {
            $(this).scrollTop(0);
        });
    }

    // modal
    $(".js-modal-open").each(function () {
        $(this).on("click", function (e) {
            e.preventDefault();
            var target = $(this).data("target");
            var modal = document.getElementById(target);
            $(modal).fadeIn();
            $("html,body").css("overflow", "hidden");
        });
    });
    $(".js-modal-close").on("click", function () {
        $(".js-modal").fadeOut();
        $("html,body").css("overflow", "initial");
    });

    // サイドバーのナビゲーション
    const $links = $(".sub-page__nav-link");
    const scrollDuration = 400;
    let isScrollingByClick = false;
    let scrollEndTimer = null;
    
    function getNavOffset() {
      return HEADER_HEIGHT;
    }
    
    function updateCurrentLink() {
      if (isScrollingByClick || !$links.length) {
        return;
      }
    
      const scrollPoint = $(window).scrollTop() + getNavOffset() + 100;
      let currentId = "";
    
      $links.each(function () {
        const targetId = $(this).attr("href");
        const $target = $(targetId);
    
        if (!$target.length) {
          return;
        }
    
        if ($target.offset().top <= scrollPoint) {
          currentId = targetId;
        }
      });
    
      if (currentId) {
        $links.removeClass("is-current");
        $links.filter('[href="' + currentId + '"]').addClass("is-current");
      }
    }
    
    $links.on("click", function () {
      isScrollingByClick = true;
      clearTimeout(scrollEndTimer);
    
      $links.removeClass("is-current");
      $(this).addClass("is-current");
    
      scrollEndTimer = setTimeout(function () {
        isScrollingByClick = false;
        updateCurrentLink();
      }, scrollDuration + 50);
    });
    
    $(window).on("scroll", function () {
      updateCurrentLink();
    });
    
    updateCurrentLink();

    // floating-buttons フッター重複時に非表示
    var $floatingButtons = $('.floating-buttons');
    var footer = document.querySelector('.footer');
    if ($floatingButtons.length && footer) {
        var floatingObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                $floatingButtons.toggleClass('is-hidden', entry.isIntersecting);
            });
        });
        floatingObserver.observe(footer);
    }
});

    const body = document.body;
    const black = document.querySelector('.top-people');

    if (black) {
        window.addEventListener('scroll', () => {
            const rect = black.getBoundingClientRect();
            const viewportCenter = window.innerHeight / 2;
            const blackTop = rect.top;
            const blackBottom = rect.bottom;

            // .bg-black の範囲に「画面中央」が含まれているかを判定
            const inCenter = blackTop <= viewportCenter && blackBottom >= viewportCenter;

            if (inCenter) {
                body.classList.add('bg-brightness');
            } else {
                body.classList.remove('bg-brightness');
            }
        });
    }

// 他のメンバー スライダー
if (document.querySelector('.people-others__swiper')) {
    new Swiper('.people-others__swiper', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        navigation: {
            prevEl: '.people-others__btn--prev',
            nextEl: '.people-others__btn--next',
        },
    });
}

// リンクアニメーション
const triggers = document.querySelectorAll('.link a');

triggers.forEach(trigger => {
    const target01 = trigger.querySelector('.text01');
    const target02 = trigger.querySelector('.text02');
    const target03 = trigger.querySelector('.image01');
    const target04 = trigger.querySelector('.image02');

    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(target01, {
            y: '0px',
            opacity: 0,
        }, {
            y: '-100%',
            opacity: 1,
        });
    });

    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(target02, {
            y: '100%',
        }, {
            y: '0%',
        });
    });

    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(target03, {
            x: '20%',
            // y: '0%',
            opacity: 0,
        }, {
            x: '200%',
            opacity: 1,
        });
    });
    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(target04, {
            x: '-200%',
        }, {
            x: '0%',
        });
    });
});


const triggersR = document.querySelectorAll('.link--reverse a');

triggersR.forEach(trigger => {
    const targetR01 = trigger.querySelector('.text01');
    const targetR02 = trigger.querySelector('.text02');
    const targetR03 = trigger.querySelector('.image01');
    const targetR04 = trigger.querySelector('.image02');

    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(targetR01, {
            y: '0px',
            opacity: 0,
        }, {
            y: '-100%',
            opacity: 1,
        });
    });

    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(targetR02, {
            y: '100%',
        }, {
            y: '0%',
        });
    });

    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(targetR03, {
            x: '-20%',
            // y: '0%',
            opacity: 0,
        }, {
            x: '-200%',
            opacity: 1,
        });
    });
    trigger.addEventListener('mouseenter', () => {
        gsap.fromTo(targetR04, {
            x: '200%',
        }, {
            x: '0%',
        });
    });
});

// =============================================
// NEW GRADUATE PAGE
// =============================================
document.addEventListener('DOMContentLoaded', function () {

    // ---- Hero image swiper ----
    if (typeof Swiper !== 'undefined' && document.querySelector('.ng-hero__swiper')) {
        new Swiper('.ng-hero__swiper', {
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            speed: 3000,
            loop: true,
            autoHeight: true,
            allowTouchMove: false,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    }

    // ---- Interview swiper ----
    if (typeof Swiper !== 'undefined' && document.querySelector('.ng-interview__swiper')) {
        var prevBtn = document.querySelector('.ng-interview__prev');
        var nextBtn = document.querySelector('.ng-interview__next');

        function updateInterviewNav(swiper) {
            prevBtn.classList.toggle('is-boundary', swiper.isBeginning);
            nextBtn.classList.toggle('is-boundary', swiper.isEnd);
        }

        var interviewSwiper = new Swiper('.ng-interview__swiper', {
            loop: false,
            slidesPerView: 'auto',
            spaceBetween: 0,
            on: {
                slideChangeTransitionEnd: updateInterviewNav,
                reachEnd: function () {
                    nextBtn.classList.add('is-boundary');
                    prevBtn.classList.remove('is-boundary');
                },
                reachBeginning: function () {
                    prevBtn.classList.add('is-boundary');
                    nextBtn.classList.remove('is-boundary');
                },
                fromEdge: function (swiper) {
                    if (!swiper.isBeginning) prevBtn.classList.remove('is-boundary');
                    if (!swiper.isEnd) nextBtn.classList.remove('is-boundary');
                },
            }
        });

        prevBtn.addEventListener('click', function () {
            interviewSwiper.slidePrev();
        });
        nextBtn.addEventListener('click', function () {
            interviewSwiper.slideNext();
        });

        updateInterviewNav(interviewSwiper);
    }

    // ---- Message text reveal (left→right per line) ----
    if (document.querySelector('.ng-message__line') && typeof gsap !== 'undefined') {
        var isMd = window.matchMedia('(min-width: 768px)').matches;
        var lineSelector = isMd
            ? '.ng-message__texts.pc .ng-message__line'
            : '.ng-message__texts.sp .ng-message__line';
        var msgLines = gsap.utils.toArray(lineSelector);
        if (msgLines.length) {
            var tl = gsap.timeline({
                scrollTrigger: {
                    trigger: '.ng-message',
                    start: 'top 65%',
                    end: 'bottom 75%',
                    scrub: 1,
                }
            });
            msgLines.forEach(function (line) {
                tl.fromTo(line,
                    { '--ng-reveal': '0%' },
                    { '--ng-reveal': '100%', ease: 'power1.out', duration: 0.4 }
                );
            });
        }
    }


    // YouTube ファサード（サムネイル + PLAYボタン → クリックでiframe再生）
    document.querySelectorAll('.js-youtube-facade').forEach(function (el) {
        var thumb = el.querySelector('img');
        if (thumb) {
            var checkThumb = function () {
                if (thumb.naturalWidth <= 120) {
                    var videoId = el.dataset.videoId;
                    thumb.src = 'https://img.youtube.com/vi/' + videoId + '/mqdefault.jpg';
                }
            };
            if (thumb.complete) {
                checkThumb();
            } else {
                thumb.addEventListener('load', checkThumb);
                thumb.addEventListener('error', checkThumb);
            }
        }

        el.addEventListener('click', function () {
            var videoId = el.dataset.videoId;
            var iframe = document.createElement('iframe');
            iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
            iframe.title = 'YouTube動画';
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
            iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
            iframe.setAttribute('allowfullscreen', '');
            iframe.style.width = '100%';
            iframe.style.height = '100%';
            iframe.style.display = 'block';
            el.innerHTML = '';
            el.appendChild(iframe);
        });
    });


    // =============================================
    // ENVIRONMENT PAGE - オフィス紹介 タブ切り替え / 執務エリアのフェードスライダー
    // =============================================
    document.querySelectorAll('.sub-environment__office').forEach(function (office) {
        var tabs = office.querySelectorAll('.js-office-tab');
        var panels = office.querySelectorAll('.js-office-panel');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var target = tab.dataset.officeTab;

                tabs.forEach(function (t) {
                    var isActive = t === tab;
                    t.classList.toggle('is-active', isActive);
                    t.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });

                panels.forEach(function (panel) {
                    panel.classList.toggle('is-active', panel.dataset.officePanel === target);
                });
            });
        });

        if (typeof Swiper !== 'undefined') {
            var officeSwiperEl = office.querySelector('.sub-environment__office-swiper');
            if (officeSwiperEl) {
                new Swiper(officeSwiperEl, {
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true,
                    },
                    loop: true,
                    speed: 1000,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    observer: true,
                    observeParents: true,
                });
            }
        }
    });


    // 常時表示のiframe埋め込み上でLenisのスクロールが途切れないための透明シールド
    // シールドは常に外さず、クリックはYouTube IFrame APIのpostMessageで再生/一時停止に変換する。
    // （シールドを外してiframeへクリックを受け渡す方式だと、外れた瞬間からその上のホバーで
    //   スクロールが再び不安定になるため、シールドは常設し操作は全てpostMessage経由で行う）
    document.querySelectorAll('.js-scroll-shield').forEach(function (wrap) {
        var shieldBtn = wrap.querySelector('.js-scroll-shield-btn');
        var iframe = wrap.querySelector('.js-scroll-shield-iframe');
        if (!shieldBtn || !iframe) return;

        var isPlaying = false;

        shieldBtn.addEventListener('click', function () {
            isPlaying = !isPlaying;
            shieldBtn.classList.toggle('is-playing', isPlaying);
            shieldBtn.setAttribute('aria-label', isPlaying ? '動画を一時停止' : '動画を再生');
            iframe.contentWindow.postMessage(
                JSON.stringify({ event: 'command', func: isPlaying ? 'playVideo' : 'pauseVideo', args: [] }),
                '*'
            );
        });
    });

});
