<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scroll_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}


	public function primera_carga()
	{
		$this->db->order_by('id','desc');
		$query = $this->db->get('users', 6);
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		return FALSE;
	}
	
	public function cargar_mas($ultimo)
	{
		$this->db->where('id <',$ultimo);
		$this->db->order_by('id','desc');
		$query = $this->db->get('users', 4);
		if($query->num_rows()>0)
		{
			return $query->result();
		}	
		return FALSE;	
	}
}
