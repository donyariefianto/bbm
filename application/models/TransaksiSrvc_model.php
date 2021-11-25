<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiSrvc_model extends CI_Model
{
    public function rule()
    {
        return [
            [
                'field' => 'no',  //samakan dengan atribute name pada tags input
                'label' => 'No. Pengajuan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'per',  //samakan dengan atribute name pada tags input
                'label' => 'Periode',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'div',  //samakan dengan atribute name pada tags input
                'label' => 'Divisi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nama',  //samakan dengan atribute name pada tags input
                'label' => 'Pemohon',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'tgl',  //samakan dengan atribute name pada tags input
                'label' => 'Tanggal',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'km',  //samakan dengan atribute name pada tags input
                'label' => 'Kilometer',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nopol',  //samakan dengan atribute name pada tags input
                'label' => 'Nopol',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'service',  //samakan dengan atribute name pada tags input
                'label' => 'Service',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'keterangan',  //samakan dengan atribute name pada tags input
                'label' => 'Keterangan',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'item',  //samakan dengan atribute name pada tags input
                'label' => 'Item',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]

        ];
    }
    public function getServis($divisi,$periode)
    {
         //untuk data aktif tambahkan "'aktif' => 1," pada multiple
		$multiple = [ 'periode' => $periode,'divisi'=>$divisi];
        $this->db->where($multiple);
        $query = $this->db->get('inventory_service');
        return $query->result();
    }
    public function insrt($data){
       $this->db->insert('inventory_service',$data); 
    }
    public function cekkode($divisi,$periode)
    {
        $query = $this->db->query("SELECT MAX(no_service) as kode from inventory_service where periode = '$periode' and divisi = '$divisi'");
        $hasil = $query->row();
        return $hasil->kode;
    }
}