<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IO_model extends CI_Model
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
   
    public function getLap($divisi,$tgl1,$tgl2)
    {        
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = ['kmdivisi'=>$divisi,'kmstart >'=>$tgl1,'kmstart <'=>$tgl2];
        $this->db->where($multiple);
        $this->db->join('m2_reservasi', 'm2_reservasi.rno = m2_keluarmasuk.kmrsv');
        $this->db->join('m1_driver', 'm1_driver.dnik = m2_keluarmasuk.kmdriver');
        $query = $this->db->get('m2_keluarmasuk');
        return $query->result();
       
    }

}
