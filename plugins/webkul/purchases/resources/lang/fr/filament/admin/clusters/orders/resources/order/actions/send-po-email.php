<?php

return [
    'label' => 'Envoyer le Bon de Commande par E-mail',

    'form' => [
        'fields' => [
            'to'      => 'À',
            'subject' => 'Objet',
            'message' => 'Message',
        ],
    ],

    'action' => [
        'notification' => [
            'success' => [
                'title' => 'E-mail envoyé',
                'body'  => 'L\'e-mail a été envoyé avec succès.',
            ],
        ],
    ],
];