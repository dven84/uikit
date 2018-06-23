<?php

use trk\uikit\Uikit;

/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

$main = $this->placeholderValue('main');
$image = Uikit::link($this->varValue('image'), $this->extraValue('image'));
$video = Uikit::link($this->varValue('video'), $this->extraValue('video'));
?>
<?php if($main && isset($configs)): ?>
    <?php
    $id    = $configs['id'];
    $class = $configs['class'];

    $configs['image'] = Uikit::element('href', $image, '');
    $configs['video'] = Uikit::element('href', $video, '');

    $style = [];
    $attrs = [
        'uk-scrollspy' => $configs['animation'] ? json_encode([
            'target' => '[uk-scrollspy-class]',
            'cls' => "uk-animation-{$configs['animation']}",
            'delay' => $configs['animation_delay'] ? 300 : false,
        ]) : false,
        'avb-header-transparent' => $configs['header_transparent'] ? $configs['header_transparent'] : false,
        'avb-header-transparent-placeholder' => $configs['header_transparent'] && !$configs['header_transparent_noplaceholder']
    ];
    $attrs_overlay = [];
    $attrs_container = [];
    $attrs_viewport_height = [];
    $attrs_image = [];
    $attrs_video = [];
    $attrs_section = [];
    $attrs_section_title = [];
    $attrs_section_title_container = [];

    // Section
    $class[] = "uk-section-{$configs['style']}";
    $class[] = $configs['overlap'] ? 'uk-section-overlap' : '';
    $attrs_section['class'][] = 'uk-section';

    // Section Title
    if ($configs['title']) {
        $attrs_section_title_container['class'][] = 'uk-position-relative';
        $attrs_section_title_container['class'][] = $configs['height'] ? 'uk-height-1-1' : '';
        $attrs_section_title['class'][] = 'avb-section-title';
        $attrs_section_title['class'][] = "uk-position-{$configs['title_position']} uk-position-medium";
        $attrs_section_title['class'][] = !in_array($configs['title_position'], ['center-left', 'center-right']) ? 'uk-margin-remove-vertical' : 'uk-text-nowrap';
        $attrs_section_title['class'][] = $configs['title_breakpoint'] ? "uk-visible@{$configs['title_breakpoint']}" : '';
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
            $class[] = 'uk-position-relative';
            $attrs_overlay['style'] = "background-color: {$configs['media_overlay']};";
        }
    }

    // Video
    if ($configs['video'] && !$configs['image']) {
        // Settings
        $style[] = $configs['media_background'] ? "background-color: {$configs['media_background']};" : '';
        $attrs_video['class'][] = $configs['media_blend_mode'] ? "uk-blend-{$configs['media_blend_mode']}" : '';
        // Cover
        $class[] = 'uk-cover-container';
        $attrs_video['uk-cover'] = true;
        // Overlay
        $attrs_overlay['style'] = $configs['media_overlay'] ? "background-color: {$configs['media_overlay']};" : '';
        // Video
        $attrs_video['width'] = $configs['video_width'];
        $attrs_video['height'] = $configs['video_height'];
        if ($iframe = Uikit::iframeVideo($configs['video'])) {
            $attrs_video['src'] = $iframe;
            $attrs_video['frameborder'] = '0';
            $attrs_video['allowfullscreen'] = true;
            $configs['video'] = "<iframe" . Uikit::attrs($attrs_video) . "></iframe>";
        } else if ($configs['video']) {
            $attrs_video['src'] = $configs['video'];
            $attrs_video['controls'] = false;
            $attrs_video['loop'] = true;
            $attrs_video['autoplay'] = true;
            $attrs_video['muted'] = true;
            $attrs_video['playsinline'] = true;
            $element['video'] = "<video" . Uikit::attrs($attrs_video) . "></video>";
        }
    } else {
        $configs['video'] = '';
    }
    // Text color
    if ($configs['style'] == 'primary' || $configs['style'] == 'secondary') {
        $class[] = $configs['preserve_color'] ? 'uk-preserve-color' : '';
    } elseif ($configs['image'] || $configs['video']) {
        $class[] = $configs['text_color'] ? "uk-{$configs['text_color']}" : '';
    }
    // Padding
    switch ($configs['padding']) {
        case '':
            break;
        case 'none':
            $attrs_section['class'][] = 'uk-padding-remove-vertical';
            break;
        default:
            $attrs_section['class'][] = "uk-section-{$configs['padding']}";
    }
    if ($configs['padding'] != 'none') {
        if ($configs['padding_remove_top']) {
            $attrs_section['class'][] = 'uk-padding-remove-top';
        }
        if ($configs['padding_remove_bottom']) {
            $attrs_section['class'][] = 'uk-padding-remove-bottom';
        }
    }
    // Height Viewport
    if ($configs['height']) {
        if ($configs['height'] == 'expand') {
            $attrs_section['uk-height-viewport'] = 'expand: true';
        } else {
            // Vertical alignment
            if ($configs['vertical_align']) {
                if ($configs['title']) {
                    $attrs_section_title_container['class'][] = "uk-flex uk-flex-{$configs['vertical_align']}";
                } else {
                    $attrs_section['class'][] = "uk-flex uk-flex-{$configs['vertical_align']}";
                }
                $attrs_viewport_height['class'][] = 'uk-width-1-1';
            }
            $options = ['offset-top: true'];
            switch ($configs['height']) {
                case 'percent':
                    $options[] = 'offset-bottom: 20';
                    break;
                case 'section':
                    $options[] = $configs['image'] ? 'offset-bottom: ! +' : 'offset-bottom: true';
                    break;
            }
            $attrs_section['uk-height-viewport'] = implode(';', array_filter($options));
        }
    }
    // Container and width
    switch ($configs['width']) {
        case 'default':
            $attrs_container['class'][] = 'uk-container';
            break;
        case 'small':
        case 'large':
        case 'expand':
            $attrs_container['class'][] = "uk-container uk-container-{$configs['width']}";
            break;
        // Deprecated
        case 1:
            $attrs_container['class'][] = 'uk-container';
            break;
        case 2:
            $attrs_container['class'][] = 'uk-container uk-container-small';
            break;
        case 3:
            $attrs_container['class'][] = 'uk-container uk-container-expand';
    }
    // Make sure overlay and video is always below content
    if ($attrs_overlay || $configs['video']) {
        $attrs_container['class'][] = $configs['width'] ? 'uk-position-relative' : 'uk-position-relative uk-panel';
    }
    // Visibility
    $visible = 4;
    $visibilities = ['xs', 's', 'm', 'l', 'xl'];

    if ($visible) {
        $configs['visibility'] = $visibilities[$visible];
        $class[] = "uk-visible@{$visibilities[$visible]}";
    }
    ?>
    <div<?= Uikit::attrs(compact('id', 'class', 'style'), $attrs, !$attrs_image ? $attrs_section : []) ?>>
        <?php if ($attrs_image) : ?>
        <div<?= Uikit::attrs($attrs_image, $attrs_section) ?>>
            <?php endif ?>
            <?= $configs['video'] ?>
            <?php if ($attrs_overlay) : ?>
                <div class="uk-position-cover"<?= Uikit::attrs($attrs_overlay) ?>></div>
            <?php endif ?>
            <?php if ($configs['title']) : ?>
            <div<?= Uikit::attrs($attrs_section_title_container) ?>>
                <?php endif ?>
                <?php if ($attrs_viewport_height) : ?>
                <div<?= Uikit::attrs($attrs_viewport_height) ?>>
                    <?php endif ?>
                    <?php if ($attrs_container) : ?>
                    <div<?= Uikit::attrs($attrs_container) ?>>
                        <?php endif ?>
                        <?= $main ?>
                        <?php if ($attrs_container) : ?>
                    </div>
                <?php endif ?>
                    <?php if ($attrs_viewport_height) : ?>
                </div>
            <?php endif ?>
                <?php if ($configs['title']) : ?>
                <div<?= Uikit::attrs($attrs_section_title) ?>>
                    <div class="<?= $configs['title_rotation'] == 'left' ? 'avb-rotate-180' : '' ?>"><?= $configs['title'] ?></div>
                </div>
            </div>
        <?php endif ?>
            <?php if ($attrs_image) : ?>
        </div>
    <?php endif ?>
    </div>
<?php endif; ?>