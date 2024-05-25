<?php

class Profile extends CI_Controller
{
    public function admin()
    {
        $data['user'] = $this->User_model->get_user_by_id($_SESSION["user_id"]);
        $this->load->view('templates/header');
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }

    public function contributor()
    {
        $data['user'] = $this->User_model->get_user_by_id($_SESSION["user_id"]);

        $this->load->view('templates/contributorHeader');
        $this->load->view('contributor/profile', $data);
        $this->load->view('templates/contributorFooter');
    }

    public function evaluator()
    {
        $data['user'] = $this->User_model->get_user_by_id($_SESSION["user_id"]);

        $this->load->view('templates/evaluatorHeader');
        $this->load->view('evaluator/profile', $data);
        $this->load->view('templates/contributorFooter');
    }

    public function update()
    {
        if (!empty($_FILES['profile']['name'])) {
            // A file has been selected, proceed with the upload process
            $config['upload_path'] = 'assets/profiles/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('profile')) {
                $error = array('error' => $this->upload->display_errors());
                echo "File upload failed: " . $error['error'];
                return;
            }

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
        } else {
            // No file has been selected, fall back to using a default file name
            $file_name = $this->input->post("default");
        }


        $data = array(
            "complete_name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "pword" => $this->input->post("password"),
            'user_id' => $_SESSION["user_id"],
            "profile_pic" => $file_name
        );

        $data['user'] = $this->User_model->update_user($data);
        $_SESSION["user_name"] = $this->input->post("name");

        if ($this->input->post("role") === "evaluator") {
            redirect("evaluator/profile");
        } elseif ($this->input->post("role") === "contributor") {
            redirect("user/profile");
        } elseif ($this->input->post("role") === "admin") {
            redirect("admin/dashboard");
        }
    }
}

?>