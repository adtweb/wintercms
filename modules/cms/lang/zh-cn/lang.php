<?php

return [
    'cms_object' => [
        'invalid_file' => '非法文件名： :name。文件名中只能包括字母或数字, _, - 和 .. 正确的文件名: page.htm, page, subdirectory/page',
        'invalid_property' => "无法设置属性 ':name' ",
        'file_already_exists' => "文件 ':name' 已存在.",
        'error_saving' => "保存文件 ':name' 错误。请检查写权限。",
        'error_creating_directory' => '创建文件夹 :name 错误。请检查写权限。',
        'invalid_file_extension' => '非法文件扩展名: :invalid. 允许的扩展名: :allowed.',
        'error_deleting' => "删除模板文件 ':name' 错误. 请检查写权限.",
        'delete_success' => '成功删除模板: :count.',
        'file_name_required' => '需要文件名字段.',
        'safe_mode_enabled' => '已启用安全模式.',
    ],
    'dashboard' => [
        'active_theme' => [
            'widget_title_default' => 'Website',
            'online' => '在线',
            'maintenance' => '维护',
            'manage_themes' => '管理主题',
            'customize_theme' => '自定义主题',
        ],
    ],
    'theme' => [
        'not_found_name' => "未找到主题 ':name'",
        'by_author' => '作者 :name',
        'active' => [
            'not_set' => '未设置活动主题',
            'not_found' => '无法找到活动主题',
        ],
        'edit' => [
            'not_set' => '未设置编辑主题.',
            'not_found' => '无法找到编辑主题',
            'not_match' => '您所尝试访问的对象不属于正在编辑的主题。请重载页面。',
        ],
        'settings_menu' => '前端主题',
        'settings_menu_description' => '选择一个活动主题以预览。',
        'default_tab' => '属性',
        'name_label' => '名称',
        'name_create_placeholder' => '新主题名',
        'author_label' => '作者',
        'author_placeholder' => '成员或制作组名',
        'description_label' => '描述',
        'description_placeholder' => '主题描述',
        'homepage_label' => '主页',
        'homepage_placeholder' => '网站地址',
        'code_label' => '代码',
        'code_placeholder' => '主题发行唯一码',
        'preview_image_label' => '预览图',
        'preview_image_placeholder' => '预览图路径.',
        'dir_name_label' => '目录名',
        'dir_name_create_label' => '目标主题目录',
        'theme_label' => '主题',
        'theme_title' => '主题',
        'activate_button' => '激活',
        'active_button' => '激活',
        'customize_theme' => '自定义主题',
        'customize_button' => '自定义',
        'duplicate_button' => '复制',
        'duplicate_title' => '复制主题',
        'duplicate_theme_success' => '复制主题成功!',
        'manage_button' => '管理',
        'manage_title' => '管理主题',
        'edit_properties_title' => '主题',
        'edit_properties_button' => '编辑属性',
        'save_properties' => '保存属性',
        'import_button' => '导入',
        'import_title' => '导入主题',
        'import_theme_success' => '成功导入主题!',
        'import_uploaded_file' => '主题存档文件',
        'import_overwrite_label' => '覆盖已存在的文件',
        'import_overwrite_comment' => '取消勾选以仅导入新文件',
        'import_folders_label' => '文件夹',
        'import_folders_comment' => '请选择你想要导入的主题文件夹',
        'export_button' => '导出',
        'export_title' => '导出主题',
        'export_folders_label' => '文件夹',
        'export_folders_comment' => '请选择你想要导入的主题文件夹',
        'delete_button' => '删除',
        'delete_confirm' => '您确定删除这个主题吗? 此操作不能被撤销!',
        'delete_active_theme_failed' => '无法删除此活动主题, 请先尝试其他主题.',
        'delete_theme_success' => '删除主题成功!',
        'create_title' => '创建主题',
        'create_button' => '创建',
        'create_new_blank_theme' => '创建空白主题',
        'create_theme_success' => '创建主题成功!',
        'create_theme_required_name' => '请指点主题名.',
        'new_directory_name_label' => '主题目录',
        'new_directory_name_comment' => '提供复制主题的新闻目录名.',
        'dir_name_invalid' => '名称只能包含数字, 拉丁字母和以下字符: _-',
        'dir_name_taken' => '主题目录已存在.',
        'find_more_themes' => '在 Winter CMS 主题商店中查找更多主题',
        'saving' => '保存主题中...',
        'return' => '返回主题列表',
    ],
    'maintenance' => [
        'settings_menu' => '维护模式',
        'settings_menu_description' => '配置维护模式页面和开关设置.',
        'is_enabled' => '启用维护模式',
        'is_enabled_comment' => '当启用时, 网站访问者会看到下述页面.',
        'hint' => '维护模式将对未登陆后台的访客展示维护页面.',
    ],
    'page' => [
        'not_found_name' => "无法找到页面 ':name'",
        'not_found' => [
            'label' => '无法找到页面',
            'help' => '无法找到所请求的页面',
        ],
        'custom_error' => [
            'label' => '页面错误',
            'help' => '很抱歉，发生了错误导致页面不能显示.',
        ],
        'menu_label' => '页面',
        'unsaved_label' => '未保存页面',
        'no_list_records' => '找不到页面',
        'new' => '新页面',
        'invalid_url' => '不合法的URL格式. URL可以以正斜杠开头, 包含数字, 拉丁字母和下面的字符: ._-[]:?|/+*^$',
        'delete_confirm_multiple' => '真的想要删除选择的页面吗?',
        'delete_confirm_single' => '真的想要删除这个页面吗?',
        'no_layout' => '-- 无布局 --',
        'cms_page' => 'CMS 页面',
        'title' => '页面标题',
        'url' => '页面URL',
        'file_name' => '页面文件名',
    ],
    'layout' => [
        'not_found_name' => "布局 ':name' 找不到",
        'menu_label' => '布局',
        'unsaved_label' => '未保存布局',
        'no_list_records' => '找不到布局',
        'new' => '新布局',
        'delete_confirm_multiple' => '您真的想要删除选中的布局?',
        'delete_confirm_single' => '您真的想要删除这个布局?',
    ],
    'partial' => [
        'not_found_name' => "部件 ':name' 找不到.",
        'invalid_name' => '非法的部件名: :name.',
        'menu_label' => '部件',
        'unsaved_label' => '未保存的部件',
        'no_list_records' => '无法找到部件',
        'delete_confirm_multiple' => '您真的想要删除选择的部件?',
        'delete_confirm_single' => '您真的想要删除这个部件?',
        'new' => '新部件',
    ],
    'content' => [
        'not_found_name' => "无法找到内容文件 ':name'",
        'menu_label' => '内容',
        'unsaved_label' => '未保存内容',
        'no_list_records' => '无法找到内容文件',
        'delete_confirm_multiple' => '您真的想要删除选中的文件或目录吗?',
        'delete_confirm_single' => '您真的想要删除这个内容文件?',
        'new' => '新内容文件',
    ],
    'ajax_handler' => [
        'invalid_name' => '非法 AJAX 处理器: :name.',
        'not_found' => "无法找到 AJAX 处理器 ':name' ",
    ],
    'cms' => [
        'menu_label' => '内容管理系统',
    ],
    'sidebar' => [
        'add' => '增加',
        'search' => '搜索...',
    ],
    'editor' => [
        'settings' => '设置',
        'title' => '标题',
        'new_title' => '新文件标题',
        'url' => 'URL',
        'filename' => '文件名',
        'layout' => '布局',
        'description' => '描述',
        'preview' => '预览',
        'meta' => '元素',
        'meta_title' => '元素标题',
        'meta_description' => '元素描述',
        'markup' => '标记',
        'code' => '代码',
        'content' => '内容',
        'hidden' => '隐藏',
        'hidden_comment' => '隐藏页面只能被已登录的后台用户访问.',
        'enter_fullscreen' => '进入全屏模式',
        'exit_fullscreen' => '退出全屏模式',
        'open_searchbox' => '打开搜索框',
        'close_searchbox' => '关闭搜索框',
        'open_replacebox' => '打开替换框',
        'close_replacebox' => '关闭替换框',
        'commit' => '提交',
        'reset' => '重置',
        'commit_confirm' => '您是否确认保存对文件的修改?这将会对原有的文件内容进行覆盖',
        'reset_confirm' => '您是否确认重置对文件的修改?这将会完全恢复文件到原来的内容',
        'committing' => '提交中...',
        'resetting' => '重置中...',
        'commit_success' => ' :type 保存成功',
        'reset_success' => ' :type 重置成功',
    ],
    'asset' => [
        'menu_label' => '资源',
        'unsaved_label' => '未保存的资源',
        'drop_down_add_title' => '增加...',
        'drop_down_operation_title' => '动作...',
        'upload_files' => '上传文件',
        'create_file' => '新建文件',
        'create_directory' => '新建目录',
        'directory_popup_title' => '新目录',
        'directory_name' => '目录名',
        'rename' => '重命名',
        'delete' => '删除',
        'move' => '移动',
        'select' => '选择',
        'new' => '新文件',
        'invalid_path' => '路径名称只能包含数字, 拉丁字母和以下字符: _-/',
        'error_deleting_file' => '删除文件 :name 错误.',
        'error_deleting_dir_not_empty' => '删除目录 :name 错误. 目录不为空.',
        'error_deleting_dir' => '删除文件 :name 错误.',
        'invalid_name' => '名称只能包含数字, 拉丁字母, 空格和以下字符: _-',
        'original_not_found' => '原始文件或目录找不到',
        'already_exists' => '文件或目录已存在',
        'error_renaming' => '重命名文件或目录错误',
        'name_cant_be_empty' => '名称不能为空',
        'too_large' => '上传的文件太大. 最大文件大小是 :max_size',
        'type_not_allowed' => '只有下面的文件类型是允许的: :allowed_types',
        'file_not_valid' => '文件不合法',
        'error_uploading_file' => "上传文件错误 ':name': :error",
        'move_destination' => '目标目录',
        'move_popup_title' => '移动资源',
        'selected_files_not_found' => '无法找到已选择的文件',
        'select_destination_dir' => '请选择目标目录',
        'destination_not_found' => '无法找到目标目录',
        'error_moving_file' => '移动文件 :file 错误',
        'error_moving_directory' => '移动目录 :dir 错误',
        'error_deleting_directory' => '删除原始目录 :dir 错误',
        'no_list_records' => '资源文件为空',
        'delete_confirm' => '确定删除选中的文件或文件夹?',
        'path' => '路径',
    ],
    'component' => [
        'menu_label' => '组件',
        'unnamed' => '未命名',
        'no_description' => '没有描述',
        'alias' => '别名',
        'alias_description' => '在页面或者布局代码中组件的唯一名称',
        'validation_message' => '需要组件别名, 且只能包含拉丁字符, 数字和下划线. 别名必须以拉丁字符开头.',
        'invalid_request' => '组件数据非法，无法保存',
        'no_records' => '无法找到找不到',
        'not_found' => "无法找到组件 ':name'",
        'method_not_found' => "组件 ':name' 中无方法 ':method'.",
    ],
    'template' => [
        'invalid_type' => '未知模板类型.',
        'not_found' => '无法找到所请求的模板',
        'saved' => '模板保存成功.',
        'no_list_records' => '模板文件为空',
        'delete_confirm' => '确认删除选中的模板?',
        'order_by' => '排序方式',
    ],
    'permissions' => [
        'name' => 'CMS',
        'manage_content' => '管理内容',
        'manage_assets' => '管理资源',
        'manage_pages' => '管理页面',
        'manage_layouts' => '管理布局',
        'manage_partials' => '管理部件',
        'manage_themes' => '管理主题',
        'manage_theme_options' => '管理主题的自定义选项',
    ],
    'theme_log' => [
        'hint' => '显示管理员在后台对主题的所有操作日志',
        'menu_label' => '主题操作日志',
        'menu_description' => '查看对激活主题的操作日志.',
        'empty_link' => '清空操作日志',
        'empty_loading' => '清空主题操作日志中...',
        'empty_success' => '主题操作日志清空成功',
        'return_link' => '返回主题操作日志',
        'id' => '序号',
        'id_label' => '日志 序号',
        'created_at' => '日志生成时间',
        'user' => '用户名',
        'type' => '操作类型',
        'type_create' => '创建',
        'type_update' => '更新',
        'type_delete' => '删除',
        'theme_name' => '主题名',
        'theme_code' => '主题code',
        'old_template' => '文件名 (Old)',
        'new_template' => '文件名 (New)',
        'template' => '文件名',
        'diff' => '文件修改对比',
        'old_value' => '文件修改前',
        'new_value' => '文件修改后',
        'preview_title' => '文件修改详情',
        'template_updated' => '文件已更新',
        'template_created' => '文件已创建',
        'template_deleted' => '文件已删除',
    ],
];
