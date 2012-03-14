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
}