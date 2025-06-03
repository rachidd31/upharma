<?php

return [
    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'company'    => 'Entreprise',
                    'avatar'     => 'Avatar',
                    'tax-id'     => 'Numéro d\'identification fiscale',
                    'job-title'  => 'Titre du poste',
                    'phone'      => 'Téléphone',
                    'mobile'     => 'Mobile',
                    'email'      => 'Email',
                    'website'    => 'Site web',
                    'title'      => 'Titre',
                    'name'       => 'Nom',
                    'short-name' => 'Nom abrégé',
                    'tags'       => 'Tags',
                    'color'      => 'Couleur',
                ],
            ],

            'address' => [
                'title' => 'Adresse',

                'fields' => [
                    'street1' => 'Adresse 1',
                    'street2' => 'Adresse 2',
                    'city'    => 'Ville',
                    'zip'     => 'Code postal',
                    'state'   => 'État/Province',
                    'country' => 'Pays',
                    'name'    => 'Nom',
                    'code'    => 'Code',
                ],
            ],
        ],

        'tabs' => [
            'sales-purchase' => [
                'title' => 'Ventes et Achats',

                'fields' => [
                    'responsible'         => 'Responsable',
                    'responsible-hint-text' => 'Ceci est le commercial interne responsable de ce client',
                    'company-id'          => 'ID Entreprise',
                    'company-id-hint-text'  => 'Le numéro d\'enregistrement de l\'entreprise. À utiliser s\'il est différent de l\'identifiant fiscal. Il doit être unique parmi tous les partenaires d\'un même pays.',
                    'reference'           => 'Référence',
                    'industry'            => 'Secteur d\'activité',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'parent' => 'Parent',
        ],

        'groups' => [
            'account-type' => 'Type de Compte',
            'parent'       => 'Parent',
            'title'        => 'Titre',
            'job-title'    => 'Titre du poste',
            'industry'     => 'Secteur d\'activité',
        ],

        'filters' => [
            'account-type'     => 'Type de Compte',
            'name'             => 'Nom',
            'email'            => 'Email',
            'parent'           => 'Parent',
            'title'            => 'Titre',
            'tax-id'           => 'Numéro d\'identification fiscale',
            'phone'            => 'Téléphone',
            'mobile'           => 'Mobile',
            'job-title'        => 'Titre du poste',
            'website'          => 'Site web',
            'company-registry' => 'Registre du Commerce',
            'responsible'      => 'Responsable',
            'reference'        => 'Référence',
            'parent'           => 'Parent',
            'creator'          => 'Créateur',
            'company'          => 'Entreprise',
            'industry'         => 'Secteur d\'activité',
            'industry'         => 'Secteur d\'activité',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Contact mis à jour',
                    'body'  => 'Le contact a été mis à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Contact restauré',
                    'body'  => 'Le contact a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Contact supprimé',
                    'body'  => 'Le contact a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Contact supprimé définitivement',
                        'body'  => 'Le contact a été supprimé définitivement avec succès.',
                    ],

                    'error' => [
                        'title' => 'Le contact n\'a pas pu être supprimé',
                        'body'  => 'Le contact ne peut pas être supprimé car il est actuellement utilisé.',
                    ],
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Contacts restaurés',
                    'body'  => 'Les contacts ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Contacts supprimés',
                    'body'  => 'Les contacts ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Contacts supprimés définitivement',
                        'body'  => 'Les contacts ont été supprimés définitivement avec succès.',
                    ],

                    'error' => [
                        'title' => 'Les contacts n\'ont pas pu être supprimés',
                        'body'  => 'Les contacts ne peuvent pas être supprimés car ils sont actuellement utilisés.',
                    ],
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'company'    => 'Entreprise',
                    'avatar'     => 'Avatar',
                    'tax-id'     => 'Numéro d\'identification fiscale',
                    'job-title'  => 'Titre du poste',
                    'phone'      => 'Téléphone',
                    'mobile'     => 'Mobile',
                    'email'      => 'Email',
                    'website'    => 'Site web',
                    'title'      => 'Titre',
                    'name'       => 'Nom',
                    'short-name' => 'Nom abrégé',
                    'tags'       => 'Tags',
                ],
            ],

            'address' => [
                'title' => 'Adresse',

                'fields' => [
                    'street1' => 'Adresse 1',
                    'street2' => 'Adresse 2',
                    'city'    => 'Ville',
                    'zip'     => 'Code postal',
                    'state'   => 'État/Province',
                    'country' => 'Pays',
                    'name'    => 'Nom',
                    'code'    => 'Code',
                ],
            ],
        ],

        'tabs' => [
            'sales-purchase' => [
                'title' => 'Ventes et Achats',

                'fields' => [
                    'responsible'         => 'Responsable',
                    'responsible-hint-text' => 'Ceci est le commercial interne responsable de ce client',
                    'company-id'          => 'ID Entreprise',
                    'company-id-hint-text'  => 'Le numéro d\'enregistrement de l\'entreprise. À utiliser s\'il est différent de l\'identifiant fiscal. Il doit être unique parmi tous les partenaires d\'un même pays.',
                    'reference'           => 'Référence',
                    'industry'            => 'Secteur d\'activité',
                ],
            ],
        ],
    ],
];