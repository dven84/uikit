<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\BaseUikitBlock;
use luya\cms\frontend\blockgroups\MediaGroup;

/**
 * Text Block.
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
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                // Slides
                ['var' => 'items', 'label' => $this->t('block.label.items'), 'type' => self::TYPE_MULTIPLE_INPUTS, 'options' => [
                    $this->getConfig('image'),
                    $this->getConfig('image_alt'),
                    $this->getConfig('title'),
                    $this->getConfig('meta'),
                    $this->getConfig('content'),
                    $this->getConfig('link'),
                    $this->getConfig('text_color'),
                    $this->getConfig('inverse_color')
                ]],
                // Show options
                $this->getConfig('show_title'),
                $this->getConfig('show_meta'),
                $this->getConfig('show_content'),
                $this->getConfig('show_link'),
                $this->getConfig('show_thumbnail')
            ],
            'cfgs' => [
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
     * Get the text based on type input.
     */
    public function getText()
    {
        $text = $this->getVarValue('content');
        if ($this->getVarValue('textType', 0) == 1) {
            return TagParser::convertWithMarkdown($text);
        }
        return nl2br($text);
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        $this->extraValues['text'] = $this->getText();
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
