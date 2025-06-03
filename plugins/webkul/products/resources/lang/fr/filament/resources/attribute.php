<?php

return [
    'form' => [
        'sections' => [
            'general' => [
                'title'  => 'Général',

                'fields' => [
                    'name' => 'Nom',
                    'type' => 'Type',
                ],
            ],

            'options' => [
                'title'  => 'Options',

                'fields' => [
                    'name'        => 'Nom',
                    'color'       => 'Couleur',
                    'extra-price' => 'Prix Supplémentaire',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'type'       => 'Type',
            'deleted-at' => 'Supprimé le',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'groups' => [
            'type'       => 'Type',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'filters' => [
            'type' => 'Type',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Attribut restauré',
                    'body'  => 'L\'attribut a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Attribut supprimé',
                    'body'  => 'L\'attribut a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Attribut supprimé définitivement',
                        'body'  => 'L\'attribut a été supprimé définitivement avec succès.',
                    ],

                    'error' => [
                        'title' => 'L\'attribut n\'a pas pu être supprimé',
                        'body'  => 'L\'attribut ne peut pas être supprimé car il est actuellement utilisé.',
                    ],
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Attributs restaurés',
                    'body'  => 'Les attributs ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Attributs supprimés',
                    'body'  => 'Les attributs ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Attributs supprimés définitivement',
                        'body'  => 'Les attributs ont été supprimés définitivement avec succès.',
                    ],

                    'error' => [
                        'title' => 'Les attributs n\'ont pas pu être supprimés',
                        'body'  => 'Les attributs ne peuvent pas être supprimés car ils sont actuellement utilisés.',
                    ],
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Informations Générales',

                'entries' => [
                    'name' => 'Nom',
                    'type' => 'Type',
                ],
            ],

            'record-information' => [
                'title' => 'Informations d\'Enregistrement',

                'entries' => [
                    'creator'    => 'Créé par',
                    'created_at' => 'Créé le',
                    'updated_at' => 'Dernière mise à jour le',
                ],
            ],
        ],
    ],
];