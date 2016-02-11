<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
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

    public function is_country($code_country){
        $this->ci->session->set_userdata('code_country', $code_country);
    }

    public function is_logged()
    {
        //return $this->ci->session->userdata('perfil') !== FALSE ? TRUE : FALSE;
        if($this->ci->session->userdata('id_profile') == FALSE || $this->ci->session->userdata('id_profile') == ""):
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    public function create_sessions($data)
    {
        $this->ci->session->set_userdata($data);
    }

    public function logout($url)
    {
        $this->ci->session->unset_userdata(array('is_logued_in', 'id_usuario','id_profile', 'code_country','username'));
        $this->ci->session->sess_destroy();
        $this->ci->session->sess_create();
        $this->ci->session->set_flashdata('cerrada','La sessión se ha cerrado correctamente.');
        redirect(base_url(), 'refresh');
    }

}
