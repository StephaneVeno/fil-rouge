<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Structure extends CI_Controller {


    


  /*
  *
  */

  /*private function data_header($data = array() ) {
    return $data = array(
      'parents' => $this->produit_model->get_categories_data()
    );
  }

  public function set_data_header() {
    //etat supposée mutable
    $aDefaultDisplay = array(
      'layouts/header' => $data = self::data_header(array(0)),
      $sViewName,
      'layouts/footer'
    );*/
  

    /*
    --------------------------------------ACCEUIL------------------------------------------------
    */
  public function accueil ()
  {
      $this->templates->display('accueil');
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