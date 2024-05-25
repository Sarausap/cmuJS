<?php
class Authentication_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function authenticate_user($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $user = $query->row_array();
            // Assuming you have stored the password as a hash
            if ($password == $user['pword']) {
                // Password is correct
                $data = array(
                    'id' => $user['user_id'],
                    'email' => $user['email'],
                    'name' => $user['complete_name'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data);
                return $user;
            } else {
                // Password is incorrect
                return 'incorrect_password';
            }
        } else {
            // User does not exist
            return "user_not_exists";
        }
    }

}
?>