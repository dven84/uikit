<?php

namespace trk\uikit\blocks;

use luya\TagParser;
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
        return $this->t('block.title.headline');
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
                ['var' => 'content', 'label' => $this->t('block.label.content'), 'type' => 'zaa-wysiwyg'],
                ['var' => 'link', 'label' =>  $this->t('block.label.link'), 'type' => 'zaa-link'],
            ],
            'cfgs' => [
                // Title
                ['var' => 'title_style', 'label' => $this->t('block.label.style'), 'type' => 'zaa-select', 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'hero', 'label' => $this->t('block.value.hero')],
                    ['value' => 'primary', 'label' => $this->t('block.value.primary')],
                    ['value' => 'h1', 'label' => $this->t('block.value.h1')],
                    ['value' => 'h2', 'label' => $this->t('block.value.h2')],
                    ['value' => 'h3', 'label' => $this->t('block.value.h3')],
                    ['value' => 'h4', 'label' => $this->t('block.value.h4')],
                    ['value' => 'h5', 'label' => $this->t('block.value.h5')],
                    ['value' => 'h6', 'label' => $this->t('block.value.h6')]
                ]],
                ['var' => 'title_decoration', 'label' => $this->t('block.label.decoration'), 'type' => 'zaa-select', 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.none')],
                    ['value' => 'divider', 'label' => $this->t('block.value.divider')],
                    ['value' => 'bullet', 'label' => $this->t('block.value.bullet')],
                    ['value' => 'line', 'label' => $this->t('block.value.line')]
                ]],
                ['var' => 'title_color', 'label' => $this->t('block.label.color'), 'type' => 'zaa-select', 'initValue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'muted', 'label' => $this->t('block.value.muted')],
                    ['value' => 'primary', 'label' => $this->t('block.value.primary')],
                    ['value' => 'success', 'label' => $this->t('block.value.success')],
                    ['value' => 'warning', 'label' => $this->t('block.value.warning')],
                    ['value' => 'danger', 'label' => $this->t('block.value.danger')],
                    ['value' => 'background', 'label' => $this->t('block.value.background')]
                ]],
                ['var' => 'link_style', 'label' =>  $this->t('block.label.show_hover_effect'), 'type' => 'zaa-checkbox'],
                ['var' => 'title_element', 'label' => $this->t('block.label.html_element'), 'type' => 'zaa-select', 'initValue' => 'h1', 'options' => [
                    ['value' => 'h1', 'label' => $this->t('block.value.h1')],
                    ['value' => 'h2', 'label' => $this->t('block.value.h2')],
                    ['value' => 'h3', 'label' => $this->t('block.value.h3')],
                    ['value' => 'h4', 'label' => $this->t('block.value.h4')],
                    ['value' => 'h5', 'label' => $this->t('block.value.h5')],
                    ['value' => 'h6', 'label' => $this->t('block.value.h6')],
                    ['value' => 'div', 'label' => $this->t('block.value.div')]
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
        return '{% if vars.content is not empty %}<{{cfgs.title_element}}>{{ vars.content }}</{{cfgs.title_element}}>{% else %}<span class="block__empty-text">' . $this->t('block.description.no_content') . '</span>{% endif %}';
    }
}
