<?php

class Authentication extends CI_Controller
{

    public function view($page)
    {

        $data['title'] = ucfirst($page);

        if ($page = "login")
            $this->load->view('templates/publicHeader', $data);
        $this->load->view('authentication/login', $data);
        $this->load->view('templates/publicFooter', $data);

        $this->load->helper('url');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $result = $this->Authentication_model->authenticate_user($email, $password);

        if ($result === 'user_not_exists') {
            $this->load->view('user_not_exists_view');
        } elseif ($result === 'incorrect_password') {
            $this->load->view('incorrect_password_view');
        } else {
            $session_data = array(
                'user_id' => $result['user_id'],
                'user_name' => $result['complete_name'],
                'role' => $result['role']
            );
            $this->session->set_userdata($session_data);
            if ($result['role'] == 0) {
                redirect('admin/dashboard');
            } elseif ($result['role'] == 1) {
                redirect('evaluator/dashboard');
            } else {
                redirect('user/dashboard');
            }

        }
    }

}
