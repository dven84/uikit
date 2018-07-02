<?php

namespace trk\uikit;

use luya\cms\base\PhpBlock;
use luya\cms\helpers\BlockHelper;

/**
 * Base block for all uikit blocks
 *
 * The BaseUikitBlock helps to allocate the view files for the blocks without using an alias.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
abstract class BaseUikitBlock extends PhpBlock
{
    const CONFIGS_EXT = ".json";
    const COMPONENTS_PATH = __DIR__ . DIRECTORY_SEPARATOR . "components" . DIRECTORY_SEPARATOR;

    /**
     * @inheritdoc
     */
    protected $component = "";

    /**
     * @inheritdoc
     */
    protected $configs = [];

    /**
     * @inheritdoc
     */
    protected $defaults = [];

    /**
     * @inheritdoc
     */
    protected $items = [];

    /**
     * @inheritdoc
     */
    public $descriptions = [];

    /**
     * @inheritdoc
     */
    public $cacheEnabled = true;

    /**
     * @inheritdoc
     */
    public $extraValues = [];

    /**
     * @inheritdoc
     */
    public $helps = [];

    /**
     * Initialize
     */
    public function init() {
        if($this->component) {
            $this->setComponentConfigs();
            $this->setDefaults();
        }
    }

    /**
     * Get json content as array for given json file path
     *
     * @param string $path
     * @return array|mixed
     */
    protected function getJsonContent($path = "") {
        $data = [];
        if(file_exists($path)) {
            $json = file_get_contents($path);
            $data = json_decode($json, true);
        }
        return $data;
    }

    /**
     * Get component configs
     *
     * @param string $component
     * @return array|mixed
     */
    protected function getComponentConfigs($component = "") {
        $component = $component ?: $this->component;
        $configs = $this->getJsonContent(self::COMPONENTS_PATH . $component . self::CONFIGS_EXT);
        $configs['vars'] = $this->setConfigFields(Uikit::element("vars", $configs, []));
        $configs["cfgs"] = $this->setConfigFields(Uikit::element("cfgs", $configs, []));
        return $configs;
    }
    /**
     * Set component configs
     *
     */
    protected function setComponentConfigs() {
        $this->configs = $this->getComponentConfigs($this->component);
    }

    /**
     * Set config fields
     *
     * @param array $data
     * @return array
     */
    protected function setConfigFields(array $data = []) {
        if(count($data)) {
            foreach ($data as $i => $var) {
                // Set items
                if($var["var"] == "items") {
                    $this->items = $var;
                }
                // Set label
                if($label = Uikit::element("label", $var, "")) {
                    $var['label'] = Module::t($label);
                }
                // Set placeholder translation
                if($placeholder = Uikit::element('placeholder', $var, '')) {
                    $var['placeholder'] = Module::t($placeholder);
                }
                // Set description translation
                if($description = Uikit::element('description', $var, '')) {
                    $this->descriptions[$var["var"]] = Module::t($description);
                }
                // Check options
                $options = Uikit::element('options', $var);
                if(is_array($options) && count($options)) {
                    if($var["type"] == "zaa-multiple-inputs") {
                        $var["options"] = $this->setConfigFields($options);
                    } else {
                        foreach ($options as $key => $option) {
                            // Set option label translation
                            if(is_array($option) && Uikit::element('label', $option, '')) {
                                $var['options'][$key]['label'] = Module::t(Uikit::element('label', $option, ''));
                            }
                        }
                    }
                }
                $data[$i] = $var;
            }
        }

        return $data;
    }

    /**
     * Set defaults
     */
    protected function setDefaults() {
        $this->defaults = Uikit::element("defaults", $this->configs, []);
        unset($this->configs["defaults"]);
    }

    /**
     * @inheritdoc
     */
    protected function getPlaceholders() {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function config()
    {
        $configs = [
            "vars" => [],
            "cfgs" => []
        ];

        if($this->configs) $configs = $this->configs;
        if($placeholders = $this->getPlaceholders()) $configs["placeholders"] = $placeholders;

        return $configs;
    }

    /**
     * @inheritdoc
     */
    public function getFieldHelp()
    {
        return $this->descriptions;
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        $vars = Uikit::element('vars', $this->configs, []);

        return array_merge($this->extraValues, $this->setValues($vars));
    }

    /**
     * Get items
     *
     * @return array items
     */
    public function getItems()
    {
        // Get item options
        $options = [];
        foreach (Uikit::element("options", $this->items, []) as $i => $option) {
            $options[$option["var"]] = $option["type"];
        }
        // Set items
        $items = [];
        foreach ($this->getVarValue('items', []) as $item) {
            $values = [];
            foreach ($options as $name => $type) {
                if(isset($item[$name])) {
                    if($type == "zaa-file-upload") {
                        $values[$name] = $this->getImageSource($item[$name]);
                    } else if ($type == "zaa-link") {
                        $link = $this->getLink($item[$name]);
                        $values[$name] = $link['href'];
                        $configs["link_target"] = isset($item["link_target"]) ? $item["link_target"] : $link['link_target'];
                    } else {
                        $values[$name] = $item[$name];
                    }
                } else {
                    $values[$name] = "";
                    if($type == "zaa-link") {
                        $values["link_target"] = "";
                    }
                }
            }
            $items[] = $values;
        }

        return $items;
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

        // Set var and cfgs values
        $configs = array_merge($this->setValues($vars), $this->setValues($cfgs, 'cfgs'));

        // Check and set placeholder values
        if($placeholders = $this->getPlaceholders()) {
            foreach ($placeholders as $placeholder) {
                if($name = Uikit::element('var', $placeholder)) {
                    $configs[$name] = $this->getPlaceholderValue($name);
                }
            }
        }
        // Set items
        if(Uikit::element("items", $configs)) {
            $configs["items"] = $this->getItems();
        }

        return $configs;
    }

    /**
     * Set field values by type
     *
     * @param array $fields
     * @param string $type
     * @return array
     */
    protected function setValues(array $fields = [], $type = '') {
        $values = [];
        foreach ($fields as $i => $field) {
            $fieldName = Uikit::element('var', $field, '');
            $fieldType = Uikit::element('type', $field, '');

            if($fieldName && $fieldType) {
                // Get field value by type and if empty set default value
                switch ($type) {
                    case 'cfgs':
                        $value = $this->getCfgValue($fieldName, Uikit::element($fieldName, $this->defaults, ''));
                        break;
                    case 'extra':
                        $value = $this->getExtraValue($fieldName, Uikit::element($fieldName, $this->defaults, ''));
                        break;
                    case 'placeholder':
                        $value = $this->getPlaceholderValue($fieldName, Uikit::element($fieldName, $this->defaults, ''));
                        break;
                    default:
                        $value = $this->getVarValue($fieldName, Uikit::element($fieldName, $this->defaults, ''));
                        break;

                }
                // Set field value
                switch ($fieldType) {
                    case 'zaa-file-upload':
                        $values[$fieldName] = $this->getImageSource($value);
                        break;
                    case 'zaa-link':
                        $link = $this->getLink($value);
                        $values[$fieldName] = $link['href'];
                        $configs['link_target'] = $link['link_target'];
                        break;
                    default:
                        $values[$fieldName] = $value;
                        break;
                }
            }
        }

        return $values;
    }

    /**
     * Get image source
     *
     * @param string $value
     * @return mixed|string
     */
    protected function getImageSource($value = "") {
        $value = BlockHelper::imageUpload($value);
        return is_array($value) && Uikit::element('source', $value) ? $value['source'] : '';
    }

    /**
     * Get link & link_target
     *
     * @param string $value
     * @return array
     */
    protected function getLink($value = "") {
        $value = BlockHelper::linkObject($value);
        return [
            'href' => $value && $value->getHref() ? $value->getHref() : '',
            'link_target' => $value && $value->getTarget() ? $value->getTarget() : ""
        ];
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function frontend(array $params = array())
    {
        if(!Uikit::element('data', $params, '')) {
            $configs = $this->getValues();
            $configs["id"] =  Uikit::unique($this->component);
            $params['data'] = Uikit::configs($configs);
            $params['debug'] = $this->config();
        }
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