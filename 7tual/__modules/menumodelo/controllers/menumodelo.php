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

class MenuModelo extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menumodelo_model');
        if($this->auth->is_logged() == FALSE):
            redirect(base_url('login'));
        endif;
    }

    public function index()
    {

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'icon_house_alt', '');
        $this->breadcrumb->add_crumb('Menu & Modelos', '', '', '');

        $data['array_menu'] = $this->menumodelo_model->list_menu();
        $data['profile'] = Modules::run('dashboard/dashboard/name_profile');
        $data['titulo'] = 'ENDOLAB - Perfiles & Modulos';
        $data['base_css_js'] = $this->config->item('base_css_js');
        $this->load->view('index',$data);

    }

    public function create_menu()
    {
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $time = time();
        $created    = mdate($datestring, $time);
        $name_menu  = $this->input->post('inputName');
        $parent     = $this->input->post('inputParent');

        $array_menu = array(
            'name_menu' => $name_menu,
            'parent'    => $parent,
            'created'   => $created,
            'modified'  => $created,
            'status'    => 1
        );
        $return = $this->menumodelo_model->create_menu($array_menu);
        if($return != "" ):
            echo "1";
            return true;
            redirect('');
        else:
            echo "0";
            return false;
        endif;
    }

}
