<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_7'] && ($prevData['section7_heading'] || $prevData['section7_left_Image'] || $prevData['section7_left_heading'] || $prevData['section7_mentor_des'])){
?>
<!-- Cards Listing Section Start -->
<section class="section-intro common-section pt_80 pb_80 bg-light-pink">
    <div class="container">
        <?php if ($prevData['section7_heading']) { ?>
            <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section7_heading']; ?></h2>
        <?php } ?>
        <div class="row">
            <div class="col-12 col-sm-5">
                <div class="about-card max_w_377">
                    <?php if($prevData['section7_left_Image']){ ?>
                    <div class="card-image">
                        <img class="img-fluid mb_20 w-100" src="<?php echo $prevData['section7_left_Image']; ?>" alt="" />
                    </div>
                    <?php }
                         if($prevData['section7_left_heading']){
                    ?>
                        <h3 class="mb_15"><?php echo $prevData['section7_left_heading']; ?></h3>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-sm-7">
                <div class="ul_listing">
                    <p><?php echo nl2br($prevData['section7_mentor_des']); ?></p>   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cards Listing Section End -->
<?php } ?>