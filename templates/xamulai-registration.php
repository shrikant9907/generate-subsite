<?php 
// Template empty
if(empty($autolpSettings)){ 
   return 'No One template selected';
 
}

$tab_name = array(
   'section_1'   => '1. Banner',
   'section_2'   => '2. Do you have such..',
   'section_3'   => '3. But I often hear this..',
   'section_4'   => '4. It was created..',
   'section_5'   => '5. Register now!..',
   'section_6'   => '6. Three major benefits..',
   'section_7'   => '7. Who do you learn from?..',
   'section_8'   => '8. Useful content full of volume..',
   'section_9'   => '9. Register now!..',
   'section_10'  => '10. Why are you chosen?..',
   'section_11'  => '11. Message from the mentor..',
   'section_12'  => '12. Message Video?..',
   'section_13'  => '13. Register Now!..',
   'section_14'  => '14. You can learn this!..',
   'section_15'  => '15. Voices of participating members..',
   'section_16'  => '16. FAQ!..',
   'section_17'  => '17. Register Now!..',
); 
$previewId = $_SESSION['abandand_post_id'] ;
// check preview data 
if( $previewId ){
   $prevData = get_post_meta($previewId, 'lp_template_data', true);
}else{
   $prevData = get_user_meta( get_current_user_id(), 'lp_template_data', true);
}
// If remove uncessary user info
$allEmpty = remove_site_preview_empty($prevData);
// fetch value empty or not 
$disabled = (!in_array( 1, $allEmpty ) ? 'disabled' : '');

if ($session_data['save_changes'] != 'saved') {
   $previewClasses = 'hide';
}

?>
<section class="tabs-section">
   <div class="row">
      <div class="col-12 col-md-4">
         <div class="nav flex-column tooltip-html" id="aglp-pills-tab" role="tablist" aria-orientation="vertical">
            <?php 
            // Tabs left panel call 
            $imgCount = 1;
            foreach($autolpSettings AS $key => $value){ 
               if ($tab_name[$key]) {
                
                  $active_tab  = (($key == 'section_1') ? 'active' : '');     
                  $imgurl = get_stylesheet_directory_uri() . '/images/xamulai/'.$imgCount.'.png';
                  echo '<a class="nav-link '.$active_tab.'" id="aglp-'.str_replace('_', '', $key).'-tab" data-toggle="pill" href="#aglp-'.str_replace('_', '', $key).'" role="tab" aria-controls="aglp-'.str_replace('_', '', $key).'" aria-selected="true">';
                  echo '<span data-transkey="xamulaiLpLeftTab'.$imgCount.'" class="w-100 d-block" data-toggle="tooltip" title="<img src=\''.$imgurl.'\' /> <br /> <p class=\'thisSectionWillLookLikeSS\'>This section will look like the above screenshot.</p>">'.$tab_name[$key].'</span>';
                  echo '</a>';
                  $imgCount++;
               }
            }
            ?>
         </div>
      </div>
      <div class="col-12 col-md-8">
         <div class="clearfix">
         <?php if (!is_user_logged_in()) { ?> 
            <div id="login-status" class="hide bg-white overlay_w flex-column d-flex justify-content-center align-items-center">
               <div class="loader-icon f50 mb_10">
                  <i class="fas fa-spinner fa-spin"></i>
               </div>
               <div class='display-4 f20' data-transkey="creatingAccountMessage">We are creating your account in few seconds.</div>
            </div>  
         <?php } ?>
               <a class="preview-button btn btn-outline-primary btn-sm mb_20 float-right <?php echo $previewClasses; ?>" href="<?php  echo network_site_url('/preview'); ?>" <?php echo $disabled; ?>  data-transkey="viewPreview">View Preview</a>
                        <!--save-changes-btn btn-green -->
               <a class="btn btn-outline-primary btn-green btn-sm mb_20 text-white save-changes-btn float-right hide" href="javascript:void('0');" data-transkey="saveChanges">Save Changes</a>
         </div>
         <div class="tab-content" id="aglp-pills-tabContent">
            <input type="hidden" class="save-changes-input" name="save_changes" value="" />

               <!-- Fetch all form tab data surviral --> 
                 <?php
                  foreach($autolpSettings AS $key => $value){ 
                     get_template_part( 'templates/xamulai-template-parts/form', str_replace('_', '', $key) );   
                  }
                 ?>
            <!-- Save Changes Button -->
            <div class="clearfix text-right border-top pt_15">
               <a class="preview-button btn btn-outline-primary btn-sm mb_20 float-right <?php echo $previewClasses; ?>" href="<?php  echo network_site_url('/preview'); ?>" <?php echo $disabled; ?>>View Preview</a>
                  <!--save-changes-btn btn-green -->
               <a class="btn btn-outline-primary btn-green btn-sm mb_20 text-white save-changes-btn float-right hide" href="javascript:void('0');" data-transkey="saveChanges">Save Changes</a>
               <div class="nextprev d-flex justify-content-between pr_5">
                  <a class="prev-section btn btn-green btn-outline-primary btn-sm mb_20 float-right" href="javascript:void('0');" data-transkey="previousSection">Previous Section</a>
                  <a class="next-section btn btn-green btn-outline-primary btn-sm mb_20 float-right" href="javascript:void('0');" data-transkey="nextSection">Next Section</a>
               </div>
            </div>
      </div>
   </div>
</section>
