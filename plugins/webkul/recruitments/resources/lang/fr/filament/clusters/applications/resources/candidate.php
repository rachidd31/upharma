<?php

return [
    'title' => 'Candidat',

    'navigation' => [
        'group' => 'Candidatures',
        'title' => 'Candidats',
    ],

    'form' => [
        'sections' => [
            'basic-information' => [
                'title' => 'Informations de base',

                'fields' => [
                    'full-name' => 'Nom Complet',
                    'email'     => 'Adresse E-mail',
                    'phone'     => 'Numéro de Téléphone',
                    'linkedin'  => 'Profil LinkedIn',
                    'contact'   => 'Contact',
                ],
            ],

            'additional-details' => [
                'title' => 'Détails Supplémentaires',

                'fields' => [
                    'company'           => 'Entreprise',
                    'degree'            => 'Diplôme',
                    'tags'              => 'Tags',
                    'manager'           => 'Manager',
                    'availability-date' => 'Date de Disponibilité',

                    'priority-options' => [
                        'low'    => 'Faible',
                        'medium' => 'Moyenne',
                        'high'   => 'Élevée',
                    ],
                ],
            ],

            'status-and-evaluation' => [
                'title' => 'Statut',

                'fields' => [
                    'active'     => 'Actif',
                    'evaluation' => 'Évaluation',
                ],
            ],

            'communication' => [
                'title' => 'Communication',

                'fields' => [
                    'cc-email'      => 'E-mail CC',
                    'email-bounced' => 'E-mail Rebondi',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom Complet',
            'tags'       => 'Tags',
            'evaluation' => 'Évaluation',
        ],

        'filters' => [
            'company'      => 'Entreprise',
            'partner-name' => 'Contact',
            'degree'       => 'Diplôme',
            'manager-name' => 'Manager',
        ],

        'groups' => [
            'manager-name' => 'Manager',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Candidat Supprimé',
                    'body'  => 'Le candidat a été supprimé avec succès.',
                ],
            ],

            'empty-state-actions' => [
                'create' => [
                    'notification' => [
                        'title' => 'Candidat Créé',
                        'body'  => 'Le candidat a été créé avec succès.',
                    ],
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'basic-information' => [
                'title' => 'Informations de base',

                'entries' => [
                    'full-name' => 'Nom Complet',
                    'email'     => 'Adresse E-mail',
                    'phone'     => 'Numéro de Téléphone',
                    'linkedin'  => 'Profil LinkedIn',
                    'contact'   => 'Contact',
                ],
            ],

            'additional-details' => [
                'title' => 'Détails Supplémentaires',

                'entries' => [
                    'company'           => 'Entreprise',
                    'degree'            => 'Diplôme',
                    'tags'              => 'Tags',
                    'manager'           => 'Manager',
                    'availability-date' => 'Date de Disponibilité',

                    'priority-options' => [
                        'low'    => 'Faible',
                        'medium' => 'Moyenne',
                        'high'   => 'Élevée',
                    ],
                ],
            ],

            'status-and-evaluation' => [
                'title' => 'Statut',

                'entries' => [
                    'active'     => 'Actif',
                    'evaluation' => 'Évaluation',
                ],
            ],

            'communication' => [
                'title' => 'Communication',

                'entries' => [
                    'cc-email'      => 'E-mail CC',
                    'email-bounced' => 'E-mail Rebondi',
                ],
            ],
        ],
    ],
];