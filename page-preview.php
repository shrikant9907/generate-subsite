<?php
/*
* Template Name: Surviral Preview Template
*/
get_header(); 

$currentUserId = get_current_user_id();
// Fetch template name 
$template_name = get_user_meta(get_current_user_id(), 'lp_selected_template' , 'true' );

if(empty($template_name)){
  ?>
  <div class="bg-dark fixed-top bg-dark py_10 preview-top-bar">
    <div class="container-fluid d-flex justify-content-between">
      <span class="text-center text-white f30">Please select template</span>
      <a class="btn btn-primary bg-green" href="<?php echo site_url('/registration') ?>">Register Now</a>
    </div>
  </div>
  <?php 
  return false; 
}

// Get Settings Data
$network_id = get_current_network_id();
$autolpSettings = unserialize(get_network_option($network_id, 'aglp_network_options'));
if (is_page('preview') && (isset($_GET['pid']) || isset($_SESSION['abandand_post_id']) || is_user_logged_in())) {
  // If the id is not given in the URL
  $previewId = base64_decode($_GET['pid']);
  if (!$previewId) { 
    $previewId = $_SESSION['abandand_post_id'];
  }
  
  $prevData = get_post_meta($previewId, 'lp_template_data', true);

  // if the user is logged in  
  if (is_user_logged_in()) {
    $prevData = get_user_meta($currentUserId, 'lp_template_data', true);
  } 
?>
  <div class="fixed-top bg-dark py_10 preview-top-bar">
    <div class="container-fluid d-flex justify-content-between">
      <a class="btn btn-primary" href="<?php echo site_url('/registration?rstep=2') ?>"><i aria-hidden="true" class="fas fa-arrow-left mr_10"></i>Edit Page</a> 
      <span class="text-center text-white f30">Preview</span>
      <a class="btn btn-primary bg-green" href="<?php echo site_url('/registration?rstep=3') ?>">Subscribe Now</a>
    </div>
  </div>
  <?php
}
   // If remove uncessary user info
  $allEmpty = remove_site_preview_empty($prevData);
  if(!in_array( 1, $allEmpty )){
  ?>
  <div class="container pt_100 text-center">
    <p>Content not found for this page. Please click on the following link to add some content.</p>
      <a class="btn btn-primary" href="<?php echo site_url('/registration?rstep=2') ?>">Go to edit page.</a>
  </div>    
<?php  
  }else{
    // For previos templates
    $_SESSION['autolpSettings'] = $autolpSettings; 
    $_SESSION['prevData'] = $prevData; 
    // End
    if( $template_name == 'lp-template-xamulai'){
      //Preview data show basis of template selection xamulai
      foreach($autolpSettings AS $key => $value){
        $template_section = preg_replace('#[_]#',"", $key);
        if($template_section){
          get_template_part( 'template-parts/xamulai-fe/'.$template_section);
        }
      }

    }else{
      //Preview data show basis of template selection surviral
        get_template_part( 'template-parts/surviral-fe/surviral-sections');   
    }
  }
   wp_footer(); 
  ?>
  </body>
  </html>  

