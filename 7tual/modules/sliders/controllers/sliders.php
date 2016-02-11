<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Medico
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class Sliders extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sliders_model');    // cargando models medico
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

        $now1 = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring1 = "%Y-%m-%d";

        $this->now1 = mdate($datestring1, $now1);

    }

    public function index()
    {
        ## MENU
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Sliders', '', 'fa fa-th', '');
        //$this->breadcrumb->add_crumb('Paises', '', '', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile']        = Modules::run('dashboard/name_profile');
        $data['titulo']         = '7tual - Ubicaciones / Listado Paises';
        $data['admin_css_js']   = $this->config->item('admin_css_js');
        $data['admin_img']      = $this->config->item('admin_css_js');
        $data['upload_slider']  = $this->config->item('upload_slider');
        $this->load->view('index',$data);

    }

    public function jsonSliders(){
        $data = $this->sliders_model->list_sliders();
        $this->output->set_content_type('application/json')->set_output(json_encode(array('sliders' => $data)));
    }

    public function edit($id)
    {
        $data0  = $this->sliders_model->edit($id);
        $data1  = $this->sliders_model->recovery_relations($id);

        foreach ($data0 as $item) {
            $id_slider = $item->id_slider;
        }

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Sliders','../../sliders', 'fa fa-th', '');
        $this->breadcrumb->add_crumb('Editar', '', '', '');
        $this->breadcrumb->add_crumb($id_slider, '', '', '');

        $data['slider']         = $data0;
        $data['relations']      = $data1;
        $data['list_country']   = $this->sliders_model->list_country();
        $data['profile']        = Modules::run('dashboard/name_profile');
        $data['titulo']         = '7tual - Slider / Editar slider';
        $data['admin_css_js']   = $this->config->item('admin_css_js');
        $data['admin_img']      = $this->config->item('admin_css_js');
        $this->load->view('edit',$data);

    }

    public function new_sliders()
    {
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', '../dashboard', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Slider','../sliders', 'fa fa-map-marker', '');
        $this->breadcrumb->add_crumb('Nuevo', '', '', '');

        $data['profile'] = Modules::run('dashboard/name_profile');
        $data['titulo'] = '7tual - Sliders / Nuevo';
        $data['list_country'] = $this->sliders_model->list_country();
        $data['time_now'] = $this->now1;
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('new',$data);

    }

    public function add_slider()
    {
            //$code_country   = '';
            $imagen_video   = $this->upload_img_products('imagen_video');
            $imagen_slider  = $this->upload_img_products('imagen_slider',true);
            $tenor          = $this->input->post('tenor');
            $video          = $this->input->post('video');
            $date_created   = $this->now;
            $status         = $this->input->post('status');

            $data           = array(
                //'code_country'      => $code_country,
                'title'             => $tenor,
                'image_background'  => $imagen_slider,
                'id_video'          => $video,
                'imagen'            => $imagen_video,
                'date_created'      => $date_created,
                'date_modified'     => $date_created,
                'status'            => $status
            );

            //print_r($data);
            
            $mensaje = $this->sliders_model->create($data);

            $code_country   = $this->input->post('code_country');
            foreach($code_country as $code){
                $dataRelation = array(
                    'id_slider'     =>  $mensaje,
                    'code_country'  =>  $code
                );
                $this->sliders_model->create_relation($dataRelation);
            }

            if($mensaje):
                $this->session->set_flashdata('mensaje', 'Se ha creado correctamente el slider');
                redirect('sliders', 'refresh');
            endif;
        

    }


    public function update_slider()
    {
            $imagen_video       = $this->upload_img_products('imagen_video');
            $imagen_slider      = $this->upload_img_products('imagen_slider',true);

            $tenor              = $this->input->post('tenor');
            $video              = $this->input->post('video');
            $date_created       = $this->now;
            $status             = $this->input->post('status');
            $imagen_slider_post = $this->input->post('imagen_slider');
            $imagen_video_post  = $this->input->post('imagen_video');
            $idSlider           = $this->input->post('id');

            if(is_array($imagen_slider)){
                $imagen_slider_upd = $imagen_slider_post;
            }else{
                $imagen_slider_upd = $imagen_slider;
            }

            //echo $imagen_video;
            if(is_array($imagen_video)){
                $imagen_video_upd = $imagen_video_post;
            }else{
                $imagen_video_upd = $imagen_video;
            }

            $data           = array(
                'title'             => $tenor,
                'image_background'  => $imagen_slider_upd,
                'id_video'          => $video,
                'imagen'            => $imagen_video_upd,
                'date_created'      => $date_created,
                'date_modified'     => $date_created,
                'status'            => $status
            );
            $mensaje = $this->sliders_model->active($idSlider,$data);
            //$mensaje = $this->sliders_model->create($data);
            $this->sliders_model->delete_relations($idSlider);

            $code_country   = $this->input->post('code_country');
            foreach($code_country as $code){
                $dataRelation = array(
                    'id_slider'     =>  $idSlider,
                    'code_country'  =>  $code
                );
                $this->sliders_model->create_relation($dataRelation);
            }

            if($mensaje):
                $this->session->set_flashdata('mensaje', 'Se ha modificado correctamente el slider');
                redirect('sliders', 'refresh');
            endif;
        

    }

    public function upload_img_products($name,$thumb = false){
        $resultadoUpload = false;
        $path_public = "";
        try {
            $path_public = "./upload/slider/";
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
        print_r($this->input->post());
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

    public function delete($id_slider)
    {
        $mensaje0    =   $this->sliders_model->delete($id_slider);
        $mensaje1    =   $this->sliders_model->delete_relations($id_slider);

        if($mensaje0):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('sliders', 'refresh');
        endif;
    }

    public function active($id_slider){
        $data = array(
            'status'    => 1
        );
        $mensaje    =   $this->sliders_model->active($id_slider, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se activo correctamente');
            redirect('sliders', 'refresh');
        endif;
    }

    public function desactive($id_slider){
        $data = array(
            'status'    => 0
        );
        $mensaje    =   $this->sliders_model->desactive($id_slider, $data);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se desactivo correctamente');
            redirect('sliders', 'refresh');
        endif;
    }

    public function relations($id_slider){
        $data['relations'] = $this->sliders_model->list_slider_country($id_slider);
        $data['upload_slider']  = $this->config->item('upload_slider');
        $this->load->view('modal',$data);
    }

    public function delete_relations($id_relation){
        $mensaje = $this->sliders_model->delete_relation($id_relation);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se elimino la relación correctamente');
            redirect('sliders', 'refresh');
        endif;
    }

}