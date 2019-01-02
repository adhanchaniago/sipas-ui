<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_surat');
        //redirect ke hal login kalo blm login
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
		}
    }

	public function index()
	{
        $surat = $this->m_surat->readJenis('2')->result();
		$this->blade->view('pages.tugas',['surat' => $surat]);
    }

    public function read()
    {
        $data = $this->m_surat->readJenis('2');
        $this->jsonformatter(false,'berhasil',$data->result(),200);
    }
    
    public function readBy()
    {
        $id_surat = $this->input->post('id_surat');
        $query = $this->m_surat->readBy($id_surat);
        $this->jsonformatter(false,'berhasil',$query->result(),200);
    }

    public function create()
    {
        $jenis = "2";
        $no_surat = $this->input->post('no-surat');
        $tgl = $this->input->post('tgl');
        $perihal = $this->input->post('perihal');

        $data = array('no_surat' => $no_surat,
                        'tanggal' => $tgl,
                        'perihal' => $perihal,
                        'id_jenis' => $jenis
        );
        
        $query = $this->m_surat->create($data);

        if ($query > 0) {
            $this->read();
        } else {
            $this->jsonformatter(false,'gagal','');
        }
    }
    
    public function update()
    {
        $id_surat = $this->input->post('id-surat');
        $no_surat = $this->input->post('no-surat');
        $tgl = $this->input->post('tgl');
        $perihal = $this->input->post('perihal');

        $data = array('no_surat' => $no_surat,
                        'tanggal' => $tgl,
                        'perihal' => $perihal,
        );
        
        $query = $this->m_surat->update($id_surat,$data);

        if ($query > 0) {
            $this->read();
        } else {
            $this->jsonformatter(false,'gagal','');
        }
    }

    public function delete()
    {
        $id_surat = $this->input->post('id_surat');

        $query = $this->m_surat->delete($id_surat);

        if ($query > 0) {
            $this->read();
        } else {
            $this->jsonformatter(false,'gagal','');
        }
    }

    //JSON Formatter
	public function jsonformatter($error,$msg,$data)
	{
		$json['error'] = $error;
        $json['message'] = $msg;
		$json['surat'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
    }
}
