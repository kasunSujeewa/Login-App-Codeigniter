<?php
class Login extends CI_Controller
{
	public function loginIt()
	{
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Login');
		} else {
			$this->load->model('Model_user');
			$response = $this->Model_user->loginCheck();
			if ($response) {
				$user_data = array(
					'user_id' => $response->id,
					'email' => $response->email,
					'name' => $response->name,
					'logeIn' => true
				);
				$this->session->set_userdata($user_data);


				redirect('Home/homepage');
			} else {
				$this->session->set_flashdata('message', "Email Or password not matching");
				redirect('/Home/login');
			}
		}
	}
	public function Logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('logeIn');
		redirect('Home/login');
	}
}
