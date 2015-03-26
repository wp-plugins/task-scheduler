<?php
/**
 Admin Page Framework v3.5.7b01 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class TaskScheduler_AdminPageFramework_Menu_Controller extends TaskScheduler_AdminPageFramework_Menu_View {
    public function __construct($sOptionKey = null, $sCallerPath = null, $sCapability = 'manage_options', $sTextDomain = 'admin-page-framework') {
        parent::__construct($sOptionKey, $sCallerPath, $sCapability, $sTextDomain);
        if ($this->oProp->bIsAdminAjax) {
            return;
        }
        add_action('admin_menu', array($this, '_replyToBuildMenu'), 98);
    }
    public function setRootMenuPage($sRootMenuLabel, $sIcon16x16 = null, $iMenuPosition = null) {
        $sRootMenuLabel = trim($sRootMenuLabel);
        $_sSlug = $this->_isBuiltInMenuItem($sRootMenuLabel);
        $this->oProp->aRootMenu = array('sTitle' => $sRootMenuLabel, 'sPageSlug' => $_sSlug ? $_sSlug : $this->oProp->sClassName, 'sIcon16x16' => $this->oUtil->resolveSRC($sIcon16x16), 'iPosition' => $iMenuPosition, 'fCreateRoot' => empty($_sSlug),);
    }
    private function _isBuiltInMenuItem($sMenuLabel) {
        $_sMenuLabelLower = strtolower($sMenuLabel);
        if (array_key_exists($_sMenuLabelLower, $this->_aBuiltInRootMenuSlugs)) return $this->_aBuiltInRootMenuSlugs[$_sMenuLabelLower];
    }
    public function setRootMenuPageBySlug($sRootMenuSlug) {
        $this->oProp->aRootMenu['sPageSlug'] = $sRootMenuSlug;
        $this->oProp->aRootMenu['fCreateRoot'] = false;
    }
    public function addSubMenuItems($aSubMenuItem1, $aSubMenuItem2 = null, $_and_more = null) {
        foreach (func_get_args() as $aSubMenuItem) {
            $this->addSubMenuItem($aSubMenuItem);
        }
    }
    public function addSubMenuItem(array $aSubMenuItem) {
        if (isset($aSubMenuItem['href'])) {
            $this->addSubMenuLink($aSubMenuItem);
        } else {
            $this->addSubMenuPage($aSubMenuItem);
        }
    }
    public function addSubMenuLink(array $aSubMenuLink) {
        if (!isset($aSubMenuLink['href'], $aSubMenuLink['title'])) {
            return;
        }
        if (!filter_var($aSubMenuLink['href'], FILTER_VALIDATE_URL)) {
            return;
        }
        $this->oProp->aPages[$aSubMenuLink['href']] = $this->_formatSubmenuLinkArray($aSubMenuLink);
    }
    public function addSubMenuPages() {
        foreach (func_get_args() as $aSubMenuPage) {
            $this->addSubMenuPage($aSubMenuPage);
        }
    }
    public function addSubMenuPage(array $aSubMenuPage) {
        if (!isset($aSubMenuPage['page_slug'])) {
            return;
        }
        $aSubMenuPage['page_slug'] = $this->oUtil->sanitizeSlug($aSubMenuPage['page_slug']);
        $this->oProp->aPages[$aSubMenuPage['page_slug']] = $this->_formatSubMenuPageArray($aSubMenuPage);
    }
}