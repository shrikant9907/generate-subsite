<?php $session_data = $_SESSION['abandand_user_info']; ?>
<div class="tab-pane fade show active" id="aglp-section1" role="tabpanel" aria-labelledby="aglp-section1-tab">
    <div class="form-group">
        <label for="banner_video_link" data-transkey="backgroundVideoUrl">Background Video URL</label>
        <label data-transkey="pleaseAddValidVideoUrl" class="error videoUrlValidate hide">Please add valid video Url.</label>
        <input onchange="validateVideoUrl(this)" id="banner_video_link" maxlength="1000" ata-transkey="youtubeVideo" placeholder="Youtube/Vimeo/External Video URL. eg. https://player.vimeo.com/video/76979871" name="banner_video_link" type="text" class="form-control" value="<?php echo $session_data['banner_video_link'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="banner_heading_before" data-transkey="textBeforeHeading">Text Before Heading</label>
        <input id="banner_heading_before" data-transkey="surviral" placeholder="eg. Surviral" maxlength="80" name="banner_heading_before" type="text" class="form-control" value="<?php echo $session_data['banner_heading_before'] ?: ''; ?>" />
    </div>
    <div class="form-row">
        <div class="col-8">
            <div class="form-group">
            <label for="banner_heading" data-transkey="heading">Heading</label>
            <input id="banner_heading" maxlength="50" placeholder="eg. surviral" ata-transkey="egSurviral" name="banner_heading" type="text" class="form-control" value="<?php echo $session_data['banner_heading'] ?: ''; ?>" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
            <label for="banner_heading_fs" data-transkey="fontSize">Font size (px)</label>
            <input id="banner_heading_fs" placeholder="eg. 24" min="20" max="192" name="banner_heading_fs" type="number" class="form-control" value="<?php echo $session_data['banner_heading_fs'] ?: '192'; ?>" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="banner_description" data-transkey="shortDescription">Short Description</label>
        <textarea id="banner_description" maxlength="145" data-transkey="aiBasedAutomated"placeholder="eg. Introducing the strongest AI based automated customer interaction tool." name="banner_description" type="text" class="form-control" ><?php echo htmlspecialchars($session_data['banner_description'] ?: ''); ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
    <div class="form-group">
        <label for="banner_description" data-transkey="actionButton">Action Button</label>
        <div class="form-row mb_20">
            <div class="col">
            <select  name="banner_action_icon" class="selectpicker form-control" data-live-search="true" value="<?php echo $session_data['banner_action_icon'] ?: ''; ?>">
                <?php fontawesome_icons($session_data['banner_action_icon']); ?>
            </select>
            </div>
            <div class="col">
            <input placeholder="Add label eg. Get Started Now!" data-transkey="getStartedNow" name="banner_action_label" maxlength="34" type="text" class="form-control" value="<?php echo $session_data['banner_action_label'] ?: ''; ?>" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
            <input id="banner_action_link" maxlength="1000" data-transkey="addLink" placeholder="Add link eg. https://www.example.com" onchange="validateUrl(this)" name="banner_action_link" type="text" class="form-control" value="<?php echo $session_data['banner_action_link'] ?: ''; ?>"/>
            </div>
        </div>
    </div>
</div>