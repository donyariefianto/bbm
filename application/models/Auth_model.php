<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model 
{
   // 
	public function rule()
    {
        return [
            [
                'field' => 'username',  //samakan dengan atribute name pada tags input
                'label' => 'Username',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'password',  //samakan dengan atribute name pada tags input
                'label' => 'Password',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
        ];
    }
	public function autt($nik){ 
		$this->db = $this->load->database('PAYROLL', true);
        $this->db->where('EMPLOYEEID',$nik);
        $this->db->from('EMPLOYEE');
        $this->db->join('DIVISION', 'EMPLOYEE.DIVISIONID = DIVISION.DIVISIONID');
        $query = $this->db->get();
        return $query->result();
       }
       public function dta($a){
           $this->db = $this->load->database('user', true);
           $this->db->where('Userid',$a);
           $query = $this->db->get('useraccess');
        return $query->result();
       }
}
?>
