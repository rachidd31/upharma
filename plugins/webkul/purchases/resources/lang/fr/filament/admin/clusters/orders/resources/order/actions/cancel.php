<?php

return [
    'label' => 'Annuler',

    'action' => [
        'notification' => [
            'warning' => [
                'receipts' => [
                    'title' => 'Impossible d\'annuler la commande',
                    'body'  => 'La commande ne peut pas être annulée car des réceptions sont déjà effectuées.',
                ],

                'bills' => [
                    'title' => 'Impossible d\'annuler la commande',
                    'body'  => 'La commande ne peut pas être annulée. Vous devez d\'abord annuler les factures fournisseurs associées.',
                ],
            ],

            'success' => [
                'title' => 'Commande annulée',
                'body'  => 'La commande a été annulée avec succès.',
            ],
        ],
    ],
];