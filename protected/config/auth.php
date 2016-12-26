<?php
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'guest',
        'bizRule' => null,
        'data' => null
    ),
    'User' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'guest',
        ),
        'bizRule' => null,
        'data' => null
    ),
    'Admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Admin',
        'children' => array(
            'guest', 'User'
        ),
        'bizRule' => null,
        'data' => null
    ),
);
