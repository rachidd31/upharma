<?php

return [
    'title' => 'Facture Fournisseur',

    'navigation' => [
        'title' => 'Factures Fournisseurs',
        'group' => 'Factures',
    ],

    'global-search' => [
        'number'           => 'Numéro',
        'customer'         => 'Fournisseur',
        'invoice-date'     => 'Date de la Facture',
        'invoice-due-date' => 'Date d\'échéance de la Facture',
    ],

    'form' => [
        'section' => [
            'general' => [
                'title'  => 'Général',
                'fields' => [
                    'vendor-bill'       => 'Facture Fournisseur',
                    'vendor'            => 'Fournisseur',
                    'bill-date'         => 'Date de la Facture',
                    'bill-reference'    => 'Référence de la Facture',
                    'accounting-date'   => 'Date Comptable',
                    'payment-reference' => 'Référence de Paiement',
                    'recipient-bank'    => 'Banque du Bénéficiaire',
                    'due-date'          => 'Date d\'échéance',
                    'payment-term'      => 'Terme de Paiement',
                ],
            ],
        ],

        'tabs' => [
            'invoice-lines' => [
                'title' => 'Lignes de Facture',

                'repeater' => [
                    'products' => [
                        'title'       => 'Produits',
                        'add-product' => 'Ajouter un Produit',

                        'fields' => [
                            'product'             => 'Produit',
                            'quantity'            => 'Quantité',
                            'unit'                => 'Unité',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Pourcentage de Remise',
                            'unit-price'          => 'Prix Unitaire',
                            'sub-total'           => 'Sous-total',
                        ],
                    ],
                ],
            ],

            'other-information' => [
                'title'    => 'Autres Informations',
                'fieldset' => [
                    'accounting' => [
                        'title' => 'Comptabilité',

                        'fields' => [
                            'incoterm'          => 'Incoterm',
                            'incoterm-location' => 'Emplacement Incoterm',
                        ],
                    ],

                    'secured' => [
                        'title'  => 'Sécurisé',
                        'fields' => [
                            'payment-method' => 'Méthode de Paiement',
                            'auto-post'      => 'Publication Automatique',
                            'checked'        => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'  => 'Informations Supplémentaires',
                        'fields' => [
                            'company'  => 'Entreprise',
                            'currency' => 'Devise',
                        ],
                    ],
                ],
            ],

            'term-and-conditions' => [
                'title' => 'Termes et Conditions',
            ],
        ],
    ],

    'infolist' => [
        'section' => [
            'general' => [
                'title'   => 'Général',
                'entries' => [
                    'vendor-invoice'    => 'Facture Fournisseur',
                    'vendor'            => 'Fournisseur',
                    'bill-date'         => 'Date de la Facture',
                    'bill-reference'    => 'Référence de la Facture',
                    'accounting-date'   => 'Date Comptable',
                    'payment-reference' => 'Référence de Paiement',
                    'recipient-bank'    => 'Banque du Bénéficiaire',
                    'due-date'          => 'Date d\'échéance',
                    'payment-term'      => 'Terme de Paiement',
                ],
            ],
        ],

        'tabs' => [
            'invoice-lines' => [
                'title' => 'Lignes de Facture',

                'repeater' => [
                    'products' => [
                        'title'       => 'Produits',
                        'add-product' => 'Ajouter un Produit',

                        'entries' => [
                            'product'             => 'Produit',
                            'quantity'            => 'Quantité',
                            'unit'                => 'Unité',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Pourcentage de Remise',
                            'unit-price'          => 'Prix Unitaire',
                            'sub-total'           => 'Sous-total',
                        ],
                    ],
                ],
            ],

            'other-information' => [
                'title'    => 'Autres Informations',
                'fieldset' => [
                    'accounting' => [
                        'title' => 'Comptabilité',

                        'entries' => [
                            'incoterm'          => 'Incoterm',
                            'incoterm-location' => 'Emplacement Incoterm',
                        ],
                    ],

                    'secured' => [
                        'title'   => 'Sécurisé',
                        'entries' => [
                            'payment-method' => 'Méthode de Paiement',
                            'auto-post'      => 'Publication Automatique',
                            'checked'        => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'   => 'Informations Supplémentaires',
                        'entries' => [
                            'company'  => 'Entreprise',
                            'currency' => 'Devise',
                        ],
                    ],
                ],
            ],

            'term-and-conditions' => [
                'title' => 'Termes et Conditions',
            ],
        ],
    ],
];
