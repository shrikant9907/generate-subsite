<?php
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if(isset($autolpSettings['section_3']) && ($prevData['section3_heading'] || $prevData['section3_repeater_images'] || $prevData['section3_repeater_description'])){ ?>
<!-- Cards Listing Section Start -->
<section class="section-cardlisting common-section bg-white pt_80 pb_80">
    <?php if($prevData['section3_heading']) { ?>
        <div class="container">
            <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section3_heading']; ?></h2>
            <!-- <p class="section-description text-center">Instagram is a fantastic platform for the most effective marketing nowadays -->
            </p>
        </div>
    <?php } ?>
    <?php if($prevData['gs3']){ ?>
        <div class="container-fluid">
            <div class="form-row">
                <?php foreach( $prevData['gs3'] AS $gs3){ 
                    if($gs3['section3_repeater_images'] || $gs3['section3_repeater_description'] ){ ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card r_0 border-0 text-center mb_30">
                            <div class="card-image bg-light"><img class="img-fluid mb_20 w-100" src="<?php echo $gs3['section3_repeater_images']; ?>" alt="" /></div>
                            <h3 class="mb_15 title2"><?php echo $gs3['section3_repeater_description']; ?></h3>
                        </div>
                    </div>
                <?php 
                    } 
                }
                ?>
         </div>
        </div>
    <?php } ?>
</section>
<!-- Cards Listing Section End -->
<?php } ?>