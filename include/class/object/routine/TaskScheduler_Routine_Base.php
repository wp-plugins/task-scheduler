<?php
/**
 * One of the abstract classes of the TaskScheduler_Routine class.
 * 
 * @package     Task Scheduler
 * @copyright   Copyright (c) 2014, <Michael Uno>
 * @author        Michael Uno
 * @authorurl    http://michaeluno.jp
 * @since        1.0.0
 */

/**
 * This is a modified version of WP_Post.
 * 
 * @see        /wp-includes/post.php
 */
abstract class TaskScheduler_Routine_Base {

    /**
     * Post ID.
     *
     * @var int
     */
    public $ID;

    /**
     * ID of post author.
     *
     * A numeric string, for compatibility reasons.
     *
     * @var string
     */
    public $post_author = 0;

    /**
     * The post's local publication time.
     *
     * @var string
     */
    public $post_date = '0000-00-00 00:00:00';

    /**
     * The post's GMT publication time.
     *
     * @var string
     */
    public $post_date_gmt = '0000-00-00 00:00:00';

    /**
     * The post's content.
     *
     * @var string
     */
    public $post_content = '';

    /**
     * The post's title.
     *
     * @var string
     */
    public $post_title = '';

    /**
     * The post's excerpt.
     *
     * @var string
     */
    public $post_excerpt = '';

    /**
     * The post's status.
     *
     * @var string
     */
    public $post_status = 'publish';

    /**
     * Whether comments are allowed.
     *
     * @var string
     */
    public $comment_status = 'open';

    /**
     * Whether pings are allowed.
     *
     * @var string
     */
    public $ping_status = 'open';

    /**
     * The post's password in plain text.
     *
     * @var string
     */
    public $post_password = '';

    /**
     * The post's slug.
     *
     * @var string
     */
    public $post_name = '';

    /**
     * URLs queued to be pinged.
     *
     * @var string
     */
    public $to_ping = '';

    /**
     * URLs that have been pinged.
     *
     * @var string
     */
    public $pinged = '';

    /**
     * The post's local modified time.
     *
     * @var string
     */
    public $post_modified = '0000-00-00 00:00:00';

    /**
     * The post's GMT modified time.
     *
     * @var string
     */
    public $post_modified_gmt = '0000-00-00 00:00:00';

    /**
     * A utility DB field for post content.
     *
     *
     * @var string
     */
    public $post_content_filtered = '';

    /**
     * ID of a post's parent post.
     *
     * @var int
     */
    public $post_parent = 0;

    /**
     * The unique identifier for a post, not necessarily a URL, used as the feed GUID.
     *
     * @var string
     */
    public $guid = '';

    /**
     * A field used for ordering posts.
     *
     * @var int
     */
    public $menu_order = 0;

    /**
     * The post's type, like post or page.
     *
     * @var string
     */
    public $post_type = 'post';

    /**
     * An attachment's mime type.
     *
     * @var string
     */
    public $post_mime_type = '';

    /**
     * Cached comment count.
     *
     * A numeric string, for compatibility reasons.
     *
     * @var string
     */
    public $comment_count = 0;

    /**
     * Stores the post object's sanitization level.
     *
     * Does not correspond to a DB field.
     *
     * @var string
     */
    public $filter;


    
    public function __construct( $post ) {
        foreach ( get_object_vars( $post ) as $key => $value )
            $this->$key = $value;
    }

    public function __isset( $key ) {
        if ( 'ancestors' == $key )
            return true;

        if ( 'page_template' == $key )
            return ( 'page' == $this->post_type );

        if ( 'post_category' == $key )
           return true;

        if ( 'tags_input' == $key )
           return true;

        return metadata_exists( 'post', $this->ID, $key );
    }

    public function __get( $key ) {
        if ( 'page_template' == $key && $this->__isset( $key ) ) {
            return get_post_meta( $this->ID, '_wp_page_template', true );
        }

        if ( 'post_category' == $key ) {
            if ( is_object_in_taxonomy( $this->post_type, 'category' ) )
                $terms = get_the_terms( $this, 'category' );

            if ( empty( $terms ) )
                return array();

            return wp_list_pluck( $terms, 'term_id' );
        }

        if ( 'tags_input' == $key ) {
            if ( is_object_in_taxonomy( $this->post_type, 'post_tag' ) )
                $terms = get_the_terms( $this, 'post_tag' );

            if ( empty( $terms ) )
                return array();

            return wp_list_pluck( $terms, 'name' );
        }

        // Rest of the values need filtering

        if ( 'ancestors' == $key )
            $value = get_post_ancestors( $this );
        else
            $value = get_post_meta( $this->ID, $key, true );

        if ( $this->filter )
            $value = sanitize_post_field( $key, $value, $this->ID, $this->filter );

        return $value;
    }

    public function filter( $filter ) {
        if ( $this->filter == $filter )
            return $this;

        if ( $filter == 'raw' )
            return self::get_instance( $this->ID );

        return sanitize_post( $this, $filter );
    }

    public function to_array() {
        $post = get_object_vars( $this );

        foreach ( array( 'ancestors', 'page_template', 'post_category', 'tags_input' ) as $key ) {
            if ( $this->__isset( $key ) )
                $post[ $key ] = $this->__get( $key );
        }

        return $post;
    }
        
}