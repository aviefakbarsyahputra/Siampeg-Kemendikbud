<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Cuti extends REST_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('cuti_model');
            $this->load->library('session');
        }    

        public function index_get(){
           $r = $this->cuti_model->read();
           $this->response($r); 
        }
        
        public function index_put(){
            /** Form url Encode */
            $id = $this->put('kd_cuti');
            $status = $this->put('status');
            $action = $this->put('action');
            if ($action == 'pimpinan') {
                $r = $this->cuti_model->cutiApprove($id, $status);    
                if ($r == 1) {
                    $res['message'] = 'Approve Sukses';
                    $res['code'] = REST_Controller::HTTP_OK;
                }else{
                    $res['message'] = 'Approve Gagal';
                    $res['code'] = REST_Controller::HTTP_BAD_REQUEST;
                }
                $this->response($res); 
            }
        }

        public function index_post(){
            $mulai_cuti = $this->post('mulai_cuti');
            $r = $this->cuti_model->countCT();
            $akhir_cuti = $this->post('akhir_cuti');
            $arr = array(
                'kd_cuti'       => $r,
                'nama'          => $this->post('nama'),
                'mulai_cuti'    => $mulai_cuti,
                'akhir_cuti'    => $akhir_cuti,
                'keterangan'    => $this->post('keterangan'),
                'status'        => 'Belum Dikonfirmasi',
                'tgl_pengajuan' => date('d-m-Y')
            );
            $action = $this->post('action');
            switch ($action) {
                case 'pegawai':
                    if (date($mulai_cuti) < date($akhir_cuti)) {
                        if ($this->cuti_model->insert($arr)) {
                            $res['message'] = 'insert sukses';
                            $res['code'] = REST_Controller::HTTP_OK;
                        }else{
                            $res['message'] = 'insert gagal';
                            $res['code'] = REST_Controller::HTTP_BAD_REQUEST;
                        }
                    }else{
                        $res['message'] = 'tanggal awal lebih besar dari tanggal akhir';
                        $res['code'] = REST_Controller::HTTP_BAD_REQUEST;
                    } 
                    break;
                
                default:
                break;
            }
            $this->response($res); 
        }

       public function user_delete(){
           $id = $this->uri->segment(3);
           $r = $this->user_model->delete($id);
           $this->response($r); 
       }
    }