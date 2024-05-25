<?php
class Users extends CI_Controller
{

    public function view($page = 'users_page')
    {
        $data['title'] = ucfirst($page);
        $data['submit_status'] = null;
        $data['roles'] = $this->Role_model->get_roles();

        $selected_role = $this->input->post("role");
        if ($selected_role === 'none') {
            $data['users'] = $this->User_model->get_users();
            $data['selected_id'] = null;
        } elseif ($selected_role != "") {
            if ($this->input->post("submit_status") == 0) {
                $data['submit_status'] = 1;
            } else {
                $data['submit_status'] = 0;
            }
            $data['users'] = $this->User_model->get_user_by_role($this->input->post("role"));
            $data['selected_id'] = $this->input->post("role");
        } else {
            $data['users'] = $this->User_model->get_users();
            $data['selected_id'] = null;
        }


        //print_r($data['users']);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/' . $page, $data);
        $this->load->view('templates/footer', $data);

        $this->load->helper('url');
    }

    public function view_author($page = 'authors')
    {
        $data['title'] = ucfirst($page);
        $data['submit_status'] = null;

        $selected_role = $this->input->post("role");
        // if ($selected_role === 'none') {
        //     $data['users'] = $this->User_model->get_users();
        //     $data['selected_id'] = null;
        // } elseif ($selected_role != "") {
        //     if ($this->input->post("submit_status") == 0) {
        //         $data['submit_status'] = 1;
        //     } else {
        //         $data['submit_status'] = 0;
        //     }
        //     $data['users'] = $this->User_model->get_user_by_role(2);
        //     $data['selected_id'] = $this->input->post("role");
        // } else {
        //     $data['users'] = $this->User_model->get_users();
        //     $data['selected_id'] = null;
        // }

        $data['users'] = $this->User_model->get_user_by_role(2);
        $data['roles'] = $this->Role_model->get_roles();


        //print_r($data['users']);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/' . $page, $data);
        $this->load->view('templates/footer', $data);

        $this->load->helper('url');
    }

    public function edit($userId = NULL, $page = 'users_page')
    {
        if ($userId === NULL) {
            show_404();
        } else {
            $data['title'] = 'Edit User';
            $data['user'] = $this->User_model->get_user_by_id($userId);


            $this->load->view('templates/header', $data);
            $this->load->view('users/' . $page, $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function get_user_by_id()
    {
        $id = $this->input->get('id');
        $user = $this->User_model->get_user_by_id($id);
        echo json_encode($user);
    }

    public function update($page = 'users_page')
    {
        $status = 0;

        if ($this->input->post('status') == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        $data = array(
            'complete_name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'pword' => $this->input->post('password'),
            'status' => $status,
            'user_id' => $this->input->post('userId'),
            'role' => $this->input->post('role')
        );

        if ($this->User_model->update_user($data)) {
            $this->session->set_flashdata('success', 'User updated successfully.');
            redirect('admin/users');

        } else {
            $this->session->set_flashdata('error', 'There was an error updating the user.');
            redirect('users/edit/' . $this->input->post('userId'));
        }

    }

    public function delete($page = 'users_page', $user_id = NULL)
    {
        $user_id = $this->input->post('user_id');
        if ($user_id != NULL) {
            $this->User_model->delete_user($user_id);
            redirect('admin/users/');
        }
    }

    public function insert($page = 'users_page')
    {
        $status = 0;

        $this->form_validation->set_rules('add-name', 'Name', 'required');
        $this->form_validation->set_rules('add-email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('add-password', 'Password', 'required');

        if ($this->input->post('add-status') == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        $data = array(
            'complete_name' => $this->input->post('add-name'),
            'email' => $this->input->post('add-email'),
            'pword' => $this->input->post('add-password'),
            'role' => $this->input->post('role'),
            'status' => $status,
        );

        if ($this->User_model->insert_user($data)) {
            $this->session->set_flashdata('success', 'User updated successfully.');
            redirect('admin/users');
        } else {
            $this->session->set_flashdata('error', 'There was an error updating the user.');
            redirect('users/edit/' . $this->input->post('userId'));
        }
    }

    public function search()
    {


        $query = $this->input->get('query');
        $users = $this->User_model->search_user($query);
        $data['users'] = $users;

        // Convert the users array to JSON
        $json_users = json_encode($users);

        // Return the JSON data
        echo $json_users;
    }



}