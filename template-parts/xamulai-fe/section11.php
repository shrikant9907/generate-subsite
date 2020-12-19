<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_11'] && ($prevData['section11_heading'] || $prevData['section11_left_Image'] || $prevData['section11_m_message_h'])){
?>
<!-- Cards Listing Section Start -->
<section class="section-intro common-section pt_80 pb_80 bg-light-pink">
<div class="container">
    <?php if ($prevData['section11_heading']) { ?>
        <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section11_heading'] ;?></h2>
    <?php } ?>
    <div class="row">
        <?php if($prevData['section11_left_Image']){ ?>
            <div class="col-12 col-sm-6">
                <div class="about-card">
                    <div class="card-image">
                        <img class="img-fluid mb_20 w-100" src="<?php echo $prevData['section11_left_Image']; ?>" alt="" />
                    </div>
                </div>
            </div>
        <?php } ?>    
        <div class="col-12 col-sm-6">
            <div class="center_text">
                <h3 class="mb_20"><?php echo $prevData['section11_m_message_h'];  ?></h3>
                <!-- <p>僕は世界中での起業人生の中で</p> -->
                <p><?php echo nl2br($prevData['section11_mentor_des']); ?></p>   
                <!-- Need to work -->
                <!-- <h3 class="text-primary mt_20">遠回りばかりしてきた自分だから</h3> -->
            </div>
        </div>
    </div>
</div>
</section>
<!-- Cards Listing Section End -->
<?php } ?>