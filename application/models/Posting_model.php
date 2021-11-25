<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posting_model extends CI_Model
{

    public function rule()
    {
        return [
            [
                'field' => 'periode',  //samakan dengan atribute name pada tags input
                'label' => 'Periode',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'divisi',  //samakan dengan atribute name pada tags input
                'label' => 'Divisi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
        ];
    }
    public function insrt($id,$periode,$divisi)
    {
        $data = array(
        'id' => $id,
        'divisi' => $divisi,
        'status_closing' => 0,
        'periode' => $periode );
        $this->db->insert('closing_periode', $data);
        return 'success';
        
    }
    public function isi($id,$periode,$divisi)
    {
        $data = array(
        'id' => $id,
        'divisi' => $divisi,
        'status_closing' => 0,
        'periode' => $periode );
        $this->db->insert('closing_periode', $data);
        
        
    }
    public function update($id)
    {
        $this->db->set('status_closing', 1);
        $this->db->where('id', $id);
        $this->db->update('closing_periode');       
        return 'success';
      
    }
    public function get($divisi)
    {
        $this->db->where('divisi',$divisi);
        // $this->db->where('periodsse',$periode);
        $this->db->order_by("no", "asc");
        $query = $this->db->get('closing_periode');
        return $query->result();
    }
    public function cek($divisi)
    {
        $query = $this->db->query("SELECT top 1 * from closing_periode where divisi = '$divisi' order by no desc");
        return $query->result();
    }
}
