<?php 
/*
* Template Name: Registration Multistep form
*/
get_header(); 
// Get tab condtion existing or not 
$network_id = get_current_network_id();
$autolpSettings = unserialize(get_network_option($network_id, 'aglp_network_options'));
// session_destroy();
// check if user logged in
$isLoggedIn = is_user_logged_in();
$current_user     = wp_get_current_user();
$current_user_id  = $current_user->ID;

// Fetch template name 
$template_name = get_user_meta($current_user_id, 'lp_selected_template' , 'true' );

if ($isLoggedIn) {
   $currentUser = wp_get_current_user();
   $currentUserData = $current_user->data;
   $formData = get_user_meta($current_user_id, 'lp_template_data', true);
   if ($formData) {
     $_SESSION['abandand_user_info'] = $formData;;
   }
   $display_name = get_user_meta( $current_user_id, 'display_name', true ); 
   $_SESSION['abandand_user_info']['user_name'] = $display_name ?: $currentUserData->display_name;
   $_SESSION['abandand_user_info']['user_email'] = $currentUserData->user_email;
   $_SESSION['abandand_user_info']['user_password'] = '';
   $_SESSION['abandand_user_info']['user_cpassword'] = '';

   $user_everified = $email_status = 'Verified';
  

} else {
   if($_GET['rstep'] == 3 || $_GET['rstep'] == 2 ){
         session_destroy();
         wp_redirect( home_url( 'log-in' ) );
         // wp_redirect( home_url( 'registration' ) );
      exit;
   }

   // Email verified and unverified status 
   $email_status = $_SESSION['email_verified'] ;
   
   // email verified of hidden field 
   $user_everified = $_SESSION['user_everified'] ;

   // decode password
   if ($_SESSION['abandand_user_info']['user_password']) {
      $_SESSION['abandand_user_info']['user_password'] = base64_decode($_SESSION['abandand_user_info']['user_password']);
   }
   // decode confirm password
   if ($_SESSION['abandand_user_info']['user_cpassword']) {
      $_SESSION['abandand_user_info']['user_cpassword'] = base64_decode($_SESSION['abandand_user_info']['user_cpassword']);
   }
}

// Fetch session data   
$session_data = $_SESSION['abandand_user_info'];
if ($session_data['save_changes'] != 'saved') {
   $previewClasses = 'hide';
}
?>
<style>
.image_area {
  position: relative;
}

img {
     display: block;
     max-width: 100%;
}

.preview {
     overflow: hidden;
     width: 160px; 
     height: 160px;
     margin: 10px;
     border: 1px solid red;
}

.modal-lg{
     max-width: 1000px !important;
}

.overlay {
  position: absolute;
  bottom: 10px;
  left: 0;
  right: 0;
  background-color: rgba(255, 255, 255, 0.5);
  overflow: hidden;
  height: 0;
  transition: .5s ease;
  width: 100%;
}

.image_area:hover .overlay {
  height: 50%;
  cursor: pointer;
}

