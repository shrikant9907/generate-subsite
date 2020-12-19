<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_10'] && ($prevData['section10_heading'] || $prevData['section10_sub_heading'] || $prevData['section10_repeater_images'] || $prevData['section10_repeater_heading'] || $prevData['section10_repeater_description'])){
?>    
<!-- Cards Listing Section Start -->
<section class="section-cardlisting common-section bg-white pt_80 pb_80">
<div class="container">
    <?php if ($prevData['section10_heading']) { ?>
        <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section10_heading'];  ?></h2>
    <?php } ?>
    <?php if($prevData['section10_sub_heading']){ ?>
        <p class="section-description text-center"><?php echo $prevData['section10_sub_heading'];  ?></p>
    <?php } ?>   
</div>
<?php if( $prevData['gs10'] ) { ?>
    <div class="container-fluid">
        <div class="form-row">
            <?php 
            $counter_arr = array( '①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧', '⑨', '⑩');
            $i = 0; 
            foreach( $prevData['gs10'] AS $gs10 ){
                if($gs10['section10_repeater_images'] || $gs10['section10_repeater_heading'] || $gs10['section10_repeater_description']) {
             ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card r_0 border-0 text-center mb_30">
                        <img class="img-fluid mb_20 w-100" src="<?php echo $gs10['section10_repeater_images'];  ?>" alt="" />
                        <h3 class="mb_15"><?php echo $counter_arr[$i]; ?><br /><?php echo $gs10['section10_repeater_heading'];  ?></h3>
                        <div class="description mb_15"><?php echo $gs10['section10_repeater_description'];  ?></div>
                    </div>
                </div>
            <?php $i++; 
                } 
            }?>            
        </div>
    </div>
<?php } ?>
</section>
<!-- Cards Listing Section End -->

<?php } ?>