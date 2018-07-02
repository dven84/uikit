<?php

return [
    'title' => [
        'label' => 'title',
        'initValue' => '',
        'type' => 'zaa-text'
    ],
    'show_title' => [
        'label' => 'show_title',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'title_style' => [
        'label' => 'style',
        'description' => 'style',
        'initValue' => '',
        'type' => 'select',
        'options' => [
            ['value' => '', 'label' => 'default'],
            ['value' => 'heading-primary', 'label' => 'primary'],
            ['value' => 'h1', 'label' => 'h1'],
            ['value' => 'h2', 'label' => 'h2'],
            ['value' => 'h3', 'label' => 'h3'],
            ['value' => 'h4', 'label' => 'h4'],
            ['value' => 'h5', 'label' => 'h5'],
            ['value' => 'h6', 'label' => 'h6']
        ]
    ],
    'title_style_hero' => [
        'label' => 'style',
        'description' => 'headline_style',
        'initValue' => 'h1',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'default'],
            ['value' => 'heading-hero', 'label' => 'hero'],
            ['value' => 'heading-primary', 'label' => 'primary'],
            ['value' => 'h1', 'label' => 'h1'],
            ['value' => 'h2', 'label' => 'h2'],
            ['value' => 'h3', 'label' => 'h3'],
            ['value' => 'h4', 'label' => 'h4'],
            ['value' => 'h5', 'label' => 'h5'],
            ['value' => 'h6', 'label' => 'h6']
        ]
    ],
    'title_decoration' => [
        'label' => "decoration",
        'description' => "decoration",
        'initValue' => '',
        'type' => "zaa-select",
        'options' => [
            ['value' => '', 'label' => 'none'],
            ['value' => 'divider', 'label' => 'divider'],
            ['value' => 'bullet', 'label' => 'bullet'],
            ['value' => 'line', 'label' => 'line']
        ]
    ],
    'title_color' => [
        'label' => 'color',
        'description' => 'color',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'default'],
            ['value' => 'muted', 'label' => 'muted'],
            ['value' => 'primary', 'label' => 'primary'],
            ['value' => 'success', 'label' => 'success'],
            ['value' => 'warning', 'label' => 'warning'],
            ['value' => 'danger', 'label' => 'danger'],
            ['value' => 'background', 'label' => 'background']
        ]
    ],
    'title_element' => [
        'label' => 'html_element',
        'description' => 'html_element',
        'initValue' => 'h1',
        'type' => 'zaa-select',
        'options' => [
            ['value' => 'h1', 'label' => 'h1'],
            ['value' => 'h2', 'label' => 'h2'],
            ['value' => 'h3', 'label' => 'h3'],
            ['value' => 'h4', 'label' => 'h4'],
            ['value' => 'h5', 'label' => 'h5'],
            ['value' => 'h6', 'label' => 'h6']
        ]
    ],
    'title_transition' => [
        'label' => 'transition',
        'description' => 'transition',
        'initValue' => '',
        'type' => 'select',
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
    ]
];