.text {
  color: #333;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

</style>

<section class="section-multistep-from pt_80 pb_60">
   <div class="container">
      <h2 class="main-heading-ui text-center text-uppercase with-bottom-border " data-transkey="inputInformation">INPUT INFORMATION</h2>
      <p class="section-description text-center" data-transkey="inputInformationDesc">Please fill the information to start Auto Generate LP service.</p>
      <div class="mb_70 seperator"></div>
      <!-- Multistep form here -->
      <form id="multistep-form" action="#" method="post" enctype="multipart/form-data" autocomplete=off>
         <div class="step-form-ui mx-auto">
            <!-- Section 1 -->
            <h3 class="d-none" data-transkey="step1"><span data-transkey="yourAccount">Your account</span></h3>
            <section  style="display:none;">
               <div class="form-group">
                  <label for="userName" data-transkey="Name">Name</label>
                  <input id="userName" data-transkey="Name" maxlength="90" placeholder="Name" value="<?php echo $session_data['user_name'] ?: $_SESSION['user_name'] ?: ''; ?>" name="user_name" type="text" class="required form-control emptythisfield" />
               </div>
               <div class="form-group">
                  <label for="userEmail" data-transkey="Email">Email</label>
                  <div class="input-group mb-3">
                     <input id="userEmail" data-transkey="Email" placeholder="Email" value="<?php echo $current_user->user_email ?: urldecode($session_data['user_email']) ?: urldecode($_SESSION['user_email']) ?: ''; ?>" name="user_email" type="email" class="required form-control" onchange="emailValidation(this.value)" <?php echo ( ($email_status == 'Verified' || $session_data['user_everified'] ) ? 'disabled="disabled"' : $_SESSION['email_verified'] == 'Verified' ? 'disabled="disabled"' : ''); ?> />
                     <input type="hidden" value="" name="email_generated_code" id="email_generated_code" />
                     <input id="userEmailVerified" value="<?php echo $user_everified ?: $session_data['user_everified'] ?: ''; ?>" name="user_everified" type="hidden" required/>
                     <input type="hidden" value=180 name="counter_value" id="counter-value" />
                     <div class="input-group-append fixed_top_right position-absolute">
                        <?php 
                           $check_verified = $session_data['user_everified'] ?: $user_everified ?: $email_status ?: '';
                        if( $check_verified != 'Verified'){ ?>
                           <a id="verify_email" class="input-group-text btn btn-primary disabled"  data-toggle="modal" data-target="#initModal" >Verify</a></span>
                        <?php } else { ?>
                           <a id="verify_email" class="input-group-text btn btn-primary bg-green text-white disabled"  disabled="disabled">Verified</a></span>
                        <?php } ?>
                     </div>
                   </div> 
               </div>
               <?php if ($isLoggedIn) { 
                  $pclasses = 'form-control emptythisfield';
                  ?>
                  <label class="font-bold text-dark border-bottom  w-100 pb_10" data-transkey="changePassword">Change Password <span class="f12 font-italic text-secondary" data-transkey="changePasswordInfo">You will be asked to login again after password change.</span>
                  </label>
                  <div class="inner-section">
               <?php } else {
                  $pclasses = 'required form-control emptythisfield';
               } ?>
                  <div class="form-group">
                     <label for="userPassword" data-transkey="Password">Password</label>
                     <input readonly data-transkey="Password" maxlength="90" id="userPassword" placeholder="Password" value="<?php echo $session_data['user_password'] ?: ''; ?>" name="user_password" type="password" class="<?php echo $pclasses; ?>" autocomplete="off" />
                  </div>
                  <div class="form-group">
                     <label for="confirmPassword" data-transkey="confirmPassword">Confirm Password</label>
                     <input readonly data-transkey="confirmPassword" maxlength="90" id="confirmPassword" placeholder="Password" value="<?php echo $session_data['user_cpassword'] ?: ''; ?>" name="user_cpassword" type="password" class="<?php echo $pclasses; ?>" autocomplete="off" />
                  </div>
               <?php if ($isLoggedIn) { ?>
                  </div>
                  <!-- Inner section -->
               <?php } ?>
            </section>
            <!-- Section 2 -->
            <h3 class="d-none" data-transkey="step2"><span data-transkey="generateLandingPage">Generate Landing Page</span></h3>

            <!--template call by user selection  -->
            <section style="display:none;">
              <?php 
              
              if( $template_name == 'lp-template-xamulai'){
                  // require_once('xamulai-registration.php');  
                  require_once('xamulai-registration.php');  
              } else {
                  require_once('surviral-registration.php');  
              }

              ?>    
            </section>  
            <!-- Section 3 -->
            <h3 class="d-none" data-transkey="step3"><span data-transkey="subscribe">Subscribe</span></h3>
            <section  style="display:none;">
               <?php //get_template_part( 'template-parts/multistep-preview' ); ?>
               <?php get_template_part( 'template-parts/multistep-subscribe' ); ?>
               <?php get_template_part( 'template-parts/multistep-create-subsite' ); ?>
               <?php get_template_part( 'template-parts/multistep-meta-data' ); ?>
            </section>
         </div>
      </form>
      <!-- Multistep form end -->

      <!-- Email verify popup -->
  <!--    <div id="initModal" class="modal show" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-modal="true" style="padding-right: 15px; display: block;">
      </div> -->
<div class="modal fade" id="initModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content custom-form-ui modal-popup-ui">
      <form action="" method="post" id="intiForm" autocomplete="off">
         <div class="modal-header border-0 text-center">
            <h5 class="modal-title d-block w-100" data-transkey="verifyEmail">Verify Your Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

         </div>
         <div class="modal-body">
            <!-- Email code response -->
            <div class="alert alert-info auto-hide" role="alert"><span class="code-response" data-transkey="otpSendMessage">OTP has been sent to your email.</span></div>
            <div id="wrong_otp" class="alert alert-danger hide auto-hide" data-transkey="wrongOtp">Wrong OTP.</div>
            <div id="send_otp" class="alert alert-success hide auto-hide" data-transkey="optResendMessage">OTP resent, Please check your email.</div>
            <div id="otp_verified" class="alert alert-success hide auto-hide" data-transkey="verifyOtp">OTP Verified.</div>
            <div class="form-group">
               <input type="number" id="verify_otp" name="verify_otp" placeholder="Enter 6 Digits OTP code here" class="nolimitcheck form-control f16 text-left" required max="6" onkeyup="verifyButtonEnable(this)" onkeydown="verifyButtonEnable(this)" pattern ="\d{6}"/>
            </div>
            <div id="recent-counter" class="alert text-info text-center mbi_0 p-0"><span data-transkey="resendOtpCounter">Resend OTP again in</span> <span id="countdown"></span> <span data-transkey="seconds">seconds.</span></div>        
         </div>
         <div class="modal-footer border-0 text-center pt_0">
            <button id="resend_otp" class="btn btn-primary bg-green btn-no-loading" disabled='disabled' data-transkey="resendOtp">Resend OTP</button>
            <button id="verify_otp_btn" class="btn btn-primary btn-no-loading " disabled='disabled' data-transkey="verifyOtp">Verify OTP</button> 
         </div>
      </form>
    </div>
  </div>
  </div>
  
</div>
   <!-- Email verify popup End-->
   <!-- Modal -->
  <div class="modal fade" id="paynow" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content custom-form-ui modal-popup-ui position-relative overflow-hidden">
      <div id="payment-loader" class="overlay_w position-absolute justify-content-center align-items-center d-flex hide">
          <i class="fas fa-spinner fa-spin f40"></i>                                          
      </div>
      <form action="#" method="POST" id="paymentFrm">
        <div class="modal-header border-0 text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title d-block w-100" data-transkey="stripePayment">Stripe Payment</h4>
        </div>
        <div class="modal-body">
            <div class="panel-body">
                  <!-- Display errors returned by createToken -->
                  <div id="paymentResponse"></div>
               
                  <!-- Payment form -->
                  <!-- <div class="form-group">
                     <label>NAME</label>
                     <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required="" autofocus="">
                  </div> -->
                  <!-- <div class="form-group">
                     <label>EMAIL</label>
                     <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required="">
                  </div> -->
                  <div class="form-group">
                     <label data-transkey="cardNumber">CARD NUMBER</label>
                     <div id="card_number" class="form-control"></div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                              <label data-transkey="expiryDate">EXPIRY DATE</label>
                              <div id="card_expiry" class="form-control"></div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                              <label data-transkey="cvcCode">CVC CODE</label>
                              <div id="card_cvc" class="form-control"></div>
                        </div>
                     </div>
                  </div>
                 
            </div>
               <div class="modal-footer border-0 text-center">
                  <button type="submit" class="btn btn-primary btn-no-loading " id="payBtn" data-transkey="payNow">Pay now</button>
               </div>
            </form>   
        </div>
   </div>
   </div>
   </div>
</section>
<!-- Error Model start -->
<div id="alert-modal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content custom-form-ui modal-popup-ui">
      <div class="modal-header border-0 text-center">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="alert-modal-title" class="modal-title d-block w-100"></h4>
      </div>
      <div id="alert-modal-body" class="modal-body"></div>
    </div>
  </div>
</div>
<!-- Error Model end -->

<!--Recurring payment info start Popup -->
<div class="modal fade" id="recurring-info" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" data-transkey="subscriptionPlanDetails">Subscription Plan Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
               <div id="recurring-data" class="text-left">
                  <?php $payment_info = $_SESSION['payment_info']; 
                  if($payment_info){
                  ?>
                     <div class="subscription-id d-flex justify-content-between"><strong data-transkey="subscriptionId">Subscription ID </strong><span><?php echo $payment_info['subscriber_id']; ?></span></div>
                     <div class="customer-id d-flex justify-content-between"><strong data-transkey="customerID">Customer ID </strong><span><?php echo $payment_info['subscriber_customer_id']; ?></span></div>
                     <div class="plan-id d-flex justify-content-between"><strong data-transkey="planId">Plan ID </strong><span><?php echo $payment_info['subscriber_plan_id']; ?></span></div>
                     <div class="plan-title d-flex justify-content-between"><strong data-transkey="plan">Plan </strong><span>Basic Plan</span></div>
                     <div class="plan-Price d-flex justify-content-between"><strong data-transkey="price">Price </strong><span>$<?php echo $payment_info['subscriber_plan_amount']; ?>/ <?php echo $payment_info['subscriber_plan_interval']; ?></span></div>
                     <div class="plan-type d-flex justify-content-between"><strong data-transkey="paymentType">Payment Type </strong><span>Recurring</span></div>
                     <div class="plan-title d-flex justify-content-between"><strong data-transkey="nextBillingDate">Next billing date </strong><span><?php echo date("j M Y g:i a", strtotime($payment_info['subscriber_plan_end_date']));; ?></span></div>
               <?php } ?>
               </div>
            </div>
            <div class="modal-footer">
               <div class="col-12 text-center">
                  <button type="button" class="btn btn-secondary r_25 w-50 lh34 border-0" data-dismiss="modal">Close</button>
               </div>
            </div>
      </div>
   </div>
</div>
<!-- Recurring Payment End -->



<!-- Preview uploaded Images start  -->
<div class="modal fade" id="preview-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" data-transkey="cropImage">Crop Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
               <div class="img-container">
                     <div class="form-row">
                        <div class="col-12 col-md-8">
                           <div class="cropper_scroll">
                              <img src="" class="img-fluid" id="sample_image" />
                           </div>   
                        </div>
                        <div class="col-12 col-md-4"> 
                           <div class="preview text-center"></div>
                           <div class="modal-footer">
                              <button type="button" id="crop" class="btn btn-sm btn-primary w-50" data-transkey="crop">Crop</button>
                              <button type="button" id="cropCancelled" class="btn btn-secondary btn-sm bg_green r_25 w-50 lh34 border-0" data-dismiss="modal" data-transkey="close">Close</button>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
      </div>
   </div>
</div>
<!-- Preview Uploaded Images End -->

<?php if (is_user_logged_in()) { 

   $user_id = $_SESSION['cusrid'];

   if (!$user_id) {
      $user_id = get_current_user_id();
   }

   $selectedTemplate = get_user_meta( $user_id, 'lp_selected_template', true );
   if (!$selectedTemplate) {
?>
<!-- Choose template start -->
<div class="modal fade" id="choose-template">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content custom-form-ui modal-popup-ui">
               <div class="modal-header border-0 text-center">
                  <h4 id="alert-modal-title" class="modal-title d-block w-100" data-transkey="chooseLandingPageTemplate">Choose a landing page template</h4>
               </div>
               <div class="select-template-alert px_15 text-center"></div>    
               <form action="#" method="POST" id="select-template">
                  <div class="modal-body">
                     <div class="panel-body">
                           <div class="row">
                              <?php 
                              // Fetch template name   
                              $templates_name = get_all_template(); 
                              foreach($templates_name as $key => $value){ ?>
                              <div class="col">
                                 <div class="card c_p r_0 border-0 shadow-sm hover_scale_11 trans_2">
                                    <label for="<?php echo $key; ?>" class="template-clicked img-thumbnail border d-inline-block m-0 c_p">
                                       <img class="img-fluid r_0" src="<?php echo get_stylesheet_directory_uri(); ?>/images/<?php echo strtolower($value); ?>-screenshot.png" alt="" class="img-fluid rounded">
                                       <input type="radio" name="template_name" id="<?php echo $key; ?>" value="<?php echo $key; ?>" class="form-check-input" />
                                       <h3 class="f14 w-100 text-center py_5 m-0"><?php echo $value; ?></h3>
                                    </label>
                                 </div>
                                 <div class="text-center mt_5">
                                    <a href="<?php echo home_url('/demos'); ?>?t=<?php echo sanitize_title($value); ?>" class="link f12i" data-transkey="visitDemo">Visit Demo <i class="fas fa-angle-right"></i></a>
                                 </div>
                              </div> 
                              <?php } ?>
                           </div>
                        </div>   
                     </div>
                     <div class="modal-footer border-0 text-center">
                        <button type="submit" class="btn btn-primary btn-no-loading w-100" id="saveTemplate" data-transkey="save">Save</button>
                     </div>
               </form>   
        </div>
   </div>
</div>
<!-- Choose template End -->
<?php } } ?>

<?php
get_footer();
?>

<?php if(is_user_logged_in() && !$selectedTemplate && isset($_GET['rstep']) && ($_GET['rstep'] == 2)) { 
   ?>
   <script>
      jQuery('#choose-template').modal(
         {
            backdrop: 'static',
            keyboard: false
         }
      );
   </script>
<?php } ?>

<!-- This is model for confirmation  Start-->
<div class="modal fade" id="mi-modal">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content custom-form-ui modal-popup-ui">
               <div class="select-template-alert px_15 text-center"></div> 
                     <div class="modal-body">
                        <div class="panel-body">
                              <p class="text-center" data-transkey="doYouWantToCancelPlan">Do you want to Cancel Plan?</p>
                        </div>   
                     </div>
                     <div class="modal-footer border-0 text-center">
                        <button type="button" class="btn btn-primary btn-no-loading w-100 bg-green" id="modal-btn-yes" data-transkey="yes">Yes</button>
                        <button type="button" class="btn btn-primary btn-no-loading w-100" id="modal-btn-no" data-transkey="no">No</button>
                     </div>
        </div>
   </div>
</div>
<!-- This is model for confirmation  End-->



