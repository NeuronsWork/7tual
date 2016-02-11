<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Medico
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class Managers extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("excel");
        $this->load->model('managers_model');    // cargando models medico
        if($this->auth->is_logged() == FALSE):      // verificando login
            redirect(base_url('manager'));
        endif;

        ## FECHA
        date_default_timezone_set('UTC');
        $timestamp = now();
        $timezone = 'UM5';
        $daylight_saving = TRUE;

        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m-%d %h:%i:%s";

        $this->now = mdate($datestring, $now);
    }

    public function index()
    {
        ## MENU
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Managers', '', 'fa fa-map-marker', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Managers / Listado';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('index',$data);

    }

    public function jsonManagers(){
        $data = $this->managers_model->list_managers();
        $this->output->set_content_type('application/json')->set_output(json_encode(array('geonames' => $data)));
    }

    public function new_manager()
    {
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Managers','../managers', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Nuevo', '', '', '');

        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Managers / Nuevo';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('new',$data);
    }

    public function add()
    {
        $id_profile     = $this->input->post('id_profile');
        $user           = $this->input->post('user');
        $password       = md5($this->input->post('password'));
        $name           = $this->input->post('name');
        $email          = $this->input->post('email');
        $date_created   = $this->now;
        $date_modified  = $this->now;
        $status         = $this->input->post('status');
        $data           = array(
            'id_profile'        => $id_profile,
            'user'              => $user,
            'password'          => $password,
            'name'              => $name,
            'email'             => $email,
            'date_created'      => $date_created,
            'date_modified'     => $date_modified,
            'status'            => $status
        );
        $mensaje    =   $this->managers_model->create($data);

        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se ha creado correctamente el manager');
            redirect('managers', 'refresh');
        endif;
    }

    public function edit($id)
    {
        $data = $this->managers_model->edit($id);

        foreach ($data as $item) {
            $user= $item->name;
        }

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Managers','../../managers', 'fa fa-map-marker', '');
        //$this->breadcrumb->add_crumb('Paises', '../../locations', '', '');
        $this->breadcrumb->add_crumb('Editar', '', '', '');
        $this->breadcrumb->add_crumb($user, '', '', '');

        $data['manager'] = $data;
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Manager / Editar';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('edit',$data);
    }

    public function update()
    {
        $id             = $this->input->post('id_manager');
        $id_profile     = $this->input->post('id_profile');
        $user           = $this->input->post('user');
        $name           = $this->input->post('name');
        $email          = $this->input->post('email');
        $date_modified  = $this->now;
        $status         = $this->input->post('status');
        $data           = array(
            'id_profile'        => $id_profile,
            'user'              => $user,
            'name'              => $name,
            'email'             => $email,
            'date_modified'     => $date_modified,
            'status'            => $status
        );
        $mensaje         = $this->managers_model->update($id, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se actualizado correctamente');
            redirect('managers', 'refresh');
        endif;
    }

    public function active($id){
        $data = array(
            'status'    => 1
        );
        $mensaje    =   $this->managers_model->active($id, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo correctamente');
            redirect('managers', 'refresh');
        endif;
    }

    public function desactive($id){
        $data = array(
            'status'    => 0
        );
        $mensaje    =   $this->managers_model->desactive($id, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo correctamente');
            redirect('managers', 'refresh');
        endif;
    }

    public function delete($id)
    {
        $mensaje    =   $this->managers_model->delete($id);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('managers', 'refresh');
        endif;
    }

    /**
     * USERS WEB
     */
    public function users_web()
    {
        ## MENU
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Usuarios Web', '', 'fa fa-map-marker', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Usuarios  Web / Listado';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('indexUsers',$data);
    }

    public function jsonUsersWeb(){
        $data = $this->managers_model->list_users();
        $this->output->set_content_type('application/json')->set_output(json_encode(array('geonames' => $data)));
    }

    public function activeUser($id){
        $data = array(
            'status'    => 1
        );
        $mensaje    =   $this->managers_model->activeUser($id, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo correctamente');
            redirect('managers', 'refresh');
        endif;
    }

    public function desactiveUser($id){
        $data = array(
            'status'    => 0
        );
        $mensaje    =   $this->managers_model->desactiveUser($id, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo correctamente');
            redirect('managers', 'refresh');
        endif;
    }

    public function deleteUser($id)
    {
        $mensaje    =   $this->managers_model->deleteUser($id);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('managers', 'refresh');
        endif;
    }

    public function new_userWeb()
    {
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Usuario','../managers/users_web/', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Nuevo', '', '', '');

        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Usuario Web / Nuevo';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('newUser',$data);
    }

    /**
     * EXPORTAR USUARIOS EN EXCEL
     */

    public function exportExcel(){
        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using MY_Model.php
        $data = $this->managers_model->excelUser();
        $name_excel = 'usuarios_excel_'.$this->now.'.xls';
        $this->excel->stream($name_excel, $data);
    }

}