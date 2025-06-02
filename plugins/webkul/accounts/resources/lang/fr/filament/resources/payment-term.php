<?php

return [
    'form' => [
        'sections' => [
            'fields' => [
                'payment-term'         => 'Condition de paiement',
                'early-discount'       => 'Escompte pour paiement anticipé',
                'discount-days-prefix' => 'si payé dans les',
                'discount-days-suffix' => 'jours',
                'reduced-tax'          => 'Taxe réduite',
                'note'                 => 'Note',
                'status'               => 'Statut',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'payment-term' => 'Condition de paiement',
            'company'      => 'Entreprise',
            'created-at'   => 'Créé le',
            'updated-at'   => 'Mis à jour le',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Condition de paiement restaurée',
                    'body'  => 'La condition de paiement a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Condition de paiement supprimée',
                    'body'  => 'La condition de paiement a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Condition de paiement supprimée définitivement',
                    'body'  => 'La condition de paiement a été supprimée définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Conditions de paiement restaurées',
                    'body'  => 'Les conditions de paiement ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Conditions de paiement supprimées',
                    'body'  => 'Les conditions de paiement ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Conditions de paiement supprimées définitivement',
                    'body'  => 'Les conditions de paiement ont été supprimées définitivement avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'entries' => [
                'payment-term'         => 'Condition de paiement',
                'early-discount'       => 'Escompte pour paiement anticipé',
                'discount-percentage'  => 'Pourcentage de remise',
                'discount-days-prefix' => 'si payé dans les',
                'discount-days-suffix' => 'jours',
                'reduced-tax'          => 'Taxe réduite',
                'note'                 => 'Note',
                'status'               => 'Statut',
            ],
        ],
    ],
];
