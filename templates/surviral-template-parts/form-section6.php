<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- Why surviral section Start-->
<div class="tab-pane fade" id="aglp-section6" role="tabpanel" aria-labelledby="aglp-section6-tab">
    <div class="form-group">
        <label for="why_surviral_heading" data-transkey="heading">Heading</label>
        <input maxlength="90" data-transkey="whySurviral" placeholder="Why Surviral" name="why_surviral_heading" type="text" class="form-control" value="<?php echo $session_data['why_surviral_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="why_surviral_description" data-transkey="description">Description</label>
        <textarea maxlength="400" data-transkey="immenseEfficiency" placeholder="Immense efficiency and effectiveness made possible by artificial intelligence" name="why_surviral_description" type="text" class="form-control" ><?php echo $session_data['why_surviral_description'] ?: ''; ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
    <div class="form-group">
        <div class="repeater">   
            <div class="insta-add-button">
                <label class="heading1 f20" data-transkey="addCartItem">Add Card Items </label>
                <span class="f12 font-italic text-secondary" data-transkey="3or6willItems"> ( 3 or 6 items will be good for it. )</span><br/>
                <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize"> ( Please add images of same or greater than 640X420 )</span>
            </div>          
            <div id="repeaterS6" class="repeaterContainer relative pb_30 inner-form">
                <?php 
                if(isset($session_data['group-why-surviral'])){
                    foreach( $session_data['group-why-surviral'] as $s6item){
                    $image = $s6item['why_surviral_repater_images'];
                    $heading = $s6item['why_surviral_repater_heading'];
                    $desc  = $s6item['why_surviral_repater_description'];
                ?>
                <div class="items" data-group="group-why-surviral">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                    <input class="urlInput" type="hidden" data-name="why_surviral_repater_images" name="why_surviral_repater_images" value="<?php echo $image; ?>" />
                                    <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
                                </div>
                                <div class="form-group">
                                    <input maxlength="80" type="text" data-name="why_surviral_repater_heading" name="why_surviral_repater_heading" data-transkey="heading" placeholder="heading" class="form-control" value="<?php echo $heading; ?>" >
                                </div>
                                <div class="form-group">
                                    <input maxlength="80" type="text" data-name="why_surviral_repater_description" name="why_surviral_repater_description" data-transkey="description" placeholder="description" class="form-control" value="<?php echo $desc; ?>">
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
                <div class="items" data-group="group-why-surviral">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <?php $image = $session_data['why_surviral_repater_images'] ?: ''; ?>
                                    <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                    <input class="urlInput" type="hidden" data-name="why_surviral_repater_images" name="why_surviral_repater_images" value="<?php echo $image; ?>" />
                                    <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
                                </div>
                                <div class="form-group">
                                    <input maxlength="80" type="text" data-name="why_surviral_repater_heading" name="why_surviral_repater_heading" data-transkey="heading" placeholder="heading" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <input maxlength="80" type="text" data-name="why_surviral_repater_description" name="why_surviral_repater_description" data-transkey="description" placeholder="description" class="form-control">
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
<!--Why surviral section End--> 