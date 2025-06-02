<?php

return [
    'title' => 'Paiement',

    'navigation' => [
        'title' => 'Paiements',
        'group' => 'Factures',
    ],

    'global-search' => [
        'number'           => 'Numéro',
        'customer'         => 'Client',
        'invoice-date'     => 'Date de facture',
        'invoice-due-date' => 'Date d\'échéance de la facture',
    ],

    'form' => [
        'sections' => [
            'fields' => [
                'payment-type'          => 'Type de paiement',
                'memo'                  => 'Mémo',
                'date'                  => 'Date',
                'amount'                => 'Montant',
                'payment-method'        => 'Mode de paiement',
                'customer'              => 'Client',
                'journal'               => 'Journal',
                'customer-bank-account' => 'Compte bancaire du client',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'                             => 'Nom',
            'company'                          => 'Entreprise',
            'bank-account-holder'              => 'Titulaire du compte bancaire',
            'paired-internal-transfer-payment' => 'Paiement de transfert interne appairé',
            'payment-method-line'              => 'Ligne de mode de paiement',
            'payment-method'                   => 'Mode de paiement',
            'currency'                         => 'Devise',
            'partner'                          => 'Partenaire',
            'outstanding-amount'               => 'Montant impayé',
            'destination-account'              => 'Compte de destination',
            'created-by'                       => 'Créé par',
            'payment-transaction'              => 'Transaction de paiement',
        ],

        'groups' => [
            'name'                             => 'Nom',
            'company'                          => 'Entreprise',
            'partner'                          => 'Partenaire',
            'payment-method-line'              => 'Ligne de mode de paiement',
            'payment-method'                   => 'Mode de paiement',
            'partner-bank-account'             => 'Compte bancaire du partenaire',
            'paired-internal-transfer-payment' => 'Paiement de transfert interne appairé',
            'created-at'                       => 'Créé le',
            'updated-at'                       => 'Mis à jour le',
        ],

        'filters' => [
            'company'                          => 'Entreprise',
            'customer-bank-account'            => 'Compte bancaire du client',
            'paired-internal-transfer-payment' => 'Paiement de transfert interne appairé',
            'payment-method'                   => 'Mode de paiement',
            'currency'                         => 'Devise',
            'partner'                          => 'Partenaire',
            'partner-method-line'              => 'Ligne de mode de paiement du partenaire',
            'created-at'                       => 'Créé le',
            'updated-at'                       => 'Mis à jour le',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Paiement supprimé',
                    'body'  => 'Le paiement a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Paiements supprimés',
                    'body'  => 'Les paiements ont été supprimés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'payment-information' => [
                'title'   => 'Informations de paiement',
                'entries' => [
                    'state'                 => 'État',
                    'payment-type'          => 'Type de paiement',
                    'journal'               => 'Journal',
                    'customer-bank-account' => 'Compte bancaire du client',
                    'customer'              => 'Client',
                ],
            ],

            'payment-details' => [
                'title'   => 'Détails du paiement',
                'entries' => [
                    'amount' => 'Montant',
                    'date'   => 'Date',
                    'memo'   => 'Mémo',
                ],
            ],

            'payment-method' => [
                'title'   => 'Mode de paiement',
                'entries' => [
                    'payment-method' => 'Mode de paiement',
                ],
            ],
        ],
    ],

];
