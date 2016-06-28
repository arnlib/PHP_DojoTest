<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function index($id)
	{
		$this->getUserWelcome($id);
		$this->load->view('mainView');
	}

	public function getUserWelcome($id) {
		$this->load->model('User');
		$data['user'] = $this->User->getUser($id);

		$this->load->model('Poke');
		$data['numPokers'] = $this->Poke->getNumPokers($id);
		$data['listPokers'] = $this->Poke->getPokers($id);
		$data['listAllPokes'] = $this->Poke->getAllPokes($id);


		$this->load->view('mainView', $data);
	}

	public function newUserPoke($id, $pokeThisId) {
		$this->load->model('Poke');
		$this->Poke->newPoke($id, $pokeThisId);
		redirect('mainController/getUserWelcome/' . $id);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

