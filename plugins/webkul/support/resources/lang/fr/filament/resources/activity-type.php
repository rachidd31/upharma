<?php

return [
    'title' => 'Types d\'activité',

    'navigation' => [
        'title' => 'Types d\'activité',
        'group' => 'Employés',
    ],

    'form' => [
        'sections' => [
            'activity-type-details' => [
                'title' => 'Informations générales',

                'fields' => [
                    'name'                => 'Type d\'activité',
                    'name-tooltip'        => 'Saisir le nom officiel du type d\'activité',
                    'action'              => 'Action',
                    'default-user'        => 'Utilisateur par défaut',
                    'summary'             => 'Sommaire',
                    'note'                => 'Note',
                ],
            ],

            'delay-information' => [
                'title' => 'Informations sur le délai',

                'fields' => [
                    'delay-count'            => 'Compte de délai',
                    'delay-unit'             => 'Unité de délai',
                    'delay-form'             => 'Formulaire de délai',
                    'delay-form-helper-text' => 'Source du calcul du délai',
                ],
            ],

            'advanced-information' => [
                'title' => 'Informations avancées',

                'fields' => [
                    'icon'                => 'Icône',
                    'decoration-type'     => 'Type de décoration',
                    'chaining-type'       => 'Type de chaînage',
                    'suggest'             => 'Suggérer',
                    'trigger'             => 'Déclencher',
                ],
            ],

            'status-and-configuration-information' => [
                'title' => 'Statut et configuration',

                'fields' => [
                    'status'               => 'Statut',
                    'keep-done-activities' => 'Conserver les activités terminées',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'       => 'Type d\'activité',
            'summary'    => 'Sommaire',
            'planned-in' => 'Planifié pour',
            'type'       => 'Type',
            'action'     => 'Action',
            'status'     => 'Statut',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'groups' => [
            'name'             => 'Nom',
            'action-category'  => 'Catégorie d\'action',
            'status'           => 'Statut',
            'delay-count'      => 'Compte de délai',
            'delay-unit'       => 'Unité de délai',
            'delay-source'     => 'Source du délai',
            'associated-model' => 'Modèle associé',
            'chaining-type'    => 'Type de chaînage',
            'decoration-type'  => 'Type de décoration',
            'default-user'     => 'Utilisateur par défaut',
            'creation-date'    => 'Date de création',
            'last-update'      => 'Dernière mise à jour',
        ],

        'filters' => [
            'action'    => 'Action',
            'status'    => 'Statut',
            'has-delay' => 'Avec délai',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Type d\'activité restauré',
                    'body'  => 'Le type d\'activité a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Type d\'activité supprimé',
                    'body'  => 'Le type d\'activité a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Type d\'activité supprimé de force',
                    'body'  => 'Le type d\'activité a été supprimé de force avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Types d\'activité restaurés',
                    'body'  => 'Les types d\'activité ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Types d\'activité supprimés',
                    'body'  => 'Les types d\'activité ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Types d\'activité supprimés de force',
                    'body'  => 'Les types d\'activité ont été supprimés de force avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'activity-type-details' => [
                'title' => 'Informations générales',

                'entries' => [
                    'name'                => 'Type d\'activité',
                    'name-tooltip'        => 'Saisir le nom officiel du type d\'activité',
                    'action'              => 'Action',
                    'default-user'        => 'Utilisateur par défaut',
                    'plugin'              => 'Plugin',
                    'summary'             => 'Sommaire',
                    'note'                => 'Note',
                ],
            ],

            'delay-information' => [
                'title' => 'Informations sur le délai',

                'entries' => [
                    'delay-count'            => 'Compte de délai',
                    'delay-unit'             => 'Unité de délai',
                    'delay-form'             => 'Formulaire de délai',
                    'delay-form-helper-text' => 'Source du calcul du délai',
                ],
            ],

            'advanced-information' => [
                'title' => 'Informations avancées',

                'entries' => [
                    'icon'                => 'Icône',
                    'decoration-type'     => 'Type de décoration',
                    'chaining-type'       => 'Type de chaînage',
                    'suggest'             => 'Suggérer',
                    'trigger'             => 'Déclencher',
                ],
            ],

            'status-and-configuration-information' => [
                'title' => 'Statut et configuration',

                'entries' => [
                    'status'               => 'Statut',
                    'keep-done-activities' => 'Conserver les activités terminées',
                ],
            ],
        ],
    ],
];
