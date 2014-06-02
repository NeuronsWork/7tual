<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class PerfilUsuario_model
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class PerfilUsuario_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
    @method users
    */
    public function lista_users()
    {
        $this->db->select('id_user, username, email, profile.name_profile, last_login, users.status');
        $this->db->from('users');
        $this->db->join('profile', 'profile.id_profile = users.id_profile');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_users()
    {
        return $this->db->count_all('users');
    }

    public function create_user($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    public function edit_user($id_user)
    {
        $this->db->select('*');
        $this->db->where('id_user', $id_user);          //  seleccionar todos los campos
        $query = $this->db->get('users');               //  tabla a consultar
        return $query->result();
    }

    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('users');
    }

    /**
    @method profiles
    */
    public function count_all_profiles()
    {
        return $this->db->count_all('profile');
    }

    public function lista_profiles()
    {
        $this->db->select('id_profile, name_profile, status');
        $this->db->from('profile');
        $query = $this->db->get();
        return $query->result();
    }

}
