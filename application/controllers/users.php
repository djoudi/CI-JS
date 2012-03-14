<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users controller
 *
 * interact with User objects throughout the site
 * handles login & profile functionality as well
 *
 *
 */
class Users extends CI_Controller {
	
	var $title = "User account section"; 
	
	var $sidebar_header = "Menu";
	
	var $content = "Welcome. Login or create an account.";
	
	var $profile_content = "Welcome to your user profile";

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}
	
	
	
	/**
	 * index
	 *
	 * The entry point to the application, the index action
	 * provides a login form or register new user link
	 *
	 */
	public function index() {
	
		$data['title'] = $this->title;
		$data['sidebar_header'] = $this->sidebar_header;
		$data['content'] = $this->content;
		
		$this->parser->parse('shared/header', $data);
      	
		$this->parser->parse('users/login', $data);
		
		$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
		
		
	}
	
	/**
	 * Register
	 *
	 * load the registration form for a new user to create an account
	 */
	public function register() {
		
		// if logged in, go to update
		if($this->session->userdata('logged_in')) {
			redirect('/users/update', 'refresh');
		}
	
		$data['title'] = $this->title;
		$data['sidebar_header'] = $this->sidebar_header;
		$data['content'] = $this->content;
		
		$this->parser->parse('shared/header', $data);
      	
		$this->parser->parse('users/register', $data);
		
		$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
	}
	
	
	/**
	 * Update
	 *
	 * Allow the user to change their information
	 *
	 */
	public function update() {
		
		// cannot update if not logged in
		if(!$this->session->userdata('logged_in')) {
			redirect('/users/login', 'refresh');
		}
		
		$user = User::find_by_username($this->session->userdata('username'));
		
		$data['user']['first_name'] = $user->first_name;
		$data['user']['last_name'] = $user->last_name;
		$data['user']['email'] = $user->email;
		$data['user']['username'] = $user->username;
		
		
		$data['title'] = $this->title;
		$data['sidebar_header'] = $this->sidebar_header;
		$data['content'] = "update your user information";
		
		
		$this->parser->parse('shared/header', $data);
      	
		$this->parser->parse('users/edit', $data);
		
		$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
	}
	
	
	
	/**
	 * Create
	 *
	 * Create a new user account.
	 * Query the model to ensure no duplicate users
	 *
	 */
	public function create() {
		
		// cannot create account if already logged in
		if($this->session->userdata('logged_in')) {
			redirect('/users/profile', 'refresh');
		}
		
		// check for preexisting user
		if(User::exists(array('username' => $this->input->post('username')))) 
		{
		
			$this->session->set_flashdata('username_exists', 'Sorry, that username already exists in our system.');
			// true means we already have this username
			redirect('/users/login/', 'refresh');
			
		} else {
		
			// Should we push this back into the model?
			// or is it correct to leverage the model here in the controller?
			$user = new User();
			$user->username = $this->input->post('username', TRUE);
			$user->password = $this->input->post('password', TRUE);
			$user->first_name = $this->input->post('first_name', TRUE);
			$user->last_name = $this->input->post('last_name', TRUE);
			$user->email = $this->input->post('email', TRUE);
		
			$user->save();
			
			$this->session->set_userdata('username', $user->username);
			$this->session->set_userdata('email', $user->email);
			$this->session->set_userdata('logged_in', 'TRUE');
			$this->session->set_flashdata('user_created', 'Success! Your account has been created.');
			redirect('/users/profile/', 'refresh');
		
		}
		
	}
	
	
	
	/**
	 * login
	 *
	 * query the model to see if we get an existing user & route that user accordingly.
	 *
	 */
	public function login() {
		
		if($this->session->userdata('logged_in')) {
			redirect('/users/profile', 'refresh');
		}
		
		// gather data to pass to model
		$userdata = array(
						'username' 	=>	$this->input->post('username', TRUE),
						'password'	=>	$this->input->post('password', TRUE)
						);
		
		// check model for user
		$user = $this->User->login($userdata);
		if($user) {
			$this->session->set_userdata('username', $user->username);
			$this->session->set_userdata('email', $user->email);
			$this->session->set_userdata('user_id', $user->id);
			$this->session->set_userdata('logged_in', 'TRUE');
			redirect('/users/profile/', 'refresh');
		} else {
			redirect('/users/', 'refresh');
		}
	}
	
	
	
	/**
	 * logout
	 *
	 * destroy the session and route the user back to the index action
	 *
	 */
	public function logout() {
		$this->session->sess_destroy();
		$this->index();	
	}
	
	
	/**
	 * profile
	 *
	 * display the user's public profile
	 */
	public function profile() {
		
		// must be logged in to view profile
		if(!$this->session->userdata('logged_in')) {
			redirect('/users/login', 'refresh');
		}
		
		$data['title'] = $this->title;
		$data['sidebar_header'] = $this->sidebar_header;
		$data['content'] = $this->profile_content;
		
		$user = User::find_by_username($this->session->userdata('username'));
		
		$data['user']['name'] = 'full name: ' . $user->first_name . " " . $user->last_name;
		$data['user']['email'] = 'email: ' . $user->email;
		$data['user']['username'] = 'username: ' . $user->username;
		
		$data['user_message'] = $this->session->flashdata('user_created');
		
		$this->parser->parse('shared/header', $data);
      	
		$this->parser->parse('users/profile', $data);
		
		$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
		
	}
	
}