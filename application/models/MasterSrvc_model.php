<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterSrvc_model extends CI_Model
{

    public function ruleBbm()
    {
        return [
            [
                'field' => 'JenisBbm',  //samakan dengan atribute name pada tags input
                'label' => 'Jenis Bbm',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Harga',  //samakan dengan atribute name pada tags input
                'label' => 'Harga',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Satuan',  //samakan dengan atribute name pada tags input
                'label' => 'Satuan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            
        ];
    }
    public function ruleItem()
    {
        return [
            [
                'field' => 'Kode',  //samakan dengan atribute name pada tags input
                'label' => 'Kode',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Satuan',  //samakan dengan atribute name pada tags input
                'label' => 'Satuan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Stok',  //samakan dengan atribute name pada tags input
                'label' => 'Stok',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            
        ];
    }

    //model BBM
    public function getJnsBbm()
    {
          //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = [ 'aktif' => 1];
        $this->db->where($multiple);
        $query = $this->db->get('inventory_jenis_bbm');
        return $query->result();
       
    }
    public function getItem()
    {
        $multiple = [ 'aktif' => 1];
        $this->db->where($multiple);
        $this->db->from('m1_oli');
        $query = $this->db->get();
        return $query->result();
    }
     
    public function save()
    {
        $data = array(
            "jenis_bbm" => $this->input->post('JenisBbm'),
            "Harga" => $this->input->post('Harga'),
            "satuan" => $this->input->post('Satuan'),
            "aktif" => 1
        );
        return $this->db->insert('inventory_jenis_bbm', $data);        
    }

    public function update($jenis)
    { 
      $this->db->set('jenis_bbm',$this->input->post('JenisBbm') );
      $this->db->set('satuan',$this->input->post('Satuan') );
      $this->db->set('harga',$this->input->post('Harga') );
      $this->db->where('harga', $jenis);
      $this->db->update('inventory_jenis_bbm');
    }

    public function delete($jenis)
    {
      $this->db->set('aktif', 0);
      $this->db->where('harga', $jenis);
      $this->db->update('inventory_jenis_bbm');
    }
    ///model Item
    public function saveItem()
    {
        $data = array(
            "okode" => $this->input->post('Kode'),
            "onama" => $this->input->post('Nama'),
            "osatuan" => $this->input->post('Satuan'),
            "ostok" => $this->input->post('Stok'),
            "aktif" => 1
        );
        return $this->db->insert('m1_oli', $data);        
    }
    public function updateItem($oid)
    { 
      $this->db->set('okode',$this->input->post('Kode') );
      $this->db->set('onama',$this->input->post('Nama') );
      $this->db->set('ostok',$this->input->post('Stok') );
      $this->db->set('osatuan',$this->input->post('Satuan') );
      $this->db->where('oid', $oid);
      $this->db->update('m1_oli');
    }

    public function deleteItem($oid)
    {
      $this->db->set('aktif', 0);
      $this->db->where('oid', $oid);
      $this->db->update('m1_oli');
    }
}


