<?php
/**
 * An abstract class that defines the views links of the Task Scheduler task listing table.
 *
 * @package     Task Scheduler
 * @copyright   Copyright (c) 2014, Michael Uno
 * @author		Michel Uno
 * @authorurl	http://michaeluno.jp
 * @since		1.0.0 
*/

abstract class TaskScheduler_ListTable_Views extends TaskScheduler_ListTable_Column {
    
	public function get_views() {
				
		$_aBaseKeys = array(
			'enabled'	=> __( 'Enabled', 'task-scheduler' ) 
				. " <span class='count'>(" . $this->_iEnabledTasks . ")</span>",
			'disabled'	=> __( 'Disabled', 'task-scheduler' ) 
				. " <span class='count'>(" . $this->_iDisabledTasks . ")</span>",
			'system'	=> __( 'System', 'task-scheduler' ) 
				. " <span class='count'>(" . $this->_iSystemTasks . ")</span>",				
			'thread'	=> __( 'Thread', 'task-scheduler' ) 
				. " <span class='count'>(" . $this->_iThreadTasks . ")</span>",
		);
		if ( ! $this->_iSystemTasks ) {
			unset( $_aBaseKeys[ 'system' ] );
		}		
		if ( ! $this->_iThreadTasks ) {
			unset( $_aBaseKeys[ 'thread' ] );
		}
		$_aViews = array();		
		foreach ( $_aBaseKeys as $_sKey => $_sLabel ) {
			
			$_sSelfURL_StatusQuery = $this->getQueryURL( array( 'status' => $_sKey ) );
			$_sCurrent = ( ! isset( $_GET['status'] ) && 'enabled' == $_sKey ) || ( isset( $_GET['status'] ) && $_sKey == $_GET['status'] ) ? 'current' : '';
			$_aViews[ $_sKey ] = "<a href='{$_sSelfURL_StatusQuery}' class='{$_sCurrent}'>"
					. $_sLabel
				. "</a>";			
		}
		
		return $_aViews;
		
	}	
	
}