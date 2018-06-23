<?php

namespace trk\uikit\blocks;

use trk\uikit\Module;
use trk\uikit\BaseUikitBlock;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\LayoutGroup;

/**
 * Section Layout
 *
 * @author İskender TOTOĞLU <basil@nadar.io>
 */
final class LayoutSectionBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $isContainer = true;

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('block.title.section');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'aspect_ratio';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'style', 'label' => Module::t('block.label.style'), 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'muted', 'label' => Module::t('block.value.muted')],
                    ['value' => 'primary', 'label' => Module::t('block.value.primary')],
                    ['value' => 'secondary', 'label' => Module::t('block.value.secondary')]
                ]],
                ['var' => 'overlap', 'label' => Module::t('block.label.overlap'), 'type' => self::TYPE_CHECKBOX],
                // Image
                ['var' => 'image', 'label' => Module::t('block.label.image'), 'type' => self::TYPE_LINK, 'options' => ['no_filter' => false]],
                // Video
                ['var' => 'video', 'label' => Module::t('block.label.video'), 'type' => self::TYPE_LINK, 'options' => ['no_filter' => false]],
                // Title
                ['var' => 'title', 'label' => Module::t('block.label.title'), 'type' => self::TYPE_TEXT],
                ['var' => 'title_position', 'label' => Module::t('block.label.position'), 'initValue' => 'top-left', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => 'left-top', 'label' => Module::t('block.value.left_top')],
                    ['value' => 'left-center', 'label' => Module::t('block.value.left_center')],
                    ['value' => 'left-bottom', 'label' => Module::t('block.value.left_bottom')],
                    ['value' => 'right-top', 'label' => Module::t('block.value.right_top')],
                    ['value' => 'right-center', 'label' => Module::t('block.value.right_center')],
                    ['value' => 'right-bottom', 'label' => Module::t('block.value.right_bottom')]
                ]],
                ['var' => 'title_rotation', 'label' => Module::t('block.label.rotation'), 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => 'left', 'label' => Module::t('block.value.left')],
                    ['value' => 'right', 'label' => Module::t('block.value.right')]
                ]],
                Module::config('breakpoint', ['var' => 'title_breakpoint'])
            ],
            'cfgs' => [
                // Image
                Module::config('width', ['var' => 'image_width', 'label' => 'block.label.image_width']),
                Module::config('height', ['var' => 'image_height', 'label' => 'block.label.image_height']),
                Module::config('image_size'),
                Module::config('image_position'),
                Module::config('image_effect'),
                Module::config('parallax_x_start', ['var' => 'image_parallax_bgx_start']),
                Module::config('parallax_x_end', ['var' => 'image_parallax_bgx_end']),
                Module::config('parallax_y_start', ['var' => 'image_parallax_bgy_start']),
                Module::config('parallax_y_end', ['var' => 'image_parallax_bgy_end']),
                Module::config('breakpoint', ['var' => 'image_parallax_breakpoint', 'label' => 'block.label.image_parallax_breakpoint']),
                Module::config('image_visibility', ['var' => 'image_visibility', 'label' => 'block.label.image_visibility']),
                // Video
                Module::config('width', ['var' => 'video_width', 'label' => 'block.label.video_width']),
                Module::config('height', ['var' => 'video_height', 'label' => 'block.label.video_height']),
                Module::config('color', ['var' => 'media_background', 'label' => 'block.label.background_color']),
                Module::config('blend_mode', ['var' => 'media_blend_mode']),
                Module::config('color', ['var' => 'media_overlay', 'label' => 'block.label.overlay_color']),
                // Others
                ['var' => 'preserve_color', 'label' => Module::t('block.label.preserve_color'), 'type' => self::TYPE_CHECKBOX],
                Module::config('text_color'),
                ['var' => 'width', 'label' => Module::t('block.label.max_width'), 'type' => self::TYPE_SELECT, 'initValue' => 'default', 'options' => [
                    ['value' => 'default', 'label' => Module::t('block.value.default')],
                    ['value' => 'small', 'label' => Module::t('block.value.small')],
                    ['value' => 'large', 'label' => Module::t('block.value.large')],
                    ['value' => 'expand', 'label' => Module::t('block.value.expand')],
                    ['value' => '', 'label' => Module::t('block.value.none')]
                ]],
                ['var' => 'height', 'label' => Module::t('block.label.height'), 'type' => self::TYPE_SELECT, 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.none')],
                    ['value' => 'percent', 'label' => Module::t('block.value.viewport')],
                    ['value' => 'large', 'label' => Module::t('block.value.viewport_minus_20')],
                    ['value' => 'section', 'label' => Module::t('block.value.viewport_minus_following')],
                    ['value' => 'expand', 'label' => Module::t('block.value.expand')]
                ]],
                ['var' => 'vertical_align', 'label' => Module::t('block.label.vertical_alignment'), 'type' => self::TYPE_SELECT, 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.top')],
                    ['value' => 'middle', 'label' => Module::t('block.value.middle')],
                    ['value' => 'bottom', 'label' => Module::t('block.value.bottom')]
                ]],
                Module::config('padding'),
                Module::config('padding_remove_top'),
                Module::config('padding_remove_bottom'),
                ['var' => 'header_transparent', 'label' => Module::t('block.label.transparent_header'), 'type' => self::TYPE_SELECT, 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.none')],
                    ['value' => 'light', 'label' => Module::t('block.value.light')],
                    ['value' => 'dark', 'label' => Module::t('block.value.dark')]
                ]],
                ['var' => 'header_transparent_noplaceholder', 'label' =>  Module::t('block.label.pull_content_beneath_navbar'), 'type' => self::TYPE_CHECKBOX],
                Module::config('animation'),
                ['var' => 'animation_delay', 'label' =>  Module::t('block.label.animation_delay'), 'type' => self::TYPE_CHECKBOX],
                // Advanced
                Module::config('name'),
                Module::config('id'),
                Module::config('class'),
                Module::config('css')
            ],
            'placeholders' => [
                [
                    ['var' => 'main', 'cols' => $this->getExtraValue('main')]
                ]
            ],
        ];
    }

    public function extraVars()
    {
        $this->extraValues['main'] = 12;
        $this->extraValues['image'] = BlockHelper::linkObject($this->getVarValue('image'));
        $this->extraValues['video'] = BlockHelper::linkObject($this->getVarValue('video'));
        return parent::extraVars();
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