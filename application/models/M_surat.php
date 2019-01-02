<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model {

    // read all data by Jenis
    public function readJenis($id_jenis)
    {
        $this->db->from('t_surat');
        $this->db->where('id_jenis', $id_jenis);
        $this->db->order_by('no_surat', 'DESC');
        return $this->db->get();
    }

    public function readBy($id)
    {
        return $this->db->get_where('t_surat', array('id_surat' => $id));
    }

    public function create($data)
    {
        $this->db->insert('t_surat', $data);
        return $this->db->affected_rows();
    }

    public function update($id,$data)
    {
        $this->db->where('id_surat', $id);
        $this->db->update('t_surat', $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id_surat', $id);
        $this->db->delete('t_surat');        
        return $this->db->affected_rows();
    }

    
}
