<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

	public function media()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/media');
		$this->load->view('admin/footer');
	}

	public function contacts()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/contacts');
		$this->load->view('admin/footer');
	}

	public function events()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/events');
		$this->load->view('admin/footer');
	}

	public function oneOffDonations()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/donate');
		$this->load->view('admin/footer');
	}

	public function prayer_requests()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/prayer_requests');
		$this->load->view('admin/footer');
	}
}
