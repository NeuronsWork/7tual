<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Medico
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class Locations extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('locations_model');    // cargando models medico
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
        $this->breadcrumb->add_crumb('Ubicaciones', '', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Paises', '', '', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Ubicaciones / Listado Paises';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('index',$data);

    }

    public function jsonCountry(){
        $data = $this->locations_model->list_country();
        $this->output->set_content_type('application/json')->set_output(json_encode(array('geonames' => $data)));
    }

    public function edit($id)
    {
        $data = $this->locations_model->edit_country($id);

        foreach ($data as $item) {
            $country = $item->name_country;
        }

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Ubicaciones','../../locations', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Paises', '../../locations', '', '');
        $this->breadcrumb->add_crumb('Editar', '', '', '');
        $this->breadcrumb->add_crumb($country, '', '', '');

        $data['array_country'] = $data;
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Ubicaciones / Listado Paises';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('edit',$data);

    }

    public function new_locations()
    {
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Ubicaciones','../locations', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Paises', '../locations', '', '');
        $this->breadcrumb->add_crumb('Nuevo', '', '', '');

        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Ubicaciones / Nuevo País';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('new',$data);
    }

    public function update()
    {
        $id_country     = $this->input->post('id_country');
        $code_country   = $this->input->post('code_country');
        $name_country   = $this->input->post('name_country');
        $status         = $this->input->post('status');
        $date_modified  = $this->now;
        $data           = array(
            'code_country'  =>  $code_country,
            'name_country'  =>  $name_country,
            'date_modified' =>  $date_modified,
            'status'        =>  $status
        );
        $mensaje         = $this->locations_model->update_locations($id_country, $data);
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

        // LOAD LIBRARY SLUG
        $config = array(
            'table' => 'country',
            'id' => 'id_country',
            'field' => 'slug',
            'title' => 'name_country',
            'replacement' => 'dash'
        );

        $this->load->library('slug', $config);

        //ADD SLUG
        $id = $mensaje;
        $data = array(
            'name_country' => $name_country,
        );
        $data['slug'] = $this->slug->create_uri($data, $id);
        $this->db->where('id_country', $id);
        $this->db->update('country', $data);

        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se ha creado correctamente el país');
            redirect('locations', 'refresh');
        endif;
    }

    public function active($id_country){
        $data = array(
            'status'    => 1
        );
        $mensaje    =   $this->locations_model->active($id_country, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo correctamente');
            redirect('locations', 'refresh');
        endif;
    }

    public function desactive($id_country){
        $data = array(
            'status'    => 0
        );
        $mensaje    =   $this->locations_model->desactive($id_country, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo correctamente');
            redirect('locations', 'refresh');
        endif;
    }

    public function delete($id_country)
    {
        $mensaje    =   $this->locations_model->delete_country($id_country);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('locations', 'refresh');
        endif;
    }

    // CONTROLLERS LCOATIONS :: CITY
    public function citys()
    {
        ## MENU
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Ubicaciones', '', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Ciudades', '', '', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Ubicaciones / Listado Ciudades';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('city',$data);
    }

    public function new_citys()
    {
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Ubicaciones','../locations', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Ciudades', '../citys', '', '');
        $this->breadcrumb->add_crumb('Nuevo', '', '', '');

        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Ubicaciones / Nueva ciudad';
        $data['list_countrys'] = $this->locations_model->list_c_country();
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('new_citys',$data);
    }

    public function add_city()
    {
        $code_country   = $this->input->post('code_country');
        $name_city      = $this->input->post('name_city');
        $status         = $this->input->post('status');
        $date_created   = $this->now;
        $data           = array(
            'code_country'      =>  $code_country,
            'name_city'         =>  $name_city,
            'date_created'      =>  $date_created,
            'status'            =>  $status
        );
        $mensaje    =   $this->locations_model->create_city($data);

        // LOAD LIBRARY SLUG
        $config = array(
            'table' => 'city',
            'id' => 'id_city',
            'field' => 'slug',
            'title' => 'name_city',
            'replacement' => 'dash'
        );
        $this->load->library('slug', $config);

        //ADD SLUG
        $id = $mensaje;
        $data = array(
            'name_city' => $name_city,
        );
        $data['slug'] = $this->slug->create_uri($data, $id);
        $this->db->where('id_city', $id);
        $this->db->update('city', $data);

        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se ha creado correctamente la ciudad');
            redirect('locations/citys', 'refresh');
        endif;
    }

    public function edit_city($id)
    {
        $data = $this->locations_model->edit_city($id);

        foreach ($data as $item) {
            $city = $item->name_city;
        }

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Ubicaciones','../../locations', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Ciudad', '../../locations/citys', '', '');
        $this->breadcrumb->add_crumb('Editar', '', '', '');
        $this->breadcrumb->add_crumb($city, '', '', '');

        $data['array_country'] = $data;
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Ubicaciones / Listado Paises';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('edit',$data);

    }

    public function jsonCity(){
        $data = $this->locations_model->list_city();
        $this->output->set_content_type('application/json')->set_output(json_encode(array('geonames' => $data)));
    }

    public function active_city($id_city){
        $data = array(
            'status'    => 1
        );
        $mensaje    =   $this->locations_model->active_city($id_city, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo correctamente');
            redirect('locations/citys', 'refresh');
        endif;
    }

    public function desactive_city($id_city){
        $data = array(
            'status'    => 0
        );
        $mensaje    =   $this->locations_model->desactive_city($id_city, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo correctamente');
            redirect('locations/citys', 'refresh');
        endif;
    }

    public function delete_city($id_city)
    {
        $mensaje    =   $this->locations_model->delete_city($id_city);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('locations/citys', 'refresh');
        endif;
    }

}