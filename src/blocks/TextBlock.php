<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\BaseUikitBlock;
use luya\cms\frontend\blockgroups\TextGroup;

/**
 * Text Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class TextBlock extends BaseUikitBlock
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
        return $this->t('block.title.text');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'format_size';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'content', 'label' => $this->t('block.label.content'), 'type' => 'zaa-wysiwyg']
            ],
            'cfgs' => [
                // Text
                ['var' => 'dropcap', 'label' =>  $this->t('block.label.drop_cap'), 'type' => 'zaa-checkbox'],
                ['var' => 'text_style', 'label' => $this->t('block.label.style'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'lead', 'label' => $this->t('block.value.lead')],
                    ['value' => 'meta', 'label' => $this->t('block.value.meta')]
                ]],
                ['var' => 'text_color', 'label' => $this->t('block.label.color'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'muted', 'label' => $this->t('block.value.muted')],
                    ['value' => 'primary', 'label' => $this->t('block.value.primary')],
                    ['value' => 'success', 'label' => $this->t('block.value.success')],
                    ['value' => 'warning', 'label' => $this->t('block.value.warning')],
                    ['value' => 'danger', 'label' => $this->t('block.value.danger')]
                ]],
                ['var' => 'text_size', 'label' => $this->t('block.label.text_size'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'small', 'label' => $this->t('block.value.small')],
                    ['value' => 'large', 'label' => $this->t('block.value.large')]
                ]],
                ['var' => 'column', 'label' => $this->t('block.label.columns'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.none')],
                    ['value' => '1-2', 'label' => $this->t('block.value.halves')],
                    ['value' => '1-3', 'label' => $this->t('block.value.thirds')],
                    ['value' => '1-4', 'label' => $this->t('block.value.quarters')],
                    ['value' => '1-5', 'label' => $this->t('block.value.fifths')],
                    ['value' => '1-6', 'label' => $this->t('block.value.sixths')]
                ]],
                ['var' => 'column_divider', 'label' => $this->t('block.label.columns_divider'), 'type' => 'zaa-checkbox'],
                $this->getConfig('breakpoint', ['var' => 'column_breakpoint', 'label' => 'block.label.columns_breakpoint', 'initValue' => 'm']),
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
