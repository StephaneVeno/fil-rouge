<?php


defined('BASEPATH') or exit('No direct script access allowed');

// toucher pas à ma PUTAIN d'indentation, merci <3

/*
* @param array librairy inflector : Librairy de réécriture url
* @param $string form librairy : Librairy natif de CI
* @param $string form_validation librairy : Librairy natif de CI
*/
class Produits extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Produits_model')
                   ->helper(array('inflector', 'form'))
                   ->library('form_validation');
    }



    /*
    * Simplement pour réduire la répétition
    * @param array [ 'donnée' => refObj->model->method() ]
    * return array
    */
    private function data($data = array() ) {
        return $data = 
            array( 'dataC' => $this->produits_model->get_produits_for_client(),
                   'data' => $this->produits_model->get_produits_for_personnal(),
                   'cat_exist' => $this->produits_model->get_categories_data()
            );
    }

    /*
    * Redirection
    */
    public function index() {
        $this->templates->display('produits/index', $data = self::data(array(0,2)));
    }

    public function list() {
        $this->templates->display('produits/pro_list', $data = self::data(array(1,2)));
    }

    public function ajout() {
        $this->templates->display('produits/proAjouts', $data = self::data(array(1,2)));
    }

    public function modif() {
        $this->templates->display('produits/proModif', $data = self::data(array(1,2)));
    }

    public function del() {
        $this->templates->display('produits/proDelete', $data = self::data(array(1,2)));
    }

    public function create_produits() {

        if($this->input->post('create_pro')) {
            
            if($this->form_validation->run('create') == FALSE) {
                $this->ajout();
            } else {
                $config['upload_path'] = './assets/img/produits/listes/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '800000'; 
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                $slug = url_title($this->input->post('pro_lib'), '_', true);
                $config['file_name'] = $slug;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if(!$this->upload->do_upload($pro_img = 'img', $slug)) {

                    $errors = array('error' => $this->upload->display_errors());
                    $pro_img = 'noimage.jpg';
                    $this->ajout();
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $pro_img = substr($this->upload->data('file_ext'), 1);
                    $this->produits_model->insert_produits($pro_img, $slug);
                    $this->list();
                }
            }
        }
    }


    public function modifiez_produits() {

        if($this->input->post('modifiez_pro')) {
       
            if($this->form_validation->run('update') == FALSE) {

                $this->modif();
            
            } else {
                $config['upload_path'] = './assets/img/produits/listes/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '800000'; 
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                $slug = url_title($this->input->post('pro_lib'), '_', true);
                $config['file_name'] = $slug;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if(!$this->upload->do_upload($pro_img = 'img', $slug)) {

                    $errors = array('error' => $this->upload->display_errors());
                    $pro_img = 'noimage.jpg';
                    $this->modif();
                } else {

                    $data = array('upload_data' => $this->upload->data());
                    $pro_img = substr($this->upload->data('file_ext'), 1);
                    $this->produits_model->update_produits($pro_img, $slug);
                    $this->list();
                }
            }
        }
    }


    public function delete_produits() {
        if ($this->input->post('delete_pro')) {
            $id = $this->input->post('pro_exist');
            $this->produits_model->delete_produits($id);
            $this->list();
        }
    }

    public function details($slug) {
        $detail = $this->produits_model->get_produits($slug);
        $data['detail'] = $detail;
        $this->templates->display('produits/detail', $data);     
    }
}
