<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Medico
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class Medico extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('medico_model');         // cargando models medico
        if($this->auth->is_logged() == FALSE):      // verificando login
            redirect(base_url('login'));
        endif;
    }

    public function index()
    {

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'icon_house_alt', '');
        $this->breadcrumb->add_crumb('Medicos', '', '', '');

        $data['array_medicos'] = $this->medico_model->list_medico();
        $data['array_especializacion'] = $this->medico_model->list_specialization();
        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = 'ENDOLAB - CRUD Medicos';
        $data['base_css_js'] = $this->config->item('base_css_js');
        $this->load->view('index',$data);

    }

    public function create_medico()
    {
        $cod_cmp    = $this->input->post('inputCMP');
        $ap_paterno = $this->input->post('inputPaterno');
        $ap_materno = $this->input->post('inputMaterno');
        $nombres    = $this->input->post('inputNombreso');
        $categorias = $this->input->post('inputCategorias');
        $estado     = $this->input->post('inputEstado');
        $especializacion = $this->input->post('inputEspecializacion');
        $titulo     = $this->input->post('inputTitulo');
        $telefono   = $this->input->post('inputTelefono');

        $array_medico = array(
            'cod_cmp'       => $cod_cmp,
            'ap_paterno'    => $ap_paterno,
            'ap_materno'    => $ap_materno,
            'nombres'       => $nombres,
            'categoria'     => $categorias,
            'est_med'       => $estado,
            'cod_espec'     => $especializacion,
            'tit_cod'       => $titulo,
            'telefono'      => $telefono
        );

        $return = $this->medico_model->create_medico($array_medico);
        if($return != "" ):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function form_medic()
    {
        $this->load->view('form_medic');
    }

    public function form_medic_edit()
    {
        $this->load->view('form_medic_edit');
    }

    public function edit_medico()
    {
        $id_med = $this->input->post('cod_cmp');
        $array_medico = $this->medico_model->edit_medico($id_med);
        echo json_encode($array_medico);
    }

    public function delete_medico()
    {
        $id_med = $this->input->post('idMedic');
        $this->medico_model->delete_medico($id_med);
    }

    public function check_codcmp(){
        $cod_cmp = $this->input->post('cod_cmp');
        $array_med = $this->medico_model->check_codcmp($cod_cmp);
        if($array_med == 0):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

}
