<?php

class Pages extends CI_Controller {

		public function __construct()
	{
		parent::__construct();

	}

	public function view($page = 'home')
	{

	if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

	$data['username'] = $this->session->userdata('username');
	$data['title'] = ucfirst($page); // Capitalize the first letter

	$this->load->view('templates/header', $data);
	$this->load->view('pages/'.$page, $data);
	$this->load->view('templates/footer', $data);

	}
}
