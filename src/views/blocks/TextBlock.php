<?php
use trk\uikit\Uikit;
/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */
?>
<?php if($this->varValue('content')): ?>
    <?php
    $configs = Uikit::configs($this);

    $id    = $this->cfgValue('id');
    $class = $configs['class'];
    $attrs = $configs['attrs'];

    // Column
    if ($this->cfgValue('column') && $this->cfgValue('column_breakpoint')) {
        $class[] = "uk-column-{$this->cfgValue('column')}@{$this->cfgValue('column_breakpoint')}";
        $breakpoints = [
            's'  => [''],
            'm'  => ['s',''],
            'l'  => ['m','s',''],
            'xl' => ['l','m','s','']
        ];
        $breakpoints = $breakpoints[$this->cfgValue('column_breakpoint')];
        list($base, $columns) = explode('-', $this->cfgValue('column'));
        foreach ($breakpoints as $breakpoint) {
            if ($columns < 2) {
                break;
            }
            $class[] = 'uk-column-1-'.(--$columns).($breakpoint ? "@{$breakpoint}" : '');
        }
    } else if ($this->cfgValue('column')) {
        $class[] = "uk-column-{$this->cfgValue('column')}";
    }
    $class[] = ($this->cfgValue('column') && $this->cfgValue('column_divider')) ? 'uk-column-divider' : '';
    // Drop Cap
    $class[] = $this->cfgValue('dropcap') ? 'uk-dropcap' : '';
    // Style
    $class[] = $this->cfgValue('text_style') ? "uk-text-{$this->cfgValue('text_style')}" : '';
    // Color
    $class[] = !$this->cfgValue('text_style') && $this->cfgValue('text_color') ? "uk-text-{$this->cfgValue('text_color')}" : '';
    // Size
    $class[] = !$this->cfgValue('text_style') && $this->cfgValue('text_size') ? "uk-text-{$this->cfgValue('text_size')}" : '';
    ?>
    <div<?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
        <?= $this->varValue('content') ?>
    </div>
<?php endif; ?>