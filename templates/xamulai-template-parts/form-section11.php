<?php $session_data = $_SESSION['abandand_user_info'];
$image = $session_data['section11_left_Image'];
 ?>
 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section11" role="tabpanel" aria-labelledby="aglp-section11-tab">
    <div class="form-group">
        <label for="section11_heading" data-transkey="heading">Heading</label>
        <input id="section11_heading" maxlength="80" data-transkey="messageFromMentor" placeholder="Message from the mentor" name="section11_heading" type="text" class="form-control"  value="<?php echo $session_data['section11_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label class="d-block" for="section11_left_Image" data-transkey="leftSectionImage">Left Section Image</label>
        <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
        <input class="urlInput" type="hidden" name="section11_left_Image" value="<?php echo $image; ?>" />
        <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
    </div>
    <div class="form-group">
        <label for="section11_m_message_h" data-transkey="mentorMessageHeading">Mentor Message Heading</label>
        <input id="section11_m_message_h" maxlength="80" data-transkey="section11Xamulai" placeholder="XAMULAI" name="section11_m_message_h" type="text" class="form-control"  value="<?php echo $session_data['section11_m_message_h'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="section11_mentor_des" data-transkey="mentorMessageDescription">Mentor Description</label>
        <textarea class="form-control w-100" maxlength="3000" rows="7" id="section11_editor" name="section11_mentor_des"><?php echo $session_data['section11_mentor_des'] ?: '';?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
</div>  
<!--section End-->