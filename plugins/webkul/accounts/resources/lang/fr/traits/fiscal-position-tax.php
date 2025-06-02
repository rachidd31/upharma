<?php

return [
    'form' => [
        'fields' => [
            'tax-source'      => 'Source de taxe',
            'tax-destination' => 'Destination de taxe',
        ],
    ],

    'table' => [
        'columns' => [
            'tax-source'      => 'Source de taxe',
            'tax-destination' => 'Destination de taxe',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Terme d\'échéance de paiement mis à jour',
                    'body'  => 'Le terme d\'échéance de paiement a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Terme d\'échéance de paiement supprimé',
                    'body'  => 'Le terme d\'échéance de paiement a été supprimé avec succès.',
                ],
            ],
        ],

        'header-actions' => [
            'create' => [
                'notification' => [
                    'title' => 'Terme d\'échéance de paiement créé',
                    'body'  => 'Le terme d\'échéance de paiement a été créé avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'entries' => [
            'tax-source'      => 'Source de taxe',
            'tax-destination' => 'Destination de taxe',
        ],
    ],
]; 