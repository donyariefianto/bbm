<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('endpoint');
		$this->load->model('Auth_model');
	}
	public function index(){
		$username = $this->input->post('username');
		$password = $this->input->post("password");
		// $periode = $this->input->post('periode');
		$data = array(
			"username"=>$username,
			"password"=>$password,
			"application"=>"BBM",
			"type"=>"json"
		);
		$kirim = $this->endpoint->send_post($data); 
		$jdcode = json_decode($kirim['data']);
		// var_dump($jdcode->result);die();
		if($jdcode->status==false){
			$this->session->set_flashdata('login_gagal', $jdcode->result);
			$a = null; 
			$peringatan['satu'] = $jdcode->result;
		}else{
			$a = $jdcode->nik;
		}
		
		$peringatan['has'] = 1;
		$validation = $this->form_validation;
		$validation->set_rules($this->Auth_model->rule());
		if ($validation->run()) {            
            $dataLogin = $this->Auth_model->autt($a);
			$dataLogin2 = $this->Auth_model->dta($username);
			$row = sizeof($dataLogin);			
			$peringatan['has']=$row;
			foreach ($dataLogin as $userss);
			if ($row < 1) {
				$this->session->set_flashdata('login_gagal', 'Akun SALAH! Silahkan check kembali username / password anda. Terima kasih');
			}else{
				date_default_timezone_set('Asia/Jakarta');
				$sess_data = array(
					'username'=>$username,
					'nama' => $userss->EMNAME,
					'level' => $jdcode->result,
					'div' => $userss->DIVNAME,	
					'status'=>'login',
					'waktu'=> date("h:i:s")
				);
				// print_r($sess_data);die();
					$this->session->set_userdata('login_sukses', TRUE);
					$this->session->set_userdata($sess_data);
					redirect('');
						
			}
        }
		$this->load->view('login',$peringatan); 
	}
	
	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
    	redirect('auth'); // Redirect ke halaman login
  	}

	

}
