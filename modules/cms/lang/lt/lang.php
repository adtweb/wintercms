<?php

return [
    'cms_object' => [
        'invalid_file' => 'Netinkamas failo pavadinimas: :name. Failo pavadinimą gali sudaryti tik skaičiai, raidės, brūkšneliai bei taškai. Keletas pavyzdžių: puslapis.htm, puslapis, direktorija/puslapis, puslapis_2, naujas-puslapis',
        'invalid_property' => "Savybės ':name' negalima nustatyti",
        'file_already_exists' => "Failas pavadinimu ':name' jau yra.",
        'error_saving' => "Klaida išsaugant failą ':name'. Patikrinkite katalogo įrašymo nustatymus serveryje.",
        'error_creating_directory' => 'Nepavyko sukurti direktorijos :name. Patikrinkite katalogo įrašymo nustatymus serveryje.',
        'invalid_file_extension' => 'Netinkama failo galūnė: :invalid. Leistinos galūnės yra: :allowed.',
        'error_deleting' => "Nepavyko ištrinti šablono ':name'. Patikrinkite katalogo įrašymo nustatymus serveryje.",
        'delete_success' => 'Ištrinta šablonų: :count.',
        'file_name_required' => 'Failko pavadinimo laukelis yra būtinas.',
        'safe_mode_enabled' => 'Saugusis režimas šiuo metu įjungtas.',
    ],
    'dashboard' => [
        'active_theme' => [
            'widget_title_default' => 'Tinklalapis',
            'online' => 'Įjungtas',
            'maintenance' => 'Aptarnavimo režime',
            'manage_themes' => 'Tvarkyti dizainus',
        ],
    ],
    'theme' => [
        'not_found_name' => "Dizainas ':name' nerastas.",
        'active' => [
            'not_set' => 'Aktyvusis dizainas yra nenustatytas.',
            'not_found' => 'Aktyvusis dizainas nerastas.',
        ],
        'edit' => [
            'not_set' => 'Redaguojamas dizainas nenustatytas.',
            'not_found' => 'Redaguojamas dizainas nerastas.',
            'not_match' => 'Objektas, kurį bandote prieiti nepriklauso redaguojamam dizainui. Perkraukite puslapį.',
        ],
        'settings_menu' => 'Svetainės dizainas',
        'settings_menu_description' => 'Peržiūrėkite įdiegtų dizainų sąrašą ir pasirinkite aktyvųjį dizainą.',
        'default_tab' => 'Savybės',
        'name_label' => 'Pavadinimas',
        'name_create_placeholder' => 'Naujo dizaino pavadinimas',
        'author_label' => 'Autorius',
        'author_placeholder' => 'Asmuo arba įmonė',
        'description_label' => 'Aprašymas',
        'description_placeholder' => 'Dizaino aprašymas',
        'homepage_label' => 'Tinklalapis',
        'homepage_placeholder' => 'Svetainės URL',
        'code_label' => 'Kodas',
        'code_placeholder' => 'Unikalus dizaino kodas naudojamas platinant',
        'preview_image_label' => 'Demo paveiksliukas',
        'preview_image_placeholder' => 'Kelias į demo paveiksliuką.',
        'dir_name_label' => 'Direktorijos pavadinimas',
        'dir_name_create_label' => 'Kelias į dizaino direktoriją',
        'theme_label' => 'Dizainas',
        'theme_title' => 'Dizainai',
        'activate_button' => 'Aktyvuoti',
        'active_button' => 'Aktyvuoti',
        'customize_theme' => 'Modifikuoti Dizainą',
        'customize_button' => 'Modifikuoti',
        'duplicate_button' => 'Duplikuoti',
        'duplicate_title' => 'Duplikuoti dizainą',
        'duplicate_theme_success' => 'Dizainą duplikavome!',
        'manage_button' => 'Tvarkyti',
        'manage_title' => 'Tvarkyti dizainą',
        'edit_properties_title' => 'Dizainas',
        'edit_properties_button' => 'Redaguoti nustatymus',
        'save_properties' => 'Išsaugoti nustatymus',
        'import_button' => 'Importuoti',
        'import_title' => 'Importuoti dizainą',
        'import_theme_success' => 'Dizainą importavome!',
        'import_uploaded_file' => 'Dizaino archyvas',
        'import_overwrite_label' => 'Perrašyti esančius failus',
        'import_overwrite_comment' => 'Nuimkite varnelę jei norite įkelti tik naujus failus',
        'import_folders_label' => 'Katalogai',
        'import_folders_comment' => 'Pasirinkite katalogus, kuriuos norite importuoti',
        'export_button' => 'Eksportuoti',
        'export_title' => 'Eksportuoti dizainą',
        'export_folders_label' => 'Katalogai',
        'export_folders_comment' => 'Pasirinkite katalogus, kuriuos norite eksportuoti',
        'delete_button' => 'Trinti',
        'delete_confirm' => 'Ar tikrai norite ištrinti šį dizainą? Atstatyti nebus įmanoma!',
        'delete_active_theme_failed' => 'Negalime ištrinti aktyviojo dizaino. Priskirkite kitą dizainą kaip aktyvųjį ir bandykite dar kartą.',
        'delete_theme_success' => 'Dizainą ištrynėme!',
        'create_title' => 'Kurti dizainą',
        'create_button' => 'Kurti',
        'create_new_blank_theme' => 'Kurti naują tuščią dizainą',
        'create_theme_success' => 'Dizainas sukurtas!',
        'create_theme_required_name' => 'Nurodykite dizaino pavadinimą.',
        'new_directory_name_label' => 'Dizaino direktorija',
        'new_directory_name_comment' => 'Nurodykite naujos direktorijos pavadinimą duplikuojamam dizainui.',
        'dir_name_invalid' => 'Pavadinimą gali sudaryti tik skaičiai, Lotyniškos raidės bei simboliai: _-',
        'dir_name_taken' => 'Norimo dizaino direktorija jau egzistuoja.',
        'find_more_themes' => 'Raskite daugiau dizainų',
        'saving' => 'Išsaugome dizainą...',
        'return' => 'Grįžti į dizainų sąrašą',
    ],
    'maintenance' => [
        'settings_menu' => 'Aptarnavimo režimas',
        'settings_menu_description' => 'Konfigūruokite aptarnavimo režimo puslapį bei perjunkite režimo statusą.',
        'is_enabled' => 'Įjungti aptarnavimo režimą',
        'is_enabled_comment' => 'Parinkite kurį puslapį rodysite lankytojams aptarnavimo režimo metu.',
        'hint' => 'Aptarnavimo režimo metu lankytojams, kurie nėra prisijungę į administracinę zoną, bus rodomas Jūsų nustatytas puslapis.',
    ],
    'page' => [
        'not_found_name' => "Puslapis ':name' nerastas",
        'not_found' => [
            'label' => 'Puslapis nerstas',
            'help' => 'Negalime rasti užklaustojo puslapio.',
        ],
        'custom_error' => [
            'label' => 'Puslapio klaida',
            'help' => 'Atsiprašome, tačiau dėl galimų klaidų užklaustojo puslapio rodyti nepavyko.',
        ],
        'menu_label' => 'Puslapiai',
        'unsaved_label' => 'Neišsaugoti puslapiai',
        'no_list_records' => 'Puslapių nėra',
        'new' => 'Naujas puslapis',
        'invalid_url' => 'Netinkamas URL formatas. URL turėtų prasidėti simboliu / ir susidaryti iš skaitmenų, Lotyniškų raidžių bei šių simbolių: ._-[]:?|/+*^$',
        'delete_confirm_multiple' => 'Trinti pasirinktus puslapius?',
        'delete_confirm_single' => 'Trinti šį puslapį?',
        'no_layout' => '-- be šablono --',
        'cms_page' => 'CMS puslapis',
        'title' => 'Puslapio pavadinimas',
        'url' => 'Puslapio URL',
        'file_name' => 'Puslapio failo pavadinimas',
    ],
    'layout' => [
        'not_found_name' => "Šablonas ':name' nerastas",
        'menu_label' => 'Šablonai',
        'unsaved_label' => 'Neišsaugoti šablonai',
        'no_list_records' => 'Šablonų nėra',
        'new' => 'Naujas šablonas',
        'delete_confirm_multiple' => 'Trinti pasirinktus šablonus?',
        'delete_confirm_single' => 'Trinti šį šabloną?',
    ],
    'partial' => [
        'not_found_name' => "Priedėlis ':name' nerastas.",
        'invalid_name' => 'Netinkamas priedėlio pavadinimas: :name.',
        'menu_label' => 'Priedėliai',
        'unsaved_label' => 'Neišsaugoti priedėliai',
        'no_list_records' => 'Priedėlių nėra',
        'delete_confirm_multiple' => 'Trinti pasirinktus priedėlius?',
        'delete_confirm_single' => 'Trinti šį priedėlį?',
        'new' => 'Naujas priedėlis',
    ],
    'content' => [
        'not_found_name' => "Turinio failas ':name' nerastas.",
        'menu_label' => 'Turinys',
        'unsaved_label' => 'Neišsaugotas turinys',
        'no_list_records' => 'Turinio failų nėra',
        'delete_confirm_multiple' => 'Trinti pasirinktus turinio failus ar direktorijas?',
        'delete_confirm_single' => 'Trinti šį turinio failą?',
        'new' => 'Nauajs turinio failas',
    ],
    'ajax_handler' => [
        'invalid_name' => 'Netinkamas AJAX tvarkiklis pavadinimas: :name.',
        'not_found' => "AJAX tvarkiklis ':name' nerastas.",
    ],
    'cms' => [
        'menu_label' => 'CMS',
    ],
    'sidebar' => [
        'add' => 'Pridėti',
        'search' => 'Ieškoti...',
    ],
    'editor' => [
        'settings' => 'Nustatymai',
        'title' => 'Pavadinimas',
        'new_title' => 'Naujas puslapio pavadinimas',
        'url' => 'URL',
        'filename' => 'Failo pavadinimas',
        'layout' => 'Šablonas',
        'description' => 'Aprašymas',
        'preview' => 'Peržiūra',
        'meta' => 'Meta',
        'meta_title' => 'Meta Pavadinimas',
        'meta_description' => 'Meta Aprašymas',
        'markup' => 'Aprašas (markup)',
        'code' => 'Kodas',
        'content' => 'Turinys',
        'hidden' => 'Paslėptas',
        'hidden_comment' => 'paslėptus puslapius gali matyti tik į administracinę zoną prisijungę nariai.',
        'enter_fullscreen' => 'Eiti į pilno ekrano vaizdą',
        'exit_fullscreen' => 'Išeiti iš pilno ekrano vaizdo',
        'open_searchbox' => 'Atidaryti paieškos laukelį',
        'close_searchbox' => 'Uždaryti paieškos laukelį',
        'open_replacebox' => 'Atidaryti pakeitimo laukelį',
        'close_replacebox' => 'Uždaryti pakeitimo laukelį',
    ],
    'asset' => [
        'menu_label' => 'Aktyvai',
        'unsaved_label' => 'Neišsaugoti aktyvai',
        'drop_down_add_title' => 'Pridėti...',
        'drop_down_operation_title' => 'Veiksmas...',
        'upload_files' => 'Įkelti failus',
        'create_file' => 'Sukurti failą',
        'create_directory' => 'Sukurti direktoriją',
        'directory_popup_title' => 'Nauja direktorija',
        'directory_name' => 'Direktorijos pavadinimas',
        'rename' => 'Pervadinti',
        'delete' => 'Ištrinti',
        'move' => 'Perkelti',
        'select' => 'Pasirinkti',
        'new' => 'Naujas failas',
        'invalid_path' => 'Kelią gali sudaryti tik skaitmenys, Lotyniškos raidės, tarpeliai bei šie simboliai: ._-/',
        'error_deleting_file' => 'Klaida trinant failą :name.',
        'error_deleting_dir_not_empty' => 'Klaida trinant direktoriją :name. Direktorija nėra tuščia.',
        'error_deleting_dir' => 'Klaida trinant direktoriją :name.',
        'invalid_name' => 'Pavadinimą gali sudaryti tik skaitmenys, Lotyniškos raidės, tarpeliai bei šie simboliai: ._-',
        'original_not_found' => 'Nerandame pirminio failo ar direktorijos',
        'already_exists' => 'Failas ar direktorija šiuo pavadinimu jau yra',
        'error_renaming' => 'Klaida pervadinant failą ar direktoriją',
        'name_cant_be_empty' => 'Pavadinimas negali būti tuščias',
        'too_large' => 'Įkeliamas failas yra per didelis. Leistinas failo dydis yra :max_size',
        'type_not_allowed' => 'Tik šie failų tipai yra leistini: :allowed_types',
        'file_not_valid' => 'Netinkamas failas',
        'error_uploading_file' => "Klaida įkeliant failą ':name': :error",
        'move_destination' => 'Direktorija',
        'move_popup_title' => 'Perkelti aktyvus',
        'selected_files_not_found' => 'Neradome pasirinktų failų',
        'select_destination_dir' => 'Pasirinkite direktoriją',
        'destination_not_found' => 'Direktorijos neradome',
        'error_moving_file' => 'Klaida perkeliant failą :file',
        'error_moving_directory' => 'Klaida perkeliant direktoriją :dir',
        'error_deleting_directory' => 'Klaida trinant pirminę direktoriją :dir',
        'no_list_records' => 'Failų nėra',
        'delete_confirm' => 'Trinti pasirinktus failus ar direktorijas?',
        'path' => 'Kelias',
    ],
    'component' => [
        'menu_label' => 'Komponentai',
        'unnamed' => 'Neužvadintas',
        'no_description' => 'Nėra aprašymo',
        'alias' => 'Užvadintas',
        'alias_description' => 'Unikalus vardas skiriamas šiam komponentui kai naudojate jį puslapyje ar šablone.',
        'validation_message' => 'Komponentų užvadiniai yra būtini ir gali susidaryti tik iš Lotyniškų raidžių, skaitmenų bei _. Užvadiniai turi prasidėti Lotyniška reide.',
        'invalid_request' => 'Šablono išsaugoti nepavyko dėl netinkamų komponento savybių.',
        'no_records' => 'Komponentų nėra',
        'not_found' => "Komponento ':name' neradome.",
        'method_not_found' => "Komponente ':name' nėra metodo ':method'.",
    ],
    'template' => [
        'invalid_type' => 'Nežinomas šablono tipas.',
        'not_found' => 'Šablonas nerastas.',
        'saved' => 'Šablonas išsaugotas.',
        'no_list_records' => 'Įrašų nėra',
        'delete_confirm' => 'Ištrinti pasirinktus šablonus?',
        'order_by' => 'Rūšiuoti pagal',
    ],
    'permissions' => [
        'name' => 'CMS',
        'manage_content' => 'Tvarkyti svetainės turinio failus',
        'manage_assets' => 'Tvarkyti svetainės aktyvus - paveiksliukus, JavaScript failus, CSS failus',
        'manage_pages' => 'Kurti, redaguoti ir trinti svetainės puslapius',
        'manage_layouts' => 'Kurti, redaguoti ir trinti CMS išvaizdos šablonus',
        'manage_partials' => 'Kurti, redaguoti ir trinti CMS priedėlius',
        'manage_themes' => 'Aktyvuoti, deaktyvuoti bei konfigūruoti CMS dizainus',
    ],
];
