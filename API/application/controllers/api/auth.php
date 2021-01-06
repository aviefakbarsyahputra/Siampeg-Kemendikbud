<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->library('session');
        }    

        public function index_get(){
        //    $r = $this->user_model->read();
           $r['data'] = $this->user_model->read();
           $r['code'] = REST_Controller::HTTP_OK;
           $r['message'] = 'sukses';
           $this->response($r); 
        }
        
        public function index_put(){
           $id = $this->uri->segment(3);

           $data = array('name' => $this->input->get('name'),
           'pass' => $this->input->get('pass'),
           'type' => $this->input->get('type')
           );

            $r = $this->user_model->update($id,$data);
               $this->response($r); 
        }

       public function index_post(){
           $user = $this->post('user');
           $arr = array(
               'user' => $user,
               'pass' => md5($this->post('pass')));
            if ($this->post('action') == 'login') {
                $r = $this->user_model->login($user, md5($this->post('pass')));  
                if ($r['count'] == 1) {
                    $level = $r['data']->level;
                    $r['code'] = REST_Controller::HTTP_OK;
                    switch ($level) {
                        case 'admin':
                        $r['message'] = 'Anda '.$level;
                        break;
                        
                        case 'pegawai':
                        $r['message'] = 'Anda '.$level;
                        break;
                        
                        case 'pimpinan':
                        $r['message'] = 'Anda '.$level;
                        break;
                        
                        default:
                        $r['message'] = 'Tidak berhak mengakses';
                            break;
                    }
                }else{
                    $r['data'] = 'Not User';
                    $r['code'] = REST_Controller::HTTP_NOT_FOUND;
                }
                
                $this->response($r);
            }
       }

       public function index_delete(){
           $id = $this->uri->segment(3);
           $r = $this->user_model->delete($id);
           $this->response($r); 
       }
    }