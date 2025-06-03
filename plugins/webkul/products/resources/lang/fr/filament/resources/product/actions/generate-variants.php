<?php

return [
    'label'        => 'Générer les Variantes',
    'notification' => [
        'empty' => [
            'title' => 'Aucun attribut trouvé',
            'body'  => 'Veuillez ajouter des attributs pour générer des variantes.',
        ],

        'success' => [
            'title' => 'Variantes générées avec succès',
            'body'  => 'Toutes les variantes du produit ont été générées.',
        ],

        'error' => [
            'title' => 'Erreur lors de la génération des variantes',
            'body'  => 'Une erreur est survenue lors de la génération des variantes du produit.',
        ],
    ],
];