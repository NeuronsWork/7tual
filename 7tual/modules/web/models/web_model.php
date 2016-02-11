<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    Class Web_model
*/
class Web_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

    public function update_user_sesion($id, $data){
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function login_user($username,$password)
    {
        $this->db->select('*');
        $this->db->where('user',$username);
        $this->db->where('pwd',$password);
        $this->db->where('status',1);
        $this->db->or_where('email',$username);
        $this->db->where('pwd',$password);
        $this->db->where('status',1);
        $query = $this->db->get('user');
        if($query->num_rows() == 1)
        {
            return $query->row();
        }else{
            //$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            //redirect(base_url().'manager','refresh');
            return false;
        }
    }

    public function RegisterUser($data)
    {
        //print_r($data);
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }

    public function verify_key($user, $key_activation, $data)
    {
        $this->db->where('user', $user);
        $this->db->where('activation_key', $key_activation);
        return $this->db->update('user', $data);
    }

    public function list_country()
    {
        $this->db->select('code_country, name_country');
        $this->db->from('country');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_city()
    {
        $this->db->select('id_city, name_city,code_country');
        $this->db->from('city');
        //$this->db->where('code_country', $code_country);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_category()
    {
        $this->db->select('id_category, name_category, slug');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_events($code_country)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('vip', 0);
        $this->db->where('code_country', $code_country);
        $query = $this->db->get();
        return $query->result();
    }

    public function my_account($id){
        /*$this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result();*/

        $this->db->select('user.id_user, user.user, user.name, user.email, user.pwd, country.name_country, user.date_created, user.date_last_access, user.status');
        $this->db->from('user');
        $this->db->join('country', 'user.code_country = country.code_country');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_events_vip($code_country)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('vip', 1);
        $this->db->where('code_country', $code_country);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_message($data)
    {
        $this->db->insert('message_contact',$data);
        return $this->db->insert_id();
    }

    public function add_report($data)
    {
        $this->db->insert('report_notion',$data);
        return $this->db->insert_id();
    }

    public function report_comment($id, $data){
        $this->db->where('id_comment', $id);
        return $this->db->update('comment', $data);
    }

    public function sliders_for_country($code_country){
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->join('relation_slider_country', 'slider.id_slider = relation_slider_country.id_slider');
        $this->db->where('code_country', $code_country);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function recovery_id_event($slug)
    {
        $this->db->select('id_event');
        $this->db->from('event');
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        return $query->result();
    }

    public function view_event($id){
        $this->db->select('e.id_event,c.name_category,e.title,e.description,co.code_country,co.name_country,cy.name_city,e.image_video,e.video,e.date_open,e.date_end,e.date_created,e.likes,e.vip,e.status');
        $this->db->from('event e');
        $this->db->join('category c', 'e.id_category = c.id_category');
        $this->db->join('country co', 'e.code_country = co.code_country');
        $this->db->join('city cy', 'e.id_city = cy.id_city');
        $this->db->where('e.id_event', $id);
        //$this->db->order_by("e.id_event", "desc");
        $query= $this->db->get();
        //return $query;
        return $query->result();
    }

    public function migrate_notion($id){
        $data = array(
           'id_user' => 1
        );
        // MIGRANDO TODAS LAS IDEAS AL USUARIO DE MANAGER DE 7TUAL
        $this->db->where('id_user', $id);
        $this->db->update('notion', $data);
    }

    public function delete_account($id){
        // ELIMINADO USUARIO
        $data = array(
           'id_user' => 1
        );
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function like_usuario($id_user){
        $query = $this->db->query("SELECT relation_like_event.id_user, relation_like_event.id_event, event.title FROM event JOIN relation_like_event ON relation_like_event.id_event = event.id_event AND relation_like_event.id_user = $id_user WHERE event.status=1");
        return $query->result();
    }

    public function check_like_user($id_event, $id_user){
        $this->db->select('*');
        $this->db->from('relation_like_event');
        $this->db->where('id_event', $id_event);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_apunto($data){
        $this->db->insert('relation_like_event',$data);
        return $this->db->insert_id();
    }

    public function remove_apunto($id_event, $id_user){
        $this->db->where('id_user', $id_user);
        $this->db->where('id_event', $id_event);
        $this->db->delete('relation_like_event');
    }

    public function add_like($id_event){
        $this->db->where('id_event', $id_event);
        $this->db->set('likes', 'likes+1', FALSE);
        return $this->db->update('event');
    }

    public function drop_like($id_event){
        $this->db->where('id_event', $id_event);
        $this->db->set('likes', 'likes-1', FALSE);
        return $this->db->update('event');
    }

    public function list_comment_event($id){
        $this->db->select('comment.id_comment, comment.comment, comment.date_created, user.user');
        $this->db->from('comment');
        $this->db->join('user', 'user.id_user = comment.id_user');
        $this->db->where('comment.id_notion', $id);
        $this->db->where('tipo_comment', 2);
        $this->db->order_by("comment.date_created", "desc");
        $query= $this->db->get()->result_array();
        return $query;
    }

}
