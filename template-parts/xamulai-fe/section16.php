
<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_16'] && ($prevData['section16_heading'] || $prevData['section16_item_heading'] || $prevData['section16_description'])){
?>
<!-- Accordion Section Start -->
<section class="section-accordion common-section bg-white pt_80 pb_80">
  <div class="container-fluid">
    <?php if ($prevData['section16_heading']) { ?>
      <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section16_heading']; ?></h2>
    <?php } ?>
    <?php if($prevData['gs16']){ ?>
      <div class="row">
        <div class="col-12">
          <div class="faqs-list">
            <?php foreach( $prevData['gs16'] AS $gs16 ){ 
              if($gs16['section16_item_heading'] || $gs16['section16_description']) { ?> 
              <div class="faq-card">
                <?php if ($gs16['section16_item_heading']) { ?>
                  <h2 class="faq-question"><?php echo 'Q: '.$gs16['section16_item_heading']; ?></h2>
                <?php } ?>
                <?php if ($gs16['section16_description']) { ?>
                  <div class="faq-answer"><?php echo 'A: '.$gs16['section16_description']; ?></div>
                <?php } ?>
              </div>
            <?php }
            } ?> 
          </div>
        </div>
      </div>
    <?php } ?>  
  </div>
</section>
<!-- Accordion Section End -->
<?php } ?>