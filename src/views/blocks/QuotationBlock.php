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
    $attrs_link = [
        'href' => $link['href'],
        'target' => $link['target'] ? '_blank' : '',
        'class' => $configs['link_style'] ? "uk-link-{$configs['link_style']}" : '',
    ];
    ?>
    <blockquote<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
        <?= $configs['content'] ?>
        <?php if ($configs['footer'] || $configs['author']) : ?>
            <footer class="el-footer">
                <?= $configs['footer'] ?>
                <?php if ($configs['author']) : ?>
                    <?php if ($link['href']) : ?>
                        <cite class="el-author"><a<?= Uikit::attrs($attrs_link) ?>><?= $configs['author'] ?></a></cite>
                    <?php else : ?>
                        <cite class="el-author"><?= $configs['author'] ?></cite>
                    <?php endif ?>
                <?php endif ?>
            </footer>
        <?php endif ?>
    </blockquote>
<?php endif; ?>