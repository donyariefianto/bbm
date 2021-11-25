<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class BR_model extends CI_Model 
{
   public function ruleadd()
    {
        return [ 
            [
                'field' => 'tglAwl',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Awal',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'tglAkhr',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal Akhir',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'driv',  //samakan dengan atribute name pada tags input
                'label' => 'Pemakai',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nopol',  //samakan dengan atribute name pada tags input
                'label' => 'Nopol',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'department',  //samakan dengan atribute name pada tags input
                'label' => 'Department',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'tujuan',  //samakan dengan atribute name pada tags input
                'label' => 'Tujuan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'keperluan',  //samakan dengan atribute name pada tags input
                'label' => 'Keperluan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    } 
    public function rule()
    {
        return [
            [
                'field' => 'divisi',  //samakan dengan atribute name pada tags input
                'label' => 'Divisi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'periode',  //samakan dengan atribute name pada tags input
                'label' => 'Periode',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    } 
    public function rules()
    {
        return [
            [
                'field' => 'driver',  //samakan dengan atribute name pada tags input
                'label' => 'Driver',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],             
            [
                'field' => 'persetujuan',  //samakan dengan atribute name pada tags input
                'label' => 'Persetujuan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    } 
    public function StatisticReservasi($divisi,$periode)
    {        
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
        $multiple = ['rdivisi'=>$divisi,'rperiode'=>$periode];
        $this->db->where($multiple);
        $query = $this->db->get('m2_reservasi');
        return $query->result();
       
    }
    public function getRes($divisi,$periode)
    {        
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
        $multiple = ['rdivisi'=>$divisi,'rperiode'=>$periode];
        $this->db->where($multiple);
        $query = $this->db->get('m2_reservasi');
        return $query->result();
       
    }
    public function status($divisi,$periode)
    {        
        //untuk data aktif tambahkan "'aktif' => 1," pada multiple
        $multiple = ['divisi'=>$divisi,'periode'=>$periode];
        $this->db->where($multiple);
        $query = $this->db->get('closing_periode');
        return $query->result();
       
    }
    public function cekkode($divisi,$periode)
    {
        $query = $this->db->query("SELECT MAX(rno) as kode from m2_reservasi where rperiode = '$periode' and rdivisi = '$divisi'");
        $hasil = $query->row();
        return $hasil->kode;
    }
    public function dept($divisi)
    {
        $multiple = ['divisi'=>$divisi];
        $this->db->distinct();
        $this->db->select('dept');        
        $this->db->where($multiple);
        $query = $this->db->get('inventory_lokasi');
        return $query->result();
    }
    public function driv()
    {
        $query = $this->db->get('m1_driver');
        return $query->result();
    }
    public function updt($isi,$rno)
    {
        $this->db->set($isi);
        $this->db->where('rnoo', $rno);
        $this->db->update('inventory_bbm');
    }    
    public function save($data)
    {
        return $this->db->insert('m2_reservasi', $data);
    }
}
?>
