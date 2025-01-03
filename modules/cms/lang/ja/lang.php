<?php

return [
    'cms_object' => [
        'invalid_file' => '正しくないファイル名：:name。ファイル名は英文字、下線(_)、ダッシュ(-)、ピリオド(.)で構成されなくてはなりません。（正しいファイル名の例：page, page.htm, subdirectory/page）',
        'invalid_property' => '":name"プロパティーをセットできません。',
        'file_already_exists' => '":name"ファイルは既に存在しています。',
        'error_saving' => '":name"ファイル保存エラー',
        'error_creating_directory' => ':nameディレクトリー作成エラー',
        'invalid_file_extension' => '正しくないファイル拡張子：:invalid。許されている拡張子は、:allowedです。',
        'error_deleting' => '":name"一時ファイル削除エラー',
        'delete_success' => ':count個のテンプレートを削除しました。',
        'file_name_required' => 'ファイル名フィールドが必要です。',
        'safe_mode_enabled' => '現在、セーフモードが有効になっています。CMS テンプレートの PHP コードの編集はできません。セーフモードを無効にするには、`cms.enableSafeMode`設定値を`false`に設定します。',
    ],
    'dashboard' => [
        'active_theme' => [
            'online' => 'オンライン',
            'maintenance' => 'メンテナンスモード',
            'manage_themes' => 'テーマの管理',
            'customize_theme' => 'テーマのカスタマイズ',
        ],
    ],
    'theme' => [
        'not_found_name' => 'テーマ":name"が見つかりませんでした。',
        'active' => [
            'not_set' => 'アクティブなテーマが設定されていません。',
            'not_found' => 'アクティブなテーマが見つかりません。',
        ],
        'edit' => [
            'not_set' => '編集テーマが設定されていません。',
            'not_found' => '編集テーマが見つかりません。',
            'not_match' => 'アクセスしようとしてるオブジェクトは、編集中のテーマに所属していません。ページを再読み込みしてください。',
        ],
        'settings_menu' => 'フロントエンドのテーマ',
        'settings_menu_description' => 'インストール済みのテーマのプレビュー一覧とアクティブテーマの選択。',
        'find_more_themes' => 'Winter CMSマーケットプレースで、もっとテーマを探す。',
        'activate_button' => 'これをアクティブにする',
        'active_button' => '現在アクティブ中です',
        'customize_button' => 'カスタマイズ',
        'default_tab' => 'プロパティ',
        'name_label' => '名前',
        'name_create_placeholder' => '新しいテーマ名',
        'author_label' => '作者',
        'author_placeholder' => '個人名または会社名',
        'description_label' => '説明',
        'description_placeholder' => 'テーマの説明',
        'homepage_label' => 'ホームページ',
        'homepage_placeholder' => 'ウェブサイトのURL',
        'code_label' => 'コード',
        'code_placeholder' => '配布に使用されるこのテーマ独自のコード',
        'preview_image_label' => 'プレビュー画像',
        'preview_image_placeholder' => 'テーマのプレビュー画像のパス',
        'dir_name_label' => 'ディレクトリ名',
        'dir_name_create_label' => 'テーマディレクトリの保存先',
        'theme_label' => 'テーマ',
        'theme_title' => 'テーマ',
        'customize_theme' => 'テーマのカスタマイズ',
        'duplicate_button' => '複製',
        'duplicate_title' => 'テーマを複製する',
        'duplicate_theme_success' => 'テーマが複製されました！',
        'manage_button' => '管理',
        'manage_title' => 'テーマの管理',
        'edit_properties_title' => 'テーマ',
        'edit_properties_button' => 'プロパティを編集する',
        'save_properties' => 'プロパティを保存',
        'import_button' => 'インポート',
        'import_title' => 'テーマのインポート',
        'import_theme_success' => 'テーマがインポートされました！',
        'import_uploaded_file' => 'テーマのアーカイブファイル',
        'import_overwrite_label' => '既存ファイルを上書きする',
        'import_overwrite_comment' => '新しいファイルだけをインポートするにはこのボックスをオフにします',
        'import_folders_label' => 'フォルダー',
        'import_folders_comment' => 'インポートしたいテーマフォルダを選択してください',
        'export_button' => 'エクスポート',
        'export_title' => 'テーマのエクスポート',
        'export_folders_label' => 'フォルダー',
        'export_folders_comment' => 'エクスポートしたいテーマフォルダを選択してください',
        'delete_button' => '削除',
        'delete_confirm' => 'このテーマを削除しますか？元に戻せません！',
        'delete_active_theme_failed' => 'アクティブなテーマを削除できません、まず他のテーマをアクティブにしてみてください',
        'delete_theme_success' => 'テーマが削除されました！',
        'create_title' => 'テーマを作成',
        'create_button' => '作成',
        'create_new_blank_theme' => '新しい空白のテーマを作成する',
        'create_theme_success' => 'テーマが作成されました！',
        'create_theme_required_name' => 'テーマの名前を指定してください',
        'new_directory_name_label' => 'テーマディレクトリ',
        'new_directory_name_comment' => '複製されたテーマに新しいディレクトリ名を提供します',
        'dir_name_invalid' => '名前には数字、ラテン文字、および以下の記号のみを含めることができます。_-',
        'dir_name_taken' => '希望のテーマディレクトリは既に存在します。',
        'find_more_themes' => '他のテーマを検索する',
        'saving' => 'テーマの保存...',
        'return' => 'テーマ一覧に戻る',
    ],
    'maintenance' => [
        'settings_menu' => 'メンテナンスモード',
        'settings_menu_description' => 'メンテナンスモードページの設定と切り替えをします。',
        'is_enabled' => 'メンテナンスモードを有効にする',
        'is_enabled_comment' => 'メンテナンスモードの時、Webサイト訪問者が見るページを選択してください。',
        'hint' => 'メンテナンスモードは、バックエンド領域にサインインしていない訪問者にメンテナンスページを表示します',
        'allowed_ips' => [
            'name' => '許可されたIPアドレス',
            'description' => 'メンテナンスモードが有効な間、サイトの閲覧が許可されるIPアドレス',
            'prompt' => 'IPアドレスを追加',
            'ip' => 'IPアドレス',
            'label' => '説明',
        ],
    ],
    'page' => [
        'not_found_name' => "ページ ':name' が見つかりません。",
        'not_found' => [
            'label' => 'ページが見つかりません。',
            'help' => '要求されているページが見つかりません。',
        ],
        'custom_error' => [
            'label' => 'ページエラー。',
            'help' => '申し訳ありません。何かが間違っているようで、ページが表示できません。',
        ],
        'menu_label' => 'ページ',
        'unsaved_label' => '保存されていないページ',
        'no_list_records' => 'ページが見つかりません',
        'new' => '新ページ',
        'invalid_url' => '正しくないURL形式。URLはスラッシュ(/)で始まり、数字、ラテン文字、._-[]:?|/+*^$で構成します。',
        'delete_confirm_multiple' => '指定した全ページを本当に削除しますか？',
        'delete_confirm_single' => '本当にこのページを削除しますか？',
        'no_layout' => '-- レイアウト無し --',
        'cms_page' => 'CMSページ',
        'title' => 'ページタイトル',
        'url' => 'ページURL',
        'file_name' => 'ページファイル名',
    ],
    'layout' => [
        'not_found_name' => "レイアウト':name'が見つかりません。",
        'menu_label' => 'レイアウト',
        'unsaved_label' => '保存されていないレイアウト',
        'no_list_records' => 'レイアウトが見つかりません',
        'new' => '新レイアウト',
        'delete_confirm_multiple' => '指定した全ページを本当に削除しますか？',
        'delete_confirm_single' => '本当にこのページを削除しますか？',
    ],
    'partial' => [
        'not_found_name' => "':name'パーシャルが見つかりません。",
        'invalid_name' => '正しくないパーシャル名：:name。',
        'menu_label' => 'パーシャル',
        'unsaved_label' => '保存されていないパーシャル(s)',
        'no_list_records' => 'パーシャルが見つかりません。',
        'delete_confirm_multiple' => '指定した全パーシャルを本当に削除しますか？',
        'delete_confirm_single' => '本当にこのパーシャルを削除しますか？',
        'new' => '新パーシャル',
    ],
    'content' => [
        'not_found_name' => "':name'コンテンツファイルが見つかりません。",
        'menu_label' => 'コンテンツ',
        'unsaved_label' => '保存されていないコンテンツ',
        'no_list_records' => 'コンテンツファイルが見つかりません',
        'delete_confirm_multiple' => '指定した全コンテンツファイル／ディレクトリーを本当に削除しますか？',
        'delete_confirm_single' => '本当にこのコンテンツファイルを削除しますか？',
        'new' => '新コンテンツファイル',
    ],
    'ajax_handler' => [
        'invalid_name' => '正しくないAjaxハンドラ名：:name。',
        'not_found' => "':name' Ajaxハンドラが見つかりません。",
    ],
    'cms' => [
        'menu_label' => 'CMS',
    ],
    'sidebar' => [
        'add' => '追加',
        'search' => '検索...',
    ],
    'editor' => [
        'settings' => '設定',
        'title' => 'タイトル',
        'new_title' => '新ページタイトル',
        'url' => 'URL',
        'filename' => 'ファイル名',
        'layout' => 'レイアウト',
        'description' => '説明',
        'preview' => 'プレビュー',
        'meta' => 'メタ',
        'meta_title' => 'メタタイトル',
        'meta_description' => 'メタ説明',
        'markup' => 'マークアップ',
        'code' => 'コード',
        'content' => 'コンテンツ',
        'hidden' => '非表示',
        'hidden_comment' => 'フロントエンドでページを表示しないようにします。バックエンドでのみ閲覧・編集できます。',
        'enter_fullscreen' => '全画面モードに移行する',
        'exit_fullscreen' => '全画面モードを解除する',
        'open_searchbox' => '検索ボックスを開く',
        'close_searchbox' => '検索ボックスを閉じる',
        'open_replacebox' => '置換ボックスを開く',
        'close_replacebox' => '置換ボックスを閉じる',
        'commit' => 'コミット',
        'reset' => 'リセット',
        'commit_confirm' => 'このファイルへの変更をファイルシステムにコミットしてよろしいですか？これは、ファイルシステム上の既存のファイルを上書きします。',
        'reset_confirm' => '本当にこのファイルをファイルシステム上のコピーにリセットしますか？これは、ファイルシステム上にあるファイルに完全に置き換えます。',
        'committing' => 'コミット',
        'resetting' => 'リセット',
        'commit_success' => 'タイプはファイルシステムにコミットされました。',
        'reset_success' => 'ファイルシステムのバージョンに :type がリセットされました。',
    ],
    'asset' => [
        'menu_label' => 'アセット',
        'unsaved_label' => '保存されていないアセット',
        'drop_down_add_title' => '追加...',
        'drop_down_operation_title' => 'アクション...',
        'upload_files' => 'ファイルアップロード',
        'create_file' => 'ファイル作成',
        'create_directory' => 'ディレクトリ作成',
        'directory_popup_title' => '新規ディレクトリ',
        'directory_name' => 'ディレクトリ名',
        'rename' => '名前変更',
        'delete' => '削除',
        'move' => '移動',
        'select' => '選択',
        'new' => '新ファイル',
        'invalid_path' => 'パスは数字、ラテン文字、空白、._-/で構成されなくてはなりません。',
        'error_deleting_file' => ':nameファイル削除エラー。',
        'error_deleting_dir_not_empty' => ':nameディレクトリ削除エラー。ディレクトリが空ではありません。',
        'error_deleting_dir' => ':nameディレクトリ削除エラー。',
        'invalid_name' => '名前は数字、ラテン文字、空白、._-で構成されなくてはなりません。',
        'original_not_found' => '元のファイル／ディレクトリが見つかりません',
        'already_exists' => 'この名前のファイル／ディレクトリは既に存在します。',
        'error_renaming' => 'ファイル／ディレクトリ名前変更エラー',
        'name_cant_be_empty' => '名前は空白にできません',
        'too_large' => 'アップロードファイルは大きすぎます。ファイルサイズは最大で、:max_sizeです。',
        'type_not_allowed' => '許可されているファイルタイプは、:allowed_typesだけです。',
        'file_not_valid' => 'ファイルが正しくありません。',
        'error_uploading_file' => '":name":ファイルアップロードエラー。(:error)',
        'move_destination' => '移動先ディレクトリー',
        'move_popup_title' => 'アセット移動',
        'selected_files_not_found' => '選択されたファイルは存在しません。',
        'select_destination_dir' => '移動先ディレクトリーを選択してください',
        'destination_not_found' => '移動先ディレクトリーは存在しません。',
        'error_moving_file' => ':fileファイル移動エラー',
        'error_moving_directory' => ':dirディレクトリー移動エラー',
        'error_deleting_directory' => '移動元:dirディレクトリー削除エラー',
        'no_list_records' => 'ファイルが見つかりません。',
        'delete_confirm' => 'ファイルが見つかりません、選択したファイルやディレクトリを削除しましたか？',
        'path' => 'パス',
    ],
    'component' => [
        'menu_label' => 'コンポーネント',
        'unnamed' => '名前なし',
        'no_description' => '説明なし',
        'alias' => 'エイリアス',
        'alias_description' => 'ページやレイアウトコードの中で使用される、一意のコンポーネント名。',
        'validation_message' => 'ラテン文字、数字、下線(_)で構成された、コンポーネントエイリアスが必要です。エイリアスはラテン文字で始まらなくてなりません。',
        'invalid_request' => 'コンポーネントデータが正しくないため、テンプレートは保存できません。',
        'no_records' => 'コンポーネントが見つかりません。',
        'not_found' => "':name'コンポーネントが見つかりません。",
        'no_default_partial' => 'このコンポーネントは、「デフォルト」のパーシャルを持ちません。',
        'method_not_found' => "':name'コンポーネントは、':method'メソッドを持っていません。",
        'soft_component' => 'ソフトコンポーネント',
        'soft_component_description' => 'このコンポーネントは欠落しているが、オプションである。',
    ],
    'template' => [
        'invalid_type' => '未知のテンプレートタイプ。',
        'not_found' => 'リクエストされたテンプレートが見つかりません。',
        'saved' => 'テンプレートを保存しました。',
        'no_list_records' => 'レコードが見つかりません',
        'delete_confirm' => '選択したテンプレートを削除しますか？',
        'order_by' => 'Order by',
    ],
    'permissions' => [
        'name' => 'CMS',
        'manage_content' => 'コンテンツ管理',
        'manage_assets' => 'アセット管理',
        'manage_pages' => 'ページ管理',
        'manage_layouts' => 'レイアウト管理',
        'manage_partials' => 'パーシャル管理',
        'manage_themes' => 'テーマ管理',
        'manage_theme_options' => 'アクティブなテーマのカスタマイズ・オプションを設定する',
    ],
    'theme_log' => [
        'hint' => 'このログは、バックエンドエリアで管理者がテーマに加えた変更を表示します。',
        'menu_label' => 'テーマログ',
        'menu_description' => 'アクティブなテーマに加えられた変更を表示します',
        'empty_link' => 'テーマログを空にする',
        'empty_loading' => 'テーマログを空にしています...',
        'empty_success' => 'テーマログを空にしました',
        'return_link' => 'テーマログに戻る',
        'id' => 'ID',
        'id_label' => 'ログID',
        'created_at' => '日付と時刻',
        'user' => 'ユーザー',
        'type' => 'タイプ',
        'type_create' => '作成',
        'type_update' => '更新',
        'type_delete' => '削除',
        'theme_name' => 'テーマ',
        'theme_code' => 'テーマコード',
        'old_template' => 'テンプレート（旧）',
        'new_template' => 'テンプレート（新規）',
        'template' => 'テンプレート',
        'diff' => '変更点',
        'old_value' => '古い値',
        'new_value' => '新しい値',
        'preview_title' => 'テンプレートの変更',
        'template_updated' => 'テンプレートが更新されました',
        'template_created' => 'テンプレートが作成されました',
        'template_deleted' => 'テンプレートは削除されました',
    ],
];
