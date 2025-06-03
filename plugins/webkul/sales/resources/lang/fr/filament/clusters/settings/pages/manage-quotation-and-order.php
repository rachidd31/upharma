<?php

return [
    'title' => 'Gérer les devis et les commandes',

    'breadcrumb' => 'Gérer les devis et les commandes',

    'navigation' => [
        'title' => 'Gérer les devis et les commandes',
    ],

    'form' => [
        'fields' => [
            'validity-suffix'         => 'jours',
            'validity'                => 'Validité par défaut du devis',
            'validity-help'           => 'Le nombre de jours par défaut pendant lequel un devis est valide.',
            'lock-confirm-sales'      => 'Verrouiller la confirmation des ventes',
            'lock-confirm-sales-help' => 'Si activé, la commande client sera verrouillée après confirmation.',
        ],
    ],
];
