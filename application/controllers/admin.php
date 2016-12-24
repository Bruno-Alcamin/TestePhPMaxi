<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	
	public function __construct() {
	    
	    header('Access-Control-Allow-Origin: *');

	    header('Access-Control-Allow-Methods: GET, POST');

	    header("Access-Control-Allow-Headers: X-Requested-With");
	
		parent::__construct();	
	}

	public function index() {
        $this->load->view('cadastrojornal');
	}
	
}
