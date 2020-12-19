<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- Register now section Start-->
<div class="tab-pane fade" id="aglp-section5" role="tabpanel" aria-labelledby="aglp-section5-tab">
    <div class="form-group">
        <label class="w-100" for="register_now_background_image" data-transkey="backgroundImage">Background Image</label><br/>
        <?php $image = $session_data['register_now_background_image'] ?: ''; ?>
        <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
        <input class="urlInput" type="hidden" name="register_now_background_image" value="<?php echo $image; ?>" />
        <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
    </div>
    <div class="form-group">
        <label for="register_now_heading" data-transkey="heading">Heading</label>
        <input type="text" maxlength="90" name="register_now_heading" class="form-control" value="<?php echo $session_data['register_now_heading'] ?: ''; ?>" data-transkey="registerNow" placeholder="Register now! A limited number of free trial campaigns are in progress"  />
    </div>
    <div class="form-group">
        <label for="register_now_description" data-transkey="actionButton">Action Button</label>
        <div class="form-row mb_20">
            <div class="col">
            <select  name="register_now_icons" class="selectpicker form-control" data-live-search="true" value="<?php echo $session_data['register_now_icons'] ?: ''; ?>" >
                <?php fontawesome_icons($session_data['register_now_icons']); ?>
            </select>
            </div>
            <div class="col">
            <input placeholder="Add label eg. Get Started Now! " data-transkey="getStartNow" maxlength="34" name="register_now_button_label" type="text" class="form-control" value="<?php echo $session_data['register_now_button_label'] ?: ''; ?>" />
            </div>
        </div>
        <div class="form-row">
            <div class="col">
            <input maxlength="1000" id="register_now_button_link" data-transkey="addLink" placeholder="Add link eg. https://www.example.com" onchange="validateUrl(this)" name="register_now_button_link" type="text" class="form-control" value="<?php echo $session_data['register_now_button_link'] ?: ''; ?>" />
            </div>
        </div>
    </div>
</div>
<!-- Register now section End--> 