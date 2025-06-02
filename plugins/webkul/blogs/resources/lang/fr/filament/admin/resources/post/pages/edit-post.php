<?php

return [
    'notification' => [
        'title' => 'Article mis à jour',
        'body'  => 'L\'article a été mis à jour avec succès.',
    ],

    'header-actions' => [
        'draft' => [
            'label' => 'Mettre en brouillon',

            'notification' => [
                'title' => 'Article mis en brouillon',
                'body'  => 'L\'article a été mis en brouillon avec succès.',
            ],
        ],

        'publish' => [
            'label' => 'Publier',

            'notification' => [
                'title' => 'Article publié',
                'body'  => 'L\'article a été publié avec succès.',
            ],
        ],

        'delete' => [
            'notification' => [
                'title' => 'Article supprimé',
                'body'  => 'L\'article a été supprimé avec succès.',
            ],
        ],
    ],
];
