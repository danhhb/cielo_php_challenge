<?php

class User_model extends CI_Model {

	public $name;

	public $email;

	public $dob;

	public $fav_color;
	

	public function save_user($data)
	{

		if ($this->db->insert('users', $data)) 
		{
			return $this->db->insert_id(); 
		}	
		else 
		{
			return false;
		}
	}

	public function fetch_all()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('users', 9);
	}

}