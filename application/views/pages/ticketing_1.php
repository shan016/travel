<?php
$this->load->helper('home');
?>
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Ticketing</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo base_url() ?>">Home</a></li>
                        <li>Ticketing</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    
    <div class="row">      
        <div class="col-md-12 listing_grid_item">
            <div class="listing_filter_block margin-top-30">
                <div class="col-md-3 col-xs-3">
                    
                </div>
                <div class="col-md-9 col-xs-9">


                    <div class="sort-by">
                        <div class="utf_sort_by_select_item sort_by_margin">
                            <select data-placeholder="Transportation Type" class="utf_chosen_select_single" id="type" onchange="getFilterUrl()">
                                <?php
                                    $typeid = $this->uri->segment('2');
                                    //echo $this->uri->segment('1');
                                    echo  '<option value="0">All</option>'; 
                                    foreach($types as $type) {
                                      if($type->transportation_type_id == $typeid)  {
                                        $selected = 'selected'; 
                                      }else {
                                          $selected = '';
                                      }
                                      echo  '<option value='.$type->transportation_type_id.' '.$selected.'>'.$type->transportation_type_name_ar.'</option>'; 
                                    }
                                ?>
                                
                                
                            </select>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row">

                <?php 
                if(count($models) > 0) {
                    foreach($models as $model) {
                        /*if (strlen($model->descr_ar) > 200) {
                            $des = substr($model->descr_ar, 0, 200) . " ...";
                        } else {
                            $des = $model->descr_ar;
                        }*/

                        echo '<div class="col-md-4 col-lg-4 col-md-12"> <a href="'.base_url('ticketing/details/'.$model->transportation_schdual_id).'" class="utf_listing_item-container" data-marker-id="1">
                                <div class="utf_listing_item"> <img src="'.$model->simg.'" alt="">
                                        <span class="tag"><i class="im im-icon-Hotel"></i> '.$model->trsportation_travel_class_name_ar.'</span>
                                        <span class="featured_tag">'.date('d/m/Y',strtotime($model->depature_date)).'</span>    
                                        <div class="utf_listing_item_content"> 
                                            <div class="utf_listing_prige_block">							
                                                    <span class="utf_meta_listing_price"><i class="fa fa-money"></i>'.$model->fare_amount.'</span>					
                                            </div>
                                            <h3>'.$model->transportation_name.'</h3>
                                            <span>'.$model->stationfro.' <i class="fa fa-plane-departure"></i> '.$model->stationto.'</span>                               
                                            <span><i class="fa fa-users"></i> '.$model->available_seat.'</span>
                                            <span><i class="fa fa-map"></i> '.$model->transportation_type_name_ar.'</span>
                                        </div>
                                </div>
                                </a> 
                            </div>';
                    }
                }else {
                    echo '<div class="col-md-4 col-lg-12 col-md-12">
                        <div class="notification notice closeable">
			<p>الخدمة غير متوفرة</p>
		  </div>
                    </div>';
                }
                ?>
                

            </div>
            <div class="clearfix"></div>

        </div>
    </div>
</div>

<script>
function getFilterUrl() {
       var s1 = $('#type').val();
        if(s1 > 0) {
            window.location.replace("http://easy.codeworklab.com/ticketing/"+s1);
        }else {
            window.location.replace("http://easy.codeworklab.com/ticketing");
        }

      return false;
 }
 </script>