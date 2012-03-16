<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * goals controller
 *
 * goals are owned by a User.  They are essentially Tweets or mini-blog posts, but should
 * be able to own comments as well to allow for interactivity.
 *
 * @goal: begin using ID, but eventually change to URLs for access?
 * @goal: add 'public/private' access to the goal model?
 */
class Goals extends CI_Controller {

	var $title = "Goals: real life goals prototype for JS frameworks"; 
	
	var $sidebar_header = "Menu";
	
	var $content = "Make some goals and get them done!";


	/**
	 * __construct
	 *
	 * initialize the goals controller
	 */
	public function __construct()
	{
		// construct a parent first
		parent::__construct();
		
		// must be logged to work with goals
		if(!$this->session->userdata('logged_in')) {
			redirect('/users/login', 'refresh');
		}
		
		$this->load->model('Goal');
	}


	/**
	 * index
	 *
	 * default action for this controller.
	 * index is esssentially a showall, but will have create forms built in as well.
	 */
	public function index() {
	
		$data['title'] = $this->title;
		$data['sidebar_header'] = $this->sidebar_header;
		$data['content'] = $this->content;
		$data['user_id'] = $this->session->userdata('user_id'); 
		
		$data['goals'] = Goal::find_all_by_user_id($this->session->userdata('user_id'));
			
		$this->parser->parse('goals/showall', $data);
	}


	/**
	 * edit
	 *
	 * edit/update a goal
	 */
	public function edit() {
		
		$goal_id = $this->uri->segment(3);
		
		if($goal_id) {
			$goal = Goal::find($goal_id);
			if($goal) {
			
				$data['title'] = $this->title;
				$data['sidebar_header'] = $this->sidebar_header;
				$data['content'] = $this->content;
				$data['user_id'] = $this->session->userdata('user_id'); 
		
				$data['goal']['title'] = $goal->title;
				$data['goal']['content'] = $goal->content;
				$data['goal']['id'] = $goal->id;
				
				$this->parser->parse('goals/showall', $data);
				
			} else {
				
				$this->session->set_flashdata('warning', 'Odd, we could not find that goal!');
				redirect('goals/', 'refresh');
			
			}
		} else {
			
			$this->session->set_flashdata('warning', 'We are sorry, but this goal does not exist');
			redirect('goals/', 'refresh');
		}
		
	}
	
	
	
	/**
	 * delete
	 * 
	 * delete a goal
	 */
	public function delete() {
		
		$goal_id = $this->uri->segment(3);
		
		if($goal_id) {
			$goal = Goal::find($goal_id);
			
			if($goal->delete()) {
				$this->session->set_flashdata('success', 'Your goal has been deleted');
				redirect('/goals/', 'refresh');
			} else {
				$this->session->set_flashdata('fail', 'Your goal was not able to be deleted');
				redirect('goals/', 'refresh');
			}
				
		} else {
			$this->session->set_flashdata('fail', 'There was a problem with deleting your goal.');
			redirect('goals/', 'refresh');
		}
		
	}
	
	
	
	/**
	 * save
	 *
	 * save action for goals
	 *
	 * @goal: search goals for title or url? should not be able to have multiple of the same urls...
	 */
	public function save() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('warning', 'Your goal was missing essential info and could not be saved. 
													  Please try again');
			redirect('goals/', 'refresh');
		}
			
		if($slug = Goal::create_slug($this->input->post('title', TRUE))) {
			
			$goal = new goal();
			$goal->title = $this->input->post('title', TRUE);
			$goal->user_id = $this->input->post('user_id', TRUE);
		
			$goal->slug = $slug;
			
			$goal->save();
			
			$this->session->set_flashdata('success', 'Your goal has been saved');
			redirect('goals/', 'refresh');
			
		} else {
			
			$this->session->set_flashdata('warning', 'We cannot save, a goal with this title already exists');
			redirect('goals/', 'refresh');
			
		}
		
	}


}