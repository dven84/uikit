<?php

namespace trk\uikit;

/**
 * Uikit Module
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
class Module extends \luya\base\Module
{
    /**
     * @var array $includes file list for configs
     */
    protected static $includes = ['general'];

    /**
     * @var array configs for store general field configs.
     */
    private static $configs = [];

    /**
     * @inheritdoc
     */
    public static function onLoad()
    {
        self::registerTranslation('uikit*', static::staticBasePath() . '/messages', [
            'uikit' => 'uikit.php',
        ]);

        $path = __DIR__ . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR;
        foreach (self::$includes as $include) {
            $configsFile = $path . $include . '.php';
            if(file_exists($configsFile)) {
                self::$configs = array_merge(self::$configs, include $configsFile);
            }
        }

    }

    /**
     * If we could not found config, return default config
     *
     * @param string $name
     * @param array $overwrites
     * @return mixed
     */
    public static function config($name = "", $overwrites = [])
    {
        $config = self::element($name, self::$configs, ['var' => $name, 'label' => $name, 'type' => 'zaa-text']);

        if(!self::element('var', $config)) {
            $config['var'] = $name;
        }

        // Overwrite
        if(count($overwrites)) $config = array_merge($config, $overwrites);

        $label = self::element('label', $config, '');
        $config['label'] = self::t($label);
        $options = self::element('options', $config);
        if(is_array($options) && count($options)) {
            foreach ($options as $key => $option) {
                $options[$key]['label'] = self::t(self::element('label', $option, ''));
            }
            $config['options'] = $options;
        }
        return $config;
    }

    /**
     * Translations
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('uikit', $message, $params);
    }

    /**
     * Element
     *
     * Lets you determine whether an array index is set and whether it has a value.
     * If the element is empty it returns NULL (or whatever you specify as the default value.)
     *
     * @param	string
     * @param	array
     * @param	mixed
     * @return	mixed	depends on what the array contains
     */
    public static function element($item, array $array, $default = NULL)
    {
        return array_key_exists($item, $array) ? $array[$item] : $default;
    }
}
