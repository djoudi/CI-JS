<?php 

/**
 * Micropost model
 *
 * based on sparks/php-activerecord
 *
 * php-activerecord mimics Ruby on Rails type active record
 * 
 * It is required to name the file in the same manner as the class (uppercase)
 *
 *
 */
class Micropost extends ActiveRecord\Model
{
	
	/**
	 * belongs_to
	 *
	 * all Microposts are created by a User
	 */
	 static $belongs_to = array(
	 						array('user')
							);
	
	
	/**
	 * has_many
	 *
	 * all Microposts are able to have comments
	 */
	static $has_many = array(
							array('comment')				
							);

	
	/**
	 * create_slug
	 *
	 * turn the title or name attribute into a page slug & ensure no duplicates in the DB
	 */
	public function create_slug($title) {
		// should take the $name and create a slug out of it...
		
		$slug = url_title($title, 'dash', TRUE);
		
		$slug_exists = Micropost::find_by_slug($slug);
		
		// we never want more than a single instance of a slug.
		if($slug_exists) {
			return false;
		} else {
			return $slug;
		}
		
	}
}
