<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    Class Events_model
*/
class Events_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_category()
    {
        $this->db->select('*');
        $this->db->order_by('name_category', "asc");
        $query = $this->db->get('category');
        return $query->result();
    }

    public function list_city($code_country)
    {
        $this->db->select('id_city, name_city');
        $this->db->from('city');
        $this->db->where('code_country', $code_country);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_city_login($code_country, $id_city)
    {
        $this->db->select('id_city, name_city');
        $this->db->from('city');
        $this->db->where('code_country', $code_country);
        $this->db->where('id_city', $id_city);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_events($data)
    {
        $this->db->insert('event',$data);
        return $this->db->insert_id();
    }

    public function active($id,$data){
        $this->db->where('id_event', $id);
        return $this->db->update('event', $data);
    }

    public function list_country()
    {
        $this->db->select('code_country, name_country,code_country');
        $this->db->from('country');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }


    public function list_events(){
        $this->db->select('e.id_event,c.name_category,e.title,e.description,co.code_country,co.name_country,cy.name_city,e.image_video,e.video,e.date_open,e.date_end,e.vip,e.status');
        $this->db->from('event e');
        $this->db->join('category c', 'e.id_category = c.id_category');
        $this->db->join('country co', 'e.code_country = co.code_country');
        $this->db->join('city cy', 'e.id_city = cy.id_city');
        //$this->db->where('notion.code_country', $code_country);
        $this->db->order_by("e.id_event", "desc");
        $query= $this->db->get();
        //return $query;
        return $query->result();
    }

    public function list_citys()
    {
        $this->db->select('*');
        $this->db->order_by('name_city', "asc");
        $query = $this->db->get('city');
        return $query->result();
    }

    public function delete($id)
    {
        $this->db->where('id_event', $id);
        return $this->db->delete('event');
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->where('id_event', $id);
        $query = $this->db->get('event');
        return $query->result();
    }

    public function vip($id,$data){
        $this->db->where('id_event', $id);
        return $this->db->update('event', $data);
    }

    public function notvip($id,$data){
        $this->db->where('id_event', $id);
        return $this->db->update('event', $data);
    }

}
