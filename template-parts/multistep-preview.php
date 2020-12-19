<?php
$previewId = $_SESSION['abandand_post_id'];
$abandandid = base64_encode($previewId); 
$prevData = get_post_meta($previewId, 'lp_template_data', true);
// if the user is logged in  
if (is_user_logged_in()) {
    $currentUserId = get_current_user_id();
    $prevData = get_user_meta($currentUserId, 'lp_template_data', true);
}
// If remove uncessary user info
$allEmpty = remove_site_preview_empty($prevData);
// fetch value empty or not 
$disabled = (!in_array( 1, $allEmpty ) ? 'disabled' : '');
if ($abandandid) {
?>
<label data-transkey="sitePreview">Site Preview</label>
<div class="preview-link inner-form d-flex justify-content-between">
    <p class="f14 mb_10" data-transkey="checkWebSitePreview">Click on following button to check your website preview.</p>
    <a class="btn btn-primary preview-button btn-sm mb_20" href="<?php echo network_site_url('/preview?pid=') . $abandandid; ?>" <?php echo $disabled; ?> data-transkey="sitePreview">Site Preview</a>
</div>
<?php 
} ?>