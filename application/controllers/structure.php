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



  /*
  * retourne la même vue, sauf que la function détermine l'ancre cotée view
  * exemple: class/methode/$1#ancre
  * @return string
  */
  public function other() { 
    $assistance = $this->templates->display('annexes/other');
      function service() {
        return self::$assistance;
      }
      function info() {
        return self::$assistance;
      }
      function aide() {
        return self::$assistance;
      }
      function propos() {
        return self::$assistance;
      }
  }



  public function plan_du_site() {
    $this->templates->display('annexes/plan_du_site');
  }

    /*
    --------------------------------------MODAL------------------------------------------------
    */

  public function inscription() {

    if($this->form_validation->run()) {
      $this->accueil();
    } else {
      $this->templates->display('inscription');
    }
  }
}