<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
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
                'field' => 'Kinv',  //samakan dengan atribute name pada tags input
                'label' => 'Kode Inventaris',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Merk',  //samakan dengan atribute name pada tags input
                'label' => 'Merk',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Jenis',  //samakan dengan atribute name pada tags input
                'label' => 'Jenis',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
             [
                'field' => 'Divisi',  //samakan dengan atribute name pada tags input
                'label' => 'Divisi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
             ],
             [
                'field' => 'Knd',  //samakan dengan atribute name pada tags input
                'label' => 'Kode Kendaraan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
             ],
              [
                'field' => 'Nopol',  //samakan dengan atribute name pada tags input
                'label' => 'Nopol',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ,
            [
                'field' => 'JenisBbm',  //samakan dengan atribute name pada tags input
                'label' => 'Jenis BBM',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
        ];
    }

    
    public function getByDiv($divisi)
    {
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = [ 'aktif' => 1,'divisi'=>$divisi];
        $this->db->where($multiple);
        $query = $this->db->get('inventory_kendaraan_bbm');
        return $query->result();
       
    }
    public function getMob()
    {
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = [ 'aktif' => 1];
        $this->db->where($multiple);
        $query = $this->db->get('inventory_kendaraan_bbm');
        return $query->result();
       
    }
    public function getDiv()
    {
        $this->db->from('inventory_divisi');
        // $this->db->where('divisi','IND');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDivKhs($div)
    {
        $this->db->from('inventory_divisi');
        $this->db->where('divisi',$div);
        $query = $this->db->get();
        return $query->result();
    }
    public function getJensBbm()
    {
        $this->db->from('inventory_jenis_bbm');
        $query = $this->db->get();
        return $query->result();
    }
     public function nopoldata()
    {    
		$multiple = ['divisi'=>'direksi','tanggal_realisasi >'=>'2021-10-01','tanggal_realisasi <'=>'2021-10-08'];
        $this->db->where($multiple);
        $this->db->select('nopol');
        $this->db->group_by('nopol');
        $query = $this->db->get('inventory_bbm');
        return $query->result();       
    }
    
    public function save()
    {
        $data = array(
            "nama" => $this->input->post('Nama'),
            "kode_inventaris" => $this->input->post('Kinv'),
            "merk" => $this->input->post('Merk'),
            "jenis" => $this->input->post('Jenis'),
            "divisi" => $this->input->post('Divisi'),           
            "kode_kendaraan" => $this->input->post('Knd'),
            "nopol" => $this->input->post('Nopol'),
            "jenis_bbm" => $this->input->post('JenisBbm'),
            "inventaris" => "1",
            "aktif" => "1"
        );
        return $this->db->insert('inventory_kendaraan_bbm', $data);
    }

    public function update($K_inv)    
    {     
      $this->db->set('nama', $this->input->post('Nama')); 
      $this->db->set('merk', $this->input->post('Merk')); 
      $this->db->set('jenis', $this->input->post('Jenis')); 
      $this->db->set('divisi', $this->input->post('Divisi')); 
      $this->db->set('kode_kendaraan', $this->input->post('Knd')); 
      $this->db->set('nopol', $this->input->post('Nopol'));    
      $this->db->set('jenis_bbm', $this->input->post('JenisBbm'));   
      $this->db->where('kode_inventaris', $K_inv);
      $this->db->update('inventory_kendaraan_bbm');
    }
    public function delete($K_inv)    
    {   
      $this->db->set('aktif', 0);
      $this->db->where('kode_inventaris', $K_inv);
      $this->db->update('inventory_kendaraan_bbm');
    }
}


