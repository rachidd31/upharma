<?php

return [
    'notification' => [
        'title' => 'Produit mis à jour',
        'body'  => 'Le produit a été mis à jour avec succès.',
    ],

    'header-actions' => [
        'print' => [
            'label' => 'Imprimer les Étiquettes',

            'form' => [
                'fields' => [
                    'quantity' => 'Nombre d\'Étiquettes',
                    'format'   => 'Format',

                    'format-options' => [
                        'dymo'       => 'Dymo',
                        '2x7_price'  => '2x7 avec prix',
                        '4x7_price'  => '4x7 avec prix',
                        '4x12'       => '4x12',
                        '4x12_price' => '4x12 avec prix',
                    ],
                ],
            ],
        ],

        'delete' => [
            'notification' => [
                'title' => 'Produit supprimé',
                'body'  => 'Le produit a été supprimé avec succès.',
            ],
        ],
    ],
];