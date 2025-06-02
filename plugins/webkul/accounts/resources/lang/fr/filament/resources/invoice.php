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
                    'customer-invoice' => 'Facture client',
                    'customer'         => 'Client',
                    'invoice-date'     => 'Date de facture',
                    'due-date'         => 'Date d\'échéance',
                    'payment-term'     => 'Terme de paiement',
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
                    'invoice' => [
                        'title'  => 'Facture',
                        'fields' => [
                            'customer-reference' => 'Référence client',
                            'sales-person'       => 'Commercial',
                            'payment-reference'  => 'Référence de paiement',
                            'recipient-bank'     => 'Banque du bénéficiaire',
                            'delivery-date'      => 'Date de livraison',
                        ],
                    ],

                    'accounting' => [
                        'title' => 'Comptabilité',

                        'fieldset' => [
                            'incoterm'          => 'Incoterm',
                            'incoterm-location' => 'Emplacement Incoterm',
                            'payment-method'    => 'Mode de paiement',
                            'auto-post'         => 'Publication automatique',
                            'checked'           => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'  => 'Informations supplémentaires',
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
                'title' => 'Termes et conditions',
            ],
        ],
    ],

    'table' => [
        'total'   => 'Total',
        'columns' => [
            'number'           => 'Numéro',
            'state'            => 'État',
            'customer'         => 'Client',
            'invoice-date'     => 'Date de facture',
            'checked'          => 'Vérifié',
            'accounting-date'  => 'Comptabilité',
            'due-date'         => 'Date d\'échéance',
            'source-document'  => 'Document source',
            'reference'        => 'Référence',
            'sales-person'     => 'Commercial',
            'tax-excluded'     => 'Taxe exclue',
            'tax'              => 'Taxe',
            'total'            => 'Total',
            'amount-due'       => 'Montant dû',
            'invoice-currency' => 'Devise de la facture',
        ],

        'groups' => [
            'name'                         => 'Nom',
            'invoice-partner-display-name' => 'Nom d\'affichage du partenaire de facturation',
            'invoice-date'                 => 'Date de facture',
            'checked'                      => 'Vérifié',
            'date'                         => 'Date',
            'invoice-due-date'             => 'Date d\'échéance de la facture',
            'invoice-origin'               => 'Origine de la facture',
            'sales-person'                 => 'Commercial',
            'currency'                     => 'Devise',
            'created-at'                   => 'Créé le',
            'updated-at'                   => 'Mis à jour le',
        ],

        'filters' => [
            'number'                       => 'Numéro',
            'invoice-partner-display-name' => 'Nom d\'affichage du partenaire de facturation',
            'invoice-date'                 => 'Date de facture',
            'invoice-due-date'             => 'Date d\'échéance de la facture',
            'invoice-origin'               => 'Origine de la facture',
            'reference'                    => 'Référence',
            'created-at'                   => 'Créé le',
            'updated-at'                   => 'Mis à jour le',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Paiement supprimé',
                    'body'  => 'Le paiement a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Paiements supprimés',
                    'body'  => 'Les paiements ont été supprimés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'section' => [
            'general' => [
                'title'   => 'Général',
                'entries' => [
                    'customer-invoice' => 'Facture client',
                    'customer'         => 'Client',
                    'invoice-date'     => 'Date de facture',
                    'due-date'         => 'Date d\'échéance',
                    'payment-term'     => 'Terme de paiement',
                ],
            ],
        ],

        'tabs' => [
            'invoice-lines' => [
                'title' => 'Lignes de facture',

                'repeater' => [
                    'products' => [
                        'entries' => [
                            'product'             => 'Produit',
                            'quantity'            => 'Quantité',
                            'unit'                => 'Unité de mesure',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Pourcentage de remise',
                            'unit-price'          => 'Prix unitaire',
                            'sub-total'           => 'Sous-total',
                            'total'               => 'Total',
                        ],
                    ],
                ],
            ],

            'other-information' => [
                'title'    => 'Autres informations',
                'fieldset' => [
                    'invoice' => [
                        'title'   => 'Facture',
                        'entries' => [
                            'customer-reference' => 'Référence client',
                            'sales-person'       => 'Commercial',
                            'payment-reference'  => 'Référence de paiement',
                            'recipient-bank'     => 'Banque du bénéficiaire',
                            'delivery-date'      => 'Date de livraison',
                        ],
                    ],

                    'accounting' => [
                        'title' => 'Comptabilité',

                        'fieldset' => [
                            'incoterm'          => 'Incoterm',
                            'incoterm-location' => 'Emplacement Incoterm',
                            'payment-method'    => 'Mode de paiement',
                            'auto-post'         => 'Publication automatique',
                            'checked'           => 'Vérifié',
                        ],
                    ],

                    'additional-information' => [
                        'title'   => 'Informations supplémentaires',
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
                'title' => 'Termes et conditions',
            ],
        ],
    ],

];
