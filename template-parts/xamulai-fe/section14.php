<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_14'] && ($prevData['section14_heading'] || $prevData['section14_repeater_heading'])){
?>
<!-- Accordion Section Start -->
<section class="section-tags common-section bg-white pt_80 pb_80">
  <div class="container">
    <?php if ($prevData['section14_heading']) { ?>
      <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section14_heading']; ?></h2>
    <?php } ?>
    <?php 
      if($prevData['gs14']){
    ?>
      <div class="row">
        <?php foreach($prevData['gs14'] AS $gs14 ) { 
          if ($gs14['section14_repeater_heading']) { ?>
          <div class="col-6"><div class="btn btn-outline-primary w-100 mb_20"><?php echo $gs14['section14_repeater_heading']; ?></div></div>
        <?php
           } 
          } ?>  
      </div>
    <?php } ?>  
  </div>
</section>
<!-- Accordion Section End -->
<?php } ?>