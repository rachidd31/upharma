<?php

return [
    'form' => [
        'value'                  => 'Valeur',
        'due'                    => 'Dû',
        'delay-due'              => 'Délai dû',
        'delay-type'             => 'Type de délai',
        'days-on-the-next-month' => 'Jours du mois suivant',
        'days'                   => 'Jours',
        'payment-term'           => 'Condition de paiement',
    ],

    'table' => [
        'columns' => [
            'due'          => 'Dû',
            'value'        => 'Valeur',
            'value-amount' => 'Montant de la valeur',
            'after'        => 'Après',
            'delay-type'   => 'Type de délai',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Terme d\'échéance de paiement mis à jour',
                    'body'  => 'Le terme d\'échéance de paiement a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Terme d\'échéance de paiement supprimé',
                    'body'  => 'Le terme d\'échéance de paiement a été supprimé avec succès.',
                ],
            ],
        ],

        'header-actions' => [
            'create' => [
                'notification' => [
                    'title' => 'Terme d\'échéance de paiement créé',
                    'body'  => 'Le terme d\'échéance de paiement a été créé avec succès.',
                ],
            ],
        ],
    ],
]; 