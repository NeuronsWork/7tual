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
 * Class Dashboard
 *
 */
class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        if($this->auth->is_logged() == FALSE):
            redirect(base_url('login'));
        endif;
    }

    public function index()
    {
        //llamamos a otro modulo, la secuencia es modulo/controlador/método
        //$data['users'] =  Modules::run('login/index/data_users');

        // create breadcrumnb
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '', 'icon_house_alt', '');
        //$this->breadcrumb->add_crumb('Dashboard', site_url('dashboard'), 'icon-align-justify', '');
        //$this->breadcrumb->add_crumb('Inicio', '', '', 'active');
        $data['profile'] = $this->name_profile();
        $data['titulo'] = 'ENDOLAB - Dashboard';
        $data['base_css_js'] = $this->config->item('base_css_js');
        $this->load->view('index',$data);

    }

    public function name_profile()
    {
        $id_profile = $this->session->userdata('id_profile');
        $this->db->select('name_profile');
        $this->db->from('profile');
        $this->db->where('id_profile', $id_profile);
        $query = $this->db->get();
        return $query->row_array();
    }

}
