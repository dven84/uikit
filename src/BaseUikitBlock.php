<?php

namespace trk\uikit;

use luya\cms\base\PhpBlock;

/**
 * Base block for all uikit blocks
 *
 * The BaseUikitBlock helps to allocate the view files for the blocks without using an alias.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
abstract class BaseUikitBlock extends PhpBlock
{

    public $extraValues = [];

    /**
     * Get configs with default values
     *
     * config_key => config_value or defualt_value
     *
     * @return array
     */
    public function getValues() {
        $configs = $this->config();
        $vars = Uikit::element('vars', $configs, []);
        $cfgs = Uikit::element('cfgs', $configs, []);
        // $placeholders = Uikit::element('placeholders', $configs, []);
        $configs = [];
        if(count($vars)) {
            foreach ($vars as $i => $var) {
                $configs[$var['var']] = $this->getVarValue($var['var'], Uikit::element('initValue', $var, ''));
            }
        }
        if(count($cfgs)) {
            foreach ($cfgs as $i => $cfg) {
                $configs[$cfg['var']] = $this->getCfgValue($cfg['var'], Uikit::element('initValue', $cfg, ''));
            }
        }

        return $configs;
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return $this->extraValues;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function frontend(array $params = array())
    {
        if(!Uikit::element('configs', $params, '')) $params['configs'] = Uikit::configs($this->getValues());
        return $this->view->render($this->getViewFileName('php'), $params, $this);
    }

	/**
	 * @inheritdoc
	 */
    public function getViewPath()
    {
        return  dirname(__DIR__) . '/src/views/blocks';
    }
}