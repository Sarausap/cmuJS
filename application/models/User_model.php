<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $query = $this->db->get("users");
        return $query->result_array();
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('users', array('user_id' => $id));
        return $query->row_array();
    }

    public function get_user_by_role($id)
    {
        $query = $this->db->get_where('users', array('role' => $id));
        return $query->result_array();
    }

    public function update_user($data)
    {
        $this->db->where('user_id', $data['user_id']);
        return $this->db->update('users', $data);
    }

    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function delete_user($userID)
    {
        $this->db->where('user_id', $userID);

        $result = $this->db->delete('users');

        return $result;
    }


    public function search_user($search_query = "")
    {
        error_log("Search query: " . $search_query);


        if (!empty($search_query)) {
            $this->db->select("*");
            $this->db->from('users');
            $this->db->like('complete_name', $search_query, 'after');
        } else {
            $this->db->select("*");
            $this->db->from('users');
        }
        $query = $this->db->get();

        return $query->result_array();
    }




}