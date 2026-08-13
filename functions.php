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



// People（投稿）・固定ページはカスタムフィールド／SEOフィールド入力のみのためエディタ不要
add_filter('use_block_editor_for_post_type', function ($use, $post_type) {
    return in_array($post_type, ['post', 'page'], true) ? false : $use;
}, 10, 2);

add_action('init', function () {
    remove_post_type_support('post', 'editor');
    remove_post_type_support('post', 'excerpt');
    remove_post_type_support('post', 'trackbacks');
    remove_post_type_support('post', 'comments');

    remove_post_type_support('page', 'editor');
});

add_action('admin_menu', function () {
    remove_meta_box('commentstatusdiv', 'post', 'normal'); // ディスカッション
    remove_meta_box('commentsdiv',      'post', 'normal'); // コメント
});

// slugdivはCSSで非表示（削除するとパーマリンク編集が機能しなくなるため）
add_action('admin_head', function () {
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'post') return;
    echo '<style>#slugdiv { display: none !important; }</style>';
});


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

// People「役員として登録する」チェックボックス（編集画面タイトル直下に表示）
add_action('edit_form_after_title', 'render_people_is_executive_field');
function render_people_is_executive_field($post)
{
    if ($post->post_type !== 'post') {
        return;
    }
    wp_nonce_field('people_is_executive_save', 'people_is_executive_nonce');
    $checked = get_post_meta($post->ID, 'people_is_executive', true) === '1';
    ?>
    <p style="margin: 16px 0;">
        <label>
            <input type="checkbox" name="people_is_executive" value="1" <?php checked($checked); ?>>
            役員として登録する（ここにチェックをつけると、People一覧には表示せず、インタビューページへは遷移されなくなります。）
        </label>
    </p>
    <?php
}

add_action('save_post', 'save_people_is_executive_field');
function save_people_is_executive_field($post_id)
{
    if (!isset($_POST['people_is_executive_nonce']) || !wp_verify_nonce($_POST['people_is_executive_nonce'], 'people_is_executive_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    update_post_meta($post_id, 'people_is_executive', !empty($_POST['people_is_executive']) ? '1' : '0');
}

// People一覧（home.php）では役員登録された投稿を除外
add_action('pre_get_posts', 'exclude_executive_people_from_list');
function exclude_executive_people_from_list($query)
{
    if (is_admin() || !$query->is_main_query() || !$query->is_home()) {
        return;
    }
    $meta_query   = (array) $query->get('meta_query');
    $meta_query[] = [
        'relation' => 'OR',
        [
            'key'     => 'people_is_executive',
            'compare' => 'NOT EXISTS',
        ],
        [
            'key'     => 'people_is_executive',
            'value'   => '1',
            'compare' => '!=',
        ],
    ];
    $query->set('meta_query', $meta_query);
}

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


// People 詳細フィールド（基本情報 + コンテンツ種別ラジオ）
add_action('acf/init', 'register_people_detail_fields');
function register_people_detail_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'                   => 'group_6a0b18077e9ea',
        'title'                 => 'People詳細',
        'fields'                => [
            [
                'key'      => 'field_6a0b241b976c1',
                'label'    => 'インタビュータイトル',
                'name'     => 'people_title',
                'type'     => 'text',
                'required' => 0,
            ],
            [
                'key'          => 'field_people_quote_main',
                'label'        => '先輩インタビュー引用（メイン）',
                'name'         => 'people_quote_main',
                'type'         => 'text',
                'instructions' => '新卒採用ページの先輩インタビュー枠、1行目のコピーです。',
                'required'     => 0,
            ],
            [
                'key'          => 'field_people_quote_sub',
                'label'        => '先輩インタビュー引用（サブ）',
                'name'         => 'people_quote_sub',
                'type'         => 'text',
                'instructions' => '新卒採用ページの先輩インタビュー枠、2行目のコピーです。',
                'required'     => 0,
            ],
            [
                'key'      => 'field_6a0b18f5efa94',
                'label'    => '氏名（英語）',
                'name'     => 'people_name_en',
                'type'     => 'text',
                'required' => 0,
            ],
            [
                'key'      => 'field_6a0b190defa95',
                'label'    => '部署・役職',
                'name'     => 'people_department',
                'type'     => 'textarea',
                'rows'     => 3,
                'new_lines' => '',
                'required' => 0,
            ],
            [
                'key'      => 'field_6a0b1927efa96',
                'label'    => '入社年度',
                'name'     => 'people_year',
                'type'     => 'text',
                'required' => 0,
            ],
            [
                'key'           => 'field_6a0b1930efa97',
                'label'         => 'プロフィール写真',
                'name'          => 'people_portrait',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'required'      => 0,
            ],
            [
                'key'           => 'field_ng_portrait_ng',
                'label'         => '新卒採用ページ用写真（先輩インタビュー）',
                'name'          => 'people_portrait_ng',
                'type'          => 'image',
                'instructions'  => '新卒採用ページの先輩インタビュー枠（横長 14:9）に表示する専用の写真です。未設定の場合はno-imageが表示されます。',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'required'      => 0,
            ],
        ],
        'location'              => [[[
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'post',
        ]]],
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ]);
}


