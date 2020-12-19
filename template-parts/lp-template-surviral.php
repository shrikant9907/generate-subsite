<?php
// Get Settings Data
$network_id = get_current_network_id();
$blogId = get_current_blog_id();
$autolpSettings = unserialize(get_network_option($network_id, 'aglp_network_options'));

$blogusers = get_users( "blog_id=$blogId" );
$cbuid = $blogusers['0']->ID;
$prevData = get_user_meta($cbuid, 'lp_template_data', true);

// Checked Template Options Enable or Not
//Note -- Enable means will display template section otherwise hide section
if(isset($autolpSettings['section_1'] ) && (isset($prevData['banner_video_link'])) ){ 

  ?>
  <!-- Banner Section Start -->
  <section id="section_1" class="section-banner pt_75 pb_60 bg_black text-white text-center section-1">
  <?php if($prevData['banner_video_link']){ 
      $videoType = getVideoUrlType($prevData['banner_video_link']);
      if ($videoType == 'youtube') {
        ?>
        <div id="ytbg" data-youtube="<?php echo $prevData['banner_video_link']; ?>"></div>
      <?php
      } else if ($videoType == 'vimeo') {
        $vimeoArr = explode('?', $prevData['banner_video_link']);
        $vimeoVideo = $vimeoArr['0'] . '?background=1&autoplay=1&loop=1&byline=0&title=0';
        ?>
        <iframe class="section-bg-video" src="<?php echo $vimeoVideo; ?>"
           frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <?php
      } else {
      ?>
      <video class="section-bg-video w-100" autoplay="" muted="" playsinline="" loop="" src="<?php echo $prevData['banner_video_link']; ?>"></video>
      <?php }
      } ?>
    <div class="overlay_b absolute w-100 "></div>  
    <div class="container">
      <!-- Checked field proper fill inside form  -->
       <?php if($prevData['banner_heading_before']){ ?>
          <h1 class="banner-title-before"><?php echo $prevData['banner_heading_before']; ?></h1>
        <?php }
          if($prevData['banner_heading']){ 
        ?>
          <h2 class="banner-heading" style="font-size: <?php echo $prevData['banner_heading_fs']; ?>px; line-height: <?php echo $prevData['banner_heading_fs'] + 20; ?>px; "><?php echo $prevData['banner_heading']; ?></h2>
        <?php }
          if($prevData['banner_description']){ 
        ?>  
        <p class="banner-description mb_85"><?php echo $prevData['banner_description']; ?></p>
        <?php }
          if($prevData['banner_action_label']){ 
        ?> 
        <p class="banner-actions"><a class="btn btn-primary r_30 px_30 py_15" href="<?php echo $prevData['banner_action_link'] ?: '#'; ?>"><i aria-hidden="true" class="<?php echo $prevData['banner_action_icon']; ?> mr_20"></i><?php echo $prevData['banner_action_label']; ?></a></p>   
        <?php } ?>
      <!-- Checked field proper fill inside form End -->
   </div>
  </section>
  <!-- Banner section end -->
<?php } ?>
<!-- Customer Section-->
<?php if(isset($autolpSettings['section_2']) && ($prevData['worried_heading'] || $prevData['worried_sub_heading'])){ ?>
  <!-- Carousel Section Start -->
  <section id="section_2" class="section-carousel common-section bg-white pt_80 pb_80 section-2">
    <div class="container-fluid">
      <!-- Checked field proper fill inside registration form  -->
      <?php if($prevData['worried_heading']){ ?>
      <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['worried_heading'] ; ?></h2>
      <?php } 
      if($prevData['worried_sub_heading']){
      ?>
      <p class="section-description text-center"><?php echo $prevData['worried_sub_heading'] ; ?></p>   
      <?php }
      // Chcked customer descriptions
      if(isset($prevData['group-customer'])){ 
      ?>
      <div class="carousel-ui text-left pt_5">
        <div class="slider slickFiveItems">
          <?php foreach($prevData['group-customer'] as $customer) { ?>
            <div class="img-card text-center w_250 max_w_100p px_5">
            <?php if($customer['customer_images']){
              // need to echo images
            ?>
            <div class="card-image">
              <img class="img-fluid mb_25 w-100" src="<?php echo $customer['customer_images']; ?>" />
            </div>
            <?php } 
              if($customer['customer_description']){
            ?>
               <p class="mb_10"><?php echo $customer['customer_description']; ?></p>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>    
    </div>
  </section>
  <!-- Carousel Section End -->
<?php } ?>
<!-- Customer Section End -->
<!-- Leave It Surviral -->
<?php if(isset($autolpSettings['section_3']) && ($prevData['leave_surviral_heading'] || $prevData['leave_surviral_sub_heading'] || $prevData['upload_mobile_screen'])){ ?>
  <!-- Simple Section Start -->
  <section id="section_3" class="section-simple common-section bg-white pt_80 section-3">
    <div class="container">
    <?php if($prevData['leave_surviral_heading']){ ?>
          <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['leave_surviral_heading']; ?></h2>
    <?php } 
    if($prevData['leave_surviral_sub_heading']){
    ?>      
      <p class="section-description text-center"><?php echo $prevData['leave_surviral_sub_heading']; ?></p>

    <?php } ?> 
    </div>
      <!-- Need to do code  -->
    <?php if($prevData['upload_mobile_screen']){ ?>  
      <p><img class="img-fluid w-100" alt="" src="<?php echo $prevData['upload_mobile_screen']; ?>"></p>
    <?php } ?>
  </section>
  <!-- Simple Section End -->
<?php } ?>
<!-- Why insta section Section End -->
<?php if(isset($autolpSettings['section_4']) && ($prevData['why_insta_heading'] || $prevData['why_insta_sub_heading'])){ ?>
  <!-- Cards Listing Section Start -->
  <section id="section_4" class="section-cardlisting common-section bg-white pt_80 pb_80 section-4">
    <div class="container">
      <?php if($prevData['why_insta_heading']){ ?>
        <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['why_insta_heading']; ?></h2>
      <?php } 
        if($prevData['why_insta_sub_heading']){ 
      ?>  
      <p class="section-description text-center"><?php echo $prevData['why_insta_sub_heading']; ?>
      </p>
      <?php } ?>
    </div>
    <?php if($prevData['group-insta']){ ?>
      <div class="container-fluid">
        <div class="form-row">
          <?php foreach($prevData['group-insta'] as $insta){ ?>
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card r_0 border-0 text-center mb_30">
                    <!--Need to work on -->
                    <?php if($insta['add_insta_image']){ ?>
                      <div class="card-image">
                        <img class="img-fluid mb_20 w-100" src="<?php echo $insta['add_insta_image']; ?>" alt="" />
                      </div>
                    <?php } 
                        if($insta['add_insta_heading']){
                    ?>
                    <h3 class="mb_15"><?php echo $insta['add_insta_heading']; ?></h3>
                    <?php } 
                        if($insta['add_insta_user_counter']){
                    ?>
                    <div class="numbers mb_15"><?php echo $insta['add_insta_user_counter']; ?></div>
                    <?php } 
                        if($insta['add_insta_description']){
                    ?>
                    <div class="description mb_15"><?php echo $insta['add_insta_description']; ?></div>
                    <?php } 
                    ?>
                  </div>
              </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </section>
  <!-- Cards Listing Section End -->
<?php } ?>
<!-- Register Now section start-->
  <?php if(isset($autolpSettings['section_5']) && ($prevData['register_now_heading'] || $prevData['register_now_button_label'])){ ?>
    <!-- Parallex Section Start (Banner Image Missing)-->
    <?php $cta_bg = $prevData['register_now_background_image']; ?>
    <section id="section_5" class="section-parallax common-section bg-dark pt_50 pb_50 text-center position-relative section-5" <?php if($cta_bg!='') { ?> style="background-image:url('<?php echo $cta_bg; ?>');" <?php } ?> >
      <div class="overlay_b position-absolute"></div>
      <div class="container">
        <?php
        if($prevData['register_now_heading']){ ?>
              <h2 class="main-heading-ui text-white"><?php echo $prevData['register_now_heading']; ?></h2>
        <?php }
          if($prevData['register_now_button_label']){ ?>
              <p class="section-actions position-relative">
                <a class="btn btn-primary r_30 px_30 py_15" href="<?php echo $prevData['register_now_button_link']; ?>"><i aria-hidden="true" class="<?php echo $prevData['register_now_icons']; ?> mr_20"></i><?php echo $prevData['register_now_button_label']?></a>
              </p>   
          <?php } ?>
      </div>
    </section>
    <!-- Parallex Section End -->
  <?php } ?>
<!-- Register Now section End-->

<!-- Why Surviral Section Start-->
<?php if(isset($autolpSettings['section_6']) && ($prevData['why_surviral_heading'] || $prevData['why_surviral_description'] )){ ?>
  <section id="section_6" class="section-cardicons common-section bg-white pt_80 pb_80 section-6">
    <div class="container">
       <?php if($prevData['why_surviral_heading']){ ?>
      <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['why_surviral_heading']; ?></h2>
       <?php } 
        if($prevData['why_surviral_description']){
       ?>
        <p class="section-description text-center"><?php echo $prevData['why_surviral_description'];  ?></p>
       <?php } ?>
    </div>
    <?php if($prevData['group-why-surviral']){ ?>
    <div class="container-fluid">
      <div class="form-row">
        <?php foreach($prevData['group-why-surviral'] as $why_surviral){ ?>
        <div class="col-12 col-sm-6 col-md-4">
             <div class="card r_0 border-0 text-center mb_30">
              <!-- Need to make image funcitonality -->
              <?php if($why_surviral['why_surviral_repater_images']){?>
                <div class="card-image">
                <img class="img-fluid mb_20 w-100" src="<?php echo $why_surviral['why_surviral_repater_images']?>" alt="" />
               </div>
              <?php } ?>
               <h3 class="mb_15"><?php echo $why_surviral['why_surviral_repater_heading']; ?></h3>
               <div class="description mb_15"><?php echo $why_surviral['why_surviral_repater_description']; ?></div>
             </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
  </section>
<?php } ?>
<!-- Why Surviral Section End-->
<!-- 3 Steps section start -->
<?php if(isset($autolpSettings['section_7']) && ( $prevData['step_heading'] || $prevData['step_description'] )){ ?>
    <!-- Carousel Section Start -->
  <section id="section_7" class="section-carousel three-carousel bg-light-pink common-section pt_80 pb_80 section-7">
    <div class="container-fluid">
      <?php if($prevData['step_heading']){ ?>
        <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['step_heading']; ?></h2>
      <?php }
        if($prevData['step_description']){
      ?>
        <p class="section-description text-center"><?php echo $prevData['step_description'];  ?></p> 
      <?php }
      if(!empty($prevData['group-three-steps'][0]['step_repeater_images']) || !empty($prevData['group-three-steps'][0]['steps_repeater_heading']) || !empty($prevData['group-three-steps'][0]['steps_repeater_description'])){ 
      ?>
      <div class="carousel-ui text-left pt_5">
          <div class="slider slickThreeItems">
            <?php foreach($prevData['group-three-steps'] as $three_step ){ ?>
              <div class="img-card text-center w_250 max_w_100p px_5">
                <!--Image Upload -->
                <?php if($three_step['step_repeater_images']){ ?>
                  <div class="card-image">
                    <img class="img-fluid mb_25 max_w_300 mx-auto" src="<?php echo $three_step['step_repeater_images']; ?>" />  
                  </div>
                <?php } ?>  
                <h3 class="mb_15"><?php echo $three_step['steps_repeater_heading']; ?></h3>
                <p class="mb_10"><?php echo $three_step['steps_repeater_description']; ?></p>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>  
    </div>
  </section>
  <!-- Carousel Section End -->
<?php } ?>
<?php if(isset($autolpSettings['section_8']) && ( $prevData['register_now_heading'] || $prevData['register_now_button_label'])){ 
        if($prevData['register_now_previous_section'] == 'on'){ 
          $cta_bg = $prevData['register_now_background_image'];
          ?>
          <section id="section_8" class="section-parallax common-section bg-dark pt_50 pb_50 text-center position-relative section-8" <?php if($cta_bg!='') { ?> style="background-image:url('<?php echo $cta_bg; ?>');" <?php } ?>>
              <div class="overlay_b position-absolute"></div>
              <div class="container">
                <?php if($prevData['register_now_heading']){ ?>
                      <h2 class="main-heading-ui text-white"><?php echo $prevData['register_now_heading']; ?></h2>
                <?php }
                  if($prevData['register_now_button_label']){ ?>
                      <p class="section-actions position-relative">
                        <a class="btn btn-primary r_30 px_30 py_15" href="<?php echo $prevData['register_now_button_link']; ?>"><i aria-hidden="true" class="<?php echo $prevData['register_now_icons']; ?> mr_20"></i><?php echo $prevData['register_now_button_label']?></a>
                      </p>   
                  <?php } ?>
              </div>
          </section>
        <?php }else{ 

            if($prevData['register_now_second_section_heading'] || $prevData['register_now_second_section_button_label'] ){
              $cta_bg = $prevData['register_now_second_section_background_image'];
          ?>
          <!-- Parallex Section2 Start -->
          <section id="section_8" class="section-parallax common-section bg-dark pt_50 pb_50 text-center position-relative" <?php if($cta_bg!='') { ?> style="background-image:url('<?php echo $cta_bg; ?>');" <?php } ?>>
              <div class="overlay_b position-absolute"></div>
              <div class="container">
                <?php if($prevData['register_now_second_section_heading']){ ?>
                      <h2 class="main-heading-ui text-white"><?php echo $prevData['register_now_second_section_heading']; ?></h2>
                <?php }
                  if($prevData['register_now_second_section_button_label']){ ?>
                      <p class="section-actions position-relative">
                        <a class="btn btn-primary r_30 px_30 py_15" href="<?php echo $prevData['register_now_second_section_button_link']; ?>"><i aria-hidden="true" class="<?php echo $prevData['register_now_second_section_button_icons']  ;?> mr_20"></i><?php echo $prevData['register_now_second_section_button_label'];?></a>
                      </p>   
                  <?php } ?>
              </div>
          </section>
           <!-- Parallex Section2 End -->
        <?php } 
        }
        ?>
<?php } ?>
<?php if(isset($autolpSettings['section_9']) && ( $prevData['ai_heading'] || $prevData['ai_description'] )){  ?>
  <!-- Cards Icon2 Section Start -->
  <section id="section_9" class="section-cardicons common-section bg-white pt_70 pb_40 section-9">
    <div class="container">
      <?php if($prevData['ai_heading']){ ?>
      <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['ai_heading']; ?></h2>
      <?php }
      if($prevData['ai_description']){ 
      ?>
      <p class="section-description text-center mb_60"><?php echo $prevData['ai_description']; ?></p>
      <?php } ?>
    </div>
    <?php if(!empty($prevData['group-ai-repeater'][0]['ai_upload_icons']) || !empty($prevData['group-ai-repeater'][0]['ai_repeater_text']) ){ ?>
    <div class="container-fluid">
      <div class="form-row">
          <?php foreach($prevData['group-ai-repeater'] as $ai_repeater){ ?>
              <div class="col-3">
                  <div class="card r_0 border-0 text-center mb_30">
                    <div class="card-icon text-white mx-auto"><i class="<?php echo $ai_repeater['ai_upload_icons']; ?>" aria-hidden="true"></i></div>
                    <div class="section-description"><?php echo $ai_repeater['ai_repeater_text']; ?></div>
                  </div>
              </div>
          <?php } ?> 
      </div>
    </div>
  <?php } ?>
  </section>
  <!-- Cards Icon2 Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_10']) && ( $prevData['automated_heading'] || $prevData['description']  )){  ?>
  <section id="section_10" class="section-cardicons common-section bg-light-pink pt_70 pb_50 section-10">
    <div class="container">
      <?php if($prevData['automated_heading']){ ?>
      <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['automated_heading']; ?></h2>
      <?php } 
      if($prevData['description']){
      ?>
      <p class="section-description text-center mb_60"><?php echo $prevData['description']; ?></p>
      <?php } ?>
    </div>
    <?php 
     if(!empty($prevData['group-automated-surviral'][0]['automated_upload_icons']) || !empty($prevData['group-automated-surviral'][0]['automated_text']) || !empty($prevData['group-automated-surviral'][0]['automated_description'])){ 
    ?>
      <div class="container">
        <div class="form-row">
          <?php foreach($prevData['group-automated-surviral'] as $automated_surviral){ ?>
            <div class="col-4">
                <div class="card r_0 border-0 text-center mb_15 bg-transparent">
                  <div class="card-icon text-white mx-auto"><i class="<?php echo $automated_surviral['automated_upload_icons']; ?>" aria-hidden="true"></i></div>
                  <div class="section-description"><?php echo $automated_surviral['automated_text']; ?></div>
                  <div class="description mb_15"><?php echo $automated_surviral['automated_description']; ?></div>
                </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }?> 
  </section>
  <!-- Cards Icon2 Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_11']) && ( $prevData['faq_heading'] )){  ?>
  <!-- Accordion Section Start -->

  <section id="section_11" class="section-accordion common-section bg-white pt_80 pb_80 section-11">
    <div class="container">
    <?php if($prevData['faq_heading']){?>
        <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['faq_heading']; ?></h2>
      <?php } 
      if($prevData['group-faq-left'][0]['faq_left_repeater_heading'] || $prevData['group-faq-right'][0]['faq_right_repeater_heading']){
      ?>
        <div class="row">
          <div class="col-12 col-sm-6">
              <div class="accordion_design1 ">
                <div class="accordion" id="accordionExample">
                  <?php 
                  $left_counter = 1;   
                  foreach($prevData['group-faq-left'] as $faq_left){ ?>
                    <div class="card">
                      <div class="card-header" id="heading<?php echo $left_counter; ?>">
                        <h2 class="mb-0 <?php if ($left_counter > 1) { echo "collapsed"; } ?>" data-toggle="collapse" data-target="#collapse<?php echo $left_counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $left_counter; ?>"><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10"></i><?php echo $faq_left['faq_left_repeater_heading']; ?></h2>
                      </div>

                      <div id="collapse<?php echo $left_counter; ?>" class="collapse <?php echo ($left_counter == 1) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $left_counter; ?>" data-parent="#accordionExample">
                        <div class="card-body"><?php echo $faq_left['faq_left_repeater_description']; ?>
                        </div>
                      </div>
                    </div>
                  <?php $left_counter++; } ?>  
                </div>
              </div>
          </div>
          <div class="col-12 col-sm-6">
                <div class="accordion_design1 ">
                <div class="accordion" id="accordionExample2">
                <?php 
                  $right_counter = 50;   
                  foreach($prevData['group-faq-right'] as $faq_right){ ?>
                    <div class="card">
                      <div class="card-header" id="heading<?php echo $right_counter; ?>">
                        <h2 class="mb-0 <?php if ($right_counter > 50) { echo "collapsed"; } ?>" data-toggle="collapse" data-target="#collapse<?php echo $right_counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $right_counter; ?>"><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10"></i><?php echo $faq_right['faq_right_repeater_heading']; ?></h2>
                      </div>

                      <div id="collapse<?php echo $right_counter; ?>" class="collapse <?php echo ($right_counter == 50) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $right_counter; ?>" data-parent="#accordionExample2">
                        <div class="card-body"><?php echo $faq_right['faq_right_repeater_description']; ?>
                        </div>
                      </div>
                    </div>
                  <?php  $right_counter++; } ?>  
                </div>
              </div>
          </div>
        </div>
      <?php } ?>  
    </div>
  </section>
  <!-- Accordion Section End -->
<?php } 

if(isset($autolpSettings['section_12']) && ( $prevData['register_now_heading'] || $prevData['register_now_button_label'])){  
  if($prevData['register_now_third_previous_section'] == 'on'){
    $cta_bg = $prevData['register_now_background_image'];
  } else {
    $cta_bg = $prevData['register_now_third_section_background_image'];
  }
  ?>
  <!-- Footer Start -->
  <footer id="section_12" class="site-footer bg-dark text-white position-relative pb_10" <?php if($cta_bg!='') { ?> style="background-image:url('<?php echo $cta_bg; ?>');" <?php } ?> >
    <?php if($prevData['register_now_third_previous_section'] == 'on'){ ?>
      <div class="pt_50 pb_50 text-center">
        <div class="overlay_b position-absolute"></div>
        <div class="container">
          <?php if($prevData['register_now_heading']){ ?>
                <h2 class="main-heading-ui text-white"><?php echo $prevData['register_now_heading']; ?></h2>
          <?php }
            if($prevData['register_now_button_label']){ ?>
                <p class="section-actions position-relative">
                  <a class="btn btn-primary r_30 px_30 py_15" href="<?php echo $prevData['register_now_button_link']; ?>"><i aria-hidden="true" class="<?php echo $prevData['register_now_icons']; ?> mr_20"></i><?php echo $prevData['register_now_button_label']?></a>
                </p>   
            <?php } ?>
        </div>
      </div>
    <?php }else{ 
        if( $prevData['register_now_third_section_heading'] || $prevData['register_now_third_section_button_label']){
      ?>  
          <div class="pt_50 pb_50 text-center">
            <div class="overlay_b position-absolute"></div>
            <div class="container">
              <?php if($prevData['register_now_third_section_heading']){ ?>
                    <h2 class="main-heading-ui text-white"><?php echo $prevData['register_now_third_section_heading']; ?></h2>
              <?php }
                if($prevData['register_now_third_section_button_label']){ ?>
                    <p class="section-actions position-relative">
                      <a class="btn btn-primary r_30 px_30 py_15" href="<?php echo $prevData['register_now_third_section_button_link']; ?>"><i aria-hidden="true" class="<?php echo $prevData['register_now_third_section_button_icons']; ?> mr_20"></i><?php echo $prevData['register_now_third_section_button_label']?></a>
                    </p>   
                <?php } ?>
            </div>
          </div>
      <?php }
      } ?>
  
  <div class="container-fluid">
      <div class="overlay_b position-relative pt_25">
        <div class="container pb_60">
          <div class="form-row">
            <div class="col-12 col-xs-12 col-sm-6 col-md-1 d-lg-flex"></div>
            <!-- Google Iframe start -->
            <div class="col-12 col-xs-12 col-sm-6 col-md-3">
              <div class="second-cloumn mb_30 px_5">
                <?php  
                if($prevData['goole_map']){
                    echo $prevData['goole_map'];
              } ?>
                </div>  
            </div>
            <!-- End -->  
            <!-- Need to work image upload section-->  
            <?php if($prevData['footer_images']){ ?>      
            <div class="col-12 col-xs-12 col-sm-6 col-md-3">
              <div class="second-cloumn mb_30 px_5">
                  <img class="img-fluid" src="<?php echo $prevData['footer_images']; ?>" alt="" />
                </div>  
            </div>
            <?php } ?>
            <!-- Address info -->
            <?php if($prevData['footer_address']) { ?>
              <div class="col-12 col-xs-12 col-sm-6 col-md-3">
                <div class="second-cloumn mb_30 px_5">
                  <h3 class="footer-title"><?php echo $prevData['footer_address_title']; ?></h3>
                    <p><?php echo $prevData['footer_address']; ?></p>
                  </div>  
              </div>
            <?php }
            // Check sitemap info 
            if($prevData['group-footer-site-map']){
            ?>    
            <div class="col-12 col-xs-12 col-sm-6 col-md-3 col-lg-2">
              <div class="second-cloumn mb_30 px_5">
                <h3 class="footer-title"><?php echo $prevData['footer_site_map_title']; ?></h3>
                  <ul>
                  <?php foreach($prevData['group-footer-site-map'] as $site_map){ ?>
                    <li class="foot-link"><a href="<?php echo $site_map['site_map_page_link']; ?>"><?php echo $site_map['site_map_page_title']; ?></a></li>
                  <?php } ?>
                  </ul>
                </div>  
            </div>
            <?php } ?>
          </div>
        </div>
      <?php if($prevData['footer_copy_right']){ ?>
        <div class="copyright text-center border-top f12 pt_5 pb_5">
          <p class="p-0 m-0"><?php echo $prevData['footer_copy_right']; ?></p>
        </div>
      <?php } ?>  
      </div>
  </div>
  </footer>
  <!-- Footer End -->

<?php } ?>

<?php 
// Get Settings Data
$blog_id = get_current_blog_id();
if ($blog_id == 1) {
  $network_id = get_current_network_id();
  $autolpSettings = unserialize(get_network_option($network_id, 'aglp_network_options' ));
} else {
  global $post;
  $postid = $post->ID;
  $autolpSettings = unserialize(get_post_meta($postid, 'lp_template_data', true));
}
if(isset($autolpSettings['section_12']) && (is_front_page() || is_page('preview')))  { ?>
  <!-- Footer Start -->
  <footer class="site-footer bg-dark text-white position-relative pb_10">

  <!-- This register now section will display on frontpage only -->
  <?php if(is_front_page()) { ?> 
    <div class="pt_50 pb_50 text-center">
      <div class="overlay_b position-absolute"></div>
      <div class="container">
        <h2 class="main-heading-ui text-white">Register now! A limited number of free trial campaigns are in progress</h2>
        <p class="section-actions position-relative"><a class="btn btn-primary r_30 px_30 py_15" href="<?php echo site_url('/registration/'); ?>"><i aria-hidden="true" class="fas fa-power-off mr_20"></i>Get Started Now!</a></p>   
      </div>
    </div>
  <?php } ?>
  
  <div class="container-fluid">
  <div class="overlay_b position-relative pt_25">
  <div class="container pb_60">
    <div class="form-row">
      <!-- <div class="col-12 col-xs-12 col-sm-6 col-md-1 d-lg-flex d-none"></div> -->
      <div class="col-12 col-xl-7">
        <div class="form-row">
          <div class="col">
            <div class="second-cloumn mb_30 px_5">
              <h3 class="footer-title d-none">NOBORDER.z Ltd.</h3>
                <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=500%207th%20Ave%208th%20floor%20New%20York%2C%20NY%2010018&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" aria-label="500 7th Ave 8th floor New York, NY 10018"></iframe>
            </div>  
          </div>  
          <div class="col">
            <div class="second-cloumn mb_30 px_5">
              <h3 class="footer-title d-none">NOBORDER.z Ltd.</h3>
                <img class="img-fluid footer-img" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/4-1024x684.jpg" alt="" />
            </div> 
          </div>
        </div> 
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="second-cloumn mb_30 px_5">
          <h3 class="footer-title">NOBORDER.z Ltd.</h3>
            <p>500 7th Ave 8th floor New York, NY 10018<br />
info@noborders.net<br />
Entertainment x Internet Technology development</p>
          </div>  
      </div>
      <div class="col-12 col-md-6 col-xl-2">
        <div class="second-cloumn mb_30 px_5">
          <h3 class="footer-title">Sitemap</h3>
            <ul>
              <li class="foot-link"><a href="#section_1">Are you worried</a></li>
              <li class="foot-link"><a href="#section_2">Leave it</a></li>
              <li class="foot-link"><a href="#section_3">Why is Instagram</a></li>
              <li class="foot-link"><a href="#section_4">Why Survival</a></li>
              <li class="foot-link"><a href="#section_5">Artificial intelligence</a></li>
              <li class="foot-link"><a href="#section_6">List of functions</a></li>
              <li class="foot-link"><a href="#section_7">FAQs</a></li>
            </ul>
          </div>  
      </div>
    </div>
  </div>
    <div class="copyright text-center border-top f12 pt_5 pb_5">
      <p class="p-0 m-0">©2020 SURVIRAL All Rights Reserved</p>
    </div>
  </div>
  </div>

  
  </footer>
  <!-- Footer End -->
<?php } ?>
