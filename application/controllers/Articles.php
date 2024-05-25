<?php
class Articles extends CI_Controller
{
    public function view($page = 'article_page')
    {
        $this->load->model('Article_model');

        $data['title'] = ucfirst($page);
        $data['volumes'] = $this->Article_Model->get_volume();
        $selected_volume = $this->input->post("volume");
        if ($selected_volume === 'none') {
            $data['articles'] = $this->Article_model->get_articles();
            $data['selected_id'] = null;
        } elseif ($selected_volume != "") {
            $data['articles'] = $this->Article_model->get_articles_by_volume($this->input->post("volume"));
            $data['selected_id'] = $this->input->post("volume");
        } else {
            $data['articles'] = $this->Article_model->get_articles();
            $data['selected_id'] = null;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('articles/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function view_article_details()
    {
        $this->load->model('Article_model');
        $data['article_authors'] = $this->Author_model->get_all_article_authors();
        $id = $this->input->post('id');

        $data['article'] = $this->Article_model->get_article_volume_author_by_id($id);
        $data['authors'] = $this->Author_model->get_article_authors($id);
        $this->load->view('templates/publicHeader', $data);
        $this->load->view('articles/view_article', $data);
        $this->load->view('templates/publicFooter', $data);
    }

    public function admin_view_article_details()
    {
        $this->load->model('Article_model');
        $id = $this->input->post('id');

        $data['article'] = $this->Article_model->get_article_volume_author_by_id($id);
        $data['authors'] = $this->Author_model->get_article_authors($id);
        $data['volumes'] = $this->Article_Model->get_volume();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/view_article', $data);
        $this->load->view('templates/footer', $data);
    }

    public function user_view_article_details()
    {
        $this->load->model('Article_model');
        $id = $this->input->post('id');

        $data['article'] = $this->Article_model->get_article_volume_author_by_id($id);
        $data['authors'] = $this->Author_model->get_article_authors($id);
        $this->load->view('templates/ContributorHeader', $data);
        $this->load->view('contributor/view_article', $data);
        $this->load->view('templates/ContributorFooter', $data);
    }

    public function contributor_view_articles()
    {
        $this->load->model('Article_model');


        $data['articles'] = $this->Article_model->get_contributor_articles();
        $data['volumes'] = $this->Article_Model->get_volume();
        $selected_volume = $this->input->post("volume");
        if ($selected_volume === 'none') {
            $data['articles'] = $this->Article_model->get_articles();
            $data['selected_id'] = null;
        } elseif ($selected_volume != "") {
            $data['articles'] = $this->Article_model->get_articles_by_volume($this->input->post("volume"));
            $data['selected_id'] = $this->input->post("volume");
        } else {
            $data['articles'] = $this->Article_model->get_articles();
            $data['selected_id'] = null;
        }

        $this->load->view('templates/contributorHeader', $data);
        $this->load->view('contributor/article', $data);
        $this->load->view('templates/contributorFooter', $data);
    }

    public function form()
    {
        $data['authors'] = $this->Author_model->get_user_author();
        $data['volumes'] = $this->Article_Model->get_volume();

        $this->load->view('templates/contributorHeader', $data);
        $this->load->view('contributor/article_form', $data);
        $this->load->view('templates/contributorFooter', $data);
    }

    public function adminform()
    {
        $data['authors'] = $this->Author_model->get_user_author();
        $data['volumes'] = $this->Article_Model->get_volume();

        $this->load->view('templates/header', $data);
        $this->load->view('contributor/article_form', $data);
        $this->load->view('templates/footer', $data);
    }
    public function update()
    {
        $id = $this->input->post('article_id');

        $data['article'] = $this->Article_Model->get_article_by_id($id);
        $data['authors'] = $this->Author_model->get_user_author();
        $data['article_authors'] = $this->Author_model->get_article_authors($id);
        $data['volumes'] = $this->Article_Model->get_volume();

        $this->load->view('templates/contributorHeader', $data);
        $this->load->view('contributor/article_form_update', $data);
        $this->load->view('templates/contributorFooter', $data);
    }

    public function admin_update()
    {
        $id = $this->input->post('article_id');

        $data['article'] = $this->Article_Model->get_article_by_id($id);
        $data['authors'] = $this->Author_model->get_user_author();
        $data['article_authors'] = $this->Author_model->get_article_authors($id);
        $data['volumes'] = $this->Article_Model->get_volume();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/article_form_update', $data);
        $this->load->view('templates/footer', $data);
    }

    public function insert_article()
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('formFile')) {
            $error = array('error' => $this->upload->display_errors());
            echo "File upload failed: " . $error['error'];
            return;
        }

        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        $this->load->model('Article_model');

        $keywordString = '';
        $keywords = $this->input->post('keyword');
        foreach ($keywords as $index => $keyword) {
            if ($index === count($keywords) - 1) {
                $keywordString .= $keyword;
            } else {
                $keywordString .= $keyword . ",";
            }
        }

        $data = array(
            'title' => $this->input->post('title'),
            'abstract' => $this->input->post('abstract'),
            'keywords' => $keywordString,
            'filename' => $file_name,
            'doi' => $this->input->post('doi'),
            'volume_id' => $this->input->post('volume'),
            'submitted_by' => $this->session->userdata("user_id"),
        );

        $article_id = $this->Article_model->insert_articles($data);

        foreach ($this->input->post("author") as $author) {
            $authordata = array(
                'article_id' => $article_id,
                'author_id' => $author
            );
            $this->Author_model->insert_article_author($authordata);
        }

        redirect("user/article");
    }

    public function author_exist($id)
    {
        $author = $this->Article_model->author_exist($id);
        return $author !== FALSE;
    }

    public function contributor_viewDetails_articles()
    {
        $id = $this->input->post('article_id');

        $data['article'] = $this->Article_model->get_article_volume_author_by_id($id);
        $data['authors'] = $this->Author_model->get_article_authors($id);

        $this->load->view('templates/contributorHeader', $data);
        $this->load->view('contributor/view_article', $data);
        $this->load->view('templates/contributorFooter', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id');

        if (!is_numeric($id)) {
            redirect('admin/articles/error_page');
        }

        $this->Article_model->delete_articles($id);

        redirect("admin/articles");
    }

    public function update_article()
    {
        $id = $this->input->post('article_id');

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('formFile')) {
            $error = array('error' => $this->upload->display_errors());
            echo "File upload failed: " . $error['error'];
            return;
        }

        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        $this->load->model('Article_model');

        $keywordString = '';
        $keywords = $this->input->post('keyword');
        foreach ($keywords as $index => $keyword) {
            if ($index === count($keywords) - 1) {
                $keywordString .= $keyword;
            } else {
                $keywordString .= $keyword . ",";
            }
        }

        $data = array(
            'title' => $this->input->post('title'),
            'abstract' => $this->input->post('abstract'),
            'keywords' => $keywordString,
            'filename' => $file_name,
            'doi' => $this->input->post('doi'),
            'volume_id' => $this->input->post('volume'),
            'published' => $this->input->post('volume'),
            'submitted_by' => $this->session->userdata("user_id"),
        );

        $this->Article_model->update_articles($data, $id);


        foreach ($this->input->post("author") as $author) {
            $this->Author_model->delete_article_author($id);
            $authordata = array(
                'article_id' => $id,
                'author_id' => $author
            );
            $this->Author_model->insert_article_author($authordata);
        }

        redirect("user/article");
    }

    public function admin_update_article()
    {
        $id = $this->input->post('article_id');

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('formFile')) {
            $file_name = $this->input->post('default_file');
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
        }

        if ($this->input->post('status') == true) {
            $status = 1;
        } else {
            $status = 0;
        }



        $this->load->model('Article_model');

        $keywordString = '';
        $keywords = $this->input->post('keyword');
        foreach ($keywords as $index => $keyword) {
            if ($index === count($keywords) - 1) {
                $keywordString .= $keyword;
            } else {
                $keywordString .= $keyword . ",";
            }
        }

        $data = array(
            'title' => $this->input->post('title'),
            'abstract' => $this->input->post('abstract'),
            'keywords' => $keywordString,
            'filename' => $file_name,
            'doi' => $this->input->post('doi'),
            'volume_id' => $this->input->post('volume'),
            'published' => $status,
            'submitted_by' => $this->session->userdata("user_id"),
        );

        $this->Article_model->update_articles($data, $id);


        foreach ($this->input->post("author") as $author) {
            $this->Author_model->delete_article_author($id);
            $authordata = array(
                'article_id' => $id,
                'author_id' => $author
            );
            $this->Author_model->insert_article_author($authordata);
        }

        redirect("admin/articles");
    }


    public function search()
    {

        $query = $this->input->get('query');
        $articles = $this->Article_model->search_article($query);
        $data['users'] = $articles;


        // Convert the users array to JSON
        $json_articles = json_encode($articles);

        // Return the JSON data
        echo $json_articles;
    }

}