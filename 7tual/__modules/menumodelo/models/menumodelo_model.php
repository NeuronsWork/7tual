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
 *
 * Class Perfil_model
 *
 */
class MenuModelo_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_menu()
    {
        $this->db->select('id_menu, name_menu');
        $query = $this->db->get('menu');
        return $query->result();
    }

    public function create_menu($data){
        $this->db->insert('menu',$data);
        return $this->db->insert_id();
    }

}
