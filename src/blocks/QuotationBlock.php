<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\BaseUikitBlock;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\TextGroup;

/**
 * Quotation Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class QuotationBlock extends BaseUikitBlock
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
        return TextGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return $this->t('block.title.quotation');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'format_quote';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                $this->getConfig('content'),
                ['var' => 'author', 'label' =>  $this->t('block.label.author'), 'type' => 'zaa-text'],
                $this->getConfig('link', ['label' => 'block.label.author_link']),
                $this->getConfig('title', ['var' => 'footer', 'label' => 'block.label.footer'])
            ],
            'cfgs' => [
                // Link style
                ['var' => 'link_style', 'label' => $this->t('block.label.style'), 'initValue' => '', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'muted', 'label' => $this->t('block.value.muted')],
                    ['value' => 'text', 'label' => $this->t('block.value.text')],
                    ['value' => 'text', 'label' => $this->t('block.value.reset')]
                ]],
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
        $this->extraValues['link'] = BlockHelper::linkObject($this->getVarValue('link'));
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
