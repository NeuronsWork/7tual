<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *
 __
/\ \
\ \ \____  _ __    __     __  __    ___     ____     _____      __
 \ \ '__`\/\`'__\/'__`\  /\ \/\ \  / __`\  /',__\   /\ '__`\  /'__`\
  \ \ \L\ \ \ \//\ \L\.\_\ \ \_/ |/\ \L\ \/\__, `\__\ \ \L\ \/\  __/
   \ \_,__/\ \_\\ \__/.\_\\ \___/ \ \____/\/\____/\_\\ \ ,__/\ \____\
    \/___/  \/_/ \/__/\/_/ \/__/   \/___/  \/___/\/_/ \ \ \/  \/____/
                                                       \ \_\
                                                        \/_/
 *
 *▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 * 
 * Class Perfil_model
 *
 * ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 * 
 */
class Medico_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_medico()
    {
        $this->db->select('*');                         //  seleccionar todos los campos
        $this->db->from('rel_medicos');
        $this->db->join('rel_espec', 'rel_medicos.cod_espec=rel_espec.cod_espec');
        $this->db->order_by("ap_paterno", "asc");       //  ordenar la consulta por apellido paterno
        $query = $this->db->get();                      //  tabla a consultar
        return $query->result();                        //  retorna resultados en un array
    }

    public function create_medico($data)
    {
        $this->db->insert('rel_medicos',$data);
        return $this->db->insert_id();
    }

    public function list_specialization()
    {
        $this->db->select('*');
        $this->db->order_by('desc_espec', "asc");
        $query = $this->db->get('rel_espec');
        return $query->result();                        //  retorna resultados en un array
    }

    public function check_codcmp($cod_cmp){
        $this->db->select('*');
        $this->db->where('cod_cmp', $cod_cmp);
        $query = $this->db->get('rel_medicos');
        if($query->num_rows() == 1):
            return "1";
        else:
            return "0";
        endif;
    }

    public function edit_medico($id_medi)
    {
        $this->db->select('*');
        $this->db->where('cod_cmp', $id_medi);          //  seleccionar todos los campos
        $query = $this->db->get('rel_medicos');         //  tabla a consultar
        return $query->result();
    }

    public function delete_medico($id_medi)
    {
        $this->db->where('cod_cmp', $id_medi);
        $this->db->delete('rel_medicos');
    }

}
