<?php

return [
    'navigation' => [
        'title' => 'Listes de Prix Fournisseur',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'title'  => 'Général',

                'fields' => [
                    'vendor'                      => 'Fournisseur',
                    'vendor-product-name'         => 'Nom du Produit Fournisseur',
                    'vendor-product-name-tooltip' => 'Le nom du produit du fournisseur apparaîtra sur la demande de devis. Laissez-le vide pour utiliser le nom interne du produit.',
                    'vendor-product-code'         => 'Code Produit Fournisseur',
                    'vendor-product-code-tooltip' => 'Le code produit du fournisseur apparaîtra sur la demande de devis. Laissez-le vide pour utiliser le code interne.',
                    'delay'                       => 'Délai de Livraison (Jours)',
                    'delay-tooltip'               => 'Le délai (en jours) entre la confirmation du bon de commande et la réception du produit en entrepôt. Utilisé par le planificateur pour la planification automatique des bons de commande.',
                ],
            ],

            'prices' => [
                'title'  => 'Prix',

                'fields' => [
                    'product'            => 'Produit',
                    'quantity'           => 'Quantité',
                    'quantity-tooltip'   => 'La quantité minimale requise à acheter auprès de ce fournisseur pour bénéficier du prix spécifié. Ceci est exprimé dans l\'unité de mesure du produit du fournisseur ou, si non définie, l\'unité de mesure par défaut du produit.',
                    'unit-price'         => 'Prix Unitaire',
                    'unit-price-tooltip' => 'Le prix par unité pour ce produit auprès du fournisseur, exprimé dans l\'unité de mesure du produit du fournisseur ou, si non définie, l\'unité de mesure par défaut du produit.',
                    'currency'           => 'Devise',
                    'valid-from'         => 'Valide à partir du',
                    'valid-to'           => 'Valide jusqu\'au',
                    'discount'           => 'Remise (%)',
                    'company'            => 'Entreprise',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'vendor'              => 'Fournisseur',
            'vendor-product-name' => 'Nom du Produit Fournisseur',
            'vendor-product-code' => 'Code Produit Fournisseur',
            'delay'               => 'Délai de Livraison (Jours)',
            'product'             => 'Produit',
            'quantity'            => 'Quantité',
            'unit-price'          => 'Prix Unitaire',
            'currency'            => 'Devise',
            'valid-from'          => 'Valide à partir du',
            'valid-to'            => 'Valide jusqu\'au',
            'discount'            => 'Remise (%)',
            'company'             => 'Entreprise',
            'created-at'          => 'Créé le',
            'updated-at'          => 'Mis à jour le',
        ],

        'filters' => [
            'vendor'         => 'Filtrer par Fournisseur',
            'product'        => 'Filtrer par Produit',
            'currency'       => 'Filtrer par Devise',
            'company'        => 'Filtrer par Entreprise',
            'price-from'     => 'Prix Minimum',
            'price-to'       => 'Prix Maximum',
            'min-qty-from'   => 'Quantité Minimale De',
            'min-qty-to'     => 'Quantité Minimale À',
            'starts-from'    => 'Date de Début de Validité',
            'ends-before'    => 'Date de Fin de Validité',
            'created-from'   => 'Créé depuis',
            'created-until'  => 'Créé jusqu\'à',
        ],

        'groups' => [
            'vendor'     => 'Fournisseur',
            'product'    => 'Produit',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Prix fournisseur supprimé',
                        'body'  => 'Le prix fournisseur a été supprimé avec succès.',
                    ],

                    'error' => [
                        'title' => 'Le prix fournisseur n\'a pas pu être supprimé',
                        'body'  => 'Le prix fournisseur ne peut pas être supprimé car il est actuellement utilisé.',
                    ],
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Prix fournisseurs supprimés',
                        'body'  => 'Les prix fournisseurs ont été supprimés avec succès.',
                    ],

                    'error' => [
                        'title' => 'Les prix fournisseurs n\'ont pas pu être supprimés',
                        'body'  => 'Les prix fournisseurs ne peuvent pas être supprimés car ils sont actuellement utilisés.',
                    ],
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title'  => 'Général',

                'entries' => [
                    'vendor'                      => 'Fournisseur',
                    'vendor-product-name'         => 'Nom du Produit Fournisseur',
                    'vendor-product-name-tooltip' => 'Le nom du produit du fournisseur apparaîtra sur la demande de devis. Laissez-le vide pour utiliser le nom interne du produit.',
                    'vendor-product-code'         => 'Code Produit Fournisseur',
                    'vendor-product-code-tooltip' => 'Le code produit du fournisseur apparaîtra sur la demande de devis. Laissez-le vide pour utiliser le code interne.',
                    'delay'                       => 'Délai de Livraison (Jours)',
                    'delay-tooltip'               => 'Le délai (en jours) entre la confirmation du bon de commande et la réception du produit en entrepôt. Utilisé par le planificateur pour la planification automatique des bons de commande.',
                ],
            ],

            'record-information' => [
                'title'  => 'Informations sur l\'enregistrement',

                'entries' => [
                    'created-by'   => 'Créé par',
                    'created-at'   => 'Créé le',
                    'last-updated' => 'Dernière mise à jour',
                ],
            ],

            'prices' => [
                'title'  => 'Prix',

                'entries' => [
                    'product'            => 'Produit',
                    'quantity'           => 'Quantité',
                    'quantity-tooltip'   => 'La quantité minimale requise à acheter auprès de ce fournisseur pour bénéficier du prix spécifié. Ceci est exprimé dans l\'unité de mesure du produit du fournisseur ou, si non définie, l\'unité de mesure par défaut du produit.',
                    'unit-price'         => 'Prix Unitaire',
                    'unit-price-tooltip' => 'Le prix par unité pour ce produit auprès du fournisseur, exprimé dans l\'unité de mesure du produit du fournisseur ou, si non définie, l\'unité de mesure par défaut du produit.',
                    'currency'           => 'Devise',
                    'valid-from'         => 'Valide à partir du',
                    'valid-to'           => 'Valide jusqu\'au',
                    'discount'           => 'Remise (%)',
                    'company'            => 'Entreprise',
                ],
            ],
        ],
    ],
];