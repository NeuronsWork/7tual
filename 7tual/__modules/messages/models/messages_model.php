<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Perfil_model
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 *
 */
class Messages_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_message(){
        $this->db->select('*');
        $this->db->order_by('date_created', "asc");
        $query = $this->db->get('message_contact');
        return $query->result();
    }

    public function send_answer($id, $data){
         $this->db->where('id_message', $id);
        return $this->db->update('message_contact', $data);
    }

    public function delete_message($id)
    {
        $this->db->where('id_message', $id);
        return $this->db->delete('message_contact');
    }

}
