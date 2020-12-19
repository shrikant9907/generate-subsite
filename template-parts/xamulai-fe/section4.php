<?php
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if(isset($autolpSettings['section_4']) && ($prevData['section4_heading'] || $prevData['section4_description'] || $prevData['section4_image'])){ ?>
    <!-- Simple Section Start -->
    <section class="section-simple common-section bg-white pt_80 pb_50">
        <div class="container">
            <?php if ($prevData['section4_heading']) { ?>
                <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section4_heading']; ?></h2>
            <?php } ?>
            <?php if($prevData['section4_description']){ ?>
                <p class="section-description text-center"><?php echo $prevData['section4_description']; ?></p>
            <?php } ?>    
        </div>
        
    <?php if($prevData['section4_image']){ ?>
    <div class="img-container"><img class="img-fluid w-100" alt="" src="<?php echo $prevData['section4_image']; ?>"></div>
    <?php } ?>
    </section>
    <!-- Simple Section End -->
<?php } ?>