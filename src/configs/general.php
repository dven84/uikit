<?php

/**
 * Template :
 * 'content' => [
 *      'id' => '',
 *      'var' => 'content',
 *      'label' => 'content',
 *      'type' => 'zaa-wysiwyg',
 *      'placeholder' => '',
 *      'options' => [],
 *      'initvalue' => ''
 * ]
 */
return [
    'viewport_height' => [
        'label' => 'height',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'auto'],
            ['value' => 'percent', 'label' => 'viewport'],
            ['value' => 'large', 'label' => 'viewport_minus_20'],
            ['value' => 'section', 'label' => 'viewport_minus_following'],
        ]
    ],
    'show_meta' => [
        'label' => 'show_meta',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'show_content' => [
        'label' => 'show_content',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'show_link' => [
        'label' => 'show_link',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'show_thumbnail' => [
        'label' => 'show_thumbnail',
        'description' => 'show_thumbnail',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'meta' => [
        'label' => 'meta',
        'initValue' => '',
        'type' => 'zaa-text'
    ],
    'content' => [
        'label' => 'content',
        'initValue' => '',
        'type' => 'zaa-wysiwyg'
    ],
    'image' => [
        'label' => 'image',
        'initValue' => '',
        'type' => 'zaa-file-upload',
        'options' => [
            'no_filter' => false
        ]
    ],
    'image_alt' => [
        'label' => 'image_alt',
        'initValue' => '',
        'type' => 'zaa-text'
    ],
    'image_link' => [
        'label' => 'image',
        'initValue' => '',
        'type' => 'zaa-link',
        'options' => [
            'no_filter' => false
        ]
    ],
    'video' => [
        'label' => 'video',
        'initValue' => '',
        'type' => 'zaa-link',
        'options' => [
            'no_filter' => false
        ]
    ],
    'link' => [
        'label' => 'link',
        'initValue' => '',
        'type' => 'zaa-link',
        'options' => [
            'no_filter' => false
        ]
    ],
    'image_size' => [
        'label' => 'image_size',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'auto'],
            ['value' => 'cover', 'label' => 'cover'],
            ['value' => 'contain', 'label' => 'contain']
        ]
    ],
    'image_position' => [
        'label' => 'image_position',
        'initValue' => 'center-center',
        'type' => 'zaa-select',
        'options' => [
            ['value' => 'top-left', 'label' => 'top_left'],
            ['value' => 'top-center', 'label' => 'top_center'],
            ['value' => 'top-right', 'label' => 'top_right'],
            ['value' => 'center-left', 'label' => 'center_left'],
            ['value' => 'center-center', 'label' => 'center_center'],
            ['value' => 'center-right', 'label' => 'center_right'],
            ['value' => 'bottom-left', 'label' => 'bottom_left'],
            ['value' => 'bottom-center', 'label' => 'bottom_center'],
            ['value' => 'bottom-right', 'label' => 'bottom_right']
        ]
    ],
    'image_effect' => [
        'label' => 'image_effect',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'none'],
            ['value' => 'parallax', 'label' => 'parallax'],
            ['value' => 'fixed', 'label' => 'fixed']
        ]
    ],
    'color' => [
        'label' => 'color',
        'initValue' => '',
        'type' => 'zaa-color',
    ],
    'text_color' => [
        'label' => 'text_color',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'default'],
            ['value' => 'light', 'label' => 'light'],
            ['value' => 'dark', 'label' => 'dark'],
        ]
    ],
    'inverse_color' => [
        'label' => 'inverse_color',
        'initValue' => '',
        'type' => 'zaa-checkbox',
    ],
    'blend_mode' => [
        'label' => 'blend_mode',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'normal'],
            ['value' => 'multiply', 'label' => 'multiply'],
            ['value' => 'screen', 'label' => 'screen'],
            ['value' => 'overlay', 'label' => 'overlay'],
            ['value' => 'darken', 'label' => 'darken'],
            ['value' => 'lighten', 'label' => 'lighten'],
            ['value' => 'color_dodge', 'label' => 'color_dodge'],
            ['value' => 'color_burn', 'label' => 'color_burn'],
            ['value' => 'hard_light', 'label' => 'hard_light'],
            ['value' => 'soft_light', 'label' => 'soft_light'],
            ['value' => 'difference', 'label' => 'difference'],
            ['value' => 'exclusion', 'label' => 'exclusion'],
            ['value' => 'hue', 'label' => 'hue'],
            ['value' => 'saturation', 'label' => 'saturation'],
            ['value' => 'color', 'label' => 'color'],
            ['value' => 'luminosity', 'label' => 'luminosity']
        ]
    ],
    'width' => [
        'label' => 'width',
        'initValue' => '',
        'type' => 'zaa-number',
        'placeholder' => 'auto'
    ],
    'height' => [
        'label' => 'height',
        'initValue' => '',
        'type' => 'zaa-number',
        'placeholder' => 'auto'
    ],
    'box_shadow' => [
        'label' => 'box_shadow',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'none'],
            ['value' => 'small', 'label' => 'small'],
            ['value' => 'medium', 'label' => 'medium'],
            ['value' => 'large', 'label' => 'large'],
            ['value' => 'xlarge', 'label' => 'x_large']
        ]
    ],
    'align' => [
        'label' => 'align',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'inherit'],
            ['value' => 'left', 'label' => 'left'],
            ['value' => 'center', 'label' => 'center'],
            ['value' => 'right', 'label' => 'right']
        ]
    ],
    'breakpoint' => [
        'label' => 'breakpoint',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'always'],
            ['value' => 's', 'label' => 'small_phone_landscape'],
            ['value' => 'm', 'label' => 'medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'large_desktop'],
            ['value' => 'xl', 'label' => 'x_large_large_screens']
        ]
    ],
    'breakpoint_no_always' => [
        'label' => 'breakpoint',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => 's', 'label' => 'small_phone_landscape'],
            ['value' => 'm', 'label' => 'medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'large_desktop'],
            ['value' => 'xl', 'label' => 'x_large_large_screens']
        ]
    ],
    'padding' => [
        'label' => 'padding',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'default'],
            ['value' => 'xsmall', 'label' => 'x_small'],
            ['value' => 'small', 'label' => 'small'],
            ['value' => 'large', 'label' => 'large'],
            ['value' => 'xlarge', 'label' => 'x_large'],
            ['value' => 'none', 'label' => 'none']
        ]
    ],
    'padding_remove_top' => [
        'label' => 'padding_remove_top',
        'initValue' => '',
        'type' => 'zaa-checkbox'
    ],
    'padding_remove_bottom' => [
        'label' => 'padding_remove_bottom',
        'initValue' => '',
        'type' => 'zaa-checkbox'
    ],
    'text_align' => [
        'label' => 'text_align',
        'description' => 'text_align',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'inherit'],
            ['value' => 'left', 'label' => 'left'],
            ['value' => 'center', 'label' => 'center'],
            ['value' => 'right', 'label' => 'right']
        ]
    ],
    'text_align_breakpoint' => [
        'label' => 'text_align_breakpoint',
        'description' => 'text_align_breakpoint',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'always'],
            ['value' => 's', 'label' => 'small_phone_landscape'],
            ['value' => 'm', 'label' => 'medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'large_desktop'],
            ['value' => 'xl', 'label' => 'x_large_large_screens']
        ]
    ],
    'text_align_fallback' => [
        'label' => 'text_align_fallback',
        'description' => 'text_align_fallback',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'inherit'],
            ['value' => 'left', 'label' => 'left'],
            ['value' => 'center', 'label' => 'center'],
            ['value' => 'right', 'label' => 'right']
        ]
    ],
    'text_align_justify' => [
        'var' => 'text_align',
        'label' => 'text_align',
        'description' => 'text_align',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'inherit'],
            ['value' => 'left', 'label' => 'left'],
            ['value' => 'center', 'label' => 'center'],
            ['value' => 'right', 'label' => 'right'],
            ['value' => 'justify', 'label' => 'justify']
        ]
    ],
    'text_align_justify_fallback' => [
        'var' => 'text_align_fallback',
        'label' => 'text_align_fallback',
        'description' => 'text_align_fallback',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'inherit'],
            ['value' => 'left', 'label' => 'left'],
            ['value' => 'center', 'label' => 'center'],
            ['value' => 'right', 'label' => 'right'],
            ['value' => 'justify', 'label' => 'justify']
        ]
    ],
    'maxwidth' => [
        'label' => 'maxwidth',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'none'],
            ['value' => 'small', 'label' => 'small'],
            ['value' => 'medium', 'label' => 'medium'],
            ['value' => 'large', 'label' => 'large'],
            ['value' => 'xlarge', 'label' => 'x_large'],
            ['value' => 'xxlarge', 'label' => 'xx_large']
        ]
    ],
    'maxwidth_no_xxl' => [
        'label' => 'maxwidth',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'none'],
            ['value' => 'small', 'label' => 'small'],
            ['value' => 'medium', 'label' => 'medium'],
            ['value' => 'large', 'label' => 'large'],
            ['value' => 'xlarge', 'label' => 'x_large']
        ]
    ],
    'maxwidth_align' => [
        'label' => 'maxwidth_align',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'left'],
            ['value' => 'center', 'label' => 'center'],
            ['value' => 'right', 'label' => 'right']
        ]
    ],
    'maxwidth_breakpoint' => [
        'label' => 'maxwidth_breakpoint',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'always'],
            ['value' => 's', 'label' => 'small_phone_landscape'],
            ['value' => 'm', 'label' => 'medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'large_desktop'],
            ['value' => 'xl', 'label' => 'x_large_large_screens']
        ]
    ],
    'margin_no_x_large_remove' => [
        'label' => 'margin',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'none'],
            ['value' => 'small', 'label' => 'small'],
            ['value' => 'medium', 'label' => 'medium'],
            ['value' => 'large', 'label' => 'large']
        ]
    ],
    'margin' => [
        'label' => 'margin',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'keep_existing'],
            ['value' => 'small', 'label' => 'small'],
            ['value' => 'default', 'label' => 'default'],
            ['value' => 'medium', 'label' => 'medium'],
            ['value' => 'xlarge', 'label' => 'x_large'],
            ['value' => 'remove-vertical', 'label' => 'none']
        ]
    ],
    'margin_remove_top' => [
        'label' =>  'margin_remove_top',
        'initValue' => '',
        'type' => 'zaa-checkbox'
    ],
    'margin_remove_bottom' => [
        'label' =>  'margin_remove_bottom',
        'initValue' => '',
        'type' => 'zaa-checkbox'
    ],
    'visibility' => [
        'label' => 'visibility',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'always'],
            ['value' => 's', 'label' => 'small_phone_landscape'],
            ['value' => 'm', 'label' => 'medium_tablet_landscape'],
            ['value' => 'l', 'label' => 'large_desktop'],
            ['value' => 'xl', 'label' => 'x_large_large_screens']
        ]
    ],
    'animation' => [
        'label' => 'animation',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'inherit'],
            ['value' => 'none', 'label' => 'none'],
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
            ['value' => 'slide-right', 'label' => 'slide_right'],
            ['value' => 'parallax', 'label' => 'parallax'],
        ]
    ],
    'transition_width_none' => [
        'label' => 'transition',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
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
    'transition' => [
        'label' => 'transition',
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
    'id' => [
        'label' => 'id',
        'type' => 'zaa-text'
    ],
    'class' => [
        'label' => 'class',
        'type' => 'zaa-text'
    ],
    'name' => [
        'label' => 'name',
        'type' => 'zaa-text'
    ],
    'css' => [
        'label' => 'css',
        'type' => 'zaa-textarea'
    ],
    'js' => [
        'label' => 'js',
        'type' => 'zaa-textarea'
    ]
];