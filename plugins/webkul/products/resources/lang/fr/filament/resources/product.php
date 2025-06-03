<?php

return [
    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'name'             => 'Nom',
                    'name-placeholder' => 'ex. T-shirt',
                    'description'      => 'Description',
                    'tags'             => 'Tags',
                ],
            ],

            'images' => [
                'title' => 'Images',
            ],

            'inventory' => [
                'title' => 'Inventaire',

                'fields' => [],

                'fieldsets' => [
                    'logistics' => [
                        'title' => 'Logistique',

                        'fields' => [
                            'weight' => 'Poids',
                            'volume' => 'Volume',
                        ],
                    ],
                ],
            ],

            'settings' => [
                'title' => 'Paramètres',

                'fields' => [
                    'type'      => 'Type',
                    'reference' => 'Référence',
                    'barcode'   => 'Code-barres',
                    'category'  => 'Catégorie',
                    'company'   => 'Entreprise',
                ],
            ],

            'pricing' => [
                'title' => 'Tarification',

                'fields' => [
                    'price' => 'Prix',
                    'cost'  => 'Coût',
                ],
            ],

            'additional' => [
                'title' => 'Additionnel',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'        => 'Nom',
            'variants'    => 'Variantes',
            'images'      => 'Images',
            'type'        => 'Type',
            'reference'   => 'Référence',
            'responsible' => 'Responsable',
            'barcode'     => 'Code-barres',
            'category'    => 'Catégorie',
            'company'     => 'Entreprise',
            'price'       => 'Prix',
            'cost'        => 'Coût',
            'on-hand'     => 'En stock',
            'tags'        => 'Tags',
            'deleted-at'  => 'Supprimé le',
            'created-at'  => 'Créé le',
            'updated-at'  => 'Mis à jour le',
        ],

        'groups' => [
            'type'       => 'Type',
            'category'   => 'Catégorie',
            'created-at' => 'Créé le',
        ],

        'filters' => [
            'name'        => 'Nom',
            'type'        => 'Type',
            'reference'   => 'Référence',
            'barcode'     => 'Code-barres',
            'category'    => 'Catégorie',
            'company'     => 'Entreprise',
            'price'       => 'Prix',
            'cost'        => 'Coût',
            'is-favorite' => 'Est Favori',
            'weight'      => 'Poids',
            'volume'      => 'Volume',
            'tags'        => 'Tags',
            'responsible' => 'Responsable',
            'created-at'  => 'Créé le',
            'updated-at'  => 'Mis à jour le',
            'creator'     => 'Créateur',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Produit restauré',
                    'body'  => 'Le produit a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Produit supprimé',
                    'body'  => 'Le produit a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Produit supprimé définitivement',
                        'body'  => 'Le produit a été supprimé définitivement avec succès.',
                    ],

                    'error' => [
                        'title' => 'Le produit n\'a pas pu être supprimé',
                        'body'  => 'Le produit ne peut pas être supprimé car il est actuellement utilisé.',
                    ],
                ],
            ],
        ],

        'bulk-actions' => [
            'print' => [
                'label' => 'Imprimer les étiquettes',

                'form' => [
                    'fields' => [
                        'quantity' => 'Nombre d\'étiquettes',
                        'format'   => 'Format',

                        'format-options' => [
                            'dymo'       => 'Dymo',
                            '2x7_price'  => '2x7 avec prix',
                            '4x7_price'  => '4x7 avec prix',
                            '4x12'       => '4x12',
                            '4x12_price' => '4x12 avec prix',
                        ],
                    ],
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Produits restaurés',
                    'body'  => 'Les produits ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Produits supprimés',
                    'body'  => 'Les produits ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Produits supprimés définitivement',
                        'body'  => 'Les produits ont été supprimés définitivement avec succès.',
                    ],

                    'error' => [
                        'title' => 'Les produits n\'ont pas pu être supprimés',
                        'body'  => 'Les produits ne peuvent pas être supprimés car ils sont actuellement utilisés.',
                    ],
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'entries' => [
                    'name'             => 'Nom',
                    'name-placeholder' => 'ex. T-shirt',
                    'description'      => 'Description',
                    'tags'             => 'Tags',
                ],
            ],

            'images' => [
                'title' => 'Images',

                'entries' => [],
            ],

            'settings' => [
                'title' => 'Paramètres',

                'entries' => [
                    'type'      => 'Type',
                    'reference' => 'Référence',
                    'barcode'   => 'Code-barres',
                    'category'  => 'Catégorie',
                    'company'   => 'Entreprise',
                ],
            ],

            'pricing' => [
                'title' => 'Tarification',

                'entries' => [
                    'price' => 'Prix',
                    'cost'  => 'Coût',
                ],
            ],

            'inventory' => [
                'title' => 'Inventaire',

                'fieldsets' => [
                    'logistics' => [
                        'title' => 'Logistique',

                        'entries' => [
                            'weight' => 'Poids',
                            'volume' => 'Volume',
                        ],
                    ],
                ],
            ],

            'record-information' => [
                'title' => 'Informations d\'enregistrement',

                'entries' => [
                    'created-at' => 'Créé le',
                    'created-by' => 'Créé par',
                    'updated-at' => 'Mis à jour le',
                ],
            ],
        ],
    ],
];