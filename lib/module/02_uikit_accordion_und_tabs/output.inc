<?php
$values = rex_var::toArray("REX_VALUE[1]");
$type = 'REX_VALUE[20]';
?>


<?php if ($type == 1) : ?>
    <div class="accordion_container">
        <div uk-accordion>
            <?php foreach ($values as $i=>$value) : ?>
                <div<?= $i == 0 ? ' class="uk-open"' : '' ?>>
                    <h3 class="uk-accordion-title"><?= $value['titel'] ?></h3>
                    <div class="uk-accordion-content">
                        <p><?= $value['text'] ?></p>
                    </div>
                </div>';
            <?php endforeach ?>
        </div>
    </div>
<?php elseif ($type == 2) : ?>
    <div class="tabs_container">
        <div class="uk-margin-medium-top">
            <div class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
            <?php foreach ($values as $value) : ?>
               <div><a href="#"><?= $value['title'] ?></a></div>
            <?php endforeach ?>
            </div>
            <div class="uk-switcher uk-margin">
            <?php foreach ($values as $value) : ?>
                <div><?= $value['text'] ?></div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>
