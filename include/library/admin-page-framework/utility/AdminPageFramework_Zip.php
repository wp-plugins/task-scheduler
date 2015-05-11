<?php
/**
 Admin Page Framework v3.5.7.2 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class TaskScheduler_AdminPageFramework_Zip {
    public $sSource;
    public $sDestination;
    public $bIncludeDir = false;
    public $aCallbacks = array('file_name' => null, 'file_contents' => null, 'directory_name' => null,);
    public function __construct($sSource, $sDestination, $bIncludeDir = false, array $aCallbacks = array()) {
        $this->sSource = $sSource;
        $this->sDestination = $sDestination;
        $this->bIncludeDir = $bIncludeDir;
        $this->aCallbacks = $aCallbacks + $this->aCallbacks;
    }
    public function compress() {
        if (!$this->isFeasible($this->sSource)) {
            return false;
        }
        if (file_exists($this->sDestination)) {
            unlink($this->sDestination);
        }
        $_oZip = new ZipArchive();
        if (!$_oZip->open($this->sDestination, ZIPARCHIVE::CREATE)) {
            return false;
        }
        $this->sSource = str_replace('\\', '/', realpath($this->sSource));
        $_aMethods = array('unknown' => '_returnFalse', 'directory' => '_compressDirectory', 'file' => '_compressFile',);
        $_sMethodName = $_aMethods[$this->_getSourceType($this->sSource) ];
        return call_user_func_array(array($this, $_sMethodName), array($_oZip, $this->sSource, $this->aCallbacks, $this->bIncludeDir));
    }
    private function _compressDirectory(ZipArchive $oZip, $sSource, array $aCallbacks = array(), $bIncludeDir = false) {
        $_oFilesIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sSource), RecursiveIteratorIterator::SELF_FIRST);
        if ($bIncludeDir) {
            $this->_addEmptyDir($oZip, $this->_getMainDirectoryName($sSource), $aCallbacks['directory_name']);
            $sSource = $this->_getSubSourceDirPath($sSource);
        }
        foreach ($_oFilesIterator as $_sIterationItem) {
            $this->_addArchiveItem($oZip, $sSource, $_sIterationItem, $aCallbacks);
        }
        return $oZip->close();
    }
    private function _addArchiveItem(ZipArchive $oZip, $sSource, $_sIterationItem, array $aCallbacks) {
        $_sIterationItem = str_replace('\\', '/', $_sIterationItem);
        if (in_array(substr($_sIterationItem, strrpos($_sIterationItem, '/') + 1), array('.', '..'))) {
            return;
        }
        $_sIterationItem = realpath($_sIterationItem);
        $_sIterationItem = str_replace('\\', '/', $_sIterationItem);
        if (true === is_dir($_sIterationItem)) {
            $this->_addEmptyDir($oZip, str_replace($sSource . '/', '', $_sIterationItem . '/'), $aCallbacks['directory_name']);
        } else if (true === is_file($_sIterationItem)) {
            $this->_addFromString($oZip, str_replace($sSource . '/', '', $_sIterationItem), file_get_contents($_sIterationItem), $aCallbacks);
        }
    }
    private function _getMainDirectoryName($sSource) {
        $_aPathParts = explode("/", $sSource);
        return $_aPathParts[count($_aPathParts) - 1];
    }
    private function _getSubSourceDirPath($sSource) {
        $_aPathParts = explode("/", $sSource);
        $sSource = '';
        for ($i = 0;$i < count($_aPathParts) - 1;$i++) {
            $sSource.= '/' . $_aPathParts[$i];
        }
        return substr($sSource, 1);
    }
    private function _compressFile(ZipArchive $oZip, $sSource, $aCallbacks = null) {
        $this->_addFromString($oZip, basename($sSource), file_get_contents($sSource), $aCallbacks);
        return $oZip->close();
    }
    private function _getSourceType($sSource) {
        if (true === is_dir($sSource)) {
            return 'directory';
        }
        if (true === is_file($sSource)) {
            return 'file';
        }
        return 'unknown';
    }
    private function isFeasible($sSource) {
        if (!extension_loaded('zip')) {
            return false;
        }
        if (!file_exists($sSource)) {
            return false;
        }
        return true;
    }
    private function _returnFalse() {
        return false;
    }
    private function _addEmptyDir(ZipArchive $oZip, $sInsidePath, $oCallable) {
        $sInsidePath = $this->_getFilteredArchivePath($sInsidePath, $oCallable);
        if (!strlen($sInsidePath)) {
            return;
        }
        $oZip->addEmptyDir($sInsidePath);
    }
    private function _addFromString(ZipArchive $oZip, $sInsidePath, $sSourceContents = '', array $aCallbacks = array()) {
        $sInsidePath = $this->_getFilteredArchivePath($sInsidePath, $aCallbacks['file_name']);
        if (!strlen($sInsidePath)) {
            return;
        }
        $oZip->addFromString($sInsidePath, is_callable($aCallbacks['file_contents']) ? call_user_func_array($aCallbacks['file_contents'], array($sSourceContents, $sInsidePath)) : $sSourceContents);
    }
    private function _getFilteredArchivePath($sArchivePath, $oCallable) {
        return is_callable($oCallable) ? call_user_func_array($oCallable, array($sArchivePath,)) : $sArchivePath;
    }
}