<?php

return [
    'title' => 'Attributs',

    'form' => [
        'attribute' => 'Attribut',
        'values'    => 'Valeurs',
    ],

    'table' => [
        'description' => 'Attention : l\'ajout ou la suppression d\'attributs entraînera la suppression et la recréation des variantes existantes, ce qui pourrait entraîner la perte de leurs personnalisations éventuelles.',

        'header-actions' => [
            'create' => [
                'label' => 'Ajouter un Attribut',

                'notification' => [
                    'title' => 'Attribut créé',
                    'body'  => 'L\'attribut a été créé avec succès.',
                ],
            ],
        ],

        'columns' => [
            'attribute' => 'Attribut',
            'values'    => 'Valeurs',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Attribut mis à jour',
                    'body'  => 'L\'attribut a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Attribut supprimé',
                    'body'  => 'L\'attribut a été supprimé avec succès.',
                ],
            ],
        ],
    ],
];