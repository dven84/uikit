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
    protected static $includes = ['general', 'title', 'meta', 'content', 'parallax'];

    protected static $translations = [
        'uikit' => 'uikit.php',
        'uikit.label' => 'uikit.label.php',
        'uikit.description' => 'uikit.description.php',
        'uikit.placeholder' => 'uikit.placeholder.php',
        'uikit.value' => 'uikit.value.php'
    ];

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

        self::registerTranslation('uikit*', static::staticBasePath() . '/messages', self::$translations);

        $path = __DIR__ . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR;
        foreach (self::$includes as $include) {
            $configsFile = $path . $include . '.php';
            if(file_exists($configsFile)) {
                self::$configs = array_merge(self::$configs, include $configsFile);
            }
        }

    }

    /**
     * Return translations
     *
     * @param string $prefix
     * @param string $term
     * @param array $params
     * @return mixed
     */
    public static function t($prefix = "", $term = "", array $params = [])
    {
        $translationTerm = $term ? $term : $prefix;
        if(!$term) {
            $prefix = !$term ? 'uikit' : 'uikit.' . $prefix;
        }
        return parent::baseT($prefix, $translationTerm, $params);
    }
}
