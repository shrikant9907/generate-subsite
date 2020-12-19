<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- FAQ Start-->
<div class="tab-pane fade" id="aglp-section11" role="tabpanel" aria-labelledby="aglp-section11-tab">
    <div class="form-group">
        <label for="faq_heading" data-transkey="heading">Heading</label><br/>
        <input type="text" maxlength="80" name="faq_heading" type="text" class="form-control" placeholder="List of Functions that can be Automated at Surviral" data-transkey="listOfFunction" value="<?php echo $session_data['faq_heading'] ?: ''; ?>" />
    </div>
    <div class="form-group">
        <label for="faq_description" data-transkey="description">Description</label>
        <textarea maxlength="400" id="faq_description" data-transkey="faqDescription" placeholder="Once you have decided the rules, leave the troublesome work to us" name="faq_description" type="text" class="form-control" ><?php echo $session_data['faq_description'] ?: ''; ?></textarea>
        <?php echo lineBreakTags(); ?>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col-12">
            <div class="repeater mb_30">                                
                <label class="f20" data-transkey="faqLeftHeading">FAQ's Left Column</label>
                <div id="repeaterS11_1" class="repeaterContainer relative pb_30 inner-form"> 
                <?php 
                if($session_data['group-faq-left']){
                    foreach($session_data['group-faq-left'] as $s11item){
                        $title = $s11item['faq_left_repeater_heading'];
                        $desc = $s11item['faq_left_repeater_description'];
                ?>
                <div class="items" data-group="group-faq-left">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <input maxlength="80" type="text" data-name="faq_left_repeater_heading" name="faq_left_repeater_heading" placeholder="Add Question" data-transkey="addQuestion" class="form-control" value="<?php echo $title ?: ''; ?>" />
                                </div>
                                <div class="form-group">
                                    <textarea maxlength="400" data-name="faq_left_repeater_description" name="faq_left_repeater_description" cols="15" rows="3" data-transkey="addAnswer" placeholder="Add Answer" class="form-control"><?php echo $desc ?: ''; ?></textarea>
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
                <div class="items" data-group="group-faq-left">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <input type="text" maxlength="80" data-name="faq_left_repeater_heading" name="faq_left_repeater_heading" placeholder="Add Question" data-transkey="addQuestion" class="form-control" />
                            </div>
                            <div class="form-group">
                                <textarea maxlength="400" data-name="faq_left_repeater_description" name="faq_left_repeater_description" cols="15" rows="3" data-transkey="addAnswer" placeholder="Add Answer" class="form-control"></textarea>
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

            <div class="col-12">               
            <div class="repeater">                                
                <label class="f20" data-transkey="faqRightHeading">FAQ's Right Column</label>
                <div id="repeaterS11_2" class="repeaterContainer relative pb_30 inner-form">
                <?php 
                //  $group_faq_right = array_map('array_filter', $session_data['group-faq-right']);
                //  $group_faq_right = array_filter($group_faq_right);
                 if($session_data['group-faq-right']){
                    foreach($session_data['group-faq-right'] as $s11itemr){
                    $title = $s11itemr['faq_right_repeater_heading'];
                    $desc = $s11itemr['faq_right_repeater_description'];
                ?>
                <div class="items" data-group="group-faq-right">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <input type="text" data-name="faq_right_repeater_heading" name="faq_right_repeater_heading" data-transkey="faqQuestion" placeholder="Faq Question" class="form-control" value="<?php echo $title ?: ''; ?>" /> 
                            </div>
                            <div class="form-group">
                                <textarea data-transkey="addAnswer" placeholder="Add Answer" data-name="faq_right_repeater_description" name="faq_right_repeater_description" cols="15" rows="3" class="form-control"><?php echo $desc ?: ''; ?></textarea>
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
                <div class="items" data-group="group-faq-right">
                    <div class="repeater-row item-content">
                        <div class="form-row">
                        <div class="col-md-11">
                            <div class="form-group">
                                <input type="text" data-name="faq_right_repeater_heading" name="faq_right_repeater_heading" data-transkey="faqHeading" placeholder="Faq Heading" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea data-name="faq_right_repeater_description" name="faq_right_repeater_description" cols="15" data-transkey="addAnswer" placeholder="Add Answer" rows="3" class="form-control"></textarea>
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
    </div> 
</div>
<!-- FAQ End-->