<?php $session_data = $_SESSION['abandand_user_info']; ?>
 <!-- Why instagram section Start-->
 <div class="tab-pane fade" id="aglp-section4" role="tabpanel" aria-labelledby="aglp-section4-tab">
    <div class="form-group">
        <label for="why_insta_heading" data-transkey="heading">Heading</label>
        <input maxlength="80" data-transkey="whyIsInstagram" placeholder="Why is Instagram important?" name="why_insta_heading" type="text" class="form-control" value="<?php echo $session_data['why_insta_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="why_insta_sub_heading" data-transkey="description">Description</label>
        <textarea maxlength="500" id="why_insta_sub_heading" data-transkey="whyInstagramSub" placeholder="Instagram is a fantastic platform for the most effective marketing nowadays" type="text" class="form-control" name="why_insta_sub_heading" ><?php echo $session_data['why_insta_sub_heading'] ?: ''; ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
    <div class="form-group">
        <div class="repeater">
            <div class="insta-add-button">
            <label class="heading1 f20" data-transkey="addCardItems"> Add Card Items </label>
            <span class="f12 font-italic text-secondary" data-transkey="3ItemGood"> ( Max 3 items will be good for it. )</span><br/>
                   <span class="f10 font-italic text-secondary"  data-transkey="pleaseAddImagesOfSize"> ( Please add images of same or greater than 640X420 )</span>
            </div>
            <div id="repeaterS3" class="repeaterContainer relative pb_30 inner-form">
                <?php 
                // check empty array or not 
                // $keys = array('add_insta_image', 'add_insta_heading', 'add_insta_user_counter', 'add_insta_description');
                // $repeater_value = check_repeater_value($session_data['group-insta'], $keys);
                $group_insta = array_map('array_filter', $session_data['group-insta']);
                $group_insta = array_filter($group_insta);
                if(!empty($group_insta)){
                    foreach($group_insta as $s4item){
                        $image = $s4item['add_insta_image'];
                        $heading = $s4item['add_insta_heading'];
                        $counter  = $s4item['add_insta_user_counter'];
                        $desc  = $s4item['add_insta_description'];
                   // if( !empty($image) || !empty($heading) || !empty($counter) || !empty($desc) ){
                ?>
                <div class="items" data-group="group-insta">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-md-11">
                                <div class="form-group">
                                <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                <input class="urlInput" type="hidden" data-name="add_insta_image" name="add_insta_image" value="<?php echo $image; ?>" />
                                <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
                                </div>
                                <div class="form-group">
                                <input maxlength="80" class="form-control" type="text" data-name="add_insta_heading" name="add_insta_heading" data-transkey="addTitle" placeholder="Add title" value="<?php echo $heading; ?>">
                                </div>
                                <div class="form-group">
                                <input maxlength="80" class="form-control" type="text" data-name="add_insta_user_counter" name="add_insta_user_counter" data-transkey="addNumber" placeholder="Add numbers" value="<?php echo $counter; ?>">
                                </div>
                                <div class="form-group">
                                <input maxlength="80" class="form-control" type="text" data-name="add_insta_description" name="add_insta_description" data-transkey="addShotDescription" placeholder="Add short description" value="<?php echo $desc; ?>">
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
                        <?php // }
                        }
                    } else { ?>
                <div class="items" data-group="group-insta">
                    <div class="repeater-row item-content" >
                        <div class="form-row">
                            <div class="col-md-11">
                                <div class="form-group">
                                <?php $image = $session_data['add_insta_image'] ?: ''; ?>
                                <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                <input class="urlInput" type="hidden" data-name="add_insta_image" name="add_insta_image" value="" />
                                <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
                                </div>
                                <div class="form-group">
                                <input maxlength="80" class="form-control" type="text" data-name="add_insta_heading" name="add_insta_heading" data-transkey="heading"  placeholder="Heading">
                                </div>
                                <div class="form-group">
                                <input maxlength="80" class="form-control" type="text" data-name="add_insta_user_counter" name="add_insta_user_counter" data-transkey="addInstsUser" placeholder="Add Insts user Counter">
                                </div>
                                <div class="form-group">
                                <input maxlength="80" class="form-control" type="text" data-name="add_insta_description" name="add_insta_description" data-transkey="instaDescription" placeholder="Insta Description">
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
<!-- Why instagram  section End-->