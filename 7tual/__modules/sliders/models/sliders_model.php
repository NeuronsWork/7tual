<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Perfil_model
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 *
 */
class sliders_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_sliders(){
        $this->db->select('*');
        $this->db->order_by('date_created', "asc");
        $query = $this->db->get('slider');
        return $query->result();
    }

    public function list_slider_country($id_slider){
        $this->db->select('relation_slider_country.id_relation,relation_slider_country.code_country, country.name_country');
        $this->db->from('relation_slider_country');
        $this->db->join('country', 'relation_slider_country.code_country = country.code_country');
        //$this->db->join('slider', 'slider.id_slider = relation_slider_country.id_slider');
        $this->db->where('id_slider', $id_slider);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_country(){
        $this->db->select('*');
        $this->db->order_by('name_country', "asc");
        $this->db->where('status', 1);
        $query = $this->db->get('country');
        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('slider',$data);
        return $this->db->insert_id();
    }

    public function create_relation($data)
    {
        $this->db->insert('relation_slider_country',$data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id_country', $id);
        return $this->db->update('country', $data);
    }

    public function edit($id_slider)
    {
        $this->db->select('*');
        $this->db->where('id_slider', $id_slider);
        $query = $this->db->get('slider');
        return $query->result();
    }

    public function recovery_relations($id_slider)
    {
        $this->db->select('relation_slider_country.code_country, country.name_country');
        $this->db->from('relation_slider_country');
        $this->db->join('country','relation_slider_country.code_country = country.code_country');
        $this->db->where('relation_slider_country.id_slider', $id_slider);
        $query = $this->db->get();
        return $query->result();
        //SELECT relation_slider_country.code_country, country.name_country FROM relation_slider_country
        //JOIN country on relation_slider_country.code_country = country.code_country
        //where relation_slider_country.id_slider = 8;
    }

    public function delete($id_slider)
    {
        $this->db->where('id_slider', $id_slider);
        return $this->db->delete('slider');
    }

    public function delete_relations($id_slider){
        $this->db->where('id_slider', $id_slider);
        return $this->db->delete('relation_slider_country');
    }

    public function delete_relation($id_relation){
        $this->db->where('id_relation', $id_relation);
        return $this->db->delete('relation_slider_country');
    }

    public function active($id,$data){
        $this->db->where('id_slider', $id);
        return $this->db->update('slider', $data);
    }

    public function desactive($id,$data){
        $this->db->where('id_slider', $id);
        return $this->db->update('slider', $data);
    }

}
