<?php

return [
    'cms_object' => [
        'invalid_file' => 'Nume fișier invalid: :name. Numele fișierelor pot conține doar caractere alfanumerice, linii de subliniere, liniuțe și puncte. Câteva exemple de nume de fișiere corecte: pagină.htm, pagină, subdirector/pagină',
        'invalid_property' => "Proprietatea ':name' nu poate fi setată",
        'file_already_exists' => "Fișierul ':name' există deja.",
        'error_saving' => "Eroare la salvarea fișierului ':name'. Vă rugăm să verificați permisiunile de scriere.",
        'error_creating_directory' => 'Eroare la crearea dosarului :name. Vă rugăm să verificați permisiunile de scriere. ',
        'invalid_file_extension' => 'Extensie fișier :invalid invalidă. Extensiile permise sunt: :allowed. ',
        'error_deleting' => "Eroare la ștergerea fișierului șablon ':name'. Vă rugăm să verificați permisiunile de scriere.",
        'delete_success' => 'Șabloane șterse: :count.',
        'file_name_required' => 'Câmpul Nume fișier este obligatoriu.',
        'safe_mode_enabled' => 'Modul sigur este activat în prezent. Editarea codului PHP al șabloanelor CMS este dezactivată. Pentru a dezactiva modul sigur, setați valoarea de configurare `cms.enableSafeMode` la `false`.',
    ],
    'tablou de bord' => [
        'active_theme' => [
            'widget_title_default' => 'Site web',
            'online' => 'Conectat',
            'maintenance' => 'În întreținere',
            'manage_themes' => 'Gestionați temele',
            'customize_theme' => 'Personalizați tema',
        ],
    ],
    'theme' => [
        'not_found_name' => "Tema ':name' nu a fost găsită.",
        'by_author' => 'De către :name',
        'active' => [
            'not_set' => 'Tema activă nu este setată.',
            'not_found' => 'Tema activă nu a fost gasită.',
        ],
        'edit' => [
            'not_set' => 'Tema de editare nu este setată.',
            'not_found' => 'Tema de editare nu a fost gasită.',
            'not_match' => 'Obiectul pe care încercați să-l accesați nu aparține temei care este în curs de editare. Vă rugăm să reîncărcați pagina.',
        ],
        'settings_menu' => 'Tema front-end',
        'settings_menu_description' => 'Gestionați tema front-end și opțiunile de personalizare.',
        'default_tab' => 'Proprietăți',
        'name_label' => 'Nume',
        'name_create_placeholder' => 'Nume temă nouă',
        'author_label' => 'Autor',
        'author_placeholder' => 'Numele persoanei sau al companiei',
        'description_label' => 'Descriere',
        'description_placeholder' => 'Descrierea temei',
        'homepage_label' => 'Pagina de pornire',
        'homepage_placeholder' => 'Adresa URL a site-ului web',
        'code_label' => 'Cod',
        'code_placeholder' => 'Un cod unic pentru această temă, utilizat pentru distribuție',
        'preview_image_label' => 'Imagine de previzualizare',
        'preview_image_placeholder' => 'Calea imaginii de previzualizare a temei.',
        'dir_name_label' => 'Numele dosarului',
        'dir_name_create_label' => 'Dosarul temei de destinație',
        'theme_label' => 'Temă',
        'theme_title' => 'Teme',
        'activate_button' => 'Activați',
        'active_button' => 'Activare',
        'customize_theme' => 'Personalizați tema',
        'customize_button' => 'Personalizați',
        'duplicate_button' => 'Dublare',
        'duplicate_title' => 'Dublează tema',
        'duplicate_theme_success' => 'Tema a fost dublată!',
        'manage_button' => 'Gestionați',
        'manage_title' => 'Gestionați tema',
        'edit_properties_title' => 'Temă',
        'edit_properties_button' => 'Editați proprietățile',
        'save_properties' => 'Salvați proprietățile',
        'import_button' => 'Importare',
        'import_title' => 'Importare temă',
        'import_theme_success' => 'Tema a fost importată!',
        'import_uploaded_file' => 'Fișier arhivă temă',
        'import_overwrite_label' => 'Suprascrieți fișierele existente',
        'import_overwrite_comment' => 'Debifați această casetă pentru a importa numai fișiere noi',
        'import_folders_label' => 'Dosare',
        'import_folders_comment' => 'Vă rugăm să selectați dosarele temei pe care doriți să le importați',
        'export_button' => 'Exportare',
        'export_title' => 'Exportare temă',
        'export_folders_label' => 'Dosare',
        'export_folders_comment' => 'Vă rugăm să selectați folderele tematice pe care doriți să le exportați',
        'delete_button' => 'Șterge',
        'delete_confirm' => 'Ștergeți această temă? Nu este o acțiune reversibilă!',
        'delete_active_theme_failed' => 'Nu se poate șterge tema activă, încercați mai întâi să activați o altă temă.',
        'delete_theme_success' => 'Tema a fost ștearsă!',
        'create_title' => 'Creați o temă',
        'create_button' => 'Creați',
        'create_new_blank_theme' => 'Creați o nouă temă goală',
        'create_theme_success' => 'Tema a fost creată!',
        'create_theme_required_name' => 'Vă rugăm să specificați un nume pentru temă.',
        'new_directory_name_label' => 'Dosar temă',
        'new_directory_name_comment' => 'Furnizați un nou nume de dirdosar pentru tema dublată.',
        'dir_name_invalid' => 'Numele poate conține doar cifre, litere latine și următoarele simboluri: _-',
        'dir_name_taken' => 'Dosarul dorit pentru temă există deja.',
        'find_more_themes' => 'Găsiți mai multe teme',
        'saving' => 'Salvare temă...',
        'return' => 'Revenire la lista temelor',
    ],
    'maintenance' => [
        'settings_menu' => 'Mod de întreținere',
        'settings_menu_description' => 'Configurați pagina modului de întreținere și comutați setarea.',
        'is_enabled' => 'Activați modul de întreținere',
        'is_enabled_comment' => 'Selectați pagina de afișat când modul de întreținere este activat.',
        'hint' => 'Modul de întreținere va afișa pagina de întreținere vizitatorilor care nu s-au conectat la zona back-end.',
    ],
    'page' => [
        'not_found_name' => "Pagina ':name' nu a fost găsită",
        'not_found' => [
            'label' => 'Pagina nu a fost găsită',
            'help' => 'Pagina solicitată nu poate fi găsită.',
        ],
        'custom_error' => [
            'label' => 'Eroare de pagină',
            'help' => 'Ne pare rău, dar ceva nu a funcționat și pagina nu poate fi afișată.',
        ],
        'menu_label' => 'Pagini',
        'unsaved_label' => 'Pagina(ile) nesalvate',
        'no_list_records' => 'Nu s-au găsit pagini',
        'new' => 'Pagină nouă',
        'invalid_url' => 'Format URL nevalid. Adresa URL ar trebui să înceapă cu linie oblică (/) și poate conține cifre, litere latine și următoarele simboluri: . _ - [] : ? | / + * ^ $',
        'delete_confirm_multiple' => 'Ștergeți paginile selectate?',
        'delete_confirm_single' => 'Ștergeți această pagină?',
        'no_layout' => '- fără layout -',
        'cms_page' => 'Pagina CMS',
        'title' => 'Titlul paginii',
        'url' => 'Adresa URL a paginii',
        'file_name' => 'Numele fișierului paginii',
    ],
    'layout' => [
        'not_found_name' => "Macheta ':name' nu a fost gasită",
        'menu_label' => 'Machete',
        'unsaved_label' => 'Machetă(e) nesalvată(e)',
        'no_list_records' => 'Nu au fost găsite machete',
        'new' => 'Machetă nouă',
        'delete_confirm_multiple' => 'Vreți să ștergeți machetele selectate?',
        'delete_confirm_single' => 'Vreți să ștergeți macheta selectată?',
    ],
    'partial' => [
        'not_found_name' => "Parțialul ':name' nu a fost gasit.",
        'invalid_name' => "Nume ':name' invalid pentru parțial.",
        'menu_label' => 'Parțiale',
        'unsaved_label' => 'Parțial(e) nesalvat(e)',
        'no_list_records' => 'Nu au fost găsite parțiale',
        'delete_confirm_multiple' => 'Vreți să ștergeți partialele selectate?',
        'delete_confirm_single' => 'Vreți să ștergeți acest parțial?',
        'new' => 'Parțial nou',
    ],
    'content' => [
        'not_found_name' => "Fișierul de conținut ':name' nu a fost găsit.",
        'menu_label' => 'Conținut',
        'unsaved_label' => 'Conținut nesalvat',
        'no_list_records' => 'Nu s-au găsit fișiere de conținut',
        'delete_confirm_multiple' => 'Ștergeți fișierele sau dosarele de conținut selectate?',
        'delete_confirm_single' => 'Ștergeți acest fișier de conținut?',
        'new' => 'Fișier de conținut nou',
    ],
    'ajax_handler' => [
        'invalid_name' => "Nume ':name' invalid pentru Funcția AJAX.",
        'not_found' => "Funcția AJAX ':name' nu a fost gasită.",
    ],
    'cms' => [
        'menu_label' => 'CMS',
    ],
    'sidebar' => [
        'add' => 'Adăugare',
        'search' => 'Căutare...',
    ],
    'editor' => [
        'settings' => 'Setări',
        'title' => 'Titlu',
        'new_title' => 'Titlu nou de pagină',
        'url' => 'URL',
        'filename' => 'Nume fișier',
        'layout' => 'Machetă',
        'description' => 'Descriere',
        'preview' => 'Previzualizare',
        'meta' => 'Meta',
        'meta_title' => 'Titlu Meta',
        'meta_description' => 'Descriere Meta',
        'markup' => 'Marcaje',
        'code' => 'Cod',
        'content' => 'Conținut',
        'hidden' => 'Ascuns',
        'hidden_comment' => 'Paginile ascunse sunt vizibile doar utilizatorilor back-end autentificați.',
        'enter_fullscreen' => 'Intrare în mod ecran complet',
        'exit_fullscreen' => 'Ieșire din mod ecran complet',
        'open_searchbox' => 'Deschideți caseta Căutare',
        'close_searchbox' => 'Închide caseta Căutare',
        'open_replacebox' => 'Deschideți caseta Înlocuire',
        'close_replacebox' => 'Închide caseta Înlocuire',
        'commit' => 'Trimite',
        'reset' => 'Resetare',
        'commit_confirm' => 'Sigur doriți să trimiteți modificările aduse acestui fișier în sistemul de fișiere? Această acțiune va suprascrie fișierul existent în sistemul de fișiere',
        'reset_confirm' => 'Sigur doriți să resetați acest fișier la copia care se află pe sistemul de fișiere? Această acțiune îl va înlocui complet cu fișierul care se află în sistemul de fișiere',
        'committing' => 'Trimitere',
        'resetting' => 'Resetare',
        'commit_success' => 'Tipul :type a fost trimis către sistemul de fișiere',
        'reset_success' => 'Tipul :type a fost resetat la versiunea din sistemul de fișiere',
    ],
    'asset' => [
        'menu_label' => 'Fișiere design (assets)',
        'unsaved_label' => 'Fișier(e) design nesalvat(e)',
        'drop_down_add_title' => 'Adăugați...',
        'drop_down_operation_title' => 'Acțiune...',
        'upload_files' => 'Încărcați fișier(e)',
        'create_file' => 'Creați fișier',
        'create_directory' => 'Creați dosar',
        'directory_popup_title' => 'Dosar nou',
        'directory_name' => 'Nume dosar',
        'rename' => 'Redenumiți',
        'delete' => 'Șterge',
        'move' => 'Mutare',
        'select' => 'Selectați',
        'new' => 'Fișier nou',
        'invalid_path' => 'Calea poate conține doar cifre, litere latine, spații și următoarele simboluri: . _ - /',
        'error_deleting_file' => 'Eroare la ștergerea fișierului :name.',
        'error_deleting_dir_not_empty' => 'Eroare la ștergerea dosarului :name. Dosarul nu este gol.',
        'error_deleting_dir' => 'Eroare la ștergerea dosarului :name.',
        'invalid_name' => 'Numele poate conține doar cifre, litere latine, spații și următoarele simboluri: . _ -',
        'original_not_found' => 'Fișierul original sau dosarul nu a fost găsit',
        'already_exists' => 'Fișierul sau dosarul cu acest nume există deja',
        'error_renaming' => 'Eroare la redenumirea fișierului sau dosarului',
        'name_cant_be_empty' => 'Numele nu poate fi gol',
        'too_large' => 'Fișierul încărcat este prea mare. Dimensiunea maximă permisă a fișierului este :max_size',
        'type_not_allowed' => 'Sunt permise doar următoarele tipuri de fișiere: :allowed_types',
        'file_not_valid' => 'Fișierul nu este valid',
        'error_uploading_file' => "Eroare la încărcarea fișierului ':name': :error",
        'move_destination' => 'Dosar destinație',
        'move_popup_title' => 'Mutați fișiere design (assets)',
        'selected_files_not_found' => 'Fișierele selectate nu au fost găsite',
        'select_destination_dir' => 'Vă rugăm să selectați un dosar de destinație',
        'destination_not_found' => 'Dosarul de destinație nu este găsit',
        'error_moving_file' => 'Eroare la mutarea fișierului :file',
        'error_moving_directory' => 'Eroare la mutarea dosarului :dir',
        'error_deleting_directory' => 'Eroare la ștergerea dosarului original :dir',
        'no_list_records' => 'Nu s-au găsit fișiere',
        'delete_confirm' => 'Ștergeți fișierele sau dosarele selectate?',
        'cale' => 'Cale',
    ],
    'component' => [
        'menu_label' => 'Componente',
        'unnamed' => 'Nedenumit',
        'no_description' => 'Nicio descriere furnizată',
        'alias' => 'Alias',
        'alias_description' => 'Un nume unic dat acestei componente atunci când se utilizează în pagină sau în codul machetei.',
        'validation_message' => 'Aliasurile componentelor sunt obligatorii și pot conține doar simboluri latine, cifre și linii de subliniere. Aliasurile ar trebui să înceapă cu un simbol latin. ',
        'invalid_request' => 'Șablonul nu poate fi salvat din cauza datelor invalide ale componentei.',
        'no_records' => 'Nu s-au găsit componente',
        'not_found' => "Componenta ':name' nu a fost găsită.",
        'no_default_partial' => "Această componentă nu are un parțial 'implicit'",
        'method_not_found' => "Componenta ':name' nu conține o metodă ':method'.",
        'soft_component' => 'Componentă soft',
        'soft_component_description' => 'Această componentă lipsește, dar este opțională.',
    ],
    'template' => [
        'invalid_type' => 'Tip de șablon necunoscut.',
        'not_found' => 'Șablonul nu a fost găsit.',
        'saved' => 'Șablon salvat.',
        'no_list_records' => 'Nu s-au găsit înregistrări',
        'delete_confirm' => 'Ștergeți șabloanele selectate?',
        'order_by' => 'Ordonează după',
    ],
    'permissions' => [
        'name' => 'CMS',
        'manage_content' => 'Gestionați fișierele de conținut ale site-ului web',
        'manage_assets' => 'Gestionați fișierele de design (assets) ale site-ului web - imagini, fișiere JavaScript, fișiere CSS',
        'manage_pages' => 'Creați, modificați și ștergeți paginile site-ului web',
        'manage_layouts' => 'Creați, modificați și ștergeți machetele CMS',
        'manage_partials' => 'Creați, modificați și ștergeți parțialele CMS',
        'manage_themes' => 'Activați, dezactivați și configurați temele CMS',
        'manage_theme_options' => 'Configurați opțiunile de personalizare pentru tema activă',
    ],
    'theme_log' => [
        'hint' => 'Acest jurnal afișează orice modificări aduse temei de către administratori în zona back-end.',
        'menu_label' => 'Jurnal teme',
        'menu_description' => 'Vizualizați modificările aduse temei active.',
        'empty_link' => 'Jurnal teme gol',
        'empty_loading' => 'Golirea jurnalului temei...',
        'empty_success' => 'Jurnalul temei a fost golit',
        'return_link' => 'Reveniți la jurnalul de teme',
        'id' => 'ID',
        'id_label' => 'ID jurnal',
        'created_at' => 'Data & ora',
        'user' => 'Utilizator',
        'type' => 'Tip',
        'type_create' => 'Creare',
        'type_update' => 'Actualizare',
        'type_delete' => 'Ștergere',
        'theme_name' => 'Temă',
        'theme_code' => 'Codul temei',
        'old_template' => 'Șablon (vechi)',
        'new_template' => 'Șablon (Nou)',
        'template' => 'Șablon',
        'diff' => 'Modificări',
        'old_value' => 'Valoare veche',
        'new_value' => 'Valoare nouă',
        'preview_title' => 'Modificări șablon',
        'template_updated' => 'Șablonul a fost actualizat',
        'template_created' => 'Șablonul a fost creat',
        'template_deleted' => 'Șablonul a fost șters',
    ],
];
