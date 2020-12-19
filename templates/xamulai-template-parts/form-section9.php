<?php $session_data = $_SESSION['abandand_user_info'];  ?>
 <!-- Register now repeat Start-->
    <div class="tab-pane fade" id="aglp-section9" role="tabpanel" aria-labelledby="aglp-section9-tab">
        <div class="form-group">
            <label for="section5_copy" data-transkey="same5Section">Same as 5th section</label>
            <input type="checkbox" name="section5_copy" <?php echo $session_data['section5_copy'] ? 'checked' : ''; ?> />
        </div>
        <?php 
        // After check class show and hide 
        $checked_class = $session_data['section5_copy'] ? 'disabled' : 'Show';
        ?>
        <div id="section9_bg_image" class="form-group <?php echo $checked_class; ?>">
            <label class="d-block" for="section9_bg_image" data-transkey="backgroundImage">Background Image</label>
            <?php $image = $session_data['section9_bg_image'] ?: ''; ?>
            <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
            <input class="urlInput" type="hidden" name="section9_bg_image" value="<?php echo $image; ?>" />
            <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
        </div>
        <div id="section9_heading" class="form-group  <?php echo $checked_class; ?>">
            <label for="section9_heading" data-transkey="heading">Heading</label>
            <input maxlength="80" data-transkey="registerNow" placeholder="Register now! A limited number of free trial campaigns are in progress" name="section9_heading" type="text" class="form-control" value="<?php echo $session_data['section9_heading'] ?: '';  ?>" />
        </div>
        <div id="section9_repeater" class="form-group  <?php echo $checked_class; ?>">
            <label for="register_now_button" data-transkey="actionButton">Action Button</label>
            <div class="form-row mb_20">
                <div class="col">
                <select  name="section9_bt_icons" class="selectpicker form-control" data-live-search="true" value="<?php echo $session_data['section9_bt_icons'] ?: ''; ?>">
                    <?php fontawesome_icons($session_data['section9_bt_icons']); ?>
                </select>
                </div>
                <div class="col">
                <input placeholder="Add label eg. Get Started Now! " data-transkey="getStartedNow" maxlength="34" name="section9_bt_label" type="text" class="form-control" value="<?php echo $session_data['section9_bt_label'] ?: ''; ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                <input id="section9_bt_link" data-transkey="addLink" placeholder="Add link eg. https://www.example.com" onchange="validateUrl(this)" name="section9_bt_link" type="text" class="form-control" value="<?php echo $session_data['section9_bt_link'] ?: ''; ?>" />
                </div>
            </div>
        </div>
    </div>

<!-- Register now repeat End--> 