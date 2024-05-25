<?php
class Role_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_roles()
    {
        $query = $this->db->get("role");
        return $query->result_array();

    }

    public function insert($data)
    {
        return $this->db->insert('role', $data);
    }

    public function get_role_by_id($id)
    {
        $query = $this->db->get_where("role", array('role_id' => $id));
        return $query->row_array();
    }

    public function update($data)
    {
        $this->db->where('role_id', $data['role_id']);
        return $this->db->update('role', $data);
    }

    public function delete_volume($userID)
    {
        $this->db->where('volume_id', $userID);

        $result = $this->db->delete('volumes');

        return $result;
    }
}