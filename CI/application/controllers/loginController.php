<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {
    function index() {
        $this->load->view("loginView");
    }

    function login() {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        if (strlen($email) && strlen($password)) {
            $this->load->model("User");

            $retVal = $this->User->findUser($email, $password);

            if ($retVal) {
                $this->session->set_userdata("currentUser", $retVal);
                redirect("mainController/getUserWelcome/" . $retVal['id']);
            }
            else {
                $this->session->set_flashdata("error", "Credentials do not match");

                redirect("/");
            }
        }
        else {
            redirect("/");
        }

    }

    function register() {

        $this->load->library('form_validation');
        $this->load->model("User");

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('alias', 'Alias', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirmPassword]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('reg[dob]', 'Date of birth', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');

        if ($this->form_validation->run()) {
            $name = $this->input->post("name");
            $alias = $this->input->post("alias");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $confirmPassword = $this->input->post("confirmPassword");
            $dob = $this->input->post("dateOfBirth");
            
            $this->load->model("User");
            $id = $this->User->registerUser($name, $alias, $email, $password, $dob);
            redirect("/");
        }
        else {
            $this->session->set_flashdata("regErrors", array(validation_errors()));
            redirect("/");
        }
    }
}