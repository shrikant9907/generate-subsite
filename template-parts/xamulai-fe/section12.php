<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 
// $prevData['section12_overlay'] = "https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/XAMULAI-channel-banner.jpg"; 
if($autolpSettings['section_12'] && ($prevData['section12_heading'] || $prevData['section12_video_link'])){
    $videoType = getVideoUrlType($prevData['section12_video_link']);
?>
<section class="section-video common-section bg-white pt_80 pb_50">
    <div class="container">
        <?php if ($prevData['section12_heading']) { ?> 
            <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section12_heading']; ?></h2>
        <?php } ?>
        <div class="video-wr overflow-hidden">
            <?php 
                $videoType = getVideoUrlType($prevData['section12_video_link']);
                if ($videoType == 'youtube') { ?>
                <div id="ytbg" data-youtube="<?php echo $prevData['section12_video_link']; ?>"></div>
            <?php   } else if ($videoType == 'vimeo') {
                $vimeoArr = explode('?', $prevData['section12_video_link']);
                $vimeoVideo = $vimeoArr['0'] . '?autoplay=0';
                $playVimeoVideo = $vimeoArr['0'] . '?autoplay=1&loop=1&autopause=0&byline=0&title=0';
            ?>
                <iframe class="video-iframe" allowfullscreen="" src="<?php echo $vimeoVideo; ?>"></iframe>			
            <?php
                } 
            ?>
            <div class="custom-embed-play" data-playvideo="<?php echo $playVimeoVideo; ?>">
                <i class="eicon-play" aria-hidden="true"></i>
            </div>
            <?php if ($prevData['section12_video_thumbnail']) { ?>
            <div class="video_overlay">
                <img class="img-fluid w-100" src="<?php echo $prevData['section12_video_thumbnail']; ?>" alt="" />
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

