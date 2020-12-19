<?php $session_data = $_SESSION['abandand_user_info']; 
    $repeater8 = $session_data['gs8'];
?>
 <!--section Start-->
<div class="tab-pane fade" id="aglp-section8" role="tabpanel" aria-labelledby="aglp-section8-tab">
    <div class="form-group">
        <label for="section8_heading" data-transkey="heading">Heading</label>
        <input id="section8_heading" maxlength="80" data-transkey="usefulConetntFul" placeholder="Useful content full of volume ?" name="section8_heading" type="text" class="form-control"  value="<?php echo $session_data['section8_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <div class="repeater">
            <label data-transkey="addCarouselItems" class="f20">Add Carousel Items </label>
            <span class="f12 font-italic text-secondary" data-transkey="5moreItemGood">( More than 5 section  will be good for this part )</span><br/>
            <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize">( Please add images of same or greater than 640X420 )</span>
        </div>
        <!-- Repeater Content -->
        <div id="repeaterS8" class="repeaterContainer relative pb_30 inner-form">
        <?php
            if ($repeater8) {
            foreach($repeater8 as $item) { 
            $image = $item['section8_repeater_images'];
            $desc = $item['section8_repeater_descriptions'];
            ?>
            <div class="items" data-group="gs8">
            <div class="repeater-row item-content">
                <div class="form-row">
                    <div class="col-11">
                        <div class="form-group">
                            <input class="urlInput" type="hidden" name="section8_repeater_images" data-name="section8_repeater_images" value="<?php echo $image; ?>" />
                            <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
                        </div>
                        <div class="form-group">
                            <input maxlength="80" type="text" value="<?php echo $desc; ?>" data-name="section8_repeater_descriptions" name="section8_repeater_description" id="section8_repeater_description" placeholder="I want to earn more and become richer" data-transkey="iWantToEarnMore" class="form-control">
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
            <div class="items" data-group="gs8">
            <div class="repeater-row item-content">
                <div class="form-row">
                    <div class="col-11">
                        <div class="form-group">
                            <input class="urlInput" type="hidden" name="section8_repeater_images" data-name="section8_repeater_images" value="<?php echo $image; ?>" />
                            <input class="form-control ajaxFileUpload" type="file" placeholder="Upload Image" data-transkey="uploadImage">
                        </div>
                        <div class="form-group">
                            <input maxlength="80" type="text" value="<?php echo $desc; ?>" data-name="section8_repeater_descriptions" name="section8_repeater_description" id="section8_repeater_description" placeholder="I want to earn more and become richer" data-transkey="iWantToEarnMore" class="form-control">
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