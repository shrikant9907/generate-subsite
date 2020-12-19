<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- 3 steps section Start-->
<div class="tab-pane fade" id="aglp-section7" role="tabpanel" aria-labelledby="aglp-section7-tab">
<div class="form-group">
    <label for="step_heading" data-transkey="heading" >Heading</label>
    <input maxlength="80" data-transkey="stepHeading" placeholder="Step Heading" name="step_heading" type="text" class="form-control" value="<?php echo $session_data['step_heading'] ?: ''; ?>" />
</div>
<div class="form-group">
    <label for="step_description" data-transkey="description">Description</label>
    <textarea maxlength="200" data-transkey="immenseEfficiency" placeholder="Immense efficiency and effectiveness made possible by artificial intelligence" name="step_description" type="text" class="form-control" ><?php echo $session_data['step_description'] ?: ''; ?></textarea>
    <?php echo lineBreakTags(); ?>
</div>
<div class="form-group">
    <div class="repeater">    
        <div class="insta-add-button">
        <label class="heading1 f20" data-transkey="addCartItem">Add Card Items </label>
            <span class="f12 font-italic text-secondary" data-transkey="3or6willItems"> ( 3 or 6 items will be good for it. )</span><br/>
            <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize"> ( Please add image of same or greater than 512X1200 resolution )</span>
        </div>        
        <div id="repeaterS7" class="repeaterContainer relative pb_30 inner-form">
            <?php 
            //   $group_three_steps = array_map('array_filter', $session_data['group-three-steps']);
            //   $group_three_steps = array_filter($group_three_steps);
            if($session_data['group-three-steps']){
                foreach($session_data['group-three-steps'] as $s7item){
                    $image = $s7item['step_repeater_images'];
                    $heading = $s7item['steps_repeater_heading'];
                    $desc  = $s7item['steps_repeater_description'];
                    // if(!empty($image) && !empty($heading) && !empty($desc)){
            ?>
            <div class="items" data-group="group-three-steps">  
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                <input class="urlInput" type="hidden" data-name="step_repeater_images" name="step_repeater_images" value="<?php echo $image; ?>" />
                                <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
                            </div>
                            <div class="form-group">
                                <input maxlength="80" type="text" data-name="steps_repeater_heading" name="steps_repeater_heading" data-transkey="stepsRepeterHeading" placeholder="Steps Repeater Heading" class="form-control" value="<?php echo $heading; ?>" />
                            </div>
                            <div class="form-group">
                                <input maxlength="200" type="text" data-name="steps_repeater_description" name="steps_repeater_description" placeholder="description" data-transkey="description" class="form-control" value="<?php echo $desc; ?>">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="repeater-remove-btn">
                                    <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                // }
                }
            } else { ?>
            <div class="items" data-group="group-three-steps">  
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <?php $image = $session_data['step_repeater_images'] ?: ''; ?>
                                <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                <input class="urlInput" type="hidden" name="step_repeater_images" data-name="step_repeater_images" value="<?php echo $image; ?>" />
                                <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
                            </div>
                            <div class="form-group">
                                <input maxlength="80" type="text" name="steps_repeater_heading" data-name="steps_repeater_heading" data-transkey="stepsRepeterHeading" placeholder="Steps Repeater Heading" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input maxlength="200" type="text" name="steps_repeater_description" data-name="steps_repeater_description" placeholder="description" data-transkey="description" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="repeater-remove-btn">
                                    <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <?php } ?>
            <div class="d-flex justify-content-between absolute w-100 fixed_bottom">
                <button type="button" class="btn btn-sm btn-primary repeater-add-btn" data-transkey="addNewFields">
                    Add New Fields
                </button>
                <button type="button" class="btn btn-sm btn-primary repeater-clone-btn" data-transkey="duplicateLastFields">
                    Duplicate Last Fields
                </button>
            </div>
        </div>
    </div>
</div> 

</div>
<!--3 steps section End--> 