<?php

return [
    'title' => 'Étapes',

    'navigation' => [
        'title' => 'Étapes',
        'group' => 'Postes',
    ],

    'form' => [
        'sections' => [
            'general-information' => [
                'title' => 'Informations générales',

                'fields' => [
                    'stage-name'   => 'Nom de l\'étape',
                    'sort'         => 'Ordre de séquence',
                    'requirements' => 'Exigences',
                ],
            ],

            'tooltips' => [
                'title'       => 'Infobulles',
                'description' => 'Définir l\'étiquette personnalisée pour le statut de la candidature.',

                'fields' => [
                    'gray-label'        => 'Libellé gris',
                    'gray-label-tooltip' => 'Le libellé pour le statut gris.',
                    'red-label'         => 'Libellé rouge',
                    'red-label-tooltip'  => 'Le libellé pour le statut rouge.',
                    'green-label'       => 'Libellé vert',
                    'green-label-tooltip' => 'Le libellé pour le statut vert.',
                ],
            ],

            'additional-information' => [
                'title' => 'Informations supplémentaires',

                'fields' => [
                    'job-positions' => 'Postes',
                    'folded'        => 'Plié',
                    'hired-stage'   => 'Étape d\'embauche',
                    'default-stage' => 'Étape par défaut',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'id'            => 'ID',
            'name'          => 'Nom de l\'étape',
            'hired-stage'   => 'Étape d\'embauche',
            'default-stage' => 'Étape par défaut',
            'folded'        => 'Plié',
            'job-positions' => 'Postes',
            'created-by'    => 'Créé par',
            'created-at'    => 'Créé le',
            'updated-at'    => 'Mis à jour le',
        ],

        'filters' => [
            'name'         => 'Nom de l\'étape',
            'job-position' => 'Poste',
            'folded'       => 'Plié',
            'gray-label'   => 'Libellé gris',
            'red-label'    => 'Libellé rouge',
            'green-label'  => 'Libellé vert',
            'created-by'   => 'Créé par',
            'created-at'   => 'Créé le',
            'updated-at'   => 'Mis à jour le',
        ],

        'groups' => [
            'job-position' => 'Poste',
            'stage-name'   => 'Nom de l\'étape',
            'folded'       => 'Plié',
            'gray-label'   => 'Libellé gris',
            'red-label'    => 'Libellé rouge',
            'green-label'  => 'Libellé vert',
            'created-by'   => 'Créé par',
            'created-at'   => 'Créé le',
            'updated-at'   => 'Mis à jour le',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Étape supprimée',
                    'body'  => 'L\'étape a été supprimée avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Étapes supprimées',
                    'body'  => 'Les étapes ont été supprimées avec succès.',
                ],
            ],
        ],

        'empty-state-actions' => [
            'create' => [
                'label' => 'Nouvelle étape',
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general-information' => [
                'title' => 'Informations générales',

                'entries' => [
                    'stage-name'   => 'Nom de l\'étape',
                    'sort'         => 'Ordre de séquence',
                    'requirements' => 'Exigences',
                ],
            ],

            'tooltips' => [
                'title'       => 'Infobulles',
                'description' => 'Définir l\'étiquette personnalisée pour le statut de la candidature.',

                'entries' => [
                    'gray-label'        => 'Libellé gris',
                    'gray-label-tooltip' => 'Le libellé pour le statut gris.',
                    'red-label'         => 'Libellé rouge',
                    'red-label-tooltip'  => 'Le libellé pour le statut rouge.',
                    'green-label'       => 'Libellé vert',
                    'green-label-tooltip' => 'Le libellé pour le statut vert.',
                ],
            ],

            'additional-information' => [
                'title' => 'Informations supplémentaires',

                'entries' => [
                    'job-positions' => 'Poste',
                    'folded'        => 'Plié',
                    'hired-stage'   => 'Étape d\'embauche',
                    'default-stage' => 'Étape par défaut',
                ],
            ],
        ],
    ],

];