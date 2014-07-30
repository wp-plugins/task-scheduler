<?php
/**
 * One of the abstract parent classes of the TaskScheduler_ThreadUtility class.
 * 
 * @package     Task Scheduler
 * @copyright   Copyright (c) 2014, Michael Uno
 * @author		Michael Uno
 * @authorurl	http://michaeluno.jp
 * @since		1.0.0
 */

abstract class TaskScheduler_ThreadUtility_Add extends TaskScheduler_ThreadUtility_Get {

	/**
	 * Represents the default meta key-values of the thread post type posts.
	 */
	static public $aDefaultMeta = array(
		'_routine_status'		=>	'queued',	// string	inactive, awaiting, processing
		'_next_run_time'		=>	null,		// float
		'routine_action'		=>	null,		// string	the target action hook name
		// 'argument'				=>	array(),	// array	the arguments(parameters) passed to the action
		'occurrence'			=>	'volatile',	// string	The slug of the occurrence type. At the moment, only the 'volatile' occurrence type is allowed.
		'parent_routine_log_id'	=>	null,
		'owner_routine_id'		=>	null,
		// 'log_id'				=>	null,		// integer	the last set log id.	
		'_max_execution_time'	=>	null,		// integer	This will be inherited from the owner task's value.
	);			

	
	/**
	 * Creates a thread with the given options.
	 * 
	 * The difference with the add() method is that it can be canceled if the same thread already exists.
	 * This is used to create an internal thread that should not add a new one if the same thread already exists.
	 * Note that it does not check taxonomy terms. Only the post title and the meta keys-values.
	 * 
	 * @since	1.0.0
	 * @remark	It is similar as the TaskScheduler_TaskUtility's create() method. 
	 */
	static public function create( $iOwnerTaskID, array $aThreadOptions, array $aSystemTaxonomyTerms=array(), $bAllowDuplicate=false ) {
		
		if ( ! self::doesPostExist( $iOwnerTaskID ) ) { return 0; }
		
		if ( ! $bAllowDuplicate && self::hasSameTask( $aThreadOptions, $aSystemTaxonomyTerms ) ) {
TaskScheduler_Debug::log( 'the same task already exists.' );
TaskScheduler_Debug::log( $aThreadOptions );
			return 0;
		}

		return self::add( $iOwnerTaskID, $aThreadOptions, $aSystemTaxonomyTerms, $bAllowDuplicate );
		
	}
		static private function hasSameTask( $aThreadOptions, $aSystemTaxonomyTerms ) {
				
			$_aThreadMeta = $aThreadOptions;
				
			// The top level arguments
			$_aCheckingTopLevelArguments = array(
				'post_title',	//     => [ <string> ] // The title of your post.
			);
			// The following change dynamically so don't check
			$_aNotCheckingTopLevelArguments = array(
				'ID', // [ <post id> ] // Are you updating an existing post?
				'tax_input',	// => [ array( <taxonomy> => <array | string> ) ] // For custom taxonomies. Default empty.
				'post_type',	//     => [ 'post' | 'page' | 'link' | 'nav_menu_item' | custom post type ] // Default 'post'.
				'post_author',	//    => [ <user ID> ] // The user ID number of the author. Default is the current user ID.
				'post_status',	//   => [ 'draft' | 'publish' | 'pending'| 'future' | 'private' | custom registered status ] // Default 'draft'.
				'post_content'   , // [ <string> ] // The full text of the post.
				'post_name'      , // [ <string> ] // The name (slug) for your post			
				'post_parent'    , // [ <post ID> ] // Sets the parent of the new post, if any. Default 0.
				'menu_order'     , // [ <order> ] // If new post is a page, sets the order in which it should appear in supported menus. Default 0.
				'ping_status',	//    => [ 'closed' | 'open' ] // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
				'to_ping'        , // // Space or carriage return-separated list of URLs to ping. Default empty string.
				'pinged'         , // // Space or carriage return-separated list of URLs that have been pinged. Default empty string.
				'post_password'  , // [ <string> ] // Password for post, if any. Default empty string.
				'guid'           , // // Skip this and let Wordpress handle it, usually.
				'post_content_filtered' , // // Skip this and let Wordpress handle it, usually.
				'post_excerpt'   , // [ <string> ] // For all your post excerpt needs.
				'post_date'      , // [ Y-m-d H:i:s ] // The time post was made.
				'post_date_gmt'  , // [ Y-m-d H:i:s ] // The time post was made, in GMT.
				'comment_status' , // [ 'closed' | 'open' ] // Default is the option 'default_comment_status', or 'closed'.
				'post_category'  , // [ array(<category id>, ...) ] // Default empty.
				'tags_input'     , // [ '<tag>, <tag>, ...' | array ] // Default empty.			
				'page_template'  , // [ <string> ] // Requires name of template file, eg template.php. Default empty.
			);
			// Extract the top level argument elements and remove them from the meta array.
			$_aQueryArguments = array();
			foreach ( $_aCheckingTopLevelArguments as $_sCheckingKey ) {
				if ( isset( $_aThreadMeta[ $_sCheckingKey ] ) ) {
					$_aQueryArguments[ $_sCheckingKey ] = $_aThreadMeta[ $_sCheckingKey ];
					unset( $_aThreadMeta[ $_sCheckingKey ] );
				}
			}
			// Remove the unchecking items from the meta array. 
			foreach ( $_aNotCheckingTopLevelArguments as $_sCheckingKey ) {
				unset( $_aThreadMeta[ $_sCheckingKey ] );
			}
			// Now $_aThreadMeta contains the meta keys. Drop values that are not string, integer, nor boolean.
			foreach ( $_aThreadMeta as $_sMetaKey => $_vValue ) {
				if ( is_string( $_vValue ) || is_numeric( $_vValue ) || is_bool( $_vValue ) ) {
					continue;
				}
				unset( $_aThreadMeta[ $_sMetaKey ] );
			}
					
			// Compose the 'meta_query' argument element.
			$_aMetaQuery = array( 'relation' =>	'AND' );
			foreach ( $_aThreadMeta as $_sKey => $_vValue ) {
				$_aMetaQuery[] = array(
					'key'		=>	$_sKey,
					'value'		=>	$_vValue,
					'compare'	=>	'IN',				
				);
			}
			$_aQueryArguments[ 'meta_query' ]		= $_aMetaQuery;
			$_aQueryArguments[ 'post_status ' ]		= 'any';
			$_aQueryArguments[ 'posts_per_page' ]	= 1;
			 
			$_aResults = self::find( $_aQueryArguments );
			return $_aResults->found_posts ? true : false;
			
		}	
	
