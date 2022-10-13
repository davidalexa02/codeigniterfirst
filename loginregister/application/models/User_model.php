<?php

class User_model extends CI_Model
{

	function insertuser1($data)
	{
		$this->db->insert('blog', $data);
	}

	function insertuser2()
	{
		$data = array(
			'id' => $this->db->insert_id(),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'email' => $this->input->post('email'),
			'status' => '1'
		);
		$this->db->insert('blog', $data);
	}

	function getuser()
	{
		// if (!empty($this->input->get("search"))) {
		// 	$this->db->like('username', $this->input->get("search"));
		// 	$this->db->or_like('email', $this->input->get("search"));
		// 	$this->db->or_like('password', $this->input->get("search"));
		// }
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$query = $this->db->get("blog");
		$data = [];
		foreach ($query->result() as $r) {
			$data[] = array(
				$r->id,
				$r->username,
				$r->email,
				$r->password,
				$r->status
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);
		echo json_encode($result);
		exit();
	}

	public function updateuser($id)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'status' => '1'
		);
		$this->db->where('id', $id);
		$this->db->update('blog', $data);
	}

	function checkPassword($password, $email)
	{
		$query = $this->db->query("SELECT * FROM blog WHERE password='$password' AND email='$email' AND status='1'");
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
}
