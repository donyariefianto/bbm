<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("welcome_model");
    }
	public function index()
	{
		$divisi = array('estate','hotel','direksi','trading');
		$data['divM'] = $this->welcome_model->isi();
		$data['est'] = $this->welcome_model->countDiv($divisi[0]);
		$data['hot'] = $this->welcome_model->countDiv($divisi[1]);
		$data['dir'] = $this->welcome_model->countDiv($divisi[2]);
		$data['tra'] = $this->welcome_model->countDiv($divisi[3]);
		$this->load->view('header');
		$this->load->view('main',$data);
		$this->load->view('footer');
	} 
	public function Admin()
	{
		$divisi = array('estate','hotel','direksi','trading');
		$data['divM'] = $this->welcome_model->isi();
		$data['est'] = $this->welcome_model->countDiv($divisi[0]);
		$data['hot'] = $this->welcome_model->countDiv($divisi[1]);
		$data['dir'] = $this->welcome_model->countDiv($divisi[2]);
		$data['tra'] = $this->welcome_model->countDiv($divisi[3]);
		$this->load->view('headeradmin');
		$this->load->view('main',$data);
		$this->load->view('footer');
	} 
}
