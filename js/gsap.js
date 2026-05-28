gsap.registerPlugin(ScrollTrigger);

const lenis = new Lenis({
  duration: 2,        // ← 一定ペース
  smoothWheel: true,
  smoothTouch: false,
});

lenis.on("scroll", ScrollTrigger.update);

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

const section = document.querySelector(".js-scroll-text");

gsap.to(section, {
    "--progress": "100%",
    ease: "none", // ← イージングなし＝完全同期
    scrollTrigger: {
        trigger: section,
        start: "top bottom", // 画面下に触れたら開始
        end: "bottom top", // 上に抜けたら終了
        scrub: true // ← スクロール量と同期
    }
});




// ScrollTrigger.create({
//   trigger: ".top-people",
//   start: "top 60%",     // セクション上端が画面下に入ったら
//   end: "bottom top",       // セクション下端が画面上を抜けたら
//   onEnter: () => {
//     document.body.classList.add("bg-brightness");
//   },
//   onEnterBack: () => {
//     document.body.classList.add("bg-brightness");
//   },
//   onLeave: () => {
//     document.body.classList.remove("bg-brightness");
//   },
//   onLeaveBack: () => {
//     document.body.classList.remove("bg-brightness");
//   }
// });


document.addEventListener("DOMContentLoaded", () => {
    gsap.set(
        ".fv__image img, .fv__title, .fv__title01, .fv__title02, .fv__news, .fv__photo01", {
            visibility: "visible"
        }
    );
    const grid = document.querySelector(".bg-grid");

    let hasAnimated = false;
    let vLines = [];
    let hLines = [];

    // =========================
    // 共通：cellSize算出（あなたの式）
    // =========================
    function getCellSize() {
        return window.innerWidth >= 768 ?
            Math.max(252, (window.innerWidth / 1440) * 252) :
            67;
    }

    // =========================
    // 線要素を作る
    // =========================
    function makeLine(type) {
        const line = document.createElement("span");
        line.classList.add("grid-line", type);
        // resizeで新規追加されても「アニメしない」ので、見える状態にしておく
        if (type === "vertical") line.style.transform = "scaleY(1)";
        if (type === "horizontal") line.style.transform = "scaleX(1)";
        return line;
    }

    // =========================
    // 必要本数を満たすように増減
    // =========================
    function ensureCount(arr, needed, type) {
        while (arr.length < needed) {
            const line = makeLine(type);
            grid.appendChild(line);
            arr.push(line);
        }
        while (arr.length > needed) {
            const line = arr.pop();
            line.remove();
        }
    }

    // =========================
    // 位置更新（中央に「マス」が来る）
    // =========================
    function layoutGrid() {
        const w = window.innerWidth;
        const h = window.innerHeight;
        const cellSize = getCellSize();

        const cx = w / 2;
        const cy = h / 2;

        // ★ マスの中心を中央にする半マスずらし
        const startX = cx - cellSize / 2;
        const startY = cy - cellSize / 2;

        // 画面を覆うのに必要な本数（左右上下に余裕）
        const vNeeded = (Math.ceil(w / cellSize) + 3) * 2 + 1;
        const hNeeded = (Math.ceil(h / cellSize) + 3) * 2 + 1;

        ensureCount(vLines, vNeeded, "vertical");
        ensureCount(hLines, hNeeded, "horizontal");

        // iを -N..N で振るための中心
        const vMid = Math.floor(vNeeded / 2);
        const hMid = Math.floor(hNeeded / 2);

        // 縦線：中央基準
        for (let idx = 0; idx < vLines.length; idx++) {
            const i = idx - vMid;
            const x = startX + i * cellSize;
            // 1pxをキレイに見せたい場合の0.5補正（不要なら外してOK）
            vLines[idx].style.left = `${Math.round(x) + 0.5}px`;
        }

        // 横線：中央基準
        for (let idx = 0; idx < hLines.length; idx++) {
            const i = idx - hMid;
            const y = startY + i * cellSize;
            hLines[idx].style.top = `${Math.round(y) + 0.5}px`;
        }
    }

    // =========================
    // 初回だけ：線＋コンテンツ全部のアニメ
    // =========================
    function animateAll() {
        const allLines = [...vLines, ...hLines];

        // =========================
        // シャッフル
        // =========================
        gsap.utils.shuffle(allLines);

        const tl = gsap.timeline({
            defaults: {
                ease: "power3.out"
            }
        });

        allLines.forEach((line, i) => {
            const isVertical = line.classList.contains("vertical");

            // =========================
            // ランダム方向決定
            // =========================
            if (isVertical) {
                const fromTop = Math.random() > 0.5;

                gsap.set(line, {
                    scaleY: 0,
                    transformOrigin: fromTop ? "center top" : "center bottom"
                });

                tl.to(
                    line, {
                        scaleY: 1,
                        duration: 0.6 + Math.random() * 0.6
                    },
                    i * 0.04 // ランダムじゃなく微差で流れ感
                );
            } else {
                const fromLeft = Math.random() > 0.5;

                gsap.set(line, {
                    scaleX: 0,
                    transformOrigin: fromLeft ? "left center" : "right center"
                });

                tl.to(
                    line, {
                        scaleX: 1,
                        duration: 0.6 + Math.random() * 0.6
                    },
                    i * 0.04
                );
            }
        });

        // =========================
        // コンテンツ（そのまま）
        // =========================
        tl.to({}, {
                duration: 0.3
            })

            .fromTo(
                ".fv__image img", {
                    clipPath: "inset(0 0 100% 0)"
                }, {
                    clipPath: "inset(0 0 0% 0)",
                    scale: 1,
                    duration: 1.4,
                    autoAlpha: 1,
                    ease: "expo.out"
                },
                "-=0.2"
            )

            .fromTo(
                ".fv__title, .fv__title01, .fv__title02", {
                    y: 40,
                    autoAlpha: 0,
                    filter: "blur(8px)"
                }, {
                    y: 0,
                    autoAlpha: 1,
                    filter: "blur(0px)",
                    duration: 1.2,
                    stagger: 0.15,
                    ease: "expo.out"
                },
                "-=1.0"
            )

            .fromTo(
                ".fv__news", {
                    autoAlpha: 0
                }, {
                    x: 0,
                    autoAlpha: 1,
                    duration: 1,
                    ease: "expo.out"
                },
                "-=0.8"
            )

            .fromTo(
                ".fv__photo01", {
                    y: 40,
                    autoAlpha: 0
                }, {
                    y: 0,
                    autoAlpha: 1,
                    duration: 1.2,
                    ease: "expo.out"
                },
                "-=0.9"
            );
    }

    // =========================
    // 初回
    // =========================
    if (!grid) return; // .bg-grid がなければ何もしない

    const isFrontPage = document.body.classList.contains("front-page");

    layoutGrid();
    if (isFrontPage && !hasAnimated) {
        animateAll();
        hasAnimated = true;
    }

    // =========================
    // resize：位置・本数だけ更新（アニメしない）
    // =========================
    let resizeTimer;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            layoutGrid();
            // ★ アニメは呼ばない
        }, 120);
    });
});


gsap.fromTo(
  ".js-top-recruit-image",
  {
    scale: 0.8,
  },
  {
    scale: 1,
    ease: "none", // ← scrub時は必須レベルで重要
    scrollTrigger: {
      trigger: ".js-top-recruit-image",
      start: "top 80%",
      end: "top 30%",
      scrub: 2,
    }
  }
);

gsap.fromTo(
  ".cta-join__image",
  {
    y:'15%'
  },
  {
    y: '0%',
    ease: "none", // ← scrub時は必須レベルで重要
    scrollTrigger: {
      trigger: ".cta-join__image",
      start: "top bottom",
      end: "bottom 100%",
      scrub: 2,
    }
  }
);


let parallax_image = document.querySelectorAll('.parallax-image'); //ターゲットとなる要素を全取得
parallax_image.forEach((target) => {
    gsap.fromTo(
        target, {
            y: '15%'
        }, {
            y: '0%',
            ease: "none", // ← scrub時は必須レベルで重要
            scrollTrigger: {
                trigger: target,
                start: "top bottom",
                end: "bottom 80%",
                scrub: 2,
            }
        }
    )
})