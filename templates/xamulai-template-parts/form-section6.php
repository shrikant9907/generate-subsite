<?php $session_data = $_SESSION['abandand_user_info']; ?>
 <!--section Start-->
 <div class="tab-pane fade" id="aglp-section6" role="tabpanel" aria-labelledby="aglp-section6-tab">
    <div class="form-group">
        <label for="section6_heading" data-transkey="heading">Heading</label>
        <input id="section6_heading" maxlength="80" data-transkey="threeMajorBenefits" placeholder="Three major benefits you can get at school" name="section6_heading" type="text" class="form-control"  value="<?php echo $session_data['section6_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="section6_sub_heading" data-transkey="subHeading">Sub Heading</label>
        <input id="section6_sub_heading" maxlength="90" data-transkey="imNotAlone" placeholder="I'm not alone! Let's make that dream come true with friends" name="section6_sub_heading" type="text" class="form-control"  value="<?php echo $session_data['section6_sub_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <div class="repeater">
            <label class="f20" data-transkey="addCarouselItems">Add Carousel Items </label>
            <span class="f12 font-italic text-secondary" data-transkey="3ItemsGood">( 3 section  will be good for this part )</span><br/>
            <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize">( Please add images of same or greater than 640X420 )</span>
        </div>
        <!-- Repeater Content -->
        <div id="repeaterS6" class="repeaterContainer relative pb_30 inner-form">
               <?php if($session_data['gs6']){
                   foreach( $session_data['gs6'] AS $gs6 ){
                       $image = $gs6['section6_repeater_images']; 
                       $section6_repeater_heading = $gs6['section6_repeater_heading']; 
                       $section6_repeater_description = $gs6['section6_repeater_description']; 
                   ?> 
                    <div class="items" data-group="gs6">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-11">
                                <div class="form-group">
                                <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                    <input class="urlInput" type="hidden" name="section6_repeater_images" data-name="section6_repeater_images" value="<?php echo $image; ?>" />
                                    <input class="form-control ajaxFileUpload" type="file" placeholder="Upload Image" data-transkey="uploadImage"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="80" data-name="section6_repeater_heading" name="section6_repeater_heading" id="section6_repeater_heading" data-transkey="gainSkills" placeholder="Gain skills to earn in the world!" class="form-control" value="<?php echo $section6_repeater_heading; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="80" data-name="section6_repeater_description" name="section6_repeater_description" id="section6_repeater_description" data-transkey="learnBussinessSkills" placeholder="Learn business skills that work anywhere in the world" class="form-control" value="<?php echo $section6_repeater_description; ?>">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <!-- Repeater Remove Btn -->
                                <div class="repeater-remove-btn">
                                    <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
               <?php }
               }else{ ?>
                    <div class="items" data-group="gs6">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-11">
                                <div class="form-group">
                                    <input class="urlInput" type="hidden" name="section6_repeater_images" data-name="section6_repeater_images" value="<?php echo $image; ?>" />
                                    <input class="form-control ajaxFileUpload" type="file" data-name="section6_repeater_images" name="section6_repeater_images" id="section6_repeater_images" placeholder="Upload Image" data-transkey="uploadImage">
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="80" data-name="section6_repeater_heading" name="section6_repeater_heading" id="section6_repeater_heading" placeholder="Gain skills to earn in the world!" data-transkey="gainSkills" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="80" data-name="section6_repeater_description" name="section6_repeater_description" id="section6_repeater_description" data-transkey="learnBussinessSkills" placeholder="Learn business skills that work anywhere in the world" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <!-- Repeater Remove Btn -->
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