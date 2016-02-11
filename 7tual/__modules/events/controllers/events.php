<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Medico
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class Events extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('events_model');    // cargando models medico
        if($this->auth->is_logged() == FALSE):      // verificando login
            redirect(base_url('manager'));
        endif;

        // LOAD LIBRARY SLUG
        $config = array(
            'table' => 'event',
            'id'    => 'id_event',
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
        $this->breadcrumb->add_crumb('Eventos', '', 'fa fa-cloud', '');
        //$this->breadcrumb->add_crumb('Paises', '', '', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Eventos / Listado';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('index',$data);

    }

    public function jsonEvents(){
        $data = $this->events_model->list_events();
        $this->output->set_content_type('application/json')->set_output(json_encode(array('events' => $data)));
    }

    public function edit($id)
    {

        $data_notion = $this->events_model->edit($id);

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Eventos','../../events', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Editar', '', '', '');
        //$this->breadcrumb->add_crumb($country, '', '', '');

        $data['events'] = $data_notion;
        $data['profile']    = Modules::run('dashboard/name_profile');
        $data['categoria']  = $this->events_model->list_category();
        $data['city']       = $this->events_model->list_citys();
        $data['country']    = $this->events_model->list_country();

        $data['titulo'] = '7tual - Eventos / Editar';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('edit',$data);

    }

    public function edit_events()
    {

        $imagen_video   = $this->upload_img_products('imagen');

        $id             = $this->input->post('id');

        $imagen         = $this->input->post('imagen');
        $id_category    = $this->input->post('selectCategory');
        $code_country   = $this->input->post('code_country');
        $id_city        = $this->input->post('selectCity');
        $title          = $this->input->post('inputTitulo');
        $description    = $this->input->post('inputIdea');
        $fInicio        = $this->input->post('fInicio');
        $fFin           = $this->input->post('fFin');
        $video          = $this->input->post('video');
        $data           = $this->now;
        $vip            = $this->input->post('vip');
        $status         = $this->input->post('status');

        if(is_array($imagen_video)){
            $imagen_new = $imagen;
        }else{
            $imagen_new = $imagen_video;
        }

        $array_noise  = array(
            'id_category'   => $id_category,
            'code_country'    => $code_country,
            'id_city'       => $id_city,
            'title'         => $title,
            'description'   => $description,
            'image_video'   => $imagen_new,
            'video'         => $video,
            'date_created'  => $data,
            'date_modified' => $data,
            'date_open'     => $fInicio,
            'date_end'      => $fFin,
            'vip'           => $vip,
            'status'        => $status
        );

        $return0 = $this->events_model->active($id,$array_noise);

        //ADD SLUG
        //$id = $return0;
        $data = array(
            'title' => $title,
        );
        $data['slug'] = $this->slug->create_uri($data, $id);
        $this->db->where('id_event', $id);
        $this->db->update('event', $data);

        if($return0):
            $this->session->set_flashdata('mensaje', 'Se ha modificado correctamente');
            redirect('events', 'refresh');
        endif;
    }


    public function new_events()
    {
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Eventos','../events', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Nuevo', '', '', '');

        $data['profile']    = Modules::run('dashboard/name_profile');
        $data['categoria']  = $this->events_model->list_category();
        $data['city']       = $this->events_model->list_citys();
        $data['country']       = $this->events_model->list_country();
        $data['titulo']     = '7tual - Eventos / Nuevo';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img']  = $this->config->item('admin_css_js');
        $this->load->view('new',$data);

    }

    public function add_events()
    {
        $imagen_video   = $this->upload_img_products('imagen');

        $id_category    = $this->input->post('selectCategory');
        $code_country   = $this->input->post('code_country');
        $id_city        = $this->input->post('selectCity');
        $title          = $this->input->post('inputTitulo');
        $description    = $this->input->post('inputIdea');
        $fInicio        = $this->input->post('fInicio');
        $fFin           = $this->input->post('fFin');
        $video          = $this->input->post('video');
        $data           = $this->now;
        $status         = $this->input->post('status');
        $vip            = $this->input->post('vip');


        $array_noise  = array(
            'id_category'   => $id_category,
            'code_country'  => $code_country,
            'id_city'       => $id_city,
            'title'         => $title,
            'description'   => $description,
            'image_video'   => $imagen_video,
            'video'         => $video,
            'date_created'  => $data,
            'date_modified' => $data,
            'date_open'     => $fInicio,
            'date_end'      => $fFin,
            'vip'           => $vip,
            'status'        => $status
        );


        $return0 = $this->events_model->add_events($array_noise);

        //ADD SLUG
        $id = $return0;
        $data = array(
            'title' => $title,
        );
        $data['slug'] = $this->slug->create_uri($data, $id);
        $this->db->where('id_event', $id);
        $this->db->update('event', $data);

        if($return0):
            $this->session->set_flashdata('mensaje', 'Se ha creado correctamente el Evento');
            redirect('events', 'refresh');
        endif;
    }

    public function upload_img_products($name,$thumb = false){
        $resultadoUpload = false;
        $path_public = "";
        try {
            $path_public = "./upload/evento/";
            $config['upload_path'] = $path_public;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['remove_spaces']=TRUE;
            $config['max_size'] = '2000';
            $config['max_width'] = '2024';
            $config['max_height'] = '2008';

            $this->load->library('upload');
            $this->upload->initialize($config);
            //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW

            $resultadoUpload = $this->upload->do_upload($name);
            //print_r($resultadoUpload);
            //$demo = $this->upload->data();
        } catch (Exception $e) {
            echo '<br>Error: '.$e->getMenssage();
            echo '<br>Linea: '.$e->getLine();
        }

        //return $demo;
        if($resultadoUpload)
        {
            $arrayFoto = $this->upload->data();
            $nombreImagen = $arrayFoto['file_name'];
            if($thumb === true){
                $this->_create_thumbnail($path_public,$nombreImagen);
            }
            return $nombreImagen;
        }else{
            //return $this->upload->display_errors();
            $error = array('error' => $this->upload->display_errors());
            //$error = $this->upload->display_errors();
            return $error;
        }
    }

    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($ruta,$filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = $ruta.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']=$ruta.'thumbs/';
        $config['width'] = 480;
        $config['height'] = 360;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    public function update()
    {
        $id_country     = $this->input->post('code_country');
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

    public function delete($id)
    {
        $mensaje    =   $this->events_model->delete($id);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('events', 'refresh');
        endif;
    }

    public function active($id_notion){
        $data = array(
            'status'    => 1
        );
        $mensaje    =   $this->events_model->active($id_notion, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo correctamente');
            redirect('events', 'refresh');
        endif;
    }

    public function desactive($id_notion){
        $data = array(
            'status'    => 0
        );
        $mensaje    =   $this->events_model->active($id_notion, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo correctamente');
            redirect('events', 'refresh');
        endif;
    }

    public function vip($id_event){
        $data = array(
            'vip'    => 1
        );
        $mensaje    =   $this->events_model->vip($id_event, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo vip correctamente');
            redirect('events', 'refresh');
        endif;
    }

    public function notvip($id_event){
        $data = array(
            'vip'    => 0
        );
        $mensaje    =   $this->events_model->notvip($id_event, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo vip correctamente');
            redirect('events', 'refresh');
        endif;
    }

}