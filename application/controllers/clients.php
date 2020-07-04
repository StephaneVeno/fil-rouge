
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Clients extends CI_Controller
{

  /**
   * \brief page d'affichage des infos d'un client
   * \return  page d'affichage des infos d'un client
   * \author Grillet Stéphane
   * \date 28/05/2020
   */

  public function cli_list()
  {
    $data['select_cli'] = $this->Client->select_cli();
    $this->templates->display('clients/cli_list', $data);
  }
  /**
   * \brief page d'ajout d'un client
   * \return  page formulaire d'ajout d'un client
   * \author Grillet Stéphane
   * \date 28/05/2020
   */
  public function cliAjouts()
  {
    $name = "/^[a-zA-ZÀ-ú\-\s]*/";
    $ville='/^[a-zA-Z\s]{3,15}$/';
    $street ="/^[0-9a-zA-Z\s]+(?:(?:[\'\s\-\/])?[a-zA-Z]+)*$/";
    $zipcode ="/^((?:[013-9ABab][0-9ABab]))\d{3}$/";
    $cell = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/";
    $mail ="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    $pwd = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/";

    $resultajout = $this->input->post();
    $this->form_validation->set_rules('lastname', 'lastname', "required|regex_match[$name]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le Nom incorrect'));
    $this->form_validation->set_rules('firstname', 'firstname', "required|regex_match[$name]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le Prénom incorrect'));
    $this->form_validation->set_rules('city', 'city', "required|regex_match[$ville]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'La ville est incorrect'));
    $this->form_validation->set_rules('street', 'street', "required|regex_match[$street]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Adresse incorrect'));
    $this->form_validation->set_rules('zipcode', 'zipcode', "required|regex_match[$zipcode]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Code postal incorrect'));
    $this->form_validation->set_rules('cell', 'cell', "required|regex_match[$cell]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le numéro incorrect'));
    $this->form_validation->set_rules('mail', 'mail', "required|regex_match[$mail]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Mail incorrect'));
    $this->form_validation->set_rules('password', 'password', "required|regex_match[$pwd]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le mot de passe doit contenir : une majuscule, une minuscule, un chiffre, un caractère spécial et huit caractère minimum'));
    $this->form_validation->set_rules('comfirm_password', 'comfirm_password', 'required|matches[password]', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->templates->display('clients/cliAjouts');
    } else {
      $ajout = array(
        'CLI_NOM' => $resultajout['lastname'],
        'CLI_PRENOM' => $resultajout['firstname'],
        'CLI_VILLE' => $resultajout['city'],
        'CLI_ADRESSE_FACTURATION' => $resultajout['street'],
        'CLI_CP' => $resultajout['zipcode'],
        'CLI_TEL' => $resultajout['cell'],
        'CLI_MAIL' => $resultajout['mail'],
        'CLI_MDP' => password_hash($resultajout['password'], PASSWORD_DEFAULT),
      );
      $this->Client->cliAjouts($ajout);
      redirect('Clients/cli_list');
    }
  }
  /**
   * \brief page de modification d'un client
   * \return  page formulaire de modification d'un client
   * \author Grillet Stéphane
   * \date 28/05/2020
   */
  public function cliModif($id)
  {
    $data["detail"] = $this->Client->detail($id);

    $name = "/^[a-zA-ZÀ-ú\-\s]*/";
    $mail ="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    $cell = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/";
    $street ="/^[0-9a-zA-Z\s]+(?:(?:[\'\s\-\/])?[a-zA-Z]+)*$/";
    $ville='/^[a-zA-Z\s]{3,15}$/';
    $zipcode ="/^((?:[013-9ABab][0-9ABab]))\d{3}$/";

    if ($this->input->post()) {
    $this->form_validation->set_rules('lastname', 'lastname', "required|regex_match[$name]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le Nom incorrect'));
    $this->form_validation->set_rules('firstname', 'firstname', "required|regex_match[$name]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le Prénom incorrect'));
    $this->form_validation->set_rules('mail', 'mail', "required|regex_match[$mail]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Mail incorrect'));
    $this->form_validation->set_rules('cell', 'cell', "required|regex_match[$cell]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le numéro incorrect'));
    $this->form_validation->set_rules('street', 'street', "required|regex_match[$street]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Adresse incorrect'));
    $this->form_validation->set_rules('city', 'city', "required|regex_match[$ville]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'La ville est incorrect'));
    $this->form_validation->set_rules('zipcode', "required|regex_match[$zipcode]", 'required', array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Code postal incorrect'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->templates->display('clients/cliModif', $data);
    } else {
      $resultmodif = $this->input->post();
      $modif = array(
        'CLI_NOM' => $resultmodif['lastname'],
        'CLI_PRENOM' => $resultmodif['firstname'],
        'CLI_MAIL' => $resultmodif['mail'],
        'CLI_TEL' => $resultmodif['cell'],
        'CLI_ADRESSE_FACTURATION' => $resultmodif['street'],
        'CLI_VILLE' => $resultmodif['city'],
        'CLI_CP' => $resultmodif['zipcode'],
        'CLI_DATE_INSCRIPTION' => date('Y-m-d')
      );
      $this->Client->cliModif($id, $modif);
      redirect('Clients/cli_list');
    }
  } else {
    $this->templates->display('clients/cliModif', $data);
  }
  }
  /**
   * \brief Suppression d'un client
   * \return  Boutton de suppression d'un client
   * \author Grillet Stéphane
   * \date 28/05/2020
   */
  public function cliSuppr($id)
  {
    $this->Client->detail($id);
    $this->Client->cliSuppr($id);
    redirect('Clients/cli_list');
  }
  public function inscription() {

    $name = "/^[a-zA-ZÀ-ú\-\s]*/";
    $ville='/^[a-zA-Z\s]{3,15}$/';
    $street ="/^[0-9a-zA-Z]+(?:(?:[\'\s\-\/])?[a-zA-Z]+)*$/";
    $zipcode ="/^((?:[013-9ABab][0-9ABab]))\d{3}$/";
    $cell = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/";
    $mail ="/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    $pwd = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/";

    $resultajout = $this->input->post();
    $this->form_validation->set_rules('lastname', 'lastname', "required|regex_match[$name]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le Nom incorrect'));
    $this->form_validation->set_rules('firstname', 'firstname', "required|regex_match[$name]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le Prénom incorrect'));
    $this->form_validation->set_rules('city', 'city', "required|regex_match[$ville]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'La ville est incorrect'));
    $this->form_validation->set_rules('street', 'street', "required|regex_match[$street]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Adresse incorrect'));
    $this->form_validation->set_rules('zipcode', 'zipcode', "required|regex_match[$zipcode]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Code postal incorrect'));
    $this->form_validation->set_rules('cell', 'cell', "required|regex_match[$cell]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le numéro incorrect'));
    $this->form_validation->set_rules('mail', 'mail', "required|regex_match[$mail]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Mail incorrect'));
    $this->form_validation->set_rules('password', 'password', "required|regex_match[$pwd]", array('required' => 'Veuillez renseigner ce champ.','regex_match' => 'Le mot de passe doit contenir : une majuscule, une minuscule, un chiffre, un caractère spécial et huit caractère minimum'));
    $this->form_validation->set_rules('comfirm_password', 'comfirm_password', 'required|matches[password]', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->templates->display('clients/inscription');
    } else {
      $ajout = array(
        'CLI_NOM' => $resultajout['lastname'],
        'CLI_PRENOM' => $resultajout['firstname'],
        'CLI_VILLE' => $resultajout['city'],
        'CLI_ADRESSE_FACTURATION' => $resultajout['street'],
        'CLI_CP' => $resultajout['zipcode'],
        'CLI_TEL' => $resultajout['cell'],
        'CLI_MAIL' => $resultajout['mail'],
        'CLI_MDP' => password_hash($resultajout['password'], PASSWORD_DEFAULT),
      );
      $this->Client->cliAjouts($ajout);
      redirect('structure/accueil');
    }
  }
}
