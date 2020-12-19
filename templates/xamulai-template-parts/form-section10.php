<?php $session_data = $_SESSION['abandand_user_info']; ?>

 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section10" role="tabpanel" aria-labelledby="aglp-section10-tab">
    <div class="form-group">
        <label for="section10_heading" data-transkey="heading">Heading</label>
        <input id="section10_heading" maxlength="80" data-transkey="whyAreYouChose" placeholder="Why are you chosen?　There is a reason for that." name="section10_heading" type="text" class="form-control"  value="<?php echo $session_data['section10_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="section10_sub_heading" data-transkey="subHeading">Sub Heading</label>
        <input id="section10_sub_heading" maxlength="90" data-transkey="thereIsReason" placeholder="There is a reason to be chosen among the many paid communities" name="section10_sub_heading" type="text" class="form-control"  value="<?php echo $session_data['section10_sub_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <div class="repeater">
            <label data-transkey="addSections" data-transkey="addSection" class="f20">Add Sections </label>
            <span class="f12 font-italic text-secondary" data-transkey="3ItemsGood">( 3 section  will be good for this part )</span><br/>
            <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize">( Please add images of same or greater than 640X420 )</span>
        </div>
        <!-- Repeater Content -->
        <div id="repeaterS10" class="repeaterContainer relative pb_30 inner-form">
        <?php
        if($session_data['gs10']){
                foreach($session_data['gs10'] AS $gs10){
                    $image = $gs10['section10_repeater_images'];
                    $section10_repeater_heading = $gs10['section10_repeater_heading'];
                    $section10_repeater_description = $gs10['section10_repeater_description']; 
            ?>
            <div class="items" data-group="gs10">
            <div class="repeater-row item-content">
                <div class="form-row">
                    <div class="col-11">
                        <div class="form-group">
                            <input class="urlInput" type="hidden" name="section10_repeater_images" data-name="section10_repeater_images" value="<?php echo $image; ?>" />
                            <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
                        </div>
                        <div class="form-group">
                            <input type="text" maxlength="80" value="<?php echo $section10_repeater_heading; ?>" name="section10_repeater_heading" data-name="section10_repeater_heading" id="section10_repeater_heading" placeholder="Gain skills to earn in the world!" data-transkey="gainSkilsToLearn" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" maxlength="80" value="<?php echo $section10_repeater_description; ?>" name="section10_repeater_description" data-name="section10_repeater_description" id="section10_repeater_description" data-transkey="learnnBussinessSkils" placeholder="Learn business skills that work anywhere in the world" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="repeater-remove-btn">
                            <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
               <?php } 
        } else { ?>
            <div class="items" data-group="gs10">
            <div class="repeater-row item-content">
                <div class="form-row">
                    <div class="col-11">
                        <div class="form-group">
                            <input class="urlInput" type="hidden" name="section10_repeater_images" data-name="section10_repeater_images" value="<?php echo $image; ?>" />
                            <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
                        </div>
                        <div class="form-group">
                            <input type="text" maxlength="80" value="<?php echo $section10_repeater_heading; ?>" name="section10_repeater_heading" data-name="section10_repeater_heading" id="section10_repeater_heading" placeholder="Gain skills to earn in the world!" data-transkey="gainSkilsToLearn" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" maxlength="80" value="<?php echo $section10_repeater_description; ?>" name="section10_repeater_description" data-name="section10_repeater_description" id="section10_repeater_description" placeholder="Learn business skills that work anywhere in the world" data-transkey="learnnBussinessSkilsThat"class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="repeater-remove-btn">
                            <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
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
        <!-- Repeater End -->
    </div>
</div>
<!--section End-->