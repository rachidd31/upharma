<?php

return [
    'title' => 'Mediums',

    'navigation' => [
        'title' => 'Mediums',
        'group' => 'UTMs',
    ],

    'groups' => [
        'status'     => 'Status',
        'created-by' => 'Created By',
        'created-at' => 'Created At',
        'updated-at' => 'Updated At',
    ],

    'global-search' => [
        'name'        => 'Name',
        'reason-code' => 'Reason Code',
    ],

    'form' => [
        'fields' => [
            'name'             => 'Name',
            'name-placeholder' => 'Enter the name of the medium',
            'status'           => 'Status',
        ],
    ],

    'table' => [
        'columns' => [
            'id'         => 'ID',
            'name'       => 'Name',
            'status'     => 'Status',
            'created-by' => 'Created By',
            'created-at' => 'Created At',
            'updated-at' => 'Updated At',
        ],

        'filters' => [
            'name'       => 'Name',
            'created-by' => 'Created By',
            'updated-at' => 'Updated At',
            'created-at' => 'Created At',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Medium updated',
                    'body'  => 'The medium has been updated successfully.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Medium deleted',
                    'body'  => 'The medium has been deleted successfully.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Mediums deleted',
                    'body'  => 'The Mediums has been deleted successfully.',
                ],
            ],
        ],

        'empty-state-action' => [
            'create' => [
                'notification' => [
                    'title' => 'Medium created',
                    'body'  => 'The medium has been created successfully.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'name' => 'Name',
    ],
];
