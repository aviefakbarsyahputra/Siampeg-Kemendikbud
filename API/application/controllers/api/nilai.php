<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Nilai extends REST_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('nilai_model');
            $this->load->library('session');
        }    

        public function index_get(){
          $arr = array(
            'nama' => $this->get('nama'), 
            'bulan' => $this->get('bulan'));
            $r = $this->nilai_model->cekNilai($arr);
            $res['data'] = $r;
            $res['message'] = 'Sukses';
            $res['code'] = REST_Controller::HTTP_OK;
          $this->response(array('data' => $r,
                                'message' => 'sukses',
                                'code' => REST_Controller::HTTP_OK )); 
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
            $n1 = $this->post('n1');
            $n2 = $this->post('n2');
            $n3 = $this->post('n3');
            $n4 = $this->post('n4');
            $n5 = $this->post('n5');
            $n6 = $this->post('n6');
            $n7 = $this->post('n7');
            $n8 = $this->post('n8');
            $n9 = $this->post('n9');
            $n10 = $this->post('n10');
            $bulan = $this->post('bulan');
            $total = ($n1)+($n2)+($n3)+($n4)+($n5)+($n6)+($n7)+($n8)+($n9)+($n10);
            $arr = array(
                'nama'  => $this->post('nama'),
                'bulan'  => $this->post('bulan'),
                'total' => $total
            );
            $r = $this->nilai_model->cekNilai($arr);
            $action = $this->post('action');
            switch ($action) {
                case 'pegawai':
                if ($r == 1) {
                    $res['message'] = 'Nilai pada pegawai '. $arr['nama'] .' pada bulan tersebut sudah di Input';
                    $res['code'] = REST_Controller::HTTP_IM_USED;
                }else{
                    if ($this->nilai_model->cekPegawai($arr['nama']) == 1) {
                        if ($this->nilai_model->insert($arr)) {
                                $res['message'] = 'insert sukses';
                                $res['code'] = REST_Controller::HTTP_OK;
                            }else{
                                $res['message'] = 'insert gagal';
                                $res['code'] = REST_Controller::HTTP_BAD_REQUEST;

                            }
                    }else{
                        $res['message'] = 'Pegawai Tidak Ditemukan';
                        $res['code'] = REST_Controller::HTTP_NOT_FOUND;
                    }
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