<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- Register now repeat Start-->
 <div class="tab-pane fade" id="aglp-section15" role="tabpanel" aria-labelledby="aglp-section15-tab">
         <div id="section15_heading" class="form-group">
            <label for="section15_heading" data-transkey="heading">Heading</label>
            <input maxlength="90" data-transkey="voicesOfParticipating" placeholder="eg. Voices of participating members" name="section15_heading" type="text" class="form-control" value="<?php echo $session_data['section15_heading'] ?: '';  ?>" />
        </div>

        <div class="form-group">
            <div class="items" data-group="group">
                <label class="f20" data-transkey="addTesimonials">Add Testimonials</label>
                <span class="f12 font-italic text-secondary" data-transkey="3ItemsGood">( 3 section  will be good for this part )</span><br/>
            </div>
            <!-- Repeater Content -->
            <div id="repeaterS15" class="repeaterContainer relative pb_30 inner-form">
             <?php
                if($session_data['gs15']){
                        foreach($session_data['gs15'] AS $gs15){
                            $image = $gs15['section15_client_image'];
                            $client_name = $gs15['section15_client_name'];
                            $description = $gs15['section15_client_description']; 

            ?>
                <div class="items" data-group="gs15">
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-11">
                            <div class="form-group">
                                <label class="d-block" for="section15_client_image" data-transkey="profileImage">Profile Image</label>
                                <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                <input class="urlInput" type="hidden" name="section15_client_image" data-name="section15_client_image" value="<?php echo $image; ?>" />
                                <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
                            </div>
                            <div class="form-group">
                                <textarea maxlength="500" name="section15_client_description" placeholder="Description" data-transkey="description" data-name="section15_client_description" id="section15_client_description" rows="4" class="form-control"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input maxlength="80" type="text" value="<?php echo $client_name; ?>" name="section15_client_name" data-name="section15_client_name" id="section15_client_name" data-transkey="name" placeholder="Name" class="form-control">
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
            <?php 
                }
                } else { ?>
                <div class="items" data-group="gs15">
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-11">
                            <div class="form-group">
                                <label class="d-block" for="section15_client_image" data-transkey="profileImage">Profile Image</label>
                                <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                                <input class="urlInput" type="hidden" name="section15_client_image" data-name="section15_client_image" value="<?php echo $image; ?>" />
                                <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
                            </div>
                            <div class="form-group">
                                <textarea maxlength="500" name="section15_client_description" data-transkey="description" placeholder="Description" data-name="section15_client_description" id="section15_client_description" rows="4" class="form-control"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input maxlength="80" type="text" value="<?php echo $client_name; ?>" name="section15_client_name" data-name="section15_client_name" id="section15_client_name" data-transkey="name" placeholder="Name" class="form-control">
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