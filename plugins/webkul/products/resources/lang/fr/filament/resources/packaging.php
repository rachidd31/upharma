<?php

return [
    'form' => [
        'name'    => 'Nom',
        'barcode' => 'Code-barres',
        'product' => 'Produit',
        'routes'  => 'Routes',
        'qty'     => 'Qté',
        'company' => 'Entreprise',
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'product'    => 'Produit',
            'routes'     => 'Routes',
            'qty'        => 'Qté',
            'company'    => 'Entreprise',
            'barcode'    => 'Code-barres',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'groups' => [
            'product'    => 'Produit',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'filters' => [
            'product' => 'Produit',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Mise à jour du conditionnement',
                    'body'  => 'Le conditionnement a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Conditionnement supprimé',
                        'body'  => 'Le conditionnement a été supprimé avec succès.',
                    ],

                    'error' => [
                        'title' => 'Le conditionnement n\'a pas pu être supprimé',
                        'body'  => 'Le conditionnement ne peut pas être supprimé car il est actuellement utilisé.',
                    ],
                ],
            ],
        ],

        'bulk-actions' => [
            'print' => [
                'label' => 'Imprimer',
            ],

            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Conditionnements supprimés',
                        'body'  => 'Les conditionnements ont été supprimés avec succès.',
                    ],

                    'error' => [
                        'title' => 'Les conditionnements n\'ont pas pu être supprimés',
                        'body'  => 'Les conditionnements ne peuvent pas être supprimés car ils sont actuellement utilisés.',
                    ],
                ],
            ],
        ],

        'empty-state-actions' => [
            'create' => [
                'label' => 'Nouveau Conditionnement',

                'notification' => [
                    'title' => 'Conditionnement créé',
                    'body'  => 'Le conditionnement a été créé avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Informations Générales',

                'entries' => [
                    'name'    => 'Nom du Paquet',
                    'barcode' => 'Code-barres',
                    'product' => 'Produit',
                    'qty'     => 'Quantité',
                ],
            ],

            'organization' => [
                'title' => 'Détails de l\'Organisation',

                'entries' => [
                    'company'    => 'Entreprise',
                    'creator'    => 'Créé par',
                    'created_at' => 'Créé le',
                    'updated_at' => 'Dernière mise à jour le',
                ],
            ],
        ],
    ],
];