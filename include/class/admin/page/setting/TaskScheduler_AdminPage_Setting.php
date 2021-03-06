<?php
/**
 * One of the abstract class of the plugin admin page class.
 * 
 * @package      Task Scheduler
 * @copyright    Copyright (c) 2014-2015, Michael Uno
 * @author       Michael Uno
 * @authorurl    http://michaeluno.jp
 * @since        1.0.0
 */

final class TaskScheduler_AdminPage_Setting extends TaskScheduler_AdminPage_Setting_Form_Heartbeat {

    public function setUp() {
    
        $this->setRootMenuPageBySlug( TaskScheduler_Registry::$aAdminPages['root'] );
        $this->addSubMenuItems(
            array(
                'title'            => __( 'Settings', 'task-scheduler' ),    // page and menu title
                'page_slug'        => TaskScheduler_Registry::$aAdminPages[ 'setting' ]    // page slug
            )
        );        
                        
        add_action( "load_" . TaskScheduler_Registry::$aAdminPages[ 'setting' ], array( $this, '_replyToLoadSettingPage' ) );
        
    }
    
    /**
     * Gets triggered when one of the registered pages gets loaded. 
     */
    public function load_TaskScheduler_AdminPage_Setting( $oAdminPage ) {
    
        $this->setPageHeadingTabsVisibility( false );        // disables the page heading tabs by passing false.
        $this->setInPageTabsVisibility( true );        // disables the page heading tabs by passing false.
        $this->setPageTitleVisibility( false );
        $this->setInPageTabTag( 'h2' );                
        $this->enqueueStyle( TaskScheduler_Registry::getPluginURL( '/asset/css/admin_settings.css' ) );
        $this->setDisallowedQueryKeys( 'settings-notice' );
        $this->setDisallowedQueryKeys( 'transient_key' );
        
    }
    
    /**
     * Gets triggered when the page gets loaded. 
     * 
     * Used to define form elements.
     */
    public function _replyToLoadSettingPage( $oAdminPage ) {
        $this->_defineInPageTabs();
        $this->_defineForm();    
    }
    
}