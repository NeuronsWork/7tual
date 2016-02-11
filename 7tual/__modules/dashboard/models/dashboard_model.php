<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Class Login_model
 *
 */
class Dashboard_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * [name_profile description]
     * @param  [type] $id_profile [description]
     * @return [type]             [description]
     */
    public function name_profile($id_profile)
    {
        $this->db->select('name');
        $this->db->from('manager_profile');
        $this->db->where('id_profile', $id_profile);
        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * LISTADO DE ULTIMOS USUARIOS QUE
     * HAN INGRESADO
     */
    public function user_last_access(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(5);
        $this->db->order_by("date_last_access", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * LISTADO DE LAS ULTIMAS IDEAS INGRESADAS
     * SIN APROBAR
     */
    public function last_noise(){
        $this->db->select('notion.id_notion, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.likes, notion.date_created, notion.status, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        $this->db->where('notion.status', 0);
        $this->db->order_by("notion.id_notion", "desc");
        $query= $this->db->get()->result_array();
        return $query;
    }

    public function last_noise_count(){
        $this->db->select('notion.id_notion, notion.id_user, notion.title, notion.slug, notion.description, notion.video, notion.likes, notion.date_created, notion.status, category.name_category, country.name_country, city.name_city');
        $this->db->from('notion');
        $this->db->join('category', 'notion.id_category = category.id_category');
        $this->db->join('city', 'notion.id_city = city.id_city');
        $this->db->join('country', 'notion.code_country = country.code_country');
        $this->db->where('notion.status', 0);
        $this->db->order_by("notion.id_notion", "desc");
        return $this->db->count_all_results();
        //return $query;
    }

    public function last_message(){
        $this->db->select('*');
        $this->db->where('status', 0);
        $this->db->order_by('date_created', "desc");
        $query = $this->db->get('message_contact');
        return $query->result();
    }

    public function last_message_count(){
        $this->db->select('*');
        $this->db->where('status', 0);
        $this->db->order_by('date_created', "desc");
        $this->db->get('message_contact');
        return $this->db->count_all_results();
        //return $query->result();
    }

    public function count_last_users(){
        $query = $this->db->query("SELECT id_user, user, date_created FROM user WHERE date_created <= CURDATE() AND date_created >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)");
        return $this->db->count_all_results();
    }

    public function count_noise_report(){
        return $this->db->count_all('report_notion');
    }

    public function count_comment_report(){
        $this->db->select('*');
        $this->db->where('report', 1);
        $this->db->get('comment');
        return $this->db->count_all_results();
    }

}
