<?php

class Model_user extends CI_Model
{
	function insertUserdata()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password')),
		);

		return $this->db->insert('users', $data);
	}
	function loginCheck()
	{
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$respond = $this->db->get('users');
		if ($respond->num_rows() == 1) {
			return $respond->row(0);
		} else {
			return false;
		}
	}
}
