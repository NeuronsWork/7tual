<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    Class Web
 */
class Web extends MX_Controller
{

    public $status_login;
    public $key_activation;

public function __construct()
    {
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        $this->load->model('web_model');

        if($this->auth->is_logged() == FALSE):
            $this->status_login = "not_login";
            $this->key_activation = $this->generate_key(20);
        else:
            $this->status_login = "logueado";
        endif;

        /* Obtenemos la fecha actual */
        date_default_timezone_set('UTC');
        $timestamp = now();
        $timezone = 'UM5';
        $daylight_saving = FALSE;

        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m-%d %h:%i:%s";

        $this->now = mdate($datestring, $now);

        //$this->name_country = $this->country->ip_info('Visitor', 'Country');
        //$this->code_country = $this->country->ip_info("Visitor", "Country Code");
        $this->name_country = 'PERU';
        $this->code_country = 'PE';

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
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contacto', site_url('contactanos'), '');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();
        $data['titulo']         = '7Tual - Inicio';
        // LIST CATEGORIA
        $data['list_category']  = $this->web_model->list_category();
        // LIST COUNTRY
        $data['list_country']   = $this->web_model->list_country();
        $data['list_city']      = $this->web_model->list_city();
        // LIST EVENTS
        $data['list_events']    = $this->web_model->list_events($this->code_country);
        $data['list_events_vip']= $this->web_model->list_events_vip($this->code_country);
        // LIST SLIDER FOR COUNTRY
        $data['list_slider']    = $this->web_model->sliders_for_country($this->code_country);
        // DATOS CONFIG
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');
        $data['upload_evento']  = $this->config->item('upload_evento');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('index',$data);
    }

    public  function  list_events($code_country){
        $data = $this->web_model->list_events($code_country);
        echo json_encode($data);
    }

