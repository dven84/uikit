<?php

use trk\uikit\Uikit;

/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

$id    = $configs['id'];
$class = $configs['class'];
$attrs = $configs['attrs'];

// Style
$class[] = $configs['divider_style'] ? "uk-divider-{$configs['divider_style']}" : '';
$class[] = !$configs['divider_style'] && $configs['divider_element'] == 'div' ? 'uk-hr' : '';
// Alignment
if ($configs['divider_style'] == 'small') {
    if ($configs['divider_align'] && $configs['divider_align'] != 'justify' && $configs['divider_align_breakpoint']) {
        $class[] = "uk-text-{$configs['divider_align']}@{$configs['divider_align_breakpoint']}";
        if ($configs['divider_align_fallback']) {
            $class[] = "uk-text-{$configs['divider_align_fallback']}";
        }
    } else if ($configs['divider_align']) {
        $class[] = "uk-text-{$configs['divider_align']}";
    }
}
?>
<?php if ($configs['divider_element'] == 'div') : ?>
    <div <?= Uikit::attrs(compact('id', 'class'), $attrs) ?>></div>
<?php else : ?>
    <hr <?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
<?php endif ?>