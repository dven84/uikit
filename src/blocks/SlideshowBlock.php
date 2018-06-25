<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\BaseUikitBlock;
use luya\cms\frontend\blockgroups\MediaGroup;

/**
 * Slideshow Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class SlideshowBlock extends BaseUikitBlock
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
        return $this->t('block.title.slideshow');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'burst_mode';
    }

    /**
     * Return block fields
     *
     * @return array
     */
    public function config() {
        $vars = [];
        $cfgs = [];
        $placeholders = [];
        // Items
        $vars[] = ['var' => 'items', 'label' => $this->t('block.label.items'), 'type' => self::TYPE_MULTIPLE_INPUTS, 'options' => [
            $this->getConfig('image'),
            $this->getConfig('color', ['var' => 'media_background', 'label' => 'block.label.background_color']),
            $this->getConfig('blend_mode', ['var' => 'media_blend_mode']),
            $this->getConfig('overlay_color', ['var' => 'media_overlay']),
            $this->getConfig('image_alt'),
            $this->getConfig('title'),
            $this->getConfig('meta'),
            $this->getConfig('content'),
            $this->getConfig('link'),
            $this->getConfig('text_color'),
            $this->getConfig('inverse_color')
        ]];
        // Display options
        $vars[] = $this->getConfig('show_title');
        $vars[] = $this->getConfig('show_meta');
        $vars[] = $this->getConfig('show_content');
        $vars[] = $this->getConfig('show_link');
        $vars[] = $this->getConfig('show_thumbnail');
        // Slideshow
        $cfgs[] = $this->getConfig('viewport_height', ['label' => 'block.label.slideshow_height', 'help' => 'block.description.slideshow_height']);
        $cfgs[] = $this->setConfig([
            'var' => 'slideshow_ratio',
            'label' => 'block.label.slideshow_ratio',
            'help' => 'block.description.slideshow_ratio',
            'type' => self::TYPE_TEXT,
            'placeholder' => '16:9',
            'initValue' => ''
        ]);
        // General
        $cfgs[] = $this->getConfig('text_align');
        $cfgs[] = $this->getConfig('text_align_breakpoint');
        $cfgs[] = $this->getConfig('text_align_fallback');
        $cfgs[] = $this->getConfig('maxwidth');
        $cfgs[] = $this->getConfig('maxwidth_align');
        $cfgs[] = $this->getConfig('maxwidth_breakpoint');
        $cfgs[] = $this->getConfig('margin');
        $cfgs[] = $this->getConfig('margin_remove_top');
        $cfgs[] = $this->getConfig('margin_remove_bottom');
        $cfgs[] = $this->getConfig('animation');
        $cfgs[] = $this->getConfig('visibility');
        // Advanced
        $cfgs[] = $this->getConfig('name');
        $cfgs[] = $this->getConfig('id');
        $cfgs[] = $this->getConfig('class');
        $cfgs[] = $this->getConfig('css');

        $return = [];
        if(count($vars)) $return['vars'] = $vars;
        if(count($cfgs)) $return['cfgs'] = $cfgs;
        if(count($placeholders)) $return['placeholders'] = $placeholders;
        return $return;
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return parent::extraVars();
    }
    
    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '{% if vars.content is not empty %}<div>{{ vars.content }}</div>{% else %}<span class="block__empty-text">' . $this->t('block.description.no_content') . '</span>{% endif %}';
    }
}
