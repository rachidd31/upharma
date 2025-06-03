<?php

return [
    'breadcrumb' => 'Gérer les utilisateurs',
    'title'      => 'Gérer les utilisateurs',
    'group'      => 'Général',

    'navigation' => [
        'label' => 'Gérer les utilisateurs',
    ],

    'form' => [
        'enable-user-invitation' => [
            'label'       => 'Activer l’invitation des utilisateurs',
            'helper-text' => 'Permet aux utilisateurs d’inviter d’autres utilisateurs à l’application.',
        ],

        'enable-reset-password' => [
            'label'       => 'Activer la réinitialisation du mot de passe',
            'helper-text' => 'Permet aux utilisateurs de réinitialiser leur mot de passe.',
        ],

        'default-role' => [
            'label'       => 'Rôle par défaut',
            'helper-text' => 'Le rôle attribué par défaut aux nouveaux utilisateurs.',
        ],

        'default-company' => [
            'label'       => 'Entreprise par défaut',
            'helper-text' => 'L’entreprise attribuée par défaut aux nouveaux utilisateurs.',
        ],
    ],
];
