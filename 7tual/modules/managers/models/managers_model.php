<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Managers_model
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 *
 */
class Managers_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    //MODELS LOCATIONS :: COUNTRY
    public function list_managers(){
        $this->db->select('manager.id_manager, manager.name, manager_profile.name_profile, manager.user, manager.password, manager.name, manager.email, manager.date_created, manager.date_modified, manager.status');
        $this->db->from('manager');
        $this->db->join('manager_profile', 'manager.id_profile = manager_profile.id_profile');
        $this->db->order_by('user', "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function list_users(){
        $this->db->select('user.id_user, user.user, user.email, user.email, user.date_created, user.date_last_access, user.status');
        $this->db->from('user');
        $this->db->join('country', 'user.code_country = country.code_country');
        $this->db->order_by('user', "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function edit($id)
    {
        $this->db->select('manager.id_manager, manager.name, manager.id_profile, manager_profile.name_profile, manager.user, manager.password, manager.name, manager.email, manager.date_created, manager.date_modified, manager.status');
        $this->db->from('manager');
        $this->db->join('manager_profile', 'manager.id_profile = manager_profile.id_profile');
        $this->db->where('id_manager', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update($id, $data)
    {
        $this->db->where('id_manager', $id);
        return $this->db->update('manager', $data);
    }

    public function create($data)
    {
        $this->db->insert('manager',$data);
        return $this->db->insert_id();
    }

    public function active($id,$data){
        $this->db->where('id_manager', $id);
        return $this->db->update('manager', $data);
    }

    public function desactive($id,$data){
        $this->db->where('id_manager', $id);
        return $this->db->update('manager', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_manager', $id);
        return $this->db->delete('manager');
    }

    /**
     * USER WEB
     */
    public function activeUser($id,$data){
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function desactiveUser($id,$data){
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('muser');
    }

    public function excelUser(){
        $this->load->database();
        $query = $this->db->get('user');
        return $query->result();
    }

}
