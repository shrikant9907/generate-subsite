<?php
/*
* Template Name: AGLP Demo Template
*/
get_header(); 

if(isset($_GET['t']) && $_GET['t'] != '') {
$template_name = sanitize_title($_GET['t']);
?>
<div class="fixed-top bg-dark py_10 preview-top-bar">
  <div class="container-fluid d-flex justify-content-between">
    <a class="noreplace btn btn-primary" href="<?php echo site_url('/registration?rstep=2') ?>"><i aria-hidden="true" class="fas fa-arrow-left mr_10"></i> <span data-transkey="back">Back</span></a> 
    <span class="text-center text-white f30 text-capitalize"><?php echo $template_name; ?> <span data-transkey="demo">Demo</span></span>
    <?php if (is_user_logged_in()) { ?>
      <a data-transkey="subscribeNow" class="noreplace btn btn-primary bg-green hidden" href="<?php echo site_url('/registration?rstep=3') ?>">Subscribe Now</a>
    <?php } else { ?>
      <a data-transkey="subscribeNow" class=" noreplace btn btn-primary bg-green" href="<?php echo site_url('/registration?rstep=3') ?>">Subscribe Now</a>
    <?php } ?>
  </div>
</div>
 
<?php  
  get_template_part( 'template-parts/demos/'.$template_name.'-demo-lp');   
?>
<?php   
} else {
  
  ?>

<div class="container pt_100 text-center">
    <p data-transkey="previewTemplateNotSelected">Preview template is not selected. Please go back and select a template.</p>
    <a data-transkey="goBackToEdit" class="btn btn-primary" href="<?php echo site_url('/registration?rstep=2') ?>">Go to edit page.</a>
</div>   

  <?php
}
  wp_footer(); 
?>

<script>

  jQuery('a').each(function(){
    if(!jQuery(this).hasClass('noreplace')) {
      jQuery(this).attr('href', "javascript:void('0')"); 
    }
  });

</script>

</body>
</html>  

