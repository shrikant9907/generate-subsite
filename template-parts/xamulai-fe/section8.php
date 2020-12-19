<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_8'] && ($prevData['section8_heading'] || $prevData['section8_repeater_images'] || $prevData['section8_repeater_descriptions'])){
?>
<!-- Carousel Section Start -->
<section class="section-carousel common-section bg-white pt_80 pb_80">
    <div class="container-fluid">
    <?php if($prevData['section8_heading']) { ?>
        <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section8_heading']; ?></h2>
    <?php }?>
    <!-- <p class="section-description text-center">We are entering an era where traditional marketing practices do not work.</p> -->
        <?php if($prevData['gs8']){ ?>
            <div class="carousel-ui text-left pt_5">
                <div class="slider slickFiveItems">
                    <?php 
                    $counter_arr = array( '①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧', '⑨', '⑩');
                    $i = 0; 
                    foreach( $prevData['gs8'] AS $gs8 ){
                        if($gs8['section8_repeater_images'] || $gs8['section8_repeater_descriptions']) {
                     ?>
                        <div class="img-card text-center w_250 max_w_100p px_5">
                            <img class="img-fluid mb_25 w-100" src="<?php echo $gs8['section8_repeater_images']; ?>" />
                            <p class="mb_10"><?php echo $counter_arr[$i]; ?><br /><?php echo $gs8['section8_repeater_descriptions']; ?></p>
                        </div>
                    <?php $i++; 
                    }  
                } 
                ?>             
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Carousel Section End -->
<?php } ?>

