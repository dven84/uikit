<?php

use trk\uikit\Uikit;

/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

$link = Uikit::link($this->varValue('link'), $this->extraValue('link'));

if(isset($configs) && $configs['content']):

    $id    = $configs['id'];
    $class = $configs['class'];
    $attrs = $configs['attrs'];

    $attrs_link = [];

    // Set content
    $content = $configs['content'];
    // Style
    $class[] = $configs['title_style'] ? 'uk-' . $configs['title_style'] : '';
    // Decoration
    $class[] = $configs['title_decoration'] ? 'uk-heading-' . $configs['title_decoration'] : '';
    // Color
    $class[] = $configs['title_color'] && $configs['title_color'] != 'background' ? 'uk-text-' . $configs['title_color'] : '';
    // Link
    if ($link['href']) {
        $attrs_link['target'] = $link['target'] ? '_blank' : '';
        $attrs_link['data-uk-scroll'] = strpos($link['href'], '#') === 0;
        $attrs_link['class'][] = $configs['link_style'] ? 'uk-link-heading' : 'uk-link-reset';
        $content = Uikit::link_tag($content, $link['href'], $attrs_link);
    }
    $content = strtr($content, array("<p>" => "", "</p>" => "", "<div>" => "", "</div>" => ""));
    ?>
    <<?= $configs['title_element'] . Uikit::attrs(compact('id', 'class'), $attrs) ?>>
    <?php if ($configs['title_color'] == 'background') : ?>
        <span class="uk-text-background"><?= $content ?></span>
    <?php elseif ($configs['title_decoration'] == 'line') : ?>
        <span><?= $content ?></span>
    <?php else : ?>
        <?= $content ?>
    <?php endif ?>
    </<?= $configs['title_element'] ?>>
<?php endif; ?>