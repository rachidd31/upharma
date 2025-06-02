<?php

return [
    'form' => [
        'factor-percent'    => 'Pourcentage du facteur',
        'factor-ratio'      => 'Ratio du facteur',
        'repartition-type'  => 'Type de répartition',
        'document-type'     => 'Type de document',
        'account'           => 'Compte',
        'tax'               => 'Taxe',
        'tax-closing-entry' => 'Écriture de clôture de taxe',
    ],

    'table' => [
        'columns' => [
            'factor-percent'    => 'Pourcentage du facteur (%)',
            'account'           => 'Compte',
            'tax'               => 'Taxe',
            'company'           => 'Entreprise',
            'repartition-type'  => 'Type de répartition',
            'document-type'     => 'Type de document',
            'tax-closing-entry' => 'Écriture de clôture de taxe',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Répartition de taxe mise à jour',
                    'body'  => 'La répartition de taxe a été mise à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Terme de répartition de taxe supprimé',
                    'body'  => 'Le terme de répartition de taxe a été supprimé avec succès.',
                ],
            ],
        ],

        'header-actions' => [
            'create' => [
                'notification' => [
                    'title' => 'Terme de répartition de taxe créé',
                    'body'  => 'Le terme de répartition de taxe a été créé avec succès.',
                ],
            ],
        ],
    ],
]; 