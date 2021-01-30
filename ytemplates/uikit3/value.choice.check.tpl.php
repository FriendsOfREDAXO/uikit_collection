<?php

/** @var rex_yform_choice_list $choiceList */
/** @var rex_yform_choice_list_view $choiceListView */

$notices = [];
if ($this->getElement('notice')) {
    $notices[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notices[] = '<span class="text-warning">'.rex_i18n::translate($this->params['warning_messages'][$this->getId()], false).'</span>';
}

$elementType = $choiceList->isMultiple() ? 'checkbox' : 'radio';
$uk_warning = $this->getWarningClass() ? ' uk-form-danger' : '';

$groupAttributes['class'] = 'form-check-group';
$elementAttributes['class'] = trim($elementType.' '.'uk-form-controls '.$this->getWarningClass().$uk_warning);


?>

<?php $choiceOutput = function (rex_yform_choice_view $view) use ($elementAttributes, $elementType) { ?>
    <div<?= rex_string::buildAttributes($elementAttributes) ?>>
        <label class="uk-form-label">
            <input class="uk-<?= $elementType ?>"
                value="<?= rex_escape($view->getValue()) ?>"
                <?= (in_array($view->getValue(), $this->getValue(), true) ? ' checked="checked"' : '') ?>
                <?= $view->getAttributesAsString() ?>
            />
            <i class="form-helper"></i>
            <?= rex_escape($view->getLabel()) ?>
        </label>
    </div>
<?php } ?>

<?php $choiceGroupOutput = function (rex_yform_choice_group_view $view) use ($choiceOutput) { ?>
    <div class="form-check-group">
        <label><?= rex_escape($view->getLabel()) ?></label>
        <?php foreach ($view->getChoices() as $choiceView): ?>
            <?php $choiceOutput($choiceView) ?>
        <?php endforeach ?>
    </div>
<?php } ?>

<div<?= rex_string::buildAttributes($groupAttributes) ?>>
    <?php if ($this->getLabel()): ?>
        <label class="form-control-label uk-form-label" for="<?= $this->getFieldId() ?>">
            <?= rex_escape($this->getLabelStyle($this->getLabel())) ?>
        </label>
    <?php endif ?>

    <?php foreach ($choiceListView->getPreferredChoices() as $view): ?>
        <?php $view instanceof rex_yform_choice_group_view ? $choiceGroupOutput($view) : $choiceOutput($view) ?>
    <?php endforeach ?>

    <?php foreach ($choiceListView->getChoices() as $view): ?>
        <?php $view instanceof rex_yform_choice_group_view ? $choiceGroupOutput($view) : $choiceOutput($view) ?>
    <?php endforeach ?>

    <?php if ($notices): ?>
        <p class="help-block"><?= implode('<br />', $notices) ?></p>
    <?php endif ?>
</div>
