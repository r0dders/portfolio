<?php

	/**
	*
	* Login controller - controls the login processes
	*
	**/

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	/**
	* Index, default action (shows the login form), when you do login/index
	* Checks user details against db
	* Changes session as required
	**/

	public function index()
	{

		//get the helper functions to do the clever stuff
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//set the title
		$data['title'] = 'Login Page';
		$data['login_error'] = '';


		//run the validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//check to see if the view has been run
		if ($this->form_validation->run() === FALSE)
		{
			//if not run then load then load login page
			$this->load->view('templates/header', $data);
			$this->load->view('login/index', $data);
			$this->load->view('templates/footer');
		}

		else

		{
			//data has passed validation
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//select the record from the db that matches the submission
			$user = $this->login_model->get_login($username);

			//check to see if there is any data from the query
			if (empty($user['username']))
			{
				//if query empty then send a message back to index
				// $data['login_error'] = 'User not found, please try again.';

				$this->load->view('templates/header', $data);
				$this->load->view('login/index', $data);
				$this->load->view('templates/footer');

			}
			else
			{

				//hash the submitted password ready to be matched
				$hash = hash('sha256', $user['salt'] . hash('sha256', $password));

				if ($user['is_active'] == 0) //user not activated account
				{

					//not activated so send an error message back
					$data['login_error'] = 'Please can you click on the link emailed to you to activate your account.';

					$this->load->view('templates/header', $data);
					$this->load->view('login/index', $data);
					$this->load->view('templates/footer');

				}

				elseif ($hash != $user['password'])// Check password is right

				{

					//incorrect passwork send error message back
					$data['login_error'] = "Sorry the password does not match please try again.";

					$this->load->view('templates/header', $data);
					$this->load->view('login/index', $data);
					$this->load->view('templates/footer');

				}

				else

				{

					// set up some session variables
					$new_data = array(
									'username' => $user['username'],
									'user_id' => $user['user_id'],
									'logged_in' => TRUE
								);

					$this->session->set_userdata($new_data);

					// $session_username = $this->session->userdata('username');

					// $data['username'] = $username;
					$data['username'] = $this->session->userdata('username');
					$data['login_error'] = '';
					$data['session_all'] = $this->session->userdata('user_id');

					$this->load->view('templates/header', $data);
					$this->load->view('login/success', $data);
					$this->load->view('templates/footer');

				}
			}
		}
	}

	/**
	*
	* The logout action - What you do when you logout
	*
	**/

	public function logout()
	{
		//reset the session variables
		$this->session->sess_destroy();

		//unset the data array
		unset($data);

		//set the title of the page
		$data['title'] = 'Logout';

		//load the logout page
		$this->load->view('templates/header', $data);
		$this->load->view('login/logout', $data);
		$this->load->view('templates/footer');
	}

	/**
	*
	* Register - Create a new user
	*
	**/

	public function register()
	{

		//unset the data array
		// unset($data);

		//get the helper functions to do the clever stuff
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//set the title
		$data['title'] = 'New User Registration Page';
		$data['login_error'] = '';


		//run the validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]|max_length[25]|xss_clean|is_unique[users_tbl.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[1]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[1]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|min_length[5]|max_length[25]|xss_clean|is_unique[users_tbl.email]');

		//check to see if the view has been run
		if ($this->form_validation->run() === FALSE)
		{
			//if not run then load then load login page
			$this->load->view('templates/header', $data);
			$this->load->view('login/register', $data);
			$this->load->view('templates/footer');
		}

		else //set up for insertion to db

		{

	        //run the register user
	        $this->login_model->register_user();

	    }
	}

	/**
	*
	* Register - After form submit
	*
	**/

	public function register_action()
	{

	}

	/**
	*
	* Verify user after verification link has been opened
	*
	**/

	public function verify_email()
	{


	}

}//close class

?>
