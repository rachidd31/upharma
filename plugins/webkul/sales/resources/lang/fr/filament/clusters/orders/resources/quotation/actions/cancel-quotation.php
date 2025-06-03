<?php

return [
    'title' => 'Annuler',
    'modal' => [
        'heading'     => 'Annuler le devis',
        'description' => 'Êtes-vous sûr de vouloir annuler ce devis ?',
    ],

    'footer-actions' => [
        'send-and-cancel' => [
            'title' => 'Envoyer & Annuler',

            'notification' => [
                'cancelled' => [
                    'title' => 'Devis annulé',
                    'body'  => 'Le devis a été annulé et l’email a été envoyé avec succès.',
                ],
            ],
        ],

        'cancel' => [
            'title' => 'Annuler',

            'notification' => [
                'cancelled' => [
                    'title' => 'Devis annulé',
                    'body'  => 'Le devis a été annulé avec succès.',
                ],
            ],
        ],

        'close' => [
            'title' => 'Fermer',
        ],
    ],

    'form' => [
        'fields' => [
            'partner'             => 'Partenaire',
            'subject'             => 'Sujet',
            'subject-placeholder' => 'Sujet',
            'subject-default'     => 'Le devis :name a été annulé pour la commande de vente #:id',
            'description'         => 'Description',
            'description-default' => 'Cher <b>:partner_name</b>, <br/><br/>Nous souhaitons vous informer que votre commande de vente <b>:name</b> a été annulée. Par conséquent, aucun frais supplémentaire ne sera appliqué à cette commande. Si un remboursement est nécessaire, il sera traité dans les plus brefs délais.<br/><br/>Si vous avez des questions ou avez besoin d’assistance, n’hésitez pas à nous contacter.',
        ],
    ],
];
