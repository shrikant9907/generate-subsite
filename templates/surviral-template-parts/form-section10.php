<?php $session_data = $_SESSION['abandand_user_info']; ?>
 <!-- Automated Surviral Start-->
 <div class="tab-pane fade" id="aglp-section10" role="tabpanel" aria-labelledby="aglp-section10-tab">
    <div class="form-group">
        <label for="automated_heading" data-transkey="heading">Heading</label><br/>
        <input type="text" maxlength="90" name="automated_heading" type="text" class="form-control" placeholder="List of Functions that can be Automated at Surviral" data-transkey="listOfFunction" value="<?php echo $session_data['automated_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="list_function_desc" data-transkey="description">Description</label>
        <textarea maxlength="300" id="list_function_desc" data-transkey="oneceYouHave" placeholder="Once you have decided the rules, leave the troublesome work to us" name="list_function_desc" type="text" class="form-control" ><?php echo $session_data['list_function_desc'] ?: ''; ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
    <div class="form-group">
        <div class="repeater">       
            <div class="insta-add-button">
            <label class="heading1 f20" data-transkey="addCartItem">Add Card Items</label>
            <span class="f12 font-italic text-secondary" data-transkey="3or6willItems">( 3 or 6 items will be good for it. )</span><br/>
            </div>                                                         
            <div id="repeaterS10" class="repeaterContainer relative pb_30 inner-form"> 
            <?php 
             $group_automated_surviral = array_map('array_filter', $session_data['group-automated-surviral']);
             $group_automated_surviral = array_filter($group_automated_surviral);
            if(isset($group_automated_surviral)){
                foreach($session_data['group-automated-surviral'] as $s10item){
                $icon = $s10item['automated_upload_icons'];
                $title = $s10item['automated_text'];
                $desc = $s10item['automated_description'];
            ?>
            <div class="items" data-group="group-automated-surviral">  
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <select  data-name="automated_upload_icons" name="automated_upload_icons" class="selectpicker form-control" data-live-search="true" value="<?php echo $icon ?: ''; ?>">
                                    <?php fontawesome_icons($icon); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input maxlength="80" type="text" data-name="automated_text" name="automated_text" data-transkey="addTittle" placeholder="Add title" class="form-control" value="<?php echo $title; ?>" />
                            </div>
                            <div class="form-group">
                                <input maxlength="80" type="text" data-name="automated_description" name="automated_description" data-transkey="addShotDescription" placeholder="Add short description" class="form-control" value="<?php echo $desc; ?>">
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
            <div class="items" data-group="group-automated-surviral">
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <select  data-name="automated_upload_icons" name="automated_upload_icons" class="selectpicker form-control" data-live-search="true" value="<?php echo $session_data['register_now_new_button_icons'] ?: ''; ?>">
                                    <?php fontawesome_icons($session_data['register_now_new_button_icons']); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" data-name="automated_text" name="automated_text" placeholder="Interest" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" data-name="automated_description" name="automated_description" data-transkey="likePost" placeholder="Like posts of your target audience" class="form-control">
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
<!-- Automated Surviralrepeat End--> 