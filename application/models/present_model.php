 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class present_model extends CI_Model 
{
    public function rule()
    {
        return [
            [
                'field' => 'per',  //samakan dengan atribute name pada tags input
                'label' => 'Periode',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ]
            ];
    } 
     
    public function detail($periode)
    {    
		$multiple = ['periode'=>$periode,'realisasi'=>1];
        $this->db->where($multiple);
        $this->db->select('nopol,sum(real_nominal)as total,sum(real_liter)as liter');
        $this->db->group_by('nopol');
        $query = $this->db->get('inventory_bbm');
        $isi = $query->result();
        return $isi;    
    }
    public function div($divisi,$periode,$nop)
    {    
		$multiple = ['periode'=>$periode,'realisasi'=>1,'divisi'=>$divisi,'nopol'=>$nop];
        $this->db->where($multiple);
        $this->db->select('nopol,sum(real_nominal)as total,sum(real_liter)as liter');
        $this->db->group_by('nopol');
        $query = $this->db->get('inventory_bbm');
        $isi = $query->result();
        $hasil = $query->row();
        return $isi;    
    }
}