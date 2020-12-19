<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_17'] && ($prevData['section5_copy'] == 'on')){

    get_template_part('template-parts/xamulai-fe/section5');

}else{
    $cta_bg = $prevData['section17_bg_image']; 
    ?>
    <!-- Parallex Section Start -->
    <?php if($prevData['section17_heading']) { ?>
    <section class="section-parallax common-section bg-dark pt_50 pb_50 text-center position-relative" <?php if($cta_bg!='') { ?> style="background-image:url('<?php echo $cta_bg; ?>');" <?php } ?> >
    <div class="overlay_b position-absolute"></div>
    <div class="container">
        <h2 class="main-heading-ui text-white"><?php echo $prevData['section17_heading']; ?></h2>
        <?php if($prevData['section17_bt_label']){?>
        <p class="section-actions position-relative"><a class="btn btn-primary r_30 px_30 py_15" href="<?php echo $prevData['section17_bt_link']; ?>"><i aria-hidden="true" class="<?php echo $prevData['section17_bt_icons']; ?> mr_20"></i><?php echo $prevData['section17_bt_label']; ?></a></p>   
        <?php }  ?>
    </div>
    </section>
    <?php 
}

}
?>