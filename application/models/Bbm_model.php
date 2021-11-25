<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bbm_model extends CI_Model
{
    public function rule()
    {
        return [
            [
                'field' => 'nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama Driver',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'liter',  //samakan dengan atribute name pada tags input
                'label' => 'Liter',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nopol',  //samakan dengan atribute name pada tags input
                'label' => 'Nopol',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nominal',  //samakan dengan atribute name pada tags input
                'label' => 'Nominal',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'keperluan',  //samakan dengan atribute name pada tags input
                'label' => 'Keperluan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'km',  //samakan dengan atribute name pada tags input
                'label' => 'Km',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'tujuan',  //samakan dengan atribute name pada tags input
                'label' => 'Tujuan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
        ];
    }
    public function rules()
    {
        return [
            [
                'field' => 'nominal',  //samakan dengan atribute name pada tags input
                'label' => 'Nominal',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'liter',  //samakan dengan atribute name pada tags input
                'label' => 'Liter',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'tgl',  //samakan dengan atribute name pada tags input
                'label' => 'Tgl',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
        ];
    }
    public function insrt($data){
       $this->db->insert('inventory_bbm',$data); 
    }
    public function getByDiv($divisi,$periode)
    {
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = [ 'periode' => $periode,'divisi'=>$divisi];
        $this->db->where($multiple);
        $query = $this->db->get('inventory_bbm');
        return $query->result();
       
    }
    public function getPer(){        
        $this->db->select('periode');
        $this->db->distinct();
        $query = $this->db->get('inventory_bbm');
        return $query->result();
    }
    public function gets($a){     
        $this->db->where('nota',$a);
        $query = $this->db->get('inventory_bbm');
        return $query->result();
    }
    public function cekkode($divisi,$periode)
    {
        $query = $this->db->query("SELECT MAX(nota) as kode from inventory_bbm where periode = '$periode' and divisi = '$divisi'");
        $hasil = $query->row();
        return $hasil->kode;
    }
    public function apr($K_nota,$user)    
    {   
      $this->db->set('acc', 1);
      $this->db->set('acc_by', $user);
      $this->db->where('nota', $K_nota);
      $this->db->update('inventory_bbm');
    }
    public function realisasi($isi,$K_nota)    
    {   
      $this->db->set($isi);
      $this->db->where('nota', $K_nota);
      $this->db->update('inventory_bbm');
    }
}
