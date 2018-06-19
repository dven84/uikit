<?php

namespace trk\uikit;


class Uikit
{
    /**
     * Set general block configs for view
     *
     * @param $object
     * @return array
     */
    public static function configs($object) {
        $configs = [
            'attrs' => [],
            'class' => []
        ];
        // Set class
        if($class = $object->cfgValue('class')) $configs['class'][] = $class;
        // Animation
        $animation = $object->cfgValue('animation');
        // if ($animation && $configs['animation'] != 'none' && $configs['animation'] != 'parallax' && $element->parent('section', 'animation') && $element->parent->type == 'column') {
        if ($animation && $animation != 'none' && $animation != 'parallax') {
            $configs['attrs']['data-uk-scrollspy-class'] = $animation ? "uk-animation-{$animation}" : true;
        }

        // Parallax
        // if ($animation && $animation == 'parallax' || $configs['item_animation'] == 'parallax') {
        if ($animation && $animation == 'parallax') {

            foreach(['x', 'y', 'scale', 'rotate', 'opacity'] as $prop) {
                $start = $object->cfgValue("parallax_{$prop}_start");
                $end = $object->cfgValue("parallax_{$prop}_end");
                $default = in_array($prop, ['scale', 'opacity']) ? 1 : 0;

                if (strlen($start) || strlen($end)) {
                    $options[] = "{$prop}: " . (strlen($start) ? $start : $default) . "," . (strlen($end) ? $end : $default);
                }
            }

            $options[] = is_numeric($object->cfgValue('parallax_easing')) ? "easing: {$object->cfgValue('parallax_easing')}" : '';
            $options[] = $object->cfgValue('parallax_target') ? 'target: !.uk-section' : '';
            $options[] = is_numeric($object->cfgValue('parallax_viewport')) ? "viewport: {$object->cfgValue('parallax_viewport')}" : '';
            $options[] = $object->cfgValue('parallax_breakpoint') ? "media: @{$object->cfgValue('parallax_breakpoint')}" : '';
            $configs['attrs']['data-uk-parallax'] = implode(';', array_filter($options));
        }

        // Visibility
        $visibility = $object->cfgValue('visibility');
        if ($visibility) {
            switch ($visibility) {
                case 's':
                    $configs['class'][] = 'uk-visible@s';
                    break;
                case 'm':
                    $configs['class'][] = 'uk-visible@m';
                    break;
                case 'l':
                    $configs['class'][] = 'uk-visible@l';
                    break;
                case 'xl':
                    $configs['class'][] = 'uk-visible@xl';
                    break;
                default:
                    $configs['class'][] = '';
                    break;
            }
        }

        // Margin
        $margin = $object->cfgValue('margin');
        if ($margin) {
            switch ($margin) {
                case '':
                    break;
                case 'default':
                    $configs['class'][] = 'uk-margin';
                    break;
                default:
                    $configs['class'][] = "uk-margin-{$margin}";
            }
        }

        if ($margin && $margin != 'remove-vertical') {
            $marginRemoveTop = $object->cfgValue('margin_remove_top');
            if ($marginRemoveTop) {
                $configs['class'][] = 'uk-margin-remove-top';
            }
            $marginRemoveBottom = $object->cfgValue('margin_remove_bottom');
            if ($marginRemoveBottom) {
                $configs['class'][] = 'uk-margin-remove-bottom';
            }
        }

        // Max Width
        $maxwidth = $object->cfgValue('maxwidth');
        if ($maxwidth) {
            $maxwidth_align = $object->cfgValue('maxwidth_align');
            $maxwidth_breakpoint = $object->cfgValue('maxwidth_breakpoint');
            switch ($maxwidth_breakpoint) {
                case 's':
                    $configs['class'][] = "uk-width-$maxwidth@s";
                    break;
                case 'm':
                    $configs['class'][] = "uk-width-$maxwidth@m";
                    break;
                case 'l':
                    $configs['class'][] = "uk-width-$maxwidth@l";
                    break;
                case 'xl':
                    $configs['class'][] = "uk-width-$maxwidth@xl";
                    break;
                default:
                    $configs['class'][] = "uk-width-$maxwidth";
                    break;
            }

            switch ($maxwidth_align) {
                case 'right':
                    $configs['class'][] = "uk-margin-auto-left";
                    break;
                case 'center':
                    $configs['class'][] = "uk-margin-auto";
                    break;
            }
        }

        // Text alignment
        $text_align = $object->cfgValue('text_align');
        $text_align_breakpoint = $object->cfgValue('text_align_breakpoint');
        if ($text_align && $text_align != 'justify' && $text_align_breakpoint) {
            $configs['class'][] = "uk-text-{$text_align}@{$text_align_breakpoint}";
            $text_align_fallback = $object->cfgValue('text_align_fallback');
            if ($text_align_fallback) {
                $configs['class'][] = "uk-text-{$text_align_fallback}";
            }
        } else if ($text_align) {
            $configs['class'][] = "uk-text-{$text_align}";
        }

        // Custom CSS
        /*
        $style = $this->Components->element('style', $this->configs, '');
        if ($style) {
            $pre = str_replace('#', '\#', $this->configs['id']);
            $css = $this->theme->get('css', '');
            $css .= self::prefix("{$style}\n", "#{$pre}");

            $this->theme->set('css', $css);
        }
        */

        return $configs;
    }

    /**
     * Render tag attributes
     *
     * @param array $attributes
     * @return string
     */
    public static function attrs(array $attributes) {
        $output = [];

        if (count($args = func_get_args()) > 1) {
            $attributes = call_user_func_array('array_merge_recursive', $args);
        }

        foreach ($attributes as $key => $value) {
            if (is_array($value)) {
                $value = implode(' ', array_filter($value));
            }

            if (empty($value) && !is_numeric($value)) {
                continue;
            }

            if (is_numeric($key)) {
                $output[] = $value;
            } elseif ($value === true) {
                $output[] = $key;
            } elseif ($value !== '') {
                $output[] = sprintf('%s="%s"', $key, htmlspecialchars($value, ENT_COMPAT, 'UTF-8', false));
            }
        }

        return $output ? ' '.implode(' ', $output) : '';
    }

    /**
     * Renders a link tag.
     *
     * @param  string $title
     * @param  string $url
     * @param  array  $attrs
     * @return string
     */
    public static function link_tag($title, $url = null, array $attrs = []) {
        return "<a" . self::attrs(['href' => $url], $attrs) . ">{$title}</a>";
    }

    /**
     * Element
     *
     * Lets you determine whether an array index is set and whether it has a value.
     * If the element is empty it returns NULL (or whatever you specify as the default value.)
     *
     * @param	string
     * @param	array
     * @param	mixed
     * @return	mixed	depends on what the array contains
     */
    public static function element($item, array $array, $default = NULL)
    {
        return Module::element($item, $array, $default);
    }

    /**
     * Simple debug function
     *
     * @param $var
     */
    public static function trace($var)
    {
        echo('<pre>');
        print_r($var);
        echo('</pre>');

    }
}