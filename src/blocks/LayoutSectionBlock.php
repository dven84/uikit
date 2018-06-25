<?php

namespace trk\uikit\blocks;

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
        return $this->t('block.title.section');
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
                ['var' => 'style', 'label' => $this->t('block.label.style'), 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'muted', 'label' => $this->t('block.value.muted')],
                    ['value' => 'primary', 'label' => $this->t('block.value.primary')],
                    ['value' => 'secondary', 'label' => $this->t('block.value.secondary')]
                ]],
                ['var' => 'overlap', 'label' => $this->t('block.label.overlap'), 'type' => self::TYPE_CHECKBOX],
                // Image
                ['var' => 'image', 'label' => $this->t('block.label.image'), 'type' => self::TYPE_LINK, 'options' => ['no_filter' => false]],
                // Video
                ['var' => 'video', 'label' => $this->t('block.label.video'), 'type' => self::TYPE_LINK, 'options' => ['no_filter' => false]],
                // Title
                ['var' => 'title', 'label' => $this->t('block.label.title'), 'type' => self::TYPE_TEXT],
                ['var' => 'title_position', 'label' => $this->t('block.label.position'), 'initValue' => 'top-left', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => 'left-top', 'label' => $this->t('block.value.left_top')],
                    ['value' => 'left-center', 'label' => $this->t('block.value.left_center')],
                    ['value' => 'left-bottom', 'label' => $this->t('block.value.left_bottom')],
                    ['value' => 'right-top', 'label' => $this->t('block.value.right_top')],
                    ['value' => 'right-center', 'label' => $this->t('block.value.right_center')],
                    ['value' => 'right-bottom', 'label' => $this->t('block.value.right_bottom')]
                ]],
                ['var' => 'title_rotation', 'label' => $this->t('block.label.rotation'), 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => 'left', 'label' => $this->t('block.value.left')],
                    ['value' => 'right', 'label' => $this->t('block.value.right')]
                ]],
                $this->getConfig('breakpoint', ['var' => 'title_breakpoint'])
            ],
            'cfgs' => [
                // Image
                $this->getConfig('width', ['var' => 'image_width', 'label' => 'block.label.image_width']),
                $this->getConfig('height', ['var' => 'image_height', 'label' => 'block.label.image_height']),
                $this->getConfig('image_size'),
                $this->getConfig('image_position'),
                $this->getConfig('image_effect'),
                $this->getConfig('parallax_x_start', ['var' => 'image_parallax_bgx_start']),
                $this->getConfig('parallax_x_end', ['var' => 'image_parallax_bgx_end']),
                $this->getConfig('parallax_y_start', ['var' => 'image_parallax_bgy_start']),
                $this->getConfig('parallax_y_end', ['var' => 'image_parallax_bgy_end']),
                $this->getConfig('breakpoint', ['var' => 'image_parallax_breakpoint', 'label' => 'block.label.image_parallax_breakpoint']),
                $this->getConfig('image_visibility', ['var' => 'image_visibility', 'label' => 'block.label.image_visibility']),
                // Video
                $this->getConfig('width', ['var' => 'video_width', 'label' => 'block.label.video_width']),
                $this->getConfig('height', ['var' => 'video_height', 'label' => 'block.label.video_height']),
                $this->getConfig('color', ['var' => 'media_background', 'label' => 'block.label.background_color']),
                $this->getConfig('blend_mode', ['var' => 'media_blend_mode']),
                $this->getConfig('color', ['var' => 'media_overlay', 'label' => 'block.label.overlay_color']),
                // Others
                ['var' => 'preserve_color', 'label' => $this->t('block.label.preserve_color'), 'type' => self::TYPE_CHECKBOX],
                $this->getConfig('text_color'),
                ['var' => 'width', 'label' => $this->t('block.label.max_width'), 'type' => self::TYPE_SELECT, 'initValue' => 'default', 'options' => [
                    ['value' => 'default', 'label' => $this->t('block.value.default')],
                    ['value' => 'small', 'label' => $this->t('block.value.small')],
                    ['value' => 'large', 'label' => $this->t('block.value.large')],
                    ['value' => 'expand', 'label' => $this->t('block.value.expand')],
                    ['value' => '', 'label' => $this->t('block.value.none')]
                ]],
                ['var' => 'height', 'label' => $this->t('block.label.height'), 'type' => self::TYPE_SELECT, 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.none')],
                    ['value' => 'percent', 'label' => $this->t('block.value.viewport')],
                    ['value' => 'large', 'label' => $this->t('block.value.viewport_minus_20')],
                    ['value' => 'section', 'label' => $this->t('block.value.viewport_minus_following')],
                    ['value' => 'expand', 'label' => $this->t('block.value.expand')]
                ]],
                ['var' => 'vertical_align', 'label' => $this->t('block.label.vertical_alignment'), 'type' => self::TYPE_SELECT, 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.top')],
                    ['value' => 'middle', 'label' => $this->t('block.value.middle')],
                    ['value' => 'bottom', 'label' => $this->t('block.value.bottom')]
                ]],
                $this->getConfig('padding'),
                $this->getConfig('padding_remove_top'),
                $this->getConfig('padding_remove_bottom'),
                ['var' => 'header_transparent', 'label' => $this->t('block.label.transparent_header'), 'type' => self::TYPE_SELECT, 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.none')],
                    ['value' => 'light', 'label' => $this->t('block.value.light')],
                    ['value' => 'dark', 'label' => $this->t('block.value.dark')]
                ]],
                ['var' => 'header_transparent_noplaceholder', 'label' =>  $this->t('block.label.pull_content_beneath_navbar'), 'type' => self::TYPE_CHECKBOX],
                $this->getConfig('animation'),
                ['var' => 'animation_delay', 'label' =>  $this->t('block.label.animation_delay'), 'type' => self::TYPE_CHECKBOX],
                // Advanced
                $this->getConfig('name'),
                $this->getConfig('id'),
                $this->getConfig('class'),
                $this->getConfig('css')
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