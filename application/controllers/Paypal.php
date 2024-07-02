<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paypal extends CI_Controller {
    var $template = 'templates/main';
    function __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('Hotels_model');
    }

    function success() {
        //get the transaction data
        $paypalInfo = $this->input->get();

        $data['item_number'] = $paypalInfo['item_number'];
        $data['txn_id'] = $paypalInfo["tx"];
        $data['payment_amt'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status'] = $paypalInfo["st"];
        
        $dataS['user_id'] = $paypalInfo['custom'];
        $dataS['product_id'] = $paypalInfo["item_number"];
        $dataS['txn_id'] = $paypalInfo["txn_id"];
        $dataS['payment_gross'] = $paypalInfo["payment_gross"];
        $dataS['currency_code'] = $paypalInfo["mc_currency"];
        $dataS['payer_email'] = $paypalInfo["payer_email"];
        $dataS['payment_status'] = $paypalInfo["payment_status"];
        
        $dataU = ['booking_ref' => $paypalInfo["txn_id"], 'checkin_status' =>$paypalInfo["st"]];
        
        $this->Hotels_model->updatePayment($paypalInfo["item_number"],$dataU);
        $this->Hotels_model->storeTransaction($dataS);
        
        
        $data['main_content'] = 'paypal/success';
        $this->load->view('templates/main', $data);
    }

    function cancel() {
        $data['main_content'] = 'paypal/cancel';
        $this->load->view('templates/main', $data);
    }

    function ipn() {
        //paypal return transaction details array
        $paypalInfo = $this->input->post();
        
        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id'] = $paypalInfo["item_number"];
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["payment_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status'] = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);

        //check whether the payment is verified
        if (preg_match("/VERIFIED/i", $result)) {
            //insert the transaction data into the database
            $this->Hotels_model->storeTransaction($data);
        }
    }

}

?>