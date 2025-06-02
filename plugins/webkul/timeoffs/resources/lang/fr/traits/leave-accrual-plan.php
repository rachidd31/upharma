<?php

return [
    'form' => [
        'fields' => [
            'accrual-amount'              => 'Montant d\'acquisition',
            'accrual-value-type'          => 'Type de valeur d\'acquisition',
            'accrual-frequency'           => 'Fréquence d\'acquisition',
            'accrual-day'                 => 'Jour d\'acquisition',
            'day-of-month'                => 'Jour du mois',
            'first-day-of-month'          => 'Premier jour du mois',
            'second-day-of-month'         => 'Deuxième jour du mois',
            'first-period-month'          => 'Premier mois de la période',
            'first-period-day'            => 'Premier jour de la période',
            'second-period-month'         => 'Deuxième mois de la période',
            'second-period-day'           => 'Deuxième jour de la période',
            'first-period-year'           => 'Première année de la période',
            'cap-accrued-time'            => 'Plafonner le temps acquis',
            'days'                        => 'Jours',
            'start-count'                 => 'Compte de départ',
            'start-type'                  => 'Type de départ',
            'action-with-unused-accruals' => 'Action avec les acquisitions non utilisées',
            'milestone-cap'               => 'Plafond des étapes',
            'maximum-leave-yearly'        => 'Congé maximal annuel',
            'accrual-validity'            => 'Validité de l\'acquisition',
            'accrual-validity-count'      => 'Nombre de validité d\'acquisition',
            'accrual-validity-type'       => 'Type de validité d\'acquisition',
            'advanced-accrual-settings'   => 'Paramètres d\'acquisition avancés',
            'after-allocation-start'      => 'Après la date de début de l\'allocation',
        ],
    ],

    'table' => [
        'columns' => [
            'accrual-amount'     => 'Montant d\'acquisition',
            'accrual-value-type' => 'Type de valeur d\'acquisition',
            'frequency'          => 'Fréquence',
            'maximum-leave-days' => 'Nombre maximal de jours de congé',
        ],

        'groups' => [
            'accrual-amount'       => 'Montant d\'acquisition',
            'accrual-value-type'   => 'Type de valeur d\'acquisition',
            'frequency'            => 'Fréquence',
            'maximum-leave-days'   => 'Nombre maximal de jours de congé',
        ],

        'filters' => [
            'accrual-frequency'           => 'Fréquence d\'acquisition',
            'start-type'                  => 'Type de départ',
            'cap-accrued-time'            => 'Plafonner le temps acquis',
            'action-with-unused-accruals' => 'Action avec les acquisitions non utilisées',
            'accrual-amount'              => 'Montant d\'acquisition',
            'accrual-frequency'           => 'Fréquence d\'acquisition',
            'start-type'                  => 'Type de départ',
            'created-at'                  => 'Créé le',
            'updated-at'                  => 'Mis à jour le',
        ],

        'header-actions' => [
            'created' => [
                'title' => 'Nouveau plan d\'acquisition de congés',

                'notification' => [
                    'title' => 'Plan d\'acquisition de congés créé',
                    'body'  => 'Le plan d\'acquisition de congés a été créé avec succès.',
                ],
            ],
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Plan d\'acquisition de congés mis à jour',
                    'body'  => 'Le plan d\'acquisition de congés a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Plan d\'acquisition de congés supprimé',
                    'body'  => 'Le plan d\'acquisition de congés a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [

            'delete' => [
                'notification' => [
                    'title' => 'Plans d\'acquisition de congés supprimés',
                    'body'  => 'Les plans d\'acquisition de congés ont été supprimés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'entries' => [
            'accrual-amount'              => 'Montant d\'acquisition',
            'accrual-value-type'          => 'Type de valeur d\'acquisition',
            'accrual-frequency'           => 'Fréquence d\'acquisition',
            'accrual-day'                 => 'Jour d\'acquisition',
            'day-of-month'                => 'Jour du mois',
            'first-day-of-month'          => 'Premier jour du mois',
            'second-day-of-month'         => 'Deuxième jour du mois',
            'first-period-month'          => 'Premier mois de la période',
            'first-period-day'            => 'Premier jour de la période',
            'second-period-month'         => 'Deuxième mois de la période',
            'second-period-day'           => 'Deuxième jour de la période',
            'first-period-year'           => 'Première année de la période',
            'cap-accrued-time'            => 'Plafonner le temps acquis',
            'days'                        => 'Jours',
            'start-count'                 => 'Compte de départ',
            'start-type'                  => 'Type de départ',
            'action-with-unused-accruals' => 'Action avec les acquisitions non utilisées',
            'milestone-cap'               => 'Plafond des étapes',
            'maximum-leave-yearly'        => 'Congé maximal annuel',
            'accrual-validity'            => 'Validité de l\'acquisition',
            'accrual-validity-count'      => 'Nombre de validité d\'acquisition',
            'accrual-validity-type'       => 'Type de validité d\'acquisition',
            'advanced-accrual-settings'   => 'Paramètres d\'acquisition avancés',
            'after-allocation-start'      => 'Après la date de début de l\'allocation',
        ],
    ],
];
