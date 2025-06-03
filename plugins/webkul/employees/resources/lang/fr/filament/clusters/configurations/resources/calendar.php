<?php

return [
    'title' => 'Horaires de travail',

    'navigation' => [
        'title' => 'Horaires de travail',
        'group' => 'Employé',
    ],

    'groups' => [
        'status'     => 'Statut',
        'created-by' => 'Créé par',
        'created-at' => 'Créé le',
        'updated-at' => 'Mis à jour le',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'title'  => 'Informations générales',
                'fields' => [
                    'name'                  => 'Nom',
                    'schedule-name'         => 'Nom de l\'horaire',
                    'schedule-name-tooltip' => 'Veuillez saisir un nom descriptif pour l\'horaire de travail.',
                    'timezone'              => 'Fuseau horaire',
                    'timezone-tooltip'      => 'Veuillez sélectionner le fuseau horaire pour l\'horaire de travail.',
                    'company'               => 'Entreprise',
                ],
            ],

            'configuration' => [
                'title'  => 'Configuration des heures de travail',
                'fields' => [
                    'hours-per-day'                   => 'Heures par jour',
                    'hours-per-day-suffix'            => 'Heures',
                    'full-time-required-hours'        => 'Heures requises à temps plein',
                    'full-time-required-hours-suffix' => 'Heures par semaine',
                ],
            ],

            'flexibility' => [
                'title'  => 'Flexibilité',
                'fields' => [
                    'status'                     => 'Statut',
                    'two-weeks-calendar'         => 'Calendrier de deux semaines',
                    'two-weeks-calendar-tooltip' => 'Activer l\'alternance des horaires de travail sur deux semaines.',
                    'flexible-hours'             => 'Heures flexibles',
                    'flexible-hours-tooltip'     => 'Permettre aux employés d\'avoir des horaires de travail flexibles.',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'id'             => 'ID',
            'name'           => 'Nom de l\'horaire',
            'timezone'       => 'Fuseau horaire',
            'company'        => 'Entreprise',
            'flexible-hours' => 'Heures flexibles',
            'status'         => 'Statut',
            'daily-hours'    => 'Heures quotidiennes',
            'created-by'     => 'Créé par',
            'created-at'     => 'Créé le',
            'updated-at'     => 'Mis à jour le',
        ],

        'filters' => [
            'company'           => 'Entreprise',
            'is-active'         => 'Statut',
            'two-week-calendar' => 'Calendrier de deux semaines',
            'flexible-hours'    => 'Heures flexibles',
            'timezone'          => 'Fuseau horaire',
            'name'              => 'Nom de l\'horaire',
            'attendance'        => 'Présence',
            'created-by'        => 'Créé par',
            'daily-hours'       => 'Heures quotidiennes',
            'updated-at'        => 'Mis à jour le',
            'created-at'        => 'Créé le',
        ],

        'groups' => [
            'name'           => 'Nom de l\'horaire',
            'status'         => 'Statut',
            'timezone'       => 'Fuseau horaire',
            'flexible-hours' => 'Heures flexibles',
            'daily-hours'    => 'Heures quotidiennes',
            'created-by'     => 'Créé par',
            'created-at'     => 'Créé le',
            'updated-at'     => 'Mis à jour le',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Plan de calendrier restauré',
                    'body'  => 'Le plan de calendrier a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Plan de calendrier supprimé',
                    'body'  => 'Le plan de calendrier a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Plan de calendrier supprimé définitivement',
                    'body'  => 'Le plan de calendrier a été supprimé définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Plans de calendrier restaurés',
                    'body'  => 'Les plans de calendrier ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Plans de calendrier supprimés',
                    'body'  => 'Les plans de calendrier ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Plans de calendrier supprimés définitivement',
                    'body'  => 'Les plans de calendrier ont été supprimés définitivement avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title'   => 'Informations générales',
                'entries' => [
                    'name'                  => 'Nom',
                    'schedule-name'         => 'Nom de l\'horaire',
                    'schedule-name-tooltip' => 'Veuillez saisir un nom descriptif pour l\'horaire de travail.',
                    'timezone'              => 'Fuseau horaire',
                    'timezone-tooltip'      => 'Veuillez sélectionner le fuseau horaire pour l\'horaire de travail.',
                    'company'               => 'Entreprise',
                ],
            ],

            'configuration' => [
                'title'   => 'Configuration des heures de travail',
                'entries' => [
                    'hours-per-day'                   => 'Heures par jour',
                    'hours-per-day-suffix'            => 'Heures',
                    'full-time-required-hours'        => 'Heures requises à temps plein',
                    'full-time-required-hours-suffix' => 'Heures par semaine',
                ],
            ],

            'flexibility' => [
                'title'   => 'Flexibilité',
                'entries' => [
                    'status'                     => 'Statut',
                    'two-weeks-calendar'         => 'Calendrier de deux semaines',
                    'two-weeks-calendar-tooltip' => 'Activer l\'alternance des horaires de travail sur deux semaines.',
                    'flexible-hours'             => 'Heures flexibles',
                    'flexible-hours-tooltip'     => 'Permettre aux employés d\'avoir des horaires de travail flexibles.',
                ],
            ],
        ],
    ],
];
