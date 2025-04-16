<?php

/**
 * @var rex_yform_value_be_manager_relation $this
 * @psalm-scope-this rex_yform_value_be_manager_relation
 */

$options ??= [];
$link ??= '';
$valueName ??= '';

$class_group = trim('uk-margin ' . $this->getHTMLClass() . ' ' . $this->getWarningClass());

$id = sprintf('%u', crc32($this->params['form_name'] . random_int(0, 100) . $this->getId()));

$notice = [];
if ('' != $this->getElement('notice')) {
    $notice[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notice[] = '<span class="uk-text-danger">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], false) . '</span>';
}
if (count($notice) > 0) {
    $notice = '<p class="uk-form-help-block uk-text-small">' . implode('<br />', $notice) . '</p>';
} else {
    $notice = '';
}

$class_label = ['uk-form-label'];
if ($this->getElement('required')) {
    $class_label[] = 'uk-form-required';
}

?>
<?php if ($this->getRelationType() < 2): ?>
    <div data-be-relation-wrapper="<?= $this->getFieldName() ?>" class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
        <label class="<?= implode(' ', $class_label) ?>" for="<?= $this->getFieldId() ?>"><?= $this->getLabel() ?></label>
        <div class="uk-form-controls">
        <?php

        $attributes = [];
        $attributes['class'] = 'uk-select';
        if ($this->getWarningClass()) {
            $attributes['class'] .= ' uk-form-danger';
        }
        $attributes['id'] = $this->getFieldId();

        $select = new rex_select();

        if (1 == $this->getRelationType()) {
            $select->setName($this->getFieldName() . '[]');
            $select->setMultiple();
            $select->setSize($this->getRelationSize());
        } else {
            $select->setName($this->getFieldName());
        }

        $attributes = $this->getAttributeArray($attributes, ['required', 'readonly', 'disabled']);

        $select->setAttributes($attributes);
        foreach ($options as $option) {
            $select->addOption($option['name'], $option['id']);
        }

        $select->setSelected($this->getValue());
        echo $select->get();
        ?>
        <?= $notice ?>
        </div>
    </div>
<?php else: ?>
    <div data-be-relation-wrapper="<?= $this->getFieldName() ?>" class="<?= $class_group ?>" id="<?= $this->getHTMLId() ?>">
        <label class="<?= implode(' ', $class_label) ?>" for="<?= $this->getFieldId() ?>"><?= $this->getLabel() ?></label>
        <div class="uk-form-controls">
        <?php
        $e = [];
        if (4 == $this->getRelationType()) {
            echo \rex_var_yform_table_data::getRelationWidget($id, $this->getFieldName(), $this->getValue(), $link, $this->params['main_id']);
        } elseif (2 == $this->getRelationType()) {
            $name = $this->getFieldName();
            $args = [];
            $args['link'] = $link;
            $args['fieldName'] = $this->getRelationSourceTableName() . '.' . $this->getName();
            $args['valueName'] = $valueName;
            $value = implode(',', $this->getValue());
            echo \rex_var_yform_table_data::getSingleWidget($id, $name, $value, $args);
        } else {
            $name = $this->getFieldName();
            $args = [];
            $args['link'] = $link;
            $args['options'] = $options;
            $args['fieldName'] = $this->getRelationSourceTableName() . '.' . $this->getName();
            $args['size'] = $this->getRelationSize();
            $args['attributes'] = $this->getAttributeArray([], ['required', 'readonly']);
            $value = implode(',', $this->getValue());
            echo \rex_var_yform_table_data::getMultipleWidget($id, $name, $value, $args);
        }
        ?>
        <?= $notice ?>
        </div>
    </div>
<?php endif;