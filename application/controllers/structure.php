<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Structure extends CI_Controller {


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