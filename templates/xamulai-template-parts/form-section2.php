<?php $session_data = $_SESSION['abandand_user_info']; ?>
 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section2" role="tabpanel" aria-labelledby="aglp-section2-tab">
    <div class="form-group">
        <label for="section2_heading" data-transkey="heading">Heading</label>
        <input id="section2_heading" maxlength="80" placeholder="eg. Do you have such a feeling ?" data-transkey="doYouHaveSuch" name="section2_heading" type="text" class="form-control"  value="<?php echo $session_data['section2_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <div class="repeater"> 
            <label class="f20" data-transkey="addCarouselItems">Add Carousel Items </label>
            <span class="f12 font-italic text-secondary" data-transkey="5orMoreItemsWillBeGood">( More than 5 section  will be good for this part )</span><br/>
            <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize">( Please add images of same or greater than 640X420 )</span>
        </div>
        <!-- Repeater Content -->
        <div id="repeaterS2" class="repeaterContainer relative pb_30 inner-form">
            
                <?php if($session_data['gs2']){ 
                        foreach($session_data['gs2'] AS $gs2){
                            $image = $gs2['section2_repeater_images'];
                            $section2_repeater_description = $gs2['section2_repeater_description']; 
                    ?>
                        <div class="items" data-group="gs2">
                            <div class="repeater-row">
                                <div class="form-row item-content">
                                <div class="col-11">
                                        
                                        <div class="form-group">
                                            <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                            <input class="urlInput" type="hidden" name="section2_repeater_images" data-name="section2_repeater_images" value="<?php echo $image; ?>" />
                                            <input class="form-control ajaxFileUpload" type="file" placeholder="Upload Image" data-transkey="uploadImage" />
                                        </div>
                                        <div class="form-group">
                                            <input maxlength="70" type="text" name="section2_repeater_description" data-name="section2_repeater_description"  id="section2_repeater_description"  class="form-control" value="<?php echo $section2_repeater_description; ?>" />
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
                 }else{ ?> 
                        <div class="items" data-group="gs2">
                            <div class="repeater-row">
                                <div class="form-row item-content">
                                <div class="col-11">
                                        <div class="form-group">
                                            <input class="urlInput" type="hidden" name="section2_repeater_images" data-name="section2_repeater_images" value="<?php echo $image; ?>" />
                                            <input class="form-control ajaxFileUpload" type="file" data-name="section2_repeater_images" name="section2_repeater_images" id="section2_repeater_images" placeholder="Upload Image" data-transkey="uploadImage">
                                        </div>
                                        <div class="form-group">
                                            <input maxlength="70" type="text" name="section2_repeater_description" data-name="section2_repeater_description"  id="section2_repeater_description" data-transkey="iWantEarnMore" placeholder="I want to earn more and become richer" class="form-control">
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