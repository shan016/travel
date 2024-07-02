<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Dashboard extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('user');
        $this->load->model('Booking', 'booking');
        $this->load->model('Hotels_model', 'hotel');
        $this->load->model('Transportation_model', 'transportation');
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
        if(!$this->isUserLoggedIn){
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            return redirect('login');
        }
    } 
     
    public function index(){ 
        $con = array( 
            'id' => $this->session->userdata('userId') 
        ); 
        $data['user'] = $this->user->getRows($con);
        
        $bookings = $this->booking->get_my_booking();
        $data['travels'] = $this->booking->get_my_travel();

        // Fetch order items for each order
        foreach ($bookings as $booking) {
            $mbooking = $this->hotel->get_per_room($booking->room_id);
            $hotels = $this->hotel->get_per_hotrl($mbooking->hot_id);
            $booking->hotel_name = $hotels->name_ar;
        }
        
        $data['completed'] = $this->booking->get_my_booking_count('Completed');
        $data['bookings'] = $bookings;
        // Pass the user data and load view 
        $data['main_content'] = 'users/dashboard';
        $data['title'] = 'Dashboard';
        $this->load->view('templates/main', $data);
    }
    
    public function myProfile(){ 
        $con = array( 
            'id' => $this->session->userdata('userId') 
        ); 

        $data['user'] = $this->user->getRows($con);
        // Pass the user data and load view 
        $data['main_content'] = 'users/profile';
        $data['title'] = 'Profile';
        $this->load->view('templates/main', $data);
    }

    public function changePassword(){ 
        $data = array();
        if($this->input->post('submit')){ 
            $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
            $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
            $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
             
            if($this->form_validation->run() == true){ 
                $oldPassword = $this->input->post('oldPassword');
                $newPassword = $this->input->post('newPassword');
            
                $resultPas = $this->user->matchOldPassword($_SESSION['userId'], $oldPassword);

                if(empty($resultPas))
                {
                    $this->session->set_flashdata('error', 'Your old password is not correct');
                }
                else
                {
                    $usersData = array('password'=>MD5($newPassword),'modified'=>date('Y-m-d H:i:s'));

                    $result = $this->user->changePassword($_SESSION['userId'], $usersData);

                    if($result > 0) {
                        $this->session->set_flashdata('success', 'Password change successfully');
                    }
                    else {
                        $this->session->set_flashdata('error', 'Password change failed'); 
                    }
                }
            }else{ 
                $errors = validation_errors();
                $this->session->set_flashdata('error',$errors);
                //$data['error'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->user->getRows($con); 
             
            // Pass the user data and load view 
            $data['main_content'] = 'users/change-password';
            $this->load->view('templates/intromain', $data);
        }else{ 
            redirect('users/login'); 
        } 
    }
    
    function viewbooking($bookingid){

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
        $data['booking'] = $booking;
        
        $date1 = new DateTime($booking->checkin);
        $date2 = new DateTime($booking->checkout);

        $interval = $date1->diff($date2);
        $days = $interval->days;

        if($days > 1) {
           $night =  $days - 1;
            $data['days'] = $days.' Days \ '.$night.' Nights'; 
        }else {
            $night = 1;
           $data['days'] = $days.' Day \ '.$night.' Night';  
        }
        $data['model'] = $this->hotel->get_per_room($booking->room_id);
        $data['main_content'] = 'users/viewhotel';
        $this->load->view('templates/intromain', $data);
    }
    
    function viewtravel($bookingid){

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

        $data['main_content'] = 'users/viewtravel';
        $this->load->view('templates/intromain', $data);
    }

     
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('login'); 
    } 
     
     
    // Existing email check during validation 
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->user->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 
}