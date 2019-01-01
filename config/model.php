<?php

return [
    //user
    'user' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'role' => [
            'admin' => 0,
            'manager' => 1,
            'member' => 2,
        ],
        'upload' => 'upload/user',
    ],

    //topic
    'topic' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'paginate' => 5,
        'view' => 0,
        'quantity' => 0,
    ],

    //respond
    'respond' => [
        'status' => [
            'wating' => 0,
            'check' => 1,
        ],
        'paginate' => 5,
        'view' => 0,
        'quantity' => 0,
    ],

    //post
    'post' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'upload' => 'upload/post',
        'paginate' => 5,
        'recent' => 5,
        'limit' => 10,
        'view' => 0,
        'tagsInDetail' => 3,
    ],

    //product
    'product' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
            'reject' => 2,
        ],
        'upload' => 'upload/post',
        'paginate' => 5,
        'recent' => 5,
        'limit' => 10,
        'view' => 0,
        'tagsInDetail' => 3,
        'deleted_at' => [
            'null' => null,
        ],
    ],

    //question
    'question' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'paginate' => 5,
        'recent' => 5,
        'limit' => 10,
        'view' => 0,
        'tagsInDetail' => 3,
    ],

    //tag
    'tag' => [
        'limit' => 20,
        'view' => 0,
    ],

    //news
    'news' => [
        'limit' => 20,
        'view' => 0,
    ],

    //comment
    'comment' => [
        'status' => [
            'inactive' => 0,
            'active' => 1,
        ],
        'paginate' => 5,
        'view' => 0,
    ],

    //order_detail
    'order_detail' => [
        'status' => [
            'wating' => 0,
            'handled' => 1,
            'cancel' => 2,
        ],
        'upload' => 'upload/post',
        'paginate' => 5,
        'limit' => 10,
        'view' => 0,
    ],

];
