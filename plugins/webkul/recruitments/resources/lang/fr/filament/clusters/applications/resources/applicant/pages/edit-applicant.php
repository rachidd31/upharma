<?php

return [
    'create-employee' => 'Créer un employé',
    'goto-employee'   => 'Aller à l’employé',

    'notification' => [
        'title' => 'Candidat mis à jour',
        'body'  => 'Le candidat a été mis à jour avec succès.',
    ],

    'header-actions' => [
        'delete' => [
            'notification' => [
                'title' => 'Candidat supprimé',
                'body'  => 'Le candidat a été supprimé avec succès.',
            ],
        ],
        'force-delete' => [
            'notification' => [
                'title' => 'Candidat supprimé définitivement',
                'body'  => 'Le candidat a été supprimé définitivement avec succès.',
            ],
        ],

        'refuse' => [
            'title'        => 'Motif de refus',
            'notification' => [
                'title' => 'Candidat refusé',
                'body'  => 'Le candidat a été refusé avec succès.',
            ],
        ],

        'reopen' => [
            'title'        => 'Réouvrir le candidat',
            'notification' => [
                'title' => 'Candidat réouvert',
                'body'  => 'Le candidat a été réouvert avec succès.',
            ],
        ],

        'state' => [
            'notification' => [
                'title' => 'État du candidat mis à jour',
                'body'  => 'L’état du candidat a été mis à jour avec succès.',
            ],
        ],
    ],

    'mail' => [
        'application-refused' => [
            'subject' => 'Votre candidature : :application',
        ],

        'application-confirm' => [
            'subject' => 'Votre candidature pour le poste : :job_position',
        ],
        'interviewer-assigned' => [
            'subject' => 'Vous avez été assigné au candidat : :applicant.',
        ],
    ],
];
