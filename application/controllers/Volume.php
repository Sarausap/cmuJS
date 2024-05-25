<?php
class Volume extends CI_Controller
{
    public function view($page = 'author_page')
    {


        $data['title'] = ucfirst($page);
        $data['volumes'] = $this->Article_model->get_volume();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/volume', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit($userId = NULL, $page = 'volume')
    {
        if ($userId === NULL) {
            show_404();
        } else {
            $data['title'] = 'Edit User';
            $data['volume'] = $this->Article_model->get_volume_by_id($userId);


            $this->load->view('templates/header', $data);
            $this->load->view('volume/' . $page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function get_volume_by_id()
    {
        $id = $this->input->get('id');
        $result = $this->Article_model->get_volume_by_id($id);
        echo json_encode($result);
    }

    public function insert($page = 'volume')
    {
        $status = 0;

        if ($this->input->post('add-status') == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        $data = array(
            'name' => $this->input->post('add-name'),
            'description' => $this->input->post('add-email'),
            'archived' => $status,
        );

        if ($this->Volume_model->insert_volume($data)) {
            $this->session->set_flashdata('success', 'User updated successfully.');
            redirect('admin/volumes');
        } else {
            $this->session->set_flashdata('error', 'There was an error updating the user.');
            redirect('admin/volumes/' . $this->input->post('userId'));
        }
    }

    public function update($page = 'volumes')
    {
        $status = 0;

        if ($this->input->post('status') == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }

        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'volume_id' => $this->input->post('volumeId'),
            'archived' => $status,
        );

        if ($this->Volume_model->update_volume($data)) {
            // echo $data['volume_id'];
            $this->session->set_flashdata('success', 'User updated successfully.');
            redirect('admin/volumes');
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