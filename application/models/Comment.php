<?php 

/**
 * Comment model
 *
 * based on sparks/php-activerecord
 *
 * php-activerecord mimics Ruby on Rails type active record
 * 
 * It is required to name the file in the same manner as the class (uppercase)
 *
 *
 */
class Comment extends ActiveRecord\Model
{
	
	/**
	 * belongs_to
	 *
	 * A comment belongs to a single user, but also may be associated with any particular item 
	 * throughout the application that supports comments. IE, microposts should be able to have comments,
	 * as should news items, etc.
	 *
	 */
	 static $belongs_to = array(
	 						array('user'),
							array('micropost')
							);
	
	/**
	 * create_slug
	 *
	 * turn the title or name attribute into a page slug & ensure no duplicates in the DB
	 */
	public function create_slug($title) {
		// should take the $name and create a slug out of it...
		
		$slug = url_title($title, 'dash', TRUE);
		
		$slug_exists = Comment::find_by_slug($slug);
		
		// we never want more than a single instance of a slug.
		if($slug_exists) {
			return false;
		} else {
			return $slug;
		}
		
	}
}