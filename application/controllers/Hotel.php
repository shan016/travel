<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
class Hotel extends CI_Controller {

    var $template = 'templates/main';

    function __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        //$this->load->helper(array('form', 'url'));
        //$this->load->library(['form_validation','session']);
        $this->load->model('Hotels_model', 'hotel');
        $this->load->model('Booking', 'booking');
        //$this->load->model('adv_banner_model', 'abanner');
        //$this->load->model('pages_model', 'pagehtml');
        $this->load->library("pagination");
        
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
        if(!$this->isUserLoggedIn){
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
    }

    
    public function index() {
        // Search Values
        
        $city = $this->input->get('city');
        $checkout = $this->input->get('checkout');
        $no_adults = $this->input->get('no_adults');
        $no_children = $this->input->get('no_children');
        $no_rooms = $this->input->get('no_rooms');


        // Configuring pagination
        $config = array();
        $config['base_url'] = base_url('hotel');
        $config['total_rows'] = $this->hotel->get_count(); // Call your model method to get the total number of records
        $config['per_page'] = 10; // Number of records to display per page
        $config['uri_segment'] = 2; // The URI segment containing the page number
        
        $config['full_tag_open'] = '<ul class="pagination m-0 p-0">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');
        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number from the URI segment
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['current_page'] = $this->pagination->cur_page;
        $current_count = ($page / $config['per_page']) + 1;
        $data['current_count'] = $current_count;

        
        
        $data["counts"] = $this->hotel->get_count();

