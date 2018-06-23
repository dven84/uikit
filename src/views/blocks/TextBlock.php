<?php
use trk\uikit\Uikit;
/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */

if(isset($configs) && $configs['content']):

    $id    = $configs['id'];
    $class = $configs['class'];
    $attrs = $configs['attrs'];
    // Column
    if ($configs['column'] && $configs['column_breakpoint']) {
        $class[] = "uk-column-{$configs['column']}@{$configs['column_breakpoint']}";
        $breakpoints = [
            's'  => [''],
            'm'  => ['s',''],
            'l'  => ['m','s',''],
            'xl' => ['l','m','s','']
        ];
        $breakpoints = $breakpoints[$configs['column_breakpoint']];
        list($base, $columns) = explode('-', $configs['column']);
        foreach ($breakpoints as $breakpoint) {
            if ($columns < 2) {
                break;
            }
            $class[] = 'uk-column-1-'.(--$columns).($breakpoint ? "@{$breakpoint}" : '');
        }
    } else if ($configs['column']) {
        $class[] = "uk-column-{$configs['column']}";
    }
    $class[] = ($configs['column'] && $configs['column_divider']) ? 'uk-column-divider' : '';
    // Drop Cap
    $class[] = $configs['dropcap'] ? 'uk-dropcap' : '';
    // Style
    $class[] = $configs['text_style'] ? "uk-text-{$configs['text_style']}" : '';
    // Color
    $class[] = !$configs['text_style'] && $configs['text_color'] ? "uk-text-{$configs['text_color']}" : '';
    // Size
    $class[] = !$configs['text_style'] && $configs['text_size'] ? "uk-text-{$configs['text_size']}" : '';
    ?>
    <div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
        <?= $configs['content'] ?>
    </div>
<?php endif; ?>