<?php

namespace trk\uikit\blocks;

use trk\uikit\BaseUikitBlock;
use trk\uikit\Module;
use luya\cms\base\PhpBlock;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\MediaGroup;

/**
 * Image Block.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
final class ImageBlock extends BaseUikitBlock
{
    /**
     * @inheritdoc
     */
    public $component = "image";

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
        return Module::t('image');
    }

    /**
     * @inheritdoc
     */
    public function icon()
    {
        return 'image';
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'link' => BlockHelper::linkObject($this->getVarValue('link'))
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        if($this->getExtraValue('image')) {
            return $this->frontend();
        } else {
            return '<div><span class="block__empty-text">' . Module::t('no_content') . '</span></div>';
        }
    }
}
