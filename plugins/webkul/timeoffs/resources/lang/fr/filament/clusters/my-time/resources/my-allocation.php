<?php

return [
    'title' => 'Mon Allocation',

    'model-label' => 'Mon Allocation',

    'navigation' => [
        'title' => 'Mon Allocation',
    ],

    'global-search' => [
        'time-off-type' => 'Type d\'absence',
        'date-from'     => 'Date de début de la demande',
        'date-to'       => 'Date de fin de la demande',
    ],

    'form' => [
        'fields' => [
            'name'                => 'Nom',
            'name-placeholder'    => 'Type d\'absence (De la date de début de validité à la date de fin de validité/pas de limite)',
            'time-off-type'       => 'Type d\'absence',
            'allocation-type'     => 'Type d\'allocation',
            'validity-period'     => 'Période de Validité',
            'date-from'           => 'Date de Début',
            'date-to'             => 'Date de Fin',
            'date-to-placeholder' => 'Pas de Limite',
            'allocation'          => 'Allocation',
            'allocation-suffix'   => 'Nombre de Jours',
            'reason'              => 'Raison',
        ],
    ],

    'table' => [
        'columns' => [
            'time-off-type'   => 'Type d\'absence',
            'amount'          => 'Montant',
            'allocation-type' => 'Type d\'allocation',
            'status'          => 'Statut',
        ],

        'groups' => [
            'time-off-type'   => 'Type d\'absence',
            'employee-name'   => 'Nom de l\'employé',
            'allocation-type' => 'Type d\'allocation',
            'status'          => 'Statut',
            'start-date'      => 'Date de Début',
        ],

        'actions' => [
            'approve' => [
                'title' => [
                    'validate' => 'Valider',
                    'approve'  => 'Approuver',
                ],
                'notification' => [
                    'title' => 'Allocation approuvée',
                    'body'  => 'L\'allocation a été approuvée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Allocation supprimée',
                    'body'  => 'L\'allocation a été supprimée avec succès.',
                ],
            ],

            'refused' => [
                'title'        => 'Refuser',
                'notification' => [
                    'title' => 'Allocation refusée',
                    'body'  => 'L\'allocation a été refusée avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Allocations supprimées',
                    'body'  => 'Les allocations ont été supprimées avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'allocation-details' => [
                'title'   => 'Détails de l\'allocation',
                'entries' => [
                    'name'                => 'Nom',
                    'time-off-type'       => 'Type d\'absence',
                    'allocation-type'     => 'Type d\'allocation',
                ],
            ],

            'validity-period' => [
                'title'   => 'Période de Validité',
                'entries' => [
                    'date-from' => 'Date de Début',
                    'date-to'   => 'Date de Fin',
                    'reason'    => 'Raison',
                ],
            ],
            'allocation-status' => [
                'title'   => 'Statut de l\'allocation',
                'entries' => [
                    'date-to-placeholder' => 'Pas de Limite',
                    'allocation'          => 'Nombre de Jour(s)',
                    'allocation-value'    => ':days nombre de jours',
                    'state'               => 'État',
                ],
            ],
        ],
    ],
];
