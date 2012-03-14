<?php
/**
 * Static Pages Tutorial
 *
 * STATIC PAGES
 * http://localhost/local-codeigniter-2.1/user_guide/tutorial/static_pages.html
 *
 * SPARKS ORM
 * http://heybigname.com/2011/07/28/codeigniter-2-sparks-php-activerecord-part-1-installation/
 *
 */
class Pages extends CI_Controller {


	public function view($page = 'home') {


		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
			
		}
	
	
		$data['title'] = ucfirst($page); //'JS APP Framework Tests';
      	$data['content'] = 'The goal of this simple app is to test out Backbone.js and possibly Ember.js for fitness for production of a single page web app.';
	  	$data['sidebar_header'] = "Menu";
	  
	  
	  	$this->parser->parse('shared/header', $data);
      	//$this->parser->parse('welcome_message', $data);
      	$this->parser->parse('pages/'.$page, $data);
		
		$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
	  	
		
		
	}
	  
}