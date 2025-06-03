<?php

return [
    'title' => 'Utilisateurs',

    'navigation' => [
        'title' => 'Utilisateurs',
        'group' => 'Paramètres',
    ],

    'global-search' => [
        'name'  => 'Nom',
        'email' => 'Email',
    ],

    'form' => [
        'sections' => [
            'general-information' => [
                'title'  => 'Informations générales',
                'fields' => [
                    'name'                  => 'Nom',
                    'email'                 => 'Email',
                    'password'              => 'Mot de passe',
                    'password-confirmation' => 'Confirmation du mot de passe',
                ],
            ],

            'permissions' => [
                'title'  => 'Permissions',
                'fields' => [
                    'roles'               => 'Rôles',
                    'permissions'         => 'Permissions',
                    'resource-permission' => 'Permission ressource',
                    'teams'               => 'Équipes',
                ],
            ],

            'avatar' => [
                'title' => 'Avatar',
            ],

            'lang-and-status' => [
                'title'  => 'Langue & Statut',
                'fields' => [
                    'language' => 'Langue préférée',
                    'status'   => 'Statut',
                ],
            ],

            'multi-company' => [
                'title'             => 'Multi-entreprise',
                'allowed-companies' => 'Entreprises autorisées',
                'default-company'   => 'Entreprise par défaut',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'avatar'              => 'Avatar',
            'name'                => 'Nom',
            'email'               => 'Email',
            'teams'               => 'Équipes',
            'role'                => 'Rôle',
            'resource-permission' => 'Permission ressource',
            'default-company'     => 'Entreprise par défaut',
            'allowed-company'     => 'Entreprise autorisée',
            'created-at'          => 'Créé le',
            'updated-at'          => 'Mis à jour le',
        ],

        'filters' => [
            'resource-permission' => 'Permission ressource',
            'teams'               => 'Équipes',
            'roles'               => 'Rôles',
            'default-company'     => 'Entreprise par défaut',
            'allowed-companies'   => 'Entreprises autorisées',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Utilisateur modifié',
                    'body'  => 'L\'utilisateur a été modifié avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Utilisateur supprimé',
                    'body'  => 'L\'utilisateur a été supprimé avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Utilisateur restauré',
                    'body'  => 'L\'utilisateur a été restauré avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Utilisateurs restaurés',
                    'body'  => 'Les utilisateurs ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Utilisateurs supprimés',
                    'body'  => 'Les utilisateurs ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Utilisateurs supprimés définitivement',
                    'body'  => 'Les utilisateurs ont été supprimés définitivement avec succès.',
                ],
            ],
        ],

        'empty-state-actions' => [
            'create' => [
                'notification' => [
                    'title' => 'Utilisateurs créés',
                    'body'  => 'Les utilisateurs ont été créés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general-information' => [
                'title'   => 'Informations générales',
                'entries' => [
                    'name'                  => 'Nom',
                    'email'                 => 'Email',
                    'password'              => 'Mot de passe',
                    'password-confirmation' => 'Confirmation du mot de passe',
                ],
            ],

            'permissions' => [
                'title'   => 'Permissions',
                'entries' => [
                    'roles'               => 'Rôles',
                    'permissions'         => 'Permissions',
                    'resource-permission' => 'Permission ressource',
                    'teams'               => 'Équipes',
                ],
            ],

            'avatar' => [
                'title' => 'Avatar',
            ],

            'lang-and-status' => [
                'title'   => 'Langue & Statut',
                'entries' => [
                    'language' => 'Langue préférée',
                    'status'   => 'Statut',
                ],
            ],

            'multi-company' => [
                'title'             => 'Multi-entreprise',
                'allowed-companies' => 'Entreprises autorisées',
                'default-company'   => 'Entreprise par défaut',
            ],
        ],
    ],
];
