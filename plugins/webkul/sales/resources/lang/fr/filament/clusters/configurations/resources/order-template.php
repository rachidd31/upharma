<?php

return [
    'title' => 'Produits du modèle de commande',

    'navigation' => [
        'title' => 'Produits du modèle de commande',
        'group' => 'Commandes de vente',
    ],

    'global-search' => [
        'name'    => 'Nom',
    ],

    'form' => [
        'fields' => [
            'sort'           => 'Ordre',
            'order-template' => 'Modèle de commande',
            'company'        => 'Entreprise',
            'product'        => 'Produit',
            'product-uom'    => 'Unité de mesure du produit',
            'creator'        => 'Créateur',
            'display-type'   => 'Type d\'affichage',
            'name'           => 'Nom',
            'quantity'       => 'Quantité',
        ],
    ],

    'table' => [
        'columns' => [
            'sort'           => 'Ordre',
            'order-template' => 'Modèle de commande',
            'company'        => 'Entreprise',
            'product'        => 'Produit',
            'product-uom'    => 'Unité de mesure du produit',
            'created-by'     => 'Créé par',
            'display-type'   => 'Type d\'affichage',
            'name'           => 'Nom',
            'quantity'       => 'Quantité',
            'created-at'     => 'Créé le',
            'updated-at'     => 'Mis à jour le',
        ],
        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Produits du modèle de commande mis à jour',
                    'body'  => 'Les produits du modèle de commande ont été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Produits du modèle de commande supprimés',
                    'body'  => 'Les produits du modèle de commande ont été supprimés avec succès.',
                ],
            ],
        ],
        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Produits du modèle de commande supprimés',
                    'body'  => 'Les produits du modèle de commande ont été supprimés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'entries' => [
            'sort'           => 'Ordre',
            'order-template' => 'Modèle de commande',
            'company'        => 'Entreprise',
            'product'        => 'Produit',
            'product-uom'    => 'Unité de mesure du produit',
            'display-type'   => 'Type d\'affichage',
            'name'           => 'Nom',
            'quantity'       => 'Quantité',
        ],
    ],
];
