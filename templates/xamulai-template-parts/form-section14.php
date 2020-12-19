<?php $session_data = $_SESSION['abandand_user_info'];  ?>
 <!-- Register now repeat Start-->
 <div class="tab-pane fade" id="aglp-section14" role="tabpanel" aria-labelledby="aglp-section14-tab">
         <div id="section14_heading" class="form-group">
            <label for="section14_heading" data-transkey="heading">Heading</label>
            <input maxlength="80" placeholder="You can learn this" data-transkey="youCanLearnThis" name="section14_heading" type="text" class="form-control" value="<?php echo $session_data['section14_heading'] ?: '';  ?>" />
        </div>

        <div class="form-group">
            <div class="repeater">
                <label class="f20" data-transkey="addCarouselItems">Add Carousel Items </label>
                <span class="f12 font-italic text-secondary" data-transkey="more4ItemsGood">( More than 4 section  will be good for this part )</span><br/>
            </div>
            <!-- Repeater Content -->
            <div id="repeaterS14" class="repeaterContainer relative pb_30 inner-form">
           <?php
            if($session_data['gs14']){
                    foreach($session_data['gs14'] AS $gs14){
                        $section14_repeater_heading = $gs14['section14_repeater_heading']; 
            ?>
                <div class="items" data-group="gs14">
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-11">
                            <div class="form-group">
                                <input maxlength="80" type="text" value="<?php echo $section14_repeater_heading ;?>" name="section14_repeater_heading" data-name="section14_repeater_heading" id="section14_repeater_heading" data-transkey="howToStartBusiness" placeholder="How to start a business that won't fail" class="form-control">
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
                <div class="items" data-group="gs14">
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-11">
                            <div class="form-group">
                                <input maxlength="80" type="text" value="<?php echo $section14_repeater_heading ;?>" name="section14_repeater_heading" data-name="section14_repeater_heading" id="section14_repeater_heading" data-transkey="howToStartBusiness" placeholder="How to start a business that won't fail" class="form-control">
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
<!-- Register now repeat End--> 