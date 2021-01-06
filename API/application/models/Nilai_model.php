<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Nilai_model extends CI_Model {

    // public function countCT() {
    //     $query = $this->db->query("select max(kd_cuti) from tbl_cuti");
    //     $cuti = $query->result_array();
    //     if($cuti[0]['max(kd_cuti)'] != null) {
    //         $nilaikode = substr($cuti[0]['max(kd_cuti)'], 2);
    //         $kode = (int) $nilaikode;
    //         $kode = $kode + 1;
    //         $hasilkode = "CT".str_pad($kode, 3, "0", STR_PAD_LEFT);
    //     } else {
    //         $hasilkode = "CT001";
    //     }
    //     return $hasilkode;
    // }

    public function read(){
       $query = $this->db->query("select * from `tbl_kinerja`");
       return $query->result_array();
    }

    public function cekNilai($arr) {
        $this->db->select('*')
                 ->where(array(
                     'nama' => $arr['nama'], 
                     'id_bulan' => $arr['bulan']));
        $query = $this->db->get('tbl_kinerja');
        if($query->num_rows() > 0){
            return $query->row();
        }else return array('peler' => 200, );;
    }

    public function cekPegawai($id) {
        $this->db->select('*')
                 ->from('tbl_pegawai')
                 ->where('nama', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return 1;
        }else return 0;
    }

    public function insert($data){
        $this->nilai        = $data['total']; 
        $this->nama         = $data['nama'];
        $this->id_bulan     = $data['bulan'];
        if($this->db->insert('tbl_kinerja',$this)) {    
            return 1;
        } else {
            return 0;
        }
    }

    public function cutiApprove($id, $status) {
        switch ($status) {
            case 'setuju':
                $this->status = 'Disetujui';
                $this->db->update('tbl_cuti', $this, array('kd_cuti' => $id));
                return 1;
                break;
            case 'tidak':
                $this->status = 'Tidak Disetujui';
                $this->db->update('tbl_cuti', $this, array('kd_cuti' => $id));
                return 1;
                break;
            default:
                return 0;
                break;
        }
    }

    public function update($id,$data){
        $this->user_name    = $data['name']; // please read the below note
        $this->user_password  = $data['pass'];
        $this->user_type = $data['type'];
        $result = $this->db->update('akun',$this,array('user_id' => $id));
        if($result) {
           return "Data is updated successfully";
        }else{
           return "Error has occurred";
       }
   }
   public function delete($id){
       $result = $this->db->query("delete from `akun` where user_id = $id");
       if($result) {
           return "Data is deleted successfully";
       } else {
           return "Error has occurred";
       }
   }
}