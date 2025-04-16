<?php

/**
 * @var rex_yform $this
 * @psalm-scope-this rex_yform
 */

$template = '';

if ($this->objparams['warning_messages'] || $this->objparams['unique_error']): ?>
    <div class="uk-alert-danger" uk-alert>
        <p><?= $this->objparams['Error-occured'] ?></p>
        <ul>
        <?php

        foreach ($this->objparams['warning_messages'] as $k => $v) {
            echo '<li>'. rex_i18n::translate($v, false) .'</li>';
        }

        if ($this->objparams['unique_error'] != '') {
            echo '<li>'. rex_i18n::translate($this->objparams['unique_error'], false) .'</li>';
        }

        ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($this->objparams['warning']): ?>
    <div class="uk-alert-danger" uk-alert>
        <?= $this->objparams['warning'] ?>
    </div>
<?php endif;

if ($this->objparams['info']): ?>
    <div class="uk-alert-primary" uk-alert>
        <?= $this->objparams['info'] ?>
    </div>
<?php endif;

if ($this->objparams['success']): ?>
    <div class="uk-alert-success" uk-alert>
        <?= $this->objparams['success'] ?>
    </div>
<?php endif;