// 新卒採用ページ - 先輩インタビューに表示するPeopleの選択
add_action('acf/init', 'register_new_graduate_interview_fields');
function register_new_graduate_interview_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'                   => 'group_ng_interview_people',
        'title'                 => '新卒採用ページ - 先輩インタビュー',
        'fields'                => [
            [
                'key'           => 'field_ng_interview_people',
                'label'         => 'インタビューに表示するPeople',
                'name'          => 'ng_interview_people',
                'type'          => 'relationship',
                'instructions'  => '先輩インタビューのスライドに表示するPeopleを選択してください。選択した順番でスライドが表示されます。',
                'post_type'     => ['post'],
                'filters'       => ['search'],
                'min'           => 0,
                'max'           => 0,
                'return_format' => 'object',
            ],
        ],
        'location'              => [[[
            'param'    => 'page',
            'operator' => '==',
            'value'    => 21, // 「新卒」ページ（page-new-graduate.php）
        ]]],
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ]);
}


// People コンテンツ種別（ラジオ）
add_action('acf/init', 'register_people_content_type_fields');
function register_people_content_type_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'                   => 'group_people_content_type',
        'title'                 => 'コンテンツ種別',
        'fields'                => [
            [
                'key'           => 'field_6a0b194befa98',
                'label'         => 'コンテンツ種別',
                'name'          => 'people_has_video',
                'type'          => 'radio',
                'choices'       => ['0' => '動画なし', '1' => '動画あり'],
                'default_value' => '0',
                'layout'        => 'horizontal',
                'required'      => 0,
            ],
        ],
        'location'              => [[[
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'post',
        ]]],
        'menu_order'            => 3,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ]);
}


// People 動画内容フィールド
add_action('acf/init', 'register_people_video_fields');
function register_people_video_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'                   => 'group_people_video',
        'title'                 => '動画内容',
        'fields'                => [
            [
                'key'      => 'field_6a0b1a11efa9b',
                'label'    => '動画URL（YouTube）',
                'name'     => 'people_video_url',
                'type'     => 'url',
                'required' => 0,
            ],
            [
                'key'      => 'field_6a0b1807efa92',
                'label'    => 'リード文',
                'name'     => 'people_video_catch',
                'type'     => 'textarea',
                'rows'     => 4,
                'required' => 0,
            ],
            [
                'key'      => 'field_6a0b1a2defa9c',
                'label'    => '動画説明文',
                'name'     => 'people_video_text',
                'type'     => 'textarea',
                'rows'     => 5,
                'required' => 0,
            ],
            [
                'key'      => 'field_people_video_afterword',
                'label'    => '後書き',
                'name'     => 'people_video_afterword',
                'type'     => 'textarea',
                'rows'     => 4,
                'required' => 0,
            ],
        ],
        'location'              => [[[
            'param'    => 'post_type',
            'operator' => '==',
            'value'    => 'post',
        ]]],
        'menu_order'            => 5,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ]);
}


