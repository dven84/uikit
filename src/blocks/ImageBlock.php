<?php

namespace trk\uikit\blocks;

use trk\uikit\Module;
use trk\uikit\BaseUikitBlock;
use luya\cms\base\PhpBlock;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\MediaGroup;

/**
 * Image Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class ImageBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return MediaGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('block.title.image');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'image', 'label' => Module::t('block.label.image'), 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                ['var' => 'image_width', 'label' => Module::t('block.label.width'), 'type' => self::TYPE_NUMBER],
                ['var' => 'image_height', 'label' => Module::t('block.label.height'), 'type' => self::TYPE_NUMBER],
                ['var' => 'image_alt', 'label' => Module::t('block.label.image_alt'), 'type' => self::TYPE_TEXT],
                ['var' => 'link', 'label' => Module::t('block.label.link'), 'type' => self::TYPE_LINK],
                ['var' => 'link_target', 'label' => Module::t('block.label.link_target'), 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.same_window')],
                    ['value' => 'blank', 'label' => Module::t('block.value.new_window')],
                    ['value' => 'modal', 'label' => Module::t('block.value.modal')]
                ]]
            ],
            'cfgs' => [
                // Image
                ['var' => 'image_border', 'label' => Module::t('block.label.border'), 'type' => SELF::TYPE_SELECT, 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.none')],
                    ['value' => 'circle', 'label' => Module::t('block.value.circle')],
                    ['value' => 'rounded', 'label' => Module::t('block.value.rounded')]
                ]],
                Module::config('box_shadow', ['var' => 'image_box_shadow', 'type' => SELF::TYPE_SELECT]),
                ['var' => 'image_box_shadow_bottom', 'label' => Module::t('block.label.box_shadow_bottom'), 'type' => SELF::TYPE_CHECKBOX],
                Module::config('box_shadow', ['var' => 'image_hover_box_shadow', 'label' => Module::t('block.label.hover_box_shadow'),  'type' => SELF::TYPE_SELECT]),
                // Lightbox
                ['var' => 'lightbox_width', 'label' => Module::t('block.label.lightbox_width'), 'type' => self::TYPE_NUMBER],
                ['var' => 'lightbox_height', 'label' => Module::t('block.label.lightbox_height'), 'type' => self::TYPE_NUMBER],
                // General
                Module::config('text_align'),
                Module::config('text_align_breakpoint'),
                Module::config('text_align_fallback'),
                Module::config('maxwidth'),
                Module::config('maxwidth_align'),
                Module::config('maxwidth_breakpoint'),
                Module::config('margin'),
                Module::config('margin_remove_top'),
                Module::config('margin_remove_bottom'),
                Module::config('animation'),
                Module::config('visibility'),
                // Advanced
                Module::config('name'),
                Module::config('id'),
                Module::config('class'),
                Module::config('css')
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'link' => BlockHelper::linkObject($this->getVarValue('link'))
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param {{extras.image}}
     * @param {{vars.align}}
     * @param {{vars.fluid}}
     * @param {{vars.image}}
     */
    public function admin()
    {
        return '<div class="clearfix" {% if vars.align == \'center\' %}style="text-align: center;"{% endif %}>
                    <div style="display: inline-block; max-width: 80%; {% if vars.align == \'left\' %} float: left;{% elseif vars.align == \'right\' %} float: right;{% endif %}">
                        <div>
                            <img src="{{extras.image.source}}" class="img-fluid" alt="" />
                        </div>
                        {% if vars.showCaption and extras.image.caption %}
                            <p class="text-muted"><small>{{extras.image.caption}}</small></p>
                        {% endif %}
                    </div>
                </div>';
    }
}
