<?php

namespace trk\uikit\blocks;

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
        return $this->t('block.title.divider');
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
                ['var' => 'divider_style', 'label' => $this->t('block.label.style'), 'type' => 'zaa-select', 'initvalue' => '', 'options' => [
                    ['value' => '', 'label' => $this->t('block.value.default')],
                    ['value' => 'icon', 'label' => $this->t('block.value.icon')],
                    ['value' => 'small', 'label' => $this->t('block.value.small')]
                ]],
                ['var' => 'divider_element', 'label' => $this->t('block.label.html_element'), 'type' => 'zaa-select', 'initvalue' => 'hr', 'options' => [
                    ['value' => 'hr', 'label' => $this->t('block.value.hr')],
                    ['value' => 'div', 'label' => $this->t('block.value.div')]
                ]],
            ],
            'cfgs' => [
                // Divider
                $this->getConfig('align', ['var' => 'divider_align']),
                $this->getConfig('breakpoint', ['var' => 'divider_align_breakpoint']),
                $this->getConfig('align', ['var' => 'divider_align_fallback', 'label' => 'block.label.align_fallback']),

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
     * @inheritdoc
     */
    public function admin()
    {
        return '<p><hr /></p>';
    }
}
