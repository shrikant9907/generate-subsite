<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- Register now section Start-->
<div class="tab-pane fade" id="aglp-section5" role="tabpanel" aria-labelledby="aglp-section5-tab">
    <div class="form-group">
        <label class="d-block" for="section5_bg_image" data-transkey="backgroundImage">Background Image</label>
        <?php $image = $session_data['section5_bg_image'] ?: ''; ?>
        <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
        <input class="urlInput" type="hidden" name="section5_bg_image" value="<?php echo $image; ?>" />
        <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
    </div>
    <div class="form-group">
        <label for="section5_heading" data-transkey="heading">Heading</label>
        <input maxlength="80" type="text" name="section5_heading" class="form-control" value="<?php echo $session_data['section5_heading'] ?: ''; ?>" placeholder="Register now! A limited number of free trial campaigns are in progress"  data-transkey="registerNow"/ >
    </div>
    <div class="form-group">
        <label for="section5_button" data-transkey="actionButton">Action Button</label>
        <div class="form-row mb_20">
            <div class="col">
            <select  name="section5_bt_icons" class="selectpicker form-control" data-live-search="true" value="<?php echo $session_data['section5_bt_icons'] ?: ''; ?>" >
                <?php fontawesome_icons($session_data['section5_bt_icons']); ?>
            </select>
            </div>
            <div class="col">
                <input placeholder="Add label eg. Get Started Now! " data-transkey="addlabel" maxlength="34" name="section5_bt_label" type="text" class="form-control" value="<?php echo $session_data['section5_bt_label'] ?: ''; ?>" />
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input maxlength="400" id="section5_bt_link" data-transkey="addLink" placeholder="Add link eg. https://www.example.com" onchange="validateUrl(this)" name="section5_bt_link" type="text" class="form-control" value="<?php echo $session_data['section5_bt_link'] ?: ''; ?>" />
            </div>
        </div>
    </div>
</div>
<!-- Register now section End--> 