// People 質問内容 - カスタム繰り返しフィールド
add_action('add_meta_boxes', 'add_people_qa_meta_box');
function add_people_qa_meta_box()
{
    add_meta_box('people_qa_box', '質問内容', 'render_people_qa_meta_box', 'post', 'normal', 'default');
}

function render_people_qa_meta_box($post)
{
    wp_nonce_field('people_qa_save', 'people_qa_nonce');
    wp_enqueue_media();

    $lead      = get_post_meta($post->ID, 'people_qa_lead', true) ?: '';
    $afterword = get_post_meta($post->ID, 'people_qa_afterword', true) ?: '';
    $blocks    = get_post_meta($post->ID, 'people_qa_items', true) ?: [];
    if (!is_array($blocks)) $blocks = [];

    // 後方互換：typeキーなし（旧Q&Aのみ）をqa扱いに
    $blocks = array_values(array_map(function ($b) {
        if (!isset($b['type'])) $b['type'] = 'qa';
        return $b;
    }, $blocks));

    if (empty($blocks)) {
        $blocks = [['type' => 'qa', 'question' => '', 'answer' => '']];
    }

    ?>
    <style>
        .pqa-section { margin-bottom: 20px; }
        .pqa-label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px; }
        #pqa-list { list-style: none; margin: 0; padding: 0; }
        .pqa-row { border: 1px solid #c3c4c7; border-radius: 3px; margin-bottom: 8px; background: #fff; }
        .pqa-row-head { display: flex; align-items: center; gap: 8px; padding: 8px 12px; background: #f6f7f7; border-bottom: 1px solid #c3c4c7; border-radius: 3px 3px 0 0; }
        .pqa-row--rich .pqa-row-head { background: #eaf0f6; }
        .pqa-handle { cursor: grab; font-size: 18px; color: #999; line-height: 1; user-select: none; flex-shrink: 0; }
        .pqa-handle:active { cursor: grabbing; }
        .pqa-row-label { flex: 1; font-weight: 700; font-size: 13px; }
        .pqa-remove { color: #a00 !important; margin-left: auto; }
        .pqa-row-body { padding: 12px; }
        .pqa-row-body > label { display: block; font-weight: 600; margin: 10px 0 4px; font-size: 12px; color: #50575e; }
        .pqa-row-body > label:first-child { margin-top: 0; }
        .pqa-row-body textarea { width: 100%; box-sizing: border-box; }
        .pqa-add-buttons { display: flex; gap: 8px; margin-top: 6px; }
        .ui-sortable-helper { box-shadow: 0 4px 12px rgba(0,0,0,.15); opacity: .9; }
        .ui-sortable-placeholder { border: 2px dashed #7bb3d3; border-radius: 3px; background: #e8f3fb; visibility: visible !important; }
        .pqa-image-field { display: flex; flex-direction: column; gap: 8px; }
        .pqa-image-preview img { max-width: 100%; max-height: 200px; display: block; border: 1px solid #ddd; }
        .pqa-image-actions { display: flex; gap: 6px; }
    </style>

    <div class="pqa-section">
        <label class="pqa-label" for="pqa-lead">リード文</label>
        <textarea id="pqa-lead" name="people_qa_lead" rows="4" style="width:100%"><?php echo esc_textarea($lead); ?></textarea>
    </div>

    <div class="pqa-section">
        <label class="pqa-label">コンテンツブロック</label>
        <ul id="pqa-list">
            <?php
            $qa_count = 0;
            foreach ($blocks as $i => $block):
                $type = $block['type'] ?? 'qa';
                if ($type === 'qa') $qa_count++;
            ?>
            <li class="pqa-row pqa-row--<?php echo esc_attr($type); ?>" data-type="<?php echo esc_attr($type); ?>">
                <div class="pqa-row-head">
                    <span class="pqa-handle" title="ドラッグで並び替え">⠿</span>
                    <span class="pqa-row-label">
                        <?php if ($type === 'qa'): ?>
                            <span class="pqa-num">Q<?php echo $qa_count; ?></span>
                        <?php else: ?>
                            📷 画像
                        <?php endif; ?>
                    </span>
                    <button type="button" class="button pqa-remove">削除</button>
                </div>
                <div class="pqa-row-body">
                    <input type="hidden" name="people_qa_items[<?php echo $i; ?>][type]" value="<?php echo esc_attr($type); ?>">
                    <?php if ($type === 'qa'): ?>
                        <label>質問</label>
                        <textarea name="people_qa_items[<?php echo $i; ?>][question]" rows="3"><?php echo esc_textarea($block['question'] ?? ''); ?></textarea>
                        <label>回答</label>
                        <textarea name="people_qa_items[<?php echo $i; ?>][answer]" rows="5"><?php echo esc_textarea($block['answer'] ?? ''); ?></textarea>
                    <?php else: ?>
                        <?php $img_url = esc_url($block['content'] ?? ''); ?>
                        <div class="pqa-image-field">
                            <div class="pqa-image-preview"<?php echo $img_url ? '' : ' style="display:none"'; ?>>
                                <img src="<?php echo $img_url; ?>" alt="">
                            </div>
                            <input type="hidden" name="people_qa_items[<?php echo $i; ?>][content]" value="<?php echo $img_url; ?>">
                            <div class="pqa-image-actions">
                                <button type="button" class="button pqa-image-select">📷 画像を選択</button>
                                <button type="button" class="button pqa-image-remove"<?php echo $img_url ? '' : ' style="display:none"'; ?>>✕ 削除</button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="pqa-add-buttons">
            <button type="button" id="pqa-add-qa" class="button button-secondary">＋ Q&Aを追加</button>
            <button type="button" id="pqa-add-rich" class="button button-secondary">＋ 画像を追加</button>
        </div>
    </div>

    <div class="pqa-section">
        <label class="pqa-label" for="pqa-afterword">後書き</label>
        <textarea id="pqa-afterword" name="people_qa_afterword" rows="4" style="width:100%"><?php echo esc_textarea($afterword); ?></textarea>
    </div>

    <script>
    (function ($) {
        var nextIdx = <?php echo count($blocks); ?>;

        function reindex() {
            $('#pqa-list .pqa-row').each(function (i) {
                $(this).find('input[type="hidden"], textarea').each(function () {
                    if ($(this).attr('name')) {
                        this.name = this.name.replace(/people_qa_items\[\d+\]/, 'people_qa_items[' + i + ']');
                    }
                });
            });
        }

        function renumber() {
            var n = 0;
            $('#pqa-list .pqa-row').each(function () {
                if ($(this).data('type') === 'qa') {
                    n++;
                    $(this).find('.pqa-num').text('Q' + n);
                }
            });
        }

        $('#pqa-list').sortable({
            handle: '.pqa-handle',
            placeholder: 'ui-sortable-placeholder',
            forcePlaceholderSize: true,
            stop: function () {
                reindex();
                renumber();
            }
        });

        // Q&A追加
        $('#pqa-add-qa').on('click', function () {
            var idx = nextIdx++;
            var $li = $(
                '<li class="pqa-row pqa-row--qa" data-type="qa">' +
                    '<div class="pqa-row-head">' +
                        '<span class="pqa-handle" title="ドラッグで並び替え">⠿</span>' +
                        '<span class="pqa-row-label"><span class="pqa-num"></span></span>' +
                        '<button type="button" class="button pqa-remove">削除</button>' +
                    '</div>' +
                    '<div class="pqa-row-body">' +
                        '<input type="hidden" name="people_qa_items[' + idx + '][type]" value="qa">' +
                        '<label>質問</label>' +
                        '<textarea name="people_qa_items[' + idx + '][question]" rows="3" style="width:100%"></textarea>' +
                        '<label>回答</label>' +
                        '<textarea name="people_qa_items[' + idx + '][answer]" rows="5" style="width:100%"></textarea>' +
                    '</div>' +
                '</li>'
            );
            $('#pqa-list').append($li);
            reindex();
            renumber();
        });

        // 画像ブロック追加
        $('#pqa-add-rich').on('click', function () {
            var idx = nextIdx++;
            var $li = $(
                '<li class="pqa-row pqa-row--rich" data-type="rich">' +
                    '<div class="pqa-row-head">' +
                        '<span class="pqa-handle" title="ドラッグで並び替え">⠿</span>' +
                        '<span class="pqa-row-label">📷 画像</span>' +
                        '<button type="button" class="button pqa-remove">削除</button>' +
                    '</div>' +
                    '<div class="pqa-row-body">' +
                        '<input type="hidden" name="people_qa_items[' + idx + '][type]" value="rich">' +
                        '<div class="pqa-image-field">' +
                            '<div class="pqa-image-preview" style="display:none">' +
                                '<img src="" alt="">' +
                            '</div>' +
                            '<input type="hidden" name="people_qa_items[' + idx + '][content]" value="">' +
                            '<div class="pqa-image-actions">' +
                                '<button type="button" class="button pqa-image-select">📷 画像を選択</button>' +
                                '<button type="button" class="button pqa-image-remove" style="display:none">✕ 削除</button>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</li>'
            );
            $('#pqa-list').append($li);
            reindex();
        });

        // 画像選択
        $(document).on('click', '.pqa-image-select', function () {
            var $field = $(this).closest('.pqa-image-field');
            var frame = wp.media({
                title: '画像を選択',
                button: { text: '選択' },
                multiple: false,
                library: { type: 'image' }
            });
            frame.on('select', function () {
                var att = frame.state().get('selection').first().toJSON();
                $field.find('input[type="hidden"]').val(att.url);
                $field.find('.pqa-image-preview img').attr('src', att.url);
                $field.find('.pqa-image-preview').show();
                $field.find('.pqa-image-remove').show();
            });
            frame.open();
        });

        // 画像削除
        $(document).on('click', '.pqa-image-remove', function () {
            var $field = $(this).closest('.pqa-image-field');
            $field.find('input[type="hidden"]').val('');
            $field.find('.pqa-image-preview img').attr('src', '');
            $field.find('.pqa-image-preview').hide();
            $(this).hide();
        });

        // 削除
        $(document).on('click', '.pqa-remove', function () {
            if (!confirm('このブロックを削除しますか？')) return;
            $(this).closest('.pqa-row').remove();
            reindex();
            renumber();
        });

    })(jQuery);
    </script>
    <?php
}

add_action('save_post', 'save_people_qa_meta_box');
function save_people_qa_meta_box($post_id)
{
    if (!isset($_POST['people_qa_nonce']) || !wp_verify_nonce($_POST['people_qa_nonce'], 'people_qa_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    update_post_meta($post_id, 'people_qa_lead', sanitize_textarea_field($_POST['people_qa_lead'] ?? ''));
    update_post_meta($post_id, 'people_qa_afterword', sanitize_textarea_field($_POST['people_qa_afterword'] ?? ''));

    $items = [];
    if (!empty($_POST['people_qa_items']) && is_array($_POST['people_qa_items'])) {
        ksort($_POST['people_qa_items']); // DOM順（0,1,2…）を保持
        foreach ($_POST['people_qa_items'] as $item) {
            $type = sanitize_text_field($item['type'] ?? 'qa');
            if ($type === 'qa') {
                $q = sanitize_textarea_field($item['question'] ?? '');
                $a = sanitize_textarea_field($item['answer'] ?? '');
                if ($q !== '' || $a !== '') {
                    $items[] = ['type' => 'qa', 'question' => $q, 'answer' => $a];
                }
            } elseif ($type === 'rich') {
                $url = esc_url_raw($item['content'] ?? '');
                if ($url !== '') {
                    $items[] = ['type' => 'rich', 'content' => $url];
                }
            }
        }
    }
    update_post_meta($post_id, 'people_qa_items', $items);
}


// ラジオによるフィールドグループの表示切り替え（管理画面）
add_action('admin_footer', function () {
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'post' || !in_array($screen->base, ['post', 'post-new'])) {
        return;
    }
    ?>
    <script>
    (function ($) {
        function toggleGroups(val) {
            var isVideo = (val === '1');
            $('#acf-group_people_video').toggle(isVideo);
            $('#people_qa_box').toggle(!isVideo);
        }

        function init() {
            var $radio = $('[data-name="people_has_video"] input[type="radio"]');
            if (!$radio.length) return;
            toggleGroups($radio.filter(':checked').val() || '0');
            $radio.off('change.people').on('change.people', function () {
                toggleGroups($(this).val());
            });
        }

        if (typeof acf !== 'undefined') {
            acf.addAction('ready', init);
        } else {
            $(init);
        }
    })(jQuery);
    </script>
    <?php
});


// YouTube URL → embed URL 変換
function get_youtube_embed_url($url)
{
    $video_id = '';

    if (preg_match('/youtu\.be\/([^?&\s]+)/', $url, $m)) {
        $video_id = $m[1];
    } elseif (preg_match('/[?&]v=([^&\s]+)/', $url, $m)) {
        $video_id = $m[1];
    } elseif (preg_match('/youtube\.com\/embed\/([^?&\s]+)/', $url, $m)) {
        $video_id = $m[1];
    }

    return $video_id ? 'https://www.youtube.com/embed/' . $video_id : '';
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


// ==============================
// 管理画面「マニュアル」メニュー（Peopleカスタムフィールドの入力ガイド）
// ==============================
add_action('admin_menu', 'register_theme_manual_page');
function register_theme_manual_page()
{
    add_menu_page(
        'マニュアル',
        'マニュアル',
        'edit_posts',
        'theme-manual',
        'render_theme_manual_page',
        'dashicons-book-alt',
        3
    );
}

function render_theme_manual_page()
{
    ?>
    <div class="wrap theme-manual">
        <h1>People 投稿 入力マニュアル</h1>
        <p class="theme-manual__lead">
            「People」は先輩インタビュー・スタッフ紹介として、新卒採用ページ・事業紹介ページ・トップページなど
            サイトの複数箇所に表示される人物データです。入力項目が多いため、このページで役割と注意点をまとめています。
        </p>

        <div class="theme-manual__notice">
            <strong>Peopleの正体について：</strong>
            「People」は通常のWordPressの「投稿」の名称を変更したものです。投稿の一覧・編集画面がそのまま
            Peopleの管理画面として使われています。
        </div>

        <h2>1. 基本情報</h2>
        <table class="widefat theme-manual__table">
            <thead><tr><th>項目</th><th>入力場所</th><th>説明</th></tr></thead>
            <tbody>
                <tr>
                    <td>タイトル</td>
                    <td>編集画面 最上部</td>
                    <td>氏名（日本語）を入力します。一覧・インタビューページの見出しに使用されます。</td>
                </tr>
                <tr>
                    <td>アイキャッチ画像</td>
                    <td>編集画面 右サイドバー</td>
                    <td>「プロフィール写真」未設定時のフォールバック画像として使用されます。</td>
                </tr>
                <tr>
                    <td>役員として登録する</td>
                    <td>タイトル直下のチェックボックス</td>
                    <td>
                        チェックを入れると、People一覧（トップの「People」一覧）・他のメンバースライダー・
                        事業紹介ページの人物リンクから<strong>除外</strong>されます。一覧に出したくない人物のみチェックしてください。
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>2. 「People詳細」フィールド</h2>
        <table class="widefat theme-manual__table">
            <thead><tr><th>フィールド名</th><th>種類</th><th>説明</th></tr></thead>
            <tbody>
                <tr><td>インタビュータイトル</td><td>1行テキスト</td><td>インタビュー記事の見出しコピーです。</td></tr>
                <tr><td>先輩インタビュー引用（メイン）</td><td>1行テキスト</td><td>新卒採用ページの先輩インタビュー枠、1行目のコピーです。</td></tr>
                <tr><td>先輩インタビュー引用（サブ）</td><td>1行テキスト</td><td>新卒採用ページの先輩インタビュー枠、2行目のコピーです。</td></tr>
                <tr><td>氏名（英語）</td><td>1行テキスト</td><td>ローマ字表記の氏名です。日本語氏名の下に併記されます。</td></tr>
                <tr><td>部署・役職</td><td>1行テキスト</td><td>ほぼ全ての表示箇所で使われる重要フィールドです。</td></tr>
                <tr><td>入社年度</td><td>1行テキスト</td><td>「◯◯年入社」表記に使用。新卒採用ページでは在籍年数の計算にも使われます。</td></tr>
                <tr><td>プロフィール写真</td><td>画像</td><td>メインの顔写真です。原寸大で表示されるため、大きすぎる画像は事前にリサイズしてからアップロードしてください。</td></tr>
                <tr>
                    <td>新卒採用ページ用写真（先輩インタビュー）</td>
                    <td>画像</td>
                    <td>
                        新卒採用ページの先輩インタビュー枠専用の写真です。この枠は横長（比率14:9）で表示されるため、
                        「プロフィール写真」とは別に横長構図の写真を用意してアップロードしてください。
                        <strong>「プロフィール写真」を設定していても、このフィールドが未設定だとno-image画像が表示されます。</strong>
                        新卒採用ページの先輩インタビューに表示する人物のみ設定すれば十分です。
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>3. コンテンツ種別（動画あり／なし）の切り替え</h2>
        <p>
            「コンテンツ種別」のラジオボタンで<strong>「動画あり」「動画なし」</strong>を選択すると、
            入力すべき項目セットが自動的に切り替わります（下の2つのセクションのどちらか一方だけが表示されます）。
        </p>
        <div class="theme-manual__notice theme-manual__notice--warn">
            この表示切り替えはJavaScriptによる独自実装です。切り替えても入力済みのデータが消えることはありませんが、
            表示されているのはラジオボタンで選んだ方のセクションのみですので、公開前に選択が正しいか確認してください。
        </div>

        <h3>3-1. 「動画あり」を選んだ場合：動画内容</h3>
        <table class="widefat theme-manual__table">
            <thead><tr><th>フィールド名</th><th>種類</th><th>説明</th></tr></thead>
            <tbody>
                <tr><td>動画URL（YouTube）</td><td>URL</td><td>YouTubeの動画URLを入力します（通常のURL・短縮URL・埋め込みURLいずれも可）。</td></tr>
                <tr><td>リード文</td><td>複数行テキスト</td><td>動画の前に表示される導入文です。</td></tr>
                <tr><td>動画説明文</td><td>複数行テキスト</td><td>動画の内容説明です。</td></tr>
                <tr><td>後書き</td><td>複数行テキスト</td><td>動画の後に表示される文章です。</td></tr>
            </tbody>
        </table>

        <h3>3-2. 「動画なし」を選んだ場合：質問内容（Q&A）</h3>
        <table class="widefat theme-manual__table">
            <thead><tr><th>項目</th><th>説明</th></tr></thead>
            <tbody>
                <tr><td>リード文</td><td>Q&Aの前に表示される導入文です。</td></tr>
                <tr>
                    <td>コンテンツブロック</td>
                    <td>
                        「Q&amp;Aを追加」ボタンで質問・回答のセットを、「画像を追加」ボタンで画像ブロックを追加できます。
                        ブロックはドラッグ&amp;ドロップで並び替え可能です。空の質問・回答・画像は保存時に自動的に除外されます。
                    </td>
                </tr>
                <tr><td>後書き</td><td>Q&amp;Aの後に表示される文章です。</td></tr>
            </tbody>
        </table>

        <h2>4. 他ページとの連携（重要）</h2>
        <p>
            Peopleを新規追加・編集しただけでは、以下のページには自動的に反映されません。
            各ページの編集画面側で「表示するPeopleを選択」する項目があるので、そちらも合わせて更新してください。
        </p>
        <table class="widefat theme-manual__table">
            <thead><tr><th>表示先ページ</th><th>連携方法</th></tr></thead>
            <tbody>
                <tr>
                    <td>新卒採用ページ（先輩インタビュー）</td>
                    <td>
                        新卒ページの編集画面にある「インタビューに表示するPeople」で対象のPeopleを選択します。
                        <strong>選択した順番がそのままスライドの表示順</strong>になります。
                    </td>
                </tr>
                <tr>
                    <td>事業紹介ページ</td>
                    <td>各事業ブロックの「働いている人」欄で、紹介するPeopleを選択します。</td>
                </tr>
                <tr>
                    <td>トップページ</td>
                    <td>各事業紹介セクション、および「People」セクションで、紹介するPeopleを選択します。</td>
                </tr>
            </tbody>
        </table>

        <h2>5. 入力時の注意点まとめ</h2>
        <ul class="theme-manual__list">
            <li>システム上、必須項目はありませんが、<strong>氏名・部署・入社年度・プロフィール写真</strong>はほぼ全ての表示箇所で使われるため、実質必須と考えて入力してください。</li>
            <li>プロフィール写真は原寸大で表示されます。サイズが大きすぎる画像はページの表示速度に影響するため、適切な解像度にリサイズしてからアップロードしてください。</li>
            <li>「役員として登録する」にチェックが入っていると、People一覧やスライダー、リンクから見えなくなります。表示されないという問い合わせがあった場合はまずこのチェックを確認してください。</li>
            <li>「動画あり／なし」の切り替えは保存されているデータを消しません。切り替えて選択し直しても、以前入力した内容はそのまま残ります。</li>
            <li>新卒採用ページの先輩インタビューは、Peopleを選択した順番で表示されるため、並び替えたい場合は新卒ページ側の「インタビューに表示するPeople」の選択順を変更してください。</li>
            <li>新卒採用ページの先輩インタビュー画像は「プロフィール写真」ではなく「新卒採用ページ用写真（先輩インタビュー）」フィールドを見ています。表示枠が横長のため、専用の写真を別途アップロードしてください。</li>
        </ul>
    </div>
    <style>
        .theme-manual__lead { font-size: 14px; max-width: 900px; }
        .theme-manual__notice {
            background: #fff;
            border-left: 4px solid #2271b1;
            padding: 12px 16px;
            margin: 16px 0;
            max-width: 900px;
        }
        .theme-manual__notice--warn { border-left-color: #d63638; }
        .theme-manual__table { max-width: 900px; margin: 12px 0 28px; }
        .theme-manual__table th, .theme-manual__table td { padding: 8px 12px; vertical-align: top; }
        .theme-manual__list { max-width: 900px; line-height: 1.8; }
        .theme-manual h2 { margin-top: 32px; }
    </style>
    <?php
}


// 管理画面カスタマイズ用のCSS読み込み
function custom_login_stylesheet() {
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/login-style.css');
}

add_action('login_enqueue_scripts', 'custom_login_stylesheet');
