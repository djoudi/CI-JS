<?php 

/**
 * User model
 *
 * based on sparks/php-activerecord
 *
 * php-activerecord mimics Ruby on Rails type active record
 * 
 * It is required to name the file in the same manner as the class (uppercase)
 *
 *
 */
class User extends ActiveRecord\Model
{
	
	/**
	 * before_save
	 *
	 * defines methods that will be called before save actions happen.
	 */
	//static $before_save = array('create_slug');
	
	
	
	/**
	 * attr_protected
	 *
	 * Protected attributes have special rules governing how they are edited.
	 */
	static $attr_protected = array('admin');



	/**
	 * has_many
	 *
	 * Define associations for the User Model
	 * 
	 * http://www.phpactiverecord.org/projects/main/wiki/Associations
	 */
	static $has_many = array(
      array('microposts'),
	  array('comments')
    );



	/**
	 * setters allow definition of custom methods for assigning a value to an attribute
	  http://www.phpactiverecord.org/projects/main/wiki/Utilities
	 */
	public function set_password($plaintext) {
	
		/*
		// new salt for every password
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		// concat for further unique
		$hash = hash('sha256', $salt . $password);
		return $salt . $hash;
		*/
		
		// if the parameter is not the same as the attribute, ie $plaintext != $password
		//$this->password = md5($plaintext);
		
		// if the parameter is the same as the attribute, we need to use assign_attribute();
		$this->assign_attribute('password', md5($plaintext));
		
	}
	
	
	/**
	 * validate_password
	 *
	 * used within the login function to check for a valid password
	 *
	 */
	private function validate_password($password) {
	
		/*
		// pull the hash password abck apart
		$salt = substr($this->password, 0, 64);
		$hash = substr($this->password, 64, 64);
		// now, check to see if we get the same val
		$password_hash = hash('sha256', $salt . $password);
		// are they equal?
		// return true or false
		return $password_hash == $password;	
		*/	
		return md5($this->password);
	}
	
	
	/**
	 * Login
	 *
	 * find username in the database & compare password hash.
	 * if valid, return to controller success message
	 *
	 */
	public static function login($userdata) {
		
		// php-activerecord uses reflection to generate certain methods, much like Ruby on Rails
		// find_by_ is a methd
		// username is the parameter
		$user = User::find_by_username($userdata['username']);
		
		// now validate password...
		// we have a fairly decent simple password hash
		// if password & hashed password field match, we are good
		if($user && $user->validate_password($userdata['password'])) {
			return $user;	
		} else {
			return FALSE;
		}
		
	}
	
	
	/**
	 * create_slug
	 *
	 * turn the title or name attribute into a page slug & ensure no duplicates in the DB
	 */
	public function create_slug($title) {
		// should take the $name and create a slug out of it...
		
		$slug = url_title($title, 'dash', TRUE);
		
		$slug_exists = User::find_by_username($slug);
		
		// we never want more than a single instance of a slug.
		if($slug_exists) {
			return false;
		} else {
			return $slug;
		}
		
	}
	
	

}



