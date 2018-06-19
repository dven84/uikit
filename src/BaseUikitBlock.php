<?php

namespace trk\uikit;

use luya\cms\base\PhpBlock;

/**
 * Base block for all uikit blocks
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
abstract class BaseUikitBlock extends PhpBlock
{
	/**
	 * @inheritdoc
	 */
    public function getViewPath()
    {
        return  dirname(__DIR__) . '/src/views/blocks';
    }
}