<?php

return [
    'header-actions' => [
        'print' => [
            'label' => 'Imprimer',
        ],

        'delete' => [
            'notification' => [
                'success' => [
                    'title' => 'Commande supprimée',
                    'body'  => 'La commande a été supprimée avec succès.',
                ],

                'error' => [
                    'title' => 'Impossible de supprimer la commande',
                    'body'  => 'La commande ne peut pas être supprimée car elle est actuellement utilisée.',
                ],
            ],
        ],
    ],
];