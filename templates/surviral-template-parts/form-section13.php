<?php $session_data = $_SESSION['abandand_user_info']; ?>
<!-- Footer section Start -->
 <div class="tab-pane fade" id="aglp-section13" role="tabpanel" aria-labelledby="aglp-section13-tab">
<!--Footer Left Start -->
<div class="form-group">
<label for="goole_map"><span data-transkey="footerColumn1">Footer Column1</span> <a href="https://maps.google.com/" target="_blank" data-transkey="generateIframeForGoogleMap">Generate Iframe for Google Map</a></label><br/>
<textarea maxlength="500" data-transkey="addGoogleMap" placeholder="Add google map iframe here. 
eg.  &lt;iframe class=&quot;w-100&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot; marginheight=&quot;0&quot; marginwidth=&quot;0&quot; src=&quot;https://maps.google.com/maps?q=500 7th Ave 8th floor New York, NY 10018&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near&quot; aria-label=&quot;500 7th Ave 8th floor New York, NY 10018&quot;&gt;&lt;/iframe&gt;" name="goole_map"  cols="15" rows="5"  class="form-control" ><?php echo $session_data['goole_map'] ?: '';   ?></textarea> 
</div>                   
<div class="form-group">
    <label class="w-100" for="footer_images" data-transkey="footerColumn2">Footer Column2 (Image) </label><span class="f12 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize"> (Please add images of same or greater than 640X420) </span><br/>
    <?php $image = $session_data['footer_images'] ?: ''; ?>
    <?php if($image) { echo '<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'.$image.'" alt="" /></div>'; } ?>
    <input class="urlInput" type="hidden" name="footer_images" value="<?php echo $image; ?>" />
    <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
</div>
<!--Footer Left End -->
<div class="form-group">
<label for="footer_address_title" data-transkey="footerColumn3Title">Footer Column3 (Title)</label><br/>
<input type="text" maxlength="40" name="footer_address_title" class="form-control" data-transkey="addColumnTitle" placeholder="Add column title" value="<?php echo $session_data['footer_address_title'] ?: ''; ?>" />
</div>
<div class="form-group">
<label for="footer_address" data-transkey="footerColumn3Add">Footer Column3 (Address)</label><br/>
<textarea data-transkey="addAddress" placeholder="Add Address" maxlength="200" name="footer_address"  cols="15" rows="3"  class="form-control"><?php echo $session_data['footer_address'] ?: '';   ?></textarea> 
</div>
<div class="form-group">
<label for="site_map_pages_title" data-transkey="footerColumn4Title">Footer Column4 (Title)</label><br/>
<input type="text" maxlength="40" name="footer_site_map_title" class="form-control" data-transkey="siteMapSection" placeholder="Site Map Section Title" value="<?php echo $session_data['footer_site_map_title'] ?: ''; ?>" /><br/>
</div>
<div class="repeater">   
<div class="form-group">
    <label for="footer_site_map" data-transkey="footerColumn4Repeater">Footer Column4 (Listings - Repeater fields)</label>                             
    <div id="repeaterS13" class="repeaterContainer relative pb_30 inner-form"> 
    <?php 
    if(!empty($session_data['group-footer-site-map'])){
        foreach($session_data['group-footer-site-map'] as $s11itemr){
            $title = $s11itemr['site_map_page_title'];
            $link = $s11itemr['site_map_page_link'];
        // if((!empty($title) && !empty($link))){
         ?>
          <div class="items" data-group="group-footer-site-map">  
            <div class="repeater-row item-content">
                <div class="form-row">
                    <div class="form-group w-100">
                        <div class="form-row">
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" maxlength="40" data-name="site_map_page_title" name="site_map_page_title" data-transkey="text" placeholder="Text"  class="form-control" value="<?php echo $title ?: ''; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input maxlength="1000" onchange="validateUrl(this)" data-transkey="anchorSectionId" placeholder="Anchor section id. eg. #section_1" data-name="site_map_page_link" name="site_map_page_link" type="text" class="form-control" value="<?php echo $link ?: ''; ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="repeater-remove-btn">
                                    <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    <?php
            // }
        }
    } else { ?>
        <div class="items" data-group="group-footer-site-map">  
            <div class="repeater-row item-content">
                <div class="form-row">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-3">
                            <input type="text" data-name="site_map_page_title" name="site_map_page_title" data-transkey="text" placeholder="Text"  class="form-control" value="<?php echo $session_data['site_map_page_title'] ?: ''; ?>" />
                                <!-- <input id="site_map_page_title" placeholder="Text" data-name="site_map_page_title" name="site_map_page_title" type="text" class="form-control" value="<?php echo $session_data['site_map_page_title'] ?: ''; ?>" /> -->
                            </div>
                            <div class="col-8">
                                <input data-transkey="anchorLink" placeholder="Anchor link" data-name="site_map_page_link" name="site_map_page_link" type="text" class="form-control" value="<?php echo $session_data['site_map_page_link'] ?: ''; ?>"/>
                            </div>
                            <div class="col-1">
                                <div class="repeater-remove-btn">
                                    <button type="button" class="btn text-primary px-0 mx-auto d-block remove-btn invisible" title="Delete" ><i class="far fa-trash-alt"></i></button>
                                </div>
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
<div class="form-group mt_30">
    <label for="footer_copy_right" data-transkey="copyrightInfo">Copyright</label><br/>
    <input type="text" name="footer_copy_right" maxlength="80" class="form-control" data-transkey="copyrightInfo" placeholder="eg. &copy; All rights reserved." value="<?php echo $session_data['footer_copy_right']; ?>" />
</div>

</div>

</div>
<!-- </div> -->
<!-- Footer section End -->