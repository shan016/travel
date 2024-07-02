<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function home(){
    $ci=& get_instance();
    $ci->load->database(); 
    $lists = $ci->db->get('ht_hotels')->result();
    return count($lists);
}

function ticketingCount(){
    $ci=& get_instance();
    $ci->load->database(); 
    $lists = $ci->db->get('transportation_schdual')->result();
    return count($lists);
}

function socials(){
    $ci=& get_instance();
    $ci->load->database(); 
    $lists = $ci->db->get('social_media')->result();
    return $lists;
}

function logo(){
    $ci=& get_instance();
    $ci->load->database(); 

    $model = $ci->db->get('site_setting')->result();
    $logo = '';
    if (!empty($model[0]->logo)) {
        $image = base_url() . 'media/logo/' . $model[0]->logo;
        $logo = '<img class="img-fluid-small" src="' . $image . '">';
    }
    return $logo;
}

function logo_mobile(){
    $ci=& get_instance();
    $ci->load->database(); 

    $model = $ci->db->get('site_setting')->result();
    $logo = '';
    if (!empty($model[0]->logo)) {
        $image = base_url() . 'media/logo/' . $model[0]->logo;
        $logo = '<img class="img-fluid-small" src="' . $image . '" width="70">';
    }
    return $logo;
}

function breakingNews(){
    $ci=& get_instance();
    $ci->load->database(); 
    
    $ci->db->where('status', 'publish');
    $ci->db->order_by("id", "desc");
    $models = $ci->db->get('breaking_news')->result();

    return $models;
}

function mainBanner(){
    $ci=& get_instance();
    $ci->load->database(); 

    //$models = $ci->db->get('banner')->where('status', 1)->result();
    $ci->db->select("*");
    $ci->db->from("banner");
    $ci->db->where('status', 1);
    $ci->db->order_by("id", "desc");
    //$ci->db->limit(4);
    $models = $ci->db->get()->result();

    return $models;
}

function arival($mydate){
    $ci=& get_instance();
    $ci->load->database(); 

    //$models = $ci->db->get('banner')->where('status', 1)->result();
    $ci->db->select("*");
    $ci->db->from("airline_schedule");
    $ci->db->where('a_type', "arrivals");
    $ci->db->where('a_date', date('Y-m-d', strtotime($mydate)));
    $ci->db->limit(20);
    $models = $ci->db->get()->result();

    return $models;
}

function departure($mydate){
    $ci=& get_instance();
    $ci->load->database(); 

    //$models = $ci->db->get('banner')->where('status', 1)->result();
    $ci->db->select("*");
    $ci->db->from("airline_schedule");
    $ci->db->where('a_type', "departure");
    $ci->db->where('a_date', date('Y-m-d', strtotime($mydate)));
    $ci->db->limit(20);
    $models = $ci->db->get()->result();

    return $models;
}


function adsBanner(){
    $ci=& get_instance();
    $ci->load->database(); 
    $ci->db->where('status', 1);
    $ci->db->order_by("id", "desc");
    $models = $ci->db->get('adv_banner')->result();

    return $models;
}

function exchangeRate(){
    $ci=& get_instance();
    $ci->load->database(); 

    $models = $ci->db->get('exchange_rate')->result();

    return $models;
}

function flightsSchedule(){
    $ci=& get_instance();
    $ci->load->database(); 
    $ci->db->where('status', 1);
    $ci->db->order_by("id", "desc");
    $models = $ci->db->get('flights_schedule')->result();

    return $models;
}

function menu(){
    $ci=& get_instance();
    $ci->load->database(); 
    
    $ci->db->select("*");
    $ci->db->from("categories");
    $ci->db->where('is_parent', 1);
    $ci->db->where('status', "active");
    $q = $ci->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {

            $ci->db->select("*");
            $ci->db->from("categories");
            $ci->db->where("parent_id", $row->id);
            $ci->db->where('is_parent', 0);
            $q = $ci->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
 }
 
 function htmlPages(){
    $ci=& get_instance();
    $ci->load->database(); 

    $ci->db->select("*");
    $ci->db->from("pages");
    $ci->db->where('status', "publish");
    $ci->db->limit(10);
    $models = $ci->db->get()->result();

    return $models;
}
 
 function footer(){
    $ci=& get_instance();
    $ci->load->database(); 

    $model = $ci->db->get('footer')->result();
    $logo = '';
    if (!empty($model[0]->descrption1)) {
        $image = base_url() . 'media/logo/' . $model[0]->descrption1;
        $logo = $model[0]->descrption1;
    }
    return $logo;
}

function ArabicDate($mydate) {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = $mydate; // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D', strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = $ar_day.' '.date('d', strtotime($your_date)).' / '.$ar_month.' / '.date('Y', strtotime($your_date));
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

function ArabicTime($time) {
    $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
    //$current_date = date('h', strtotime($arival->a_time)) . ':' . date('i', strtotime($arival->a_time)) . ':' . date('s', strtotime($arival->a_time));
    $arabic_time = str_replace($standard, $eastern_arabic_symbols, $time);
    return $arabic_time;
}

function to_time_ago( $time ) {
      
    // Calculate difference between current
    // time and given timestamp in seconds
    $diff = time() - $time;
      
    if( $diff < 1 ) { 
        return 'قبل أقل من ثانية واحدة'; 
    }
      
    $time_rules = array ( 
                12 * 30 * 24 * 60 * 60 => 'سنة',
                30 * 24 * 60 * 60       => 'شهر',
                24 * 60 * 60           => 'يوم',
                60 * 60                   => 'ساعة',
                60                       => 'دقيقة',
                1                       => 'ثانية'
    );
  
    foreach( $time_rules as $secs => $str ) {
          
        $div = $diff / $secs;
  
        if( $div >= 1 ) {
              
            $t = round( $div );
              
            return $t . ' ' . $str . 
                ( $t > 1 ? 'س' : '' ) . ' منذ';
        }
    }
}

function timeAgo($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'سنة',//year
        'm' => 'شهر', //month
        'w' => 'اسبوع',//week
        'd' => 'يوم', //day
        'h' => 'ساعة', //hour
        'i' => 'دقيقة', //minute
        's' => 'ثانية', //second
    );
    foreach ($string as $key => &$val) {
        if ($diff->$key) {
            $val = $diff->$key . ' ' . $val . ($diff->$key > 1 ? '' : '');
        } else {
            unset($string[$key]);
        }
    }

    if (!$full){
        $string = array_slice($string, 0, 1);
    } 
    return $string ? implode(', ', $string) . ' منذ' : 'الآن';
}

function timeAgo2($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'سنة',//year
        'm' => 'شهر', //month
        'w' => 'اسبوع',//week
        'd' => 'يوم', //day
        'h' => 'ساعة', //hour
        'i' => 'دقيقة', //minute
        's' => 'ثانية', //second
    );
    foreach ($string as $key => &$val) {
        if ($diff->$key) {
            $val = $diff->$key . ' ' . $val . ($diff->$key > 1 ? '' : '');
        } else {
            unset($string[$key]);
        }
    }

    if (!$full){
        $string = array_slice($string, 0, 1);
    }
    //$gg =  implode(', ', $string);
    //print_r($gg);
   // die;
    //return $string;
    //return $string ? implode(', ', $string) . ' منذ' : 'الآن';
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>