<?php

return [
    'title' => 'Variantes',

    'form' => [
        'date'               => 'Date',
        'employee'           => 'Employé',
        'description'        => 'Description',
        'time-spent'         => 'Temps Passé',
        'time-spent-helper-text' => 'Temps passé en heures (Ex: 1.5 heures signifie 1 heure 30 minutes)',
    ],

    'table' => [
        'columns' => [
            'date'               => 'Date',
            'employee'           => 'Employé',
            'description'        => 'Description',
            'time-spent'         => 'Temps Passé',
            'time-spent-on-subtasks' => 'Temps Passé sur les Sous-tâches',
            'total-time-spent'   => 'Temps Total Passé',
            'remaining-time'     => 'Temps Restant',
            'variant-values'     => 'Valeurs de Variante',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Variante supprimée',
                    'body'  => 'La variante a été supprimée avec succès.',
                ],
            ],
        ],
    ],
];