<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_6'] && ($prevData['section6_heading'] || $prevData['section6_sub_heading'] || $prevData['section6_repeater_images'] || $prevData['section6_repeater_heading'] || $prevData['section6_repeater_description'])){
?>
<!-- Cards Listing Section Start -->
<section class="section-cardlisting common-section bg-white pt_80 pb_80">
    <div class="container">
        <?php if ($prevData['section6_heading']) { ?>
            <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section6_heading']; ?></h2>
        <?php } ?>
        <?php if ($prevData['section6_sub_heading']) { ?>
            <p class="section-description text-center"><?php echo $prevData['section6_sub_heading']; ?></p>
        <?php } ?>
    </div>
    <?php if($prevData['gs6']){ ?>
        <div class="container-fluid">
            <div class="form-row">
            <?php
            $counter_arr = array( '①', '②', '③', '④', '⑤');
            $i = 0; 
            foreach($prevData['gs6'] AS $gs6){
                if($gs6['section6_repeater_heading'] || $gs6['section6_repeater_description']){
             ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card r_0 border-0 text-center mb_30">
                            <img class="img-fluid mb_20 w-100" src="<?php echo $gs6['section6_repeater_images']; ?>" alt="" />
                            <h3 class="mb_15"><?php echo $counter_arr[$i]; ?><br /><?php echo $gs6['section6_repeater_heading']; ?></h3>
                            <div class="description mb_15"><?php echo $gs6['section6_repeater_description']; ?></div>
                        </div>
                    </div>
            <?php $i++;
                } 
            } ?>
            </div>
        </div>
    <?php } ?>
</section>
<!-- Cards Listing Section End -->
<?php } ?>