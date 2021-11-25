<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function rule()
    {
        return [
            [
                'field' => 'Nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Nik',  //samakan dengan atribute name pada tags input
                'label' => 'Nik',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Nopol',  //samakan dengan atribute name pada tags input
                'label' => 'Nopol',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    }
    public function getByDiv($divisi)
    {
        $this->db->where('divisi', $divisi);
        $query = $this->db->get('useraccess');
        return $query->result();
       
    }
    public function getDriver()
    {
        $multiple = [ 'aktif' => 1];
        $this->db->where($multiple);
        $query = $this->db->get('m1_driver');
        return $query->result();
       
    }
     public function getNopol()
    {
        $this->db->where('divisi','direksi');
        $query = $this->db->get('inventory_kendaraan_bbm');
        return $query->result();
       
    }
    public function getDivisi(){
        $this->db->where('divisi', $divisi);
        $query = $this->db->get('inventory_divisi');
        return $query->result();
    }
    public function getDiv()
    {
        $this->db->from('inventory_divisi');
        $query = $this->db->get();
        return $query->result();
    }
    public function save(){
        $data = array(
            "dnama" => $this->input->post('Nama'),
            "dnik" => $this->input->post('Nik'),
            "dmobil" => $this->input->post('Nopol'),
            "aktif" => 1
        );
        return $this->db->insert('m1_driver', $data);
    }
    public function update($nik)    
    {     
      $this->db->set('dnama', $this->input->post('Nama')); 
      $this->db->set('dmobil', $this->input->post('Nopol'));    
      $this->db->where('dnik', $nik);
      $this->db->update('m1_driver');
    }
    public function delete($nik)    
    {   
      $this->db->set('aktif', 0);
      $this->db->where('dnik', $nik);
      $this->db->update('m1_driver');
    }
} 