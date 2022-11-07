<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
  if(empty($this->session->email)) {
	header('Location:'.base_url().'login');
  }
  elseif($this->session->rights !=='admin') {
	  header('Location:'.base_url());
  }
  function checkEmpty($value) {
	// $keys = array_keys($value);

	foreach($value as $key => $req) {

		if(empty($req)) {
			return 'false';
			break;
			// continue;

		} 
}
  }
  }

	public function index()
	{
		$data['prayer_requests'] = $this->db->where('status','pending')->get('prayer_requests')->num_rows();
		$data['contacts'] = $this->db->where('status','pending')->get('contacts')->num_rows();
		$data['recurring_donations'] = $this->db->where('status','pending')->where('type','monthly')->get('donors')->num_rows();
		$data['oneoff_donations'] = $this->db->where('status','pending')->where('type','onetime')->get('donors')->num_rows();
		$data['events'] = $this->db->where('status','active')->order_by('date','DESC')->limit(1)->get('events')->result_array();	
		$data['title'] = 'Dashboard';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}

	public function media()
	{
		$query = $this->db->order_by('id','DESC')->get('media');
		$data['media'] = $query->result_array();
		$data['title'] = 'Media';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/media',$data);
		$this->load->view('admin/footer');
	}

	public function contacts()
	{
		$query = $this->db->order_by('id','DESC')->get('contacts');
		$data['contacts'] = $query->result_array();
		$data['title'] = 'Contacts';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/contacts',$data);
		$this->load->view('admin/footer');
	}

	public function events()
	{
		$query = $this->db->order_by('id','DESC')->get('events');
		$data['events'] = $query->result_array();
		$data['title'] = 'Events';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/events',$data);
		$this->load->view('admin/footer');
	}

	public function oneOffDonors()
	{
		$query = $this->db->where('type','onetime')->order_by('id','DESC')->get('donors');
		$data['donors'] = $query->result_array();
		$data['title'] = 'One-off Donors';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/oneOffDonations');
		$this->load->view('admin/footer');
	}

	public function prayerRequests()
	{
		$query = $this->db->order_by('id','DESC')->get('prayer_requests');
		$data['prayer_requests'] = $query->result_array();
		$data['title'] = 'Prayer Requests';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/prayer_requests',$data);
		$this->load->view('admin/footer');
	}

	public function recurringDonors()
	{
		$query = $this->db->where('type','monthly')->order_by('id','DESC')->get('donors');
		$data['donors'] = $query->result_array();
		$data['title'] = 'Recurring Donors';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/recurringDonations',$data);
		$this->load->view('admin/footer');
	}

	public function users()
	{
		$query = $this->db->order_by('id','DESC')->get('users');
		$data['users'] = $query->result_array();
		$data['title'] = 'Users';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users',$data);
		$this->load->view('admin/footer');
	}


	public function do_upload(){
		$config['allowed_types']  = 'png|jpg|jpeg';
		$config['max_size']       = 10000;
		$config['upload_path']    = './uploads/images/';
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('image')){
			$arr = array(
				'status' => true,
				'value' => $this->upload->data('file_name')
			);
		} else {
				$arr = array(
					'status' => false,
					'value' => $this->upload->display_errors()
				);

			}
			echo json_encode($arr);

		  }

	public function saveMedia() {
		if(checkEmpty($this->input->post()) == 'false') { 
			echo 'All fields are required';
		} else {
			$query = $this->db->insert('media', $this->input->post());
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function updateMedia() {
		if(checkEmpty($this->input->post()) == 'false') { 
			echo 'All fields are required';
		} else {
			$query = $this->db->where('id',$this->input->post('id'))->update('media', $this->input->post());
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function saveEvent() {
		if(checkEmpty($this->input->post()) == 'false') { 
			echo 'All fields are required';
		} else {
			$query = $this->db->insert('events', $this->input->post());
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function saveUser() {
		if(checkEmpty($this->input->post()) == 'false') { 
			echo 'All fields are required';
		} else {
			$arr = array (
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'rights' => $this->input->post('rights'),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'status' => $this->input->post('status'),
				'date' => date('d-m-Y'),
			);
			$query = $this->db->insert('users', $arr);
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function updateUser() {
		if(!empty($this->input->post())) {

			if(!empty($this->input->post('password'))) {
				$arr = array (
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'rights' => $this->input->post('rights'),
					'status' => $this->input->post('status'),
					'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				);
			} else {
				$arr = array (
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'status' => $this->input->post('status'),
					'rights' => $this->input->post('rights'),
				);
			}

			$query = $this->db->where('id',$this->input->post('id'))->update('users', $arr);
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function updateEvent() {
		if(!empty($this->input->post())) {
			$query = $this->db->where('id',$this->input->post('id'))->update('events', $this->input->post());
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}


	public function login() {
		if(empty($this->input->post('email')) || empty($this->input->post('password'))) {
			echo 'false';
		} else {
			$checkEmail = $this->db->where('email',$this->input->post('email'))->get('users');
			if($checkEmail->num_rows() > 0) {
				$user = $checkEmail->row();
					if(password_verify($this->input->post('password'),$user->password)) {
						$this->session->set_userdata(get_object_vars($user));
						echo 'true';
					} else {
						echo 'false';
					}

			} else {
				echo 'false';
			}
		}
	}

	public function done() {
		$arr = explode(',',$this->input->post('items'));

		if($arr[2] == 'cancelled') {
			$this->db->where('id',$arr[0])->set('date_cancelled',date('d-m-Y'))->update($arr[1]);
		} else if($arr[2] == 'paid') {
			$this->db->where('id',$arr[0])->set('next_gift',date('d-m-Y', strtotime('+1 month', strtotime(date('d-m-Y')))))
				->set('rounds','rounds+1',FALSE)->set('date_paid',date('d-m-Y'))->update($arr[1]);
		}

		$this->db->where('id',$arr[0])->set('status',$arr[2])->update($arr[1]);
		echo 'true';
	}

	public function delete() {
		$arr = explode(',',$this->input->post('items'));
		$this->db->where('id',$arr[0])->delete($arr[1]);
		echo 'true';
	}
}

