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

    public $helps = [];

    public $descriptions = [];

    /**
     * Return translation
     *
     * @param string $term
     * @return string
     */
    public function t($term = "")
    {
        return Module::t($term);
    }

    /**
     * Get group of configs
     *
     * @param string $name
     * @return array
     */
    public function getConfigs($name = "") {
        $configs = Uikit::element($name, Module::$configs, ['var' => $name, 'label' => $name, 'type' => 'zaa-text']);
        $return = [];
        foreach ($configs as $key => $config) {
            if(is_array($config)) {
                $name = Uikit::element('var', $config, $key);
                $return[$key] = $this->getConfig($name);
            }
        }
        return $return;
    }

    /**
     * Get config from config files
     *
     * @param string $name
     * @param array $overwrites
     * @return array|mixed
     */
    public function getConfig($name = "", $overwrites = [])
    {
        // Check config
        $config = Uikit::element($name, Module::$configs, ['var' => $name, 'label' => $name, 'type' => 'zaa-text']);
        // Check var value
        if(!Uikit::element('var', $config)) {
            $config['var'] = $name;
        }
        // Overwrites
        if(count($overwrites)) $config = array_merge($config, $overwrites);
        // Set label & placeholders
        $config['label'] = $this->t(Uikit::element('label', $config, ''));
        $config['placeholder'] = $this->t(Uikit::element('placeholder', $config, ''));
        // Set descriptions
        if($description = Uikit::element('description', $config, '')) {
            $this->descriptions[$name] = $this->t($description);
        }
        // Set helps
        if($help = Uikit::element('help', $config, '')) {
            $this->helps[$name] = $help;
        }

        // Check options
        $options = Uikit::element('options', $config);
        if(is_array($options) && count($options)) {
            foreach ($options as $key => $option) {
                if(is_array($option)) {
                    $config['options'][$key]['label'] = $this->t(Uikit::element('label', $option, ''));
                    $config['options'][$key]['placeholder'] = $this->t(Uikit::element('placeholder', $option, ''));
                }
            }
        }

        return $config;
    }

    /**
     * Get configs with default values
     *
     * config_key => config_value or defualt_value
     *
     * @return array
     */
    public function getValues()
    {
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
     * @inheritdoc
     */
    public function getFieldHelp()
    {
        return array_merge($this->descriptions, $this->helps);
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