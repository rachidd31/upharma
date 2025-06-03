<?php

return [
    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'name'  => 'Nom',
                    'code'  => 'Code Identifiant Bancaire',
                    'email' => 'Email',
                    'phone' => 'Téléphone',
                ],
            ],

            'address' => [
                'title' => 'Adresse',

                'fields' => [
                    'address' => 'Adresse',
                    'city'    => 'Ville',
                    'street1' => 'Rue 1',
                    'street2' => 'Rue 2',
                    'state'   => 'État/Province',
                    'zip'     => 'Code Postal',
                    'country' => 'Pays',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'code'       => 'Code Identifiant Bancaire',
            'country'    => 'Pays',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
            'deleted-at' => 'Supprimé le',
        ],

        'groups' => [
            'country'    => 'Pays',
            'created-at' => 'Créé le',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Banque mise à jour',
                    'body'  => 'La banque a été mise à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Banque restaurée',
                    'body'  => 'La banque a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Banque supprimée',
                    'body'  => 'La banque a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Banque supprimée définitivement',
                    'body'  => 'La banque a été supprimée définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Banques restaurées',
                    'body'  => 'Les banques ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Banques supprimées',
                    'body'  => 'Les banques ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Banques supprimées définitivement',
                    'body'  => 'Les banques ont été supprimées définitivement avec succès.',
                ],
            ],
        ],
    ],
];