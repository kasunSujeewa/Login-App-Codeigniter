<?php

class Register extends CI_Controller
{

	public function RegisterUser()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('SignUp');
		} else {
			$this->load->model('Model_user');
			$response = $this->Model_user->insertUserdata();
			if ($response) {
				$this->session->set_flashdata('message', "You registered Successfully Please Login");

				redirect('Home/signup');
			} else {
				$this->session->set_flashdata('message', "Register Failed please try again");

				redirect('Home/signup');
			}
		}
	}
}
