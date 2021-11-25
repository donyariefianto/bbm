<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi_model extends CI_Model
{
    public function rule()
    {
        return [
            [
                'field' => 'Divisi',  //samakan dengan atribute name pada tags input
                'label' => 'Divisi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'Tgl1',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Awal',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Tgl2',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Akhir',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    } 
    public function ruleDriv()
    {
        return [
            [
                'field' => 'Driver',  //samakan dengan atribute name pada tags input
                'label' => 'Driver',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'Tgl1',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Awal',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Tgl2',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Akhir',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    }  
    public function ruleNop()
    {
        return [
            [
                'field' => 'Nopol',  //samakan dengan atribute name pada tags input
                'label' => 'Nopol',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'Tgl1',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Awal',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Tgl2',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Akhir',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    }  
    public function getLap($divisi,$tgl1,$tgl2)
    {        
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = ['rdivisi'=>$divisi,'rtglstart >='=>$tgl1,'rtglstart <='=>$tgl2];
        $this->db->where($multiple);
        $query = $this->db->get('m2_reservasi');
        return $query->result();
       
    }
    public function getLapDriv($driver,$tgl1,$tgl2)
    {        
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = ['rdriver'=>$driver,'rtglstart >='=>$tgl1,'rtglstart <='=>$tgl2];
        $this->db->where($multiple);
        $query = $this->db->get('m2_reservasi');
        return $query->result();
       
    }
    public function getLapNop($nopol,$tgl1,$tgl2)
    {        
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = ['rnopol'=>$nopol,'rtglstart >='=>$tgl1,'rtglstart <='=>$tgl2];
        $this->db->where($multiple);
        $query = $this->db->get('m2_reservasi');
        return $query->result();
       
    }

}