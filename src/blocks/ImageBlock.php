<?php

namespace trk\uikit\blocks;

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
        return $this->t('block.title.image');
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
                ['var' => 'image', 'label' => $this->t('block.label.image'), 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                ['var' => 'image_width', 'label' => $this->t('block.label.width'), 'type' => self::TYPE_NUMBER],
                ['var' => 'image_height', 'label' => $this->t('block.label.height'), 'type' => self::TYPE_NUMBER],
                ['var' => 'image_alt', 'label' => $this->t('block.label.image_alt'), 'type' => self::TYPE_TEXT],
                ['var' => 'link', 'label' => $this->t('block.label.link'), 'type' => self::TYPE_LINK],
                ['var' => 'link_target', 'label' => $this->t('block.label.link_target'), 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.same_window')],
                    ['value' => 'blank', 'label' => $this->t('block.value.new_window')],
                    ['value' => 'modal', 'label' => $this->t('block.value.modal')]
                ]]
            ],
            'cfgs' => [
                // Image
                ['var' => 'image_border', 'label' => $this->t('block.label.border'), 'type' => SELF::TYPE_SELECT, 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.none')],
                    ['value' => 'circle', 'label' => $this->t('block.value.circle')],
                    ['value' => 'rounded', 'label' => $this->t('block.value.rounded')]
                ]],
                $this->getConfig('box_shadow', ['var' => 'image_box_shadow', 'type' => SELF::TYPE_SELECT]),
                ['var' => 'image_box_shadow_bottom', 'label' => $this->t('block.label.box_shadow_bottom'), 'type' => SELF::TYPE_CHECKBOX],
                $this->getConfig('box_shadow', ['var' => 'image_hover_box_shadow', 'label' => $this->t('block.label.hover_box_shadow'),  'type' => SELF::TYPE_SELECT]),
                // Lightbox
                ['var' => 'lightbox_width', 'label' => $this->t('block.label.lightbox_width'), 'type' => self::TYPE_NUMBER],
                ['var' => 'lightbox_height', 'label' => $this->t('block.label.lightbox_height'), 'type' => self::TYPE_NUMBER],
                // General
                $this->getConfig('text_align'),
                $this->getConfig('text_align_breakpoint'),
                $this->getConfig('text_align_fallback'),
                $this->getConfig('maxwidth'),
                $this->getConfig('maxwidth_align'),
                $this->getConfig('maxwidth_breakpoint'),
                $this->getConfig('margin'),
                $this->getConfig('margin_remove_top'),
                $this->getConfig('margin_remove_bottom'),
                $this->getConfig('animation'),
                $this->getConfig('visibility'),
                // Advanced
                $this->getConfig('name'),
                $this->getConfig('id'),
                $this->getConfig('class'),
                $this->getConfig('css')
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
