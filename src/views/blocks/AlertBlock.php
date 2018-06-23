<?php

use trk\uikit\Uikit;

/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

if(isset($configs) && $configs['title'] || $configs['content']):
    
    $id    = $configs['id'];
    $class = $configs['class'];
    $attrs = $configs['attrs'];

    // Style
    $class[] = $configs['alert_style'] ? "uk-alert uk-alert-{$configs['alert_style']}" : 'uk-alert';
    // Size
    $class[] = $configs['alert_size'] ? "uk-padding" : '';
    ?>
    <div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
        <?php if ($configs['title']) : ?>
            <h3><?= $configs['title'] ?></h3>
        <?php endif ?>
        <?php if($configs['content']): ?>
            <div><?= $configs['content'] ?></div>
        <?php endif; ?>
    </div>
<?php endif; ?>