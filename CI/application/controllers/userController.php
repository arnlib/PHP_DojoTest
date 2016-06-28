<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserController extends CI_Controller {
    function welcome() {
        $params = ["currentUser" => $this->session->userdata("currentUser")];
        $this->load->view("welcome", $params);
    }

    function getProfileInfo($id) {
    	$this->load->model('User');
    	$data['user'] = $this->User->getUser($id);

    	$this->load->model('Book');
    	$data['book'] = $this->Book->getUserReviews($id);

    	$this->load->view('userView', $data);
    }

}

