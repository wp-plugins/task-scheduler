<?php
/**
 Admin Page Framework v3.5.7b01 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class TaskScheduler_AdminPageFramework_FieldType_size extends TaskScheduler_AdminPageFramework_FieldType_select {
    public $aFieldTypeSlugs = array('size',);
    protected $aDefaultKeys = array('is_multiple' => false, 'units' => null, 'attributes' => array('size' => array('size' => 10, 'maxlength' => 400, 'min' => null, 'max' => null,), 'unit' => array('multiple' => null, 'size' => 1, 'autofocusNew' => null, 'required' => null,), 'optgroup' => array(), 'option' => array(),),);
    protected $aDefaultUnits = array('px' => 'px', '%' => '%', 'em' => 'em', 'ex' => 'ex', 'in' => 'in', 'cm' => 'cm', 'mm' => 'mm', 'pt' => 'pt', 'pc' => 'pc',);
    protected function getStyles() {
        return <<<CSSRULES
/* Size Field Type */
.admin-page-framework-field-size input {
    text-align: right;
}
.admin-page-framework-field-size select.size-field-select {
    vertical-align: 0px;     
}
.admin-page-framework-field-size label {
    width: auto;     
} 
.form-table td fieldset .admin-page-framework-field-size label {
    display: inline;
}
CSSRULES;
        
    }
    protected function getField($aField) {
        $aField['units'] = $this->getElement($aField, 'units', $this->aDefaultUnits);
        $_aBaseAttributes = $aField['attributes'];
        unset($_aBaseAttributes['unit'], $_aBaseAttributes['size']);
        return $aField['before_label'] . "<div class='admin-page-framework-input-label-container admin-page-framework-select-label' style='min-width: " . $this->sanitizeLength($aField['label_min_width']) . ";'>" . $this->_getNumberInputPart($aField, $_aBaseAttributes) . $this->_getUnitSelectInput($aField, $_aBaseAttributes) . "</div>" . $aField['after_label'];
    }
    private function _getNumberInputPart(array $aField, array $aBaseAttributes) {
        $_aSizeAttributes = $this->_getSizeAttributes($aField, $aBaseAttributes);
        $_aSizeLabelAttributes = array('for' => $_aSizeAttributes['id'], 'class' => $_aSizeAttributes['disabled'] ? 'disabled' : null,);
        return "<label " . $this->generateAttributes($_aSizeLabelAttributes) . ">" . $this->getElement($aField, array('before_label', 'size')) . ($aField['label'] && !$aField['repeatable'] ? "<span class='admin-page-framework-input-label-string' style='min-width:" . $this->sanitizeLength($aField['label_min_width']) . ";'>" . $aField['label'] . "</span>" : "") . "<input " . $this->generateAttributes($_aSizeAttributes) . " />" . $this->getElement($aField, array('after_input', 'size')) . "</label>";
    }
    private function _getUnitSelectInput(array $aField, array $aBaseAttributes) {
        $_aUnitAttributes = $this->_getUnitAttributes($aField, $aBaseAttributes);
        $_oUnitInput = $this->_getUnitInputObject($aField, $_aUnitAttributes);
        return "<label " . $this->generateAttributes(array('for' => $_aUnitAttributes['id'], 'class' => $_aUnitAttributes['disabled'] ? 'disabled' : null,)) . ">" . $this->getElement($aField, array('before_label', 'unit')) . $_oUnitInput->get() . $this->getElement($aField, array('after_input', 'unit')) . "<div class='repeatable-field-buttons'></div>" . "</label>";
    }
    private function _getUnitAttributes(array $aField, array $aBaseAttributes) {
        $_bIsMultiple = $aField['is_multiple'] ? true : ($aField['attributes']['unit']['multiple'] ? true : false);
        return array('type' => 'select', 'id' => $aField['input_id'] . '_' . 'unit', 'multiple' => $_bIsMultiple ? 'multiple' : null, 'name' => $_bIsMultiple ? "{$aField['_input_name']}[unit][]" : "{$aField['_input_name']}[unit]", 'value' => $this->getElement($aField, array('value', 'unit'), ''),) + $this->getElement($aField, array('attributes', 'unit'), $this->aDefaultKeys['attributes']['unit']) + $aBaseAttributes;
    }
    private function _getUnitInputObject(array $aField, array $aUnitAttributes) {
        $_aUnitField = array('label' => $aField['units'],) + $aField;
        $_aUnitField['attributes']['select'] = $aUnitAttributes;
        return new TaskScheduler_AdminPageFramework_Input_select($_aUnitField);
    }
    private function _getSizeAttributes(array $aField, array $aBaseAttributes) {
        return array('type' => 'number', 'id' => $aField['input_id'] . '_' . 'size', 'name' => $aField['_input_name'] . '[size]', 'value' => $this->getElement($aField, array('value', 'size'), ''),) + $this->getElement($aField, array('attributes', 'size'), $this->aDefaultKeys['attributes']['size']) + $aBaseAttributes;
    }
}