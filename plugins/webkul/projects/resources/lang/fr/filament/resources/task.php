<?php

return [
    'title' => 'Tâches',

    'navigation' => [
        'title' => 'Tâches',
        'group' => 'Projet',
    ],

    'global-search' => [
        'project'   => 'Projet',
        'customer'  => 'Client',
        'milestone' => 'Jalon',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'title'             => 'Titre',
                    'title-placeholder' => 'Titre de la tâche...',
                    'tags'              => 'Mots-clés',
                    'name'              => 'Nom',
                    'color'             => 'Couleur',
                    'description'       => 'Description',
                    'project'           => 'Projet',
                    'status'            => 'Statut',
                    'start_date'        => 'Date de début',
                    'end_date'          => 'Date de fin',
                ],
            ],

            'additional' => [
                'title' => 'Informations supplémentaires',
            ],

            'settings' => [
                'title' => 'Paramètres',

                'fields' => [
                    'project'                     => 'Projet',
                    'milestone'                   => 'Jalon',
                    'milestone-hint-text'         => 'Liez un jalon à un élément de commande pour livrer automatiquement vos services une fois le jalon atteint.',
                    'name'                        => 'Nom',
                    'deadline'                    => 'Date limite',
                    'is-completed'                => 'Est terminé',
                    'customer'                    => 'Client',
                    'assignees'                   => 'Cessionnaires',
                    'allocated-hours'             => 'Heures allouées',
                    'allocated-hours-helper-text' => 'En heures (Ex. 1.5 heures signifie 1 heure 30 minutes)',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'id'                  => 'ID',
            'priority'            => 'Priorité',
            'state'               => 'État',
            'new-state'           => 'Nouvel état',
            'update-state'        => 'Mettre à jour l\'état',
            'title'               => 'Titre',
            'project'             => 'Projet',
            'project-placeholder' => 'Tâche privée',
            'milestone'           => 'Jalon',
            'customer'            => 'Client',
            'assignees'           => 'Cessionnaires',
            'allocated-time'      => 'Temps alloué',
            'time-spent'          => 'Temps passé',
            'time-remaining'      => 'Temps restant',
            'progress'            => 'Progression',
            'deadline'            => 'Date limite',
            'tags'                => 'Mots-clés',
            'stage'               => 'Étape',
        ],

        'groups' => [
            'state'      => 'État',
            'project'    => 'Projet',
            'milestone'  => 'Jalon',
            'customer'   => 'Client',
            'deadline'   => 'Date limite',
            'stage'      => 'Étape',
            'created-at' => 'Créé le',
        ],

        'filters' => [
            'title'             => 'Titre',
            'priority'          => 'Priorité',
            'low'               => 'Faible',
            'high'              => 'Élevée',
            'state'             => 'État',
            'tags'              => 'Mots-clés',
            'allocated-hours'   => 'Heures allouées',
            'total-hours-spent' => 'Total des heures passées',
            'remaining-hours'   => 'Heures restantes',
            'overtime'          => 'Heures supplémentaires',
            'progress'          => 'Progression',
            'deadline'          => 'Date limite',
            'created-at'        => 'Créé le',
            'updated-at'        => 'Mis à jour le',
            'assignees'         => 'Cessionnaires',
            'customer'          => 'Client',
            'project'           => 'Projet',
            'stage'             => 'Étape',
            'milestone'         => 'Jalon',
            'company'           => 'Entreprise',
            'creator'           => 'Créateur',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Tâche restaurée',
                    'body'  => 'La tâche a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Tâche supprimée',
                    'body'  => 'La tâche a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Tâche supprimée définitivement',
                    'body'  => 'La tâche a été supprimée définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Tâches restaurées',
                    'body'  => 'Les tâches ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Tâches supprimées',
                    'body'  => 'Les tâches ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Tâches supprimées définitivement',
                    'body'  => 'Les tâches ont été supprimées définitivement avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'entries' => [
                    'title'       => 'Titre',
                    'state'       => 'État',
                    'tags'        => 'Mots-clés',
                    'priority'    => 'Priorité',
                    'description' => 'Description',
                ],
            ],

            'project-information' => [
                'title' => 'Informations sur le projet',

                'entries' => [
                    'project'   => 'Projet',
                    'milestone' => 'Jalon',
                    'customer'  => 'Client',
                    'assignees' => 'Cessionnaires',
                    'deadline'  => 'Date limite',
                    'stage'     => 'Étape',
                ],
            ],

            'time-tracking' => [
                'title' => 'Suivi du temps',

                'entries' => [
                    'allocated-time'        => 'Temps alloué',
                    'time-spent'            => 'Temps passé',
                    'time-spent-suffix'     => ' Heures',
                    'time-remaining'        => 'Temps restant',
                    'time-remaining-suffix' => ' Heures',
                    'progress'              => 'Progression',
                ],
            ],

            'additional-information' => [
                'title' => 'Informations supplémentaires',
            ],

            'record-information' => [
                'title' => 'Informations sur l\'enregistrement',

                'entries' => [
                    'created-at'   => 'Créé le',
                    'created-by'   => 'Créé par',
                    'last-updated' => 'Dernière mise à jour',
                ],
            ],

            'statistics' => [
                'title' => 'Statistiques',

                'entries' => [
                    'sub-tasks'         => 'Sous-tâches',
                    'timesheet-entries' => 'Entrées de feuille de temps',
                ],
            ],
        ],
    ],
];
