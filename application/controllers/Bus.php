<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;

class Bus extends CI_Controller {

    var $template = 'templates/main';

    function __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        //$this->load->helper(array('form', 'url'));
        //$this->load->library(['form_validation','session']);
        $this->load->model('Transportation_model', 'transportation');
        $this->load->model('Booking', 'booking');
        $this->load->model('Passenger', 'passenger');
        $this->load->model('User', 'user');
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
        $goingfrom = $this->input->get('goingfrom');
        $goingto = $this->input->get('goingto');
        $departure = $this->input->get('departure');
        $datereturn = $this->input->get('datereturn');
        $occupant = $this->input->get('occupant');
        
        // Configuring pagination
        $config = array();
        $config['base_url'] = base_url('bus');
        $config['total_rows'] = $this->transportation->get_count(); // Call your model method to get the total number of records
        $config['per_page'] = 10; // Number of records to display per page
        $config['uri_segment'] = 2; // The URI segment containing the page number
        
        $config['full_tag_open'] = '<ul class="pagination mb-0">';
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

        
        
        $data["counts"] = $this->transportation->get_count();

        // Retrieve records for the current page
        $models = $this->transportation->get_records($config['per_page'], $page); // Adjust your model method accordingly
        
        foreach ($models as $model) {
            $fees = $this->db->get_where('transportation_fee', ['transportation_id' => $model->transportation_id,'from_city_id' => $model->from_city_id,'to_city_id' => $model->to_city_id, ])->row();
            $model->fare_amount = $fees->fare_amount;
            $seats = $this->db->get_where('transportation_seats', ['transportation_id' => $model->transportation_id])->row();
            $model->available_seat = $seats->claas_capacity;
            $travel_class = $this->db->get_where('trsportation_travel_class', ['trsportation_travel_class_id' => $seats->trsportation_travel_class_id])->row();
            $model->typeclass = $travel_class->trsportation_travel_class_name;
        }
        $data['models'] = $models;
        $data['types'] = $this->transportation->get_transportation_type();
        $data['goingfrom'] = $this->input->get('goingfrom');
        $data['goingto'] = $this->input->get('goingto');
        $data['departure'] = $this->input->get('departure');
        $data['datereturn'] = $this->input->get('datereturn');
        $data['occupant'] = $occupant;
        $data['main_content'] = 'bus/index';
        $this->load->view('templates/main', $data);
    }

    
    public function details($id) {
        //echo '<pre>';
         $data['model'] = $this->transportation->get_per_id($id);
        //print_r($data);
        //die;
        $data['main_content'] = 'bus/ticket_details';
        $this->load->view('templates/main', $data);
    }
    
    public function detailspayment($id) {

        if(!empty($this->input->get('occupant')) || $this->input->get('occupant') != 0) {
            if($this->input->get('occupant') <= 10) {
                $occupant = $this->input->get('occupant');
            }else {
                $occupant = 1;
            }
        }else {
            $occupant = 1;
        }
        $data['goingfrom'] = $this->input->get('goingfrom');
        $data['goingto'] = $this->input->get('goingto');
        $data['departure'] = $this->input->get('departure');
        $data['datereturn'] = $this->input->get('datereturn');
        $data['occupant'] = $occupant;
        

        $data['full_name'] = $this->input->post('full_name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        
        $model = $this->transportation->get_per_id($id);
        //foreach ($models as $model) {
            $fees = $this->db->get_where('transportation_fee', ['transportation_id' => $model->transportation_id,'from_city_id' => $model->from_city_id,'to_city_id' => $model->to_city_id, ])->row();
            $model->fare_amount = $fees->fare_amount;
            $seats = $this->db->get_where('transportation_seats', ['transportation_id' => $model->transportation_id])->row();
            $model->available_seat = $seats->claas_capacity;
            $travel_class = $this->db->get_where('trsportation_travel_class', ['trsportation_travel_class_id' => $seats->trsportation_travel_class_id])->row();
            $model->typeclass = $travel_class->trsportation_travel_class_name;
        //}
         
        $datetime1 = new DateTime($model->depature_time);
        $datetime2 = new DateTime($model->arrival_time);
        if ($datetime1 !== false && $datetime2 !== false) {
            $interval = $datetime1->diff($datetime2);
            $data['hours'] = $interval->h.'H';
            $data['minutes'] = $interval->i.'M';
        }else {
            $data['hours'] = '';
            $data['minutes'] = '';
        }
        $data['model'] = $model;
         //print_r($data['model']);die();

        $data['main_content'] = 'bus/confirm';
        $this->load->view('templates/main', $data);
    }
    
    /*public function confirm() {
        
        $date = explode('-',$this->input->post('book_date'));
        $data['sdate'] = $date[0];
        $data['edate'] = $date[1];
        
        $data['adult'] = $this->input->post('adult');
        $data['children'] = $this->input->post('children');
        $data['name'] = $this->input->post('name');
        $data['amount'] = $this->input->post('amount');
        $data['id'] = $this->input->post('roomid');
        $data['img'] = $this->input->post('img');
        $data['main_content'] = 'pages/ticket_booking';
        $this->load->view('templates/main', $data);
    }*/
    
    public function store() {

        $id = $this->input->post('id');
        $fullname = $this->input->post('fullname');
        $telephone = $this->input->post('telephone');
        $address = $this->input->post('address');
        $passport_number = $this->input->post('passport_number');
        $fare_amount = $this->input->post('fare_amount');        
        $goingfrom = $this->input->post('goingfrom');
        $goingto = $this->input->post('goingto');
        $departure = $this->input->post('departure');
        $datereturn = $this->input->post('datereturn');
        $occupant = $this->input->post('occupant');
        
        $paymenttype = $this->input->post('payment');
        if($paymenttype == 'ewallet') {
            $checkin_status = 'paid';
            $payment_status = 1;
        }else if($paymenttype == 'paypal') {
            $checkin_status = 'paid';
            $payment_status = 1;
        }else {
            $checkin_status = 'pending';
            $payment_status = 0;
        }
        
        
        $data['customer_id'] = $this->session->userdata('userId');
        $data['schdual_id'] = $id;
        $data['travel_number'] = date('Ymdhms');
        $data['total_amount'] = $fare_amount;
        $data['passengers'] = $occupant;
        $data['class_id'] = 0;
        $data['date_booking'] = date('Y-m-d');
        $data['booking_status'] = $checkin_status;
        $data['numbers_of_seats'] = $occupant;
        $data['payment_mode'] = $paymenttype;
        $data['account_id'] = 1;
        $data['ss_id'] = 1;
        $data['trx_id'] = 1;
        
        if(!empty($this->input->post('otp'))) {
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
                $bookingid = $this->passenger->storeTransactiontable($data, 'travel_booking');
                unset($_SESSION['postData']);
                $url = base_url().'bus/view/'.$bookingid;
                
            }else {
                $this->session->set_flashdata('alert', $transaction['message']);
                $this->session->set_flashdata('alert_type', 'danger');
                
                $url = base_url('bus/detailspayment/'.$id).'?goingfrom='.$goingfrom.'&goingto='.$goingto.'&departure='.$departure.'&datereturn='.$datereturn.'&occupant='.$occupant;
                //$url = base_url().'bus/view/'.$bookingid;
            }
            redirect($url);
        }else {
            $bookingid = $this->passenger->storeTransactiontable($data, 'travel_booking');
        }
        
        if (!empty($bookingid)) {
            $data = array();
            foreach ($fullname as $key => $val) {
                $data[] = array(
                    'booking_id' => $bookingid,
                    'fullname' => $val,
                    'telephone' => $telephone[$key],
                    'address' => $address[$key],
                    'passport_number' => $passport_number[$key],
                );
            }
            $this->passenger->bulk_insert($data);
        }


        redirect(base_url().'bus/view/'.$bookingid);
        
    }
    
    function view($bookingid){
        $booking = $this->passenger->get_per_booking($bookingid);
        $user = $this->user->userInfo($booking->client_id);
        $data['passengerlists'] = $this->passenger->getPassengers($bookingid);
        
        $data['travel_number'] = $booking->travel_number;
        $data['numbers_of_seats'] = $booking->numbers_of_seats;
        $data['guest_name'] = $user->fullname;
        $data['guest_tel'] = $user->phone;
        $data['guest_email'] = $user->email;
        $data['amount'] = $booking->total_amount;
        $data['date_booking'] =$booking->date_booking;
        $data['payment_type'] = $booking->payment_mode;
        $data['passengers'] = $booking->passengers;
        
        $data['main_content'] = 'pages/booking_page_success_travel';
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
    
    
    public function sendotp() {

        $service = 'operation/apps_payment';

        // Replace 'your_bearer_token' with your actual Bearer token
        $token = $this->login();
        $bearerToken = $token['token'];

        $url = 'https://daleelcom.net/api/'.$service; // Replace with your API endpoint URL


        $data = array('clwallet' => $this->input->post('enumber'),'amount' => 1,'currid' => '1');
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
        $status = json_encode($transaction['status']);
        $message = $transaction['message'];
        
        if($status == 'true') {
            $response = array('status' => 'success', 'message' => $message);
        }else {
            $response = array('status' => 'fail', 'message' => $message); 
        }

        echo json_encode($response);
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
        $data['model'] = $this->booking->get_per_travel($bookingid);

        $data['passengers'] = $this->booking->get_passengers($bookingid);
        $data['schdual'] = $this->booking->get_schdual($data['model']->schdual_id);
        
        $seats = $this->db->get_where('transportation_seats', ['transportation_id' => $data['schdual']->transportation_id])->row();
        //$model->available_seat = $seats->claas_capacity;
        $travel_class = $this->db->get_where('trsportation_travel_class', ['trsportation_travel_class_id' => $seats->trsportation_travel_class_id])->row();
        $data['typeclass'] = $travel_class->trsportation_travel_class_name;
        
        $datetime1 = new DateTime($data['schdual']->depature_time);
        $datetime2 = new DateTime($data['schdual']->arrival_time);
        if ($datetime1 !== false && $datetime2 !== false) {
            $interval = $datetime1->diff($datetime2);
            $data['hours'] = $interval->h.'H';
            $data['minutes'] = $interval->i.'M';
        }else {
            $data['hours'] = '';
            $data['minutes'] = '';
        }

        $dompdf = new Dompdf();
        //$data['logo'] = '<img src="https://easy.daleelcom.news/templates/geo/assets/img/logo.png">';
        
        $data['logo'] = '<img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(https://easy.daleelcom.news/templates/geo/assets/img/logo.png)); ?>" alt="Image">';
        $data['current_date'] = date('Y-m-d'); // Get the current date

        // Load HTML template
        $html = $this->load->view('bus/pdf', $data, true);

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        $filename = date('Ymdhms').'.pdf';

        // Output the PDF with a specified filename
        $dompdf->stream($filename, array('Attachment' => 0));
        
    }

}
