<?php 
/**
	Task Scheduler v1.1.0b02 by miunosoft (Michael Uno) 
	Provides an enhanced task management system for WordPress.
	<http://en.michaeluno.jp/>
	Copyright (c) 2014, Michael Uno; Licensed under GPL v2 or later */
$_aClassFiles = array( 
	"TaskScheduler_AutoLoad"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/TaskScheduler_AutoLoad.php", 
	"TaskScheduler_Bootstrap"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/TaskScheduler_Bootstrap.php", 
	"TaskScheduler_Requirements"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/TaskScheduler_Requirements.php", 
	"TaskScheduler_Debug"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/utility/TaskScheduler_Debug.php", 
	"TaskScheduler_Utility"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/utility/TaskScheduler_Utility.php", 
	"TaskScheduler_WPUtility"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/utility/TaskScheduler_WPUtility.php", 
	"TaskScheduler_WPUtility_Option"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/utility/TaskScheduler_WPUtility_Option.php", 
	"TaskScheduler_WPUtility_Post"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/boot/utility/TaskScheduler_WPUtility_Post.php", 
	"TaskScheduler_Event"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/TaskScheduler_Event.php", 
	"TaskScheduler_Event_Exit"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/TaskScheduler_Event_Exit.php", 
	"TaskScheduler_Event_Log"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/TaskScheduler_Event_Log.php", 
	"TaskScheduler_Event_Routine"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/TaskScheduler_Event_Routine.php", 
	"TaskScheduler_Event_Thread"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/TaskScheduler_Event_Thread.php", 
	"TaskScheduler_Event_ServerHeartbeat_Checker"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/server-heartbeat/TaskScheduler_Event_ServerHeartbeat_Checker.php", 
	"TaskScheduler_Event_ServerHeartbeat_Loader"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/server-heartbeat/TaskScheduler_Event_ServerHeartbeat_Loader.php", 
	"TaskScheduler_Event_ServerHeartbeat_Option"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/server-heartbeat/TaskScheduler_Event_ServerHeartbeat_Option.php", 
	"TaskScheduler_Event_ServerHeartbeat_Resumer"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/server-heartbeat/TaskScheduler_Event_ServerHeartbeat_Resumer.php", 
	"TaskScheduler_ServerHeartbeat"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/event/server-heartbeat/TaskScheduler_ServerHeartbeat.php", 
	"TaskScheduler_Module_Factory"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/TaskScheduler_Module_Factory.php", 
	"TaskScheduler_Wizard_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/TaskScheduler_Wizard_Base.php", 
	"TaskScheduler_Action_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/TaskScheduler_Action_Base.php", 
	"TaskScheduler_Wizard_Action_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/TaskScheduler_Wizard_Action_Base.php", 
	"TaskScheduler_Wizard_Action_Default"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/TaskScheduler_Wizard_Action_Default.php", 
	"TaskScheduler_Action_Debug"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/debug/TaskScheduler_Action_Debug.php", 
	"TaskScheduler_Action_Email"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/email/TaskScheduler_Action_Email.php", 
	"TaskScheduler_Action_Email_Thread"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/email/TaskScheduler_Action_Email_Thread.php", 
	"TaskScheduler_Action_Email_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/email/admin/TaskScheduler_Action_Email_Wizard.php", 
	"TaskScheduler_Action_PostDeleter"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/post_deleter/TaskScheduler_Action_PostDeleter.php", 
	"TaskScheduler_Action_PostDeleter_Thread"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/post_deleter/TaskScheduler_Action_PostDeleter_Thread.php", 
	"TaskScheduler_Action_PostDeleter_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/post_deleter/admin/TaskScheduler_Action_PostDeleter_Wizard.php", 
	"TaskScheduler_Action_PostDeleter_Wizard_2"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/post_deleter/admin/TaskScheduler_Action_PostDeleter_Wizard_2.php", 
	"TaskScheduler_Action_PostDeleter_Wizard_3"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/post_deleter/admin/TaskScheduler_Action_PostDeleter_Wizard_3.php", 
	"TaskScheduler_Action_TransientCleaner"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/transient_cleaner/TaskScheduler_Action_TransientCleaner.php", 
	"TaskScheduler_Action_TransientCleaner_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/transient_cleaner/admin/TaskScheduler_Action_TransientCleaner_Wizard.php", 
	"TaskScheduler_Action_HungRoutineHandler_Thread"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/_hung_routine_handler/TaskScheduler_Action_HungRoutineHandler_Thread.php", 
	"TaskScheduler_Action_RoutineLogDeleter"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/_routine_log_deleter/TaskScheduler_Action_RoutineLogDeleter.php", 
	"TaskScheduler_Action_RoutineLogDeleter_Thread"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/action/_routine_log_deleter/TaskScheduler_Action_RoutineLogDeleter_Thread.php", 
	"TaskScheduler_Occurrence_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/TaskScheduler_Occurrence_Base.php", 
	"TaskScheduler_Wizard_Occurrence_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/TaskScheduler_Wizard_Occurrence_Base.php", 
	"TaskScheduler_Wizard_Occurrence_Default"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/TaskScheduler_Wizard_Occurrence_Default.php", 
	"TaskScheduler_Occurrence_Constant"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/constant/TaskScheduler_Occurrence_Constant.php", 
	"TaskScheduler_Occurrence_Daily"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/daily/TaskScheduler_Occurrence_Daily.php", 
	"TaskScheduler_Occurrence_Daily_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/daily/admin/TaskScheduler_Occurrence_Daily_Wizard.php", 
	"TaskScheduler_Occurrence_ExitCode"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/exit_code/TaskScheduler_Occurrence_ExitCode.php", 
	"TaskScheduler_Occurrence_ExitCode_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/exit_code/admin/TaskScheduler_Occurrence_ExitCode_Wizard.php", 
	"TaskScheduler_Occurrence_FixedInterval"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/fixed_interval/TaskScheduler_Occurrence_FixedInterval.php", 
	"TaskScheduler_Occurrence_FixedInterval_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/fixed_interval/admin/TaskScheduler_Occurrence_FixedInterval_Wizard.php", 
	"TaskScheduler_Occurrence_SpecificTime"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/specific_time/TaskScheduler_Occurrence_SpecificTime.php", 
	"TaskScheduler_Occurrence_SpecificTime_Wizard"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/specific_time/admin/TaskScheduler_Occurrence_SpecificTime_Wizard.php", 
	"TaskScheduler_Occurrence_Volatile"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/module/occurrence/volatile/TaskScheduler_Occurrence_Volatile.php", 
	"TaskScheduler_Log"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/log/TaskScheduler_Log.php", 
	"TaskScheduler_Routine"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/routine/TaskScheduler_Routine.php", 
	"TaskScheduler_Routine_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/routine/TaskScheduler_Routine_Base.php", 
	"TaskScheduler_Routine_Log"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/routine/TaskScheduler_Routine_Log.php", 
	"TaskScheduler_Routine_Meta"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/routine/TaskScheduler_Routine_Meta.php", 
	"TaskScheduler_Routine_Option"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/routine/TaskScheduler_Routine_Option.php", 
	"TaskScheduler_Routine_Taxonomy"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/routine/TaskScheduler_Routine_Taxonomy.php", 
	"TaskScheduler_Routine_Thread"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/object/routine/TaskScheduler_Routine_Thread.php", 
	"TaskScheduler_Option"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/option/TaskScheduler_Option.php", 
	"TaskScheduler_PostType_Log"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/post_type/log/TaskScheduler_PostType_Log.php", 
	"TaskScheduler_PostType_Log_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/post_type/log/TaskScheduler_PostType_Log_Base.php", 
	"TaskScheduler_PostType_Routine"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/post_type/routine/TaskScheduler_PostType_Routine.php", 
	"TaskScheduler_PostType_Task"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/post_type/task/TaskScheduler_PostType_Task.php", 
	"TaskScheduler_PostType_Task_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/post_type/task/TaskScheduler_PostType_Task_Base.php", 
	"TaskScheduler_PostType_Thread"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/post_type/thread/TaskScheduler_PostType_Thread.php", 
	"TaskScheduler_PluginUtility"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/TaskScheduler_PluginUtility.php", 
	"TaskScheduler_LogUtility"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/log/TaskScheduler_LogUtility.php", 
	"TaskScheduler_LogUtility_Add"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/log/TaskScheduler_LogUtility_Add.php", 
	"TaskScheduler_LogUtility_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/log/TaskScheduler_LogUtility_Base.php", 
	"TaskScheduler_LogUtility_Get"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/log/TaskScheduler_LogUtility_Get.php", 
	"TaskScheduler_RoutineUtility"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/routine/TaskScheduler_RoutineUtility.php", 
	"TaskScheduler_RoutineUtility_Add"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/routine/TaskScheduler_RoutineUtility_Add.php", 
	"TaskScheduler_RoutineUtility_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/routine/TaskScheduler_RoutineUtility_Base.php", 
	"TaskScheduler_RoutineUtility_Edit"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/routine/TaskScheduler_RoutineUtility_Edit.php", 
	"TaskScheduler_RoutineUtility_Get"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/routine/TaskScheduler_RoutineUtility_Get.php", 
	"TaskScheduler_TaskUtility"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/task/TaskScheduler_TaskUtility.php", 
	"TaskScheduler_TaskUtility_Add"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/task/TaskScheduler_TaskUtility_Add.php", 
	"TaskScheduler_TaskUtility_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/task/TaskScheduler_TaskUtility_Base.php", 
	"TaskScheduler_TaskUtility_Edit"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/task/TaskScheduler_TaskUtility_Edit.php", 
	"TaskScheduler_TaskUtility_Get"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/task/TaskScheduler_TaskUtility_Get.php", 
	"TaskScheduler_ThreadUtility"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/thread/TaskScheduler_ThreadUtility.php", 
	"TaskScheduler_ThreadUtility_Add"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/thread/TaskScheduler_ThreadUtility_Add.php", 
	"TaskScheduler_ThreadUtility_Base"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/thread/TaskScheduler_ThreadUtility_Base.php", 
	"TaskScheduler_ThreadUtility_Edit"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/thread/TaskScheduler_ThreadUtility_Edit.php", 
	"TaskScheduler_ThreadUtility_Get"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/thread/TaskScheduler_ThreadUtility_Get.php", 
	"TaskScheduler_Walker_Log"	=>	TaskScheduler_Registry::$sDirPath . "/include/class/utility/walker/TaskScheduler_Walker_Log.php", 
	"TaskScheduler_AutoCompleteCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/autocomplete-custom-field-type/TaskScheduler_AutoCompleteCustomFieldType.php", 
	"TaskScheduler_DateCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/date-time-custom-field-types/TaskScheduler_DateCustomFieldType.php", 
	"TaskScheduler_DateRangeCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/date-time-custom-field-types/TaskScheduler_DateRangeCustomFieldType.php", 
	"TaskScheduler_DateTimeCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/date-time-custom-field-types/TaskScheduler_DateTimeCustomFieldType.php", 
	"TaskScheduler_DateTimeRangeCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/date-time-custom-field-types/TaskScheduler_DateTimeRangeCustomFieldType.php", 
	"TaskScheduler_TimeCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/date-time-custom-field-types/TaskScheduler_TimeCustomFieldType.php", 
	"TaskScheduler_TimeRangeCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/date-time-custom-field-types/TaskScheduler_TimeRangeCustomFieldType.php", 
	"TaskScheduler_MultipleTextInputFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/multiple-text-input-filed-type/TaskScheduler_MultipleTextInputFieldType.php", 
	"TaskScheduler_RevealerCustomFieldType"	=>	TaskScheduler_Registry::$sDirPath . "/include/library/custom-field-types/revealer-custom-field-type/TaskScheduler_RevealerCustomFieldType.php", 
);