<?php

return [
    'cms_object' => [
        'invalid_file' => "Nom d'arxiu invàlid: :name. Els noms d'arxiu només poden contenir símbols alfanumèrics, subratllats, guions i punts. Exemples de noms d'arxiu correctes: pagina.htm, pagina, subdirectori/pagina",
        'invalid_property' => "No es pot establir a propietat ':name'",
        'file_already_exists' => "L'arxiu ':name' ja existeix.",
        'error_saving' => "Error guardant l'arxiu ':name'. Si us plau revisa els permisos d'escriptura.",
        'error_creating_directory' => "Error creant el directori ':name'. Si us plau revisa els permisos d'escriptura.",
        'invalid_file_extension' => "Extensió d'arxiu invàlida: :invalid. Extensions permeses: :allowed.",
        'error_deleting' => "Error eliminant l'arxiu de plantilla ':name'. Si us plau revisa els permisos d'escriptura.",
        'delete_success' => 'Plantilles eliminades: :count.',
        'file_name_required' => "El camp 'Nom d'arxiu' és obligatori.",
        'safe_mode_enabled' => 'El mode segur està activat.',
    ],
    'dashboard' => [
        'active_theme' => [
            'widget_title_default' => 'Lloc web',
            'online' => 'Online',
            'maintenance' => 'En manteniment',
            'manage_themes' => 'Gestionar temes',
            'customize_theme' => 'Personalitzar tema',
        ],
    ],
    'theme' => [
        'not_found_name' => "No s'ha trobat el tema ':name'.",
        'by_author' => 'Per :name',
        'active' => [
            'not_set' => "No s'ha establit un tema actiu.",
            'not_found' => "No s'ha trobat el tema actiu.",
        ],
        'edit' => [
            'not_set' => "No s'ha establit un tema d'edició.",
            'not_found' => "No s'ha trobat el tema d'edició.",
            'not_match' => "L'objecte al que estàs intentant accedir no pertany al tema que estàs editant. Si us plau recarrega la pàgina.",
        ],
        'settings_menu' => 'Tema de front-end',
        'settings_menu_description' => 'Gestionar el tema de front-end i les opcions de personalització.',
        'default_tab' => 'Propietats',
        'name_label' => 'Nom',
        'name_create_placeholder' => 'Nou nom del tema',
        'author_label' => 'Autor',
        'author_placeholder' => 'Persona o companyia',
        'description_label' => 'Descripció',
        'description_placeholder' => 'Descripció del tema',
        'homepage_label' => 'Lloc web',
        'homepage_placeholder' => 'URL del lloc web',
        'code_label' => 'Codi',
        'code_placeholder' => 'Un codi únic per aquest tema utilitzat per a la distribució',
        'preview_image_label' => 'Imatge de previsualització',
        'preview_image_placeholder' => 'La ruta de la imatge de previsualització.',
        'dir_name_label' => 'Nom del directori',
        'dir_name_create_label' => 'El directori de destí del tema',
        'theme_label' => 'Tema',
        'theme_title' => 'Temes',
        'activate_button' => 'Activar',
        'active_button' => 'Activar',
        'customize_theme' => 'Personalitzar tema',
        'customize_button' => 'Personalitzar',
        'duplicate_button' => 'Duplicar',
        'duplicate_title' => 'Duplicar tema',
        'duplicate_theme_success' => 'Tema duplicat!',
        'manage_button' => 'Gestionar',
        'manage_title' => 'Gestionar el tema',
        'edit_properties_title' => 'Tema',
        'edit_properties_button' => 'Editar propietats',
        'save_properties' => 'Guardar propietats',
        'import_button' => 'Importar',
        'import_title' => 'Importar tema',
        'import_theme_success' => 'Tema importat!',
        'import_uploaded_file' => 'Arxiu de tema',
        'import_overwrite_label' => 'Sobreescriure arxius existents',
        'import_overwrite_comment' => 'Desmarca aquesta casella per importar només arxius nous',
        'import_folders_label' => 'Carpetes',
        'import_folders_comment' => 'Si us plau selecciona les carpetes del tema que vols importar',
        'export_button' => 'Exportar',
        'export_title' => 'Exportar tema',
        'export_folders_label' => 'Carpetes',
        'export_folders_comment' => 'Si us plau selecciona les carpetes del tema que vols exportar',
        'delete_button' => 'Eliminar',
        'delete_confirm' => 'Eliminar aquest tema? No es pot desfer!',
        'delete_active_theme_failed' => 'No es pot eliminar el tema actiu, estableix un altre tema com a actiu primer.',
        'delete_theme_success' => 'Tema eliminat!',
        'create_title' => 'Crear tema',
        'create_button' => 'Crear',
        'create_new_blank_theme' => 'Crear un nou tema buit',
        'create_theme_success' => 'Tema creat!',
        'create_theme_required_name' => 'Si us plau indica un nom pel nou tema.',
        'new_directory_name_label' => 'Directori del tema',
        'new_directory_name_comment' => 'Indica un nou nom de directori per al tema duplicat.',
        'dir_name_invalid' => 'El nom només pot contenir números, lletres llatines i els següents símbols: _-',
        'dir_name_taken' => 'El nom de directori desitjat ja existeix.',
        'find_more_themes' => 'Trobar més temes',
        'saving' => 'Guardant tema...',
        'return' => 'Tornar a la llista de temes',
    ],
    'maintenance' => [
        'settings_menu' => 'Mode de manteniment',
        'settings_menu_description' => "Configura el mode de manteniment i canvia l'activació.",
        'is_enabled' => 'Activar el mode de manteniment',
        'is_enabled_comment' => 'Selecciona la pàgina per mostrar quan el mode de manteniment està activat.',
        'hint' => "El mode de manteniment mostrarà la pàgina de manteniment als visitants que no hagin accedit a l'àrea d'administració.",
    ],
    'page' => [
        'not_found_name' => "La pàgina ':name' no s'ha trobat",
        'not_found' => [
            'label' => 'Pàgina no trobada',
            'help' => 'La pàgina demanada no es pot trobar.',
        ],
        'custom_error' => [
            'label' => 'Error de pàgina',
            'help' => 'Ens sap greu, però alguna cosa ha anat malament i la pàgina no es pot mostrar.',
        ],
        'menu_label' => 'Pàgines',
        'unsaved_label' => 'Pàgines no guardades',
        'no_list_records' => "No s'han trobat pàgines",
        'new' => 'Nova pàgina',
        'invalid_url' => 'Format d\'URL invàlid. La URL ha de començar amb el símbol / i pot contenir números, lletres llatines i els següents símbols: ._-[]:?|/+*^$',
        'delete_confirm_multiple' => 'Eliminar pàgines seleccionades?',
        'delete_confirm_single' => 'Eliminar aquesta pàgina?',
        'no_layout' => '-- sense plantilla --',
        'cms_page' => 'Pàgina de CMS',
        'title' => 'Títol de pàgina',
        'url' => 'URL de pàgina',
        'file_name' => "Nom de l'arxiu de pàgina",
    ],
    'layout' => [
        'not_found_name' => "La plantilla ':name' no s'ha trobat",
        'menu_label' => 'Plantilles',
        'unsaved_label' => 'Plantilles no guardades',
        'no_list_records' => "No s'han trobat plantilles",
        'new' => 'Nova plantilla',
        'delete_confirm_multiple' => 'Eliminar plantilles seleccionades?',
        'delete_confirm_single' => 'Eliminar aquesta plantilla?',
    ],
    'partial' => [
        'not_found_name' => "El parcial ':name' no s'ha trobat.",
        'invalid_name' => 'Nom de parcial invàlid: :name.',
        'menu_label' => 'Parcials',
        'unsaved_label' => 'Parcials no guardats',
        'no_list_records' => "No s'han trobat parcials",
        'delete_confirm_multiple' => 'Eliminar parcials seleccionats?',
        'delete_confirm_single' => 'Eliminar aquest parcial?',
        'new' => 'Nou parcial',
    ],
    'content' => [
        'not_found_name' => "L'arxiu de contingut ':name' no s'ha trobat.",
        'menu_label' => 'Contingut',
        'unsaved_label' => 'Contingut no guardat',
        'no_list_records' => "No s'han trobat arxius de contingut",
        'delete_confirm_multiple' => 'Eliminar arxius o directoris de contingut seleccionats?',
        'delete_confirm_single' => 'Eliminar aquest arxiu de contingut?',
        'new' => 'Nou arxiu de contingut',
    ],
    'ajax_handler' => [
        'invalid_name' => "Nom de manipulador d'AJAX invàlid: :name.",
        'not_found' => "El manipulador d'AJAX ':name' no s'ha trobat.",
    ],
    'cms' => [
        'menu_label' => 'CMS',
    ],
    'sidebar' => [
        'add' => 'Afegir',
        'search' => 'Cercar...',
    ],
    'editor' => [
        'settings' => 'Opcions',
        'title' => 'Títol',
        'new_title' => 'Nou títol de pàgina',
        'url' => 'URL',
        'filename' => "Nom d'arxiu",
        'layout' => 'Plantilla',
        'description' => 'Descripció',
        'preview' => 'Previsualitzar',
        'meta' => 'Meta',
        'meta_title' => 'Meta títol',
        'meta_description' => 'Meta descripció',
        'markup' => 'Marcat',
        'code' => 'Codi',
        'content' => 'Contingut',
        'hidden' => 'Amagat',
        'hidden_comment' => "Les pàgines amagades només són accessibles pels usuaris connectats a l'àrea d'administració.",
        'enter_fullscreen' => 'Activar mode de pàgina completa',
        'exit_fullscreen' => 'Sortir del mode de pàgina completa',
        'open_searchbox' => 'Obrir caixa de cerca',
        'close_searchbox' => 'Tancar caixa de cerca',
        'open_replacebox' => 'Obrir caixa de substitució',
        'close_replacebox' => 'Tancar caixa de substitució',
    ],
    'asset' => [
        'menu_label' => 'Recursos',
        'unsaved_label' => 'Recursos no guardats',
        'drop_down_add_title' => 'Afegir...',
        'drop_down_operation_title' => 'Acció...',
        'upload_files' => 'Pujar arxius',
        'create_file' => 'Crear arxiu',
        'create_directory' => 'Crear directori',
        'directory_popup_title' => 'Nou directori',
        'directory_name' => 'Nom del directori',
        'rename' => 'Reanomenar',
        'delete' => 'Eliminar',
        'move' => 'Moure',
        'select' => 'Seleccionar',
        'new' => 'Nou arxiu',
        'invalid_path' => 'La ruta només pot contenir números, lletres llatines, espais i els símbols: ._-/',
        'error_deleting_file' => "Error eliminant l'arxiu :name.",
        'error_deleting_dir_not_empty' => 'Error eliminant el directori :name. El directori no està buit.',
        'error_deleting_dir' => 'Error eliminant el directori :name.',
        'invalid_name' => 'El nom només pot contenir números, lletres llatines, espais i els símbols: ._-',
        'original_not_found' => "No s'ha trobat l'arxiu o directori original",
        'already_exists' => 'Ja existeix un arxiu o directori amb aquest nom',
        'error_renaming' => "Error reanomenant l'arxiu o directori",
        'name_cant_be_empty' => 'El nom no pot estar buit',
        'too_large' => "L'arxiu pujat és massa gran. La mida màxima d'arxiu és :max_size",
        'type_not_allowed' => "Només es permeten els següents tipus d'arxiu: :allowed_types",
        'file_not_valid' => "L'arxiu no és vàlid",
        'error_uploading_file' => "Error pujant l'arxiu ':name': :error",
        'move_destination' => 'Directori de destí',
        'move_popup_title' => 'Moure recursos',
        'selected_files_not_found' => "No s'han trobat els arxius seleccionats",
        'select_destination_dir' => 'Si us plau selecciona un directori de destí',
        'destination_not_found' => "No s'ha trobat el directori de destí",
        'error_moving_file' => "Error movent l'arxiu :file",
        'error_moving_directory' => 'Error movent el directori :dir',
        'error_deleting_directory' => 'Error eliminant el directori original :dir',
        'no_list_records' => "No s'han trobat arxius",
        'delete_confirm' => 'Eliminar els arxius o directoris seleccionats?',
        'path' => 'Ruta',
    ],
    'component' => [
        'menu_label' => 'Components',
        'unnamed' => 'Sense nom',
        'no_description' => "No s'ha proveït una descripció",
        'alias' => 'Alies',
        'alias_description' => 'Un nom únic assignat a aquest component per utilitzar-lo al codi de la pàgina o plantilla.',
        'validation_message' => 'Els àlies de components són obligatoris i només poden contenir lletres llatines, números i subratllats. Han de començar amb una lletra.',
        'invalid_request' => 'La plantilla no es pot guardar perquè conté dades de components invàlides.',
        'no_records' => "No s'han trobat components",
        'not_found' => "No s'ha trobat el component ':name'.",
        'method_not_found' => "El component ':name' no conté un mètode ':method'.",
    ],
    'template' => [
        'invalid_type' => 'Tipus de plantilla desconegut.',
        'not_found' => "No s'ha trobat la plantilla.",
        'saved' => 'Plantilla guardada.',
        'no_list_records' => "No s'han trobat registres",
        'delete_confirm' => 'Eliminar les plantilles seleccionades?',
        'order_by' => 'Ordenar per',
    ],
    'permissions' => [
        'name' => 'CMS',
        'manage_content' => 'Gestionar els arxius de contingut del lloc web',
        'manage_assets' => 'Gestionar els recursos del lloc web - imatges, arxius JavaScript, arxius CSS',
        'manage_pages' => 'Crear, modificar i eliminar pàgines del lloc web',
        'manage_layouts' => 'Crear, modificar i eliminar plantilles del CMS',
        'manage_partials' => 'Crear, modificar i eliminar parcials del CMS',
        'manage_themes' => 'Activar, desactivar and configurar temes del CMS',
        'manage_theme_options' => 'Configurar opcions de personalització pel tema actiu',
    ],
    'theme_log' => [
        'hint' => "Aquest registre mostra els canvis fets al tema des de l'àrea d'administració.",
        'menu_label' => 'Registre del tema',
        'menu_description' => 'Veure canvis fets al tema actiu.',
        'empty_link' => 'Buidar registre del tema',
        'empty_loading' => 'Buidant registre del tema...',
        'empty_success' => 'Registre del tema buit!',
        'return_link' => 'Tornar al registre del tema',
        'id' => 'ID',
        'id_label' => 'ID del registre',
        'created_at' => 'Data i hora',
        'user' => 'Usuari',
        'type' => 'Tipus',
        'type_create' => 'Crear',
        'type_update' => 'Modificar',
        'type_delete' => 'Eliminar',
        'theme_name' => 'Tema',
        'theme_code' => 'Codi del tema',
        'old_template' => 'Plantilla (antiga)',
        'new_template' => 'Plantilla (nova)',
        'template' => 'Plantilla',
        'diff' => 'Canvis',
        'old_value' => 'Valor antic',
        'new_value' => 'Valor nou',
        'preview_title' => 'Canvis de la plantilla',
        'template_updated' => "La plantilla s'ha modificat",
        'template_created' => "La plantilla s'ha creat",
        'template_deleted' => "La plantilla s'ha eliminat",
    ],
];