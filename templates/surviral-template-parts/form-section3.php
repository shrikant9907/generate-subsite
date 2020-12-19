<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- Leave it section Start-->
<div class="tab-pane fade" id="aglp-section3" role="tabpanel" aria-labelledby="aglp-section3-tab">
    <div class="form-group">
        <label for="leave_surviral_heading" data-transkey="heading">Heading</label>
        <input id="leave_surviral_heading" maxlength="80" data-transkey="leaveItSurviral" placeholder="Leave it to Surviral" name="leave_surviral_heading" type="text" class="form-control" value="<?php echo $session_data['leave_surviral_heading'] ?: ''; ?>"/>
    </div>
    <div class="form-group">
        <label for="leave_surviral_sub_heading" data-transkey="description">Description</label>
        <textarea maxlength="500" data-transkey="leaveSurviralSubHeading" placeholder="Surviral is an Instagram automated marketing tool powered by artificial intelligence.It is affordable, easy to use, and more effective than existing traditional marketing." type="text" class="form-control" name="leave_surviral_sub_heading" ><?php echo $session_data['leave_surviral_sub_heading'] ?: ''; ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
    <div class="form-group">
            <div class="mobile-screen">
            <label class="w-100" for="upload_mobile_screen" data-transkey="image">Image</label><span class="f12 font-italic text-secondary" data-transkey="pleaseAddImage" > ( Please add images of same or greater than 640X420 )</span><br/>
            <?php $image = $session_data['upload_mobile_screen'] ?: ''; ?>
            <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
            <input class="urlInput" type="hidden" name="upload_mobile_screen" value="<?php echo $image; ?>" />
            <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
        </div>
    </div>
</div>
<!-- Leave it section End-->