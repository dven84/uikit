<?php

use trk\uikit\Uikit;

/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

$id = $configs['id'];
$class = [];
$attrs_tile = [];
$attrs_tile_container = [];
$attrs_image = [];
$attrs_overlay = [];
$attrs_container = [];

$image = $this->extraValue($configs['name'] . 'image');
$configs['image'] = isset($image->source) ? $image->source : '';

// Width
$index = $configs['index'];
$widths = $configs['widths'];
$breakpoints = ['s', 'm', 'l', 'xl'];
$breakpoint = $parent['breakpoint'];

// Above Breakpoint
$width = $widths[0] ?: 'expand';
$width = $width === 'fixed' ? $parent['fixed_width'] : $width;
$class[] = "uk-width-{$width}".($breakpoint ? "@{$breakpoint}" : '');
// Intermediate Breakpoint
if (isset($widths[1]) && $pos = array_search($breakpoint, $breakpoints)) {
    $breakpoint = $breakpoints[$pos-1];
    $width = $widths[1] ?: 'expand';
    $class[] = "uk-width-{$width}".($breakpoint ? "@{$breakpoint}" : '');
}
// Order
if (!$configs['hasNext'] && $configs['order_last']) {
    $class[] = "uk-flex-first@{$breakpoint}";
}
// Visibility
$visibilities = ['xs', 's', 'm', 'l', 'xl'];
$visible = $parent['columns'] ? 4 : false;

if ($visible) {
    $configs['visibility'] = $visibilities[$visible];
    $class[] = "uk-visible@{$visibilities[$visible]}";
}
/*
 * Column options
 */
// Tile
if ($configs['style'] || $configs['image']) {
    $class[] = 'uk-grid-item-match';
    $attrs_tile_container['class'][] = $configs['style'] ? "uk-tile-{$configs['style']}" : '';
    $attrs_tile['class'][] = 'uk-tile';
    // Padding
    switch ($configs['padding']) {
        case '':
            break;
        case 'none':
            $attrs_tile['class'][] = 'uk-padding-remove';
            break;
        default:
            $attrs_tile['class'][] = "uk-tile-{$configs['padding']}";
    }
    // Image
    if ($configs['image']) {
        if ($configs['image_width'] || $configs['image_height']) {
            if (Uikit::isImage($configs['image']) == 'svg' && !$configs['image_size']) {
                $configs['image_width'] = $configs['image_width'] ? "{$configs['image_width']}px" : 'auto';
                $configs['image_height'] = $configs['image_height'] ? "{$configs['image_height']}px" : 'auto';
                $attrs_image['style'][] = "background-size: {$configs['image_width']} {$configs['image_height']};";
            } else {
                $configs['image'] = "{$configs['image']}#thumbnail={$configs['image_width']},{$configs['image_height']}";
            }
        }
        $attrs_image['style'][] = "background-image: url('{$configs['image']}');";
        // Settings
        $attrs_image['class'][] = 'uk-background-norepeat';
        $attrs_image['class'][] = $configs['image_size'] ? "uk-background-{$configs['image_size']}" : '';
        $attrs_image['class'][] = $configs['image_position'] ? "uk-background-{$configs['image_position']}" : '';
        $attrs_image['class'][] = $configs['image_visibility'] ? "uk-background-image@{$configs['image_visibility']}" : '';
        $attrs_image['class'][] = $configs['media_blend_mode'] ? "uk-background-blend-{$configs['media_blend_mode']}" : '';
        $attrs_image['style'][] = $configs['media_background'] ? "background-color: {$configs['media_background']};" : '';
        $attrs_tile_container['class'][] = 'uk-grid-item-match';
        switch ($configs['image_effect']) {
            case '':
                break;
            case 'fixed':
                $attrs_image['class'][] = 'uk-background-fixed';
                break;
            case 'parallax':
                $options = [];
                foreach(['bgx', 'bgy'] as $prop) {
                    $start = $configs["image_parallax_{$prop}_start"];
                    $end = $configs["image_parallax_{$prop}_end"];
                    if (strlen($start) || strlen($end)) {
                        $options[] = "{$prop}: " . (strlen($start) ? $start : 0) . "," . (strlen($end) ? $end : 0);
                    }
                }
                $options[] = $configs['image_parallax_breakpoint'] ? "media: @{$configs['image_parallax_breakpoint']}" : '';
                $attrs_image['uk-parallax'] = implode(';', array_filter($options));
                break;
        }
        // Overlay
        if ($configs['media_overlay']) {
            $attrs_tile_container['class'][] = 'uk-position-relative';
            $attrs_overlay['style'] = "background-color: {$configs['media_overlay']};";
        }
    }
}
// Make sure overlay is always below content
if ($attrs_overlay) {
    $attrs_container['class'][] = 'uk-position-relative uk-panel';
}
// Text color
if ($configs['style'] == 'primary' || $configs['style'] == 'secondary') {
    $attrs_tile_container['class'][] = $configs['preserve_color'] ? 'uk-preserve-color' : '';
} elseif (!$configs['style'] || $configs['image']) {
    $class[] = $configs['text_color'] ? "uk-{$configs['text_color']}" : '';
}
// Match height if single panel element inside cell
// if ($configs['match'] && !$configs['vertical_align'] && count($configs['columns']) == 1 && $configs->children[0]->type == 'panel') {
if ($parent['match'] && !$parent['vertical_align'] && count($parent['columns']) == 1) {
    if ($configs['style'] || $configs['image']) {
        $attrs_tile['class'][] = 'uk-grid-item-match';
    } else {
        $class[] = 'uk-grid-item-match';
    }
}
?>
<div<?= Uikit::attrs(compact('id', 'class')) ?>>
    <?php if ($attrs_tile) : ?><div<?= Uikit::attrs($attrs_tile_container, !$attrs_image ? $attrs_tile : []) ?>><?php endif ?>
        <?php if ($attrs_image) : ?><div<?= Uikit::attrs($attrs_image, $attrs_tile) ?>><?php endif ?>
            <?php if ($attrs_overlay) : ?><div class="uk-position-cover"<?= Uikit::attrs($attrs_overlay) ?>></div><?php endif ?>
            <?php if ($attrs_container) : ?><div<?= Uikit::attrs($attrs_container) ?>><?php endif ?>
                <?= $configs['content'] ?>
            <?php if ($attrs_container) : ?></div><?php endif ?>
        <?php if ($attrs_image) : ?></div><?php endif ?>
    <?php if ($attrs_tile) : ?></div><?php endif ?>
</div>
