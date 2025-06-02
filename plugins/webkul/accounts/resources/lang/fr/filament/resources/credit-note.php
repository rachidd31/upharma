<?php

return [
    'title' => 'Note de Crédit',

    'navigation' => [
        'title' => 'Notes de Crédit',
        'group' => 'Factures',
    ],

    'global-search' => [
        'number'           => 'Numéro',
        'customer'         => 'Client',
        'invoice-date'     => 'Date de la Note de Crédit',
        'invoice-due-date' => 'Date d\'échéance de la Note de Crédit',
    ],

    'form' => [
        'section' => [
            'general' => [
                'title'  => 'Général',
                'fields' => [
                    'customer-invoice' => 'Note de Crédit Client',
                    'customer'         => 'Client',
                    'invoice-date'     => 'Date de la Note de Crédit',
                    'due-date'         => 'Date d\'échéance',
                    'payment-term'     => 'Terme de Paiement',
                ],
            ],
        ],

        'tabs' => [
            'invoice-lines' => [
                'title' => 'Lignes de Note de Crédit',

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
                    'invoice' => [
                        'title'  => 'Note de Crédit',
                        'fields' => [
                            'customer-reference' => 'Référence Client',
                            'sales-person'       => 'Commercial',
                            'payment-reference'  => 'Référence de Paiement',
                            'recipient-bank'     => 'Banque du Bénéficiaire',
                            'delivery-date'      => 'Date de Livraison',
                        ],
                    ],

                    'accounting' => [
                        'title' => 'Comptabilité',

                        'fields' => [
                            'incoterm'          => 'Incoterm',
                            'incoterm-location' => 'Emplacement Incoterm',
                            'payment-method'    => 'Méthode de Paiement',
                            'auto-post'         => 'Publication Automatique',
                            'checked'           => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'  => 'Informations Supplémentaires',
                        'fields' => [
                            'company'  => 'Entreprise',
                            'currency' => 'Devise',
                        ],
                    ],

                    'marketing' => [
                        'title'  => 'Marketing',
                        'fields' => [
                            'campaign' => 'Campagne',
                            'medium'   => 'Médium',
                            'source'   => 'Source',
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
                    'customer-invoice' => 'Note de Crédit Client',
                    'customer'         => 'Client',
                    'invoice-date'     => 'Date de la Note de Crédit',
                    'due-date'         => 'Date d\'échéance',
                    'payment-term'     => 'Terme de Paiement',
                ],
            ],
        ],

        'tabs' => [
            'invoice-lines' => [
                'title' => 'Lignes de Note de Crédit',

                'repeater' => [
                    'products' => [
                        'entries' => [
                            'product'             => 'Produit',
                            'quantity'            => 'Quantité',
                            'unit'                => 'Unité de Mesure',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Pourcentage de Remise',
                            'unit-price'          => 'Prix Unitaire',
                            'sub-total'           => 'Sous-total',
                            'total'               => 'Total',
                        ],
                    ],
                ],
            ],

            'other-information' => [
                'title'    => 'Autres Informations',
                'fieldset' => [
                    'invoice' => [
                        'title'   => 'Note de Crédit',
                        'entries' => [
                            'customer-reference' => 'Référence Client',
                            'sales-person'       => 'Commercial',
                            'payment-reference'  => 'Référence de Paiement',
                            'recipient-bank'     => 'Banque du Bénéficiaire',
                            'delivery-date'      => 'Date de Livraison',
                        ],
                    ],

                    'accounting' => [
                        'title' => 'Comptabilité',

                        'fieldset' => [
                            'incoterm'          => 'Incoterm',
                            'incoterm-location' => 'Emplacement Incoterm',
                            'payment-method'    => 'Méthode de Paiement',
                            'auto-post'         => 'Publication Automatique',
                            'checked'           => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'   => 'Informations Supplémentaires',
                        'entries' => [
                            'company'  => 'Entreprise',
                            'currency' => 'Devise',
                        ],
                    ],

                    'marketing' => [
                        'title'   => 'Marketing',
                        'entries' => [
                            'campaign' => 'Campagne',
                            'medium'   => 'Médium',
                            'source'   => 'Source',
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
