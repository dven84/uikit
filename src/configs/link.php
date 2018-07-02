<?php

return [
    'link_text' => [
        'label' => 'text',
        'description' => 'link_text',
        'initValue' => "read_more",
        'type' => 'zaa-text'
    ],
    'link_target' => [
        'label' => 'link_target',
        'initValue' => '',
        'type' => 'zaa-checkbox'
    ],
    'link_style' => [
        'label' => 'style',
        'description' => 'link_style',
        'initValue' => 'default',
        'type' => 'zaa-select',
        'options' => [
            ['value' => 'link-muted', 'label' => 'link'],
            ['value' => 'link-text', 'label' => 'link_text'],
            ['value' => 'default', 'label' => 'button_default'],
            ['value' => 'primary', 'label' => 'button_primary'],
            ['value' => 'secondary', 'label' => 'button_secondary'],
            ['value' => 'danger', 'label' => 'button_danger'],
            ['value' => 'text', 'label' => 'button_text']
        ]
    ],
    'link_size' => [
        'label' => 'button_size',
        'description' => 'button_size',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => 'small', 'label' => 'small'],
            ['value' => '', 'label' => 'default'],
            ['value' => 'large', 'label' => 'large']
        ]
    ]
];