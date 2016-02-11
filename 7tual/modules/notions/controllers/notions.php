<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Medico
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class Notions extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notions_model');    // cargando models medico
        if($this->auth->is_logged() == FALSE):      // verificando login
            redirect(base_url('manager'));
        endif;

        //LOAD LIBRARY SLUG
        $config = array(
            'table' => 'notion',
            'id'    => 'id_notion',
            'field' => 'slug',
            'title' => 'title',
            'replacement' => 'dash'
        );
        $this->load->library('slug', $config);

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
        $this->breadcrumb->add_crumb('Ideas', '', 'fa fa-cloud', '');
        //$this->breadcrumb->add_crumb('Paises', '', '', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Ubicaciones / Listado Paises';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('index',$data);

    }

    public function jsonNotions(){
        $data = $this->notions_model->list_notions();
        $this->output->set_content_type('application/json')->set_output(json_encode(array('notions' => $data)));
    }

    public function edit($id)
    {

        $data_notion = $this->notions_model->edit($id);

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Ideas', '../../notions', '', '');
        $this->breadcrumb->add_crumb('Editar', '', '', '');
        //$this->breadcrumb->add_crumb($country, '', '', '');

        $data['notions'] = $data_notion;
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['categoria']  = $this->notions_model->list_category();
        $data['city']       = $this->notions_model->list_city();
        $data['country']       = $this->notions_model->list_country();

        $data['titulo'] = '7tual - Ubicaciones / Listado Paises';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('edit',$data);

    }

    public function new_notions()
    {
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Ideas','../notions', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Nuevo', '', '', '');

        $data['profile']    = Modules::run('dashboard/name_profile');
        $data['categoria']  = $this->notions_model->list_category();
        $data['city']       = $this->notions_model->list_city();
        $data['country']       = $this->notions_model->list_country();
        $data['titulo']     = '7tual - Ideas / Nuevo';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img']  = $this->config->item('admin_css_js');
        $this->load->view('new',$data);

    }

    public function add_notion()
    {

        $id_user        = $this->session->userdata('id_usuario');
        $id_category    = $this->input->post('selectCategory');
        $code_country   = $this->input->post('code_country');
        $id_city        = $this->input->post('selectCity');
        $title          = $this->input->post('inputTitulo');
        $description    = $this->input->post('inputIdea');
        $video          = $this->input->post('inputVideo');
        $tags           = $this->input->post('inputTag');
        $data           = $this->now;
        $status         = $this->input->post('status');
        $vip            = $this->input->post('vip');


        $array_noise  = array(
            'id_user'       => $id_user,
            'id_category'   => $id_category,
            'code_country'  => $code_country,
            'id_city'       => $id_city,
            'title'         => $title,
            'description'   => $description,
            'video'         => $video,
            'tags'          => $tags,
            'date_created'  => $data,
            'date_modified' => $data,
            'status'        => $status,
            'vip'           => $vip
        );

        $return0 = $this->notions_model->add_noise($array_noise);

        $array_relation = array(
            'id_notion'     => $return0,
            'code_country'  => $code_country,
            'id_city'       => $id_city,
            'likes'         => 0
        );

        $return1 = $this->notions_model->add_relation_lincc($array_relation);

        if($return0):
            $this->session->set_flashdata('mensaje', 'Se ha creado correctamente la idea');
            redirect('notions', 'refresh');
        endif;
    }


    public function update()
    {
        $id_notion      = $this->input->post('id_notion');
        $id_user            = $this->input->post('id_user');
        $id_category    = $this->input->post('selectCategory');
        $code_country   = $this->input->post('code_country');
        $id_city        = $this->input->post('selectCity');
        $title          = $this->input->post('inputTitulo');
        $description    = $this->input->post('inputIdea');
        $video          = $this->input->post('inputVideo');
        $tags           = $this->input->post('inputTag');
        $date_created   = $this->input->post('date_created');
        $date_modified  = $this->now;
        $status         = $this->input->post('status');
        $vip            = $this->input->post('vip');

        $array_noise  = array(
            'id_user'       => $id_user,
            'id_category'   => $id_category,
            'code_country'  => $code_country,
            'id_city'       => $id_city,
            'title'         => $title,
            'description'   => $description,
            'video'         => $video,
            'tags'          => $tags,
            'date_created'  => $date_created,
            'date_modified' => $date_modified,
            'status'        => $status,
            'vip'           => $vip
        );

        //ADD SLUG
        $id = $id_notion;
        $data = array(
            'title' => $title,
        );
        $data['slug'] = $this->slug->create_uri($data, $id);
        $this->db->where('id_notion', $id);
        $this->db->update('notion', $data);

        // ADD RELATION
        $array_relation = array(
            'id_notion'     => $id,
            'code_country'  => $code_country,
            'id_city'       => $id_city,
            'likes'         => 0
        );

        $mensaje         = $this->notions_model->update_locations($code_country, $array_relation);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se actualizado correctamente');
            redirect('locations', 'refresh');
        endif;
    }

    public function add_country()
    {
        $code_country   = $this->input->post('code_country');
        $name_country   = $this->input->post('name_country');
        $status         = $this->input->post('status');
        $country_enabled= $this->input->post('enabled');
        $date_created   = $this->now;
        $data           = array(
            'code_country'      =>  $code_country,
            'name_country'      =>  $name_country,
            'date_created'      =>  $date_created,
            'country_enabled'   =>  $country_enabled,
            'status'            =>  $status
        );
        $mensaje    =   $this->locations_model->create_country($data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se ha creado correctamente el país');
            redirect('locations', 'refresh');
        endif;
    }

    public function delete($id_country)
    {
        $mensaje    =   $this->notions_model->delete($id_country);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('notions', 'refresh');
        endif;
    }

    public function active($id_notion){
        $data = array(
            'status'    => 1
        );
        $mensaje    =   $this->notions_model->active($id_notion, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo correctamente');
            redirect('notions', 'refresh');
        endif;
    }

    public function desactive($id_notion){
        $data = array(
            'status'    => 0
        );
        $mensaje    =   $this->notions_model->desactive($id_notion, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo correctamente');
            redirect('notions', 'refresh');
        endif;
    }

    public function vip($id_notion){
        $data = array(
            'vip'    => 1
        );
        $mensaje    =   $this->notions_model->vip($id_notion, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo vip correctamente');
            redirect('notions', 'refresh');
        endif;
    }

    public function notvip($id_notion){
        $data = array(
            'vip'    => 0
        );
        $mensaje    =   $this->notions_model->notvip($id_notion, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo vip correctamente');
            redirect('notions', 'refresh');
        endif;
    }

}