<?php
/* 
	Plugin Name:	Task Scheduler (beta)
	Plugin URI:		http://en.michaeluno.jp/
	Description:	Provides an enhanced task management system for WordPress.
	Author:			miunosoft (Michael Uno)
	Author URI:		http://michaeluno.jp
	Version:		1.0.0b08
*/

/* 
 * Script Procedure  
 * 1. Define the base registry class.
 * 2. Define the registry class.
 * 3. Include files.
 * 4. Perform the bootstrap script.
 */

/* 1. Define the base registry class. */
/**
 * The base class of the registry class which provides basic plugin information.
 * 
 * The minifier script and the inclusion script also refer to the constants. 
 */
class TaskScheduler_Registry_Base {

	const Version		= '1.0.0b08';
	const Name			= 'Task Scheduler';
	const Description	= 'Provides an enhanced task management system for WordPress.';
	const URI			= 'http://en.michaeluno.jp/';
	const Author		= 'miunosoft (Michael Uno)';
	const AuthorURI		= 'http://en.michaeluno.jp/';
	const Copyright		= 'Copyright (c) 2014, Michael Uno';
	const License		= 'GPL v2 or later';
	const Contributors	= '';
	
}

/* 2. Define the registry class. */
/**
 * Provides plugin information.
 */
final class TaskScheduler_Registry extends TaskScheduler_Registry_Base {
			
	// The plugin itself uses these values.
	const OptionKey					= 'ts_option';
	const TransientPrefix			= 'TS_';	// Up to 8 characters as transient name allows 45 characters or less ( 40 for site transients ) so that md5 (32 characters) can be added
	const AdminPage_Root			= 'TaskScheduler_AdminPage';	// the root menu page slug
	const AdminPage_TaskList		= 'ts_task_list';
	const AdminPage_AddNew			= 'ts_add_new';
	const AdminPage_EditModule		= 'ts_edit_module';
	const AdminPage_Setting			= 'ts_settings';
	const AdminPage_System			= 'ts_system';
	const TextDomain				= 'task-scheduler';
	const TextDomainPath			= './language';
	const PostType_Task				= 'ts_task';		// up to 20 characters
	const PostType_Thread			= 'ts_thread';		// up to 20 characters
	const PostType_Log				= 'ts_log';			// up to 20 characters
	const Taxonomy_SystemLabel		= 'task_scheduler_system_label';
	const RequiredPHPVersion		= '5.2.1';
	const RequiredWordPressVersion	= '3.7';
		
	// These properties will be defined in the setUp() method.
	static public $sFilePath	= '';
	static public $sDirPath		= '';
	static public $sFileURI		= '';
	
	/**
	 * Sets up static properties.
	 */
	static function setUp( $sPluginFilePath=null ) {
						
		self::$sFilePath	= $sPluginFilePath ? $sPluginFilePath : __FILE__;
		self::$sDirPath		= dirname( self::$sFilePath );
		self::$sFileURI		= plugins_url( '', self::$sFilePath );
		
	}	
	
	/**
	 * Returns the URL with the given relative path to the plugin path.
	 * 
	 * Example:  TaskScheduler_Registry::getPluginURL( 'asset/css/meta_box.css' );
	 */
	public static function getPluginURL( $sRelativePath='' ) {
		return plugins_url( $sRelativePath, self::$sFilePath );
	}

}
 
// Return if accessed directly. Do not exit as the header class for the inclusion script need to access the registry class.
if ( ! defined( 'ABSPATH' ) ) { return; }
TaskScheduler_Registry::setUp( __FILE__ );

/* 3. Include files. */

// $_nNow = microtime( true );

// If the debug mode is on, include individual files; otherwise, include the minified file as it reduces the speed more than x2.
if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
	
	include( dirname( __FILE__ ) . '/include/task-scheduler-include-class-files.php' );
	if ( is_admin() ) {	
		include( dirname( __FILE__ ) . '/include/task-scheduler-include-class-files-admin.php' );
	}
	
} else {
	
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/task-scheduler-admin-page-framework.min.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/autocomplete-custom-field-type/TaskScheduler_AutoCompleteCustomFieldType.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/date-time-custom-field-types/TaskScheduler_DateRangeCustomFieldType.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/date-time-custom-field-types/TaskScheduler_DateTimeCustomFieldType.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/date-time-custom-field-types/TaskScheduler_DateTimeRangeCustomFieldType.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/date-time-custom-field-types/TaskScheduler_DateCustomFieldType.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/date-time-custom-field-types/TaskScheduler_TimeCustomFieldType.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/date-time-custom-field-types/TaskScheduler_TimeRangeCustomFieldType.php' );
	include( TaskScheduler_Registry::$sDirPath . '/include/library/admin-page-framework/revealer-custom-field-type/TaskScheduler_RevealerCustomFieldType.php' );
	
	// Include the minified script
	include( dirname( __FILE__ ) . '/include/task-scheduler-classes.min.php' );
	
}

// TaskScheduler_Debug::log( ( microtime( true ) - $_nNow  )  );

/* 4. Perform the bootstrap. */
new TaskScheduler_Bootstrap( __FILE__ );