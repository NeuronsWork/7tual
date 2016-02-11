<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Perfil_model
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 *
 */
class Locations_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    //MODELS LOCATIONS :: COUNTRY
    public function list_country(){
        $this->db->select('*');
        $this->db->order_by('name_country', "asc");
        $query = $this->db->get('country');
        return $query->result();
    }

    public function edit_country($id)
    {
        $this->db->select('*');
        $this->db->where('id_country', $id);
        $query = $this->db->get('country');
        return $query->result();
    }

    public function update_locations($id, $data)
    {
        $this->db->where('id_country', $id);
        return $this->db->update('country', $data);
    }

    public function create_country($data)
    {
        $this->db->insert('country',$data);
        return $this->db->insert_id();
    }

    public function active($id,$data){
        $this->db->where('id_country', $id);
        return $this->db->update('country', $data);
    }

    public function desactive($id,$data){
        $this->db->where('id_country', $id);
        return $this->db->update('country', $data);
    }

    public function delete_country($id_country)
    {
        $this->db->where('id_country', $id_country);
        return $this->db->delete('country');
    }

    //MODELS LOCATIONS :: CITY
    public function list_c_country(){
        $this->db->select('*');
        $this->db->order_by('name_country', "asc");
        $this->db->where('status',1);
        $query = $this->db->get('country');
        return $query->result();
    }
    public function list_city(){
        $this->db->select('*');
        $this->db->order_by('code_country', "asc");
        $this->db->order_by('name_city', "asc");
        $query = $this->db->get('city');
        return $query->result();
    }

    public function create_city($data)
    {
        $this->db->insert('city',$data);
        return $this->db->insert_id();
    }

    public function active_city($id,$data){
        $this->db->where('id_city', $id);
        return $this->db->update('city', $data);
    }

    public function desactive_city($id,$data){
        $this->db->where('id_city', $id);
        return $this->db->update('city', $data);
    }

    public function delete_city($id_city)
    {
        $this->db->where('id_city', $id_city);
        return $this->db->delete('city');
    }

}
