<?php

return [
    'navigation' => [
        'title' => 'Projets',
        'group' => 'Projet',
    ],

    'global-search' => [
        'project-manager' => 'Chef de projet',
        'customer'        => 'Client',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'name'             => 'Nom',
                    'name-placeholder' => 'Nom du projet...',
                    'description'      => 'Description',
                ],
            ],

            'additional' => [
                'title' => 'Informations supplémentaires',

                'fields' => [
                    'project-manager'             => 'Chef de projet',
                    'customer'                    => 'Client',
                    'start-date'                  => 'Date de début',
                    'end-date'                    => 'Date de fin',
                    'allocated-hours'             => 'Heures allouées',
                    'allocated-hours-helper-text' => 'En heures (Ex. 1.5 heures signifie 1 heure 30 minutes)',
                    'tags'                        => 'Mots-clés',
                    'company'                     => 'Entreprise',
                ],
            ],

            'settings' => [
                'title' => 'Paramètres',

                'fields' => [
                    'visibility'                   => 'Visibilité',
                    'visibility-hint-tooltip'      => 'Permettez aux employés d\'accéder à votre projet ou à vos tâches en les ajoutant comme abonnés. Ils auront automatiquement accès à toutes les tâches qui leur sont assignées.',
                    'private-description'          => 'Utilisateurs internes invités uniquement.',
                    'internal-description'         => 'Tous les utilisateurs internes peuvent voir.',
                    'public-description'           => 'Utilisateurs du portail invités et tous les utilisateurs internes.',
                    'time-management'              => 'Gestion du temps',
                    'allow-timesheets'             => 'Autoriser les feuilles de temps',
                    'allow-timesheets-helper-text' => 'Enregistrer le temps sur les tâches et suivre les progrès',
                    'task-management'              => 'Gestion des tâches',
                    'allow-milestones'             => 'Autoriser les jalons',
                    'allow-milestones-helper-text' => 'Surveiller les jalons clés essentiels à la réussite.',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'            => 'Nom',
            'customer'        => 'Client',
            'start-date'      => 'Date de début',
            'end-date'        => 'Date de fin',
            'planned-date'    => 'Date prévue',
            'remaining-hours' => 'Heures restantes',
            'project-manager' => 'Chef de projet',
        ],

        'groups' => [
            'stage'           => 'Étape',
            'project-manager' => 'Chef de projet',
            'customer'        => 'Client',
            'created-at'      => 'Créé le',
        ],

        'filters' => [
            'name'             => 'Nom',
            'visibility'       => 'Visibilité',
            'start-date'       => 'Date de début',
            'end-date'         => 'Date de fin',
            'allow-timesheets' => 'Autoriser les feuilles de temps',
            'allow-milestones' => 'Autoriser les jalons',
            'allocated-hours'  => 'Heures allouées',
            'created-at'       => 'Créé le',
            'updated-at'       => 'Mis à jour le',
            'stage'            => 'Étape',
            'customer'         => 'Client',
            'project-manager'  => 'Chef de projet',
            'company'          => 'Entreprise',
            'creator'          => 'Créateur',
            'tags'             => 'Mots-clés',
        ],

        'actions' => [
            'tasks'      => ':count Tâches',
            'milestones' => ':completed jalons terminés sur :all',

            'restore' => [
                'notification' => [
                    'title' => 'Projet restauré',
                    'body'  => 'Le projet a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Projet supprimé',
                    'body'  => 'Le projet a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Projet supprimé définitivement',
                    'body'  => 'Le projet a été supprimé définitivement avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'entries' => [
                    'name'             => 'Nom',
                    'name-placeholder' => 'Nom du projet...',
                    'description'      => 'Description',
                ],
            ],

            'additional' => [
                'title' => 'Informations supplémentaires',

                'entries' => [
                    'project-manager'        => 'Chef de projet',
                    'customer'               => 'Client',
                    'project-timeline'       => 'Chronologie du projet',
                    'allocated-hours'        => 'Heures allouées',
                    'allocated-hours-suffix' => ' Heures',
                    'remaining-hours'        => 'Heures restantes',
                    'remaining-hours-suffix' => ' Heures',
                    'current-stage'          => 'Étape actuelle',
                    'tags'                   => 'Mots-clés',
                ],
            ],

            'statistics' => [
                'title' => 'Statistiques',

                'entries' => [
                    'total-tasks'         => 'Total des tâches',
                    'milestones-progress' => 'Progression des jalons',
                ],
            ],

            'record-information' => [
                'title' => 'Informations sur l\'enregistrement',

                'entries' => [
                    'created-at'   => 'Créé le',
                    'created-by'   => 'Créé par',
                    'last-updated' => 'Dernière mise à jour',
                ],
            ],

            'settings' => [
                'title' => 'Paramètres du projet',

                'entries' => [
                    'visibility'         => 'Visibilité',
                    'timesheets-enabled' => 'Feuilles de temps activées',
                    'milestones-enabled' => 'Jalons activés',
                ],
            ],
        ],
    ],
];
