<?php

function my_body_class($classes)
{
    if (is_front_page()) {
        $classes[] = 'front-page';
    } elseif (is_page()) {
        $page = get_post();
        $classes[] = $page->post_name;
    }
    return $classes;
}
add_filter('body_class', 'my_body_class');


function add_google_fonts_preconnect($urls, $relation_type)
{
    if ($relation_type === 'preconnect') {
        $urls[] = ['href' => 'https://fonts.googleapis.com'];
        $urls[] = ['href' => 'https://fonts.gstatic.com', 'crossorigin' => 'crossorigin'];
    }
    return $urls;
}
add_filter('wp_resource_hints', 'add_google_fonts_preconnect', 10, 2);

// アイキャッチ画像を有効化
function theme_setup()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

function enqueue_custom_styles_and_scripts()
{
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@100..900&family=Shippori+Mincho:wght@400;500;600;700;800&display=swap', [], null);

    // Main Stylesheet
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', [], null);

    // jQuery
    wp_enqueue_script('jquery-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', [], null, true);

    // GSAP Scripts
    wp_enqueue_script('gsap-core', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', [], null, true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', ['gsap-core'], null, true);
    wp_enqueue_script('gsap-cssruleplugin', 'https://cdn.jsdelivr.net/npm/gsap@3/dist/CSSRulePlugin.min.js', ['gsap-core'], null, true);

    // Lenis
    wp_enqueue_script('lenis', 'https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.19/bundled/lenis.min.js', [], null, true);

    // Swiper
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], null);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);

    // Custom Scripts
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', ['jquery-cdn', 'gsap-core', 'gsap-scrolltrigger'], null, true);
    wp_enqueue_script('custom-gsap-script', get_template_directory_uri() . '/js/gsap.js', ['gsap-core', 'gsap-scrolltrigger'], null, true);

    wp_enqueue_script('form-validation-script', get_template_directory_uri() . '/js/form-validation.js', ['jquery-cdn'], null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');



// 「投稿」ラベルを「People」に変更
function rename_posts_to_people() {
    global $wp_post_types;
    if (isset($wp_post_types['post'])) {
        $labels = &$wp_post_types['post']->labels;
        $labels->name               = 'People';
        $labels->singular_name      = 'People';
        $labels->add_new            = '新規 People を追加';
        $labels->add_new_item       = '新規 People を追加';
        $labels->edit_item          = 'People を編集';
        $labels->new_item           = '新しい People';
        $labels->view_item          = 'People を表示';
        $labels->search_items       = 'People を検索';
        $labels->not_found          = 'People が見つかりません';
        $labels->not_found_in_trash = 'ゴミ箱に People はありません';
        $labels->all_items          = 'すべての People';
        $labels->menu_name          = 'People';
        $labels->name_admin_bar     = 'People';
    }
}
add_action('init', 'rename_posts_to_people');

// wppagenaviのカスタマイズ

function custom_wp_pagenavi($html)
{
    // ここでHTMLの内容を確認するためにログに出力してみます
    error_log($html);

    // 前へのリンクのテキストを画像に置き換える
    $html = str_replace('class="previouspostslink"', 'class="previouspostslink"', $html);
    $html = str_replace('←', '<img src="' . get_template_directory_uri() . '/img/common/next-arrow.svg" alt="前へ">', $html);

    // 次へのリンクのテキストを画像に置き換える
    $html = str_replace('class="nextpostslink"', 'class="nextpostslink"', $html);
    $html = str_replace('→', '<img src="' . get_template_directory_uri() . '/img/common/next-arrow.svg" alt="次へ">', $html);

    return $html;
}
add_filter('wp_pagenavi', 'custom_wp_pagenavi');


// People Q&A カスタムフィールド（Q1〜Q15）
add_action('acf/init', 'register_people_qa_fields');
function register_people_qa_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $fields = [];

    for ($i = 1; $i <= 15; $i++) {
        // アコーディオン開始
        $fields[] = [
            'key'          => 'field_accordion_q' . $i,
            'label'        => 'Q' . $i . ' セット',
            'name'         => '',
            'type'         => 'accordion',
            'open'         => ($i === 1) ? 1 : 0,
            'multi_expand' => 1,
            'endpoint'     => 0,
        ];

        // 質問（textarea）
        $fields[] = [
            'key'      => 'field_people_q' . $i,
            'label'    => 'Q' . $i . '（質問）',
            'name'     => 'people_q' . $i,
            'type'     => 'textarea',
            'rows'     => 3,
            'required' => 0,
        ];

        // 回答（textarea）
        $fields[] = [
            'key'      => 'field_people_a' . $i,
            'label'    => 'A' . $i . '（回答）',
            'name'     => 'people_a' . $i,
            'type'     => 'textarea',
            'rows'     => 5,
            'required' => 0,
        ];

        // アコーディオン終了
        $fields[] = [
            'key'      => 'field_accordion_q' . $i . '_end',
            'label'    => '',
            'name'     => '',
            'type'     => 'accordion',
            'endpoint' => 1,
        ];
    }

    acf_add_local_field_group([
        'key'                   => 'group_people_qa',
        'title'                 => 'Q&A（質問と回答）',
        'fields'                => $fields,
        'location'              => [
            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'post',
                ],
            ],
        ],
        'menu_order'            => 10,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
        'description'           => 'Q1〜Q15の質問（テキストエリア）と回答（WYSIWYG）を入力してください。',
    ]);
}


// サンクスページへの遷移
add_action('wp_footer', 'add_thanks_page');
function add_thanks_page()
{ ?>
    <script>
        document.addEventListener('wpcf7mailsent', function(event) {
            location = '<?php echo esc_url(home_url('/contact/thanks/')); ?>'; /* 遷移先のURL */
        }, false);
    </script>
<?php }
