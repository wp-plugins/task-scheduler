<?php 
/**
	Task Scheduler v1.1.0b02 by miunosoft (Michael Uno) 
	Provides an enhanced task management system for WordPress.
	<http://en.michaeluno.jp/>
	Copyright (c) 2014, Michael Uno; Licensed under GPL v2 or later */
$_aAdminClassFiles = array( 
	"TaskScheduler_MetaBox_Action"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/meta_box/TaskScheduler_MetaBox_Action.php", 
	"TaskScheduler_MetaBox_Advanced"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/meta_box/TaskScheduler_MetaBox_Advanced.php", 
	"TaskScheduler_MetaBox_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/meta_box/TaskScheduler_MetaBox_Base.php", 
	"TaskScheduler_MetaBox_Main"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/meta_box/TaskScheduler_MetaBox_Main.php", 
	"TaskScheduler_MetaBox_Occurrence"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/meta_box/TaskScheduler_MetaBox_Occurrence.php", 
	"TaskScheduler_MetaBox_Submit"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/meta_box/TaskScheduler_MetaBox_Submit.php", 
	"TaskScheduler_AdminPage_EditModule"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/edit_module/TaskScheduler_AdminPage_EditModule.php", 
	"TaskScheduler_AdminPage_EditModule_Setup"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/edit_module/TaskScheduler_AdminPage_EditModule_Setup.php", 
	"TaskScheduler_AdminPage_EditModule_Start"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/edit_module/TaskScheduler_AdminPage_EditModule_Start.php", 
	"TaskScheduler_AdminPage_EditModule_Tab_Action"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/edit_module/TaskScheduler_AdminPage_EditModule_Tab_Action.php", 
	"TaskScheduler_AdminPage_EditModule_Tab_Occurrence"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/edit_module/TaskScheduler_AdminPage_EditModule_Tab_Occurrence.php", 
	"TaskScheduler_AdminPage_EditModule_Tab_UpdateModuleOptions"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/edit_module/TaskScheduler_AdminPage_EditModule_Tab_UpdateModuleOptions.php", 
	"TaskScheduler_AdminPage_EditModule_Validation"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/edit_module/TaskScheduler_AdminPage_EditModule_Validation.php", 
	"TaskScheduler_AdminPage"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/root/TaskScheduler_AdminPage.php", 
	"TaskScheduler_AdminPage_Form"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/root/TaskScheduler_AdminPage_Form.php", 
	"TaskScheduler_AdminPage_Setup"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/root/TaskScheduler_AdminPage_Setup.php", 
	"TaskScheduler_AdminPage_Start"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/root/TaskScheduler_AdminPage_Start.php", 
	"TaskScheduler_AdminPage_Setting"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/setting/TaskScheduler_AdminPage_Setting.php", 
	"TaskScheduler_AdminPage_Setting_Form_Heartbeat"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/setting/TaskScheduler_AdminPage_Setting_Form_Heartbeat.php", 
	"TaskScheduler_AdminPage_Setting_Form_Reset"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/setting/TaskScheduler_AdminPage_Setting_Form_Reset.php", 
	"TaskScheduler_AdminPage_Setting_Form_Task"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/setting/TaskScheduler_AdminPage_Setting_Form_Task.php", 
	"TaskScheduler_AdminPage_Setting_Start"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/setting/TaskScheduler_AdminPage_Setting_Start.php", 
	"TaskScheduler_AdminPage_System"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/system/TaskScheduler_AdminPage_System.php", 
	"TaskScheduler_AdminPage_System_Form"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/system/TaskScheduler_AdminPage_System_Form.php", 
	"TaskScheduler_AdminPage_System_Start"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/system/TaskScheduler_AdminPage_System_Start.php", 
	"TaskScheduler_AdminPage_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/wizard/TaskScheduler_AdminPage_Wizard.php", 
	"TaskScheduler_AdminPage_Wizard_Setup"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/wizard/TaskScheduler_AdminPage_Wizard_Setup.php", 
	"TaskScheduler_AdminPage_Wizard_Start"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/wizard/TaskScheduler_AdminPage_Wizard_Start.php", 
	"TaskScheduler_AdminPage_Wizard_Tab_CreateTask"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/wizard/TaskScheduler_AdminPage_Wizard_Tab_CreateTask.php", 
	"TaskScheduler_AdminPage_Wizard_Tab_SelectAction"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/wizard/TaskScheduler_AdminPage_Wizard_Tab_SelectAction.php", 
	"TaskScheduler_AdminPage_Wizard_Tab_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/wizard/TaskScheduler_AdminPage_Wizard_Tab_Wizard.php", 
	"TaskScheduler_AdminPage_Wizard_Validation"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/page/wizard/TaskScheduler_AdminPage_Wizard_Validation.php", 
	"TaskScheduler_ListTable"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/table/TaskScheduler_ListTable.php", 
	"TaskScheduler_ListTable_Action"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/table/TaskScheduler_ListTable_Action.php", 
	"TaskScheduler_ListTable_Column"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/table/TaskScheduler_ListTable_Column.php", 
	"TaskScheduler_ListTable_Views"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/admin/table/TaskScheduler_ListTable_Views.php", 
);