<?php

return [
    'form' => [
        'sections' => [
            'activity-details' => [
                'title' => 'Détails de l\'Activité',

                'fields' => [
                    'activity-type' => 'Type d\'Activité',
                    'summary'       => 'Résumé',
                    'note'          => 'Note',
                ],
            ],

            'assignment' => [
                'title' => 'Affectation',

                'fields' => [
                    'assignment' => 'Affectation',
                    'assignee'   => 'Attribué à',
                ],
            ],

            'delay-information' => [
                'title' => 'Informations sur le Délai',

                'fields' => [
                    'delay-count'        => 'Nombre de Jours de Délai',
                    'delay-unit'         => 'Unité de Délai',
                    'delay-from'         => 'Délai à partir de',
                    'delay-from-helper-text' => 'Source du calcul du délai',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'activity-type' => 'Type d\'Activité',
            'summary'       => 'Résumé',
            'assignment'    => 'Affectation',
            'assigned-to'   => 'Attribué à',
            'interval'      => 'Intervalle',
            'delay-unit'    => 'Unité de Délai',
            'delay-from'    => 'Délai à partir de',
            'created-by'    => 'Créé par',
            'created-at'    => 'Créé le',
            'updated-at'    => 'Mis à jour le',
        ],

        'groups' => [
            'activity-type' => 'Type d\'Activité',
            'assignment'    => 'Affectation',
            'assigned-to'   => 'Attribué à',
            'interval'      => 'Intervalle',
            'delay-unit'    => 'Unité de Délai',
            'delay-from'    => 'Délai à partir de',
            'created-by'    => 'Créé par',
            'created-at'    => 'Créé le',
            'updated-at'    => 'Mis à jour le',
        ],

        'filters' => [
            'activity-type'   => 'Type d\'Activité',
            'activity-status' => 'Statut de l\'Activité',
            'has-delay'       => 'Avec Délai',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Modèle d\'activité mis à jour',
                    'body'  => 'Le modèle d\'activité a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Modèle d\'activité supprimé',
                    'body'  => 'Le modèle d\'activité a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Modèles d\'activité supprimés',
                    'body'  => 'Les modèles d\'activité ont été supprimés avec succès.',
                ],
            ],
        ],
    ],
];