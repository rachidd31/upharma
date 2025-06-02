<?php

return [
    'title'      => 'Type de congé',
    'navigation' => [
        'title' => 'Type de congé',
    ],

    'global-search' => [
        'name'       => 'Nom',
        'company'    => 'Entreprise',
        'created-by' => 'Créé par',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'title'  => 'Informations générales',
                'fields' => [
                    'name'                => 'Titre',
                    'approval'            => 'Approbation',
                    'requires-allocation' => 'Nécessite une attribution',
                    'employee-requests'   => 'Demandes des employés',
                    'display-option'      => 'Option d\'affichage',
                ],
            ],
            'display-option' => [
                'title'  => 'Option d\'affichage',
                'fields' => [
                    'color' => 'Couleur',
                ],
            ],
            'configuration' => [
                'title' => 'Configuration',

                'fields' => [
                    'notified-time-off-officers'          => 'Agents de congé notifiés',
                    'take-time-off-in'                    => 'Prendre un congé en',
                    'public-holiday-included'             => 'Jours fériés inclus',
                    'allow-to-attach-supporting-document' => 'Autoriser à joindre un document justificatif',
                    'show-on-dashboard'                   => 'Afficher sur le tableau de bord',
                    'allow-negative-cap'                  => 'Autoriser le plafond négatif',
                    'kind-off-time'                       => 'Type de temps',
                    'max-negative-cap'                    => 'Plafond négatif max',
                    'kind-of-time'                        => 'Type de congé',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'                      => 'Nom',
            'company-name'              => 'Entreprise',
            'color'                     => 'Couleur',
            'notified-time-officers'    => 'Agents de temps notifiés',
            'time-off-approval'         => 'Approbation des congés',
            'requires-allocation'       => 'Nécessite une attribution',
            'allocation-approval'       => 'Approbation de l\'attribution',
            'employee-request'          => 'Demande de l\'employé',
        ],

        'filters' => [
            'name'                => 'Nom',
            'company-name'        => 'Entreprise',
            'time-off-approval'   => 'Approbation des congés',
            'requires-allocation' => 'Nécessite une attribution',
            'time-type'           => 'Type de temps',
            'request-unit'        => 'Unité de demande',
            'created-by'          => 'Créé par',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Type de congé supprimé',
                    'body'  => 'Le type de congé a été supprimé avec succès.',
                ],
            ],
            'restore' => [
                'notification' => [
                    'title' => 'Type de congé restauré',
                    'body'  => 'Le type de congé a été restauré avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Type de congé restauré',
                    'body'  => 'Le type de congé a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Type de congé supprimé',
                    'body'  => 'Le type de congé a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Type de congé supprimé de force',
                    'body'  => 'Le type de congé a été supprimé de force avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title'   => 'Informations générales',
                'entries' => [
                    'name'                => 'Titre',
                    'approval'            => 'Approbation',
                    'requires-allocation' => 'Nécessite une attribution',
                    'employee-requests'   => 'Demandes des employés',
                    'display-option'      => 'Option d\'affichage',
                ],
            ],
            'display-option' => [
                'title'   => 'Option d\'affichage',
                'entries' => [
                    'color' => 'Couleur',
                ],
            ],
            'configuration' => [
                'title' => 'Configuration',

                'entries' => [
                    'notified-time-off-officers'          => 'Agents de congé notifiés',
                    'take-time-off-in'                    => 'Prendre un congé en',
                    'public-holiday-included'             => 'Jours fériés inclus',
                    'allow-to-attach-supporting-document' => 'Autoriser à joindre un document justificatif',
                    'show-on-dashboard'                   => 'Afficher sur le tableau de bord',
                    'kind-off-time'                       => 'Type de temps',
                    'max-negative-cap'                    => 'Plafond négatif max',
                    'kind-of-time'                        => 'Type de congé',
                ],
            ],
        ],
    ],
];
