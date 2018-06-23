<?php
use trk\uikit\Uikit;
/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

$image = $this->extraValue('image') && $this->extraValue('image')->source ? $this->extraValue('image')->source : '';
$link = Uikit::link($this->varValue('link'), $this->extraValue('link'));

if(isset($configs) && $image):

    $id    = $configs['id'];
    $class = $configs['class'];
    $attrs = $configs['attrs'];

    $attrs_image = [];
    $attrs_link = [];
    $lightbox = '';
    $attrs_lightbox = [];
    $connect_id = 'js-' . substr(uniqid(), -3);

    // Image
    $attrs_image['class'][] = $configs['image_border'] ? "uk-border-{$configs['image_border']}" : '';
    $attrs_image['class'][] = $configs['image_box_shadow'] ? "uk-box-shadow-{$configs['image_box_shadow']}" : '';
    $attrs_image['class'][] = is_array($link) && array_key_exists('value', $link) && $link['value'] && $configs['image_hover_box_shadow'] ? "uk-box-shadow-hover-{$configs['image_hover_box_shadow']}" : '';
    $attrs_image['alt'] = $configs['image_alt'];

    if (Uikit::isImage($image) == 'gif') {
        $attrs_image['data-uk-gif'] = true;
    }

    if (Uikit::isImage($image) == 'svg') {
        $image = Uikit::image($image, array_merge($attrs_image, ['width' => $configs['image_width'], 'height' => $configs['image_height']]));
    } elseif ($configs['image_width'] || $configs['image_height']) {
        $image = Uikit::image([$image, 'thumbnail' => [$configs['image_width'], $configs['image_height']], 'sizes' => '80%,200%'], $attrs_image);
    } else {
        $image = Uikit::image($image, $attrs_image);
    }

    // Link and Lightbox
    if ($link['value'] && $configs['link_target'] == 'modal') {
        if (Uikit::isImage($link['href'])) {
            $attrs_lightbox['alt'] = '';
            if (Uikit::isImage($link['href']) == 'svg') {
                $lightbox = Uikit::image($link['href'], array_merge($attrs_lightbox, ['width' => $configs['lightbox_width'], 'height' => $configs['lightbox_height']]));
            } elseif ($configs['lightbox_width'] || $configs['lightbox_height']) {
                $lightbox = Uikit::image([$link['href'], 'thumbnail' => [$configs['lightbox_width'], $configs['lightbox_height']], 'sizes' => '80%,200%'], $attrs_lightbox);
            } else {
                $lightbox = Uikit::image($link['href'], $attrs_lightbox);
            }
        } elseif ($iframe = Uikit::iframeVideo($link['href']) or Uikit::isVideo($link['href'])) {
            $attrs_lightbox['width'] = $configs['lightbox_width'];
            $attrs_lightbox['height'] = $configs['lightbox_height'];
            $attrs_lightbox['data-uk-video'] = true;
            if ($iframe) {
                $attrs_lightbox['src'] = $iframe;
                $attrs_lightbox['frameborder'] = 0;
                $lightbox = "<iframe" . Uikit::attrs($attrs_lightbox) . "></iframe>";
            } else {
                $attrs_lightbox['src'] = $link['href'];
                $attrs_lightbox['controls'] = true;
                $lightbox = "<video" . Uikit::attrs($attrs_lightbox) . "></video>";
            }
        } else {
            $attrs_lightbox['src'] = $link['href'];
            $attrs_lightbox['width'] = $configs['lightbox_width'];
            $attrs_lightbox['height'] = $configs['lightbox_height'];
            $attrs_lightbox['frameborder'] = 0;
            $lightbox = "<iframe" . Uikit::attrs($attrs_lightbox) . "></iframe>";
        }
        $attrs_link['data-uk-toggle'] = true;
        $link['href'] = "#{$connect_id}";
    } else {
        $attrs_link['target'] = $link['target'] == '_blank' ? '_blank' : '';
        $attrs_link['data-uk-scroll'] = strpos($link['href'], '#') === 0;
    }

    // Box-shadow bottom
    if ($configs['image_box_shadow_bottom']) {
        if ($link['value']) {
            $attrs_link['class'][] = 'uk-box-shadow-bottom';
        } else {
            $image = "<div class=\"uk-box-shadow-bottom\">{$image}</div>";
        }
    }

    ?>
    <div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
        <?php if ($link['href']) : ?>
            <?= Uikit::link_tag($image, $link['href'], $attrs_link) ?>
        <?php else : ?>
            <?= $image ?>
        <?php endif ?>
        <?php if ($lightbox && $configs['link_target'] == 'modal') : ?>
            <?php // uk-flex-top is needed to make vertical margin work for IE11 ?>
            <div id="<?= $connect_id ?>" class="uk-flex-top" data-uk-modal="">
                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-outside" type="button" data-uk-close=""></button>
                    <?= $lightbox ?>
                </div>
            </div>
        <?php endif ?>
    </div>
<?php endif; ?>