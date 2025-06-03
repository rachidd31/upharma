<?php

return [
    'navigation' => [
        'group' => 'Banques',
        'title' => 'Comptes Bancaires',
    ],

    'form' => [
        'account-number'   => 'Numéro de Compte',
        'bank'             => 'Banque',
        'account-holder'   => 'Titulaire du Compte',
        'can-send-money'   => 'Peut Envoyer de l\'Argent',
    ],

    'table' => [
        'columns' => [
            'account-number' => 'Numéro de Compte',
            'bank'           => 'Banque',
            'account-holder' => 'Titulaire du Compte',
            'send-money'     => 'Peut Envoyer de l\'Argent',
            'created-at'     => 'Créé le',
            'updated-at'     => 'Mis à Jour le',
            'deleted-at'     => 'Supprimé le',
        ],

        'filters' => [
            'bank'           => 'Banque',
            'account-holder' => 'Titulaire du Compte',
            'creator'        => 'Créateur',
            'can-send-money' => 'Peut Envoyer de l\'Argent',
        ],

        'groups' => [
            'bank'           => 'Banque',
            'can-send-money' => 'Peut Envoyer de l\'Argent',
            'created-at'     => 'Créé le',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Compte bancaire mis à jour',
                    'body'  => 'Le compte bancaire a été mis à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Compte bancaire restauré',
                    'body'  => 'Le compte bancaire a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Compte bancaire supprimé',
                    'body'  => 'Le compte bancaire a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Compte bancaire supprimé définitivement',
                    'body'  => 'Le compte bancaire a été supprimé définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Comptes bancaires restaurés',
                    'body'  => 'Les comptes bancaires ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Comptes bancaires supprimés',
                    'body'  => 'Les comptes bancaires ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Comptes bancaires supprimés définitivement',
                    'body'  => 'Les comptes bancaires ont été supprimés définitivement avec succès.',
                ],
            ],
        ],
    ],
];