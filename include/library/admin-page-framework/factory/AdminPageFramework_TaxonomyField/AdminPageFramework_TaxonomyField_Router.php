<?php
/**
 Admin Page Framework v3.5.10b03 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class TaskScheduler_AdminPageFramework_TaxonomyField_Router extends TaskScheduler_AdminPageFramework_Factory {
    public function __construct($oProp) {
        parent::__construct($oProp);
        if ($this->oProp->bIsAdmin) {
            add_action('wp_loaded', array($this, '_replyToDetermineToLoad'));
        }
    }
    public function _isInThePage() {
        if ('admin-ajax.php' == $this->oProp->sPageNow) {
            return true;
        }
        if ('edit-tags.php' != $this->oProp->sPageNow) {
            return false;
        }
        if (isset($_GET['taxonomy']) && !in_array($_GET['taxonomy'], $this->oProp->aTaxonomySlugs)) {
            return false;
        }
        return true;
    }
    public function _replyToDetermineToLoad($oScreen) {
        if (!$this->_isInThePage()) {
            return;
        }
        $this->_setUp();
        $this->oUtil->addAndDoAction($this, "set_up_{$this->oProp->sClassName}", $this);
        $this->oProp->_bSetupLoaded = true;
        add_action('current_screen', array($this, '_replyToRegisterFormElements'), 20);
        foreach ($this->oProp->aTaxonomySlugs as $__sTaxonomySlug) {
            add_action("created_{$__sTaxonomySlug}", array($this, '_replyToValidateOptions'), 10, 2);
            add_action("edited_{$__sTaxonomySlug}", array($this, '_replyToValidateOptions'), 10, 2);
            add_action("{$__sTaxonomySlug}_add_form_fields", array($this, '_replyToPrintFieldsWOTableRows'));
            add_action("{$__sTaxonomySlug}_edit_form_fields", array($this, '_replyToPrintFieldsWithTableRows'));
            add_filter("manage_edit-{$__sTaxonomySlug}_columns", array($this, '_replyToManageColumns'), 10, 1);
            add_filter("manage_edit-{$__sTaxonomySlug}_sortable_columns", array($this, '_replyToSetSortableColumns'));
            add_action("manage_{$__sTaxonomySlug}_custom_column", array($this, '_replyToPrintColumnCell'), 10, 3);
        }
    }
}