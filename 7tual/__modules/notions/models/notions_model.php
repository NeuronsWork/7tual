<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    Class Perfil_model
 **/
class Notions_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_notions(){
        $this->db->select('notion.id_notion, notion.vip, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.likes, notion.date_created, notion.status, notion.code_country, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        //$this->db->where('notion.code_country', $code_country);
        $this->db->order_by("notion.id_notion", "desc");
        $query= $this->db->get();
        //return $query;
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
        $this->db->where('code_country', $id);
        return $this->db->update('country', $data);
    }

    public function create_country($data)
    {
        $this->db->insert('country',$data);
        return $this->db->insert_id();
    }

    public function active($id,$data){
        $this->db->where('id_notion', $id);
        return $this->db->update('notion', $data);
    }

    public function desactive($id,$data){
        $this->db->where('id_notion', $id);
        return $this->db->update('notion', $data);
    }

    public function vip($id,$data){
        $this->db->where('id_notion', $id);
        return $this->db->update('notion', $data);
    }

    public function notvip($id,$data){
        $this->db->where('id_notion', $id);
        return $this->db->update('notion', $data);
    }

    public function delete($id_notion)
    {
        $this->db->where('id_notion', $id_notion);
        return $this->db->delete('notion');
    }

    public function list_category()
    {
        $this->db->select('*');
        $this->db->order_by('name_category', "asc");
        $query = $this->db->get('category');
        return $query->result();
    }

    public function list_city()
    {
        $this->db->select('*');
        $this->db->order_by('name_city', "asc");
        $query = $this->db->get('city');
        return $query->result();
    }

    public function list_country()
    {
        $this->db->select('*');
        $this->db->order_by('name_country', "asc");
        $query = $this->db->get('country');
        return $query->result();
    }

    public function add_noise($data)
    {
        $this->db->insert('notion',$data);
        return $this->db->insert_id();
    }

    /** UPDATE NOTIONS */
    public function update($data, $id){
        $this->db->where('id_notion', $id);
        return $this->db->update('notion', $data);
    }

    public function add_relation_lincc($data){
        $this->db->insert('relation_lincc', $data);
        return $this->db->insert_id();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->where('id_notion', $id);
        $query = $this->db->get('notion');
        return $query->result();
    }

}
