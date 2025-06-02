<?php

return [
    'navigation' => [
        'title' => 'Pages',
        'group' => 'Site Web',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'fields' => [
                    'title'             => 'Titre',
                    'title-placeholder' => 'Titre de la page ...',
                    'slug'              => 'Slug',
                    'content'           => 'Contenu',
                ],
            ],

            'seo' => [
                'title' => 'SEO',

                'fields' => [
                    'meta-title'       => 'Méta Titre',
                    'meta-keywords'    => 'Méta Mots-clés',
                    'meta-description' => 'Méta Description',
                ],
            ],

            'settings' => [
                'title' => 'Paramètres',

                'fields' => [
                    'is-header-visible' => 'Est visible dans le menu d\'en-tête',
                    'is-footer-visible' => 'Est visible dans le menu de pied de page',
                ],
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'title'             => 'Titre',
            'slug'              => 'Slug',
            'creator'           => 'Créé par',
            'is-published'      => 'Est publié',
            'is-header-visible' => 'Est visible dans le menu d\'en-tête',
            'is-footer-visible' => 'Est visible dans le menu de pied de page',
            'created-at'        => 'Créé le',
            'updated-at'        => 'Mis à jour le',
        ],

        'groups' => [
            'created-at' => 'Créé le',
        ],

        'filters' => [
            'is-published' => 'Est publié',
            'creator'      => 'Créé par',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Page mise à jour',
                    'body'  => 'La page a été mise à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Page restaurée',
                    'body'  => 'La page a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Page supprimée',
                    'body'  => 'La page a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Page supprimée de force',
                    'body'  => 'La page a été supprimée de force avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Pages restaurées',
                    'body'  => 'Les pages ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Pages supprimées',
                    'body'  => 'Les pages ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Pages supprimées de force',
                    'body'  => 'Les pages ont été supprimées de force avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'entries' => [
                    'title'   => 'Titre',
                    'slug'    => 'Slug',
                    'content' => 'Contenu',
                    'banner'  => 'Bannière',
                ],
            ],

            'seo' => [
                'title' => 'SEO',

                'entries' => [
                    'meta-title'       => 'Méta Titre',
                    'meta-keywords'    => 'Méta Mots-clés',
                    'meta-description' => 'Méta Description',
                ],
            ],

            'record-information' => [
                'title' => 'Informations sur l\'enregistrement',

                'entries' => [
                    'author'          => 'Auteur',
                    'created-by'      => 'Créé par',
                    'published-at'    => 'Publié le',
                    'last-updated-by' => 'Dernière mise à jour par',
                    'last-updated'    => 'Dernière mise à jour le',
                    'created-at'      => 'Créé le',
                ],
            ],

            'settings' => [
                'title' => 'Paramètres',

                'entries' => [
                    'is-header-visible' => 'Est visible dans le menu d\'en-tête',
                    'is-footer-visible' => 'Est visible dans le menu de pied de page',
                ],
            ],
        ],
    ],
];
