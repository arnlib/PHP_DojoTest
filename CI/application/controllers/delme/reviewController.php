<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReviewController extends CI_Controller {
    function index() {

    }


    public function getRecent() {
		$this->load->model('Review');
		$data['reviews'] = $this->Review->getLastThreeReviews();

		$this->load->view('welcome', $data);
	}
}