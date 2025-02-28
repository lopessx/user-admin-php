<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		} else {
			redirect('profile/user/' . $this->session->userdata('user_id'));
		}
	}

	public function user($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$userData = $this->session->userdata();
		$this->load->model('Address_model');
		$addressData = $this->Address_model->get_by_user($userData['user_id'])[0];

		$data['name'] = $userData['name'];
		$data['email'] = $userData['email'];
		$data['userActive'] = '1';
		$data['address_id'] = $addressData->id;
		$data['zipcode'] = $addressData->zipcode;
		$data['state'] = $addressData->state;
		$data['city'] = $addressData->city;
		$data['street'] = $addressData->street;
		$data['number'] = $addressData->number;
		$data['user_id'] = $userData['user_id'];

		$this->load->view('profile', $data);
	}

	public function edit()
	{
		$this->load->model('User_model');
		$this->load->model('Address_model');

		$dataUser = [
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'active' => '1'
		];

		if (!empty($this->input->post('password'))) {
			$dataUser['password_hash'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}

		$userId = $this->session->userdata('user_id');
		$addressId = $this->input->post('address_id');

		$resultUser = $this->User_model->update($userId, $dataUser);

		$dataAddress = [
			'zipcode' => $this->input->post('zipcode'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'street' => $this->input->post('street'),
			'number' => $this->input->post('number'),
			'user_id' => $userId
		];

		$resultAddress = $this->Address_model->update($addressId, $dataAddress);

		if ($resultUser && $resultAddress) {
			$user_data = array(
				'user_id' => $userId,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'logged_in' => true
			);
			$this->session->set_userdata($user_data);

			redirect('profile/user/' . $userId);
		} else {
			echo 'Error on register';
		}
	}
}
