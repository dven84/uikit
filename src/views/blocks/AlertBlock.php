<?php
use trk\uikit\Uikit;
/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */
?>
<?php if($this->varValue('title') || $this->varValue('content')): ?>
    <?php
    $configs = Uikit::configs($this);

    $id    = $this->cfgValue('id');
    $class = $configs['class'];
    $attrs = $configs['attrs'];

    // Style
    $class[] = $this->cfgValue('alert_style') ? "uk-alert uk-alert-{$this->cfgValue('alert_style')}" : 'uk-alert';
    // Size
    $class[] = $this->cfgValue('alert_size') ? "uk-padding" : '';
    ?>
    <div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
        <?php if ($title = $this->varValue('title')) : ?>
            <h3><?= $title ?></h3>
        <?php endif ?>
        <?php if($content = $this->varValue('content')): ?>
            <div><?= $this->varValue('content') ?></div>
        <?php endif; ?>
    </div>
<?php endif; ?>