	/**
	 * Creates a thread belonging to the given owner task.
	 * 
	 * A thread is a routine that belongs to a main task mainly used to divide a large set of tasks. 
	 * 
	 * @return	integer	The thread ID.
	 */
	static public function add( $iOwnerTaskID, array $aThreadOptions=array(), array $aSystemTaxonomyTerms=array() ) {
		
		$_oOwnerTask = TaskScheduler_Routine::getInstance( $iOwnerTaskID );
		if ( ! is_object( $_oOwnerTask ) ) { return 0; }
	
		$aThreadOptions = array(
				// thread specific keys
				'_routine_status'		=>	'queued',
				// 'parent_routine_log_id'	=>	isset( $aThreadOptions['log_id'] ) ? $aThreadOptions['log_id'] : 0,	// <--- deprecated as it is confusing.
				'owner_routine_id'		=>	$iOwnerTaskID,		
				'_count_call'			=>	0,
				'_count_run'			=>	0,					
			) 
			+ $aThreadOptions
			+ array(
				'post_status'			=>	'private',
				'_next_run_time'		=>	microtime( true ),	// queue now
				'tax_input'    			=>	array( 
					TaskScheduler_Registry::Taxonomy_SystemLabel => $aSystemTaxonomyTerms
				),		
				'_max_execution_time'	=>	$_oOwnerTask->_max_execution_time,
			)
			+ self::$aDefaultMeta;
			
		unset( 
			$aThreadOptions['_is_spawned'], 		// if this is set, the action will not be loaded
			$aThreadOptions['_last_run_time'],		
			$aThreadOptions['_exit_code'],			// a new task should not have an exit code
			$aThreadOptions['_count_exit'],			
			$aThreadOptions['_count_hung']	
		);		
		
		// Currently only the 'volatile' occurrence type is allowed.
		if ( ! in_array( $aThreadOptions['occurrence'], array( 'volatile', ) ) ) {
			return 0;
		}

		// Create a post.
		$_iThreadID = self::insertPost( $aThreadOptions, TaskScheduler_Registry::PostType_Thread );
						
		// Add terms because the 'tax_input' argument does not take effect for some reasons when multiple terms are set.
 		$_aSystemInternalTerms = isset( $aThreadOptions['tax_input'][ TaskScheduler_Registry::Taxonomy_SystemLabel ] )
			? $aThreadOptions['tax_input'][ TaskScheduler_Registry::Taxonomy_SystemLabel ]
			: array();
		if ( ! empty( $_aSystemInternalTerms ) ) {
			wp_set_object_terms( $_iThreadID, $_aSystemInternalTerms, TaskScheduler_Registry::Taxonomy_SystemLabel, true );
		}				
				
		return $_iThreadID;
	}
		
}