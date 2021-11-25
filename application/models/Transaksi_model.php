<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function rule()
    {
        return [
            [
                'field' => 'Nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    }
    public function getKelMsk($divisi,$period)
    {
        $multiple = [ 'rdivisi'=>$divisi,'rperiode'=>$period];
        $this->db->where($multiple);
        $this->db->from('m2_reservasi');
        // $this->db->join('m2_keluarmasuk', 'm2_keluarmasuk.kmrsv = m2_reservasi.rno');
        $query = $this->db->get();
        return $query->result();
    }
    public function getRes($divisi,$periode)
    {        
        $multiple = ['rdivisi'=>$divisi,'rperiode'=>$periode,'racc'=>1];
        $this->db->where($multiple);
        $query = $this->db->get('m2_reservasi');
        return $query->result();       
    }
    public function inout($divisi,$periode)
    {        
        $multiple = ['kmdivisi'=>$divisi,'kmperiode'=>$periode,'kmstatus'=>1];
        $this->db->where($multiple);
        $this->db->join('m2_reservasi ','on m2_reservasi.rno = m2_keluarmasuk.kmrsv');
        $query = $this->db->get('m2_keluarmasuk');
        return $query->result();       
    }
    public function keluar($data)
    {        
       return $this->db->insert('m2_keluarmasuk', $data);       
    }
    public function masuk($km,$kmno)
    {        
        $this->db->set('kmmasukkm', $km);
        $this->db->where('kmno', $kmno);
        $this->db->update('m2_keluarmasuk');       
    }
    public function cekkode($divisi,$periode)
    {
        $query = $this->db->query("SELECT MAX(kmno) as kode from m2_keluarmasuk where kmperiode = '$periode' and kmdivisi = '$divisi'");
        $hasil = $query->row();
        return $hasil->kode;
    }
} 