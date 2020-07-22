<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
  /**
   * \brief 
   * \return  
   * \author LEGRIS Augustin
   * \date 14/04/2020
   */
  public function adminAccueil()
  {
    $this->templates->display('adminAccueil');
  }
  /**
   * \brief 
   * \return  
   * \author LEGRIS Augustin
   * \date 15/04/2020
   */
  public function Panier()
  {
    $this->templates->display('Panier');
  }
  /**
   * \brief 
   * \return  
   * \author LEGRIS Augustin
   * \date 15/04/2020
   */
  public function PaiementCom()
  {
    $this->templates->display('paiementCom');
  }
  /**
   * \brief 
   * \return  
   * \author LEGRIS Augustin
   * \date 15/04/2020
   */
  public function BonLiv()
  {
    $this->templates->display('BonLiv');
  }

  public function connexionAdmin()
  {
    $this->templates->display('connexionAdmin');
  }


  /**
   * \brief Formulaire de création d'une nouvelle session client
   * \return Formulaire de création d'une nouvelle session client
   * \author Grillet Stéphane
   * \date 19/05/2020
   */
  public function new_session_client()
  {
    $mail ="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    $pwd = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/";

    $this->form_validation->set_rules('mail', 'mail', "required|regex_match[$mail]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Mail incorrect'));
    $this->form_validation->set_rules('password', 'password', "required|regex_match[$pwd]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le mot de passe doit contenir : une majuscule, une minuscule, un chiffre, un caractère spécial et huit caractère minimum'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->templates->display('accueil');
    }    
   else {
    $res = $this->input->post();
    $requete = $this->Administration->session_client();
    $this->session->set_userdata('client', TRUE);
    $dataClient = array(
      'CLI_ID' => $requete->CLI_ID,
      'CLI_MAIL' => $requete->CLI_MAIL,
      'CLI_MDP'=> $requete->CLI_MDP,
      'CLI_ROLE'=>$requete->CLI_ROLE, 
    );
    $this->session->set_userdata('client', $dataClient);
    redirect('produits/index');
  }
}
  /**
   * \brief Suppression d'une session client
   * \return Suppression d'une session client
   * \author Grillet Stéphane
   * \date 20/05/2020
   */
  public function sup_session()
  {
    $this->session->unset_userdata('client', 'sess_client');
    $this->session->session_destroy('client', 'sess_client');
    redirect('structure/accueil');
  }

  public function new_session_admin()
  {

    $mail ="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    $pwd = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/";

    $this->form_validation->set_rules('mail', 'mail', "required|regex_match[$mail]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Mail incorrect'));
    $this->form_validation->set_rules('password', 'password', "required|regex_match[$pwd]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le mot de passe doit contenir : une majuscule, une minuscule, un chiffre, un caractère spécial et huit caractère minimum'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->templates->display('accueil');
    }    
    else {
    $this->input->post();
    $requete = $this->Administration->session_admin();
    $this->session->set_userdata('admin', TRUE);
    $dataAdmin = array(
      'PER_ID' => $requete->PER_ID,
      'PER_EMAIL' => $requete->PER_EMAIL,
      'PER_MDP' => $requete->PER_MDP,
      'PER_ROLE'=>$requete->PER_ROLE, 

    );
    $this->session->set_userdata('admin', $dataAdmin);
    redirect('structure/accueil');
  }
  }
  /**
   * \brief Suppression d'une session client
   * \return Suppression d'une session client
   * \author Grillet Stéphane
   * \date 26/05/2020
   */
  public function sup_session_admin()
  {
    $this->session->unset_userdata('admin', 'sess_admin');
    $this->session->sess_destroy('admin', 'sess_admin');
    redirect('structure/accueil');
  }
}