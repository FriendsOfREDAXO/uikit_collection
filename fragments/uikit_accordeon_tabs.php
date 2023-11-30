<?php
/**
 * @var rex_fragment $this
 * @psalm-scope-this rex_fragment
 */

if (isset($this->help) && $this->help === true) {
    $help = [];
    $help['info']  = 'Nimmt ein Array an und erstellt eine Tab oder Akkordeon Liste';
    $help['type']  = 'Bei 1 > Akkordeon, bei 2 Tabs';
    $help['items'] = 'Array mit den Keys title, body, media';
    dump($help);
}
$values = [];

if (isset($this->items) && is_array($this->items)) {
    $values = array_filter($this->items);
}
$type = 1;
if (isset($this->type)) {
    $type = $this->type;
}
?>
<?php if ($type === '1') : ?>
    <div uk-accordion>
        <?php
        /** @var array<int, array<string, string>> $values */
        foreach ($values as $value) : ?>
            <div>
                <?php if ($value['titel'] !== '') : ?>
                    <a href="#" tabindex="0" class="uk-accordion-title uk-background-muted uk-padding-small"><?= $value['titel'] ?></a>
                <?php endif; ?>
                <div class="uk-accordion-content uk-background-muted uk-margin-remove uk-padding-small">
                    <?php if ($value['text'] !== '') : ?>
                       <div><?= $value['text'] ?></div>
                    <?php endif; ?>
                    
                    <?php if($value['media']!='') {
                    $fragment = new rex_fragment();
                    $fragment->setVar('media', $value['media'], false);
                    echo $fragment->parse('uikit_gallery.php');
                    }?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php elseif ($type === '2') : ?>
    <div class="uk-margin-medium-top">
        <div class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
            <?php
            /** @var array<int, array<string, string>> $values */
            foreach ($values as $value) : ?>
                <?php if ($value['titel'] !== '') : ?>
                    <div><a tabindex="0" href="#"><?= $value['titel'] ?></a></div>
                <?php endif; ?>
            <?php endforeach ?>
        </div>
        <div class="uk-switcher uk-margin">
            <?php
            /** @var array<int, array<string, string>> $values */
            foreach ($values as $value) : ?>
                <?php if ($value['text'] !== '') : ?>
                    <div><?= $value['text'] ?></div>
                <?php endif; ?>
                
                <?php if($value['media']!='') {
                    $fragment = new rex_fragment();
                    $fragment->setVar('media', $value['media'], false);
                    echo $fragment->parse('uikit_gallery.php');
                    }?>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
