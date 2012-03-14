<?php 
/**
 * TEST DOCTRINE2 ORM
 *
 * http://www.phpandstuff.com/articles/codeigniter-doctrine-from-scratch-day-1-install-and-setup
 *
 * NOTE: Spark doesn't work.
 * 
 */
class Hello extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->sparks('doctrine2');
		//$this->em = $this->doctrine2->em;
		$this->load->model('User');
		//echo "construct() <br />";
	}
	
	public function index()
	{
		echo "anyone here?";
	}
	
	public function world() {
		echo "Hello from CodeIgniter 2!";
	}
	
	public function user_test() {
		// doctrine ORM based Model
		$u = new User;
		$u->username = 'johndoe';
		$u->password = 'secret';
		$u->first_name = 'John';
		$u->last_name = 'Doe';
		$u->save();
		
		$u2 = new User;
		$u2->username = 'cianddoctrine';
		$u2->password = 'changeme';
		$u2->first_name = 'Codeigniter';
		$u2->last_name = 'Doctrine2';
		$u2->save();
		
		echo "added 2 users (i hope)";
		
	}
	
}