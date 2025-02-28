<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Address_model extends CI_Model
{

    private $table = 'addresses';

    public $id;
    public $zipcode;
    public $state;
    public $city;
    public $street;
    public $number;
    public $user_id;

    public function __construct()
    {
        parent::__construct();
    }

    // Create a new address
    public function store($data)
    {
        $this->load->database();
        $result = $this->db->insert($this->table, $data);
        if ($result) {
            return $this->db->insert_id();
        }
        return $result;
    }

    // Get an address by ID
    public function get_by_id($id)
    {
        $this->load->database();

        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // Get all addresses for a specific user
    public function get_by_user($user_id)
    {
        $this->load->database();

        return $this->db->where('user_id', $user_id)->get($this->table)->result();
    }

    // Update an existing address
    public function update($id, $data)
    {
        $this->load->database();

        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Delete an address
    public function delete($id)
    {
        $this->load->database();

        return $this->db->where('id', $id)->delete($this->table);
    }
}
