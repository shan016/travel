<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Passenger extends CI_Model {

    var $tabel_name = 'travel_passengers';
    var $travel_booking = 'travel_booking';
    function __construct() {
        parent::__construct();
        $this->load->database();
        //$this->load->helper('url');
    }
    
    //insert transaction data
    public function storeTransaction($data = array()){
        $this->db->insert($this->tabel_name,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    //insert transaction data
    public function storeTransactiontable($data = array(), $tabel_name){
        $this->db->insert($tabel_name,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function bulk_insert($data) {
        // Insert data into the database table
        $this->db->insert_batch($this->tabel_name, $data);

        // Redirect or show success message
    }
    
    public function get_my_booking()
    {
        $this->db->where('customer_id', $this->session->userdata('userId'));
        $this->db->order_by("id", "desc");
        $this->db->limit(10);
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
    
    public function get_per_booking($id)
    {
        $this->db->where('client_id', $this->session->userdata('userId'));
        $this->db->where('booking_id',$id);
        $projects = $this->db->get($this->travel_booking)->row();        
        return $projects;
    }
    
    public function getPassengers($id)
    {
        $this->db->where('booking_id', $id);
        $projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }

}

?>