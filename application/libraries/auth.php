<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
 * Class Auth
 *
 */
class Auth
{

    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function create_token()
    {
        $token = md5(uniqid(rand(),true));
        $this->ci->session->set_userdata('token',$token);
        return $token;
    }

    public function is_logged()
    {
        //return $this->ci->session->userdata('perfil') !== FALSE ? TRUE : FALSE;
        if($this->ci->session->userdata('id_profile') == FALSE || $this->ci->session->userdata('id_profile') == ""):
            return FALSE;
        else:
            return TRUE;
        ENDIF;
    }

    public function create_sessions($data)
    {
        $this->ci->session->set_userdata($data);
    }

    public function logout()
    {
        $this->ci->session->unset_userdata(array('is_logued_in', 'id_usuario','perfil','username'));
        $this->ci->session->sess_destroy();
        $this->ci->session->sess_create();
        $this->ci->session->set_flashdata('cerrada','La sessión se ha cerrado correctamente.');
        redirect(base_url('login'));
    }

}