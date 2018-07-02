<?php

use trk\uikit\Uikit;

/**
 * @var $this object
 * @var $data array
 */

$id    = $data['id'];
$class = $data['class'];
$attrs = $data['attrs'];
$attrs_container = [];
$attrs_overlay = [];
$attrs_center = [];
$attrs_cover = [];
$attrs_image = [];
$attrs_hover_image = [];
$attrs_link = [];
$placeholder = '';
$attrs_placeholder = [];

// Container
$attrs_container['class'][] = 'el-container';

if ($data['image_box_shadow_bottom']) {
    $attrs_container['class'][] = 'uk-box-shadow-bottom';
} else {
    $attrs_container['class'][] = 'uk-inline-clip';
}
// Mode
if ($data['overlay_mode'] == 'cover' && $data['overlay_style']) {
    $attrs_overlay['class'][] = "el-overlay uk-position-cover";
    $attrs_overlay['class'][] = $data['overlay_margin'] ? "uk-position-{$data['overlay_margin']}" : '';
}
// Style
switch ($data['overlay_style']) {
    case '':
        $attrs_content['class'][] = 'uk-panel';
        break;
    default:
        $attrs_overlay['class'][] = "uk-{$data['overlay_style']}";
        $attrs_content['class'][] = 'uk-overlay';
}
// Padding
switch ($data['overlay_padding']) {
    case '':
        $attrs_content['class'][] = !$data['overlay_style'] ? 'uk-padding' : '';
        break;
    case 'none':
        $attrs_content['class'][] = $data['overlay_style'] ? 'uk-padding-remove' : '';
        break;
    default:
        $attrs_content['class'][] = "uk-padding-{$data['overlay_padding']}";
}
// Position
if (in_array($data['overlay_position'], ['center', 'top-center', 'bottom-center', 'center-left', 'center-right'])) {
    $attrs_center['class'][] = "uk-position-{$data['overlay_position']}";
    $attrs_center['class'][] = $data['overlay_margin'] && $data['overlay_style'] ? "uk-position-{$data['overlay_margin']}" : '';
} else {
    $attrs_content['class'][] = "uk-position-{$data['overlay_position']}";
    $attrs_content['class'][] = $data['overlay_margin'] && $data['overlay_style'] ? "uk-position-{$data['overlay_margin']}" : '';
}
// Width
if (!in_array($data['overlay_position'], ['top', 'bottom'])) {
    $attrs_content['class'][] = $data['overlay_maxwidth'] ? "uk-width-{$data['overlay_maxwidth']}" : '';
}
// Transition
if ($data['overlay_hover'] || $data['image_transition'] || $data['hover_image']) {
    $attrs_container['class'][] = 'uk-transition-toggle';
    $attrs_container['tabindex'] = 0;
}
if ($data['overlay_hover']) {
    if ($data['overlay_transition_background'] && ($data['overlay_mode'] == 'cover' && $data['overlay_style'])) {
        $attrs_overlay['class'][] = "uk-transition-{$data['overlay_transition']}";
    } else {
        $attrs_overlay['class'][] = "uk-transition-{$data['overlay_transition']}";
        $attrs_content['class'][] = "uk-transition-{$data['overlay_transition']}";
    }
}
// Text color
if (!$data['overlay_style'] || ($data['overlay_mode'] == 'cover' && $data['overlay_style'])) {
    $attrs_container['class'][] = $data['text_color'] ? "uk-{$data['text_color']}" : '';
}
// Inverse text color on hover
if ((!$data['overlay_style'] && $data['hover_image']) || ($data['overlay_mode'] == 'cover' && $data['overlay_style'] && $data['overlay_transition_background'])) {
    $attrs_container['uk-toggle'] = $data['text_color_hover'] ? "cls: uk-light uk-dark; mode: hover" : false;
}
// Image
if ($data['image'] || $data['hover_image']) {
    // Transition
    if ($data['hover_image'] && !$data['image']) {
        $data['image'] = $data['hover_image'];
        $data['hover_image'] = '';
        $attrs_image['class'][] = $data['image_transition'] ? "uk-transition-{$data['image_transition']}" : 'uk-transition-fade';
    } elseif ($data['hover_image'])
        $attrs_hover_image['class'][] = $data['image_transition'] ? "uk-transition-{$data['image_transition']}" : 'uk-transition-fade';
    else {
        $attrs_image['class'][] = $data['image_transition'] ? "uk-transition-{$data['image_transition']} uk-transition-opaque" : '';
    }
    $attrs_placeholder['alt'] = $data['image_alt'];
    $attrs_placeholder['class'][] = 'uk-invisible';
    // Image Placeholder
    if (Uikit::isImage($data['image']) == 'svg') {
        $placeholder = Uikit::image($data['image'], array_merge($attrs_placeholder, ['width' => $data['image_width'], 'height' => $data['image_height']]));
    } elseif ($data['image_width'] || $data['image_height']) {
        $placeholder = Uikit::image([$data['image'], 'thumbnail' => [$data['image_width'], $data['image_height']]], $attrs_placeholder);
    } else {
        $placeholder = Uikit::image($data['image'], $attrs_placeholder);
    }
    // Image
    $attrs_image['class'][] = 'el-image uk-inline uk-background-norepeat uk-background-cover';
    $attrs_image['style'][] = $data['image_min_height'] ? "min-height: {$data['image_min_height']}px;" : '';

    if ($data['image_width'] || $data['image_height']) {
        $data['image'] = "{$data['image']}#thumbnail={$data['image_width']},{$data['image_height']}";
    }
    $attrs_image['style'][] = "background-image: url('{$data['image']}');";
    $data['image'] = "<div" . Uikit::attrs($attrs_image) . ">{$placeholder}</div>";
    // Hover Image
    if ($data['hover_image']) {
        $attrs_hover_image['class'][] = 'el-hover-image uk-position-cover uk-background-norepeat uk-background-cover';
        if ($data['image_width'] || $data['image_height']) {
            $data['hover_image'] = "{$data['hover_image']}#thumbnail={$data['image_width']},{$data['image_height']}";
        }
        $attrs_hover_image['style'][] = "background-image: url('{$data['hover_image']}');";
        $data['image'] .= "<div" . Uikit::attrs($attrs_hover_image) ."></div>";

    }
    // Box Shadow
    $attrs_container['class'][] = $data['image_box_shadow'] ? "uk-box-shadow-{$data['image_box_shadow']}" : '';
    $attrs_container['class'][] = $data['image_hover_box_shadow'] ? "uk-box-shadow-hover-{$data['image_hover_box_shadow']}" : '';

}
// Link
$attrs_link['href'] = $data['link'];
$attrs_link['target'] = $data['link_target'] ? '_blank' : '';
$attrs_link['uk-scroll'] = strpos($data['link'], '#') === 0;
$attrs_link['class'][] = 'uk-position-cover';

