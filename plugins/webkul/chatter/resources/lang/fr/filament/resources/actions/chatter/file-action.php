<?php

return [
    'setup' => [
        'title'   => 'Pièces Jointes',
        'tooltip' => 'Télécharger des Pièces Jointes',

        'form' => [
            'fields' => [
                'files'                => 'Fichiers',
                'attachment-helper-text' => 'Taille maximale du fichier : 10 Mo. Types autorisés : Images, PDF, Word, Excel, Texte',

                'actions' => [
                    'delete' => [
                        'title' => 'Fichier supprimé',
                        'body'  => 'Le fichier a été supprimé avec succès.',
                    ],
                ],
            ],
        ],

        'actions' => [
            'notification' => [
                'success' => [
                    'title' => 'Pièces jointes téléchargées',
                    'body'  => 'Les pièces jointes ont été téléchargées avec succès.',
                ],

                'warning'   => [
                    'title' => 'Aucun nouveau fichier',
                    'body'  => 'Tous les fichiers ont déjà été téléchargés.',
                ],

                'error' => [
                    'title' => 'Erreur de téléchargement de pièce jointe',
                    'body'  => 'Échec du téléchargement des pièces jointes',
                ],
            ],
        ],
    ],
];