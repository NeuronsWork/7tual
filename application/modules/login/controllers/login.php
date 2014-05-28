<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 *
 __
/\ \
\ \ \____  _ __    __     __  __    ___     ____     _____      __
 \ \ '__`\/\`'__\/'__`\  /\ \/\ \  / __`\  /',__\   /\ '__`\  /'__`\
  \ \ \L\ \ \ \//\ \L\.\_\ \ \_/ |/\ \L\ \/\__, `\__\ \ \L\ \/\  __/
   \ \_,__/\ \_\\ \__/.\_\\ \___/ \ \____/\/\____/\_\\ \ ,__/\ \____\
    \/___/  \/_/ \/__/\/_/ \/__/   \/___/  \/___/\/_/ \ \ \/  \/____/
                                                       \ \_\
                                                        \/_/
 *
 *
 * Class Login
 *
 */
class Login extends MX_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('login_model');
	}
	
	public function index()
	{
        //$data['token']  = $this->token();
        $data['token'] = $this->auth->create_token();
        $data['titulo'] = 'ENDOLAB - Login de usuario';
        $data['base_css_js'] = $this->config->item('base_css_js');
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
                $check_user = $this->login_model->login_user($username,$password);
                if($check_user == TRUE)
                {
                    $data = array(
                        'is_logued_in'  =>  TRUE,
                        'id_usuario'    =>  $check_user->id_user,
                        'id_profile'    =>  $check_user->id_profile,
                        'username'      =>  $check_user->username
                    );
                    $this->auth->create_sessions($data);
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
        $this->auth->logout();
    }
	
}