    public function account()
    {

        // create menu
        $this->menu->clear();
        $this->menu->add_menu('inicio', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contacto', site_url('contactanos'), '');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();
        $data['titulo']         = '7Tual - Mi cuenta';
        // LIST CATEGORIA
        $data['list_category']  = $this->web_model->list_category();
        // LIST COUNTRY
        $data['list_country']   = $this->web_model->list_country();
        $data['list_city']      = $this->web_model->list_city();

        $data['list_events']    = $this->web_model->list_events($this->code_country);
        $data['list_events_vip']= $this->web_model->list_events_vip($this->code_country);

        $data['account']        = $this->web_model->my_account($this->session->userdata('id_usuario'));

        // LIST SLIDER FOR COUNTRY
        $data['list_slider']    = $this->web_model->sliders_for_country($this->code_country);
        // DATOS CONFIG
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;

        $this->load->view('account',$data);
    }

    public function delete_account($id){
        $data = $this->web_model->delete_account($id);
        $data = $this->web_model->migrate_notion($id);
        $this->auth->logout('web');
        //redirect(site_url(), 'refresh');
    }

    public function test_visitor(){
        //echo ip_info("Visitor", "Country"); // India
        //echo ip_info("Visitor", "Country Code"); // IN
        //echo ip_info("Visitor", "State"); // Andhra Pradesh
        //echo ip_info("Visitor", "City"); // Proddatur
        //echo ip_info("Visitor", "Address"); // Proddatur, Andhra Pradesh, India

        //print_r(ip_info("Visitor", "Location")); // Array ( [city] => Proddatur [state] => Andhra Pradesh [country] => India [country_code] => IN [continent] => Asia [continent_code] => AS )
        //para sacar el ip del viistante
        //$data = $this->country->ip_info('Visitor', 'Location');
        //para hacer la prueba localmente
        //$data = $this->country->ip_info('181.66.157.144', 'Location');
        $data['name_country'] = $this->country->ip_info('181.66.157.144', 'Country');
        $data['code-country'] = $this->country->ip_info('181.66.157.144', 'Country Code');
        $data['city'] = $this->country->ip_info('181.66.157.144', 'State');
        //print_r($data);
    }

    public function list_city()
    {
        $data = $this->web_model->list_city($code_country);
        print_r(json_encode($data));
    }

    public function list_country()
    {
        $data = $this->web_model->list_country();
        print_r(json_encode($data));
    }

    public function register_user()
    {
        //print_r($this->code_country);
        $id_profile     = $this->input->post('id_profile');
        $user           = $this->input->post('inputUsuario');
        $pwd            = md5($this->input->post('inputPassword'));
        $email          = $this->input->post('inputEmail');
        $code_country   = $this->code_country;
        $id_city        = 0;
        $data           = $this->now;
        $key_activation = $this->input->post('key_activation');
        $status         = $this->input->post('status');

        $array_user = array(
            'id_profile'    => $id_profile,
            'user'          => $user,
            'pwd'           => $pwd,
            'email'         => $email,
            'code_country'  => $code_country,
            'id_city'       => $id_city,
            'date_created'  => $data,
            'date_modified' => $data,
            'activation_key'=> $key_activation,
            'status'        => $status
        );

        //print_r($array_user);
        $return = $this->web_model->RegisterUser($array_user);

        $content    = '<h2>Hola'.$user.'</h2>';
        $content   .= '<p>Gracias por registrarte en 7tual.com</p>';
        $content   .= '<p>Para poder verificar tu cuenta necesitar hacer click en el siguiente link <a href="'.base_url().'verification'.'/'.$user.'/'.$key_activation.'">Verificar tu cuenta</a></p>';
        $content   .= '<p>Hasta que no verifiques tu cuenta, no se activara tu usuario.</p>';
        $content   .= '<p>¡Gracias!</p>';
        $content   .= '<p>El equipo de Mozilla</p>';

        $this->email->from('7tual@gmail.com', '7TUAL');
        $this->email->to($email);
        //super importante, para poder envíar html en nuestros correos debemos ir a la carpeta
        //system/libraries/Email.php y en la línea 42 modificar el valor, en vez de text debemos poner html
        $this->email->subject('Acción requerida: confirma tu cuenta de 7Tual.com');
        $this->email->message($content);
        $this->email->send();

        if($return != "" ):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function verification_activation($user, $key_activation)
    {
        $array_verify = array(
            'status' => 1
        );

        // create menu
        $this->menu->clear();
        $this->menu->add_menu('inicio', site_url(), 'active');
        $this->menu->add_menu('público', site_url('publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contacto', site_url('contactanos'), '');

        $data['titulo']         = '7Tual - Inicio';
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');

        $return = $this->web_model->verify_key($user, $key_activation, $array_verify);
        if($return):
            $this->session->set_flashdata('activate', 'good');
            redirect(base_url().'web/verify_user', 'refresh');
        else:
            $this->session->set_flashdata('activate', 'fail');
            redirect(base_url().'web/verify_user', 'refresh');
        endif;
    }

    public function verify_user(){
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo']         = '7Tual - Activación de usuario';
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');

        $this->load->view('verify_user',$data);

    }

    public function login()
    {

        if($this->input->post('token'))
        {
            //print_r($this->input->post('username'));
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');

            //lanzamos mensajes de error si es que los hay
            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }else{
                $username   = $this->input->post('username');
                $password   = md5($this->input->post('password'));
                $currentURL = $this->input->post('url_current');
                $check_user = $this->web_model->login_user($username,$password);
                if($check_user == TRUE)
                {
                    $data = array(
                        'is_logued_in'  =>  TRUE,
                        'id_usuario'    =>  $check_user->id_user,
                        'id_profile'    =>  $check_user->id_profile,
                        'code_country'  =>  $check_user->code_country,
                        'username'      =>  $check_user->user
                    );
                    $this->auth->create_sessions($data);
                    $data0 = array(
                        'date_last_access' => $this->now
                    );
                    $this->web_model->update_user_sesion($check_user->id_user, $data0);
                    echo "1";
                    //print_r('1');
                    return true;
                }else{
                    echo "2";
                    //print_r('2');
                    return false;
                }
            }
        }else{
            return false;
        }
    }

    public function logout()
    {
        $this->auth->logout('web');
    }

    public function sliders_page($code_country){
        $data = $this->web_model->sliders_for_country($code_country);
    }

    public function view_event($slug){
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), 'active');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo']         = '7Tual - Evento';
        $data['status_login']   = $this->status_login;

        $data['key_activation'] = $this->key_activation;
        $data['token']          = $this->auth->create_token();

        $data['list_country']   = $this->web_model->list_country();
        $data['list_city']      = $this->web_model->list_city();
        $data['date_time']      = $this->now;

        if($this->status_login=='logueado'){
            $data['list_event_like'] = $this->web_model->like_usuario($this->session->userdata('id_usuario'));
        }

        $data['list_category']  = $this->web_model->list_category();

        $data['list_slider']    = $this->web_model->sliders_for_country($this->code_country);

        $data['list_events']    = $this->web_model->list_events($this->code_country);
        $data['list_events_vip']= $this->web_model->list_events_vip($this->code_country);

        $data['token']          = $this->auth->create_token();
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['upload_slider']  = $this->config->item('upload_slider');

        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;

        $data0    = $this->web_model->recovery_id_event($slug);
        foreach ($data0 as $key) {
            $id_event = $key->id_event;
        }

        $result = $this->web_model->view_event($id_event);
        $result_comment = $this->web_model->list_comment_event($id_event);

        $data['view_event'] = $result;
        $data['list_comment_event'] = $result_comment;

        $this->load->view('view_event',$data);

    }

