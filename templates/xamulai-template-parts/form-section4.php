<?php $session_data = $_SESSION['abandand_user_info'];
    $image = $session_data['section4_image'];
?>

 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section4" role="tabpanel" aria-labelledby="aglp-section4-tab">
    <div class="form-group">
        <label for="section4_heading" data-transkey="heading">Heading</label>
        <input id="section4_heading" maxlength="80" data-transkey="itWasCreatedForYou" placeholder="It was created for you" name="section4_heading" type="text" class="form-control"  value="<?php echo $session_data['section4_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="section4_description" data-transkey="description">Description</label>
        <textarea maxlength="300" data-transkey="xamulaiGlobalEntrepreneurship" placeholder="XAMULAI Global Entrepreneurship School is an online school & community for those who want to succeed in global entrepreneurship and who want to live a better life ." name="section4_description" id="section4_description" cols="15" rows="3"  class="form-control"><?php echo $session_data['section4_description'] ?: '';   ?></textarea> 
        <?php echo lineBreakTags(); ?>
    </div>

    <div class="form-group">
        <label class="d-block" for="section4_image" data-transkey="fullWidthImage">Full Width Image</label>
        <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
        <input class="urlInput" type="hidden" name="section4_image" value="<?php echo $image; ?>" />
        <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
    </div>
</div>    
<!--section End-->