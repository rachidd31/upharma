<?php

return [
    'placeholders' => [
        'no-record-found' => 'Aucun enregistrement trouvé.',
        'loading'         => 'Chargement du Chatter...',
    ],

    'activity-infolist' => [
        'title' => 'Activités',
    ],

    'cancel-activity-plan-action' => [
        'title' => 'Annuler l\'activité',
    ],

    'delete-message-action' => [
        'title' => 'Supprimer le message',
    ],

    'edit-activity' => [
        'title' => 'Modifier l\'activité',

        'form' => [
            'fields' => [
                'activity-plan' => 'Plan d\'activité',
                'plan-date'     => 'Date du plan',
                'plan-summary'  => 'Résumé du plan',
                'activity-type' => 'Type d\'activité',
                'due-date'      => 'Date d\'échéance',
                'summary'       => 'Résumé',
                'assigned-to'   => 'Assigné à',
            ],
        ],

        'action' => [
            'notification' => [
                'success' => [
                    'title' => 'Activité mise à jour',
                    'body'  => 'L\'activité a été mise à jour avec succès.',
                ],
            ],
        ],
    ],

    'process-message' => [
        'original-note' => '<br><div><span class="font-bold">Note originale</span>: :body</div>',
        'original-note' => '<br><div><span class="font-bold">Note originale</span>: :body</div>',
        'feedback'      => '<div><span class="font-bold">Retour</span>: <p>:feedback</p></div>',
    ],

    'mark-as-done' => [
        'title' => 'Marquer comme terminé',
        'form'  => [
            'fields' => [
                'feedback' => 'Commentaires',
            ],
        ],

        'footer-actions' => [
            'label' => 'Terminé & Planifier le Suivant',

            'actions' => [
                'notification' => [
                    'mark-as-done' => [
                        'title' => 'Activité marquée comme terminée',
                        'body'  => 'L\'activité a été marquée comme terminée avec succès.',
                    ],
                ],
            ],
        ],
    ],
];
