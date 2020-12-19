<?php 
$blog_id = $_SESSION['blog_id'];
if(empty($blog_id)){
    $blog_id = get_user_meta( get_current_user_id(), 'blog_id', true);
    $site_title = get_user_meta( get_current_user_id(), 'site_title', true);
    $site_path = get_user_meta( get_current_user_id(), 'site_path', true);
    $end_point = get_user_meta( get_current_user_id(), 'end_point', true);
    
}
$generated_site_url = get_site_url($blog_id);
$site_title = $session_data['site_title'] ?:  $_SESSION['site_title'] ?: $site_title ?: '';
$end_point  = $session_data['end_point'] ?:  $_SESSION['end_point'] ?: $end_point ?: '';
$site_path  = $session_data['site_path'] ?:  $_SESSION['site_path'] ?: $site_path ?: '';
$disable_path = $session_data['site_path'] ? 'disabled' : $_SESSION['site_path'] ? 'disabled' : $site_path ? 'disabled' : '';
$button_text = (($session_data['site_path'] || $_SESSION['site_path'] || $site_path)  ? 'Landing page created' : 'Create landing page'); 

if (!$end_point) {
    $end_point = basename($site_path);
}

?>
<div class="create-subsite">
    <p for="siteTitle" id="site-info-heading" class="mb_0" data-transkey="createSite">Create your landing page</p>
    <div id="site-error" class="hide"></div>
    <div class="form-group inner-form">
        <label for="siteTitle" data-transkey="pageName">Page name</label>
        <label id="siteTitle-error" class="error hide" for="siteTitle"></label>
        <input id="siteTitle" maxlength="50" data-transkey="enterPageName" placeholder="Enter page name" name="site_title" type="text" class="form-control" value="<?php echo $site_title; ?>"/>
    </div>
    <div class="form-group inner-form">
        <label for="sitePath" data-transkey="endPoint">End point</label>
        <label id="sitePath-error" class="error hide" for="sitePath"></label>
        <input id="sitePath" maxlength="60" onkeypress="validateEndPoint(this.value)" onkeyup="validateEndPoint(this.value)" data-transkey="enterPath" placeholder="Enter path eg. mylandingpage" name="site_path" type="text" class="form-control" <?php echo $disable_path ; ?> value="<?php echo $end_point; ?>"  />
        <!-- Set Blog id -->        
        <p class="f12 mt_5 create-site-desc <?php echo $blog_id ? 'hide' : ''; ?>" data-transkey="endPointMessage">Endpoint will be use to create a landing URL. eg.  <?php echo home_url(); ?>/<b>mylandingpage</b></p>
        <p class="f12 mt_5 create-site-alert <?php echo $blog_id ? '' : 'hide'; ?> " data-transkey="landingPageMessage">Your landing page create on <a href="<?php echo $generated_site_url; ?>"><?php echo $generated_site_url; ?></a></p>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm mb_20 site-create <?php echo $disable_path; ?>" onclick="siteCreation()"><?php echo $button_text; ?></button>
    </div>
</div>

<!-- Domain Attachement Funcitonality start-->
<?php 
$site_domain = get_user_meta( get_current_user_id(), 'domain_name', true );
$hide_show_class = $session_data['site_path'] ? 'show' :  $_SESSION['site_path'] ? 'show' : $site_domain ? 'show' : 'hide';
$showmsg_class = $site_domain ? 'show' : 'hide';
?>
<div class="domain-map mb_30 domain <?php echo $hide_show_class; ?> ">
    <label for="siteDomain" class="w-100 mb_0" id="site-domain" data-transkey="attachDomain">Attach Your Domain</label>
    <div class="form-row">
        <div class="col-12">
            <div class="form-group inner-form">
                <label id="domain-error" class="error hide" for="domain-error"></label>
                <label for="siteDomain" class="d-inline-block w-100" data-transkey="domain">Domain</label>
                <input id="siteDomain" maxlength="60" data-transkey="exampleCom" placeholder="eg. www.example.com or example.com" name="site_domain" type="text" class="form-control" value="<?php echo $session_data['site_domain'] ?: $site_domain ?: ''; ?>" onchange="validateDomain(this.value)" <?php echo $site_domain ? "disabled='disabled'" : '' ; ?>/>
                <p class="description"></p>
                <div id="domain-alert" class="alert alert-warning auto-hide f14  <?php echo $showmsg_class; ?>" role="alert">
                <h6 class="w-100" data-transkey="pointDomainLanding">Steps to point your domain to landing page.</h6>
                <span class='f12' data-transkey="pointIpAddServer">Please add our IP address 124.554.551.445 on your domain registrar to point this domain on our server.</span>
                </div>
            </div>
        <!-- </div>
        <div class="col-12"> -->
            <div class="form-group inner-form">
                <button id="save_domain" type="button" class="btn btn-primary btn-sm mb_20" onclick="saveDomain()" <?php echo $site_domain ? "disabled='disabled'" : '' ; ?> data-transkey="saveDomain">Save domain</button>
            </div>
        </div>
    </div>
</div>

<!-- Domain Attachement Funcitonality End -->