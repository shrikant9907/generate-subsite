<!-- Carousel Section Start -->
<?php
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 
if(isset($autolpSettings['section_2']) && ($prevData['section2_heading'] || $prevData['section2_repeater_images'] || $prevData['section2_repeater_description'])){ ?>
<section class="section-carousel common-section bg-white pt_80 pb_80">
    <div class="container-fluid">
        <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section2_heading']; ?></h2>
        <!-- <p class="section-description text-center">We are entering an era where traditional marketing practices do not work.</p> -->
        <?php if($prevData['gs2']){ ?>
            <div class="carousel-ui text-left pt_5">
                <div class="slider slickFiveItems">
                    <?php foreach($prevData['gs2'] AS $gs2){ ?>
                    <div class="img-card text-center w_250 max_w_100p px_5">
                        <img class="img-fluid mb_25 w-100" src="<?php echo $gs2['section2_repeater_images']; ?>" />
                        <p class="mb_10"><?php echo $gs2['section2_repeater_description']; ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>    
    </div>
</section>
<?php }  ?>
<!-- Carousel Section End -->