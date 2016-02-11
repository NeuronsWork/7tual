<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scroll extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('scroll_model');
    }

    public function index()
    {
        $data['respuesta'] = $this->scroll_model->primera_carga();
        $this->load->view('scroll', $data);
    }

    public function loadMore()
    {
        sleep(3);
        if($this->input->is_ajax_request() && $this->input->post("lastId"))
        {
            $nuevos_datos = $this->scroll_model->cargar_mas((int)$this->input->post("lastId"));
            if($nuevos_datos !== FALSE)
            {
                echo json_encode(array("res" => "success", "users" => $nuevos_datos));
            }
            else
            {
                echo json_encode(array("res" => "empty"));
            }
        }
    }
}