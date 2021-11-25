<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class laporan_model extends CI_Model 
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
     public function rule1()
    {
        return [
            [
                'field' => 'Diivisi',  //samakan dengan atribute name pada tags input
                'label' => 'Divisi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Per',  //samakan dengan atribute name pada tags input
                'label' => 'Per',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    }
    public function rule2()
    {
        return [
            [
                'field' => 'L1',  //samakan dengan atribute name pada tags input
                'label' => 'Divisi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'P1',  //samakan dengan atribute name pada tags input
                'label' => 'Per',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    } 
    public function detail($divisi,$tgl1,$tgl2)
    {    
		$multiple = ['inventory_bbm.divisi'=>$divisi,'tanggal_realisasi >='=>$tgl1,'tanggal_realisasi <='=>$tgl2];
        $this->db->where($multiple);
        $this->db->order_by('jenis');
        $this->db->join('inventory_kendaraan_bbm','on inventory_kendaraan_bbm.nopol = inventory_bbm.nopol');
        $query = $this->db->get('inventory_bbm');
        return $query->result();       
    }
    public function periode($divisi,$periode)
    {    
		$multiple = ['inventory_bbm.divisi'=>$divisi,'periode'=>$periode];
        $this->db->where($multiple);
        $this->db->order_by('jenis');
        $this->db->join('inventory_kendaraan_bbm','on inventory_kendaraan_bbm.nopol = inventory_bbm.nopol');
        $query = $this->db->get('inventory_bbm');
        return $query->result();       
    }
     public function total($divisi,$tgl1,$tgl2)
    {    
		$multiple = ['divisi'=>$divisi,'tanggal_realisasi >='=>$tgl1,'tanggal_realisasi <='=>$tgl2];
        $this->db->select('sum(nominal) as kode,sum(liter)as lit');
        $this->db->where($multiple);
        $query = $this->db->get('inventory_bbm');
        $hasil = $query->row();
        return $hasil; 
    }
   
   
}
?>
