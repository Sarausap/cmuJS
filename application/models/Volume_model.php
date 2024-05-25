<?php
class Volume_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_volume($data)
    {
        return $this->db->insert('volumes', $data);
    }

    public function update_volume($data)
    {
        $this->db->where('volume_id', $data['volume_id']);
        return $this->db->update('volumes', $data);
    }

    public function delete_volume($userID)
    {
        $this->db->where('volume_id', $userID);

        $result = $this->db->delete('volumes');

        return $result;
    }
}