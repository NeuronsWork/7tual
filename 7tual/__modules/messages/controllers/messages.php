<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Class Medico
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

class Messages extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('messages_model');    // cargando models medico
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
        $this->breadcrumb->add_crumb('Mensajes', '', 'fa fa-cloud', '');
        //$this->breadcrumb->add_crumb('Paises', '', '', '');

        //exporta o consulta un controlador que pertenece a otro modelo
        $data['profile']        = Modules::run('dashboard/name_profile');
        $data['titulo']         = '7tual - Mensajes / Listado';
        $data['admin_css_js']   = $this->config->item('admin_css_js');
        $data['admin_img']      = $this->config->item('admin_css_js');
        $data['list_message']   = $this->messages_model->list_message();
        $this->load->view('index',$data);
    }

    public function send_answer(){
        $id = $this->input->post('id_message');
        $email = $this->input->post('email');
        $area = $this->input->post('select_area');
        $name = $this->input->post('name');
        $answer_message = $this->input->post('answer_message');
        $date_modified = $this->now;
        $data = array(
            'answer_message' => $answer_message,
            'date_modified' => $date_modified,
            'status' => 1
        );
        $mensaje = $this->messages_model->send_answer($id, $data);

        //load url helper
        $this->load->helper('url');
        //load email helper
        $this->load->helper('email');
        //load email library
        $this->load->library('email');

        $content    = '<h2>Hola'.$name.'</h2>';
        $content   .= '<p>Gracias por registrarte en 7tual.com</p>';
        $content   .= '<p>¡Gracias!</p>';
        $content   .= '<p>El equipo de 7Tual</p>';

        if (valid_email($email)){
            $this->email->from($area, '7Tual');
            $this->email->to($email);
            //$this->email->cc('otro@otro-ejemplo.com');
            //$this->email->bcc('ellos@su-ejemplo.com');

            $this->email->subject('Correo de Prueba');
            $this->email->message($content);

            if(!$this->email->send()){
                $this->session->set_flashdata('mensaje', "Email not sent \n".$this->email->print_debugger());
                redirect('messages', 'refresh');
            }
            $this->session->set_flashdata('mensaje', "Email was successfully sent to $email");
            redirect('messages', 'refresh');
        }else{
            $this->session->set_flashdata('mensaje', "Email address ($email) is not correct. Please");
            redirect('messages', 'refresh');
        }

        //$this->email->send();
        //echo $this->email->print_debugger();

        //if($mensaje):
        //    $this->session->set_flashdata('mensaje', 'Se ha enviado correctamente la respuesta al siguiente'.$email);
        //   redirect('messages', 'refresh');
        //endif;
    }

    public function delete($id_country)
    {
        $mensaje    =   $this->messages_model->delete_message($id_country);
        if($mensaje):
            $this->session->set_flashdata('mensaje', 'Se eliminado correctamente');
            redirect('messages', 'refresh');
        endif;
    }

}