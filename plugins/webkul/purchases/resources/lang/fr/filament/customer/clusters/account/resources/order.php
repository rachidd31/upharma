<?php

return [
    'table' => [
        'columns' => [
            'reference'         => 'Référence',
            'total-amount'      => 'Montant Total',
            'confirmation-date' => 'Date de Confirmation',
            'status'            => 'Statut',
        ],
    ],

    'infolist' => [
        'settings' => [
            'entries' => [
                'buyer' => 'Acheteur',
            ],

            'actions' => [
                'accept' => [
                    'label' => 'Accepter',

                    'notification' => [
                        'title' => 'Devis Accepté',
                        'body'  => 'Le D.D.F. a été accusé de réception avec succès.',
                    ],

                    'message' => [
                        'body' => 'Le D.D.F. a été accusé de réception par le fournisseur.',
                    ],
                ],

                'decline' => [
                    'label' => 'Décliner',

                    'notification' => [
                        'title' => 'Devis Décliné',
                        'body'  => 'Le D.D.F. a été décliné avec succès.',
                    ],

                    'message' => [
                        'body' => 'Le D.D.F. a été décliné par le fournisseur.',
                    ],
                ],

                'print' => [
                    'label' => 'Télécharger/Imprimer',
                ],
            ],
        ],

        'general' => [
            'entries' => [
                'purchase-order'      => 'Bon de Commande n°:id',
                'quotation'           => 'Demande de Devis Fournisseur n°:id',
                'order-date'          => 'Date de Commande',
                'from'                => 'De',
                'confirmation-date'   => 'Date de Confirmation',
                'receipt-date'        => 'Date de Réception',
                'products'            => 'Produits',
                'untaxed-amount'      => 'Montant HT',
                'tax-amount'          => 'Montant de la Taxe',
                'total'               => 'Total',
                'communication-history' => 'Historique de Communication',
            ],
        ],
    ],
];