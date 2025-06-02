<?php

return [
    'form' => [
        'sections' => [
            'fields' => [
                'code'          => 'Code',
                'account-name'  => 'Nom du compte',
                'accounting'    => 'Comptabilité',
                'account-type'  => 'Type de compte',
                'default-taxes' => 'Taxes par défaut',
                'tags'          => 'Tags',
                'journals'      => 'Journaux',
                'currency'      => 'Devise',
                'deprecated'    => 'Obsolète',
                'reconcile'     => 'Rapprocher',
                'non-trade'     => 'Non commercial',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'code'         => 'Code',
            'account-name' => 'Nom du compte',
            'account-type' => 'Type de compte',
            'currency'     => 'Devise',
            'deprecated'   => 'Obsolète',
            'reconcile'    => 'Rapprocher',
            'non-trade'    => 'Non commercial',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Compte supprimé',
                    'body'  => 'Le compte a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Comptes supprimés',
                    'body'  => 'Les comptes ont été supprimés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'entries' => [
                'name'            => 'Nom',
                'tax-type'        => 'Type de taxe',
                'tax-computation' => 'Calcul de la taxe',
                'tax-scope'       => 'Portée de la taxe',
                'status'          => 'Statut',
                'amount'          => 'Montant',
            ],

            'field-set' => [
                'advanced-options' => [
                    'title' => 'Options avancées',

                    'entries' => [
                        'invoice-label'       => 'Libellé de la facture',
                        'tax-group'           => 'Groupe de taxes',
                        'country'             => 'Pays',
                        'include-in-price'    => 'Inclure dans le prix',
                        'include-base-amount' => 'Inclure le montant de base',
                        'is-base-affected'    => 'Le montant de base est affecté',
                    ],
                ],

                'description-and-legal-notes' => [
                    'title'   => 'Description et Mentions légales de la facture',
                    'entries' => [
                        'description' => 'Description',
                        'legal-notes' => 'Mentions légales',
                    ],
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'entries' => [
                'code'          => 'Code',
                'account-name'  => 'Nom du compte',
                'accounting'    => 'Comptabilité',
                'account-type'  => 'Type de compte',
                'default-taxes' => 'Taxes par défaut',
                'tags'          => 'Tags',
                'journals'      => 'Journaux',
                'currency'      => 'Devise',
                'deprecated'    => 'Obsolète',
                'reconcile'     => 'Rapprocher',
                'non-trade'     => 'Non commercial',
            ],
        ],
    ],
];
