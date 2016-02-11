<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//llamamos a la función data_users la cuál nos
	//entrega un array con los usuarios
	public function index()
	{
		
		//llamamos a otro modulo, la secuencia es modulo/controlador/método
		$data['users'] =  Modules::run('login/index/data_users'); 
		$this->load->view('home',$data);
			
	}
	
	//llamamos a una función que tiene un parámetro
	public function hola()
	{
		
		$data['saludo'] = Modules::run('login/index/saludo','saludo');
		$this->load->view('saludo',$data);
		
	}
	
}
