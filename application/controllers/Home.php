<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    var $template = 'templates/main';
    function __construct() {
        parent::__construct();
        //$this->load->helper(array('form', 'url'));
        //$this->load->library(['form_validation','session']);
        //$this->load->library("pagination");
        $this->load->model('Hotels_model', 'hotel');
        $this->load->model('Transportation_model', 'transportation');
        $this->load->model('Servicesubscription_model', 'DService');
        $this->load->model('Region', 'region');
    }

    public function index()
    {
        $service_hotels = $this->DService->get_all_hotel();

        // Fetch order items for each order
        /*foreach ($recommends as $recommend) {
            $recommend->price = $this->hotel->get_per_room_price($recommend->id);
        }*/

        $transportations = $this->transportation->get_all_compneis();
        $data['regions'] = $this->region->get_my_regions();
        /*foreach ($transportations as $transportation) {
            $fees = $this->db->get_where('transportation_fee', ['transportation_id' => $transportation->transportation_id,'from_city_id' => $transportation->from_city_id,'to_city_id' => $transportation->to_city_id, ])->row();
            $transportation->fare_amount = $fees->fare_amount;
        }*/
        $data['service_hotels'] = $service_hotels;
        $data['transportations'] = $transportations;
        $data['citys'] = $this->hotel->get_city();
        $data['title'] = 'Home';
        $data['main_content'] = 'pages/index';
        $this->load->view('templates/intromain', $data);
    }
    
    public function destination($destination)
    {
        $service_hotels = $this->DService->get_all_hotel_by_destination($destination);

        $transportations = $this->transportation->get_all_compneis();
        /*foreach ($transportations as $transportation) {
            $fees = $this->db->get_where('transportation_fee', ['transportation_id' => $transportation->transportation_id,'from_city_id' => $transportation->from_city_id,'to_city_id' => $transportation->to_city_id, ])->row();
            $transportation->fare_amount = $fees->fare_amount;
        }*/
        
        $data['service_hotels'] = $this->hotel->get_per_hotel_destination($destination);

        $data['destination'] = $destination;
        $data['transportations'] = $transportations;
        $data['citys'] = $this->hotel->get_city();
        $data['title'] = 'Home';
        $data['main_content'] = 'pages/index_destination';
        $this->load->view('templates/intromain', $data);
    }
}
