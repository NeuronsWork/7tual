<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Class Perfil_model
 *
 */
class Metodos_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_metodos()
    {
        $this->db->select('id_metodo, descripcion');
        $query = $this->db->get('metodos');
        return $query->result();
    }

    public function consulta_metodo($idMetodo)
    {
        $this->db->select('*');
        $this->db->from('metodo_analisis');
        $this->db->where('id_metodo',$idMetodo);
        $query = $this->db->get();
        if($query->num_rows() >= 1):
            return "1";
        else:
            return "0";
        endif;
    }

    public function list_analisis()
    {
        $this->db->select('CODANALISIS, DETALLE');
        $this->db->from('analisis');
        $this->db->where('STATUS','0');
        $query = $this->db->get();
        return $query->result();
    }

    public function create_metodo($data)
    {
        $this->db->insert('metodos',$data);
        return $this->db->insert_id();
    }

}
