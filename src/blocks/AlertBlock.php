<?php

namespace trk\uikit\blocks;

use luya\TagParser;
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
        return $this->t('block.title.alert');
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
                ['var' => 'title', 'label' => $this->t('block.label.title'), 'type' => 'zaa-text'],
                ['var' => 'content', 'label' => $this->t('block.label.content'), 'type' => 'zaa-wysiwyg'],
            ],
            'cfgs' => [
                // Alert
                ['var' => 'alert_style', 'label' => $this->t('block.label.style'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'primary', 'label' => $this->t('block.value.primary')],
                    ['value' => 'success', 'label' => $this->t('block.value.success')],
                    ['value' => 'warning', 'label' => $this->t('block.value.warning')],
                    ['value' => 'danger', 'label' => $this->t('block.value.danger')],
                ]],
                ['var' => 'alert_size', 'label' => $this->t('block.label.larger_padding'), 'type' => 'zaa-checkbox'],
                // General
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
        return [
            'text' => $this->getText(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '{% if vars.content is not empty %}<div>{% if vars.title is not empty %}<h3>{{ vars.title }}</h3>{% endif %}<div>{{ vars.content }}</div></div>{% else %}<span class="block__empty-text">' . $this->t('block.description.no_content') . '</span>{% endif %}';
    }
}
