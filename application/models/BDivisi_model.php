<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BDivisi_model extends CI_Model
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
    public function totals($tgl1,$tgl2)
    {    
		$multiple = ['tanggal_realisasi >='=>$tgl1,'tanggal_realisasi <='=>$tgl2];
        $this->db->select('sum(nominal) as kode,sum(liter)as lit');
        $this->db->where($multiple);
        $query = $this->db->get('inventory_bbm');
        $hasil = $query->row();
        return $hasil; 
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
    
    public function sumarybbm($tgl1,$tgl2)
    {    
		$multiple = ['tanggal_realisasi >='=>$tgl1,'tanggal_realisasi <='=>$tgl2];
        $this->db->where($multiple);
        $this->db->order_by('jenis');
        $this->db->join('inventory_kendaraan_bbm','on inventory_kendaraan_bbm.nopol = inventory_bbm.nopol');
        $query = $this->db->get('inventory_bbm');
        return $query->result();       
    }
    public function sumarybbms($divisi,$tgl1,$tgl2)
    {    
		$multiple = ['inventory_bbm.divisi'=>$divisi,'tanggal_realisasi >='=>$tgl1,'tanggal_realisasi <='=>$tgl2];
        $this->db->where($multiple);
        $this->db->order_by('jenis');
        $this->db->join('inventory_kendaraan_bbm','on inventory_kendaraan_bbm.nopol = inventory_bbm.nopol');
        $query = $this->db->get('inventory_bbm');
        return $query->result();       
    }
    public function getLap($divisi,$tgl1,$tgl2)
    {        
		$multiple = ['divisi'=>$divisi,'tgl >='=>$tgl1,'tgl <='=>$tgl2];
        $this->db->where($multiple);
        $this->db->join('inventory_service_detail','on inventory_service_detail.no_service = inventory_service.no_service');
        $query = $this->db->get('inventory_service');
        return $query->result();       
    }
    public function getLaps($tgl1,$tgl2)
    {        
		$multiple = ['tgl >='=>$tgl1,'tgl <='=>$tgl2];
        $this->db->where($multiple);
        $this->db->join('inventory_service_detail','on inventory_service_detail.no_service = inventory_service.no_service');
        $query = $this->db->get('inventory_service');
        return $query->result();       
    }
    public function Tot($divisi,$tgl1,$tgl2)
    {        
		$multiple = ['divisi'=>$divisi,'tgl >='=>$tgl1,'tgl <='=>$tgl2];
        $this->db->select('sum(total)as total');
        $this->db->where($multiple);
        $this->db->join('inventory_service_detail','on inventory_service_detail.no_service = inventory_service.no_service');
        $query = $this->db->get('inventory_service'); 
        $hasil = $query->row();
        return $hasil;      
    }
    public function Tots($tgl1,$tgl2)
    {        
        $this->db->select('sum(total)as total');
		$multiple = ['tgl >='=>$tgl1,'tgl <='=>$tgl2];
        $this->db->where($multiple);
        $this->db->join('inventory_service_detail','on inventory_service_detail.no_service = inventory_service.no_service');
        $query = $this->db->get('inventory_service'); 
        $hasil = $query->row();
        return $hasil;      
    }

}