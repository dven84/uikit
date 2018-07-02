<?php

return [
    'meta_transition' => [
        'label' => 'transition',
        'description' => 'transition',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'none'],
            ['value' => 'fade', 'label' => 'fade'],
            ['value' => 'scale-up', 'label' => 'scale_up'],
            ['value' => 'scale-down', 'label' => 'scale_down'],
            ['value' => 'slide-top-small', 'label' => 'slide_top_small'],
            ['value' => 'slide-bottom-small', 'label' => 'slide_bottom_small'],
            ['value' => 'slide-left-small', 'label' => 'slide_left_small'],
            ['value' => 'slide-right-small', 'label' => 'slide_right_small'],
            ['value' => 'slide-top-medium', 'label' => 'slide_top_medium'],
            ['value' => 'slide-bottom-medium', 'label' => 'slide_bottom_medium'],
            ['value' => 'slide-left-medium', 'label' => 'slide_left_medium'],
            ['value' => 'slide-right-medium', 'label' => 'slide_right_medium'],
            ['value' => 'slide-top', 'label' => 'slide_top'],
            ['value' => 'slide-bottom', 'label' => 'slide_bottom'],
            ['value' => 'slide-left', 'label' => 'slide_left'],
            ['value' => 'slide-right', 'label' => 'slide_right']
        ]
    ],
    'meta_style' => [
        'label' => 'style',
        'description' => 'style',
        'initValue' => 'meta',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'default'],
            ['value' => 'meta', 'label' => 'meta'],
            ['value' => 'muted', 'label' => 'muted'],
            ['value' => 'h4', 'label' => 'h4'],
            ['value' => 'h5', 'label' => 'h5'],
            ['value' => 'h6', 'label' => 'h6']
        ]
    ],
    'meta_align' => [
        'label' => 'alignment',
        'description' => 'alignment',
        'initValue' => 'bottom',
        'type' => 'zaa-select',
        'options' => [
            ['value' => 'top', 'label' => 'top'],
            ['value' => 'bottom', 'label' => 'bottom']
        ]
    ],
    'meta_margin' => [
        'label' => 'margin',
        'description' => 'margin',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'default'],
            ['value' => 'small', 'label' => 'small'],
            ['value' => 'remove', 'label' => 'none']
        ]
    ]
];