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
    public static $configs = [];

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
