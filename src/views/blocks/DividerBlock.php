<?php
use trk\uikit\Uikit;
/**
 * @var $this \luya\cms\base\PhpBlockView
 *
 */
$configs = Uikit::configs($this);

$id    = $this->cfgValue('id');
$class = $configs['class'];
$attrs = $configs['attrs'];

// Style
$class[] = $this->varValue('divider_style') ? "uk-divider-{$this->varValue('divider_style')}" : '';
$class[] = !$this->varValue('divider_style') && $this->varValue('divider_element') == 'div' ? 'uk-hr' : '';
// Alignment
if ($this->varValue('divider_style') == 'small') {
    if ($this->cfgValue('divider_align') && $this->cfgValue('divider_align') != 'justify' && $this->cfgValue('divider_align_breakpoint')) {
        $class[] = "uk-text-{$this->cfgValue('divider_align')}@{$this->cfgValue('divider_align_breakpoint')}";
        if ($this->cfgValue('divider_align_fallback')) {
            $class[] = "uk-text-{$this->cfgValue('divider_align_fallback')}";
        }
    } else if ($this->cfgValue('divider_align')) {
        $class[] = "uk-text-{$this->cfgValue('divider_align')}";
    }
}
?>
<?php if ($this->varValue('divider_element') == 'div') : ?>
    <div <?= Uikit::attrs(compact('id', 'class'), $attrs) ?>></div>
<?php else : ?>
    <hr <?= Uikit::attrs(compact('id', 'class'), $attrs) ?>>
<?php endif ?>