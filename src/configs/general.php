<?php

/**
 * Template :
 * 'content' => [
 *      'id' => '',
 *      'var' => 'content',
 *      'label' => 'block.label.content',
 *      'type' => 'zaa-wysiwyg',
 *      'placeholder' => '',
 *      'options' => [],
 *      'initvalue' => ''
 * ]
 */
return [
    'viewport_height' => [
        'label' => 'block.label.height',
        'type' => 'zaa-select',
        'initValue' => '',
        'options' => [
            ['value' => '', 'label' => 'block.value.auto'],
            ['value' => 'percent', 'label' => 'block.value.viewport'],
            ['value' => 'large', 'label' => 'block.value.viewport_minus_20'],
            ['value' => 'section', 'label' => 'block.value.viewport_minus_following'],
        ]
    ],
    'show_title' => [
        'label' => 'block.label.show_title',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'show_meta' => [
        'label' => 'block.label.show_meta',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'show_content' => [
        'label' => 'block.label.show_content',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'show_link' => [
        'label' => 'block.label.show_link',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'show_thumbnail' => [
        'label' => 'block.label.show_thumbnail',
        'description' => 'block.description.show_thumbnail',
        'initValue' => true,
        'type' => 'zaa-checkbox'
    ],
    'title' => [
        'label' => 'block.label.title',
        'type' => 'zaa-text',
        'initvalue' => ''
    ],
    'meta' => [
        'label' => 'block.label.meta',
        'type' => 'zaa-text',
        'initvalue' => ''
    ],
    'content' => [
        'label' => 'block.label.content',
        'type' => 'zaa-wysiwyg',
        'initvalue' => ''
    ],
    'image' => [
        'label' => 'block.label.image',
        'type' => 'zaa-file-upload',
        'initValue' => '',
        'options' => [
            'no_filter' => false
        ]
    ],
    'image_alt' => [
        'label' => 'block.label.image_alt',
        'type' => 'zaa-text',
        'initvalue' => ''
    ],
    'image_link' => [
        'label' => 'block.label.image',
        'type' => 'zaa-link',
        'options' => [
            'no_filter' => false
        ]
    ],
    'video' => [
        'label' => 'block.label.video',
        'type' => 'zaa-link',
        'options' => [
            'no_filter' => false
        ]
    ],
    'link' => [
        'label' => 'block.label.link',
        'type' => 'zaa-link',
        'options' => [
            'no_filter' => false
        ]
    ],
    'image_size' => [
        'label' => 'block.label.image_size',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'block.value.auto'],
            ['value' => 'cover', 'label' => 'block.value.cover'],
            ['value' => 'contain', 'label' => 'block.value.contain']
        ]
    ],
    'image_position' => [
        'label' => 'block.label.image_position',
        'initValue' => 'center-center',
        'type' => 'zaa-select',
        'options' => [
            ['value' => 'top-left', 'label' => 'block.value.top_left'],
            ['value' => 'top-center', 'label' => 'block.value.top_center'],
            ['value' => 'top-right', 'label' => 'block.value.top_right'],
            ['value' => 'center-left', 'label' => 'block.value.center_left'],
            ['value' => 'center-center', 'label' => 'block.value.center_center'],
            ['value' => 'center-right', 'label' => 'block.value.center_right'],
            ['value' => 'bottom-left', 'label' => 'block.value.bottom_left'],
            ['value' => 'bottom-center', 'label' => 'block.value.bottom_center'],
            ['value' => 'bottom-right', 'label' => 'block.value.bottom_right']
        ]
    ],
    'image_effect' => [
        'label' => 'block.label.image_effect',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'block.value.none'],
            ['value' => 'parallax', 'label' => 'block.value.parallax'],
            ['value' => 'fixed', 'label' => 'block.value.fixed']
        ]
    ],
    'color' => [
        'label' => 'block.label.color',
        'type' => 'zaa-color',
    ],
    'text_color' => [
        'label' => 'block.label.text_color',
        'type' => 'zaa-select',
        'initValue' => '',
        'options' => [
            ['value' => '', 'label' => 'block.value.default'],
            ['value' => 'light', 'label' => 'block.value.light'],
            ['value' => 'dark', 'label' => 'block.value.dark'],
        ]
    ],
    'inverse_color' => [
        'label' => 'block.label.inverse_color',
        'type' => 'zaa-checkbox',
    ],
    'blend_mode' => [
        'label' => 'block.label.blend_mode',
        'type' => 'zaa-select',
        'initValue' => '',
        'options' => [
            ['value' => '', 'label' => 'block.value.normal'],
            ['value' => 'multiply', 'label' => 'block.value.multiply'],
            ['value' => 'screen', 'label' => 'block.value.screen'],
            ['value' => 'overlay', 'label' => 'block.value.overlay'],
            ['value' => 'darken', 'label' => 'block.value.darken'],
            ['value' => 'lighten', 'label' => 'block.value.lighten'],
            ['value' => 'color_dodge', 'label' => 'block.value.color_dodge'],
            ['value' => 'color_burn', 'label' => 'block.value.color_burn'],
            ['value' => 'hard_light', 'label' => 'block.value.hard_light'],
            ['value' => 'soft_light', 'label' => 'block.value.soft_light'],
            ['value' => 'difference', 'label' => 'block.value.difference'],
            ['value' => 'exclusion', 'label' => 'block.value.exclusion'],
            ['value' => 'hue', 'label' => 'block.value.hue'],
            ['value' => 'saturation', 'label' => 'block.value.saturation'],
            ['value' => 'color', 'label' => 'block.value.color'],
            ['value' => 'luminosity', 'label' => 'block.value.luminosity']
        ]
    ],
    'width' => [
        'label' => 'block.label.width',
        'type' => 'zaa-number',
        'initValue' => '',
        'placeholder' => 'block.label.auto'
    ],
    'height' => [
        'label' => 'block.label.height',
        'type' => 'zaa-number',
        'initValue' => '',
        'placeholder' => 'block.label.auto'
    ],
    'box_shadow' => [
        'label' => 'block.label.box_shadow',
        'type' => 'zaa-select',
        'initvalue' => '',
        'options' => [
            ['value' => '', 'label' => 'block.value.none'],
            ['value' => 'small', 'label' => 'block.value.small'],
            ['value' => 'medium', 'label' => 'block.value.medium'],
            ['value' => 'large', 'label' => 'block.value.large'],
            ['value' => 'xlarge', 'label' => 'block.value.x_large']
        ]
    ],
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
    'padding' => [
        'label' => 'block.label.padding',
        'initValue' => '',
        'type' => 'zaa-select',
        'options' => [
            ['value' => '', 'label' => 'block.value.default'],
            ['value' => 'xsmall', 'label' => 'block.value.x_small'],
            ['value' => 'small', 'label' => 'block.value.small'],
            ['value' => 'large', 'label' => 'block.value.large'],
            ['value' => 'xlarge', 'label' => 'block.value.x_large'],
            ['value' => 'none', 'label' => 'block.value.none']
        ]
    ],
    'padding_remove_top' => [
        'label' => 'block.label.padding_remove_top',
        'initValue' => '',
        'type' => 'zaa-checkbox'
    ],
    'padding_remove_bottom' => [
        'label' => 'block.label.padding_remove_bottom',
        'initValue' => '',
        'type' => 'zaa-checkbox'
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