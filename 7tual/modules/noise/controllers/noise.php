<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    Class Noise
 */
class Noise extends MX_Controller
{

    public $status_login;
    public $key_activation;
    public $controlador;

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        $this->load->model('noise_model');
        if($this->auth->is_logged() == FALSE):
            $this->status_login = "not_login";
            $this->key_activation = $this->generate_key(20);
        else:
            $this->status_login = "logueado";
        endif;

        // LOAD LIBRARY SLUG
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
        $daylight_saving = false;
        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m-%d %h:%i:%s";
        $this->now = mdate($datestring, $now);

        //$this->name_country = $this->country->ip_info('Visitor', 'Country');
        //$this->code_country = $this->country->ip_info("Visitor", "Country Code");
        $this->name_country = 'PERU';
        $this->code_country = 'PE';
        //$this->state        = $this->country->ip_info('181.66.157.144', 'State');
    }

    public function generate_key($longitud){
        return random_string('unique',$longitud);
    }

    public function index()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        //$this->menu->add_menu('emprendimiento', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $code_country = $this->session->userdata('code_country');
        $data['key_activation'] = $this->key_activation;

        $data['titulo']         = '7Tual';

        $data['lst_ideas']      = $this->noise_model->list_noise($this->code_country);

        $data['status_login']   = $this->status_login;
        $data['list_noise']     = $this->noise_model->list_noise($this->code_country);
        //$data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);
        // LIST COUNTRY
        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();

        $data['date_time']      = $this->now;

        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);
        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }

        $data['list_category']  = $this->noise_model->list_category();
        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('index',$data);
    }

    public function list_noise_more(){
        sleep(3);
        if($this->input->is_ajax_request() && $this->input->post("lastId") && $this->code_country)
        {
            $nuevos_datos = $this->noise_model->list_noise_more($this->input->post("lastId")  , $this->code_country);
            if($nuevos_datos !== FALSE)
            {
                echo json_encode(array("res" => "success", "ideas" => $nuevos_datos));
            }
            else
            {
                echo json_encode(array("res" => "empty"));
            }
        }
    }

    public function plus_notion_view()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $code_country = $this->session->userdata('code_country');
        $data['key_activation'] = $this->key_activation;

        $data['titulo']         = '7Tual - Más votados';
        $data['status_login']   = $this->status_login;
        $data['list_noise']     = $this->noise_model->list_noise_plus($this->code_country);
        $data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);
        // LIST COUNTRY
        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();

        $data['date_time']      = $this->now;

        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);
        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }

        $data['list_category']  = $this->noise_model->list_category();
        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('index',$data);
    }

    public function favorites_view()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $code_country = $this->session->userdata('code_country');
        $data['key_activation'] = $this->key_activation;

        $data['titulo']         = '7Tual - Ideas favoritas';
        $data['status_login']   = $this->status_login;
        $data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);
        // LIST COUNTRY
        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();
        $data['date_time']      = $this->now;

        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);
        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        if($this->status_login=='logueado'){
            $data['list_noise_favorites'] = $this->noise_model->notion_favorites($this->session->userdata('id_usuario'));
        }

        $data['list_category']  = $this->noise_model->list_category();
        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('view_favorites',$data);
    }

    public function recents_view()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $code_country = $this->session->userdata('code_country');
        $data['key_activation'] = $this->key_activation;

        $data['titulo']         = '7Tual - Ideas recientes';
        $data['status_login']   = $this->status_login;
        $data['list_noise']     = $this->noise_model->list_noise_recients($this->code_country);
        $data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);
        // LIST COUNTRY
        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();
        $data['date_time']      = $this->now;

        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);
        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }

        $data['list_category']  = $this->noise_model->list_category();
        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('index',$data);
    }

    public function list_city($code_country)
    {
        $data = $this->noise_model->list_city($code_country);
        echo json_encode($data);
    }

    public function list_city_v1()
    {
        $options = "";
        if($this->input->post('code_country'))
        {
            $code_country = $this->input->post('code_country');
            $citys = $this->noise_model->list_city_v1($code_country);
            foreach($citys as $city)
            {
                echo '<option value="'.$city->id_city.'">'.$city->name_city.'</option>';
            }
        }
    }

    public function add_notion()
    {

        $id_user        = $this->session->userdata('id_usuario');
        $id_category    = $this->input->post('selectCategory');
        $code_country   = $this->input->post('code_country');
        $id_city        = $this->input->post('selectCity');;
        $title          = $this->input->post('inputTitulo');
        $description    = $this->input->post('inputIdea');
        $video          = $this->input->post('inputVideo');
        $tags           = $this->input->post('inputTag');
        $data           = $this->now;
        $status         = $this->input->post('status');
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
            'status'        => $status
        );

        $return0 = $this->noise_model->add_noise($array_noise);

        //ADD SLUG
        $id = $return0;
        $data = array(
            'title' => $title,
        );
        $data['slug'] = $this->slug->create_uri($data, $id);
        $this->db->where('id_notion', $id);
        $this->db->update('notion', $data);

        // ADD RELATION
        $array_relation = array(
            'id_notion'     => $return0,
            'code_country'  => $code_country,
            'id_city'       => $id_city,
            'likes'         => 0
        );

        $return1 = $this->noise_model->add_relation_lincc($array_relation);

        if($return0 != "" && $return1!= ""):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function list_noise($codeCountry){
        $result = $this->noise_model->list_noise($this->session->userdata($codeCountry));
        echo json_encode($result);
    }

    public function list_noise_vip($codeCountry){
        $result = $this->noise_model->list_noise_vip($this->session->userdata($codeCountry));
        echo json_encode($result);
    }

    public function json_noise_search($codeCountry){
        $result = $this->noise_model->list_noise_search($codeCountry);
        echo json_encode($result);
    }

    public function search($code_country, $id_city){
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo']         = '7Tual - Buscador';
        $data['status_login']   = $this->status_login;
        $data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);

        $data['key_activation'] = $this->key_activation;
        $data['token']          = $this->auth->create_token();

        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();
        $data['date_time']      = $this->now;

        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }

        $data['list_category']  = $this->noise_model->list_category();
        $data['list_noise']     = $this->noise_model->list_noise_search_notion_country($code_country, $id_city);

        //$data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);
        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);
        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('search',$data);
    }

    public function category($slug_category){
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo']         = '7Tual - Buscador';
        $data['status_login']   = $this->status_login;
        $data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);

        $data['key_activation'] = $this->key_activation;
        $data['token']          = $this->auth->create_token();

        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();
        $data['date_time']      = $this->now;

        $data['list_category']  = $this->noise_model->list_category();
        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }

        // RECUPERANDO DATOS PARA LA CATEGORIA
        $data0    = $this->noise_model->recovery_id_category($slug_category);
        //print_r($data0);
        foreach ($data0 as $key) {
            $id_cat = $key->id_category;
            //print_r($id_cat);
        }

        $data['list_noise']     = $this->noise_model->list_noise_for_category($id_cat, $this->code_country);

        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);

        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('category',$data);
    }

    public function category_v1($slug_category){
        $data0    = $this->noise_model->recovery_id_category($slug_category);
        foreach ($data0 as $key) {
            $id_cat = $key->id_category;
            print_r($id_cat);
        }
    }

    public function view_noise($slug){

        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo']         = '7Tual - Idea';
        $data['status_login']   = $this->status_login;
        $data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);

        $data['key_activation'] = $this->key_activation;
        $data['token']          = $this->auth->create_token();

        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();
        $data['date_time']      = $this->now;

        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }

        $data['list_category']  = $this->noise_model->list_category();

        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);

        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $data0    = $this->noise_model->recovery_id_noise($slug);
        foreach ($data0 as $key) {
            $id_notion = $key->id_notion;
        }

        $result = $this->noise_model->view_noise($id_notion);
        $result_comment = $this->noise_model->list_comment_notion($id_notion);

        $data['view_noise'] = $result;
        $data['list_comment_notion'] = $result_comment;

        //print_r($id_notion);
        $this->load->view('view_noise',$data);
    }

    public function category_noise($category, $slug){
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo']         = '7Tual - ';
        $data['status_login']   = $this->status_login;
        $data['list_noise_vip'] = $this->noise_model->list_noise_vip($this->code_country);

        $data['key_activation'] = $this->key_activation;
        $data['token']          = $this->auth->create_token();

        $data['list_country']   = $this->noise_model->list_country();
        $data['list_city']      = $this->noise_model->list_city();
        $data['date_time']      = $this->now;

        $data['list_category']  = $this->noise_model->list_category();

        $data['list_slider']    = $this->noise_model->sliders_for_country($this->code_country);

        $data['list_events']    = $this->noise_model->list_events($this->code_country);
        $data['list_events_vip']= $this->noise_model->list_events_vip($this->code_country);

        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }

        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $data0    = $this->noise_model->recovery_id_noise($slug);
        foreach ($data0 as $key) {
            $id_notion = $key->id_notion;
        }

        $result = $this->noise_model->view_noise($id_notion);

        $data['view_noise'] = $result;

        $this->load->view('cat_view_noise',$data);
    }

    public function me_apunto(){
        $id_notion          = $this->input->post('id_notion');
        $id_user             = $this->input->post('id_user');
        $date_created   = $this->now;
        #COMPROBANDO SI EXISTE LIKE DEL USUARIO
        $data = $this->noise_model->check_like_user($id_notion, $id_user);

        if (empty($data)) {
            #AGREGANDO RELACION A LA BD
            $array_relation  = array(
                'id_user'       => $id_user,
                'id_notion'     => $id_notion,
                'date_created'  => $date_created
            );
            $return = $this->noise_model->add_apunto($array_relation);
            $return0 = $this->noise_model->add_like($id_notion);
            if($return != ""):
                echo "1";
                return true;
            else:
                echo "0";
                return false;
            endif;
        }else{
            echo "3";
        }
    }

    public function list_noise_search_join()
    {
        $code_country = $this->input->post('code_country');
        $id_city = $this->input->post('id_city');
        $id_category = $this->input->post('id_category');
        $other = $this->input->post('other');
        $data['view_noise'] = $this->noise_model->list_noise_search_join($code_country, $id_city, $id_category, $other);
        if($this->status_login=='logueado'){
            $data['list_noise_like'] = $this->noise_model->like_usuario($this->session->userdata('id_usuario'));
        }
        $data['date_time'] = $this->now;
        $this->load->view('list_noise',$data);
    }

    public function remove_apunto(){
        $id_notion = $this->input->post('id_notion');
        $id_user = $this->input->post('id_user');
        $return0 = $this->noise_model->remove_apunto($id_notion, $id_user);
        $return1 = $this->noise_model->drop_like($id_notion);
        if($return0 != ""):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function add_comment(){
        $id_user = $this->input->post('id_user');
        $id_notion = $this->input->post('id_notion');
        $tipo_comment = $this->input->post('tipo_comment');
        $comment = $this->input->post('comment');
        $date_created = $this->now;
        $array_comment  = array(
            'id_user' => $id_user,
            'id_notion' => $id_notion,
            'tipo_comment' => $tipo_comment,
            'comment' => $comment,
            'date_created' => $date_created
        );
        $return = $this->noise_model->add_comment($array_comment);
        if($return != "" ):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function item_idea(){
        $this->load->view('item_idea');
    }

}