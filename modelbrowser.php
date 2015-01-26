<?php
/*
Plugin Name: Model Browser
Plugin URI: 
Version: 0.1
Description: Modelbrowser
Author: Tom Haraldseid
Author URI: 
Plugin Slug: modelbrowser
Icon:
*/
 
// require PLUGINSPATH.'modelbrowser/libraries/thingiverse.php';
 
class Modelbrowser extends Plugin {
	
// 	protected $thingiverse;

public function __construct()
	{
		parent::__construct();
			
		$this->load->helper('url');
		
		define('MY_PLUGIN_URL', site_url().'plugin/modelbrowser/');
		define('MY_PLUGIN_PATH', PLUGINSPATH.'modelbrowser/');
		$this->load->add_package_path(MY_PLUGIN_PATH);
		
// 		$this->thingiverse = new Thingiverse();
// 		$this->load->database();
		$this->load->model('thingiverse');
		

		
// 		$this->load->library('thingiverse');
		
		$this->thingiverse->redirect_uri = MY_PLUGIN_URL.'login_response';
		

	}

	public function index(){
		
// 		$data['siteurl'] = site_url();
// 		$data['baseurl'] = base_url();
// 		$data['_loginlink'] = "<a href=".$this->thingiverse->makeLoginURL().">Login with Thingiverse</a>";
		
		
// 		$this->layout->view('index/index', $data);
		redirect($this->thingiverse->makeLoginURL());

	
	}
	
	public function login_response(){
		$this->thingiverse->oAuth($_GET['code']);
// 		$this->log_to_c('1'.$this->thingiverse->access_token);
// 		redirect(MY_PLUGIN_URL.'show_newest');
// 		$this->log_to_c('2'.$this->thingiverse->access_token);
		$this->thingiverse->getNewest();
		$data['_response_data'] = $this->thingiverse->response_data;
		
		$this->layout->view('index/index', $data);
	
	
	}
	public function show_thing($id){
		$this->thingiverse->getThingImages($id);
		$data['_response_data'] = $this->thingiverse->response_data;
		
		$this->layout->view('things/things', $data);
		
	}
	
	
	public function log_to_c( $data ) {
	
	    if ( is_array( $data ) )
	        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	    else
	        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	
	    echo $output;
	}

    

}



?>
