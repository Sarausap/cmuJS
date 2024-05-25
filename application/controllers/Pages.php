<?php
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model');
    }

    public function view($page = 'home')
    {

        $data['latest_articles'] = $this->Article_model->get_article_card_latest();
        $data['article_authors'] = $this->Author_model->get_all_article_authors();
        $data['title'] = ucfirst($page);

        $this->load->view('templates/publicHeader', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/publicFooter', $data);

        $this->load->helper('url');
    }

    public function archive($page = 'archive')
    {

        $data['articles'] = $this->Article_model->get_article_card_volume();
        $data['volumes'] = $this->Article_model->get_volume();
        $data['article_authors'] = $this->Author_model->get_all_article_authors();
        $data['title'] = ucfirst($page);

        $this->load->view('templates/publicHeader', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/publicFooter', $data);

        $this->load->helper('url');
    }

    public function ToProfile($user_id)
    {
        $data['user'] = $this->User_model->get_user_by_id($user_id);

        if (empty($data['user'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/profile', $data);
        $this->load->view('templates/footer', $data);
    }
}