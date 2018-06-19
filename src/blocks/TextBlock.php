<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\Module;
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
        return Module::t('block.title.text');
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
                ['var' => 'content', 'label' => Module::t('block.label.content'), 'type' => 'zaa-wysiwyg']
            ],
            'cfgs' => [
                // Text
                ['var' => 'dropcap', 'label' =>  Module::t('block.label.drop_cap'), 'type' => 'zaa-checkbox'],
                ['var' => 'text_style', 'label' => Module::t('block.label.style'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'lead', 'label' => Module::t('block.value.lead')],
                    ['value' => 'meta', 'label' => Module::t('block.value.meta')]
                ]],
                ['var' => 'text_color', 'label' => Module::t('block.label.color'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'muted', 'label' => Module::t('block.value.muted')],
                    ['value' => 'primary', 'label' => Module::t('block.value.primary')],
                    ['value' => 'success', 'label' => Module::t('block.value.success')],
                    ['value' => 'warning', 'label' => Module::t('block.value.warning')],
                    ['value' => 'danger', 'label' => Module::t('block.value.danger')]
                ]],
                ['var' => 'text_size', 'label' => Module::t('block.label.text_size'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'small', 'label' => Module::t('block.value.small')],
                    ['value' => 'large', 'label' => Module::t('block.value.large')]
                ]],
                ['var' => 'column', 'label' => Module::t('block.label.columns'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.none')],
                    ['value' => '1-2', 'label' => Module::t('block.value.halves')],
                    ['value' => '1-3', 'label' => Module::t('block.value.thirds')],
                    ['value' => '1-4', 'label' => Module::t('block.value.quarters')],
                    ['value' => '1-5', 'label' => Module::t('block.value.fifths')],
                    ['value' => '1-6', 'label' => Module::t('block.value.sixths')]
                ]],
                ['var' => 'column_divider', 'label' => Module::t('block.label.columns_divider'), 'type' => 'zaa-checkbox'],
                Module::config('breakpoint', ['var' => 'column_breakpoint', 'label' => 'block.label.columns_breakpoint', 'initValue' => 'm']),
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

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'text' => $this->getText(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '{% if vars.content is not empty %}<div>{{ vars.content }}</div>{% else %}<span class="block__empty-text">' . Module::t('block.description.no_content') . '</span>{% endif %}';
    }
}
