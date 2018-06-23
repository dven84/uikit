<?php

use trk\uikit\Uikit;

/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

$id    = $configs['id'];
$class = $configs['class'];
$attrs = $configs['attrs'];
$attrs_container = [];

$attrs['uk-grid'] = true;
$class[] = $configs['gutter'] ? "uk-grid-{$configs['gutter']}" : '';
$class[] = $configs['divider'] && $configs['gutter'] != 'collapse' ? 'uk-grid-divider' : '';
$class[] = $configs['vertical_align'] ? 'uk-flex-middle' : '';
// Visibility
$visibilities = ['xs', 's', 'm', 'l', 'xl'];
$visible = 4;

if ($visible) {
    $configs['visibility'] = $visibilities[$visible];
    $class[] = "uk-visible@{$visibilities[$visible]}";
}
// Margin
$margin = '';
switch ($configs['margin']) {
    case '':
        switch ($configs['gutter']) {
            case '':
                $margin = 'uk-grid-margin';
                break;
            case 'small':
            case 'medium':
            case 'large':
                $margin = "uk-grid-margin-{$configs['gutter']}";
        }
        break;
    case 'default':
        $margin = 'uk-margin';
        break;
    default:
        $margin = "uk-margin-{$configs['margin']}";
}
if ($configs['margin'] != 'remove-vertical') {
    if ($configs['margin_remove_top']) {
        $margin .= ' uk-margin-remove-top';
    }
    if ($configs['margin_remove_bottom']) {
        $margin .= ' uk-margin-remove-bottom';
    }
}
// Container and width
if ($configs['width']) {
    switch ($configs['width']) {
        case 'default':
            $attrs_container['class'][] = 'uk-container';
            break;
        case 'small':
        case 'large':
        case 'expand':
            $attrs_container['class'][] = "uk-container uk-container-{$configs['width']}";
    }
    // Margin
    $attrs_container['class'][] = $margin;
} else {
    // Margin
    $class[] = $margin;
}
?>
<?php if ($attrs_container) : ?><div<?= Uikit::attrs($attrs_container) ?>><?php endif ?>
    <div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
        <?php if(isset($items) && is_array($items) && count($items)) {
            $i = 0;
            $nbItems = count($items);
            foreach ($items as $name => $item) {
                echo $this->render('LayoutUikitColumn', ['configs' => $item, 'parent' => $configs]);
            }
        } ?>
    </div>
<?php if ($attrs_container) : ?></div><?php endif ?>