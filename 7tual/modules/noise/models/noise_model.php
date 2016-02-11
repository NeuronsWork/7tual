<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
    Class Web_model
*/
class Noise_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_category()
    {
        $this->db->select('*');
        $this->db->order_by('name_category', "asc");
        $query = $this->db->get('category');
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

    public function list_events_vip($code_country)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('vip', 1);
        $this->db->where('code_country', $code_country);
        $query = $this->db->get();
        return $query->result();
    }

    function list_noise_c(){
        $this->db->select('*');
        $this->db->order_by('id_notion','desc');
        $query = $this->db->get('notion');
        return $query->result();
    }

    function list_noise($code_country){
        $this->db->select('notion.id_notion, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.likes, notion.date_created, notion.status, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        $this->db->where('notion.code_country', $code_country);
        $this->db->where('notion.status', 1);
        $this->db->where('notion.vip',0);
        $this->db->order_by("notion.id_notion", "desc");
        $this->db->limit(5, 0);
        $query= $this->db->get()->result_array();
        return $query;
    }

    function list_noise_search($code_country){
        $this->db->select('notion.title');
        $this->db->from('notion');
        $this->db->where('notion.code_country', $code_country);
        $this->db->where('notion.status', 1);
        $this->db->where('notion.vip',0);
        $this->db->order_by("notion.id_notion", "desc");
        $this->db->limit(10, 0);
        $query= $this->db->get()->result_array();
        return $query;
    }

    function list_noise_more($ultimo, $code_country){
        $this->db->select('notion.id_notion, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.likes, notion.date_created, notion.status, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        $this->db->where('notion.code_country', $code_country);
        $this->db->where('notion.status', 1);
        $this->db->where('notion.vip',0);
        $this->db->where('notion.id_notion <', $ultimo);
        $this->db->order_by("notion.id_notion", "desc");
        //$this->db->limit(10, 0);
        //$query= $this->db->get()->result_array();
        $query= $this->db->get();
        //return $query->result();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        return FALSE;
    }

    function list_noise_plus($code_country){
        $this->db->select('notion.id_notion, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.likes, notion.date_created, notion.status, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        $this->db->where('notion.code_country', $code_country);
        $this->db->where('notion.status', 1);
        $this->db->where('notion.vip',0);
        $this->db->order_by("notion.likes", "desc");
        $query= $this->db->get()->result_array();
        return $query;
    }

    function list_noise_recients($code_country){
        $this->db->select('notion.id_notion, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.likes, notion.date_created, notion.status, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        $this->db->where('notion.code_country', $code_country);
        $this->db->where('notion.status', 1);
        $this->db->where('notion.vip',0);
        $this->db->order_by("notion.id_notion", "desc");
        $this->db->limit(10);
        $query= $this->db->get()->result_array();
        return $query;
    }

    function list_noise_vip($code_country){
        $this->db->select('notion.id_notion, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.vip, notion.likes, notion.date_created, notion.status, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        $this->db->where('notion.vip', 1);
        $this->db->where('notion.status', 1);
        $this->db->where('notion.code_country', $code_country);
        $this->db->order_by("notion.id_notion", "desc");
        $query= $this->db->get()->result_array();
        return $query;
    }

    public function list_city()
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->order_by("name_city", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function list_city_v1($code)
    {
         $this->db->select('*');
        $this->db->from('city');
        $this->db->where("code_country", $code);
        $this->db->order_by("name_city", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function list_country()
    {
        $this->db->select('code_country, name_country');
        $this->db->from('country');
        $this->db->where('status', 1);
        $this->db->order_by("name_country", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function list_city_login($code_country, $id_city)
    {
        $this->db->select('id_city, name_city');
        $this->db->from('city');
        $this->db->where('code_country', $code_country);
        $this->db->where('id_city', $id_city);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_noise($data)
    {
        $this->db->insert('notion',$data);
        return $this->db->insert_id();
    }

    public function add_relation_lincc($data){
        $this->db->insert('relation_lincc', $data);
        return $this->db->insert_id();
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

    public function list_noise_search_join($code_country, $id_city, $id_category, $other)
    {
        $this->db->select('cy.name_country, ci.name_city, n.id_notion, n.title, n.video, n.likes, n.description, n.slug, n.date_created, c.name_category');
        $this->db->from('notion n');
        $this->db->join('country cy', 'n.code_country = cy.code_country');
        $this->db->join('city ci', 'n.id_city = ci.id_city');
        $this->db->join('category c', 'n.id_category = c.id_category');
        if($code_country!='' ) { $this->db->where('n.code_country', $code_country); }
        if($id_city != '') {
            if($id_city == 'ALL'){
                $this->db->where('n.code_country', $code_country);
            }else{
                $this->db->where('n.id_city', $id_city);
            }
        }
        if($id_category != '') {
            if($id_category == 'ALL'){
                $this->db->where('n.code_country', $code_country);
                $this->db->where('n.id_city', $id_city);
            }else{
                $this->db->where('n.id_category', $id_category);
            }
        }
        $this->db->where('n.status', 1);
        $this->db->where('n.vip', 0);
        if($other != ''){
            if($other == 'r')
            {
                $this->db->order_by("n.date_created", "desc");
            }else{
                $this->db->order_by("n.likes", "desc");
            }
        }
        $query= $this->db->get();
        return $query->result();
    }



    public function list_noise_search_notion_country($code_country, $id_city)  ///????
    {
        $query = $this->db->query("SELECT relation_lincc.id_relation,relation_lincc.id_notion, relation_lincc.code_country, relation_lincc.id_city, relation_lincc.likes, country.name_country, city.name_city, notion.id_notion, notion.title, notion.video, notion.likes, notion.description, notion.slug, notion.date_created, category.name_category FROM relation_lincc join notion on relation_lincc.id_notion = notion.id_notion join country on relation_lincc.code_country = country.code_country join city on relation_lincc.id_city = city.id_city join category on notion.id_category = category.id_category where relation_lincc.code_country='$code_country' and relation_lincc.id_city=$id_city");
        return $query->result();
    }

    public function recovery_id_category($slug)
    {
        $this->db->select('id_category');
        $this->db->from('category');
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_noise_for_category($id_category, $code_country)
    {
        $query = $this->db->query("SELECT relation_lincc.id_relation, notion.likes, notion.id_notion, notion.title, notion.description, notion.slug, notion.video, category.name_category,country.name_country, city.name_city, notion.date_created FROM notion JOIN relation_lincc ON notion.id_notion = relation_lincc.id_notion JOIN country ON relation_lincc.code_country = country.code_country JOIN city ON relation_lincc.id_city = city.id_city JOIN category ON notion.id_category = category.id_category WHERE relation_lincc.code_country = '$code_country' AND notion.id_category = $id_category");
        return $query->result();
    }

    /**
     * VIEW NOISE
     */
    public function recovery_id_noise($slug)
    {
        $this->db->select('id_notion');
        $this->db->from('notion');
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        return $query->result();
    }

    public function view_noise($id){
        $query = $this->db->query("SELECT notion.id_notion, notion.date_created, category.name_category, country.name_country, city.name_city ,notion.title, notion.description, notion.video, notion.likes FROM notion JOIN country ON notion.code_country = country.code_country JOIN city ON notion.id_city=city.id_city JOIN category ON notion.id_category=category.id_category WHERE notion.id_notion = $id");
        return $query->result();
    }

    public function add_apunto($data){
        $this->db->insert('relation_like_notion',$data);
        return $this->db->insert_id();
    }

    public function remove_apunto($id_notion, $id_user){
        $this->db->where('id_user', $id_user);
        $this->db->where('id_notion', $id_notion);
        $this->db->delete('relation_like_notion');
    }

    public function add_like($id_notion){
        $this->db->where('id_notion', $id_notion);
        $this->db->set('likes', 'likes+1', FALSE);
        return $this->db->update('notion');
    }

    public function drop_like($id_notion){
        $this->db->where('id_notion', $id_notion);
        $this->db->set('likes', 'likes-1', FALSE);
        return $this->db->update('notion');
    }

    public function like_usuario($id_user){
        $query = $this->db->query("SELECT relation_like_notion.id_user, relation_like_notion.id_notion, notion.title FROM notion JOIN relation_like_notion ON relation_like_notion.id_notion = notion.id_notion AND relation_like_notion.id_user = $id_user WHERE notion.status=1");
        return $query->result();
    }

    public function notion_favorites($id_user){
        $query = $this->db->query("SELECT relation_like_notion.id_user, relation_like_notion.id_notion, notion.title, notion.title, notion.date_created, notion.likes, country.name_country, notion.description, notion.slug, notion.video, city.name_city, category.name_category FROM notion JOIN country ON country.code_country = notion.code_country JOIN city ON city.id_city = notion.id_city JOIN category ON category.id_category = notion.id_category JOIN relation_like_notion ON relation_like_notion.id_notion = notion.id_notion AND relation_like_notion.id_user = $id_user WHERE notion.status=1");
        return $query->result();
    }

    public function check_like_user($id_notion, $id_user){
        $this->db->select('*');
        $this->db->from('relation_like_notion');
        $this->db->where('id_notion', $id_notion);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->result();
    }

    public function list_comment_notion($id){
        /*$this->db->select('*');
        $this->db->from('comment');
        $this->db->where('id_notion', $id_notion);
        $query = $this->db->get();
        return $query->result();*/

        $this->db->select('comment.id_comment, comment.comment, comment.date_created, user.user');
        $this->db->from('comment');
        $this->db->join('user', 'user.id_user = comment.id_user');
        $this->db->where('comment.id_notion', $id);
        $this->db->where('tipo_comment', 1);
        $this->db->order_by("comment.date_created", "desc");
        $query= $this->db->get()->result_array();
        return $query;
    }

    public function add_comment($data)
    {
        $this->db->insert('comment',$data);
        return $this->db->insert_id();
    }

}
