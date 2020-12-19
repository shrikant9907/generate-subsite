<?php $session_data = $_SESSION['abandand_user_info']; ?>
 <!-- Worried section Start-->
  <div class="tab-pane fade" id="aglp-section2" role="tabpanel" aria-labelledby="aglp-section2-tab">
      <div class="form-group">
         <label for="worried_heading" data-transkey="heading">Heading</label>
         <input id="worried_heading" maxlength="80" data-transkey="areYouWorriedAbout" placeholder="Are you worried about attracting customers?" name="worried_heading" type="text" class="form-control"  value="<?php echo $session_data['worried_heading'] ?: ''; ?>" />
      </div>
      <div class="form-group">
         <label for="worried_sub_heading" data-transkey="description">Description</label>
         <textarea id="worried_sub_heading" maxlength="300" data-transkey="worriedDescription" placeholder="We are entering an era where traditional marketing practices do not work." name="worried_sub_heading" type="text" class="form-control" ><?php echo $session_data['worried_sub_heading'] ?: ''; ?></textarea>
         <?php echo lineBreakTags(); ?>
      </div>
      <div class="form-group">
         <div class="repeater">
            <div class="customer-add-button">
               <label class="f20" data-transkey="addCarouselItems">Add Carousel Items </label>
               <span class="f12 font-italic text-secondary" data-transkey="5orMoreItemsWillBeGood">( 5 or more items will be good for it. )</span><br/>
               <span class="f10 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize">( Please add images of same or greater than 640X420 )</span>
            </div>
            <div id="repeaterS2" class="repeaterContainer relative pb_30 inner-form">
                  <?php 
                  $group_customer = array_map('array_filter', $session_data['group-customer']);
                  $group_customer = array_filter($group_customer);
                  if($group_customer){
                     foreach($group_customer as $customer){
                        $image = $customer['customer_images'];
                        $desc  = $customer['customer_description'];
                  ?>
               <div class="items" data-group="group-customer">  
                  <div class="repeater-row item-content" >
                     <div class="form-row">
                        <div class="col-11">
                           <div class="form-group">
                              <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                              <input class="urlInput" type="hidden" data-name="customer_images" name="customer_images" value="<?php echo $image; ?>" />
                              <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
                           </div>
                           <div class="form-group">
                              <textarea maxlength="200" type="text" name="customer_description" data-name="customer_description" data-transkey="cartTitle" placeholder="Cart title" class="form-control"><?php echo $desc ?: ''; ?></textarea>
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
                  </div> <!-- repeater row end -->
               </div>
                  <?php
                     }
                  } else { ?>
               <div class="items" data-group="group-customer">  
                  <div class="repeater-row item-content">
                     <div class="form-row">
                        <div class="col-11">
                           <div class="form-group">
                           <?php $image = $session_data['customer_images'] ?: ''; ?>
                              <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
                              <input class="urlInput" type="hidden" data-name="customer_images" name="customer_images" value="<?php echo $image; ?>" />
                              <input class="form-control ajaxFileUpload" type="file" data-transkey="uploadImage" placeholder="Upload Image">
                           </div>
                           <div class="form-group">
                              <textarea maxlength="200" type="text" name="customer_description" data-name="customer_description" data-transkey="describeAbout" placeholder="Describe about worreid customer" class="form-control"></textarea>
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
                  </div> <!-- repeater row end -->
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
         </div>
      </div>
   </div>
   <!-- Worried section end-->
