<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Comments controller
 *
 * Ideally Comments should have a many-to-many relationship with anything thorughout the app....
 *
 */
class Comments extends CI_Controller {
	
	var $title = "Comments"; 
	
	var $sidebar_header = "Menu";
	
	var $content = "View the following comments";
	
	
	/**
	 * __construct
	 *
	 * initialize the Comments controller
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comments');
	}
	

	/**
	 * index
	 *
	 * default action for this controller
	 */
	public function index() {
	
	}

	
	/**
	 * create
	 *
	 * The action for creating a new comment... should this happen from the controller?
	 * perhaps this should never be called via a controller, but the model should be called
	 * directly through other controllers... such as a MICROPOST controller creating a comment model,
	 * since the micropost will own the commment.
	 */
	public function create() {
		$comment = new Comment();
		$comment->title = $this->input->post('title', TRUE);
		$comment->body = $this->input->post('body', TRUE);
		$comment->user_id = $this->input->post('user_id', TRUE);
		
		$user->save();
	
		// does CI have a handy helper for grabbing the URL, or should we save it to an input to keep track?
		//$this->input->post('from_url', TRUE);
	
		// where to go after a comment is created?
		// depends on what the comment is added to
		// redirect('/users/profile/', 'refresh');
	}
	
}