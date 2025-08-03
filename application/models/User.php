<?php
class User extends CI_Model {

	const SESSION_KEY = 'user_id';

    	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

    function getAll() {
        $query = $this->db->get('tb_user');
        return $query->result();
    }

    public function getById($id) {
        return $this->db->get_where('tb_user', ["id" => $id])->row();
    }

    function save($data) {
        $val = array(
            'username' => $data['username'],
            'password' => $data['password']
      );
        $this->db->insert('tb_user', $val);
    }

    function update($id, $data) {
        $val = array(
            'username' => $data['username'],
            'password' => $data['password']
        );
        $this->db->where('id', $id);
        $this->db->update('tb_user', $val);
    }

    function delete($id) {
        $val = array(
            'id'=> $id
        );
        $this->db->delete('tb_user', $val);
    }

    public function login($username, $password)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('tb_user');
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah password-nya benar?
		if (!password_verify($password, $user->password)) {
			return FALSE;
		}

		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $user->username]);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$username = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where('tb_user', ['username' => $username]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}