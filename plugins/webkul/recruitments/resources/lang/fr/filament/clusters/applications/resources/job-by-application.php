<?php

return [
    'title' => 'Poste',

    'navigation' => [
        'group' => 'Candidatures',
        'title' => 'Postes',
    ],

    'table' => [
        'columns' => [
            'name'         => 'Nom',
            'manager-name' => 'Manager',
            'company-name' => 'Entreprise',
        ],

        'actions' => [
            'applications' => [
                'new-applications' => ':count Nouvelles Candidatures',
            ],

            'to-recruitment' => [
                'to-recruitment' => ':count À Recruter',
            ],

            'total-application' => [
                'total-application' => ':count Candidatures',
            ],
        ],
    ],

];