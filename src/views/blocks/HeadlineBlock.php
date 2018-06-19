<?php
use trk\uikit\Uikit;
/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */
?>
<?php if($this->varValue('content')): ?>
    <?php
    $configs = Uikit::configs($this);

    $id    = $this->cfgValue('id');
    $class = $configs['class'];
    $attrs = $configs['attrs'];

    $attrs_link = [];

    // Set content
    $content = $this->varValue('content');
    // Style
    $class[] = $this->cfgValue('title_style') ? 'uk-' . $this->cfgValue('title_style') : '';
    // Decoration
    $class[] = $this->cfgValue('title_decoration') ? 'uk-heading-' . $this->cfgValue('title_decoration') : '';
    // Color
    $class[] = $this->cfgValue('title_color') && $this->cfgValue('title_color') != 'background' ? 'uk-text-' . $this->cfgValue('title_color') : '';
    // Link
    $link = $this->varValue('link');
    if (is_array($link) && array_key_exists('value', $link) && $link['value']) {
        $attrs_link['target'] = array_key_exists('target', $link) && $link['target'] ? '_blank' : '';
        $attrs_link['data-uk-scroll'] = strpos($link['value'], '#') === 0;
        $attrs_link['class'][] = $this->cfgValue('link_style') ? 'uk-link-heading' : 'uk-link-reset';
        $content = Uikit::link_tag($content, $link['value'], $attrs_link);
    }
    $content = strtr($content, array("<p>" => "", "</p>" => ""));
    ?>
    <<?= $this->cfgValue('title_element') . Uikit::attrs(compact('id', 'class'), $attrs) ?>>
    <?php if ($this->cfgValue('title_color') == 'background') : ?>
        <span class="uk-text-background"><?= $content ?></span>
    <?php elseif ($this->cfgValue('title_decoration') == 'line') : ?>
        <span><?= $content ?></span>
    <?php else : ?>
        <?= $content ?>
    <?php endif ?>
    </<?= $this->cfgValue('title_element') ?>>
<?php endif; ?>