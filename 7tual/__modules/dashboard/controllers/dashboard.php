<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Dashboard
 */
class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        if($this->auth->is_logged() == FALSE):
            redirect(base_url('manager'));
        endif;
        if($this->session->userdata('id_profile') == 2):
            redirect(base_url('web'));
        endif;
    }

    public function index()
    {
        //llamamos a otro modulo, la secuencia es modulo/controlador/método
        //$data['users'] =  Modules::run('login/index/data_users');

        // create breadcrumnb
        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Inicio', '', 'fa fa-home', '');
        $this->breadcrumb->add_crumb('Dashboard', site_url('dashboard'), 'fa fa-dashboard', '');
        //$this->breadcrumb->add_crumb('Dashboard', site_url('dashboard'), 'icon-align-justify', '');
        //$this->breadcrumb->add_crumb('Inicio', '', '', 'active');
        $data['user_last_access'] = $this->dashboard_model->user_last_access();
        $data['last_noise'] = $this->dashboard_model->last_noise();
        $data['last_message'] = $this->dashboard_model->last_message();
        $data['last_message_count'] = $this->dashboard_model->last_message_count();
        $data['last_noise_count'] = $this->dashboard_model->last_noise_count();
        $data['count_last_users'] = $this->dashboard_model->count_last_users();
        $data['count_noise_report'] = $this->dashboard_model->count_noise_report();
        $data['count_comment_report'] = $this->dashboard_model->count_comment_report();
        $data['profile'] = $this->name_profile();
        $data['titulo'] = '7Tual - Dashboard';
        $data['admin_css_js'] = $this->config->item('admin_css_js');
        $data['admin_img'] = $this->config->item('admin_css_js');
        $this->load->view('index',$data);
    }

    public function name_profile()
    {
        $id_profile = $this->session->userdata('id_profile');
        $this->db->select('name_profile');
        $this->db->from('manager_profile');
        $this->db->where('id_profile', $id_profile);
        $query = $this->db->get();
        return $query->row_array();
    }

}
