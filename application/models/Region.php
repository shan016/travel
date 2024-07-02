<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Region extends CI_Model {

    var $tabel_name = 'region';

    function __construct() {
        parent::__construct();
        $this->load->database();
        //$this->load->helper('url');
    }
    
    //insert transaction data
    public function storeTransaction($data = array()){
        $this->db->insert('ht_booking',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function get_my_regions()
    {
        $this->db->where('region_img IS NOT NULL');
        $this->db->order_by("id", "desc");
        $this->db->limit(12);
        $projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }
    
    public function get_my_booking_count($status)
    {
        $this->db->where('customer_id', $this->session->userdata('userId'));
        $this->db->where('checkin_status',$status);
        $projects = $this->db->get($this->tabel_name)->num_rows();
        return $projects;
    }

}

?>