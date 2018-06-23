<?php

namespace trk\uikit\blocks;

use trk\uikit\Module;
use trk\uikit\BaseUikitBlock;
use luya\cms\frontend\blockgroups\LayoutGroup;
use luya\cms\helpers\BlockHelper;
use trk\uikit\Uikit;

/**
 * Fixed Inner 2-1-2 Layout
 *
 * @author İskender TOTOĞLU <basil@nadar.io>
 */
final class LayoutUikitBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $isContainer = true;

    /**
     * @var array $widths of row columns
     */
    public $layouts = [
        'whole' => [
            'label' => 'block.value.whole',
            'cols' => ['first' => 12],
            'widths' => [['1-1']]
        ],
        'halves' => [
            'label' => 'block.value.halves',
            'cols' => ['first' => 6, 'second' => 6],
            'widths' => [['expand'], ['expand']]
        ],
        'thirds' => [
            'label' => 'block.value.thirds',
            'cols' => ['first' => 4, 'second' => 4, 'third' => 4],
            'widths' => [['expand'], ['expand'], ['expand']]
        ],
        'quarters' => [
            'label' => 'block.value.quarters',
            'cols' => ['first' => 3, 'second' => 3, 'third' => 3, 'fourth' => 3],
            'widths' => [['fixed', '1-2'], ['fixed', '1-2'], ['fixed', '1-2'], ['fixed', '1-2']]
        ],
        'thirds-2-1' => [
            'label' => 'block.value.thirds_2_1',
            'cols' => ['first' => 7, 'second' => 5],
            'widths' => [['2-3'], ['expand']]
        ],
        'thirds-1-2' => [
            'label' => 'block.value.thirds_1_2',
            'cols' => ['first' => 5, 'second' => 7],
            'widths' => [['expand'], ['2-3']]
        ],
        'quarters-3-1' => [
            'label' => 'block.value.quarters_3_1',
            'cols' => ['first' => 8, 'second' => 4],
            'widths' => [['3-4'], ['expand']]
        ],
        'quarters-1-3' => [
            'label' => 'block.value.quarters_1_3',
            'cols' => ['first' => 4, 'second' => 8],
            'widths' => [['expand'], ['3-4']]
        ],
        'quarters-2-1-1' => [
            'label' => 'block.value.quarters_2_1_1',
            'cols' => ['first' => 6, 'second' => 3, 'third' => 3],
            'widths' => [['1-2'], ['expand'], ['expand']]
        ],
        'quarters-1-1-2' => [
            'label' => 'block.value.quarters_1_1_2',
            'cols' => ['first' => 3, 'second' => 3, 'third' => 6],
            'widths' => [['expand'], ['expand'], ['1-2']]
        ],
        'quarters-1-2-1' => [
            'label' => 'block.value.quarters_1_2_1',
            'cols' => ['first' => 3, 'second' => 6, 'third' => 3],
            'widths' => [['expand'], ['1-2'], ['expand']]
        ],
        'fixed-left' => [
            'label' => 'block.value.fixed_left',
            'cols' => ['first' => 4, 'second' => 8],
            'widths' => [['large'], ['expand']]
        ],
        'fixed-right' => [
            'label' => 'block.value.fixed_right',
            'cols' => ['first' => 8, 'second' => 4],
            'widths' => [['expand'], ['fixed']]
        ],
        'fixed-inner' => [
            'label' => 'block.value.fixed_inner',
            'cols' => ['first' => 4, 'second' => 4, 'third' => 4],
            'widths' => [['expand'], ['fixed'], ['expand']]
        ],
        'fixed-outer' => [
            'label' => 'block.value.fixed_outer',
            'cols' => ['first' => 4, 'second' => 4, 'third' => 4],
            'widths' => [['fixed'], ['expand'], ['fixed']]
        ]
    ];

    public $defaultLayout = 'halves';

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('block.label.layout');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'view_column';
    }

    /**
     * Layout select list
     *
     * @return array
     */
    public function getLayouts() {
        $var = [
            'var' => 'layout',
            'label' => Module::t('block.label.layout'),
            'initValue' => $this->defaultLayout,
            'type' => self::TYPE_SELECT,
            'options' => []
        ];
        foreach ($this->layouts as $name => $layout) {
            $var['options'][] = ['value' => $name, 'label' => Module::t($layout['label'])];
        }
        return $var;
    }

    /**
     * Get selected layout name
     *
     * @return mixed
     */
    public function getLayoutName() {
        return $this->getVarValue('layout', $this->defaultLayout);
    }

    /**
     * Return selected layout data
     *
     * @return mixed
     */
    public function getLayout() {
        $name = $this->getLayoutName();
        $layout = $this->layouts[$name];
        $layout['name'] = $name;
        return $layout;
    }

    /**
     * Return placeholders data
     *
     * @return array
     */
    public function getPlaceholders() {
        $layout = $this->getLayout();
        $placeholders = [
            'placeholders' => [],
            'extraValues' => []
        ];
        foreach ($layout['cols'] as $name => $width) {
            $placeholders['placeholders'][] = [
                'var' => $name,
                'cols' => $width
            ];
            $placeholders['extraValues'][$name] = $width;
        }

        return $placeholders;
    }

    /**
     * Return layout configs
     *
     * @return array
     */
    public function getConfigs() {
        $configs = [];
        $layout = $this->getLayout();

        foreach ($layout['cols'] as $name => $width) {
            // Style
            $configs[] = [
                'var' => $name . 'style', 'label' => self::t('block.label.style', $name), 'initValue' => '', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.none')],
                    ['value' => 'default', 'label' => Module::t('block.value.default')],
                    ['value' => 'muted', 'label' => Module::t('block.value.muted')],
                    ['value' => 'primary', 'label' => Module::t('block.value.primary')],
                    ['value' => 'secondary', 'label' => Module::t('block.value.secondary')]
                ]
            ];
            // Image
            $configs[] = [
                'var' => $name . 'image',
                'label' => self::t('block.label.image', $name),
                'type' => self::TYPE_IMAGEUPLOAD,
                'options' => ['no_filter' => false]
            ];
            // Image Width
            $configs[] = Module::config('width', ['var' => $name . 'image_width']);
            // Image Height
            $configs[] = Module::config('height', ['var' => $name . 'image_height']);
            // Image Size
            $configs[] = Module::config('image_size', ['var' => $name . 'image_size']);
            // Image Position
            $configs[] = Module::config('image_position', ['var' => $name . 'image_position', 'initValue' => 'center-center']);
            // Image Effect
            $configs[] = Module::config('image_effect', [
                'var' => $name . 'image_effect',
                'initValue' => '',
                'options' => [
                    ['value' => '', 'label' => Module::t('block.value.none')],
                    ['value' => 'parallax', 'label' => Module::t('block.value.parallax')],
                    ['value' => 'fixed', 'label' => Module::t('block.value.fixed')]
                ]
            ]);
            // Parallax Settings
            $configs[] = Module::config('parallax_x_start', ['var' => $name . 'image_parallax_bgx_start']);
            $configs[] = Module::config('parallax_x_end', ['var' => $name . 'image_parallax_bgx_end']);
            $configs[] = Module::config('parallax_y_start', ['var' => $name . 'image_parallax_bgy_start']);
            $configs[] = Module::config('parallax_y_end', ['var' => $name . 'image_parallax_bgy_end']);
            $configs[] = Module::config('breakpoint', ['var' => $name . 'image_parallax_breakpoint']);
            // Breakpoint
            $configs[] = Module::config('breakpoint', ['var' => $name . 'image_visibility']);
            // Media Background
            $configs[] = Module::config('color', ['var' => $name . 'media_background', 'label' => 'block.label.background_color']);
            // Media Blend Mode
            $configs[] = Module::config('blend_mode', ['var' => $name . 'media_blend_mode', 'label' => self::t('block.label.blend_mode', $name)]);
            // Overlay Color
            $configs[] = Module::config('color', ['var' => $name . 'media_overlay', 'label' => self::t('block.label.overlay_color', $name)]);
            // Preserve Color
            $configs[] = [
                'var' => $name . 'preserve_color',
                'label' => self::t('block.label.preserve_color', $name),
                'type' => self::TYPE_CHECKBOX
            ];
            // Text Color
            $configs[] = [
                'var' => $name . 'text_color',
                'label' => self::t('block.label.text_color', $name),
                'initValue' => '',
                'type' => self::TYPE_SELECT,
                'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'light', 'label' => Module::t('block.value.light')],
                    ['value' => 'dark', 'label' => Module::t('block.value.dark')]
                ]
            ];
            // Padding
            $configs[] = Module::config('padding', ['var' => $name . 'padding', 'label' => self::t('block.label.padding', $name)]);
            // Custom CSS
            $configs[] = Module::config('css', ['var' => $name . 'css', 'label' => self::t('block.label.css', $name)]);
        }

        return $configs;
    }

    /**
     * Get configs with default values
     *
     * config_key => config_value or defualt_value
     *
     * @return array
     */
    public function configs() {
        $blockConfigs = $this->config();
        $vars = Uikit::element('vars', $blockConfigs, []);
        $cfgs = Uikit::element('cfgs', $blockConfigs, []);

        $configs = [];
        if(count($vars)) {
            foreach ($vars as $i => $var) {
                $configs[$var['var']] = $this->getVarValue($var['var'], Uikit::element('initValue', $var, ''));
            }
        }
        if(count($cfgs)) {
            foreach ($cfgs as $i => $cfg) {
                $configs[$cfg['var']] = $this->getVarValue($cfg['var'], Uikit::element('initValue', $cfg, ''));
            }
        }

        $configs = Uikit::configs($configs);

        return $configs;
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        $placeholders = $this->getPlaceholders();
        return [
            'vars' => [
                $this->getLayouts(),
                ['var' => 'fixed_width', 'label' => Module::t('block.label.fixed_width'), 'initValue' => 'large', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => 'small', 'label' => Module::t('block.value.small')],
                    ['value' => 'medium', 'label' => Module::t('block.value.medium')],
                    ['value' => 'large', 'label' => Module::t('block.value.large')],
                    ['value' => 'xlarge', 'label' => Module::t('block.value.x_large')],
                    ['value' => 'xxlarge', 'label' => Module::t('block.value.xx_large')],
                    ['value' => 'auto', 'label' => Module::t('block.value.auto')],
                ]],
                ['var' => 'gutter', 'label' => Module::t('block.label.gutter'), 'initValue' => '', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => 'small', 'label' => Module::t('block.value.small')],
                    ['value' => 'medium', 'label' => Module::t('block.value.medium')],
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'large', 'label' => Module::t('block.value.large')],
                    ['value' => 'collapse', 'label' => Module::t('block.value.collapse')],
                ]],
                ['var' => 'divider', 'label' => Module::t('block.label.grid_display_dividers'), 'initValue' => '', 'type' => self::TYPE_CHECKBOX],
                ['var' => 'width', 'label' => Module::t('block.label.max_width'), 'initValue' => '', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => 'default', 'label' => Module::t('block.value.default')],
                    ['value' => 'small', 'label' => Module::t('block.value.small')],
                    ['value' => 'large', 'label' => Module::t('block.value.large')],
                    ['value' => 'expand', 'label' => Module::t('block.value.expand')],
                    ['value' => 'none', 'label' => Module::t('block.value.none')],
                ]],
                Module::config('margin'),
                Module::config('margin_remove_top'),
                Module::config('margin_remove_bottom'),
                ['var' => 'vertical_align', 'label' => Module::t('block.label.vertical_alignment'), 'initValue' => '', 'type' => self::TYPE_CHECKBOX],
                ['var' => 'match', 'label' => Module::t('block.label.match_height'), 'initValue' => '', 'type' => self::TYPE_CHECKBOX],
                Module::config('breakpoint', ['initValue' => 'm']),
                ['var' => 'order_last', 'label' => Module::t('block.label.order_last'), 'initValue' => '', 'type' => self::TYPE_CHECKBOX],
                Module::config('id'),
                Module::config('class')
            ],
            'cfgs' => $this->getConfigs(),
            'placeholders' => [
                $placeholders['placeholders']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        $layout = $this->getLayout();
        foreach ($layout['cols'] as $name => $width) {
            $this->extraValues[$name . 'image'] = BlockHelper::imageUpload($this->getCfgValue($name . 'image'), false, true);
        }

        $placeholders = $this->getPlaceholders();
        $this->extraValues = array_merge($this->extraValues, $placeholders['extraValues']);
        return parent::extraVars();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function frontend(array $params = array())
    {
        $layout = $this->getLayout();

        $i = 0;
        $nbItems = count($layout['cols']);
        $configs = $this->configs();
        $configs['columns'] = $nbItems;
        $items = [];
        foreach ($layout['cols'] as $name => $col) {
            $index = $i++;
            $items[$name]['index'] = $index;
            $items[$name]['name'] = $name;
            $items[$name]['hasNext'] = $index == $nbItems ? false : true;
            $items[$name]['widths'] = Uikit::element($index, $layout['widths'], ['expand']);
            foreach ($configs as $var => $value) {
                if(strpos($var, $name) === FALSE) continue;
                $rename = str_replace($name, '', $var);
                $items[$name][$rename] = $value;
                unset($configs[$var]);
            }
            $items[$name]['content'] = $this->getPlaceholderValue($name);
            $items[$name] = Uikit::configs($items[$name]);
        }
        $configs = Uikit::configs($configs);
        $params = [
            'configs' => $configs,
            'items' => $items
        ];

        return parent::frontend($params);
    }

    /**
     * Translations for Columns
     *
     * @param string $message
     * @param string $column
     * @return string
     */
    public static function t($message, $column = "") {
        return Module::t($message) . ' (' . $column . ')';
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return LayoutGroup::class;
    }
}