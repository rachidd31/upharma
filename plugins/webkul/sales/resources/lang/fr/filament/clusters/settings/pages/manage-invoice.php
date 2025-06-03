<?php

return [
    'title' => 'Gérer les factures',

    'breadcrumb' => 'Gérer les factures',

    'navigation' => [
        'title' => 'Gérer les factures',
    ],

    'form' => [
        'invoice-policy' => [
            'label'      => 'Politique de facturation',
            'label-help' => 'Définir comment les factures sont générées à partir des commandes clients.',
            'options'    => [
                'order'    => 'Générer une facture basée sur les quantités commandées',
                'delivery' => 'Générer une facture basée sur les quantités livrées',
            ],
        ],
    ],
];
