<?php

return [
    'title' => 'Candidat',

    'navigation' => [
        'group' => 'Candidatures',
        'title' => 'Candidats',
    ],

    'form' => [
        'sections' => [
            'general-information' => [
                'title' => 'Informations Générales',

                'fields' => [
                    'evaluation-good'           => 'Évaluation : Bien',
                    'evaluation-very-good'      => 'Évaluation : Très Bien',
                    'evaluation-very-excellent' => 'Évaluation : Excellent',
                    'hired'                     => 'Embauché',
                    'candidate-name'            => 'Nom du candidat',
                    'email'                     => 'Emails',
                    'phone'                     => 'Téléphone',
                    'linkedin-profile'          => 'Profil Linkedin',
                    'recruiter'                 => 'Recruteur',
                    'interviewer'               => 'Interviewer',
                    'tags'                      => 'Tags',
                    'notes'                     => 'Notes',
                    'hired-date'                => 'Date d\'embauche',
                    'job-position'              => 'Postes',
                ],
            ],

            'education-and-availability' => [
                'title' => 'Éducation & Disponibilité',

                'fields' => [
                    'degree'            => 'Diplôme',
                    'availability-date' => 'Date de disponibilité',
                ],
            ],

            'department' => [
                'title' => 'Département',
            ],

            'salary' => [
                'title' => 'Salaire Attendu & Proposé',

                'fields' => [
                    'expected-salary'       => 'Salaire attendu',
                    'salary-proposed-extra' => 'Autre avantage',
                    'proposed-salary'       => 'Salaire proposé',
                    'salary-expected-extra' => 'Autre avantage',
                ],
            ],

            'source-and-medium' => [
                'title' => 'Source & Média',

                'fields' => [
                    'source' => 'Source',
                    'medium' => 'Média',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'partner-name'       => 'Nom du Partenaire',
            'applied-on'         => 'Candidature le',
            'job-position'       => 'Poste',
            'stage'              => 'Étape',
            'candidate-name'     => 'Nom du Candidat',
            'evaluation'         => 'Évaluation',
            'application-status' => 'Statut de la Candidature',
            'tags'               => 'Tags',
            'refuse-reason'      => 'Raison du Refus',
            'email'              => 'Email',
            'recruiter'          => 'Recruteur',
            'interviewer'        => 'Interviewer',
            'candidate-phone'    => 'Téléphone',
            'medium'             => 'Média',
            'source'             => 'Source',
            'salary-expected'    => 'Salaire Attendu',
            'availability-date'  => 'Date de Disponibilité',
        ],

        'filters' => [
            'source'                  => 'Source',
            'medium'                  => 'Média',
            'candidate'               => 'Candidat',
            'priority'                => 'Priorité',
            'salary-proposed-extra'   => 'Avantage Salarial Proposé',
            'salary-expected-extra'   => 'Avantage Salarial Attendu',
            'applicant-notes'         => 'Notes du Candidat',
            'create-date'             => 'Candidature le',
            'date-closed'             => 'Date d\'embauche',
            'date-last-stage-updated' => 'Dernière mise à jour du statut',
            'stage'                   => 'Étape',
            'job-position'            => 'Poste',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Candidat Supprimé',
                    'body'  => 'Le candidat a été supprimé avec succès.',
                ],
            ],
        ],

        'groups' => [
            'stage'          => 'Étape',
            'job-position'   => 'Poste',
            'candidate-name' => 'Nom du Candidat',
            'responsible'    => 'Responsable',
            'creation-date'  => 'Date de Création',
            'hired-date'     => 'Date d\'embauche',
            'last-stage'     => 'Dernière Étape',
            'refuse-reason'  => 'Raison du Refus',
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Employés supprimés',
                    'body'  => 'Les employés ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Employés supprimés',
                    'body'  => 'Les employés ont été supprimés avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Employés restaurés',
                    'body'  => 'Les employés ont été restaurés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general-information' => [
                'title' => 'Informations Générales',

                'entries' => [
                    'evaluation-good'           => 'Évaluation : Bien',
                    'evaluation-very-good'      => 'Évaluation : Très Bien',
                    'evaluation-very-excellent' => 'Évaluation : Excellent',
                    'hired'                     => 'Embauché',
                    'candidate-name'            => 'Nom du candidat',
                    'email'                     => 'Emails',
                    'phone'                     => 'Téléphone',
                    'linkedin-profile'          => 'Profil Linkedin',
                    'recruiter'                 => 'Recruteur',
                    'interviewer'               => 'Interviewer',
                    'tags'                      => 'Tags',
                    'notes'                     => 'Notes',
                    'job-position'              => 'Postes',
                ],
            ],

            'education-and-availability' => [
                'title' => 'Éducation & Disponibilité',

                'entries' => [
                    'degree'            => 'Diplôme',
                    'availability-date' => 'Date de disponibilité',
                ],
            ],

            'department' => [
                'title' => 'Département',
            ],

            'salary' => [
                'title' => 'Salaire Attendu & Proposé',

                'entries' => [
                    'expected-salary'       => 'Salaire attendu',
                    'salary-proposed-extra' => 'Autre avantage',
                    'proposed-salary'       => 'Salaire proposé',
                    'salary-expected-extra' => 'Autre avantage',
                ],
            ],

            'source-and-medium' => [
                'title' => 'Source & Média',

                'entries' => [
                    'source' => 'Source',
                    'medium' => 'Média',
                ],
            ],
        ],
    ],
];