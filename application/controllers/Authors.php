<?php
class Authors extends CI_Controller
{
    public function view($page = 'author_page')
    {
        $this->load->model('Author_model');

        $data['title'] = ucfirst($page);
        $data['authors'] = $this->Author_model->get_authors();

        $this->load->view('templates/header', $data);
        $this->load->view('authors/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function get_user_by_id()
    {
        $id = $this->input->get('id');
        $result = $this->Author_model->get_author_by_id($id);
        echo json_encode($result);
    }

    public function edit($userId = NULL, $page = 'role')
    {
        if ($userId === NULL) {
            show_404();
        } else {
            $data['title'] = 'Edit User';
            $data['role'] = $this->Role_model->get_role_by_id($userId);


            $this->load->view('templates/header', $data);
            $this->load->view('volume/' . $page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function get_role_by_id()
    {
        $id = $this->input->get('id');
        $result = $this->Role_model->get_role_by_id($id);
        echo json_encode($result);
    }

    public function insert($page = 'role')
    {


        $data = array(
            'name' => $this->input->post('add-name'),
        );

        if ($this->Role_model->insert($data)) {
            $this->session->set_flashdata('success', 'User updated successfully.');
            redirect('admin/role');
        } else {
            $this->session->set_flashdata('error', 'There was an error updating the user.');
            redirect('admin/role/' . $this->input->post('userId'));
        }
    }

    public function update($page = 'role')
    {


        $data = array(
            'name' => $this->input->post('name'),
            'role_id' => $this->input->post('roleId'),
        );

        if ($this->Role_model->update($data)) {
            // echo $data['volume_id'];
            $this->session->set_flashdata('success', 'User updated successfully.');
            redirect('admin/role');
        } else {
            $this->session->set_flashdata('error', 'There was an error updating the user.');
            echo $data;
        }

    }

    public function delete($page = 'volumes', $user_id = NULL)
    {
        $user_id = $this->input->post('id');
        if ($user_id != NULL) {
            $this->Volume_model->delete_volume($user_id);
            redirect('admin/volumes');
        }
    }

}