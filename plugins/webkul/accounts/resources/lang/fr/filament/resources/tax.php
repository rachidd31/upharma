<?php

return [
    'form' => [
        'sections' => [
            'fields' => [
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

                    'fields' => [
                        'invoice-label'       => 'Libellé de la facture',
                        'tax-group'           => 'Groupe de taxes',
                        'country'             => 'Pays',
                        'include-in-price'    => 'Inclus dans le prix',
                        'include-base-amount' => 'Affecter la base des taxes suivantes',
                        'is-base-affected'    => 'Base affectée par les taxes précédentes',
                    ],
                ],

                'fields' => [
                    'description' => 'Description',
                    'legal-notes' => 'Mentions légales',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'                   => 'Nom',
            'amount-type'            => 'Type de montant',
            'company'                => 'Entreprise',
            'tax-group'              => 'Groupe de taxes',
            'country'                => 'Pays',
            'tax-type'               => 'Type de taxe',
            'tax-scope'              => 'Portée de la taxe',
            'amount-type'            => 'Type de montant',
            'invoice-label'          => 'Libellé de la facture',
            'tax-exigibility'        => 'Exigibilité de la taxe',
            'price-include-override' => 'Priorité d\'inclusion de prix',
            'amount'                 => 'Montant',
            'status'                 => 'Statut',
            'include-base-amount'    => 'Inclure le montant de base',
            'is-base-affected'       => 'La base est-elle affectée',
        ],

        'groups' => [
            'name'         => 'Nom',
            'company'      => 'Entreprise',
            'tax-group'    => 'Groupe de taxes',
            'country'      => 'Pays',
            'created-by'   => 'Créé par',
            'type-tax-use' => 'Type d\'utilisation fiscale',
            'tax-scope'    => 'Portée de la taxe',
            'amount-type'  => 'Type de montant',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Taxe supprimée',
                        'body'  => 'La taxe a été supprimée avec succès.',
                    ],

                    'error' => [
                        'title' => 'La taxe n\'a pas pu être supprimée',
                        'body'  => 'La taxe ne peut pas être supprimée car elle est actuellement utilisée.',
                    ],
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'success' => [
                        'title' => 'Taxes supprimées',
                        'body'  => 'Les taxes ont été supprimées avec succès.',
                    ],

                    'error' => [
                        'title' => 'Les taxes n\'ont pas pu être supprimées',
                        'body'  => 'Les taxes ne peuvent pas être supprimées car elles sont actuellement utilisées.',
                    ],
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
                        'is-base-affected'    => 'La base est-elle affectée',
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

];
