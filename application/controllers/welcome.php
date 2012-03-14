<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$data['title'] = 'JS APP Framework Tests';
    	$data['content'] = 'The goal of this simple app is to test out Backbone.js and possibly Ember.js for fitness for production of a single page web app.';
		$data['sidebar_header'] = "Menu";
	  
	  
		// activerecord test
		$data['users'] = User::all();
	
	/*
		// create will save the record and pass it back to the variable.
		// if false, the $user was not able to be created
		$user = User::create(array(
	  						'username' 		=> 'testUser',
							'password' 		=> 'testPass',
							'first_name' 	=> "Test",
							'last_name' 	=> "User",
							'email'			=> 'me@google.com'
							));	
		$user2 = User::create(array(
						'username' 		=> 'benjaminapetersen2',
						'password' 		=> 'changeme',
						'first_name' 	=> "Ben",
						'last_name' 	=> "Petersen",
						'email'			=> 'admin@benjaminapetersen.me'
						));						
		$user3 = User::create(array(
					'username' 		=> 'codeigniter_php-activerecord',
					'password' 		=> 'changeme',
					'first_name' 	=> "CodeIgniter",
					'last_name' 	=> "PHP-ActiveRecord",
					'email'			=> 'test@google.com'
					));						
		
		if($user && $user2 && $user3) {
			echo "3 users added";
		}
		
	*/	
	    /*
	  	// quick login
	  	$user = User::login($username, $password);
	  
	  	if(!$user) die('not logged in');
	  		else die('logged in');
	    */
	  
	  
	  	// templates
	  	$this->parser->parse('shared/header', $data);
      	$this->parser->parse('welcome_message', $data);
      	$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
		
	}
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */