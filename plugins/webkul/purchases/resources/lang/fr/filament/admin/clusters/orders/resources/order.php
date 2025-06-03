<?php

return [
    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'vendor'                     => 'Fournisseur',
                    'vendor-reference'           => 'Référence Fournisseur',
                    'vendor-reference-tooltip'   => 'Le numéro de référence du bon de commande ou de l\'offre fourni par le fournisseur. Il est utilisé pour le rapprochement lors de la réception des produits, car cette référence est généralement incluse dans le bon de livraison du fournisseur.',
                    'agreement'                  => 'Accord',
                    'currency'                   => 'Devise',
                    'confirmation-date'          => 'Date de Confirmation',
                    'order-deadline'             => 'Date Limite de Commande',
                    'expected-arrival'           => 'Arrivée Prévue',
                    'confirmed-by-vendor'        => 'Confirmé par le Fournisseur',
                ],
            ],
        ],

        'tabs' => [
            'products' => [
                'title' => 'Produits',

                'repeater' => [
                    'products' => [
                        'title'            => 'Produits',
                        'add-product-line' => 'Ajouter un Produit',

                        'fields' => [
                            'product'             => 'Produit',
                            'expected-arrival'    => 'Arrivée Prévue',
                            'quantity'            => 'Quantité',
                            'received'            => 'Reçu',
                            'billed'              => 'Facturé',
                            'unit'                => 'Unité',
                            'packaging-qty'       => 'Qté Conditionnement',
                            'packaging'           => 'Conditionnement',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Remise (%)',
                            'unit-price'          => 'Prix Unitaire',
                            'amount'              => 'Montant',
                        ],
                    ],

                    'section' => [
                        'title' => 'Ajouter une Section',

                        'fields' => [
                        ],
                    ],

                    'note' => [
                        'title' => 'Ajouter une Note',

                        'fields' => [
                        ],
                    ],
                ],
            ],

            'additional' => [
                'title' => 'Informations Complémentaires',

                'fields' => [
                    'buyer'             => 'Acheteur',
                    'company'           => 'Entreprise',
                    'source-document'   => 'Document Source',
                    'incoterm'          => 'Incoterm',
                    'incoterm-tooltip'  => 'Les Incoterms (International Commercial Terms) sont un ensemble de termes commerciaux standardisés utilisés dans les transactions mondiales pour définir les responsabilités entre acheteurs et vendeurs.',
                    'incoterm-location' => 'Lieu Incoterm',
                    'payment-term'      => 'Conditions de Paiement',
                    'fiscal-position'   => 'Position Fiscale',
                ],
            ],

            'terms' => [
                'title' => 'Termes et Conditions',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'priority'         => 'Priorité',
            'vendor-reference' => 'Référence Fournisseur',
            'reference'        => 'Référence',
            'vendor'           => 'Fournisseur',
            'buyer'            => 'Acheteur',
            'company'          => 'Entreprise',
            'order-deadline'   => 'Date Limite de Commande',
            'source-document'  => 'Document Source',
            'untaxed-amount'   => 'Montant HT',
            'total-amount'     => 'Montant Total',
            'status'           => 'Statut',
            'billing-status'   => 'Statut de Facturation',
            'currency'         => 'Devise',
            'billing-status'   => 'Statut de Facturation',
        ],

        'groups' => [
            'vendor'     => 'Fournisseur',
            'buyer'      => 'Acheteur',
            'state'      => 'État',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'filters' => [
            'status'           => 'Statut',
            'vendor-reference' => 'Référence Fournisseur',
            'reference'        => 'Référence',
            'untaxed-amount'   => 'Montant HT',
            'total-amount'     => 'Montant Total',
            'order-deadline'   => 'Date Limite de Commande',
            'vendor'           => 'Fournisseur',
            'buyer'            => 'Acheteur',
            'company'          => 'Entreprise',
            'payment-term'     => 'Conditions de Paiement',
            'incoterm'         => 'Incoterm',
            'status'           => 'Statut',
            'created-at'       => 'Créé le',
            'updated-at'       => 'Mis à jour le',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Commande supprimée',
                        'body'  => 'La commande a été supprimée avec succès.',
                    ],

                    'error' => [
                        'title' => 'Impossible de supprimer la commande',
                        'body'  => 'La commande ne peut pas être supprimée car elle est actuellement utilisée.',
                    ],
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Commandes supprimées',
                        'body'  => 'Les commandes ont été supprimées avec succès.',
                    ],

                    'error' => [
                        'title' => 'Impossible de supprimer les commandes',
                        'body'  => 'Les commandes ne peuvent pas être supprimées car elles sont actuellement utilisées.',
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
                    'vendor'                     => 'Fournisseur',
                    'vendor-reference'           => 'Référence Fournisseur',
                    'vendor-reference-tooltip'   => 'Le numéro de référence du bon de commande ou de l\'offre fourni par le fournisseur. Il est utilisé pour le rapprochement lors de la réception des produits, car cette référence est généralement incluse dans le bon de livraison du fournisseur.',
                    'agreement'                  => 'Accord',
                    'currency'                   => 'Devise',
                    'confirmation-date'          => 'Date de Confirmation',
                    'order-deadline'             => 'Date Limite de Commande',
                    'expected-arrival'           => 'Arrivée Prévue',
                    'confirmed-by-vendor'        => 'Confirmé par le Fournisseur',
                ],
            ],
        ],

        'tabs' => [
            'products' => [
                'title' => 'Produits',

                'repeater' => [
                    'products' => [
                        'title'            => 'Produits',
                        'add-product-line' => 'Ajouter un Produit',

                        'entries' => [
                            'product'             => 'Produit',
                            'expected-arrival'    => 'Arrivée Prévue',
                            'quantity'            => 'Quantité',
                            'received'            => 'Reçu',
                            'billed'              => 'Facturé',
                            'unit'                => 'Unité',
                            'packaging-qty'       => 'Qté Conditionnement',
                            'packaging'           => 'Conditionnement',
                            'taxes'               => 'Taxes',
                            'discount-percentage' => 'Remise (%)',
                            'unit-price'          => 'Prix Unitaire',
                            'amount'              => 'Montant',
                        ],
                    ],

                    'section' => [
                        'title' => 'Ajouter une Section',
                    ],

                    'note' => [
                        'title' => 'Ajouter une Note',
                    ],
                ],
            ],

            'additional' => [
                'title' => 'Informations Complémentaires',

                'entries' => [
                    'buyer'             => 'Acheteur',
                    'company'           => 'Entreprise',
                    'source-document'   => 'Document Source',
                    'incoterm'          => 'Incoterm',
                    'incoterm-tooltip'  => 'Les Incoterms (International Commercial Terms) sont un ensemble de termes commerciaux standardisés utilisés dans les transactions mondiales pour définir les responsabilités entre acheteurs et vendeurs.',
                    'incoterm-location' => 'Lieu Incoterm',
                    'payment-term'      => 'Conditions de Paiement',
                    'fiscal-position'   => 'Position Fiscale',
                ],
            ],

            'terms' => [
                'title' => 'Termes et Conditions',
            ],
        ],
    ],
];