<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transportation_model extends CI_Model {

    var $tabel_name = 'travel_schdual';
    var $tb_rooms = 'ht_rooms';
    var $compneis = 'transportation_compneis';

    function __construct() {
        parent::__construct();
        $this->load->database();
        //$this->load->helper('url');
    }
    
    public function get_count() {
        return $this->db->count_all($this->tabel_name);
    }
    
    /*
        Get all the records from the database
    */
    public function get_records($limit, $start) {
        $this->db->select ( 'ts.*,cf.name_en cityfrom,ct.name_en cityto, tt.transportation_type_name typename, t.transportation_name '); 
        $this->db->from ( 'travel_schdual ts' );
        $this->db->join ( 'city cf', 'cf.id=ts.from_city_id');
        $this->db->join ( 'city ct', 'ct.id=ts.to_city_id');
        $this->db->join ( 'transportation t', 't.transportation_id=ts.transportation_id');
        $this->db->join ( 'transportation_type tt', 'tt.transportation_type_id=t.transportation_type_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    /*
        Get all the records from the database
    */
    public function get_transportation_type()
    {
        $this->db->select ( '*' ); 
        $this->db->from ( 'transportation_type' );
        $projects = $this->db->get()->result();

        return $projects;
    }
    
    public function get_all_compneis()
    {
        $this->db->order_by("transportation_compneis_id", "desc");
        //$this->db->where('status','archive');
        $projects = $this->db->get($this->compneis)->result();
        return $projects;
    }
    
    public function get_all()
    {
        $this->db->select ( 'ts.*,cf.name_en cityfrom,ct.name_en cityto, tt.transportation_type_name typename'); 
        $this->db->from ( 'travel_schdual ts' );
        $this->db->join ( 'city cf', 'cf.id=ts.from_city_id');
        $this->db->join ( 'city ct', 'ct.id=ts.to_city_id');
        $this->db->join ( 'transportation t', 't.transportation_id=ts.transportation_id');
        $this->db->join ( 'transportation_type tt', 'tt.transportation_type_id=t.transportation_type_id');
        /*
        $this->db->join ( 'transportation_station stf', 'stf.transportation_station_id=ts.transportation_station_id_from');
        $this->db->join ( 'transportation_station stt', 'stt.transportation_station_id=ts.transportation_station_id_to');
        $this->db->join ( 'city cf', 'cf.id=stf.city_id');
        $this->db->join ( 'city ct', 'ct.id=stt.city_id');
        $this->db->join ( 'transportation_type tt', 'tt.transportation_type_id=t.transportation_type_id');
        $this->db->join ( 'transportation_fee tf', 'tf.transportation_fee_id=ts.transportation_fee_id');*/

        $projects = $this->db->get()->result();
        /*echo '<pre>';
        print_r($projects);
        die;*/
        //$projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }
    
    public function get_all_by_type($type)
    {
        $this->db->select ( 'ts.schdual_id, s.transportation_seats_id, t.transportation_name, f.fare_amount, tc.trsportation_travel_class_name,tc.trsportation_travel_class_name_ar,s.claas_capacity,ts.depature_time, ts.cheking_time, ts.arrival_time,ts.journey_time, ts.status, ts.depature_date,stf.station_name stationfro , ss.img as simg, stt.station_name stationto, tt.transportation_type_name_ar' ); 
        $this->db->from ( 'transportation_fee f' );
        $this->db->join ( 'trsportation_travel_class tc', 'f.trsportation_travel_class_id=tc.trsportation_travel_class_id');
        $this->db->join ( 'transportation_seats s', 's.trsportation_travel_class_id=tc.trsportation_travel_class_id');
        $this->db->join ( 'transportation t', 't.transportation_id=s.transportation_id');
        $this->db->join ( 'd_service_subscriptions ss', 't.ss_id = ss.ID');
        $this->db->join ( 'city fro', 'fro.id=f.from_city_id');
        $this->db->join ( 'city toc', 'toc.id=f.to_city_id');
        $this->db->join ( 'travel_schdual ts', 'ts.transportation_fee_id=f.transportation_fee_id');
        $this->db->join ( 'transportation_station stf', 'stf.transportation_station_id=ts.transportation_station_id_from');
        $this->db->join ( 'transportation_station stt', 'stt.transportation_station_id=ts.transportation_station_id_to');
        $this->db->join ( 'transportation_type tt', 'tt.transportation_type_id=stt.transportation_type_id');
        $this->db->where('tt.transportation_type_id',$type);
        $projects = $this->db->get()->result();
        /*echo '<pre>';
        print_r($projects);
        die;*/
        //$projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }
    
    public function get_per_id($id)
    {
        $this->db->select ( 'ts.*,cf.name_en cityfrom,ct.name_en cityto, tt.transportation_type_name typename, t.transportation_name '); 
        $this->db->from ( 'travel_schdual ts' );
        $this->db->join ( 'city cf', 'cf.id=ts.from_city_id');
        $this->db->join ( 'city ct', 'ct.id=ts.to_city_id');
        $this->db->join ( 'transportation t', 't.transportation_id=ts.transportation_id');
        $this->db->join ( 'transportation_type tt', 'tt.transportation_type_id=t.transportation_type_id');
        $this->db->where('ts.schdual_id',$id);
        $query = $this->db->get()->row();

        return $query;
    }
    
    public function get_all_archive()
    {
        $this->db->order_by("id", "desc");
        $this->db->where('status','archive');
        $projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }
    
    /*
        Get all the records from the database
    */
    public function get_all_featured()
    {
        $curr_date = date('Y-m-d');
        $this->db->where('is_featured', 1);
        $this->db->where('status','publish');
        //$this->db->order_by("publish_date", "desc");
        //$this->db->where('DATE(publish_date)',$curr_date);
        $this->db->order_by("id", "desc"); 
        $projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }
    
    public function get_all_rooms($id)
    {
        //$this->db->order_by("id", "desc");
        //$this->db->where('status !=','archive');
        $this->db->select ( 'ht_rooms.*,ht_rooms.id as rooms_id,roomtype.id,roomtype.name_ar' ); 
        $this->db->from ( 'ht_rooms' );
        //$this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
        $this->db->join ( 'ht_roomtype roomtype', 'roomtype.id = ht_rooms.type' , 'left' );
        $this->db->where ( 'ht_rooms.hot_id', $id);
        $query = $this->db->get ();
        $projects = $query->result ();
        

        //$this->db->where('hot_id', $id);
        //$projects = $this->db->get($this->tb_rooms)->result();
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
    
    public function get_per_room($id)
    {
        //$this->db->order_by("id", "desc");
        //$this->db->where('status !=','archive');
        $this->db->select ( 'ht_rooms.*,ht_rooms.id as rooms_id,roomtype.id,roomtype.name_ar as type_name,hotels.name_ar,hotels.tel,hotels.address' ); 
        $this->db->from ( 'ht_rooms' );
        //$this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
        $this->db->join ( 'ht_roomtype roomtype', 'roomtype.id = ht_rooms.type' , 'left' );
        $this->db->join ( 'ht_hotels hotels', 'hotels.id = ht_rooms.hot_id' , 'left' );
        $this->db->where ( 'ht_rooms.id', $id);
        $projects = $this->db->get()->row();
        //$query = $this->db->get ();
        //$projects = $query->result ();
        
        
        //$this->db->where('hot_id', $id);
        //$projects = $this->db->get($this->tb_rooms)->result();
        return $projects;
    }
    
    public function get_per_room_images($id)
    {
        //$this->db->order_by("id", "desc");
        //$this->db->where('status !=','archive');
        $this->db->select ( '*' ); 
        $this->db->from ( 'ht_roomimgs' );
        $this->db->where ( 'room_id', $id);
        //$projects = $this->db->get();
        $query = $this->db->get ();
        $projects = $query->result ();
        
        
        //$this->db->where('hot_id', $id);
        //$projects = $this->db->get($this->tb_rooms)->result();
        return $projects;
    }
    
    //insert transaction data
    public function storeTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
    
    public function updatePayment($id,$data) 
    {
        $result = $this->db->where('id',$id)->update('ht_booking',$data);
        return $result;
                 
    }
    

    public function parent_cats($parent_id) {
        $this->db->select('title');
        $this->db->where('id', $parent_id);

        $query = $this->db->get($this->tabel_name)->result();
        return $query;
    }
    
    public function parent_category() {
        $this->db->select('id,title');
        $this->db->where('is_parent', 1);

        $query = $this->db->get('categories')->result();
        return $query;
    }

    public function child_category($id) {
        $this->db->select('id,title');
        $this->db->where('parent_id', $id);

        $query = $this->db->get('categories')->result();
        return $query;
    }

    /*
        Store the record in the database
    */
    public function store()
    {
        if(!empty($this->input->post('publish_date'))){
            $publish_date = date('Y-m-d H:i:s', strtotime($this->input->post('publish_date')));
            if(!empty($this->input->post('noofday'))) {
                $time = strtotime($publish_date);
                $archive_date = date("Y-m-d".' 23:59:59', strtotime("+".$this->input->post('noofday'), $time));
                
            }else {
                $archive_date = date("Y-m-d".' 23:59:59', strtotime($this->input->post('publish_date')));
            }
        }else {
            $publish_date = date('Y-m-d H:i:s');
            $archive_date = date('Y-m-d').' 23:59:59';
        }
        
        if($this->input->post('is_featured') == 1){
            $is_featured = 1;         
        }else {
            $is_featured = 0;
        }
        
        
        $data = [
            'title'   => $this->input->post('title'),
            'slug'        => url_title($this->input->post('title').date('YmdHis'), '-', true),
            'description'  => $this->input->post('description'),
            'status'    => $this->input->post('status') ,
            'is_featured' => $is_featured,
            'source_from'   => $this->input->post('source_from'),
            'source_url'        => $this->input->post('source_url'),
            'target'  => $this->input->post('target'),
            'publish_date'    => $publish_date ,
            'no_of_days'        => $this->input->post('noofday'),
            'archive_date' => $archive_date,
            'cat_id'    => $this->input->post('cat_id'),
            'child_cat_id'    => $this->input->post('child_cat_id')
        ];

        $result = $this->db->insert($this->tabel_name, $data);
        return $result;
    }
    
    public function count_slug($slug) {
        $this->db->select('slug');
        $this->db->where('slug',$slug);

        $query = $this->db->get($this->tabel_name)->num_rows();
        if($query>0){
            $total = $query + 1;
            $slug=$slug.'-'.$total;
        }
        return $slug;
    }
    
    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $category = $this->db->get_where($this->tabel_name, ['id' => $id ])->row();
        return $category;
    }
 
 
    /*
        Update or Modify a record in the database
    */
    public function update($id) 
    {
        if(!empty($this->input->post('publish_date'))){
            $publish_date = date('Y-m-d H:i:s', strtotime($this->input->post('publish_date')));
            if(!empty($this->input->post('noofday'))) {
                $time = strtotime($publish_date);
                $archive_date = date("Y-m-d".' 23:59:59', strtotime("+".$this->input->post('noofday'), $time));
                //echo $publish_date.'<br>'.$archive_date;
                //die;
            }else {
                $archive_date = date("Y-m-d".' 23:59:59', strtotime($this->input->post('publish_date')));
            }
        }else {
            $publish_date = date('Y-m-d H:i:s');
            $archive_date = date('Y-m-d').' 23:59:59';
        }
        
        if($this->input->post('is_featured') == 1){
            $is_featured = 1;         
        }else {
            $is_featured = 0;
        }
        
        $data = [
            'title'   => $this->input->post('title'),
            'slug'        => url_title($this->input->post('title'), '-', true),
            'description'  => $this->input->post('description'),
            'status'    => $this->input->post('status') ,
            'is_featured' => $is_featured,
            'source_from'   => $this->input->post('source_from'),
            'source_url'        => $this->input->post('source_url'),
            'target'  => $this->input->post('target'),
            'publish_date'    => $publish_date ,
            'no_of_days'        => $this->input->post('noofday'),
            'archive_date' => $archive_date,
            'cat_id'    => $this->input->post('cat_id'),
            'child_cat_id'    => $this->input->post('child_cat_id')
            
        ];
 
        $result = $this->db->where('id',$id)->update($this->tabel_name,$data);
        return $result;
                 
    }
 
    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $result = $this->db->delete($this->tabel_name, array('id' => $id));
        return $result;
    }
    
    //----------------------------- Front End ----------------------
    public function get_count_by_mycat($cid) {
        $this->db->where('child_cat_id',$cid);
        $this->db->where('status','publish');
        //$this->db->order_by("publish_date", "desc");
        $this->db->order_by("id", "desc");
        $this->db->from($this->tabel_name);
        $query = $this->db->count_all_results();
        return $query;
    }
    
    public function get_post_count() {
        $curr_date = date('Y-m-d');
        $this->db->from($this->tabel_name);
        $this->db->where('is_featured',0);
        $this->db->where('status','publish');
        //$this->db->where('DATE(publish_date)',$curr_date);
        $this->db->order_by("id", "desc");
        $query = $this->db->count_all_results();
        return $query;
    }
    
    public function get_authors($limit, $start) {
        $curr_date = date('Y-m-d');
        $this->db->limit($limit, $start);
        $this->db->where('is_featured',0);
        $this->db->where('status',"publish");
        //$this->db->where('DATE(publish_date)',$curr_date);
        //$this->db->order_by("publish_date", "desc");
        $this->db->order_by("id", "desc");
        $query = $this->db->get($this->tabel_name);

        return $query->result();
    }
    
    public function get_authors_by($child_cat_id,$limit, $start) {
        $curr_date = date('Y-m-d');
        $this->db->where('child_cat_id', $child_cat_id);
        $this->db->where('status',"publish");
        //$this->db->where('DATE(publish_date)',$curr_date);
        //$this->db->limit($limit, $start);
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->tabel_name);

        return $query->result();
    }
    
    public function get_name($cid) {
        $category_name = $this->db->get_where('categories', ['id' => $cid ])->row();
        return $category_name;
    }
    
    public function updateS($data,$id) 
    {
        if(!empty($data) && !empty($id)){ 
            // Add modified date if not included 
            if(!array_key_exists("modified", $data)){ 
                $data['updated_at'] = date("Y-m-d H:i:s"); 
            } 
             
            // Update member data 
            $update = $this->db->update($this->tabel_name, $data, array('id' => $id)); 
             
            // Return the status 
            return $update?true:false; 
        } 
        return false; 
                 
    }

}

?>