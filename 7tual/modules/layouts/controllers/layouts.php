<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Layouts
 */

class Layouts extends MX_Controller
{

    public function head_login()
    {
        $this->load->view('head_login');
    }

    public function footer_login()
    {
        $this->load->view('footer_login');
    }

    public function head_dashboard()
    {
        $this->load->view('head_dashboard');
    }

    public function footer_dashboard()
    {
        $this->load->view('footer_dashboard');
    }

    public function header_dashboard()
    {
        $this->load->view('header_dashboard', $data);
    }

    public function navigation_dashboard()
    {
        $this->load->view('navigation_dashboard');
    }

    public function breadcrumb_dashboard()
    {
        $this->load->view('breadcrumb_dashboard');
    }

    public function head_web()
    {
        $this->load->view('head_web');
    }

    public function foot_web()
    {
        $this->load->view('foot_web');
    }

    public function web_menu(){
        $this->load->view('web_menu');
    }

    public function idea(){
        $this->load->view('idea');
    }

    public function destacado(){
        $this->load->view('destacado');
    }
}
