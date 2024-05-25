<?php
class Author_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_authors()
    {
        $query = $this->db->get("authors");
        return $query->result_array();
    }

    public function get_author_by_id($id)
    {
        $query = $this->db->get_where('authors', array('author_id' => $id));
        return $query->row_array();
    }

    public function get_all_article_authors()
    {
        $this->db->select("users.complete_name,users.user_id,article_author.article_id");
        $this->db->from("article_author");
        $this->db->join('users', 'users.user_id = article_author.author_id', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_article_authors($id)
    {
        $this->db->select("authors.name,authors.author_id");
        $this->db->from("article_author");
        $this->db->join('authors', 'authors.author_id = article_author.author_id', 'inner');
        $this->db->where('article_author.article_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_author($id)
    {
        $this->db->where('author_id', $id);
        $query = $this->db->get('authors');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function get_user_author()
    {
        $this->db->where('role', 2);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function insert_author($data)
    {
        return $this->db->insert('author', $data);
    }

    public function insert_article_author($data)
    {
        return $this->db->insert('article_author', $data);
    }

    public function delete_article_author($article_id)
    {
        $this->db->where('article_id', $article_id);

        $delete_result = $this->db->delete('article_author');

        return $delete_result;
    }



}