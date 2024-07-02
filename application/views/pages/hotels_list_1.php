<?php
$this->load->helper('home');
?>

<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Hotels</h2>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Hotels</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">

            <!-- Listing Post -->
            <div class="row">
                
                
                <?php 

                foreach($models as $model) {
                    echo '<div class="col-lg-12 col-md-12">
                    <div class="utf_listing_item-container list-layout">
                    <div class="utf_listing_item">
                            <div class="utf_listing_item-image"> 
                                <img src="'.$model->img.'" alt=""> 
                                <div class="utf_listing_prige_block utf_half_list">							
                                    <span class="utf_meta_listing_price"><i class="fa fa-tag"></i> YEM '.$model->price.'</span>					
                                </div>    
                            </div>
                            <span class="utf_open_now">Vacant</span>
                            <div class="utf_listing_item_content">
                                <div class="utf_listing_item-inner">
                                    <h3>'.$model->room_no.'</h3>
                                    <span>'.$model->name_ar.'</span>
                                    <p> '.$model->descr.'</p> <a href="'.base_url('hotel/details/'.$model->rooms_id).'" class="utf_progress_button button">Request Booking</a>   
                                    
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>';
                }
                ?>
                
                
                
                

            </div>
            
            <div class="clearfix"></div>
            
            <!-- Pagination 
            <div class="row">
                <div class="col-md-12">
                    <div class="utf_pagination_container_part margin-top-20 margin-bottom-70">
                        <nav class="pagination">
                            <ul>
                                <li><a href="#"><i class="sl sl-icon-arrow-left"></i></a></li>
                                <li><a href="#" class="current-page">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>-->
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-md-4">
            <div class="sidebar">
                <div class="utf_box_widget margin-bottom-35">
                    <h3><i class="sl sl-icon-direction"></i> Filters</h3>			
                    <div class="row with-forms">
                        <div class="col-md-12">
                            <input type="text" placeholder="What are you looking for?" value=""/>
                        </div>
                    </div>            
                    <div class="row with-forms">
                        <div class="col-md-12">
                            <div class="input-with-icon location">
                                <input type="text" placeholder="Search Location..." value=""/>
                                <a href="#"><i class="sl sl-icon-location"></i></a> </div>
                        </div>
                    </div>
                    <a href="#" class="more-search-options-trigger margin-bottom-10" data-open-title="More Filters Options" data-close-title="More Filters Options"></a>
                    <div class="more-search-options relative">
                        <div class="checkboxes one-in-row margin-bottom-15">
                            <input id="check-a" type="checkbox" name="check">
                            <label for="check-a">Real Estate</label>
                            <input id="check-b" type="checkbox" name="check">
                            <label for="check-b">Friendly Workspace</label>
                            <input id="check-c" type="checkbox" name="check">
                            <label for="check-c">Instant Book</label>
                            <input id="check-d" type="checkbox" name="check">
                            <label for="check-d">Wireless Internet</label>
                            <input id="check-e" type="checkbox" name="check" >
                            <label for="check-e">Free Parking</label>
                            <input id="check-f" type="checkbox" name="check" >
                            <label for="check-f">Elevator in Building</label>
                            <input id="check-g" type="checkbox" name="check">
                            <label for="check-g">Restaurant</label>	
                            <input id="check-h" type="checkbox" name="check">
                            <label for="check-h">Dance Floor</label>
                        </div>				
                    </div>			
                    <button class="button fullwidth_block margin-top-5">Update</button>
                </div>		  
                <img src="https://daleelcom.news/media/flights_schedules/0486635439fa0268317d329a29e7b13f.jpg" alt="" class="img-fluid margin-top-35">
                <img src="https://daleelcom.news/media/flights_schedules/8d4db2438b3405df63be52b50a9ecedc1.jpg" alt="" class="img-fluid margin-top-35">
            </div>
        </div>
    </div>
</div>