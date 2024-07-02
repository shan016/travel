<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Servicesubscription_model extends CI_Model {

    var $tabel_name = 'd_service_subscriptions';
    var $tb_rooms = 'ht_rooms';
    var $compneis = 'transportation_compneis';

    function __construct() {
        parent::__construct();
        $this->load->database();
        //$this->load->helper('url');
    }
    
    
    public function get_all_hotel()
    {
        $this->db->select ( 'ID,service_name,img' ); 
        $this->db->where('service_id', 2);
        $this->db->order_by("app_form_no", "asc");
        $projects = $this->db->get($this->tabel_name)->result();
        return $projects;
    }
    
    public function get_all_hotel_by_destination($destination)
    {
        $this->db->select ( 'ID,service_name,img' ); 
        $this->db->where('service_id', 2);
        $this->db->order_by("app_form_no", "asc");
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