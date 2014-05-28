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
 * Class Layouts
 *
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
        $this->load->view('header_dashboard');
    }

    public function navigation_dashboard()
    {
        $this->load->view('navigation_dashboard');
    }

    public function breadcrumb_dashboard()
    {
        $this->load->view('breadcrumb_dashboard');
    }

}
