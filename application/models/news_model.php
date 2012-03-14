<?php
class News_model extends CI_Model {

	public function __construct()
	{
		// we are auto loading the DB
		//$this->load->database();
	
	
	}
	
	
	
	
	/**
	 * 2 functions
	 * get all news, or get a news item by slug
	 *
	 * active record takes care of sanitization
	 *
	 */
	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('news');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
	
	
	
	/**
	 * set_news
	 *
	 * the function to save news items to the database
	 */
	public function set_news()
	{
		$this->load->helper('url');
		
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		
		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
		);
		
		return $this->db->insert('news', $data);
	}
	
	
}





// no closing php tag to avoid buffering errors
