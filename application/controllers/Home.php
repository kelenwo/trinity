<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
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
		$data['title'] = 'Home';
		$this->load->view('header',$data);
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function about()
	{
		$data['title'] = 'About Us';
		$this->load->view('header',$data);
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function contact_us()
	{
		$data['title'] = 'Contact Us';
		$query = $this->db->get('countries');
		$data['countries'] = $query->result_array();
		$this->load->view('header',$data);
		$this->load->view('contact',$data);
		$this->load->view('footer');
	}

	public function donate()
	{
		$data['title'] = 'Donate';
		$query = $this->db->get('countries');
		$data['countries'] = $query->result_array();
		$this->load->view('header',$data);
		$this->load->view('donate',$data);
		$this->load->view('footer');
	}
	public function login()
	{
		$data['title'] = 'Admin Login';
		$this->load->view('header',$data);
		$this->load->view('login',$data);
		$this->load->view('footer');
	}

	public function events()
	{
		$data['title'] = 'Events';
		$query = $this->db->limit(5)->order_by('date','DESC')->get('events');
		$data['events'] = $query->result_array();
		$this->load->view('header',$data);
		$this->load->view('events', $data);
		$this->load->view('footer');
	}

	public function media()
	{
		$data['mediaTLatest'] = $this->db->where('status','active')->where('type','teaching')->limit(1)->order_by('id','DESC')->get('media')->result_array();
		
		if(!empty($data['mediaTLatest'])){
			$data['mediaT'] = $this->db->where('id !=',$data['mediaTLatest'][0]['id'])->where('type','teaching')->where('status','active')->order_by('id','DESC')->limit(10)->get('media')->result_array();
		}
		$data['mediaSLatest'] = $this->db->where('status','active')->where('type','service')->limit(1)->order_by('id','DESC')->get('media')->result_array();
		
		if(!empty($data['mediaSLatest'])){
			$data['mediaS'] = $this->db->where('id !=',$data['mediaSLatest'][0]['id'])->where('type','service')->where('status','active')->order_by('id','DESC')->limit(10)->get('media')->result_array();
		}

		
		$data['mediaOLatest'] = $this->db->where('status','active')->where('type','outreach')->limit(1)->order_by('id','DESC')->get('media')->result_array();
		
		if(!empty($data['mediaOLatest'])){
			$data['mediaO'] = $this->db->where('id !=',$data['mediaOLatest'][0]['id'])->where('type','outreach')->where('status','active')->order_by('id','DESC')->limit(10)->get('media')->result_array();
		}

		$data['title'] = 'Media';
		$this->load->view('header',$data);
		$this->load->view('media',$data);
		$this->load->view('footer');
	}

	public function prayer_line()
	{
		$data['title'] = 'Prayer Request';
		$query = $this->db->get('countries');
		$data['countries'] = $query->result_array();
		$this->load->view('header',$data);
		$this->load->view('prayer',$data);
		$this->load->view('footer');
	}

	public function fetchState($val) {
		$fetch = $this->db->where('name',urldecode($val))->get('countries')->row();

		$this->db->where('country_id',$fetch->id);
		$query = $this->db->get('states');
		echo json_encode($query->result_array());
	}

	public function auth() {
		if(empty($this->input->post('email')) || empty($this->input->post('password'))) {
			echo 'Invalid Email/Password';
		} else {
			$checkEmail = $this->db->where('email',$this->input->post('email'))->get('users');
			if($checkEmail->num_rows() > 0) {
				$user = $checkEmail->row();
					if(password_verify($this->input->post('password'),$user->password)) {
						$this->session->set_userdata(get_object_vars($user));
						echo 'true';
					} else {
						echo 'Invalid Email/Password';
					}

			} else {
				echo 'Invalid Email/Password';
			}
		}
	}

	public function savePrayer() {
		if(checkEmpty($this->input->post()) == 'false') { 
			echo 'All fields are required';
		} else {
			$query = $this->db->insert('prayer_requests', $this->input->post());
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function saveMessage() {
		if(checkEmpty($this->input->post()) == 'false') { 
			echo 'All fields are required';
		} else {
			$query = $this->db->insert('contacts', $this->input->post());
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function saveDonation() {

		if(checkEmpty($this->input->post()) == 'false') { 
			echo 'All fields are required';
		} else {
			$query = $this->db->insert('donors', $this->input->post());
			if(!$query) {
				echo $query->mysqli_error();
			} else {
				echo 'true';
			}

		}
	}

	public function logout() {
		session_destroy();
		header('Location: '.base_url());
	}
}
