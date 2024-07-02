<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Dashboard extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('user');
        $this->load->model('Booking', 'booking');
        $this->load->model('Hotels_model', 'hotel');
         
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