<?php

return [
    'notification' => [
        'title' => 'Utilisateur mis à jour',
        'body'  => "L'utilisateur a été mis à jour avec succès.",
    ],

    'header-actions' => [
        'change-password' => [
            'label' => 'Changer le mot de passe',

            'notification' => [
                'title' => 'Mot de passe changé',
                'body'  => 'Le mot de passe a été changé avec succès.',
            ],

            'form' => [
                'new-password'         => 'Nouveau mot de passe',
                'confirm-new-password' => 'Confirmer le nouveau mot de passe',
            ],
        ],

        'delete' => [
            'notification' => [
                'title' => 'Utilisateur supprimé',
                'body'  => "L'utilisateur a été supprimé avec succès.",
            ],
        ],
    ],
];
