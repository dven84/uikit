<?php

namespace trk\uikit\blocks;

use trk\uikit\BaseUikitBlock;
use trk\uikit\Module;
use luya\TagParser;
use luya\cms\frontend\blockgroups\MediaGroup;

/**
 * Gallery Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class GalleryBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $component = "gallery";

    /**
     * @inheritdoc
     */
    public function blockGroup()
    {
        return MediaGroup::class;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        return Module::t('gallery');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'view_module';
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
        $this->extraValues['content'] = $this->getText();
        return parent::extraVars();
    }

    /**
     * @inheritdoc
     */
    public function frontend(array $params = array())
    {
        if($this->getVarValue('items', [])) {
            return parent::frontend($params);
        } else {
            return "";
        }
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($output = $this->frontend()) {
            return $output;
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}
