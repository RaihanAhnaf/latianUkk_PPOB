<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class model_pelanggan extends  CI_Model{

    public function insertpelanggan()
    {
        //insert data
        $data = array(
            'username' => $this->input->post('username'),
            'nomor_kwh' => $this->input->post('nomor_kwh'),
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat' => $this->input->post('alamat'),
            'password' => $this->input->post('password')
        );
        //insert data to the database
        $this->db->insert('pelanggan', $data);
    }

    public function checklogin()
    {
        $username = $this->input->post('username',TRUE);
        $password = $this->input->post('password',TRUE);

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('pelanggan');

        if ($result->num_rows() == 1) {
            return $result->result();
        } else {
            return false;
        }
        
        
    }
}