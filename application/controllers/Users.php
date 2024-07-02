<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('user'); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    } 
     
    public function index(){ 
        $data = array(); 
        $data['error_msg'] = ''; 
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
        // If login request submitted 
        if($this->input->post('loginSubmit')){

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'Password', 'required'); 

            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => md5($this->input->post('password')), 
                        'status' => 'A' 
                    ) 
                ); 
                $checkLogin = $this->user->getRows($con); 
                
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    $this->session->set_userdata('name', $checkLogin['fullname']);
                    $this->session->set_userdata('email', $checkLogin['email']);
                    $this->session->set_userdata('phone', $checkLogin['phone']); 
                    redirect('dashboard'); 
                }else{ 
                    $data['error_msg'] = 'Wrong email or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        }
        $data['main_content'] = 'users/index';
        $data['title'] = 'Login';
        $this->load->view('templates/authentication', $data); 

        
    }

    public function registration(){ 
        $data = $userData = array(); 
        $data['error_msg'] = '';  
        // If registration request is submitted 
        if ($_POST) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('mobile', 'Mobile No', 'required'); 
            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[20]'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
            $userData = array( 
                'fullname' => strip_tags($this->input->post('first_name')), 
                'email' => strip_tags($this->input->post('email')),
                'phone' => strip_tags($this->input->post('mobile')),
                'password' => md5($this->input->post('password'))
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->user->insert($userData); 
                if($insert){
                    $con = array( 
                        'returnType' => 'single', 
                        'conditions' => array( 
                            'email'=> $this->input->post('email'), 
                            'password' => md5($this->input->post('password')), 
                            'status' => 'A' 
                        ) 
                    );
                    
                    $checkLogin = $this->user->getRows($con); 
                    if($checkLogin){ 
                        $this->session->set_userdata('isUserLoggedIn', TRUE); 
                        $this->session->set_userdata('userId', $checkLogin['id']);
                        $this->session->set_userdata('name', $checkLogin['fullname']);
                        $this->session->set_userdata('email', $checkLogin['email']);
                        $this->session->set_userdata('phone', $checkLogin['phone']);
                        
                        redirect('dashboard'); 
                    }else{ 
                        redirect('login'); 
                    } 
                    //$this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.');  
                    //redirect(base_url().'/dashboard');
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['user'] = $userData; 
         
        // Load view 
        $data['main_content'] = 'users/register';
        $data['title'] = 'Registration';
        $this->load->view('templates/authentication', $data);
    }
    
        public function postlogin(){ 
        if(isset($_POST['email']) && isset($_POST['password'])) {
            // Validate email and password (You should perform proper validation and authentication)
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $con = array(
                'returnType' => 'single',
                'conditions' => array(
                    'email' => $email,
                    'password' => md5($password),
                    'status' => 'A'
                )
            );
            
            $checkLogin = $this->user->getRows($con);
            if($checkLogin){
                $this->session->set_userdata('isUserLoggedIn', TRUE);
                $this->session->set_userdata('userId', $checkLogin['id']);
                $this->session->set_userdata('name', $checkLogin['fullname']);
                $this->session->set_userdata('email', $checkLogin['email']);
                    $this->session->set_userdata('phone', $checkLogin['phone']);
                echo 'success';
            }else{
                echo 'Wrong email or password, please try again.'; 
            } 
          } else {
            echo 'Email and password are required.';
          }
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