<?php
class Content extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('content_model');
	}

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['content'] = $this->content_model->get_content();
		$data['title'] = 'Content archive';

		$this->load->view('templates/header', $data);
		$this->load->view('content/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug)
	{
		$data['content_item'] = $this->content_model->get_content($slug);

		if (empty($data['content_item']))
		{
			show_404();
		}

		$data['title'] = $data['content_item']['content_title'];

		$this->load->view('templates/header', $data);
		$this->load->view('content/view', $data);
		$this->load->view('templates/footer');
	}

    public function create()
		{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['username'] = $this->session->userdata('username');
		$data['title'] = 'Create a content item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('content/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->content_model->set_content();

			$this->load->view('templates/header', $data);
			$this->load->view('content/success');
			$this->load->view('templates/footer');
		}
	}
}
?>