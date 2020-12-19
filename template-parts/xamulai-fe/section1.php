<!-- Banner Section Start -->
<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 
if(isset($autolpSettings['section_1'] ) && (isset($prevData['banner_video_link'])) ){ 
?>
    <section class="section-banner pt_75 pb_60 bg_black text-white text-center">
        <div class="overlay_b absolute w-100 "></div>
        <?php if($prevData['banner_video_link']){ 
          $videoType = getVideoUrlType($prevData['banner_video_link']);
          if ($videoType == 'youtube') {
            ?>
            <div id="ytbg" data-youtube="<?php echo $prevData['banner_video_link']; ?>"></div>
          <?php
          } else if ($videoType == 'vimeo') {
            $vimeoArr = explode('?', $prevData['banner_video_link']);
            $vimeoVideo = $vimeoArr['0'] . '?background=1&autoplay=1&loop=1&byline=0&title=0';
            ?>
            <iframe class="section-bg-video" src="<?php echo $vimeoVideo; ?>"
              frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
          <?php
          } else {
          ?>
          <video class="section-bg-video w-100" autoplay="" muted="" playsinline="" loop="" src="<?php echo $prevData['banner_video_link']; ?>"></video>
          <?php }
          } ?>
        <div class="container max_w_100p">
            <?php if($prevData['banner_heading_before']){ 
                echo '<h1 class="banner-title-before">'.$prevData['banner_heading_before'].'</h1>';
             }  
             if($prevData['banner_heading']){
                 ?>
                 <h2 class="banner-heading" style="font-size: <?php echo $prevData['banner_heading_fs']; ?>px; line-height: <?php echo $prevData['banner_heading_fs'] + 20; ?>px; "><?php echo $prevData['banner_heading']; ?></h2>
                 <?php
             }    
             if($prevData['banner_sub_heading']){
                 echo '<h3 class="banner-title-after">'.$prevData['banner_sub_heading'].'</h3>';
             }

             if($prevData['banner_description']){
                echo '<p class="banner-description mb_85">'.$prevData['banner_description'].'</p>';
            }
            
            if($prevData['banner_heading_before']){
                echo '<p class="banner-actions"><a class="btn btn-primary r_30 px_30 py_15" href="'.$prevData['banner_action_link'].'"><i aria-hidden="true" class="'.$prevData['banner_action_icon'].' mr_20"></i>'.$prevData['banner_action_label'].'</a></p>';
            }
            ?>
        </div>
    </section>
<?php } ?>
<!-- Banner section end -->