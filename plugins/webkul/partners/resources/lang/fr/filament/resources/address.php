<?php

return [
    'form' => [
        'partner' => 'Partenaire',
        'name'    => 'Nom',
        'email'   => 'Email',
        'phone'   => 'Téléphone',
        'mobile'  => 'Portable',
        'type'    => 'Type',
        'address' => 'Adresse',
        'city'    => 'Ville',
        'street1' => 'Adresse 1',
        'street2' => 'Adresse 2',
        'state'   => 'État/Province',
        'zip'     => 'Code Postal',
        'code'    => 'Code',
        'country' => 'Pays',
    ],

    'table' => [
        'header-actions' => [
            'create' => [
                'label' => 'Ajouter une Adresse',

                'notification' => [
                    'title' => 'Adresse créée',
                    'body'  => 'L\'adresse a été créée avec succès.',
                ],
            ],
        ],

        'columns' => [
            'type'    => 'Type',
            'name'    => 'Nom du Contact',
            'address' => 'Adresse',
            'city'    => 'Ville',
            'street1' => 'Adresse 1',
            'street2' => 'Adresse 2',
            'state'   => 'État/Province',
            'zip'     => 'Code Postal',
            'country' => 'Pays',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Adresse mise à jour',
                    'body'  => 'L\'adresse a été mise à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Adresse supprimée',
                    'body'  => 'L\'adresse a été supprimée avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Adresses supprimées',
                    'body'  => 'Les adresses ont été supprimées avec succès.',
                ],
            ],
        ],
    ],
];