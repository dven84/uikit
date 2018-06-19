<?php

namespace trk\uikit\blockgroups;

use luya\cms\base\BlockGroup;

/**
 * Uikit 3 Group.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
class UikitGroup extends BlockGroup
{
    public function identifier()
    {
        return 'uikit3';
    }

    public function label()
    {
        return 'Uikit 3';
    }

    public function getPosition()
    {
        return 60;
    }
}