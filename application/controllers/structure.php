<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Structure extends CI_Controller {

    private function data($data = array() ) {
           $this->load->model('produits_model');
        return $data = 
            array( 'dataC' => $this->produits_model->get_produits_for_client(),
                   'data' => $this->produits_model->get_produits_for_personnal(),
                   'cat_exist' => $this->produits_model->get_categories_data()
            );
    }

    /*
    --------------------------------------ACCEUIL------------------------------------------------
    */
  public function accueil ()
  {   

      $this->templates->display('accueil', $data = self::data(array(0,2)));


  }
  
  public function liste ()
  {
      $this->templates->display('liste');
  }

    /*
    --------------------------------------ANNEXES------------------------------------------------
    */

  public function plan_du_site() {
    $this->templates->display('annexes/plan_du_site');
  }

  public function other() { 
    $this->templates->display('annexes/other');

  }

}