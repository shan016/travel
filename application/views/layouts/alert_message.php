<?php 
    if ($this->session->flashdata('error')) {
        echo '<div class="alert alert-danger alert-dismissible">'.$this->session->flashdata('error').'</div>';
    }

    if ($this->session->flashdata('success')) {
        echo '<div class="alert alert-success alert-dismissible">'.$this->session->flashdata('success').'</div>';
    }
?>