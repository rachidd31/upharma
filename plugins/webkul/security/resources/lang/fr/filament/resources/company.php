<?php

return [
    'title' => 'Entreprises',

    'navigation' => [
        'title' => 'Entreprises',
        'group' => 'Paramètres',
    ],

    'global-search' => [
        'name'  => 'Nom',
        'email' => 'Email',
    ],

    'form' => [
        'sections' => [
            'company-information' => [
                'title'  => 'Informations sur l\'entreprise',
                'fields' => [
                    'name'                  => 'Nom de l\'entreprise',
                    'registration-number'   => 'Numéro d\'immatriculation',
                    'company-id'            => 'ID de l\'entreprise',
                    'tax-id'                => 'Identifiant fiscal',
                    'tax-id-tooltip'        => 'L\'identifiant fiscal est un identifiant unique pour votre entreprise.',
                    'website'               => 'Site web',
                ],
            ],

            'address-information' => [
                'title'  => 'Informations d\'adresse',

                'fields' => [
                    'street1'        => 'Adresse 1',
                    'street2'        => 'Adresse 2',
                    'city'           => 'Ville',
                    'zipcode'        => 'Code postal',
                    'country'        => 'Pays',
                    'currency-name'  => 'Nom de la devise',
                    'phone-code'     => 'Indicatif téléphonique',
                    'code'           => 'Code',
                    'country-name'   => 'Nom du pays',
                    'state-required' => 'État requis',
                    'zip-required'   => 'Code postal requis',
                    'create-country' => 'Créer un pays',
                    'state'          => 'État',
                    'state-name'     => 'Nom de l\'état',
                    'state-code'     => 'Code de l\'état',
                    'create-state'   => 'Créer un état',
                ],
            ],

            'additional-information' => [
                'title' => 'Informations supplémentaires',

                'fields' => [
                    'default-currency'        => 'Devise par défaut',
                    'currency-name'           => 'Nom de la devise',
                    'currency-full-name'      => 'Nom complet de la devise',
                    'currency-symbol'         => 'Symbole de la devise',
                    'currency-iso-numeric'    => 'Code ISO numérique de la devise',
                    'currency-decimal-places' => 'Décimales de la devise',
                    'currency-rounding'       => 'Arrondi de la devise',
                    'currency-status'         => 'Statut de la devise',
                    'company-foundation-date' => 'Date de création de l\'entreprise',
                    'currency-create'         => 'Créer une devise',
                    'status'                  => 'Statut',
                ],
            ],

            'branding' => [
                'title'  => 'Image de marque',
                'fields' => [
                    'company-logo' => 'Logo de l\'entreprise',
                    'color'        => 'Couleur',
                ],
            ],

            'contact-information' => [
                'title'  => 'Informations de contact',
                'fields' => [
                    'email'  => 'Adresse email',
                    'phone'  => 'Numéro de téléphone',
                    'mobile' => 'Numéro de téléphone portable',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'logo'                 => 'Logo',
            'company-name'         => 'Nom de l\'entreprise',
            'branches'             => 'Succursales',
            'email'                => 'Email',
            'city'                 => 'Ville',
            'country'              => 'Pays',
            'currency'             => 'Devise',
            'status'               => 'Statut',
            'created-at'           => 'Créé le',
            'updated-at'           => 'Mis à jour le',
        ],

        'groups' => [
            'company-name' => 'Nom de l\'entreprise',
            'city'         => 'Ville',
            'country'      => 'Pays',
            'state'        => 'État',
            'email'        => 'Email',
            'phone'        => 'Téléphone',
            'currency'     => 'Devise',
            'created-at'   => 'Créé le',
            'updated-at'   => 'Mis à jour le',
        ],

        'filters' => [
            'status'  => 'Statut',
            'country' => 'Pays',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Entreprise modifiée',
                    'body'  => 'L\'entreprise a été modifiée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Entreprise supprimée',
                    'body'  => 'L\'entreprise a été supprimée avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Entreprise restaurée',
                    'body'  => 'L\'entreprise a été restaurée avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Entreprises restaurées',
                    'body'  => 'Les entreprises ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Entreprises supprimées',
                    'body'  => 'Les entreprises ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Entreprises supprimées définitivement',
                    'body'  => 'Les entreprises ont été supprimées définitivement avec succès.',
                ],
            ],
        ],

        'empty-state-actions' => [
            'create' => [
                'notification' => [
                    'title' => 'Entreprises créées',
                    'body'  => 'Les entreprises ont été créées avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'company-information' => [
                'title'   => 'Informations sur l\'entreprise',
                'entries' => [
                    'name'                  => 'Nom de l\'entreprise',
                    'registration-number'   => 'Numéro d\'immatriculation',
                    'company-id'            => 'ID de l\'entreprise',
                    'tax-id'                => 'Identifiant fiscal',
                    'tax-id-tooltip'        => 'L\'identifiant fiscal est un identifiant unique pour votre entreprise.',
                    'website'               => 'Site web',
                ],
            ],

            'address-information' => [
                'title'  => 'Informations d\'adresse',

                'entries' => [
                    'street1'        => 'Adresse 1',
                    'street2'        => 'Adresse 2',
                    'city'           => 'Ville',
                    'zipcode'        => 'Code postal',
                    'country'        => 'Pays',
                    'currency-name'  => 'Nom de la devise',
                    'phone-code'     => 'Indicatif téléphonique',
                    'code'           => 'Code',
                    'country-name'   => 'Nom du pays',
                    'state-required' => 'État requis',
                    'zip-required'   => 'Code postal requis',
                    'create-country' => 'Créer un pays',
                    'state'          => 'État',
                    'state-name'     => 'Nom de l\'état',
                    'state-code'     => 'Code de l\'état',
                    'create-state'   => 'Créer un état',
                ],
            ],

            'additional-information' => [
                'title' => 'Informations supplémentaires',

                'entries' => [
                    'default-currency'        => 'Devise par défaut',
                    'currency-name'           => 'Nom de la devise',
                    'currency-full-name'      => 'Nom complet de la devise',
                    'currency-symbol'         => 'Symbole de la devise',
                    'currency-iso-numeric'    => 'Code ISO numérique de la devise',
                    'currency-decimal-places' => 'Décimales de la devise',
                    'currency-rounding'       => 'Arrondi de la devise',
                    'currency-status'         => 'Statut de la devise',
                    'company-foundation-date' => 'Date de création de l\'entreprise',
                    'currency-create'         => 'Créer une devise',
                    'status'                  => 'Statut',
                ],
            ],

            'branding' => [
                'title'   => 'Image de marque',
                'entries' => [
                    'company-logo' => 'Logo de l\'entreprise',
                    'color'        => 'Couleur',
                ],
            ],

            'contact-information' => [
                'title'   => 'Informations de contact',
                'entries' => [
                    'email'  => 'Adresse email',
                    'phone'  => 'Numéro de téléphone',
                    'mobile' => 'Numéro de téléphone portable',
                ],
            ],
        ],
    ],
];