    public function me_apunto(){
        $id_event          = $this->input->post('id_notion');
        $id_user             = $this->input->post('id_user');
        $date_created   = $this->now;
        #COMPROBANDO SI EXISTE LIKE DEL USUARIO
        $data = $this->web_model->check_like_user($id_event, $id_user);

        if (empty($data)) {
            #AGREGANDO RELACION A LA BD
            $array_relation  = array(
                'id_user'       => $id_user,
                'id_event'     => $id_event,
                'date_created'  => $date_created
            );
            $return = $this->web_model->add_apunto($array_relation);
            $return0 = $this->web_model->add_like($id_event);
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

    public function remove_apunto(){
        $id_event= $this->input->post('id_notion');
        $id_user = $this->input->post('id_user');
        $return0 = $this->web_model->remove_apunto($id_event, $id_user);
        $return1 = $this->web_model->drop_like($id_event);
        if($return0 != ""):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function publico()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('web/publico'), 'active');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();

        $data['titulo']         = '7Tual - Público';
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        //$data['state']          = $this->state;
        $this->load->view('publico',$data);
    }

    public function general()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('web/publico'), 'active');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();

        $data['titulo']     = '7Tual - Público';
        $data['web_css_js'] = $this->config->item('web_css_js');
        $data['web_img']    = $this->config->item('web_css_js');
        $data['web_upload'] = $this->config->item('web_upload');

        $data['nameCountry']= $this->name_country;
        $data['codeCountry']= $this->code_country;
        $this->load->view('publico',$data);
    }

    public function empresas()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), 'active');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();

        $data['titulo']         = '7Tual - Empresas';
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        $this->load->view('empresas',$data);
    }

    public function equipo()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), 'active');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();

        $data['titulo']         = '7Tual - Equipo';
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        $this->load->view('equipo',$data);
    }

    public function contactanos()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), 'active');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();

        $data['titulo']         = '7Tual - Contáctanos';
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        $this->load->view('contactanos',$data);
    }

        public function reportar($id)
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('web/publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), 'active');

        $data['status_login']   = $this->status_login;
        $data['key_activation'] = $this->key_activation;

        $data['token']          = $this->auth->create_token();

        $data['id_notion'] = $id;

        $data['titulo']         = '7Tual - Reportar';
        $data['web_css_js']     = $this->config->item('web_css_js');
        $data['web_img']        = $this->config->item('web_css_js');
        $data['web_upload']     = $this->config->item('web_upload');
        $data['nameCountry']    = $this->name_country;
        $data['codeCountry']    = $this->code_country;
        $this->load->view('reportar',$data);
    }

    public function terminos()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo'] = '7Tual - Terminos de uso';
        $data['web_css_js'] = $this->config->item('web_css_js');
        $data['web_img'] = $this->config->item('web_css_js');
        $data['web_upload'] = $this->config->item('web_upload');
        $this->load->view('terminos',$data);
    }

    public function idea()
    {
        // create menu
        $this->menu->clear();
        $this->menu->add_menu('portada', site_url(), '');
        $this->menu->add_menu('público', site_url('publico'), '');
        $this->menu->add_menu('empresas', site_url('empresas'), '');
        $this->menu->add_menu('equipo', site_url('equipo'), '');
        $this->menu->add_menu('contáctanos', site_url('contactanos'), '');

        $data['titulo'] = '7Tual - Item de Idea';
        $data['web_css_js'] = $this->config->item('web_css_js');
        $data['web_img'] = $this->config->item('web_css_js');
        $data['web_upload'] = $this->config->item('web_upload');
        $this->load->view('idea',$data);
    }

    public function add_message()
    {
        /**
            Estados var status
            2 = respondido
            1 = nuevo / sin leer
            0 = eliminado
        */

        $nombre         = $this->input->post('inputNombre');
        $email          = $this->input->post('inputEmail');
        $asunto         = $this->input->post('selectAsunto');
        $mensaje        = $this->input->post('inputMensaje');
        $created        = $this->now;
        $modified       = $this->now;
        $status         = 0;

        $array_message  = array(
            'name'          => $nombre,
            'email'         => $email,
            'subject'       => $asunto,
            'message'       => $mensaje,
            'date_created'  => $created,
            'date_modified' => $modified,
            'status'        => $status
        );

        $return = $this->web_model->add_message($array_message);
        if($return != "" ):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function comment_report(){
        $id = $this->input->post('id');
        $array = array(
            'report' => 1
        );
        $return = $this->web_model->report_comment($id, $array);
        if($return != ""):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function add_report()
    {
        /**
            Estados var status
            2 = respondido
            1 = nuevo / sin leer
            0 = eliminado
        */

        $id_notion  = $this->input->post('id_reportar');
        $nombre         = $this->input->post('inputNombre');
        $email          = $this->input->post('inputEmail');
        $asunto         = $this->input->post('selectAsunto');
        $mensaje        = $this->input->post('inputMensaje');
        $created        = $this->now;
        $status         = 0;

        $array_message  = array(
            'id_notion' => $id_notion,
            'name'          => $nombre,
            'email'         => $email,
            'subject'       => $asunto,
            'message'       => $mensaje,
            'date_created'  => $created,
            'status'        => $status
        );

        $return = $this->web_model->add_report($array_message);
        if($return != "" ):
            echo "1";
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

}
