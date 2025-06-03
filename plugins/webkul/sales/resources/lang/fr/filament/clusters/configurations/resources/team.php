<?php

return [
    'title' => 'Équipes de vente',

    'navigation' => [
        'title' => 'Équipes de vente',
    ],

    'form' => [
        'sections' => [
            'fields' => [
                'name'     => "Équipe de vente",
                'status'   => "Statut",
                'fieldset' => [
                    'team-details' => [
                        'title'  => "Détails de l'équipe",
                        'fields' => [
                            'team-leader'            => "Chef d'équipe",
                            'company'                => "Entreprise",
                            'invoiced-target'        => "Objectif facturé",
                            'invoiced-target-suffix' => "/ Mois",
                            'color'                  => "Couleur",
                            'members'                => "Membres",
                        ],
                    ],
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'id'              => "ID",
            'company'         => "Entreprise",
            'team-leader'     => "Chef d'équipe",
            'name'            => "Nom",
            'status'          => "Statut",
            'invoiced-target' => "Objectif facturé",
            'color'           => "Couleur",
            'created-by'      => "Créé par",
            'created-at'      => "Créé le",
            'updated-at'      => "Mis à jour le",
        ],

        'filters' => [
            'name'        => "Nom",
            'team-leader' => "Chef d'équipe",
            'company'     => "Entreprise",
            'created-by'  => "Créé par",
            'updated-at'  => "Mis à jour le",
            'created-at'  => "Créé le",
        ],

        'groups' => [
            'name'        => "Nom",
            'company'     => "Entreprise",
            'team-leader' => "Chef d'équipe",
            'created-at'  => "Créé le",
            'updated-at'  => "Mis à jour le",
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => "Équipe de vente restaurée",
                    'body'  => "L'équipe de vente a été restaurée avec succès.",
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => "Équipe de vente supprimée",
                    'body'  => "L'équipe de vente a été supprimée avec succès.",
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => "Équipe de vente supprimée définitivement",
                    'body'  => "L'équipe de vente a été supprimée définitivement avec succès.",
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => "Équipes de vente restaurées",
                    'body'  => "Les équipes de vente ont été restaurées avec succès.",
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => "Équipes de vente supprimées",
                    'body'  => "Les équipes de vente ont été supprimées avec succès.",
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => "Équipes de vente supprimées définitivement",
                    'body'  => "Les équipes de vente ont été supprimées définitivement avec succès.",
                ],
            ],
        ],

        'empty-state-action' => [
            'create' => [
                'notification' => [
                    'title' => "Équipe de vente créée",
                    'body'  => "L'équipe de vente a été créée avec succès.",
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'entries' => [
                    'name'     => "Équipe de vente",
                    'status'   => "Statut",
                    'fieldset' => [
                        'team-details' => [
                            'title'   => "Détails de l'équipe",
                            'entries' => [
                                'team-leader'            => "Chef d'équipe",
                                'company'                => "Entreprise",
                                'invoiced-target'        => "Objectif facturé",
                                'invoiced-target-suffix' => "/ Mois",
                                'color'                  => "Couleur",
                                'members'                => "Membres",
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
