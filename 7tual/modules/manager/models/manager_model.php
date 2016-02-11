<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Class Login_model
 *
 */
class Manager_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_manager_sesion($id, $data){
        $this->db->where('id_manager', $id);
        return $this->db->update('manager', $data);
    }

    public function login_user($username,$password)
    {
        $this->db->where('user',$username);
        $this->db->or_where('email',$username);
        $this->db->where('password',$password);
        $this->db->where('status',1);
        $query = $this->db->get('manager');
        if($query->num_rows() == 1)
        {
            return $query->row();
        }else{
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url().'manager','refresh');
        }
    }

}
