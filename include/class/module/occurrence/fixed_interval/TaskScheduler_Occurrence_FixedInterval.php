<?php
/**
 * Handles hooks for the 'fixed_interval' occurrence option.
 * 
 * @package     Task Scheduler
 * @copyright   Copyright (c) 2014, Michael Uno
 * @author        Michael Uno
 * @authorurl    http://michaeluno.jp
 * @since        1.0.0
 */

/**
 * Defines the 'fixed_interval' occurrence type.
 */
class TaskScheduler_Occurrence_FixedInterval extends TaskScheduler_Occurrence_Base {
        
    /**
     * User constructor.
     */
    public function construct() {}
        
    /**
     * Returns the label for the slug.
     */
    public function getLabel( $sSlug ) {
        return __( 'Fixed Interval', 'task-scheduler' );
    }        
    
    /**
     * Returns the description of the module.
     */
    public function getDescription( $sDescription ) {
        return __( 'Triggers actions at the set interval.', 'task-scheduler' );
    }    
    
    /**
     * Do something when the task finishes.
     */
    public function doAfterAction( $oTask, $sExitCode ) {}
        
    /**
     * Returns the next run time time-stamp.
     */ 
    public function getNextRunTime( $iTimestamp, $oTask ) {
        
        $_aOptions = $oTask->getMeta( $this->sSlug );
        if ( ! isset( $_aOptions['interval'][ 0 ], $_aOptions['interval'][ 1 ] ) ) {
            return $iTimestamp;
        }
        
        $_nLastRunTime = $oTask->_last_run_time
            ? $oTask->_last_run_time
            : microtime( true );
        $_iInterval = $this->_getIntervalInSeconds( $_aOptions['interval'][ 0 ], $_aOptions['interval'][ 1 ] );
        return $_nLastRunTime + $_iInterval;
                
    }
                
        private function _getIntervalInSeconds( $iSeconds, $sUnit ) {
            switch( $sUnit ) {
                default:
                case 'second':
                    return $iSeconds;
                case 'minute':
                    return $iSeconds * 60;
                case 'hour':
                    return $iSeconds * 60*60;
                case 'day':
                    return $iSeconds * 60*60*24;
            }
        }
}