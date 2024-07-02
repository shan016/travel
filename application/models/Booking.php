<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends CI_Model {

    var $tabel_name = 'ht_booking';

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
    
    public function get_my_booking()
    {
        $this->db->where('customer_id', $this->session->userdata('userId'));
        $this->db->order_by("id", "desc");
        $this->db->limit(10);
        $projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }
    
    public function get_my_travel()
    {
        $this->db->where('customer_id', $this->session->userdata('userId'));
        $this->db->order_by("booking_id", "desc");
        $this->db->limit(10);
        $projects = $this->db->get('travel_booking')->result();
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
        //$this->db->order_by("id", "desc");
        //$this->db->where('status !=','archive');
        $this->db->select ( 'ht_booking.*' ); 
        $this->db->from ( 'ht_booking' );
        //$this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
        //$this->db->join ( 'ht_roomtype roomtype', 'roomtype.id = ht_rooms.type' , 'left' );
       // $this->db->join ( 'ht_hotels hotels', 'hotels.id = ht_rooms.hot_id' , 'left' );
        $this->db->where ( 'id', $id);
        $projects = $this->db->get()->row();
        //$query = $this->db->get ();
        //$projects = $query->result ();
        
        
        //$this->db->where('hot_id', $id);
        //$projects = $this->db->get($this->tb_rooms)->result();
        return $projects;
    }
    
    public function get_per_travel($id)
    {
        $this->db->where ( 'booking_id', $id);
        $this->db->where('customer_id', $this->session->userdata('userId'));        
        $this->db->order_by("booking_id", "desc");
        $this->db->limit(10);
        $projects = $this->db->get('travel_booking')->row();
        return $projects;
    }
    
    public function get_passengers($id)
    {
        $this->db->where ( 'booking_id', $id);
        //$this->db->where('customer_id', $this->session->userdata('userId'));        
        //$this->db->order_by("booking_id", "desc");
        //$this->db->limit(10);
        $projects = $this->db->get('travel_passengers')->result();
        return $projects;
    }
    
    public function get_schdual($id)
    {
        $this->db->select ( 'ts.*,cf.name_en cityfrom,ct.name_en cityto, tt.transportation_type_name typename, t.transportation_name '); 
        $this->db->from ( 'travel_schdual ts' );
        $this->db->join ( 'city cf', 'cf.id=ts.from_city_id');
        $this->db->join ( 'city ct', 'ct.id=ts.to_city_id');
        $this->db->join ( 'transportation t', 't.transportation_id=ts.transportation_id');
        $this->db->join ( 'transportation_type tt', 'tt.transportation_type_id=t.transportation_type_id');
        $this->db->where('ts.schdual_id',$id);
        $projects = $this->db->get()->row();
        return $projects;
    }

}

?>