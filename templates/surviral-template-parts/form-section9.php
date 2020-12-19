<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- AI Intelligence Targeting Start-->
<div class="tab-pane fade" id="aglp-section9" role="tabpanel" aria-labelledby="aglp-section9-tab">
    <div class="form-group">
        <label for="ai_heading" data-transkey="heading">Heading</label><br/>
        <input maxlength="90" type="text" name="ai_heading" type="text" class="form-control" value="<?php echo $session_data['ai_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="ai_description" data-transkey="description">Description</label>
        <textarea maxlength="400" data-transkey="artificialIntelligenceTargeting" placeholder="Artificial Intelligence Targeting" name="ai_description" type="text" class="form-control"><?php echo $session_data['ai_description'] ?: ''; ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
    <div class="form-group">
        <div class="repeater">   
            <div class="insta-add-button">
            <label class="heading1 f20" data-transkey="addCartItem">Add Card Items</label>
            </div>    
            <div id="repeaterS9" class="repeaterContainer relative pb_30 inner-form">                            
            <?php 
            if($session_data['group-ai-repeater']){
                foreach($session_data['group-ai-repeater'] as $s9item){
                    $icon = $s9item['ai_upload_icons'];
                    $title = $s9item['ai_repeater_text'];
                ?>
                <div class="items" data-group="group-ai-repeater">  
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <select  name="ai_upload_icons" data-name="ai_upload_icons" class="selectpicker form-control" data-live-search="true" value="<?php echo $icon ?: ''; ?>">
                                        <?php fontawesome_icons($icon); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input maxlength="80" type="text" name="ai_repeater_text" data-name="ai_repeater_text" data-transkey="interest" placeholder="Interest" class="form-control" value="<?php echo $title; ?>">
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
                    
                }
            } else { ?>
                <div class="items" data-group="group-ai-repeater">  
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <select  name="ai_upload_icons" data-name="ai_upload_icons" class="selectpicker form-control" data-live-search="true" value="<?php echo $session_data['register_now_new_button_icons'] ?: ''; ?>">
                                        <?php fontawesome_icons($session_data['register_now_new_button_icons']); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input maxlength="80" type="text" name="ai_repeater_text" data-name="ai_repeater_text" data-transkey="interest" placeholder="Interest" class="form-control">
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
<!-- AI Intelligence repeat End--> 