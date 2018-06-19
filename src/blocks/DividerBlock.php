<?php

namespace trk\uikit\blocks;

use trk\uikit\Module;
use trk\uikit\BaseUikitBlock;

/**
 * Divider Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class DividerBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('block.title.divider');
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
                ['var' => 'divider_style', 'label' => Module::t('block.label.style'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => Module::t('block.value.default')],
                    ['value' => 'icon', 'label' => Module::t('block.value.icon')],
                    ['value' => 'small', 'label' => Module::t('block.value.small')]
                ]],
                ['var' => 'divider_element', 'label' => Module::t('block.label.html_element'), 'type' => 'zaa-select', 'initvalue' => 'hr', 'options' => [
                    ['value' => 'hr', 'label' => Module::t('block.value.hr')],
                    ['value' => 'div', 'label' => Module::t('block.value.div')]
                ]],
            ],
            'cfgs' => [
                // Divider
                Module::config('align', ['var' => 'divider_align']),
                Module::config('breakpoint', ['var' => 'divider_align_breakpoint']),
                Module::config('align', ['var' => 'divider_align_fallback', 'label' => 'block.label.align_fallback']),

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
     * @inheritdoc
     */
    public function admin()
    {
        return '<p><hr /></p>';
    }
}
