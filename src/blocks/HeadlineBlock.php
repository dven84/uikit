<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\Module;
use trk\uikit\BaseUikitBlock;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\TextGroup;

/**
 * Headline Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class HeadlineBlock extends BaseUikitBlock
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
        return Module::t('block.title.headline');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'view_headline';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => Module::t('block.label.content'), 'type' => 'zaa-wysiwyg'],
                ['var' => 'link', 'label' =>  Module::t('block.label.link'), 'type' => 'zaa-link'],
            ],
            'cfgs' => [
                // Title
                ['var' => 'title_style', 'label' => Module::t('block.label.style'), 'type' => 'zaa-select', 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'hero', 'label' => Module::t('block.value.hero')],
                    ['value' => 'primary', 'label' => Module::t('block.value.primary')],
                    ['value' => 'h1', 'label' => Module::t('block.value.h1')],
                    ['value' => 'h2', 'label' => Module::t('block.value.h2')],
                    ['value' => 'h3', 'label' => Module::t('block.value.h3')],
                    ['value' => 'h4', 'label' => Module::t('block.value.h4')],
                    ['value' => 'h5', 'label' => Module::t('block.value.h5')],
                    ['value' => 'h6', 'label' => Module::t('block.value.h6')]
                ]],
                ['var' => 'title_decoration', 'label' => Module::t('block.label.decoration'), 'type' => 'zaa-select', 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.none')],
                    ['value' => 'divider', 'label' => Module::t('block.value.divider')],
                    ['value' => 'bullet', 'label' => Module::t('block.value.bullet')],
                    ['value' => 'line', 'label' => Module::t('block.value.line')]
                ]],
                ['var' => 'title_color', 'label' => Module::t('block.label.color'), 'type' => 'zaa-select', 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'muted', 'label' => Module::t('block.value.muted')],
                    ['value' => 'primary', 'label' => Module::t('block.value.primary')],
                    ['value' => 'success', 'label' => Module::t('block.value.success')],
                    ['value' => 'warning', 'label' => Module::t('block.value.warning')],
                    ['value' => 'danger', 'label' => Module::t('block.value.danger')],
                    ['value' => 'background', 'label' => Module::t('block.value.background')]
                ]],
                ['var' => 'link_style', 'label' =>  Module::t('block.label.show_hover_effect'), 'type' => 'zaa-checkbox'],
                ['var' => 'title_element', 'label' => Module::t('block.label.html_element'), 'type' => 'zaa-select', 'initValue' => 'h1', 'options' => [
                    ['value' => 'h1', 'label' => Module::t('block.value.h1')],
                    ['value' => 'h2', 'label' => Module::t('block.value.h2')],
                    ['value' => 'h3', 'label' => Module::t('block.value.h3')],
                    ['value' => 'h4', 'label' => Module::t('block.value.h4')],
                    ['value' => 'h5', 'label' => Module::t('block.value.h5')],
                    ['value' => 'h6', 'label' => Module::t('block.value.h6')],
                    ['value' => 'div', 'label' => Module::t('block.value.div')]
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
        return '{% if vars.content is not empty %}<{{cfgs.title_element}}>{{ vars.content }}</{{cfgs.title_element}}>{% else %}<span class="block__empty-text">' . Module::t('block.description.no_content') . '</span>{% endif %}';
    }
}
