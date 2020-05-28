
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
    $this->templates->display('clients1/cli_list', $data);
  }
  /**
   * \brief page d'ajout d'un client
   * \return  page formulaire d'ajout d'un client
   * \author Grillet Stéphane
   * \date 28/05/2020
   */
  public function cliAjout()
  {

    $resultajout = $this->input->post();
    $this->form_validation->set_rules('lastname', 'lastname', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('firstname', 'firstname', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('city', 'city', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('street', 'street', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('zipcode', 'zipcode', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('cell', 'cell', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('mail', 'mail', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('comfirm_password', 'comfirm_password', 'requiredrequired|matches[password]', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->templates->display('clients1/cli_list');
    } else {
      $ajout = array(
        'CLI_NOM' => $resultajout['lastname'],
        'CLI_PRENOM' => $resultajout['firstname'],
        'CLI_VILLE' => $resultajout['city'],
        'CLI_ADRESSE_FACTURATION' => $resultajout['street'],
        'CLI_CP' => $resultajout['zipcode'],
        'CLI_DDN' => $resultajout['zipcode'],
        'CLI_TEL' => $resultajout['cell'],
        'CLI_MAIL' => $resultajout['mail'],
        'CLI_MDP' => password_hash($resultajout['mdp'], PASSWORD_DEFAULT),
        'CLI_DATE_INSCRIPTION' => date('Y-m-d')
      );
      $this->Client->cliAjout($ajout);
      redirect('clients1/cli_list');
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
    $data["cli_detail"] = $this->Client->cli_detail($id);

    $resultmodif = $this->input->post();
    $this->form_validation->set_rules('lastname', 'lastname', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('firstname', 'firstname', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('mail', 'mail', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('cell', 'cell', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('street', 'street', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('city', 'city', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_rules('zipcode', 'zipcode', 'required', array('required' => 'Veuillez renseigner ce champ.'));
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    if ($this->form_validation->run() == false) {
      $this->templates->display('clients1/cli_list');
    } else {
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
      $this->Client->cliModif($modif);
      redirect('clients1/cli_list');
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
    $row = $this->Client->cli_detail($id);
    $this->Client->cliSuppr($id);
    redirect('clients1/cli_list');
  }
}
