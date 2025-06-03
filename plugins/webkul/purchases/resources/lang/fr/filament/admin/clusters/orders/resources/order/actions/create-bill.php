<?php

return [
    'label' => 'Créer une Facture',

    'action' => [
        'notification' => [
            'warning' => [
                'title' => 'Aucune ligne facturable',
                'body'  => 'Il n\'y a aucune ligne facturable, veuillez vous assurer qu\'une quantité a été reçue.',
            ],

            'success' => [
                'title' => 'Facture créée',
                'body'  => 'La facture a été créée avec succès.',
            ],
        ],
    ],
];