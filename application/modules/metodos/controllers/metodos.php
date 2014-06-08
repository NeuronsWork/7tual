<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Class Dashboard
 *
 */

class Metodos extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('metodos_model');
        if($this->auth->is_logged() == FALSE):
            redirect(base_url('login'));
        endif;
    }

    public function index()
    {

        $this->breadcrumb->clear();
        $this->breadcrumb->add_crumb('Dashboard', 'dashboard', 'icon_house_alt', '');
        $this->breadcrumb->add_crumb('Metodos', '', '', '');

        $data['array_metodos'] = $this->metodos_model->list_metodos();
        //$data['array_analisis'] = $this->metodos_model->list_analisis();  
        $data['profile'] = Modules::run('dashboard/dashboard/name_profile');
        $data['titulo'] = 'Dashboard < Metodos';
        $data['base_css_js'] = $this->config->item('base_css_js');
        $this->load->view('index',$data);
    }

    public function form_new_metodo()
    {
        $this->load->view('form_new_metodo');
    }

    public function create_metodo()
    {
        $descripcion = $this->input->post('inputDescripcion');
        $array_metodo = array(
            'descripcion' => $descripcion
        );
        $return = $this->metodos_model->create_metodo($array_metodo);
        if($return != "" ):
            echo $return;
            return true;
        else:
            echo "0";
            return false;
        endif;
    }

    public function consult_metodo()
    {
        $idMetodo = $this->input->post('inputMetodos');
        $result_metodo = $this->metodos_model->consulta_metodo($idMetodo);
        if($result_metodo == 0){
            $array_analisis = $this->metodos_model->list_analisis();
            $group_chk = "";
            foreach ($array_analisis as $item){
                $group_chk .= '<div class="col-lg-3 col-sm-4">';
                    $group_chk .= '<div class="checkbox">';
                        $group_chk .= '<label class="tooltipS" id="'.$item->CODANALISIS.'" data-placement="right" data-original-title="'.$item->DETALLE.'">';
                            $group_chk .= '<input type="checkbox" value="'.$item->CODANALISIS.'">';
                                $group_chk .= $item->CODANALISIS;
                        $group_chk .= '</label>';
                    $group_chk .= '</div>';
                $group_chk .= '</div>';
            }
        }
        echo $group_chk;
    }

}
