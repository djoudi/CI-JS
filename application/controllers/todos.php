<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Todos controller
 *
 * Todos are owned by a User.  They are essentially Tweets or mini-blog posts, but should
 * be able to own comments as well to allow for interactivity.
 *
 * @todo: begin using ID, but eventually change to URLs for access?
 * @todo: add 'public/private' access to the Todo model?
 */
class Todos extends CI_Controller {

	var $title = "Todos: just a list of stuff todo"; 
	
	var $sidebar_header = "Menu";
	
	var $content = "Get stuff done!";


	/**
	 * __construct
	 *
	 * initialize the Todos controller
	 */
	public function __construct()
	{
		// construct a parent first
		parent::__construct();
		
		// must be logged to work with Todos
		if(!$this->session->userdata('logged_in')) {
			redirect('/users/login', 'refresh');
		}
		
		$this->load->model('Todo');
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
		
		$data['todos'] = Todo::all();
			
		$this->parser->parse('todos/showall', $data);
	}


	/**
	 * edit
	 *
	 * edit/update a Todo
	 */
	public function edit() {
		
		$todo_id = $this->uri->segment(3);
		
		if($todo_id) {
			$todo = Todo::find($todo_id);
			if($todo) {
			
				$data['title'] = $this->title;
				$data['sidebar_header'] = $this->sidebar_header;
				$data['content'] = $this->content;
				$data['user_id'] = $this->session->userdata('user_id'); 
		
				$data['todo']['title'] = $todo->title;
				$data['todo']['content'] = $todo->content;
				$data['todo']['id'] = $todo->id;
				
				$this->parser->parse('todos/showall', $data);
				
			} else {
				
				$this->session->set_flashdata('warning', 'Odd, we could not find that todo!');
				redirect('/todos/showall', 'refresh');
			
			}
		} else {
			
			$this->session->set_flashdata('warning', 'We are sorry, but this todo does not exist');
			redirect('/todos/showall', 'refresh');
		}
		
	}
	
	
	
	/**
	 * delete
	 * 
	 * delete a Todo
	 */
	public function delete() {
		
		$todo_id = $this->uri->segment(3);
		
		if($todo_id) {
			$todo = Todo::find($todo_id);
			
			if($todo->delete()) {
				$this->session->set_flashdata('success', 'Your Todo has been deleted');
				redirect('/todos/showall', 'refresh');
			} else {
				$this->session->set_flashdata('fail', 'Your Todo was not able to be deleted');
				redirect('/todos/showall', 'refresh');
			}
				
		} else {
			$this->session->set_flashdata('fail', 'There was a problem with deleting your Todo.');
			redirect('/todos/showall', 'refresh');
		}
		
	}
	
	
	
	/**
	 * save
	 *
	 * save action for Todos
	 *
	 * @todo: search Todos for title or url? should not be able to have multiple of the same urls...
	 */
	public function save() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('warning', 'Your Todo was missing essential info and could not be saved. 
													  Please try again');
			redirect('/todos/showall', 'refresh');
		}
			
		if($slug = Todo::create_slug($this->input->post('title', TRUE))) {
			
			$todo = new Todo();
			$todo->title = $this->input->post('title', TRUE);
			$todo->user_id = $this->input->post('user_id', TRUE);
		
			$todo->slug = $slug;
			
			$todo->save();
			
			$this->session->set_flashdata('success', 'Your Todo has been saved');
			redirect('/todos/showall', 'refresh');
			
		} else {
			
			$this->session->set_flashdata('warning', 'We cannot save, a Todo with this title already exists');
			redirect('/todos/showall', 'refresh');
			
		}
		
	}


}