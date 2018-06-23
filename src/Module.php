<?php

namespace trk\uikit;

use Yii;

/**
 * Uikit Module
 *
 * When adding this module to your configuration the uikit 3 blocks will be added to your
 * cms administration by running the `import` command.
 *
 * @author Iskender TOTOĞLU <iskender@altivebir.com>
 */
class Module extends \luya\base\Module
{
    /**
     * @var array $includes file list for configs
     */
    protected static $includes = ['general', 'parallax'];

    /**
     * @var array configs for store general field configs.
     */
    private static $configs = [];

    /**
     * @inheritdoc
     */
    public static function onLoad()
    {
        Yii::setAlias('@uikit', static::staticBasePath());

        self::registerTranslation('uikit*', static::staticBasePath() . '/messages', [
            'uikit' => 'uikit.php'
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
        $config = Uikit::element($name, self::$configs, ['var' => $name, 'label' => $name, 'type' => 'zaa-text']);

        if(!Uikit::element('var', $config)) {
            $config['var'] = $name;
        }

        // Overwrite
        if(count($overwrites)) $config = array_merge($config, $overwrites);

        $config['label'] = self::t(Uikit::element('label', $config, ''));
        $config['placeholder'] = self::t(Uikit::element('placeholder', $config, ''));
        $options = Uikit::element('options', $config);
        if(is_array($options) && count($options)) {
            foreach ($options as $key => $option) {
                if(is_array($option)) {
                    $options[$key]['label'] = self::t(Uikit::element('label', $option, ''));
                    $options[$key]['placeholder'] = self::t(Uikit::element('placeholder', $option, ''));
                }
            }
            $config['options'] = $options;
        }
        return $config;
    }

    /**
     * Get group of configs
     *
     * @param string $name
     * @return mixed
     */
    public static function configs($name = "") {
        $configs = Uikit::element($name, self::$configs, ['var' => $name, 'label' => $name, 'type' => 'zaa-text']);
        foreach ($configs as $key => $config) {
            if(is_array($config)) {
                $configs[$key]['label'] = self::t(Uikit::element('label', $config, ''));
                $configs[$key]['placeholder'] = self::t(Uikit::element('placeholder', $config, ''));
                $options = Uikit::element('options', $config, []);
                if(count($options)) {
                    foreach ($options as $option_key => $option) {
                        $options[$option_key]['label'] = self::t(Uikit::element('label', $option, ''));
                        $options[$option_key]['placeholder'] = self::t(Uikit::element('placeholder', $option, ''));
                    }
                    $configs[$key]['options'] = $options;
                }
            }
        }
        return $configs;
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
}
