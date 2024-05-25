<?php

class Dashboard extends CI_Controller
{
    public function admin()
    {
        $data['user'] = $this->User_model->get_user_by_id($_SESSION["user_id"]);
        $this->load->view('templates/header');
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function evaluator()
    {
        $this->load->view('templates/evaluatorHeader');
        $this->load->view('evaluator/dashboard');
        $this->load->view('templates/footer');
    }

    public function contributor()
    {
        $this->load->library('session'); // Ensure session library is loaded

        $data['articles'] = $this->Article_Model->article_likes($this->session->userdata('user_id'));

        $currentYear = date('Y');

        // Assuming get_weekly_likes_data returns an array with 'week_numbers' and 'total_likes'
        $data['likes'] = $this->Like_model->get_weekly_likes_data($this->session->userdata('user_id'));
        foreach ($data['likes']['week_numbers'] as &$weekNumber) {
            $weekNumber = $this->Like_model->week_number_to_datetime($weekNumber, $currentYear);
        }

        // Flatten the 'likes' array if necessary, depending on how you plan to use it in JS
        $flattenedLikes = [];
        foreach ($data['likes']['total_likes'] as $index => $likeCount) {
            $flattenedLikes[] = ['week' => $data['likes']['week_numbers'][$index], 'likes' => $likeCount];
        }
        $data['likes'] = $flattenedLikes;

        $data['tops'] = $this->Like_model->get_top_5_articles_by_likes($this->session->userdata('user_id'));

        $this->load->view('templates/contributorHeader');
        $this->load->view('contributor/dashboard', $data);
        $this->load->view('templates/footer');
    }

}

?>