<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\Module;
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
        return Module::t('block.title.quotation');
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
                Module::config('content'),
                ['var' => 'author', 'label' =>  Module::t('block.label.author'), 'type' => 'zaa-text'],
                Module::config('link', ['label' => 'block.label.author_link']),
                Module::config('title', ['var' => 'footer', 'label' => 'block.label.footer'])
            ],
            'cfgs' => [
                // Link style
                ['var' => 'link_style', 'label' => Module::t('block.label.style'), 'initValue' => '', 'type' => self::TYPE_SELECT, 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'muted', 'label' => Module::t('block.value.muted')],
                    ['value' => 'text', 'label' => Module::t('block.value.text')],
                    ['value' => 'text', 'label' => Module::t('block.value.reset')]
                ]],
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
     * @inheritdoc
     */
    public function getFieldHelp()
    {
        return [];
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
        return '{% if vars.content is not empty %}<div>{{ vars.content }}</div>{% else %}<span class="block__empty-text">' . Module::t('block.description.no_content') . '</span>{% endif %}';
    }
}
