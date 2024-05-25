<?php
class Article_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_articles()
    {
        $query = $this->db->get("articles");
        return $query->result_array();
    }

    public function get_articles_by_volume($id)
    {
        $query = $this->db->where('volume_id', $id);
        $query = $this->db->get("articles");
        return $query->result_array();
    }
    public function get_contributor_articles()
    {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->get_where('articles', array('submitted_by' => $user_id));
        return $query->result_array();
    }

    public function get_volume()
    {
        $query = $this->db->get("volumes");
        return $query->result_array();
    }

    public function get_volume_by_id($id)
    {
        $query = $this->db->get_where("volumes", array('volume_id' => $id));
        return $query->row_array();
    }

    public function get_article_by_id($id)
    {
        $query = $this->db->get_where('articles', array('articles_id' => $id));
        return $query->row_array();
    }

    public function get_article_volume_author_by_id($id)
    {
        $sql = "SELECT volumes.name AS volume, articles.articles_id,articles.title, articles.keywords, articles.abstract, articles.published, articles.filename, articles.doi, articles.date_published, authors.name
            FROM articles
            JOIN volumes ON volumes.volume_id = articles.volume_id
            JOIN article_author ON articles.articles_id = article_author.article_id
            JOIN authors ON article_author.author_id = authors.author_id
            WHERE articles.articles_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array();
    }

    public function get_article_volume()
    {
        $this->db->select('volumes.volume_id, articles.*');
        $this->db->from('volumes');
        $this->db->join('articles', 'volumes.volume_id = articles.volume_id', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_article_card()
    {
        $this->db->select('volumes.name, articles.title, articles.keywords, articles.abstract, articles.published, articles.filename, articles.doi, articles.date_published, authors.name');
        $this->db->from('articles');
        $this->db->join('volumes', 'volumes.volume_id = articles.volume_id');
        $this->db->join('article_author', 'articles.articles_id = article_author.article_id');
        $this->db->join('authors', 'article_author.author_id = authors.author_id');
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_article_card_volume()
    {
        $this->db->select('volumes.volume_id,volumes.name AS volume, articles.articles_id,articles.title, articles.keywords, articles.abstract, articles.published, articles.filename, articles.doi, articles.date_published, authors.name');
        $this->db->from('articles');
        $this->db->join('volumes', 'volumes.volume_id = articles.volume_id');
        $this->db->join('article_author', 'articles.articles_id = article_author.article_id');
        $this->db->join('authors', 'article_author.author_id = authors.author_id');
        $this->db->where('published', 1);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_article_card_latest($limit = 5)
    {
        $this->db->select('authors.name,articles.articles_id, articles.articles_id as articleId,articles.title, articles.keywords, articles.abstract, articles.filename, articles.date_published, articles.doi, volumes.name AS volume');
        $this->db->from('article_author');
        $this->db->join('articles', 'article_author.article_id = articles.articles_id');
        $this->db->join('authors', 'authors.author_id = article_author.author_id');
        $this->db->join('volumes', 'articles.volume_id = volumes.volume_id');
        $this->db->where('published', 1);
        $this->db->order_by('articles.date_published', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function insert_articles($data)
    {
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }

    public function update_articles($data, $id)
    {
        $this->db->where('articles_id', $id);
        $this->db->update('articles', $data);

    }


    public function delete_articles($id)
    {
        $this->db->where('articles_id', $id);

        $result = $this->db->delete('articles');

        return $result;
    }

    public function article_likes($id)
    {
        $this->db->where('submitted_by', $id);

        $query = $this->db->get('articles');

        return $query->result_array();
        ;
    }

    public function search_article($search_query = "")
    {
        error_log("Search query: " . $search_query);


        if (!empty($search_query)) {
            $this->db->select("*");
            $this->db->from('articles');
            $this->db->like('title', $search_query);
        } else {
            $this->db->select("*");
            $this->db->from('articles');
        }
        $query = $this->db->get();

        return $query->result_array();
    }
}