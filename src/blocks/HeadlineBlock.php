<?php

namespace trk\uikit\blocks;

use trk\uikit\BaseUikitBlock;
use trk\uikit\Module;
use luya\TagParser;
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
    protected $component = "headline";

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
        return Module::t('headline');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'format_size';
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
        if($this->getVarValue('content')) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}
