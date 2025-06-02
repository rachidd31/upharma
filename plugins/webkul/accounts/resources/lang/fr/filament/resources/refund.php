<?php

return [
    'title' => 'Facture',

    'navigation' => [
        'title' => 'Factures',
        'group' => 'Factures',
    ],

    'global-search' => [
        'number'           => 'Numéro',
        'customer'         => 'Client',
        'invoice-date'     => 'Date de facture',
        'invoice-due-date' => 'Date d\'échéance de la facture',
    ],

    'form' => [
        'section' => [
            'general' => [
                'title'  => 'Général',
                'fields' => [
                    'vendor-credit-note' => 'Note de crédit fournisseur',
                    'vendor'             => 'Fournisseur',
                    'bill-date'          => 'Date de la facture',
                    'bill-reference'     => 'Référence de la facture',
                    'accounting-date'    => 'Date comptable',
                    'payment-reference'  => 'Référence de paiement',
                    'recipient-bank'     => 'Banque du bénéficiaire',
                    'due-date'           => 'Date d\'échéance',
                    'payment-term'       => 'Terme de paiement',
                ],
            ],
        ],

        'tabs' => [
            'invoice-lines' => [
                'title' => 'Lignes de facture',

                'repeater' => [
                    'products' => [
                        'title'       => 'Produits',
                        'add-product' => 'Ajouter un produit',

                        'fields' => [
                            'product'             => 'Produit',
                            'quantity'            => 'Quantité',
                            'unit'                => 'Unité',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Pourcentage de remise',
                            'unit-price'          => 'Prix unitaire',
                            'sub-total'           => 'Sous-total',
                        ],
                    ],
                ],
            ],

            'other-information' => [
                'title'    => 'Autres informations',
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
                            'payment-method' => 'Méthode de paiement',
                            'auto-post'      => 'Publication automatique',
                            'checked'        => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'  => 'Informations supplémentaires',
                        'fields' => [
                            'company'  => 'Entreprise',
                            'currency' => 'Devise',
                        ],
                    ],
                ],
            ],

            'term-and-conditions' => [
                'title' => 'Termes et conditions',
            ],
        ],
    ],

    'infolist' => [
        'section' => [
            'general' => [
                'title'   => 'Général',
                'entries' => [
                    'vendor-invoice'    => 'Facture fournisseur',
                    'vendor'            => 'Fournisseur',
                    'bill-date'         => 'Date de la facture',
                    'bill-reference'    => 'Référence de la facture',
                    'accounting-date'   => 'Date comptable',
                    'payment-reference' => 'Référence de paiement',
                    'recipient-bank'    => 'Banque du bénéficiaire',
                    'due-date'          => 'Date d\'échéance',
                    'payment-term'      => 'Terme de paiement',
                ],
            ],
        ],

        'tabs' => [
            'invoice-lines' => [
                'title' => 'Lignes de facture',

                'repeater' => [
                    'products' => [
                        'title'       => 'Produits',
                        'add-product' => 'Ajouter un produit',

                        'entries' => [
                            'product'             => 'Produit',
                            'quantity'            => 'Quantité',
                            'unit'                => 'Unité',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Pourcentage de remise',
                            'unit-price'          => 'Prix unitaire',
                            'sub-total'           => 'Sous-total',
                        ],
                    ],
                ],
            ],

            'other-information' => [
                'title'    => 'Autres informations',
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
                            'payment-method' => 'Méthode de paiement',
                            'auto-post'      => 'Publication automatique',
                            'checked'        => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'   => 'Informations supplémentaires',
                        'entries' => [
                            'company'  => 'Entreprise',
                            'currency' => 'Devise',
                        ],
                    ],
                ],
            ],

            'term-and-conditions' => [
                'title' => 'Termes et conditions',
            ],
        ],
    ],
];
