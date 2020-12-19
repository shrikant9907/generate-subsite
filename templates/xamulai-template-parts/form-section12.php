<?php $session_data = $_SESSION['abandand_user_info']; 
$image = $session_data['section12_video_thumbnail'];
?>
 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section12" role="tabpanel" aria-labelledby="aglp-section12-tab">
    <div class="form-group">
        <label for="section12_heading" data-transkey="heading">Heading</label>
        <input maxlength="80" id="section12_heading" data-transkey="toDreamersAround" placeholder="eg. To Dreamers around the World　Mentor's Message Video" name="section12_heading" type="text" class="form-control"  value="<?php echo $session_data['section12_heading'] ?: ''; ?>" />
    </div>

    <div class="form-group">
        <label for="section12_heading" data-transkey="addVideo">Add Video </label>
        <input maxlength="1000" id="section12_video_link" data-transkey="youtubeVideo" placeholder="Youtube/Vimeo/External Video URL. eg. https://player.vimeo.com/video/76979871" name="section12_video_link" type="text" class="form-control" value="<?php echo $session_data['section12_video_link'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label class="d-block" for="section12_video_thumbnail" data-transkey="videoThumbnail">Video Thumbnail</label>
        <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
        <input class="urlInput" type="hidden" name="section12_video_thumbnail" value="<?php echo $image; ?>" />
        <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
    </div>
</div>
<!--section End-->