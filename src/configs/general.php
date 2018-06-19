<?php

return [
    'align' => [
        'label' => 'block.label.align',
        'type' => 'zaa-select',
        'initValue' => '',
        'options' => [
            ['value' => '', 'label' => 'block.value.inherit'],
            ['value' => 'left', 'label' => 'block.value.left'],
            ['value' => 'center', 'label' => 'block.value.center'],
            ['value' => 'right', 'label' => 'block.value.right']
        ]
    ],
    'breakpoint' => [
        'label' => 'block.label.breakpoint',
        'type' => 'zaa-select',
        'initvalue' => '',
        'options' => [
            ['value' => '', 'label' => 'block.value.always'],
            ['value' => 's', 'label' => 'block.value.small_phone_landscape'],
            ['value' => 'm', 'label' => 'block.value.medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'block.value.large_desktop'],
            ['value' => 'xl', 'label' => 'block.value.x_large_large_screens']
        ]
    ],
    'text_align' => [
        'var' => 'text_align', 'label' => 'block.label.text_align', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.inherit'],
            ['value' => 'left', 'label' => 'block.value.left'],
            ['value' => 'center', 'label' => 'block.value.center'],
            ['value' => 'right', 'label' => 'block.value.right']
        ]
    ],
    'text_align_breakpoint' => [
        'var' => 'text_align_breakpoint', 'label' => 'block.label.text_align_breakpoint', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.always'],
            ['value' => 's', 'label' => 'block.value.small_phone_landscape'],
            ['value' => 'm', 'label' => 'block.value.medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'block.value.large_desktop'],
            ['value' => 'xl', 'label' => 'block.value.x_large_large_screens']
        ]
    ],
    'text_align_fallback' => [
        'var' => 'text_align_fallback', 'label' => 'block.label.text_align_fallback', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.inherit'],
            ['value' => 'left', 'label' => 'block.value.left'],
            ['value' => 'center', 'label' => 'block.value.center'],
            ['value' => 'right', 'label' => 'block.value.right']
        ]
    ],
    'text_align_justify' => [
        'var' => 'text_align', 'label' => 'block.label.text_align', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.inherit'],
            ['value' => 'left', 'label' => 'block.value.left'],
            ['value' => 'center', 'label' => 'block.value.center'],
            ['value' => 'right', 'label' => 'block.value.right'],
            ['value' => 'justify', 'label' => 'block.value.justify']
        ]
    ],
    'text_align_justify_fallback' => [
        'var' => 'text_align_fallback', 'label' => 'block.label.text_align_fallback', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.inherit'],
            ['value' => 'left', 'label' => 'block.value.left'],
            ['value' => 'center', 'label' => 'block.value.center'],
            ['value' => 'right', 'label' => 'block.value.right'],
            ['value' => 'justify', 'label' => 'block.value.justify']
        ]
    ],
    'maxwidth' => [
        'var' => 'maxwidth', 'label' => 'block.label.maxwidth', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.none'],
            ['value' => 'small', 'label' => 'block.value.small'],
            ['value' => 'medium', 'label' => 'block.value.medium'],
            ['value' => 'large', 'label' => 'block.value.large'],
            ['value' => 'xlarge', 'label' => 'block.value.x_large'],
            ['value' => 'xxlarge', 'label' => 'block.value.xx_large']
        ]
    ],
    'maxwidth_no_xxl' => [
        'var' => 'maxwidth', 'label' => 'block.label.maxwidth', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.none'],
            ['value' => 'small', 'label' => 'block.value.small'],
            ['value' => 'medium', 'label' => 'block.value.medium'],
            ['value' => 'large', 'label' => 'block.value.large'],
            ['value' => 'xlarge', 'label' => 'block.value.x_large']
        ]
    ],
    'maxwidth_align' => [
        'var' => 'maxwidth_align', 'label' => 'block.label.maxwidth_align', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.left'],
            ['value' => 'center', 'label' => 'block.value.center'],
            ['value' => 'right', 'label' => 'block.value.right']
        ]
    ],
    'maxwidth_breakpoint' => [
        'var' => 'maxwidth_breakpoint', 'label' => 'block.label.maxwidth_breakpoint', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.always'],
            ['value' => 's', 'label' => 'block.value.small_phone_landscape'],
            ['value' => 'm', 'label' => 'block.value.medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'block.value.large_desktop'],
            ['value' => 'xl', 'label' => 'block.value.x_large_large_screens']
        ]
    ],
    'margin' => [
        'var' => 'margin', 'label' => 'block.label.margin', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.keep_existing'],
            ['value' => 'small', 'label' => 'block.value.small'],
            ['value' => 'default', 'label' => 'block.value.default'],
            ['value' => 'medium', 'label' => 'block.value.medium'],
            ['value' => 'xlarge', 'label' => 'block.value.x_large'],
            ['value' => 'remove-vertical', 'label' => 'block.value.none']
        ]
    ],
    'margin_remove_top' => ['var' => 'margin_remove_top', 'label' =>  'block.label.margin_remove_top', 'type' => 'zaa-checkbox'],
    'margin_remove_bottom' => ['var' => 'margin_remove_bottom', 'label' =>  'block.label.margin_remove_bottom', 'type' => 'zaa-checkbox'],
    'visibility' => [
        'var' => 'visibility', 'label' => 'block.label.visibility', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.always'],
            ['value' => 's', 'label' => 'block.value.small_phone_landscape'],
            ['value' => 'm', 'label' => 'block.value.medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'block.value.large_desktop'],
            ['value' => 'xl', 'label' => 'block.value.x_large_large_screens']
        ]
    ],
    'animation' => [
        'var' => 'animation', 'label' => 'block.label.animation', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.inherit'],
            ['value' => 'none', 'label' => 'block.value.none'],
            ['value' => 'fade', 'label' => 'block.value.fade'],
            ['value' => 'scale-up', 'label' => 'block.value.scale_up'],
            ['value' => 'scale-down', 'label' => 'block.value.scale_down'],
            ['value' => 'slide-top-small', 'label' => 'block.value.slide_top_small'],
            ['value' => 'slide-bottom-small', 'label' => 'block.value.slide_bottom_small'],
            ['value' => 'slide-left-small', 'label' => 'block.value.slide_left_small'],
            ['value' => 'slide-right-small', 'label' => 'block.value.slide_right_small'],
            ['value' => 'slide-top-medium', 'label' => 'block.value.slide_top_medium'],
            ['value' => 'slide-bottom-medium', 'label' => 'block.value.slide_bottom_medium'],
            ['value' => 'slide-left-medium', 'label' => 'block.value.slide_left_medium'],
            ['value' => 'slide-right-medium', 'label' => 'block.value.slide_right_medium'],
            ['value' => 'slide-top', 'label' => 'block.value.slide_top'],
            ['value' => 'slide-bottom', 'label' => 'block.value.slide_bottom'],
            ['value' => 'slide-left', 'label' => 'block.value.slide_left'],
            ['value' => 'slide-right', 'label' => 'block.value.slide_right'],
            ['value' => 'parallax', 'label' => 'block.value.parallax'],
        ]
    ],
    'transition' => [
        'var' => 'transition', 'label' => 'block.label.transition', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => 'fade', 'label' => 'block.value.fade'],
            ['value' => 'scale-up', 'label' => 'block.value.scale_up'],
            ['value' => 'scale-down', 'label' => 'block.value.scale_down'],
            ['value' => 'slide-top-small', 'label' => 'block.value.slide_top_small'],
            ['value' => 'slide-bottom-small', 'label' => 'block.value.slide_bottom_small'],
            ['value' => 'slide-left-small', 'label' => 'block.value.slide_left_small'],
            ['value' => 'slide-right-small', 'label' => 'block.value.slide_right_small'],
            ['value' => 'slide-top-medium', 'label' => 'block.value.slide_top_medium'],
            ['value' => 'slide-bottom-medium', 'label' => 'block.value.slide_bottom_medium'],
            ['value' => 'slide-left-medium', 'label' => 'block.value.slide_left_medium'],
            ['value' => 'slide-right-medium', 'label' => 'block.value.slide_right_medium'],
            ['value' => 'slide-top', 'label' => 'block.value.slide_top'],
            ['value' => 'slide-bottom', 'label' => 'block.value.slide_bottom'],
            ['value' => 'slide-left', 'label' => 'block.value.slide_left'],
            ['value' => 'slide-right', 'label' => 'block.value.slide_right'],
        ]
    ],
    'transition_width_none' => [
        'var' => 'transition', 'label' => 'block.label.transition', 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
            ['value' => '', 'label' => 'block.value.none'],
            ['value' => 'fade', 'label' => 'block.value.fade'],
            ['value' => 'scale-up', 'label' => 'block.value.scale_up'],
            ['value' => 'scale-down', 'label' => 'block.value.scale_down'],
            ['value' => 'slide-top-small', 'label' => 'block.value.slide_top_small'],
            ['value' => 'slide-bottom-small', 'label' => 'block.value.slide_bottom_small'],
            ['value' => 'slide-left-small', 'label' => 'block.value.slide_left_small'],
            ['value' => 'slide-right-small', 'label' => 'block.value.slide_right_small'],
            ['value' => 'slide-top-medium', 'label' => 'block.value.slide_top_medium'],
            ['value' => 'slide-bottom-medium', 'label' => 'block.value.slide_bottom_medium'],
            ['value' => 'slide-left-medium', 'label' => 'block.value.slide_left_medium'],
            ['value' => 'slide-right-medium', 'label' => 'block.value.slide_right_medium'],
            ['value' => 'slide-top', 'label' => 'block.value.slide_top'],
            ['value' => 'slide-bottom', 'label' => 'block.value.slide_bottom'],
            ['value' => 'slide-left', 'label' => 'block.value.slide_left'],
            ['value' => 'slide-right', 'label' => 'block.value.slide_right'],
        ]
    ],
    'id' => [
        'var' => 'id', 'label' => 'block.label.id', 'type' => 'zaa-text'
    ],
    'class' => [
        'var' => 'class', 'label' => 'block.label.class', 'type' => 'zaa-text'
    ],
    'name' => [
        'var' => 'name', 'label' => 'block.label.name', 'type' => 'zaa-text'
    ],
    'css' => [
        'var' => 'css', 'label' => 'block.label.css', 'type' => 'zaa-textarea'
    ],
    'js' => [
        'var' => 'js', 'label' => 'block.label.js', 'type' => 'zaa-textarea'
    ]
];