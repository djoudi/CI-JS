<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Microposts controller
 *
 * Microposts are owned by a User.  They are essentially Tweets or mini-blog posts, but should
 * be able to own comments as well to allow for interactivity.
 *
 * @todo: begin using ID, but eventually change to URLs for access?
 * @todo: add 'public/private' access to the Micropost model?
 */
class Microposts extends CI_Controller {
	
	var $title = "Microposts: Twitter-like posts"; 
	
	var $sidebar_header = "Menu";
	
	var $content = "Checkout the posts below";
	
	
	/**
	 * __construct
	 *
	 * initialize the Microposts controller
	 */
	public function __construct()
	{
		// construct a parent first
		parent::__construct();
		
		// must be logged to work with Microposts
		if(!$this->session->userdata('logged_in')) {
			redirect('/users/login', 'refresh');
		}
		
		$this->load->model('Micropost');
	}
	

	/**
	 * index
	 *
	 * default action for this controller
	 */
	public function index() {
	
		redirect('/microposts/showall', 'refresh');	
		
	}

	
	/**
	 * showall
	 *
	 * show all microposts site wide
	 */
	public function showall() {
		
		$data['title'] = $this->title;
		$data['sidebar_header'] = $this->sidebar_header;
		$data['content'] = $this->content;
		
		$data['microposts'] = Micropost::find_all_by_user_id($this->session->userdata('user_id'));
			
		$this->parser->parse('microposts/showall', $data);
		
	}
	
	
	/**
	 * show
	 *
	 * show a single micropost. 
	 */
	public function show() {
		
		$micropost_id = $this->uri->segment(3);
		
		if($micropost_id) {
			$micropost = Micropost::find($micropost_id);
			if($micropost) {
			
				$data['title'] = $this->title;
				$data['sidebar_header'] = $this->sidebar_header;
				$data['content'] = $this->content;
				
				$data['micropost']['title'] = $micropost->title;
				$data['micropost']['content'] = $micropost->content;
				$data['micropost']['id'] = $micropost->id;
				
				$this->parser->parse('microposts/show', $data);
				
			} else {
				
				$this->session->set_flashdata('warning', 'Odd, we could not find that post!');
				redirect('/microposts/showall', 'refresh');
			
			}
		} else {
			
			$this->session->set_flashdata('warning', 'We are sorry, but this post does not exist');
			redirect('/microposts/showall', 'refresh');
		}
	
	}
	
	
	/**
	 * edit
	 *
	 * edit/update a micropost
	 */
	public function edit() {
		
		$micropost_id = $this->uri->segment(3);
		
		if($micropost_id) {
			$micropost = Micropost::find($micropost_id);
			if($micropost) {
			
				$data['title'] = $this->title;
				$data['sidebar_header'] = $this->sidebar_header;
				$data['content'] = $this->content;
				$data['user_id'] = $this->session->userdata('user_id'); 
		
				$data['micropost']['title'] = $micropost->title;
				$data['micropost']['content'] = $micropost->content;
				$data['micropost']['id'] = $micropost->id;
				
				$this->parser->parse('microposts/edit', $data);
				
			} else {
				
				$this->session->set_flashdata('warning', 'Odd, we could not find that post!');
				redirect('/microposts/showall', 'refresh');
			
			}
		} else {
			
			$this->session->set_flashdata('warning', 'We are sorry, but this post does not exist');
			redirect('/microposts/showall', 'refresh');
		}
		
	}
	
	/**
	 * delete
	 * 
	 * delete a micropost
	 */
	public function delete() {
		
		$micropost_id = $this->uri->segment(3);
		
		if($micropost_id) {
			$micropost = Micropost::find($micropost_id);
			
			if($micropost->delete()) {
				$this->session->set_flashdata('success', 'Your micropost has been deleted');
				redirect('/microposts/showall', 'refresh');
			} else {
				$this->session->set_flashdata('fail', 'Your micropost was not able to be deleted');
				redirect('/microposts/showall', 'refresh');
			}
				
		} else {
			$this->session->set_flashdata('fail', 'There was a problem with deleting your micropost.');
			redirect('/microposts/showall', 'refresh');
		}
		
	}
	
	
	/**
	 * create
	 *
	 * display form for creating a new micropost
	 */
	public function create() {
	
		$data['title'] = "Create a new micropost";
		$data['sidebar_header'] = $this->sidebar_header;
		$data['content'] = $this->content;
		$data['user_id'] = $this->session->userdata('user_id'); 
		
		$this->parser->parse('microposts/create', $data);
	}
	
	
	/**
	 * save
	 *
	 * save action for microposts
	 *
	 * @todo: search microposts for title or url? should not be able to have multiple of the same urls...
	 */
	public function save() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('warning', 'Your micropost was missing essential info and could not be saved. 
													  Please try again');
			redirect('/microposts/showall', 'refresh');
		}
			
		if($slug = Micropost::create_slug($this->input->post('title', TRUE))) {
			
			$micropost = new Micropost();
			$micropost->title = $this->input->post('title', TRUE);
			$micropost->content = $this->input->post('content', TRUE);
			$micropost->user_id = $this->input->post('user_id', TRUE);
		
			$micropost->slug = $slug;
			
			$micropost->save();
			
			$this->session->set_flashdata('success', 'Your micropost has been saved');
			redirect('/microposts/showall', 'refresh');
			
		} else {
			
			$this->session->set_flashdata('warning', 'We cannot save, a micropost with this title already exists');
			redirect('/microposts/showall', 'refresh');
			
		}
		
	}

}