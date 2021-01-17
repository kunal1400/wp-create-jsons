<?php 
/*
Plugin Name: WP Create Jsons
Plugin URI: http://www.wpallimport.com/
Description: Powerfull solution to create json which can be used in REST API
Version: 1.0.0
Author: Kunal Malviya
*/

class WPDribbble {
	protected $pluginPath;
    protected $pluginUrl;

    public function __construct()
    {
    	// Set Plugin Path
        $this->pluginPath = dirname(__FILE__);
     
        // Set Plugin URL
        $this->pluginUrl = WP_PLUGIN_URL . '/wp-create-jsons';

        add_shortcode('Dribbble', array($this, 'shortcode'));

        add_action( 'add_meta_boxes', array($this, 'cd_meta_box_add') );

        add_action('save_post', array($this, 'save_post_callback') );

        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin_js') );
		
		add_action( 'rest_api_init', array($this, 'api_register'));		
    }

    public function api_register() {
	  	/**
	  	* http://localhost/bombpad/wp-json/created_json/v1/pages/2101
	  	**/
		register_rest_route('created_json/v1', 'pages/(?P<id>\d+)', [
			'method' => 'GET',
			'callback' => array($this, 'get_created_json')
		]);
    }

    public function get_created_json( $data ) {
    	$pageId = $data['id'];
    	if ( !empty($pageId) ) {
			$createdJson = get_post_meta( $pageId, "_wp_created_json", true);
			if ($createdJson) {
				return array(
					'status' => true,
					'data' => array(
						json_decode($createdJson, true)
					)
				);
			} else {
				return array('status' => false, 'data' => array(), 'message' => '_wp_created_json is not set');
			}
    	} else {    		
				return array('status' => false, 'data' => array(), 'message' => 'page id is not present');
    	}
    }

    public function enqueue_admin_js() {
    	wp_enqueue_script( 'wp-create-jsons-admin-js', $this->pluginUrl . '/js/admin.js', array( 'jquery' ) );
    }

    public function shortcode() {
    }

    public function cd_meta_box_add() {

        add_meta_box( 'wp-create-jsons-metabox', 'Wp Create JSON: Generate Data', array($this, 'metaboxcallback'), array('post','page'), 'advanced', 'high' );
    }

    public function metaboxcallback() {
    	include 'partials/ui.php';
    }

    public function save_post_callback( $post_id ) {
    	if ( !empty($_REQUEST['_create_json']) && is_array($_REQUEST['_create_json']) ) {
    		$jsonData = json_encode($_REQUEST['_create_json'], true);
    		update_post_meta( $post_id, "_wp_created_json", $jsonData);
    	}
    }
}
 
$wpDribbble = new WPDribbble();