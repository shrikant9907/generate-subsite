<?php $session_data = $_SESSION['abandand_user_info']; ?>
 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section3" role="tabpanel" aria-labelledby="aglp-section3-tab">
    <div class="form-group">
        <label for="section3_heading" data-transkey="heading">Heading</label>
        <input id="section3_heading" maxlength="80" data-transkey="butOftenHear" placeholder="eg. But I often hear this voice" name="section3_heading" type="text" class="form-control"  value="<?php echo $session_data['section3_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <div class="repeater">
            <label class="f20" data-transkey="addCarouselItems">Add Carousel Items </label>
            <span class="f12 font-italic text-secondary" data-transkey="3or6ItemsWillBeGood">( 3 or 6 items will be good for it. )</span><br/>
            <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize">( Please add images of same or greater than 640X420 )</span>
        </div>
        <!-- Repeater Content -->
        <div id="repeaterS3" class="repeaterContainer relative pb_30 inner-form">
                <?php
                if($session_data['gs3']){
                        foreach($session_data['gs3'] AS $gs3){
                            $image = $gs3['section3_repeater_images'];
                            $section3_repeater_description = $gs3['section3_repeater_description']; 
                    ?>
                    <div class="items" data-group="gs3">  
                    <div class="repeater-row item-content" >
                        <div class="form-row">
                            <div class="col-11">
                                <div class="form-group">
                                    <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                    <input class="urlInput" type="hidden" name="section3_repeater_images" data-name="section3_repeater_images" value="<?php echo $image; ?>" />
                                    <input class="form-control ajaxFileUpload" type="file" placeholder="Upload Image" data-transkey="uploadImage" />
                                </div>
                                <div class="form-group">
                                    <input maxlength="70" type="text" data-name="section3_repeater_description" name="section3_repeater_description" id="section3_repeater_description" data-transkey="iDontKnow" placeholder="I don't know what to start with" class="form-control" value="<?php echo $section3_repeater_description; ?>" >
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="repeater-remove-btn">
                                    <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Repeater Remove Btn -->
                    </div>
                    </div>
                <?php } 
                    }else{ ?>
                    <div class="items" data-group="gs3">  
                    <div class="repeater-row item-content" >
                            <div class="form-row">
                                <div class="col-11">
                                    <div class="form-group">
                                        <input class="urlInput" type="hidden" name="section3_repeater_images" data-name="section3_repeater_images" value="<?php echo $image; ?>" />
                                        <input class="form-control ajaxFileUpload" type="file" data-name="section3_repeater_images" name="section3_repeater_images" id="section3_repeater_images" placeholder="Upload Image" data-transkey="uploadImage">
                                    </div>
                                    <div class="form-group">
                                        <input maxlength="70" type="text" data-name="section3_repeater_description" name="section3_repeater_description" id="section3_repeater_description" data-transkey="iDontKnow" placeholder="I don't know what to start with" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="repeater-remove-btn">
                                        <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeater Remove Btn -->
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