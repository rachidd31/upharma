<?php

return [
    'navigation' => [
        'title' => 'Champs personnalisés',
        'group' => 'Paramètres',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'fields' => [
                    'name'              => 'Nom',
                    'code'              => 'code',
                    'code-helper-text'  => 'Le code doit commencer par une lettre ou un tiret bas, et ne peut contenir que des lettres, des chiffres et des tirets bas.',
                ],
            ],

            'options' => [
                'title' => 'Options',

                'fields' => [
                    'add-option' => 'Ajouter une option',
                ],
            ],

            'form-settings' => [
                'title' => 'Paramètres du formulaire',

                'field-sets' => [
                    'validations' => [
                        'title' => 'Validations',

                        'fields' => [
                            'validation'     => 'Validation',
                            'field'          => 'Champ',
                            'value'          => 'Valeur',
                            'add-validation' => 'Ajouter une validation',
                        ],
                    ],

                    'additional-settings' => [
                        'title' => 'Paramètres additionnels',

                        'fields' => [
                            'setting'     => 'Paramètre',
                            'value'       => 'Valeur',
                            'color'       => 'Couleur',
                            'add-setting' => 'Ajouter un paramètre',

                            'color-options' => [
                                'danger'    => 'Danger',
                                'info'      => 'Info',
                                'primary'   => 'Primaire',
                                'secondary' => 'Secondaire',
                                'warning'   => 'Avertissement',
                                'success'   => 'Succès',
                            ],

                            'grid-options' => [
                                'row'    => 'Ligne',
                                'column' => 'Colonne',
                            ],

                            'input-modes' => [
                                'text'     => 'Texte',
                                'email'    => 'E-mail',
                                'numeric'  => 'Numérique',
                                'integer'  => 'Entier',
                                'password' => 'Mot de passe',
                                'tel'      => 'Téléphone',
                                'url'      => 'URL',
                                'color'    => 'Couleur',
                                'none'     => 'Aucun',
                                'decimal'  => 'Décimal',
                                'search'   => 'Recherche',
                                'url'      => 'URL',
                            ],
                        ],
                    ],
                ],

                'validations' => [
                    'common' => [
                        'gt'                   => 'Supérieur à',
                        'gte'                  => 'Supérieur ou égal à',
                        'lt'                   => 'Inférieur à',
                        'lte'                  => 'Inférieur ou égal à',
                        'max-size'             => 'Taille maximale',
                        'min-size'             => 'Taille minimale',
                        'multiple-of'          => 'Multiple de',
                        'nullable'             => 'Nul',
                        'prohibited'           => 'Interdit',
                        'prohibited-if'        => 'Interdit si',
                        'prohibited-unless'    => 'Interdit sauf si',
                        'prohibits'            => 'Interdit',
                        'required'             => 'Obligatoire',
                        'required-if'          => 'Obligatoire si',
                        'required-if-accepted' => 'Obligatoire si accepté',
                        'required-unless'      => 'Obligatoire sauf si',
                        'required-with'        => 'Obligatoire avec',
                        'required-with-all'    => 'Obligatoire avec tout',
                        'required-without'     => 'Obligatoire sans',
                        'required-without-all' => 'Obligatoire sans tout',
                        'rules'                => 'Règles personnalisées',
                        'unique'               => 'Unique',
                    ],

                    'text' => [
                        'alpha-dash'        => 'Alpha tiret',
                        'alpha-num'         => 'Alpha numérique',
                        'ascii'             => 'ASCII',
                        'doesnt-end-with'   => "Ne se termine pas par",
                        'doesnt-start-with' => "Ne commence pas par",
                        'ends-with'         => 'Se termine par',
                        'filled'            => 'Rempli',
                        'ip'                => 'IP',
                        'ipv4'              => 'IPv4',
                        'ipv6'              => 'IPv6',
                        'length'            => 'Longueur',
                        'mac-address'       => 'Adresse MAC',
                        'max-length'        => 'Longueur maximale',
                        'min-length'        => 'Longueur minimale',
                        'regex'             => 'Regex',
                        'starts-with'       => 'Commence par',
                        'ulid'              => 'ULID',
                        'uuid'              => 'UUID',
                    ],

                    'textarea' => [
                        'filled'     => 'Rempli',
                        'max-length' => 'Longueur maximale',
                        'min-length' => 'Longueur minimale',
                    ],

                    'select' => [
                        'different'  => 'Différent',
                        'exists'     => 'Existe',
                        'in'         => 'Dans',
                        'not-in'     => 'Pas dans',
                        'same'       => 'Identique',
                    ],

                    'radio' => [],

                    'checkbox' => [
                        'accepted' => 'Accepté',
                        'declined' => 'Refusé',
                    ],

                    'toggle' => [
                        'accepted' => 'Accepté',
                        'declined' => 'Refusé',
                    ],

                    'checkbox-list' => [
                        'in'        => 'Dans',
                        'max-items' => 'Nombre maximal d\'éléments',
                        'min-items' => 'Nombre minimal d\'éléments',
                    ],

                    'datetime' => [
                        'after'           => 'Après',
                        'after-or-equal'  => 'Après ou égal à',
                        'before'          => 'Avant',
                        'before-or-equal' => 'Avant ou égal à',
                    ],

                    'editor' => [
                        'filled'     => 'Rempli',
                        'max-length' => 'Longueur maximale',
                        'min-length' => 'Longueur minimale',
                    ],

                    'markdown' => [
                        'filled'     => 'Rempli',
                        'max-length' => 'Longueur maximale',
                        'min-length' => 'Longueur minimale',
                    ],

                    'color' => [
                        'hex-color' => 'Couleur hexadécimale',
                    ],
                ],

                'settings' => [
                    'text' => [
                        'autocapitalize'    => 'Majuscule automatique',
                        'autocomplete'      => 'Saisie semi-automatique',
                        'autofocus'         => 'Autofocus',
                        'default'           => 'Valeur par défaut',
                        'disabled'          => 'Désactivé',
                        'helper-text'       => 'Texte d\'aide',
                        'hint'              => 'Indice',
                        'hint-color'        => 'Couleur de l\'indice',
                        'hint-icon'         => 'Icône d\'indice',
                        'id'                => 'ID',
                        'input-mode'        => 'Mode de saisie',
                        'mask'              => 'Masque',
                        'placeholder'       => 'Espace réservé',
                        'prefix'            => 'Préfixe',
                        'prefix-icon'       => 'Icône de préfixe',
                        'prefix-icon-color' => 'Couleur de l\'icône de préfixe',
                        'read-only'         => 'Lecture seule',
                        'step'              => 'Pas',
                        'suffix'            => 'Suffixe',
                        'suffix-icon'       => 'Icône de suffixe',
                        'suffix-icon-color' => 'Couleur de l\'icône de suffixe',
                    ],

                    'textarea' => [
                        'autofocus'    => 'Autofocus',
                        'autosize'     => 'Redimensionnement automatique',
                        'cols'         => 'Colonnes',
                        'default'      => 'Valeur par défaut',
                        'disabled'     => 'Désactivé',
                        'helperText'   => 'Texte d\'aide',
                        'hint'         => 'Indice',
                        'hintColor'    => 'Couleur de l\'indice',
                        'hintIcon'     => 'Icône d\'indice',
                        'id'           => 'ID',
                        'placeholder'  => 'Espace réservé',
                        'read-only'    => 'Lecture seule',
                        'rows'         => 'Lignes',
                    ],

                    'select' => [
                        'default'                   => 'Valeur par défaut',
                        'disabled'                  => 'Désactivé',
                        'helper-text'               => 'Texte d\'aide',
                        'hint'                      => 'Indice',
                        'hint-color'                => 'Couleur de l\'indice',
                        'hint-icon'                 => 'Icône d\'indice',
                        'id'                        => 'ID',
                        'loading-message'           => 'Message de chargement',
                        'no-search-results-message' => 'Aucun résultat de recherche',
                        'options-limit'             => 'Limite d\'options',
                        'preload'                   => 'Précharger',
                        'searchable'                => 'Recherchable',
                        'search-debounce'           => 'Délai de recherche',
                        'searching-message'         => 'Recherche en cours',
                        'search-prompt'             => 'Invite de recherche',
                    ],

                    'radio' => [
                        'default'     => 'Valeur par défaut',
                        'disabled'    => 'Désactivé',
                        'helper-text' => 'Texte d\'aide',
                        'hint'        => 'Indice',
                        'hint-color'  => 'Couleur de l\'indice',
                        'hint-icon'   => 'Icône d\'indice',
                        'id'          => 'ID',
                    ],

                    'checkbox' => [
                        'default'     => 'Valeur par défaut',
                        'disabled'    => 'Désactivé',
                        'helper-text' => 'Texte d\'aide',
                        'hint'        => 'Indice',
                        'hint-color'  => 'Couleur de l\'indice',
                        'hint-icon'   => 'Icône d\'indice',
                        'id'          => 'ID',
                        'inline'      => 'En ligne',
                    ],

                    'toggle' => [
                        'default'     => 'Valeur par défaut',
                        'disabled'    => 'Désactivé',
                        'helper-text' => 'Texte d\'aide',
                        'hint'        => 'Indice',
                        'hint-color'  => 'Couleur de l\'indice',
                        'hint-icon'   => 'Icône d\'indice',
                        'id'          => 'ID',
                        'off-color'   => 'Couleur désactivée',
                        'off-icon'    => 'Icône désactivée',
                        'on-color'    => 'Couleur activée',
                        'on-icon'     => 'Icône activée',
                    ],

                    'checkbox-list' => [
                        'bulk-toggleable'           => 'Activable en masse',
                        'columns'                   => 'Colonnes',
                        'default'                   => 'Valeur par défaut',
                        'disabled'                  => 'Désactivé',
                        'grid-direction'            => 'Direction de la grille',
                        'helper-text'               => 'Texte d\'aide',
                        'hint'                      => 'Indice',
                        'hint-color'                => 'Couleur de l\'indice',
                        'hint-icon'                 => 'Icône d\'indice',
                        'id'                        => 'ID',
                        'max-items'                 => 'Nombre maximal d\'éléments',
                        'min-items'                 => 'Nombre minimal d\'éléments',
                        'no-search-results-message' => 'Aucun résultat de recherche',
                        'searchable'                => 'Recherchable',
                        'search-debounce'           => 'Délai de recherche',
                        'searching-message'         => 'Recherche en cours',
                        'search-prompt'             => 'Invite de recherche',
                    ],

                    'datetime' => [
                        'close-on-date-selection' => 'Fermer à la sélection de la date',
                        'default'                 => 'Valeur par défaut',
                        'disabled'                => 'Désactivé',
                        'disabled-dates'          => 'Dates désactivées',
                        'display-format'          => 'Format d\'affichage',
                        'first-fay-of-week'       => 'Premier jour de la semaine',
                        'format'                  => 'Format',
                        'helper-text'             => 'Texte d\'aide',
                        'hint'                    => 'Indice',
                        'hint-color'              => 'Couleur de l\'indice',
                        'hint-icon'               => 'Icône d\'indice',
                        'hours-step'              => 'Pas des heures',
                        'id'                      => 'ID',
                        'locale'                  => 'Locale',
                        'minutes-step'            => 'Pas des minutes',
                        'seconds'                 => 'Secondes',
                        'seconds-step'            => 'Pas des secondes',
                        'timezone'                => 'Fuseau horaire',
                        'week-starts-on-monday'   => 'La semaine commence le lundi',
                        'week-starts-on-sunday'   => 'La semaine commence le dimanche',
                    ],

                    'editor' => [
                        'default'      => 'Valeur par défaut',
                        'disabled'     => 'Désactivé',
                        'helper-text'  => 'Texte d\'aide',
                        'hint'         => 'Indice',
                        'hint-color'   => 'Couleur de l\'indice',
                        'hint-icon'    => 'Icône d\'indice',
                        'id'           => 'ID',
                        'placeholder'  => 'Espace réservé',
                        'read-only'    => 'Lecture seule',
                    ],

                    'markdown' => [
                        'default'      => 'Valeur par défaut',
                        'disabled'     => 'Désactivé',
                        'helper-text'  => 'Texte d\'aide',
                        'hint'         => 'Indice',
                        'hint-color'   => 'Couleur de l\'indice',
                        'hint-icon'    => 'Icône d\'indice',
                        'id'           => 'ID',
                        'placeholder'  => 'Espace réservé',
                        'read-only'    => 'Lecture seule',
                    ],

                    'color' => [
                        'default'     => 'Valeur par défaut',
                        'disabled'    => 'Désactivé',
                        'helper-text' => 'Texte d\'aide',
                        'hint'        => 'Indice',
                        'hint-color'  => 'Couleur de l\'indice',
                        'hint-icon'   => 'Icône d\'indice',
                        'hsl'         => 'HSL',
                        'id'          => 'ID',
                        'rgb'         => 'RGB',
                        'rgba'        => 'RGBA',
                    ],

                    'file' => [
                        'accepted-file-types'                   => 'Types de fichiers acceptés',
                        'append-files'                          => 'Ajouter des fichiers',
                        'deletable'                             => 'Supprimable',
                        'directory'                             => 'Répertoire',
                        'downloadable'                          => 'Téléchargeable',
                        'fetch-file-information'                => 'Récupérer les informations du fichier',
                        'file-attachments-directory'            => 'Répertoire des pièces jointes',
                        'file-attachments-visibility'           => 'Visibilité des pièces jointes',
                        'image'                                 => 'Image',
                        'image-crop-aspect-ratio'               => 'Ratio d\'aspect de recadrage d\'image',
                        'image-editor'                          => 'Éditeur d\'image',
                        'image-editor-aspect-ratios'            => 'Ratios d\'aspect de l\'éditeur d\'image',
                        'image-editor-empty-fill-color'         => 'Couleur de remplissage vide de l\'éditeur d\'image',
                        'image-editor-mode'                     => 'Mode de l\'éditeur d\'image',
                        'image-preview-height'                  => 'Hauteur de l\'aperçu de l\'image',
                        'image-resize-mode'                     => 'Mode de redimensionnement de l\'image',
                        'image-resize-target-height'            => 'Hauteur cible de redimensionnement de l\'image',
                        'image-resize-target-width'             => 'Largeur cible de redimensionnement de l\'image',
                        'loading-indicator-position'            => 'Position de l\'indicateur de chargement',
                        'move-files'                            => 'Déplacer les fichiers',
                        'openable'                              => 'Ouvrable',
                        'orient-images-from-exif'               => 'Orienter les images à partir d\'EXIF',
                        'panel-aspect-ratio'                    => 'Ratio d\'aspect du panneau',
                        'panel-layout'                          => 'Disposition du panneau',
                        'previewable'                           => 'Prévisualisable',
                        'remove-uploaded-file-button-position'  => 'Position du bouton de suppression du fichier téléchargé',
                        'reorderable'                           => 'Réorganisable',
                        'store-files'                           => 'Stocker les fichiers',
                        'upload-button-position'                => 'Position du bouton de téléchargement',
                        'uploading-message'                     => 'Message de téléchargement',
                        'upload-progress-indicator-position'    => 'Position de l\'indicateur de progression du téléchargement',
                        'visibility'                            => 'Visibilité',
                    ],
                ],
            ],

            'table-settings' => [
                'title' => 'Paramètres du tableau',

                'fields' => [
                    'use-in-table'  => 'Utiliser dans le tableau',
                    'setting'       => 'Paramètre',
                    'value'         => 'Valeur',
                    'color'         => 'Couleur',
                    'alignment'     => 'Alignement',
                    'font-weight'   => 'Poids de la police',
                    'icon-position' => 'Position de l\'icône',
                    'size'          => 'Taille',
                    'add-setting'   => 'Ajouter un paramètre',

                    'color-options' => [
                        'danger'    => 'Danger',
                        'info'      => 'Info',
                        'primary'   => 'Primaire',
                        'secondary' => 'Secondaire',
                        'warning'   => 'Avertissement',
                        'success'   => 'Succès',
                    ],

                    'alignment-options' => [
                        'start'   => 'Début',
                        'left'    => 'Gauche',
                        'center'  => 'Centre',
                        'end'     => 'Fin',
                        'right'   => 'Droite',
                        'justify' => 'Justifier',
                        'between' => 'Entre',
                    ],

                    'font-weight-options' => [
                        'extra-light' => 'Extra léger',
                        'light'       => 'Léger',
                        'normal'      => 'Normal',
                        'medium'      => 'Moyen',
                        'semi-bold'   => 'Semi-gras',
                        'bold'        => 'Gras',
                        'extra-bold'  => 'Extra gras',
                    ],

                    'icon-position-options' => [
                        'before'  => 'Avant',
                        'after'   => 'Après',
                    ],

                    'size-options' => [
                        'extra-small' => 'Extra petit',
                        'small'       => 'Petit',
                        'medium'      => 'Moyen',
                        'large'       => 'Grand',
                    ],
                ],

                'settings' => [
                    'common' => [
                        'align-end'              => 'Aligner la fin',
                        'alignment'              => 'Alignement',
                        'align-start'            => 'Aligner le début',
                        'badge'                  => 'Badge',
                        'boolean'                => 'Booléen',
                        'color'                  => 'Couleur',
                        'copyable'               => 'Copiable',
                        'copy-message'           => 'Message de copie',
                        'copy-message-duration'  => 'Durée du message de copie',
                        'default'                => 'Par défaut',
                        'filterable'             => 'Filtrable',
                        'groupable'              => 'Groupable',
                        'grow'                   => 'Grandir',
                        'icon'                   => 'Icône',
                        'icon-color'             => 'Couleur de l\'icône',
                        'icon-position'          => 'Position de l\'icône',
                        'label'                  => 'Étiquette',
                        'limit'                  => 'Limite',
                        'line-clamp'             => 'Limite de ligne',
                        'money'                  => 'Argent',
                        'placeholder'            => 'Espace réservé',
                        'prefix'                 => 'Préfixe',
                        'searchable'             => 'Recherchable',
                        'size'                   => 'Taille',
                        'sortable'               => 'Triable',
                        'suffix'                 => 'Suffixe',
                        'toggleable'             => 'Activable',
                        'tooltip'                => 'Info-bulle',
                        'vertical-alignment'     => 'Alignement vertical',
                        'vertically-align-start' => 'Aligner verticalement le début',
                        'weight'                 => 'Poids',
                        'width'                  => 'Largeur',
                        'words'                  => 'Mots',
                        'wrap-header'            => 'Envelopper l\'en-tête',
                        'column-span'            => 'Portée de colonne',
                        'helper-text'            => 'Texte d\'aide',
                        'hint'                   => 'Indice',
                        'hint-color'             => 'Couleur de l\'indice',
                        'hint-icon'              => 'Icône d\'indice',
                    ],

                    'datetime' => [
                        'date'              => 'Date',
                        'date-time'         => 'Date et heure',
                        'date-time-tooltip' => 'Info-bulle de date et heure',
                        'since'             => 'Depuis',
                    ],
                ],
            ],

            'infolist-settings' => [
                'title' => 'Paramètres de la liste d\'informations',

                'fields' => [
                    'setting'       => 'Paramètre',
                    'value'         => 'Valeur',
                    'color'         => 'Couleur',
                    'font-weight'   => 'Poids de la police',
                    'icon-position' => 'Position de l\'icône',
                    'size'          => 'Taille',
                    'add-setting'   => 'Ajouter un paramètre',

                    'color-options' => [
                        'danger'    => 'Danger',
                        'info'      => 'Info',
                        'primary'   => 'Primaire',
                        'secondary' => 'Secondaire',
                        'warning'   => 'Avertissement',
                        'success'   => 'Succès',
                    ],

                    'font-weight-options' => [
                        'extra-light' => 'Extra léger',
                        'light'       => 'Léger',
                        'normal'      => 'Normal',
                        'medium'      => 'Moyen',
                        'semi-bold'   => 'Semi-gras',
                        'bold'        => 'Gras',
                        'extra-bold'  => 'Extra gras',
                    ],

                    'icon-position-options' => [
                        'before'  => 'Avant',
                        'after'   => 'Après',
                    ],

                    'size-options' => [
                        'extra-small' => 'Extra petit',
                        'small'       => 'Petit',
                        'medium'      => 'Moyen',
                        'large'       => 'Grand',
                    ],
                ],

                'settings' => [
                    'common' => [
                        'align-end'              => 'Aligner la fin',
                        'alignment'              => 'Alignement',
                        'align-start'            => 'Aligner le début',
                        'badge'                  => 'Badge',
                        'boolean'                => 'Booléen',
                        'color'                  => 'Couleur',
                        'copyable'               => 'Copiable',
                        'copy-message'           => 'Message de copie',
                        'copy-message-duration'  => 'Durée du message de copie',
                        'default'                => 'Par défaut',
                        'filterable'             => 'Filtrable',
                        'groupable'              => 'Groupable',
                        'grow'                   => 'Grandir',
                        'icon'                   => 'Icône',
                        'icon-color'             => 'Couleur de l\'icône',
                        'icon-position'          => 'Position de l\'icône',
                        'label'                  => 'Étiquette',
                        'limit'                  => 'Limite',
                        'line-clamp'             => 'Limite de ligne',
                        'money'                  => 'Argent',
                        'placeholder'            => 'Espace réservé',
                        'prefix'                 => 'Préfixe',
                        'searchable'             => 'Recherchable',
                        'size'                   => 'Taille',
                        'sortable'               => 'Triable',
                        'suffix'                 => 'Suffixe',
                        'toggleable'             => 'Activable',
                        'tooltip'                => 'Info-bulle',
                        'vertical-alignment'     => 'Alignement vertical',
                        'vertically-align-start' => 'Aligner verticalement le début',
                        'weight'                 => 'Poids',
                        'width'                  => 'Largeur',
                        'words'                  => 'Mots',
                        'wrap-header'            => 'Envelopper l\'en-tête',
                        'column-span'            => 'Portée de colonne',
                        'helper-text'            => 'Texte d\'aide',
                        'hint'                   => 'Indice',
                        'hint-color'             => 'Couleur de l\'indice',
                        'hint-icon'              => 'Icône d\'indice',
                    ],

                    'datetime' => [
                        'date'              => 'Date',
                        'date-time'         => 'Date et heure',
                        'date-time-tooltip' => 'Info-bulle de date et heure',
                        'since'             => 'Depuis',
                    ],

                    'checkbox-list' => [
                        'separator'                => 'Séparateur',
                        'list-with-line-breaks'    => 'Liste avec sauts de ligne',
                        'bulleted'                 => 'À puces',
                        'limit-list'               => 'Limiter la liste',
                        'expandable-limited-list'  => 'Liste limitée extensible',
                    ],

                    'select' => [
                        'separator'                => 'Séparateur',
                        'list-with-line-breaks'    => 'Liste avec sauts de ligne',
                        'bulleted'                 => 'À puces',
                        'limit-list'               => 'Limiter la liste',
                        'expandable-limited-list'  => 'Liste limitée extensible',
                    ],

                    'checkbox' => [
                        'boolean'     => 'Booléen',
                        'false-icon'  => 'Icône fausse',
                        'true-icon'   => 'Icône vraie',
                        'true-color'  => 'Couleur vraie',
                        'false-color' => 'Couleur fausse',
                    ],

                    'toggle' => [
                        'boolean'     => 'Booléen',
                        'false-icon'  => 'Icône fausse',
                        'true-icon'   => 'Icône vraie',
                        'true-color'  => 'Couleur vraie',
                        'false-color' => 'Couleur fausse',
                    ],
                ],
            ],

            'settings' => [
                'title' => 'Paramètres',

                'fields' => [
                    'type'           => 'Type',
                    'input-type'     => 'Type d\'entrée',
                    'is-multiselect' => 'Est multi-sélection',
                    'sort-order'     => 'Ordre de tri',

                    'type-options' => [
                        'text'          => 'Champ de texte',
                        'textarea'      => 'Zone de texte',
                        'select'        => 'Sélection',
                        'checkbox'      => 'Case à cocher',
                        'radio'         => 'Radio',
                        'toggle'        => 'Basculer',
                        'checkbox-list' => 'Liste de cases à cocher',
                        'datetime'      => 'Sélecteur de date et heure',
                        'editor'        => 'Éditeur de texte riche',
                        'markdown'      => 'Éditeur Markdown',
                        'color'         => 'Sélecteur de couleur',
                    ],

                    'input-type-options' => [
                        'text'     => 'Texte',
                        'email'    => 'E-mail',
                        'numeric'  => 'Numérique',
                        'integer'  => 'Entier',
                        'password' => 'Mot de passe',
                        'tel'      => 'Téléphone',
                        'url'      => 'URL',
                        'color'    => 'Couleur',
                    ],
                ],
            ],

            'resource' => [
                'title' => 'Ressource',

                'fields' => [
                    'resource' => 'Ressource',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'code'       => 'Code',
            'name'       => 'Nom',
            'type'       => 'Type',
            'resource'   => 'Ressource',
            'created-at' => 'Créé le',
        ],

        'groups' => [
        ],

        'filters' => [
            'type'     => 'Type',
            'resource' => 'Ressource',

            'type-options' => [
                'text'          => 'Champ de texte',
                'textarea'      => 'Zone de texte',
                'select'        => 'Sélection',
                'checkbox'      => 'Case à cocher',
                'radio'         => 'Radio',
                'toggle'        => 'Basculer',
                'checkbox-list' => 'Liste de cases à cocher',
                'datetime'      => 'Sélecteur de date et heure',
                'editor'        => 'Éditeur de texte riche',
                'markdown'      => 'Éditeur Markdown',
                'color'         => 'Sélecteur de couleur',
            ],
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Champ restauré',
                    'body'  => 'Le champ a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Champ supprimé',
                    'body'  => 'Le champ a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Champ supprimé définitivement',
                    'body'  => 'Le champ a été supprimé définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Champs restaurés',
                    'body'  => 'Les champs ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Champs supprimés',
                    'body'  => 'Les champs ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Champs supprimés définitivement',
                    'body'  => 'Les champs ont été supprimés définitivement avec succès.',
                ],
            ],
        ],
    ],
];
