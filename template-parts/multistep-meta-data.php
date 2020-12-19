<?php 

$meta_image = $meta_title = $meta_desc = $meta_gsv = $meta_gas = '';

if (isset($_SESSION['meta_image'])) {
   $meta_image =  $_SESSION['meta_image'];
} 

if (isset($_SESSION['meta_title'])) {
   $meta_title =  $_SESSION['meta_title'];
} 

if (isset($_SESSION['meta_desc'])) {
   $meta_desc =  $_SESSION['meta_desc'];
} 

if (isset($_SESSION['meta_gsv'])) {
   $meta_gsv =  $_SESSION['meta_gsv'];
} 

if (isset($_SESSION['meta_gas'])) {
   $meta_gas =  $_SESSION['meta_gas'];
} 

?>

<label for="siteDomain" class="w-100" id="site-domain" data-transkey="landingPageMeta">Landing Page Meta (For SEO)</label>
<div class="inner-form">
   <div class="form-group">
      <label for="metaImage">Upload Meta Image</label><span class="f12 font-italic text-secondary" data-transkey="pleaseAddImagesOfSize"> ( Please add images of same or greater than 640X420 )</span><br/>
      <?php if($meta_image) { echo '<img class="img-thumbnail w_100 mb_10" src="'.$meta_image.'" alt="" />'; } ?>
      <input id="metaImage" data-transkey="metaImage" placeholder="Meta Image" value="<?php echo $meta_image; ?>" name="aglp_meta_image" type="hidden" />
      <input class="form-control ajaxFileUpload" type="file" accept="image/*" />
   </div> 
   <div class="form-group">
      <label for="metaTitle" data-transkey="metaTitle">Meta Title</label>
      <input id="metaTitle" data-transkey="metaTitleSet" placeholder="Meta Title" maxlength="100" value="<?php echo $meta_title; ?>" name="aglp_meta_title" type="text" class="form-control" />
   </div>
   <div class="form-group">
      <label for="metaDescription" data-transkey="metaDescription">Meta Description</label>
      <textarea id="metaDescription" data-transkey="metaDescriptionSet" placeholder="Meta Description" maxlength="300" name="aglp_meta_desc" type="text" class="form-control" ><?php echo $meta_desc; ?></textarea>
   </div>
   <div class="form-group">
      <label for="metaGSV" data-transkey="googleSiteVerification">Google Site Verification</label>
      <input id="metaGSV" data-transkey="googleSiteVerificationCodeHere" placeholder="Google site verification code here." maxlength="100" value="<?php echo $meta_gsv; ?>" name="aglp_meta_gsv" type="text" class="form-control" />
   </div>
   <div class="form-group">
      <label for="metaGAS" data-transkey="googleAnalytics">Google Analytics <a href="https://analytics.google.com/" target="_blank" data-transkey="scriptMessage">Get script from here</a></label>
      <p class="f12 mb_5" data-transkey="googleAnalyticsMessage">It accepts HTML script for Google Analytics. It will add in the head section of your page.</p>
      <textarea id="metaGAS" maxlength="500" data-transkey="googleAnalyticsCodeHere"placeholder="Google Analytics code here." name="aglp_meta_gas" type="text" class="form-control" ><?php echo $meta_gas; ?></textarea>
   </div>
   <div class="form-group inner-form">
      <a id="save_meta_data" onClick="aglpUpdateMetaFields()" class="btn btn-primary btn-sm mb_20 text-white" href="javascript:void('0');" data-transkey="saveMeta">Save Meta</a>
      <div class="alert alert-success hide" data-transkey="metaDetailsSaved">Meta details has been saved.</div>
   </div>
</div>
