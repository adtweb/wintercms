<div
      id="editorpreferencesCodeeditor"
      class="field-codeeditor size-large layout-relative"
      data-control="codeeditor"
      data-font-size="<?= $model->editor_font_size ?>"
      data-word-wrap="<?= $model->editor_word_wrap ?>"
      data-code-folding="<?= $model->editor_code_folding ?>"
      data-tab-size="<?= $model->editor_tab_size ?>"
      data-theme="<?= $model->editor_theme ?>"
      data-show-invisibles="<?= $model->editor_show_invisibles ?>"
      data-highlight-active-line="<?= $model->editor_highlight_active_line ?>"
      data-use-soft-tabs="<?= ! $model->editor_use_hard_tabs ?>"
      data-autocompletion="<?= $model->editor_autocompletion ?>"
      data-enable-snippets="<?= $model->editor_enable_snippets ?>"
      data-display-indent-guides="<?= $model->editor_display_indent_guides ?>"
      data-show-print-margin="<?= $model->editor_show_print_margin ?>"
      data-show-gutter="<?= $model->editor_show_gutter ? 'true' : 'false' ?>"
      data-language="css"
      data-margin="0"
      data-vendor-path="<?= Url::asset('/modules/backend/formwidgets/codeeditor/assets/vendor/ace') ?>/">
      <textarea name="editorpreferences_codeeditor"><?= e($this->makePartial('example_code')) ?></textarea>
</div>
