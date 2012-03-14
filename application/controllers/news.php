<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		
		if(!$this->session->userdata('logged_in')) {
			redirect('/users/login/', 'refresh');
		}		
	}

	public function index()
	{
		# We always specify the full path from the spark folder
		# echo's "Hello from the example spark!"
		$this->load->spark('example-spark/1.0.0');      
		$this->example_spark->printHello();             
		
		$data['title'] = 'News archive';
		$data['sidebar_header'] = "Menu";
		
		$data['news'] = $this->news_model->get_news();
		
		$this->parser->parse('shared/header', $data);
      	
		$this->parser->parse('news/index', $data);
		
		$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
		
		
	}

	public function view($slug)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
	
		if (empty($data['news_item']))
		{
			show_404();
		}
	
		$data['title'] = $data['news_item']['title'];
		$data['sidebar_header'] = "Menu";
		
		$this->parser->parse('shared/header', $data);
      	
		$this->load->view('news/view', $data);
		
		$this->parser->parse('shared/sidebar', $data);
      	$this->load->view('shared/footer');
		
	}
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Create a news item';
			$data['content'] = "Fill out the form below to create a new news item.";
	 		$data['sidebar_header'] = "Menu";
		
			$this->parser->parse('shared/header', $data);
      	
			$this->parser->parse('news/create', $data);
			
			$this->parser->parse('shared/sidebar', $data);
			$this->load->view('shared/footer');
			
		}
		else
		{
			// if we validate, tell the model to set_news()
			$this->news_model->set_news();
			
			$data['title'] = 'News item successfully saved.';
			$data['content'] = "You should make more news!";
	 		$data['sidebar_header'] = "Menu";
			
			$this->parser->parse('shared/header', $data);
      		$this->parser->parse('news/success', $data);
			$this->parser->parse('shared/sidebar', $data);
			$this->load->view('shared/footer');
		}
	}
	
}