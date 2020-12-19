<?php $session_data = $_SESSION['abandand_user_info'];
    $image = $session_data['section7_left_Image']; 
 ?>
 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section7" role="tabpanel" aria-labelledby="aglp-section7-tab">
    <div class="form-group">
        <label for="section7_heading" data-transkey="heading">Heading</label>
        <input id="section7_heading" maxlength="80" data-transkey="whoDoYouLearnFrom" placeholder="Who do you learn from? Mentor introduction" name="section7_heading" type="text" class="form-control"  value="<?php echo $session_data['section7_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label class="d-block" for="section7_left_Image" data-transkey="leftSectionImage">Left Section Image</label>
        <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
        <input class="urlInput" type="hidden" name="section7_left_Image" value="<?php echo $image; ?>" />
        <input class="form-control ajaxFileUpload" type="file" name="section7_left_Image" id="section7_left_Image" data-transkey="uploadImage" placeholder="Upload Image">
    </div>
    <div class="form-group">
        <label for="section7_left_heading" data-transkey="headingAfterImage">Heading after image</label>
        <input id="section7_left_heading" maxlength="80" data-transkey="xamulai" placeholder="XAMULAI" name="section7_left_heading" type="text" class="form-control"  value="<?php echo $session_data['section7_left_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="section7_mentor_des" data-transkey="rightDescription">Right Description</label>
        <textarea class='form-control w-100' maxlength="3000" rows="10" name="section7_mentor_des"><?php echo $session_data['section7_mentor_des']; ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
 </div>  
<!--section End-->