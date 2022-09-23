<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function about()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function contact_us()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function donate()
	{
		$this->load->view('header');
		$this->load->view('donate');
		$this->load->view('footer');
	}

	public function events()
	{
		$this->load->view('header');
		$this->load->view('events');
		$this->load->view('footer');
	}

	public function media()
	{
		$this->load->view('header');
		$this->load->view('media');
		$this->load->view('footer');
	}

	public function prayer_line()
	{
		$this->load->view('header');
		$this->load->view('prayer');
		$this->load->view('footer');
	}
}
