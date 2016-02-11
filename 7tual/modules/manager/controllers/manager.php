<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Login
 */
class Manager extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('manager_model');
        /* Obtenemos la fecha actual */
        date_default_timezone_set('UTC');
        $timestamp = now();
        $timezone = 'UM5';
        $daylight_saving = FALSE;

        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m-%d %h:%i:%s";

        $this->now = mdate($datestring, $now);
    }

    public function index()
    {
        //$data['token']  = $this->token();
        $data['token'] = $this->auth->create_token();
        $data['titulo'] = '7Tual - Login de manager';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $this->load->view('index',$data);
    }

    public function validateUser()
    {
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
        {
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');

            //lanzamos mensajes de error si es que los hay
            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }else{
                $username   = $this->input->post('username');
                $password   = md5($this->input->post('password'));
                $check_user = $this->manager_model->login_user($username,$password);
                //print_r($check_user);
                if($check_user == TRUE)
                {
                    $data = array(
                        'is_logued_in'  =>  TRUE,
                        'id_usuario'    =>  $check_user->id_manager,
                        'id_profile'    =>  $check_user->id_profile,
                        'username'      =>  $check_user->name
                    );
                    $this->auth->create_sessions($data);
                    $data0 = array(
                        'date_last_access' => $this->now
                    );
                    $this->manager_model->update_manager_sesion($check_user->id_manager, $data0);
                    echo "ok";
                    return true;
                }
            }
        }else{
            return false;
        }
    }

    public function logout()
    {
        $this->auth->logout('manager');
    }

}
