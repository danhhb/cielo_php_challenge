<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('security');
	}

	public function action()
	{ 
		if ($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');

			if ($data_action == "fetch")
			{
				$result = $this->user_model->fetch_all();
				$data['users'] = $result->result_array();
				$cards = $this->load->view('users/cards', $data, TRUE);

				echo "$cards";
			}
		}
		
		echo "";
	}

	public function insert()
	{

		$this->form_validation->set_rules('user_name', 'Name', 'required|max_length[22]|alpha|min_length[5]');
		$this->form_validation->set_rules('user_email', 'Email', 
			'required|valid_email|max_length[25]|is_unique[users.email]');
		$this->form_validation->set_rules('user_color', 'Favarite Color', 'max_length[7]');

		if ($this->form_validation->run())
		{
			$data = array(
				'name'			=> $this->input->post('user_name'),
				'dob'			=> $this->input->post('user_dob'),
				'email'			=> $this->input->post('user_email'),
				'fav_color'		=> $this->input->post('user_color') 
			);

			foreach ($data as $key => $value) {
				$data[$key] = $this->security->xss_clean($value);
			}

			$this->user_model->save_user($data);

			$array = array(
				'success' => true
			);
		}
		else 
		{
			$array = array(
				'error' 			=> true,
				'user_name_error'	=> form_error('user_name'),
				'user_dob_error'	=> form_error('user_dob'),
				'user_email_error'	=> form_error('user_email'),
				'user_color_error'	=> form_error('user_color')
			);
		}

		echo json_encode($array);
	}

}

?>