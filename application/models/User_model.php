<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'users';

    public $id;
    public $fullname;
    public $email;
    public $password_hash;
    public $active;

    // Get an address by ID
    public function get_by_id($id)
    {
        $this->load->database();

        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function get_user_by_email($email)
    {
        $this->load->database();
        return $this->db->where('email', $email)->get($this->table)->result();
    }

    public function check_password($password)
    {
        if (password_verify($password, $this->password)) {
            return true;
        }

        return false;
    }

    // Store a new user in the database
    public function store($data)
    {
        $this->load->database();
        $result = $this->db->insert($this->table, $data);

        if ($result) {
            return $this->db->insert_id();
        }
        return $result;
    }

    public function update($id, $data)
    {
        $this->load->database();

        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Set user as inactive
    public function set_inactive()
    {
        $this->load->database();
        $this->db->where('id', $this->id);
        return $this->db->update($this->table, ['active' => 0]);
    }

    // Set user as active
    public function set_active()
    {
        $this->load->database();
        $this->db->where('id', $this->id);
        return $this->db->update($this->table, ['active' => 1]);
    }

    // Set password safely
    public function set_password($password)
    {
        $this->password = $password;
    }
}
