<?php

return [
    'title' => 'Devis',

    'navigation' => [
        'title' => 'Devis',
    ],

    'form' => [
        'section' => [
            'general' => [
                'title'  => 'Général',
                'fields' => [
                    'customer'       => 'Client',
                    'expiration'     => 'Expiration',
                    'quotation-date' => 'Date du devis',
                    'order-date'     => 'Date de la commande',
                    'payment-term'   => 'Conditions de paiement',
                ],
            ],
        ],

        'tabs' => [
            'order-line' => [
                'title' => 'Lignes de commande',

                'repeater' => [
                    'products' => [
                        'title'       => 'Produits',
                        'add-product' => 'Ajouter un produit',
                        'fields'      => [
                            'product'             => 'Produit',
                            'product-variants'    => 'Variantes de produit',
                            'product-simple'      => 'Produit simple',
                            'quantity'            => 'Quantité',
                            'uom'                 => 'Unité de mesure',
                            'lead-time'           => 'Délai de livraison',
                            'qty-delivered'       => 'Quantité livrée',
                            'qty-invoiced'        => 'Quantité facturée',
                            'packaging-qty'       => 'Quantité d’emballage',
                            'packaging'           => 'Emballage',
                            'unit-price'          => 'Prix unitaire',
                            'cost'                => 'Coût',
                            'margin'              => 'Marge',
                            'taxes'               => 'Taxes',
                            'amount'              => 'Montant',
                            'margin-percentage'   => 'Marge (%)',
                            'discount-percentage' => 'Remise (%)',
                        ],
                    ],

                    'product-optional' => [
                        'title'       => 'Produits optionnels',
                        'add-product' => 'Ajouter un produit',
                        'fields'      => [
                            'product'             => 'Produit',
                            'description'         => 'Description',
                            'quantity'            => 'Quantité',
                            'uom'                 => 'Unité de mesure',
                            'unit-price'          => 'Prix unitaire',
                            'discount-percentage' => 'Remise (%)',

                            'actions' => [
                                'tooltip' => [
                                    'add-order-line' => 'Ajouter une ligne de commande',
                                ],

                                'notifications' => [
                                    'product-added' => [
                                        'title' => 'Produit ajouté',
                                        'body'  => 'Le produit a été ajouté avec succès.',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'other-information' => [
                'title' => 'Autres informations',

                'fieldset' => [
                    'sales' => [
                        'title' => 'Ventes',

                        'fields' => [
                            'sales-person'       => 'Commercial',
                            'customer-reference' => 'Référence client',
                            'tags'               => 'Tags',
                        ],
                    ],

                    'shipping' => [
                        'title'  => 'Livraison',
                        'fields' => [
                            'commitment-date' => 'Date de livraison',
                        ],
                    ],

                    'tracking' => [
                        'title'  => 'Suivi',
                        'fields' => [
                            'source-document' => 'Document source',
                            'medium'          => 'Moyen',
                            'source'          => 'Source',
                            'campaign'        => 'Campagne',
                        ],
                    ],

                    'additional-information' => [
                        'title' => 'Informations supplémentaires',

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

    'table' => [
        'columns' => [
            'number'             => 'Numéro',
            'status'             => 'Statut',
            'invoice-status'     => 'Statut de la facture',
            'creation-date'      => 'Date de création',
            'commitment-date'    => 'Date d’engagement',
            'expected-date'      => 'Date prévue',
            'customer'           => 'Client',
            'sales-person'       => 'Commercial',
            'sales-team'         => 'Équipe commerciale',
            'untaxed-amount'     => 'Montant HT',
            'amount-tax'         => 'Montant TVA',
            'amount-total'       => 'Montant total',
            'customer-reference' => 'Référence client',
        ],

        'filters' => [
            'sales-person'     => 'Commercial',
            'utm-source'       => 'Source UTM',
            'company'          => 'Entreprise',
            'customer'         => 'Client',
            'journal'          => 'Journal',
            'invoice-address'  => 'Adresse de facturation',
            'shipping-address' => 'Adresse de livraison',
            'fiscal-position'  => 'Position fiscale',
            'payment-term'     => 'Conditions de paiement',
            'currency'         => 'Devise',
            'created-at'       => 'Créé le',
            'updated-at'       => 'Mis à jour le',
        ],

        'groups' => [
            'medium'          => 'Moyen',
            'source'          => 'Source',
            'team'            => 'Équipe',
            'sales-person'    => 'Commercial',
            'currency'        => 'Devise',
            'company'         => 'Entreprise',
            'customer'        => 'Client',
            'quotation-date'  => 'Date du devis',
            'commitment-date' => 'Date d’engagement',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Devis restauré',
                    'body'  => 'Le devis a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Devis supprimé',
                    'body'  => 'Le devis a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Devis supprimé définitivement',
                    'body'  => 'Le devis a été supprimé définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Devis restaurés',
                    'body'  => 'Les devis ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Devis supprimés',
                    'body'  => 'Les devis ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Devis supprimés définitivement',
                    'body'  => 'Les devis ont été supprimés définitivement avec succès.',
                ],
            ],
        ],

        'empty-state-action' => [
            'create' => [
                'notification' => [
                    'title' => 'Devis créés',
                    'body'  => 'Les devis ont été créés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'section' => [
            'general' => [
                'title'   => 'Général',
                'entries' => [
                    'customer'       => 'Client',
                    'expiration'     => 'Expiration',
                    'quotation-date' => 'Date du devis',
                    'payment-term'   => 'Conditions de paiement',
                ],
            ],
        ],

        'tabs' => [
            'order-line' => [
                'title' => 'Lignes de commande',

                'repeater' => [
                    'products' => [
                        'title'       => 'Produits',
                        'add-product' => 'Ajouter un produit',
                        'entries'     => [
                            'product'             => 'Produit',
                            'product-variants'    => 'Variantes de produit',
                            'product-simple'      => 'Produit simple',
                            'quantity'            => 'Quantité',
                            'uom'                 => 'Unité de mesure',
                            'lead-time'           => 'Délai de livraison',
                            'packaging-qty'       => 'Quantité d’emballage',
                            'packaging'           => 'Emballage',
                            'unit-price'          => 'Prix unitaire',
                            'cost'                => 'Coût',
                            'margin'              => 'Marge',
                            'taxes'               => 'Taxes',
                            'amount'              => 'Montant',
                            'margin-percentage'   => 'Marge (%)',
                            'discount-percentage' => 'Remise (%)',
                            'sub-total'           => 'Sous-total',
                        ],
                    ],

                    'product-optional' => [
                        'title'       => 'Produits optionnels',
                        'add-product' => 'Ajouter un produit',
                        'entries'     => [
                            'product'             => 'Produit',
                            'description'         => 'Description',
                            'quantity'            => 'Quantité',
                            'uom'                 => 'Unité de mesure',
                            'unit-price'          => 'Prix unitaire',
                            'discount-percentage' => 'Remise (%)',
                            'sub-total'           => 'Sous-total',

                            'actions' => [
                                'tooltip' => [
                                    'add-order-line' => 'Ajouter une ligne de commande',
                                ],

                                'notifications' => [
                                    'product-added' => [
                                        'title' => 'Produit ajouté',
                                        'body'  => 'Le produit a été ajouté avec succès.',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'other-information' => [
                'title' => 'Autres informations',

                'fieldset' => [
                    'sales' => [
                        'title' => 'Ventes',

                        'entries' => [
                            'sales-person'       => 'Commercial',
                            'customer-reference' => 'Référence client',
                            'tags'               => 'Tags',
                        ],
                    ],

                    'shipping' => [
                        'title'   => 'Livraison',
                        'entries' => [
                            'commitment-date' => 'Date de livraison',
                        ],
                    ],

                    'tracking' => [
                        'title'   => 'Suivi',
                        'entries' => [
                            'source-document' => 'Document source',
                            'medium'          => 'Moyen',
                            'source'          => 'Source',
                            'campaign'        => 'Campagne',
                        ],
                    ],

                    'additional-information' => [
                        'title' => 'Informations supplémentaires',

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