        // Retrieve records for the current page        
        $hotels = $this->hotel->get_records($config['per_page'], $page); // Adjust your model method accordingly
        foreach ($hotels as $hotel) {
            $hotel->price = $this->hotel->get_per_room_price($hotel->id);
            $hotel->ameneties = $this->hotel->get_all_ameneties($hotel->id);
        }
        $data['hotel'] = 'Hotel Listing';
        $data['citys'] = $this->hotel->get_city();
        $data['selectcity'] = $city;
        $data['checkout'] = $checkout;
        $data['select_no_adults'] = $no_adults;
        $data['select_no_children'] = $no_children;
        $data['select_no_rooms'] = $no_rooms;
        $data['models'] = $hotels;
        $data['title'] = 'Hotels';
        $data['main_content'] = 'hotel/index';
        $this->load->view('templates/main', $data);
    }

    public function lists($id) {
        // Search Values
        $city = $this->input->get('city');
        $checkout = $this->input->get('checkout');
        $no_adults = $this->input->get('no_adults');
        $no_children = $this->input->get('no_children');
        $no_rooms = $this->input->get('no_rooms');

        $data['citys'] = $this->hotel->get_city();
        $data['selectcity'] = $city;
        $data['checkout'] = $checkout;
        $data['select_no_adults'] = $no_adults;
        $data['select_no_children'] = $no_children;
        $data['select_no_rooms'] = $no_rooms;
        
        $data['hotel'] = $this->hotel->get($id);
        $data['models'] = $this->hotel->get_all_rooms($id);
        $data['hotel_images'] = $this->hotel->get_all_hotel_images($id);
        $data['title'] = 'Hotel Listing';
        $data['main_content'] = 'hotel/list';
        $this->load->view('templates/main', $data);
    }
    
    public function details($id) {
        $city = $this->input->get('city');
        $checkout = $this->input->get('checkout');
        $no_adults = $this->input->get('no_adults');
        $no_children = $this->input->get('no_children');
        $no_rooms = $this->input->get('no_rooms');
        
        $checkout = explode(' to ',$checkout);
        $date1 = new DateTime($checkout[0]);
        $date2 = new DateTime($checkout[1]);

        $interval = $date1->diff($date2);
        $days = $interval->days;

        if($days > 1) {
           $night =  $days - 1;
            $data['days'] = $days.' Days \ '.$night.' Nights'; 
        }else {
            $night = 1;
           $data['days'] = $days.' Day \ '.$night.' Night';  
        }
        
        

        $data['selectcity'] = $city;
        $data['datecheckin'] = $checkout[0];
        $data['datecheckout'] = $checkout[1];
        $data['checkout'] = $this->input->get('checkout');
        $data['select_no_adults'] = $no_adults;
        $data['select_no_children'] = $no_children;
        $data['select_no_rooms'] = $no_rooms;
        
         $data['model'] = $this->hotel->get_per_room($id);

         $data['room_images'] = $this->hotel->get_per_room_images($id);
        //print_r($data);
        //die;
        $data['main_content'] = 'hotel/show';
        $this->load->view('templates/main', $data);
    }
    
    public function detailspayment($id) {
        
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $city = $this->input->post('city');
        $checkout = $this->input->post('checkout');

        $no_adults = $this->input->post('no_adults');
        $no_children = $this->input->post('no_children');
        $no_rooms = $this->input->post('no_rooms');
        

        $checkout = explode(' to ',$checkout);
        $date1 = new DateTime($checkout[0]);
        $date2 = new DateTime($checkout[1]);

        $interval = $date1->diff($date2);
        $days = $interval->days;

        if($days > 1) {
           $night =  $days - 1;
            $data['days'] = $days.' Days \ '.$night.' Nights'; 
        }else {
           $data['days'] = $days.' Day \ 1 Night';  
        }
        
        

        $data['selectcity'] = $city;
        $data['datecheckin'] = $checkout[0];
        $data['datecheckout'] = $checkout[1];
        $data['checkout'] = $this->input->post('checkout');
        $data['select_no_adults'] = $no_adults;
        $data['select_no_children'] = $no_children;
        $data['select_no_rooms'] = $no_rooms;
        $data['full_name'] = $this->input->post('full_name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        
         $data['model'] = $this->hotel->get_per_room($id);
         //print_r($data['model']);die();

         $data['room_images'] = $this->hotel->get_per_room_images($id);
        //print_r($data);
        //die;
        $data['title'] = 'Hotel Reservation Summary';
        $data['main_content'] = 'hotel/confirm';
        $this->load->view('templates/main', $data);
    }
    
    /*public function confirm() {
        
        $date = explode('-',$this->input->post('book_date'));
        $data['sdate'] = $date[0];
        $data['edate'] = $date[1];
        
        $data['adult'] = $this->input->post('adult');
        $data['children'] = $this->input->post('children');
        $id = $this->input->post('roomid');
        $data['model'] = $this->hotel->get_per_room($id);
        $data['main_content'] = 'pages/booking';
        $this->load->view('templates/main', $data);
    }*/
    
    public function store() {
        $enumber = $this->input->post('enumber');
        $paymenttype = $this->input->post('payment');
        if($paymenttype == 'ewallet') {
            $checkin_status = 'Completed';
            $payment_status = 1;
        }else if($paymenttype == 'paypal') {
            $checkin_status = 'Completed';
            $payment_status = 1;
        }else {
            $checkin_status = 'Pending';
            $payment_status = 0;
        }

        $id = $this->input->post('roomid');
        $selectcity = $this->input->post('city');
        $model = $this->hotel->get_per_room($id);
        
        $data['room_id'] = $id;
        $data['checkin'] = date('Y-m-d', strtotime($this->input->post('checkin')));
        $data['checkout'] = date('Y-m-d', strtotime($this->input->post('checkout')));
        $data['customer_id'] = $this->session->userdata('userId');
        $data['guest_name'] = $this->input->post('full_name');
        $data['guest_tel'] = $this->input->post('phone');
        $data['guest_email'] = $this->input->post('email');
        $data['hot_id'] = $model->hot_id;
        $data['amount'] = $model->price;
        $data['payment_status'] = $payment_status;
        $data['checkin_status'] = $checkin_status;
        $data['date_booking'] = date('Y-m-d');
        $data['confirmed_on'] = date('Y-m-d');
        $data['booking_ref'] = date('Ymdhms');
        $data['payment_type'] = $paymenttype;
        
        if(!empty($enumber) && $paymenttype == 'ewallet') {
            $service = 'operation/confirm_apps_payment';

            // Replace 'your_bearer_token' with your actual Bearer token
            $token = $this->login();
            $bearerToken = $token['token'];

            $url = 'https://daleelcom.net/api/' . $service; // Replace with your API endpoint URL


            $apidata = array('otp' => $this->input->post('otp'));
            //$payload = json_encode($apidata);

            $header = array(
                'Authorization: Bearer ' . $bearerToken,
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $apidata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            //echo $result;
            curl_close($ch);
            $transaction = json_decode($result, true);

            //header('Content-Type: application/json');

            $status = json_encode($transaction['status']);
            $message = $transaction['message'];
            if($status == 'true') {
                $bookingid = $this->booking->storeTransaction($data);
                //$bookingid = $this->passenger->storeTransactiontable($data, 'travel_booking');
                $url = base_url().'hotel/view/'.$bookingid;
                
            }else {
                $this->session->set_flashdata('alert', $message);
                $this->session->set_flashdata('alert_type', 'danger');
                
                $url = base_url('hotel/details/'.$model->rooms_id).'?city='.$selectcity.'&checkout='.$this->input->post('checkin').' to '.$this->input->post('checkout').'&no_adults='.$this->input->post('no_adults').'&no_children='.$this->input->post('no_children').'&no_rooms='.$this->input->post('no_rooms');
            }
            redirect($url);
        }else {
            $bookingid = $this->booking->storeTransaction($data);
            $url = base_url().'hotel/view/'.$bookingid;
        }
        redirect($url);
    }
    
    function viewotp($enumber){
        $this->load->library('session');
        $storedData = $this->session->userdata('postData');
        $amount = $storedData['amount'];
        $amount = 1;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $service = 'operation/confirm_apps_payment';

            // Replace 'your_bearer_token' with your actual Bearer token
            $token = $this->login();
            $bearerToken = $token['token'];

            $url = 'https://daleelcom.net/api/' . $service; // Replace with your API endpoint URL


            $data = array('otp' => $this->input->post('otp'));
            $payload = json_encode($data);

            $header = array(
                'Authorization: Bearer ' . $bearerToken,
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            //echo $result;
            curl_close($ch);
            $transaction = json_decode($result, true);

            //header('Content-Type: application/json');

            $data['status'] = json_encode($transaction['status']);
            $data['message'] = $transaction['message'];

            if($data['status'] == 'true') {
                $bookingid = $this->booking->storeTransaction($storedData);
                unset($_SESSION['postData']);
                $url = base_url().'hotel/view/'.$bookingid;
                redirect($url);
            }
        } else {
            $service = 'operation/apps_payment';

            // Replace 'your_bearer_token' with your actual Bearer token
            $token = $this->login();
            $bearerToken = $token['token'];

            $url = 'https://daleelcom.net/api/' . $service; // Replace with your API endpoint URL


            $data = array('clwallet' => $enumber, 'amount' => $amount, 'currid' => '1');
            $payload = json_encode($data);

            $header = array(
                'Authorization: Bearer ' . $bearerToken,
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            //echo $result;
            curl_close($ch);
            $transaction = json_decode($result, true);
            $data['status'] = $transaction['status'];
            $data['message'] = $transaction['message'];
        }

        $data['title'] = 'Hotel Reservation Summary';
        $data['main_content'] = 'hotel/confirmOTP';
        $this->load->view('templates/main', $data);
    }
    
    function view($bookingid){

        $booking = $this->hotel->get_per_booking($bookingid);
        
        $data['guest_email'] = $booking->guest_email;
        $data['checkin'] = $booking->checkin;
        $data['checkout'] = $booking->checkout;
        $data['guest_name'] = $booking->guest_name;
        $data['guest_tel'] = $booking->guest_tel;
        $data['guest_email'] = $booking->guest_email;
        $data['amount'] = $booking->amount;
        $data['booking_ref'] = $booking->booking_ref;
        $data['date_booking'] =$booking->date_booking;
        $data['payment_type'] = $booking->payment_type;
        $data['bookingid'] = $bookingid;
        
        $data['main_content'] = 'hotel/view';
        $this->load->view('templates/main', $data);
    }
    
    function buy($bookingid){
        //Set variables for paypal form
        $returnURL = base_url().'paypal/success'; //payment success url
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'paypal/ipn'; //ipn url
        //get particular product data
        $booking = $this->hotel->get_per_booking($bookingid);
        
        $id = $booking->id;
        $product = $this->hotel->get_per_room($id);
        $userID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; //current user id
        $logo = base_url().'assets/images/logo.png';

        
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product->room_no);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $id);
        $this->paypal_lib->add_field('amount',  0.01);        
        $this->paypal_lib->image($logo);
        
        $this->paypal_lib->paypal_auto_form();
    }
    
    public function ewallet($bookingid,$enumber)
    {

        $booking = $this->hotel->get_per_booking($bookingid);

        $service = 'operation/apps_payment';

        // Replace 'your_bearer_token' with your actual Bearer token
        $token = $this->login();
        $bearerToken = $token['token'];

        $url = 'https://daleelcom.net/api/'.$service; // Replace with your API endpoint URL


        $data = array('clwallet' => $enumber,'amount' => '100000000000','currid' => '1');
        $payload = json_encode($data);

        $header = array(
            'Authorization: Bearer ' . $bearerToken,
            //'Content-Type: application/json',
            //'Content-Length: ' . strlen($payload)
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        //echo $result;
        curl_close($ch);
        $transaction = json_decode($result, true);
        
        header('Content-Type: application/json');

        echo json_encode($transaction['status']);
    }
    
    function login(){
        $url = "https://daleelcom.net/api/auth/login";
        $data = array('username' => 'dctravel', 'password' => 'dcom@24');


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        //echo $result;
        curl_close($ch);
        $transaction = json_decode($result, true);
        
        //header('Content-Type: application/json');

        return $transaction;
    }
    
    public function pdf($bookingid)
    {
        $booking = $this->hotel->get_per_booking($bookingid);
        
        $data['guest_email'] = $booking->guest_email;
        $data['checkin'] = $booking->checkin;
        $data['checkout'] = $booking->checkout;
        $data['guest_name'] = $booking->guest_name;
        $data['guest_tel'] = $booking->guest_tel;
        $data['guest_email'] = $booking->guest_email;
        $data['amount'] = $booking->amount;
        $data['booking_ref'] = $booking->booking_ref;
        $data['date_booking'] =$booking->date_booking;
        $data['payment_type'] = $booking->payment_type;
        
        $dompdf = new Dompdf();
        //$data['logo'] = '<img src="https://easy.daleelcom.news/templates/geo/assets/img/logo.png">';
        
        $data['logo'] = '<img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(https://easy.daleelcom.news/templates/geo/assets/img/logo.png)); ?>" alt="Image">';
        $data['current_date'] = date('Y-m-d'); // Get the current date

        // Load HTML template
        $html = $this->load->view('hotel/pdf', $data, true);
        //$this->load->view('layouts/footer')
        //$html = file_get_contents(APPPATH . 'hotel/pdf');
        //$html = $this->output->get_output();

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output the PDF
        $dompdf->stream($booking->booking_ref.'.pdf', array('Attachment' => 0));
        
    }
    

}