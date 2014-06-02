<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class PerfilUsuario
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class PerfilUsuario extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perfilusuario_model');
        if($this->auth->is_logged() == FALSE):
            redirect(base_url('login'));
        endif;
    }

    public function index()
    {

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'icon_house_alt', '');
        $this->breadcrumb->add_crumb('Perfiles & Usuarios', '', '', '');
        $data['count_usuarios'] = $this->perfilusuario_model->count_all_users();
        $data['count_perfiles'] = $this->perfilusuario_model->count_all_profiles();
        $data['array_usuarios'] = $this->perfilusuario_model->lista_users();
        $data['array_perfiles'] = $this->perfilusuario_model->lista_profiles();
        $data['profile'] = Modules::run('dashboard/dashboard/name_profile');
        $data['titulo'] = 'ENDOLAB - Perfiles & Usuarios';
        $data['base_css_js'] = $this->config->item('base_css_js');
        $this->load->view('index',$data);

    }

    /**
    @functions users
    */
    public function create_user()
    {
        $username = $this->input->post('inputNombre');
        $contrasena = md5($this->input->post('inputContrasena'));
        $email = $this->input->post('inputEmail');
        $perfil = $this->input->post('inputPerfil');
        $estado = $this->input->post('inputEstado');

        $array_user = array(
            'id_profile'    => $perfil,
            'username'      => $username,
            'password'      => $contrasena,
            'email'         => $email,
            'status'        => $estado
        );

        $return = $this->perfilusuario_model->create_user($array_user);
        if($return != "" ):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function delete_user()
    {
        $id_user = $this->input->post('inputId');
        $this->perfilusuario_model->delete_user($id_user);
    }

    public function edit_user()
    {
        $id_user = $this->input->post('inputId');
        $array_user = $this->perfilusuario_model->edit_user($id_user);
        echo json_encode($array_user);
    }

    /**
    @functions profiles
    */


}
