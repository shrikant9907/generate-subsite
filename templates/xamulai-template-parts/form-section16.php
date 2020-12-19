<?php $session_data = $_SESSION['abandand_user_info']; ?>
 <!-- Register now repeat Start-->
 <div class="tab-pane fade" id="aglp-section16" role="tabpanel" aria-labelledby="aglp-section16-tab">
         <div id="section16_heading" class="form-group">
            <label for="section16_heading" data-transkey="faqHeading">FAQ</label>
            <input maxlength="80" data-transkey="faq" placeholder="eg. FAQ" name="section16_heading" type="text" class="form-control" value="<?php echo $session_data['section16_heading'] ?: '';  ?>" />
        </div>
        <div class="form-group">
            <div class="items" data-group="group">
                <label class="f20" data-transkey="addFaq">Add FAQ</label>
            </div>
            <!-- Repeater Content -->
            <div id="repeaterS16" class="repeaterContainer relative pb_30 inner-form">
            <?php
                if($session_data['gs16']){
                        foreach($session_data['gs16'] AS $gs16){
                            $heading = $gs16['section16_item_heading'];
                            $description = $gs16['section16_description']; 

            ?>
                <div class="items" data-group="gs16">
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-11">
                            <div class="form-group">
                                <input maxlength="80" type="text" value="<?php echo $heading; ?>" data-name="section16_item_heading"  name="section16_item_heading" id="section16_heading" data-transkey="canUnderstatnd" placeholder="eg. Can I understand the content without any knowledge?" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea maxlength="500" rows="4" type="text" data-name="section16_description" name="section16_description" id="section16_description" data-transkey="allYouNeed" placeholder="All you need is an internet environment and a smartphone. As the curriculum progresses, it will be even more efficient if you have a simple computer or tablet" class="form-control"><?php echo $description; ?></textarea>
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
                <div class="items" data-group="gs16">
                <div class="repeater-row item-content">
                    <div class="form-row">
                        <div class="col-11">
                            <div class="form-group">
                                <input maxlength="80" type="text" value="<?php echo $heading; ?>" data-name="section16_item_heading"  name="section16_item_heading" id="section16_heading" data-transkey="canUnderstatnd" placeholder="Can I understand the content without any knowledge?" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea maxlength="500" rows="4" type="text" value="<?php echo $description; ?>" data-name="section16_description" name="section16_description" id="section16_description" data-transkey="allYouNeed" placeholder="All you need is an internet environment and a smartphone. As the curriculum progresses, it will be even more efficient if you have a simple computer or tablet" class="form-control"><?php echo $description; ?></textarea>
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
                    <button type="button" class="btn btn-sm btn-primary repeater-clone-btn"  data-transkey="duplicateLastFields">
                        Duplicate Last Fields
                    </button>
                </div>
            </div>
            <!-- Repeater End -->
        </div>
 </div>
<!-- Register now repeat End--> 