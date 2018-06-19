<?php

namespace trk\uikit\blocks;

use luya\TagParser;
use trk\uikit\Module;
use trk\uikit\BaseUikitBlock;
use luya\cms\frontend\blockgroups\TextGroup;

/**
 * Alert Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class AlertBlock extends BaseUikitBlock
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
        return Module::t('block.title.alert');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'warning';
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'title', 'label' => Module::t('block.label.title'), 'type' => 'zaa-text'],
                ['var' => 'content', 'label' => Module::t('block.label.content'), 'type' => 'zaa-wysiwyg'],
            ],
            'cfgs' => [
                // Alert
                ['var' => 'alert_style', 'label' => Module::t('block.label.style'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'primary', 'label' => Module::t('block.value.primary')],
                    ['value' => 'success', 'label' => Module::t('block.value.success')],
                    ['value' => 'warning', 'label' => Module::t('block.value.warning')],
                    ['value' => 'danger', 'label' => Module::t('block.value.danger')],
                ]],
                ['var' => 'alert_size', 'label' => Module::t('block.label.larger_padding'), 'type' => 'zaa-checkbox'],
                // General
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
        return '{% if vars.content is not empty %}<div>{% if vars.title is not empty %}<h3>{{ vars.title }}</h3>{% endif %}<div>{{ vars.content }}</div></div>{% else %}<span class="block__empty-text">' . Module::t('block.description.no_content') . '</span>{% endif %}';
    }
}
