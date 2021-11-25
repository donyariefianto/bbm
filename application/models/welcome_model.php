<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class welcome_model extends CI_Model 
{
   
	public function divisiMuncul(){ 
        $this->db->distinct();
        $this->db->select('divisi');
        $this->db->where('periode','10/2021');
        $query = $this->db->get('inventory_bbm');
        return $query->result();
    }
    public function isi(){ 
        $query = $this->db->get('inventory_bbm');
        return $query->result();
    }
    public function countDiv($divisi){
        $th = date("Y") ;
        $this->db->select('COUNT(nota) as total');
        $this->db->group_by('periode'); 
        $this->db->where('year("tanggal")',$th); 
        $this->db->where("divisi", $divisi); 
        $query = $this->db->get('inventory_bbm');
        return $query->result();
    }
}
?>
 