<?php

return [
    'setup' => [
        'title'        => 'Journal de Notes',
        'submit-title' => 'Enregistrer',

        'form' => [
            'fields' => [
                'hide-subject'          => 'Masquer le Sujet',
                'add-subject'           => 'Ajouter un Sujet',
                'subject'               => 'Sujet',
                'write-message-here'    => 'Écrivez votre message ici',
                'attachments-helper-text' => 'Taille maximale du fichier : 10 Mo. Types autorisés : Images, PDF, Word, Excel, Texte',
            ],
        ],

        'actions' => [
            'notification' => [
                'success' => [
                    'title' => 'Note de journal ajoutée',
                    'body'  => 'Votre note de journal a été ajoutée avec succès.',
                ],

                'error' => [
                    'title' => 'Erreur d\'ajout de journal',
                    'body'  => 'Échec de l\'ajout de votre note de journal',
                ],
            ],
        ],
    ],
];