?>
<div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
    <div<?= Uikit::attrs($attrs_container) ?>>

        <?php if ($data['image_box_shadow_bottom']) : ?>
        <div class="uk-inline-clip">
            <?php endif ?>

            <?= $data['image'] ?>

            <?php if ($data['overlay_mode'] == 'cover' && $data['overlay_style']) : ?>
                <div<?= Uikit::attrs($attrs_overlay) ?>></div>
            <?php endif ?>

            <?php if ($data['title'] || $data['meta'] || $data['content']) : ?>

                <?php if ($attrs_center) : ?>
                    <div<?= Uikit::attrs($attrs_center) ?>>
                <?php endif ?>

                <div<?= Uikit::attrs($attrs_content, !($data['overlay_mode'] == 'cover' && $data['overlay_style']) ? $attrs_overlay : []) ?>>
                    <?= $this->render('overlay/content', compact('data')) ?>
                </div>

                <?php if ($attrs_center) : ?>
                    </div>
                <?php endif ?>

            <?php endif ?>

            <?php if ($data['link']) : ?>
                <a<?= Uikit::attrs($attrs_link) ?>></a>
            <?php endif ?>

            <?php if ($data['image_box_shadow_bottom']) : ?>
        </div>
    <?php endif ?>

    </div>
</div>