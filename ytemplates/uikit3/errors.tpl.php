<div class="uk-alert-danger" uk-alert>

<?php
if ($this->objparams['warning_messages'] || $this->objparams['unique_error']):
    if ($this->objparams['Error-occured']): ?>

            <a class="uk-alert-close" uk-close></a>
           <?php echo $this->objparams['Error-occured'] ?>

                <ul>
    <?php else: ?>
 <a class="uk-alert-close" uk-close></a>
                <ul>
    <?php endif; ?>
                    <?php

    $warning_messages = [];
    foreach ($this->objparams['warning_messages'] as $k => $v) {
        $message = rex_i18n::translate("$v", null);
        if ($message == '' && isset($this->objparams['values'][$k])) {
            $message = rex_addon::get('yform')->i18n('yform_values_message_is_missing', $this->objparams['values'][$k]->getLabel(), $this->objparams['values'][$k]->getName());
        }
        $warning_messages[rex_i18n::translate("$v", null)] = '<li>' . $message . '</li>';
    }
    if (count($warning_messages) > 0) {
        echo implode('', $warning_messages);
    }

    if ($this->objparams['unique_error'] != '') {
        echo '<li>'.rex_i18n::translate(preg_replace('~\\*|:|\\(.*\\)~Usim', '', $this->objparams['unique_error'])).'</li>';
    }

    ?>
                </ul>
    <?php if ($this->objparams['Error-occured']): ?>


    <?php endif;
endif;
?>
</div>
