<?php
/**
 Admin Page Framework v3.5.11 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class TaskScheduler_AdminPageFramework_Form_Model_Import extends TaskScheduler_AdminPageFramework_Router {
    protected function _importOptions($aStoredOptions, $sPageSlug, $sTabSlug) {
        $_oImport = new TaskScheduler_AdminPageFramework_ImportOptions($_FILES['__import'], $_POST['__import']);
        $_aArguments = array('class_name' => $this->oProp->sClassName, 'page_slug' => $sPageSlug, 'tab_slug' => $sTabSlug, 'section_id' => $_oImport->getSiblingValue('section_id'), 'pressed_field_id' => $_oImport->getSiblingValue('field_id'), 'pressed_input_id' => $_oImport->getSiblingValue('input_id'), 'should_merge' => $_oImport->getSiblingValue('is_merge'),);
        if ($_oImport->getError() > 0) {
            $this->setSettingNotice($this->oMsg->get('import_error'));
            return $aStoredOptions;
        }
        $_aMIMEType = $this->_getImportMIMEType($_aArguments);
        $_sType = $_oImport->getType();
        if (!in_array($_sType, $_aMIMEType)) {
            $this->setSettingNotice(sprintf($this->oMsg->get('uploaded_file_type_not_supported'), $_sType));
            return $aStoredOptions;
        }
        $_mData = $_oImport->getImportData();
        if (false === $_mData) {
            $this->setSettingNotice($this->oMsg->get('could_not_load_importing_data'));
            return $aStoredOptions;
        }
        $_sFormatType = $this->_getImportFormatType($_aArguments, $_oImport->getFormatType());
        $_oImport->formatImportData($_mData, $_sFormatType);
        $_sImportOptionKey = $this->_getImportOptionKey($_aArguments, $_oImport->getSiblingValue('option_key'));
        $_mData = $this->_getFilteredImportData($_aArguments, $_mData, $aStoredOptions, $_sFormatType, $_sImportOptionKey);
        $this->_setImportAdminNotice(empty($_mData));
        if ($_sImportOptionKey != $this->oProp->sOptionKey) {
            update_option($_sImportOptionKey, $_mData);
            return $aStoredOptions;
        }
        return $_aArguments['should_merge'] ? $this->oUtil->uniteArrays($_mData, $aStoredOptions) : $_mData;
    }
    private function _setImportAdminNotice($bEmpty) {
        $this->setSettingNotice($bEmpty ? $this->oMsg->get('not_imported_data') : $this->oMsg->get('imported_data'), $bEmpty ? 'error' : 'updated', $this->oProp->sOptionKey, false);
    }
    private function _getImportMIMEType(array $aArguments) {
        return $this->_getFilteredItemForPortByPrefix('import_mime_types_', array('text/plain', 'application/octet-stream'), $aArguments);
    }
    private function _getImportFormatType(array $aArguments, $sFormatType) {
        return $this->_getFilteredItemForPortByPrefix('import_format_', $sFormatType, $aArguments);
    }
    private function _getImportOptionKey(array $aArguments, $sImportOptionKey) {
        return $this->_getFilteredItemForPortByPrefix('import_option_key_', $sImportOptionKey, $aArguments);
    }
    private function _getFilteredImportData(array $aArguments, $mData, $aStoredOptions, $sFormatType, $sImportOptionKey) {
        return $this->oUtil->addAndApplyFilters($this, $this->_getPortFilterHookNames('import_', $aArguments), $mData, $aStoredOptions, $aArguments['pressed_field_id'], $aArguments['pressed_input_id'], $sFormatType, $sImportOptionKey, $aArguments['should_merge'] . $this);
    }
    protected function _getFilteredItemForPortByPrefix($sPrefix, $mFilteringValue, array $aArguments) {
        return $this->oUtil->addAndApplyFilters($this, $this->_getPortFilterHookNames($sPrefix, $aArguments), $mFilteringValue, $aArguments['pressed_field_id'], $aArguments['pressed_input_id'], $this);
    }
    protected function _getPortFilterHookNames($sPrefix, array $aArguments) {
        return array($sPrefix . $aArguments['class_name'] . '_' . $aArguments['pressed_input_id'], $aArguments['section_id'] ? $sPrefix . $aArguments['class_name'] . '_' . $aArguments['section_id'] . '_' . $aArguments['pressed_field_id'] : $sPrefix . $aArguments['class_name'] . '_' . $aArguments['pressed_field_id'], $aArguments['section_id'] ? $sPrefix . $aArguments['class_name'] . '_' . $aArguments['section_id'] : null, $aArguments['tab_slug'] ? $sPrefix . $aArguments['page_slug'] . '_' . $aArguments['tab_slug'] : null, $sPrefix . $aArguments['page_slug'], $sPrefix . $aArguments['class_name']);
    }
}