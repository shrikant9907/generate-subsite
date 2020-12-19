// Script for multi step form start
var form = jQuery("#multistep-form");
// disbale finish button 
jQuery(".actions ul li:eq(2) a").addClass("disabled");

// Navivation in form
var searchParams = new URLSearchParams(window.location.search);
if (searchParams.get('rstep')) {
  msfStartIndex = (searchParams.get('rstep') - 1);
}  else {
  msfStartIndex = 0;
}

var LocationURi = window.location.href;

jQuery("#multistep-form").validate({
    errorPlacement: function errorPlacement(error, element) { 
      if ((element.attr('id') == 'userEmail') || (element.attr('id') == 'userEmailVerified')) {
        element.closest('.input-group').before(error); 
      } else {
        element.before(error);
      }
    },
    rules: {
        user_email: {
          required: true,
          email: true,
        },
        user_password: {
          minlength: 5,
        },
        user_cpassword: {
            minlength: 5,
            equalTo: "#userPassword"
        },
    },
    messages: { 
        user_name: {
            required: "Name is a required field.",
        },
        banner_heading_fs: {
          max: "Max limit 192",
        },
        user_email: {
            required: "Email is a required field.",
        },
        user_everified: {
          required: "Email verification is required.",
        },
        user_password: {
            required: "Password is a required field.",
            minlength: "Your password must be atleast 5 characters long."
        },
        user_cpassword: {
            required: "Confirm Password is a required field.",
            minlength: "Your password must be atleast 5 characters long.",
            equalTo: "Please add same password as above."
        },
    }
});

jQuery("#multistep-form").children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    labels: {
      finish: "Visit Site",
    },
    startIndex: msfStartIndex,
    saveState: true,
    autoFocus: true,
    onStepChanging: function (event, currentIndex, newIndex) {
        step_form_submit('next');
        if (newIndex == 1) {
          jQuery('#login-status').removeClass('hide');
        } 
        jQuery("#multistep-form").validate().settings.ignore = ":disabled";
        return jQuery("#multistep-form").valid();
    },
    onStepChanged: function (event, currentIndex, newIndex) {
        if (currentIndex == 1) {
          jQuery('#login-status').removeClass('hide');
          step_form_submit('register');
        } else {
          step_form_submit('next');
        }
        var newUri = updateQueryStringParameter(LocationURi, 'rstep', currentIndex + 1);
        window.history.pushState({path:newUri},'',newUri);
    },
    onFinishing: function (event, currentIndex) {
      jQuery("#multistep-form").validate().settings.ignore = ":disabled";
      return jQuery("#multistep-form").valid();
    },
    onFinished: function (event, currentIndex) { 
        // step_form_submit('finish');
        var hrefSiteCreate = jQuery('.create-site-alert a').attr('href');
        // sitePath
        var sitePath = jQuery('#sitePath').val();
        var payment_status = jQuery('#payment_status').val();

        if (hrefSiteCreate && sitePath && payment_status) {
          window.location.href = hrefSiteCreate;
        }else {
          document.body.scrollTop = 350;
          document.documentElement.scrollTop = 350;
          jQuery('.subscription_process .mb_0 #sub-error').removeClass('hide').html('<div class="alert alert-danger" role="alert">Please subscribe a plan.</div>');
          jQuery('.create-subsite #site-error').removeClass('hide').html('<div class="alert alert-danger" role="alert">Please create your landing page.</div>');
          setTimeout(function(){ 
            jQuery('.subscription_process .mb_0 #sub-error').addClass('hide');
            jQuery('.create-subsite #site-error').addClass('hide');
          }, 3000);
        }


    }
});
// Script for multi step form end


jQuery(document).ready(function() {

  // Load Flags script
  loadFlagsScript();

  // Validate Banner URL 
  var bannerVideoURL = jQuery('#banner_video_link').val();
  if (bannerVideoURL) {
    var url = bannerVideoURL;
    var checkUrl = isValidUrl(url);
    if (!checkUrl && url) {
      url = url.trim();
      jQuery('#banner_video_link').prev('.videoUrlValidate').removeClass('hide');
    }
  }

  // Load Select Picker
  jQuery('.selectpicker').selectpicker();
  
  // Validate Banner Fontsize
  jQuery('#banner_heading_fs').on('change', function(){
    var numVal = jQuery(this).val();
    var numLen = numVal.length;
    if (numLen > 3) {
      jQuery(this).val(numVal);
    }
  });

  // hide input field image upload field hide if have image value
  jQuery('.urlInput').each(function(){
      var urlVal = jQuery(this).val();
      if (urlVal!='') {
        jQuery(this).siblings('.ajaxFileUpload, span').addClass('hide');
      }
  });

  // video Play code
  jQuery('.custom-embed-play').on('click', function(){
    var videoPlayUrl = jQuery(this).data('playvideo');
    jQuery(this).prev('iframe').attr('src', videoPlayUrl);
    jQuery(this).next('.video_overlay').hide();
    jQuery(this).hide();
  });

  // Image close
  fnImageClose();

  // Stop click outside
    jQuery("#paynow").modal({
      show:false,
      backdrop:'static'
      });

    // Footer overlapping. 
    var mtsnbh = jQuery('.mtsnb').height();
    var mtsnbSession = sessionStorage.getItem('mtsnb_body');
    if (mtsnbh && (mtsnbh >0) && (mtsnbSession != 'close')) {
      jQuery('body').addClass('mtsnb_body');
      jQuery('.mtsnb').removeClass('hide');
      jQuery('.mtsnb .close').click(function(){
        jQuery('body').removeClass('mtsnb_body');
        sessionStorage.setItem('mtsnb_body', 'close');
      });
    } else {
      jQuery('body').removeClass('mtsnb_body');
      jQuery('.mtsnb').remove();
    }

    var activePill = jQuery('#aglp-pills-tab .active');
    var aglpLinkLength = jQuery('#aglp-pills-tab .nav-link').length;
    if (activePill.index() <= 1) {
      jQuery('.prev-section').addClass('invisible');
    }
    if (activePill.index() >= (aglpLinkLength-1)) {
      jQuery('.next-section').addClass('invisible');
    }
    
    // Move next and previously. 
    jQuery('.next-section').click(function() {
      step_form_submit('next');
      var activePill = jQuery('#aglp-pills-tab .active');
      activePill.next().click();
      if (activePill.index()+1 >= (aglpLinkLength-1)) {
        jQuery(this).addClass('invisible');
      } else {
        jQuery(this).removeClass('invisible');
      }
      jQuery('.prev-section').removeClass('invisible');

    });
    
    jQuery('.prev-section').click(function() {
      step_form_submit('next');
      var activePill = jQuery('#aglp-pills-tab .active');
      activePill.prev().click();
      if (activePill.index() <= 1) {
        jQuery(this).addClass('invisible');
      } else {
        jQuery(this).removeClass('invisible');
      }
      jQuery('.next-section').removeClass('invisible');
    });

    // Tooltip
    jQuery('.tooltip-html .nav-link span').tooltip({
      animated: 'fade',
      placement: 'right',
      html: true
    });

    // Background Youtube Video
    jQuery('[data-youtube]').youtube_background();

    // Remove disable class if email already filled
    if(jQuery('#userEmail').val() != '') {
      if (jQuery('#verify_email').text() != 'Verified') {
        jQuery('#verify_email').removeClass('disabled');
      }
    }

    jQuery('.emptythisfield').on('click focus', function(){
      jQuery(this).removeAttr('readonly');
    });

    // Five Item Slider

jQuery('.slickFiveItems').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        lazyLoad: 'progressive',
        swipeToSlide: true,
      responsive: [
        {
          breakpoint: 1366,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1,
          }
        },
         {
          breakpoint: 1000,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    // Three Item Slider
    jQuery('.slickThreeItems').slick({
        dots:true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        swipeToSlide: true,
      responsive: [
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
    });
 
    // Preview declar variables 
    var $modal = jQuery('#preview-modal');
    var image = document.getElementById('sample_image');
    var cropper;

    jQuery('body').on('change', '.ajaxFileUpload', function(event) {

      $this = jQuery(this);
      file_data = $this.prop('files')[0];
      file_name = file_data['name'];

      var fileExtension = ['jpeg', 'jpg', 'png', 'svg'];
      if (jQuery.inArray( $this.val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        
        jQuery('#alert-modal-title').html('Select a valid Image file');
        jQuery('#alert-modal-body').html('Allowed Types: jpeg, jpg, png, svg');
        jQuery('#alert-modal').modal('show');
        $this.val('');

      } else {

        // Preview Image start
        var done = function(url){
          image.src = url;
          $modal.modal({backdrop: 'static', keyboard: false});
        };

        var reader = new FileReader();
        reader.readAsDataURL(file_data);
        reader.onload = function (e) {
          var image = new Image();        
          image.src = e.target.result;
          image.onload = function () {
            var height = this.height;
            var width = this.width;                
            if (height < 210 || width < 320) {
              jQuery('#alert-modal-title').html('Small image size.');
              jQuery('#alert-modal-body').html('Please upload an image of greater or equal to 640X420 Resolution.');
              jQuery('#alert-modal').modal('show');
              $this.val('');
              return false;
            } else {
                // call preview image function  start
                done(reader.result);
            }
          };
        }

      }

      $modal.on('shown.bs.modal', function() {
        setTimeout(initCropper(image), 1000);
      })
 
  });  

  // Preivew Button appear & disappear button 
  // Changes for desginer point of view
  jQuery('#multistep-form input, input, textarea, select').on('keypress change keyup keydown',function() {
    jQuery('.preview-button').addClass('hide').removeClass('show');
    jQuery('.save-changes-btn').removeClass('hide').addClass('show');

    // Limit alert
    var inval = jQuery(this).val();
    var maxval = jQuery(this).attr('maxlength');
    var nextvalue  = jQuery(this).next();
    if ((inval.length >= maxval) && (!jQuery(this).hasClass('nolimitcheck')) && (!nextvalue.hasClass('limitalert'))) {
      jQuery(this).after('<div class="limitalert text-info f12 mt_5">Max limit '+maxval+' reached.</div>');
      setTimeout(function(){ 
        jQuery('.limitalert').remove();
      }, 5000);        
    } 
  });

 
  // Get Localstorage Items 
  var language = localStorage.getItem("languageId");
  if (!language) {
    // Default language
    language = 'ja';
  }
  if(language){
    var lanId = jQuery(this).attr('data-lang');
    jQuery('.dropdown-content a').each(function(i,item){
        var attrLang = jQuery(this).attr('data-lang');
          if(attrLang == language){
            jQuery('.dropdown-content a').removeClass('hide');
            var imgSrc = jQuery('[data-lang="'+language+'"] img').attr('src');
            //append image source file 
            jQuery('.dropbtn img').attr( 'src',imgSrc);
            // hide from dropdown data 
            jQuery('[data-lang="'+language+'"]').removeClass('show').addClass('hide');
            // Translated data regarding language
            translate(language);
          }
    });
  }


});

function loadFlagsScript(){
   // Language tranlsation 
   jQuery('.flag-dropdown').on('click', function(){
    jQuery('.dropdown-content').toggleClass('hide');
  });


  jQuery('.dropdown-content a').on( 'click', function(e){
     e.preventDefault();
     var lanId = jQuery(this).attr('data-lang');
     var imgsrc = jQuery(this).find('img').attr('src');
     jQuery('.btn-default').find('img').attr('src',imgsrc);
     //hide current flag
     jQuery('.dropdown-content a').removeClass('hide');
     jQuery(this).addClass('hide');
      localStorage.setItem( 'languageId', lanId)
     // Calling transaltion data 
     translate(lanId);

     jQuery('.dropdown-content').addClass('hide');
     return false;
  });

}
 
function translate(tnum){
  var filePath = ajax_object.theme_uri+'/langauges/languages.json';
  jQuery.getJSON(filePath,function(data){ 
    // var data = JSON.stringify(data);
    jQuery.each( data, function( seckey, secval ) {
      if( seckey){
        jQuery.each( secval, function( metakey, metaval ) {
          jQuery('[data-transkey]').each(function(){
            dataTransKey = jQuery(this).data('transkey'); 
            if(metakey == dataTransKey){
              if (jQuery(this).is('input') || jQuery(this).is('textarea')) {
                 // console.log(metakey+':'+metaval[tnum],dataTransKey);
                 jQuery('[data-transkey='+dataTransKey+']').attr('placeholder', metaval[tnum]);
               } else {
                 jQuery('[data-transkey='+dataTransKey+']').text(metaval[tnum]);
               }
            }
          });
        });
      }
    });
  });

}

// Save changes on button Click 
jQuery("#multistep-form .save-changes-btn, #multistep-form .preview-button").on( 'click', function(){
  jQuery('.save-changes-btn').text('Saving...');
  jQuery('.save-changes-input').val('saved');
  step_form_submit('next');
  jQuery('.preview-button').removeClass('hide').addClass('show');
  jQuery('.save-changes-btn').removeClass('show').addClass('hide');
});

// Save on preview btn click
jQuery("#multistep-form .preview-button").on( 'click', function(){
  step_form_submit('next');
});

function step_form_submit(steps_status){
  var stepForm = jQuery("#multistep-form");
  var disabled = stepForm.find(':input:disabled').removeAttr('disabled');
  var data = {
      'action': 'step_form',
      'form_data': stepForm.serialize(),
      'steps_status': steps_status 
  }
  // Reset active tab on registration 
  if(steps_status == 'register' ){
    localStorage.setItem('activeTabId', 'aglp-section1-tab');
  }
  //End 
  disabled.attr('disabled','disabled');
  jQuery.post(ajax_object.ajax_url, data, function(response) {
    
      jQuery('.save-changes-btn').addClass('hide').removeClass('show').text('Save Changes');
      jQuery('.preview-button').removeClass('hide').addClass('show');

      if ((steps_status == 'register') && (response.code == 0) ) {
        if(response.type == 'passreset'){
           alert(response.message); 
           window.location.href = response.redirect ;

        }else{
          window.location.href = response.redirect ;
          // redirect 
          // window.location.href = window.location.href + "?&auth-error=true";
        }
        
      }
     
      if(( (steps_status == 'register') || ( (steps_status == 'next') )) && (response.code == 2)) {
        // if user update password
        if(response.type == 'passreset'){
          
          alert('Password updated successfully. Please login again with new password.');

        }

        window.location.href = response.redirect ;
        
      }

     
      // enable and disable preview button 
      if(response.disabled_status == 'disabled' ){
        jQuery('.preview-button').addClass("disabled").attr("disabled", true);
        jQuery('.preview-link a').addClass("disabled").attr("disabled", true);
      }else{
        jQuery('.preview-button').removeClass("disabled").removeAttr("disabled", true);
        jQuery('.preview-link a').removeClass("disabled").removeAttr("disabled", true);
      }

  });
}

jQuery('#verify_email').on('click',function(e){
      e.preventDefault(); 
      var generated_code = jQuery('#email_generated_code').val();
      var counter_value = jQuery('#counter-value').val();
      if(generated_code){
        console.log('Verification code already sent.');
      }else{
        verfication_code_generator('code_send');
        countdownButtonEnable(counter_value);
      }
      jQuery('#verify_otp').addClass('text-left');
});

jQuery('#resend_otp').on('click', function(e){
  e.preventDefault();
  jQuery('#counter-value').val(180);
  var counter_value = jQuery('#counter-value').val();
  verfication_code_generator('resend_code');
  // recend button disable
  jQuery('#recent-counter').removeClass('hide');
  jQuery('#recent-counter').addClass('show');
  jQuery('#resend_otp').prop('disabled', true);
  countdownButtonEnable(counter_value);
});

// code generator
function verfication_code_generator(status){
  
  var userEmail = jQuery('#userEmail').val(); 
  jQuery('#verify_otp').val('');
  jQuery('#wrong_otp').addClass('hide');
  jQuery('#otp_verified').addClass('hide');
    
    var data = {
      'action': 'email_verification',
      'user_email_address': userEmail,
      'code_status' : status 
    }
    jQuery.post(ajax_object.ajax_url, data, function(response) {
        if(response.status_code == 1){
          jQuery('.code-response').parent().removeClass('hide');
          jQuery('.code-response').text(response.message);
          jQuery('#email_generated_code').val(response.generated_code);
        }
    });

}

// verify button on change enable verify otp button 
// d means digit 
function verifyButtonEnable(d){

  //get value and count
  var count = d.value.length;
  
  if(count>0) {
    jQuery('#verify_otp').addClass('text-center');
    jQuery('#verify_otp').removeClass('text-left');
  } else {
    jQuery('#verify_otp').addClass('text-left');
    jQuery('#verify_otp').removeClass('text-center');
  }
  if(count >= 5){
    // enable verify button 
    jQuery('#verify_otp_btn').prop('disabled', false);
    jQuery('#wrong_otp').addClass('hide');
  } else {
    jQuery('#verify_otp_btn').prop('disabled', true);
  }  
  // check 6 digits only
  if (count >= 6) { 
    jQuery('#verify_otp').val(jQuery('#verify_otp').val().substr(0, 6));
  }
 
}


jQuery('#verify_otp_btn').on('click',function(e){
  e.preventDefault(); 
  jQuery(this).prop('disabled', true);
  var verifyOtp = jQuery('#verify_otp').val(); 
  var userEmail = jQuery('#userEmail').val();
  var userName = jQuery('#userName').val();
  var userPassword = jQuery('#userPassword').val();
  var confirmPassword = jQuery('#confirmPassword').val();
      var data = {
        'action': 'otp_verification',
        'otp_code': verifyOtp,
        'user_email_address': userEmail,
        'user_name' : userName,
        'user_password' : userPassword,
        'user_cpassword' : confirmPassword,
      }

      jQuery('#userEmailVerified-error').remove();
      jQuery.post(ajax_object.ajax_url, data, function(response) {
        if(response.status == 1){
          jQuery('#intiForm')[0].reset(); 
          jQuery('#initModal').modal('toggle');
          jQuery('#userEmail').attr("disabled", true);
          jQuery('#otp_verified').removeClass('hide');
          jQuery('#userEmailVerified').val('Verified');
          jQuery('#verify_email').addClass('bg-green text-white disabled').text('Verified');
          jQuery('#userEmailVerified-error').remove();
          // location.reload();
        } else if(response.status == 0){
          jQuery('#wrong_otp').removeClass('hide');
          jQuery('#verify_otp').val('');
        } else {
          jQuery(this).prop('disabled', true);
        }
      });
});

//email validation 
function emailValidation(email){
  $jthis = jQuery('#userEmail');
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if(emailReg.test(email)){
    // check email address already exist on database or not 
    var data = {
      'action': 'email_address_check',
      'user_email_address': email
    }
    jQuery.post(ajax_object.ajax_url, data, function(response) {
        if(response.status_code == 0){
          jQuery('#verify_email').removeClass('disabled');
        } else if(response.status_code == 1){
          $jthis.parent().before('<label id="userEmail-error" class="error" for="userEmail">'+response.message+'</label>');
          jQuery('#verify_email').addClass('disabled');
        }   
     });
  }
  
}

//count down button 
function countdownButtonEnable(timeleft){
  //var timeleft = counterValue;
  var downloadTimer = setInterval(function(){
    if(timeleft <= 0){
      clearInterval(downloadTimer);
      jQuery('#resend_otp').prop('disabled', false);
      jQuery('#recent-counter').addClass('hide');
    } else {
      jQuery('#counter-value').val(timeleft);
      var counter = jQuery('#counter-value').val();
      if(counter == 1 ){
        counter = 180;
      }
      document.getElementById("countdown").innerHTML = counter;
    }
    timeleft -= 1;
  }, 1000);

}


// Stripe scripts

// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe(ajax_object.stripe_publishable_key);

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
		fontWeight: 400,
		fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
		fontSize: '16px',
		lineHeight: '1.4',
		color: '#555',
		backgroundColor: '#fff',
		'::placeholder': {
			color: '#888',
		},
	},
	invalid: {
	  color: '#eb1c26',
	}
};

var cardElement = elements.create('cardNumber', {
	style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
  'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
  'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
	if (event.error) {
		resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
	} else {
		resultContainer.innerHTML = '';
	}
});

// Get payment form element
var form = document.getElementById('paymentFrm');
// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
	e.preventDefault();
	createToken();
});

// Create single-use token to charge the user
function createToken() {
	stripe.createToken(cardElement).then(function(result) {
		if (result.error) {
			// Inform the user if there was an error
			resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
		} else {
			// Send the token to your server
			stripeTokenHandler(result.token);
		}
	});
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
  jQuery('#payment-loader').removeClass('hide');
  // jQuery('#payBtn').text('Processing ').append('<i class="fas fa-spinner fa-spin"></i>');
  jQuery('#payBtn').text('Processing');
  // Insert the token ID into the form so it gets submitted to the server
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripeToken');
	hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  //form.submit();
  var data = {
    'action': 'custom_subscription_payment_getway',
    'form_data': jQuery('#paymentFrm').serialize(),
    'payment_code': 1
  }
  // Send ajax request to handle payment getway request
  jQuery.post(ajax_object.ajax_url, data, function(response) {
     if(response.status == 'active'){
       // mange overlay  
      jQuery('#payment-loader').removeClass('show').addClass('hide');
      jQuery('#payment_status').val('active');
     // jQuery('.domain').removeClass('hide');
      jQuery('#planinfo').html('Basic Plan - <span class="plan-active">Active</span>');
      // this is
      jQuery('.plan-details').append('<div class="plan-expiry-date">Expiry: '+response.plan_experiy_date + '</div><a href="javascript:void(0);" id="recurring-section" data-toggle="modal" data-target="#recurring-info">More Details</a>');
      jQuery('#recurring-data').html('\
      <div class="subscription-id d-flex justify-content-between">\
          <strong>Subscription ID </strong><span>'+response.payment_data.subscriber_id+'</span>\
      </div>\
      <div class="customer-id d-flex justify-content-between">\
      <strong>Customer ID </strong><span>'+response.payment_data.subscriber_customer_id+'</span>\
      </div>\
      <div class="plan-id d-flex justify-content-between">\
      <strong>Plan ID </strong><span>'+response.payment_data.subscriber_plan_id+'</span>\
      </div>\
      <div class="plan-title d-flex justify-content-between">\
      <strong>Plan </strong><span>Basic Plan</span>\
      </div>\
      <div class="plan-Price d-flex justify-content-between">\
        <strong>Price </strong><span>$'+response.payment_data.subscriber_plan_amount+' / '+response.payment_data.subscriber_plan_interval+'</span>\
        </div>\
        <div class="plan-type d-flex justify-content-between">\
        <strong>Payment Type </strong><span>Recurring</span>\
        </div>\
        <div class="plan-title d-flex justify-content-between">\
          <strong>Next billing date </strong><span>'+response.payment_data.subscriber_plan_end_date+'</span>\
          </div>');
      jQuery('#paynow').modal('hide');
      jQuery('#paymentButton').hide();
      //Disable plan now section 
      // ToDo for later
      // jQuery('#paymentButton').removeAttr('data-target').text('Cancel Plan');
       // here right cancle section plan
       jQuery('.plan .plan-button').html('<input type="hidden" name="subscriber_id" id="subscriber_id" value="'+response.subscriber_id + ' " /><button type="button" class="btn btn-primary bg-green cancle_plan" id="cancle_plan" onclick="canclePlan()" >Cancel Plan</button>');
       // Page reload 
       window.location.href = window.location.href;
     }
  });
}


// Site Creation 
function siteCreation(){
  // Get site title and site path
  var siteTitle = jQuery('#siteTitle').val();
  var sitePath  = jQuery('#sitePath').val();

  if(siteTitle == '' ){
      jQuery( '#siteTitle-error' ).css('display','block').text('Please Enter Site Title');
      jQuery('.site-create .fa-spinner').remove();
    }
    if(sitePath == '' ){
      jQuery( '#sitePath-error' ).css('display','block').text('Please Enter Site Path');
      jQuery('.site-create .fa-spinner').remove();
    }
    
    if(siteTitle && sitePath){
    // Add spinner
     jQuery('.site-create').attr('disabled', true).text('Creating Landing Page').append('<i class="ml_5 fas fa-spinner fa-spin"></i>');
   
      var data = {
        'action': 'site_creation',
        'site_title': siteTitle,
        'site_path': sitePath,
      }
      jQuery.post(ajax_object.ajax_url, data, function(response) {
         if(response.status_code == 0){
          // Remove spinner and disable  
          jQuery('.site-create .fa-spinner').remove();
          jQuery('.site-create').removeAttr('disabled', true);
          // Show alert message
          jQuery('.create-subsite #site-error').removeClass('hide').html('<div class="alert alert-danger" role="alert">'+response.message+'</div>');
          // Remove error 
          setTimeout(function(){ 
            jQuery('.create-subsite #site-error').addClass('hide');
          }, 3000);

          }else if(response.status_code == 1){
            jQuery('#sitePath').attr('disabled', true);
            jQuery('.create-site-desc').addClass('hide');
            jQuery('.create-site-alert').removeClass('hide').html('<p class="f12 mt_5 create-site-alert">Your landing page create on <a href="'+response.new_site_url+'">'+response.new_site_url+'</a></p>');
            jQuery('.create-subsite #site-error').removeClass('hide').html('<div class="alert alert-success" role="alert">'+response.message+'</div>');
            jQuery('.site-create').remove();
            jQuery('.site-create').removeAttr('disabled', true);
            setTimeout(function(){ 
              jQuery('.create-subsite #site-error').addClass('hide');
            }, 3000);

            // add remove and hide domain section 
            jQuery('.domain-map').removeClass('hide');
         }
      });

    }
}

function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  }
  else {
    return uri + separator + key + "=" + value;
  }
}

// Session Distroy on signup button click 
function signUp(){
  //reset session 
  var getUrl =  window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

   // Rempove local storage 
   var activatedId = localStorage.getItem('activeTabId');
   if(activatedId){
     localStorage.removeItem("activeTabId");
   } 
   
   var data = {
     'action': 'auto_generated_session_distroy',
     'current_session_status' : 1
   }
   jQuery.post(ajax_object.ajax_url, data, function(response) {
     console.log('Session Distroy Successfully '+response.current_session_status);
     localStorage.removeItem("activeTabId");
     window.location.href = response.sign_up_url;
   });
 
}

// Validate End Point
function validateEndPoint(endpoint){
  endpoint = endpoint.trim();
  endpoint = endpoint.replace(/[^a-z0-9\-\s]/gi, '');
  endpoint = endpoint.replace(/\s+/g, '-').toLowerCase();
  jQuery( '#sitePath' ).val(endpoint);
  return false;
}

// validate domain name 
function validateDomain(domain){
  var pattern = new RegExp(/^(?!:\/\/)([a-zA-Z0-9-]+\.){0,5}[a-zA-Z0-9-][a-zA-Z0-9-]+\.[a-zA-Z]{2,64}?$/gi); 
  if(pattern.test(domain)){
    return true; 
  }else{
    jQuery( '#domain-error' ).css('display','block').text('Invalid domain name.');
    setTimeout(function(){ 
      jQuery( '#domain-error' ).css('display','none') }, 3000);
    return false;
  }
}

function saveDomain(){
  var siteDomain = jQuery('#siteDomain').val();

  if (!siteDomain) {
    jQuery( '#domain-error' ).css('display','block').text( 'Please add domain name.' );
    setTimeout(function(){ 
      jQuery( '#domain-error' ).css('display','none') }, 3000);
    return;
  }

  var domainResponse = validateDomain(siteDomain);
  if(domainResponse == true){
    var data = {
      'action' : 'domain_save',
      'domain_name' : siteDomain
    }

    jQuery.post(ajax_object.ajax_url, data, function(response){
      // make condition for response 
      if(response.status_code == 0){
        jQuery( '#domain-error' ).css('display','block').text( response.message );
        setTimeout(function(){ 
          jQuery( '#domain-error' ).css('display','none') }, 3000);
      }else if(response.status_code == 1){
        jQuery('#siteDomain').prop("disabled",true);
        jQuery('#save_domain').prop("disabled",true);
        jQuery( '#domain-error' ).removeClass('error').css('display','block').addClass('success').css('color','green').text( response.message );
        setTimeout(function(){ 
          jQuery('#domain-alert').removeClass('hide').addClass('show');
          jQuery( '#domain-error' ).removeClass('success').addClass('error').css('display','none') }, 3000);
      }

    });

  }
}

// Select template submit button 
jQuery('#select-template').on('submit', function(e){
    e.preventDefault();
    var selectedTemplate = jQuery('input[name=template_name]:checked').val();
    if (typeof selectedTemplate !== "undefined") {
      var thisbtn = jQuery('#saveTemplate');
      thisbtn.append('<i class="ml_5 fas fa-spinner fa-spin"></i>');
      var data = {
        'action': 'auto_generated_save_template',
        'template_name': selectedTemplate,
      }
      thisbtn.prop('disabled', true);
      jQuery.post(ajax_object.ajax_url, data, function(response){
        if(response.status_code == 1){
          jQuery('.select-template-alert').html('<div class="text-success f14">Template saved successfully.</div>');
          setTimeout(function(){ 
            window.location.href = window.location.href;
          }, 1000); 
        } else {
          jQuery('.select-template-alert').html('<div class="text-danger f14">Unable to save template.</div>');
        }

        thisbtn.remove('fa-spinner');
      });
    } else {
      jQuery('.select-template-alert').html('<div class="text-danger f14">Please select one of the following templates.</div>');
    }

});

jQuery('.template-clicked').on('click', function(e){
  jQuery('.template-clicked').removeClass('border-success');
  jQuery('.select-template-alert').html('');
  jQuery(this).addClass('border-success');
});

// Remove disable button on login steps form 
if(jQuery( "body" ).hasClass( "logged-in" )){
  jQuery('.steps ul li').removeClass('disabled');
}


// Activation tab section 
jQuery('.tabs-section a.nav-link').on('click',function(){
  var activatedId = jQuery(this).attr("id");
  localStorage.setItem('activeTabId', activatedId);
  var aglpLinkLength = jQuery('#aglp-pills-tab .nav-link').length;
  if (jQuery(this).index() < 1) {
    jQuery('.prev-section').addClass('invisible');
    jQuery('.next-section').removeClass('invisible');
  } else if (jQuery(this).index() >= (aglpLinkLength-1)) {
    jQuery('.next-section').addClass('invisible');
    jQuery('.prev-section').removeClass('invisible');
  } else {
    jQuery('.next-section').removeClass('invisible');
    jQuery('.prev-section').removeClass('invisible');
  }
})


// Add hide and show class section 8 Register now 
jQuery('#aglp-section8 input[name=register_now_previous_section]').on('change', function(){
  var ischecked = jQuery(this).is(':checked');
  if(ischecked){
    jQuery('#register_now_second_section_bg_image').removeClass('show').addClass('disabled');
    jQuery('#register_now_second_section_heading').removeClass('show').addClass('disabled');
    jQuery('#register_now_second_section_repeater').removeClass('show').addClass('disabled');
  }else{
    jQuery('#register_now_second_section_bg_image').removeClass('disabled').addClass('show');
    jQuery('#register_now_second_section_heading').removeClass('disabled').addClass('show');
    jQuery('#register_now_second_section_repeater').removeClass('disabled').addClass('show');
  }
})

// Add hide and show class section 12 Register now 
jQuery('#aglp-section12 input[name=register_now_third_previous_section]').on('change', function(){
  var ischecked = jQuery(this).is(':checked');
  if(ischecked){
    jQuery('#register_now_third_section_bg_image').removeClass('show').addClass('disabled');
    jQuery('#register_now_third_section_heading').removeClass('show').addClass('disabled');
    jQuery('#register_now_third_section_repeater').removeClass('show').addClass('disabled');
  }else{
    jQuery('#register_now_third_section_bg_image').removeClass('disabled').addClass('show');
    jQuery('#register_now_third_section_heading').removeClass('disabled').addClass('show');
    jQuery('#register_now_third_section_repeater').removeClass('disabled').addClass('show');
  }
})


// Add hide and show class section 9 Register now 
jQuery('#aglp-section9 input[name=section5_copy]').on('change', function(){
  var ischecked = jQuery(this).is(':checked');
  if(ischecked){
    jQuery('#section9_bg_image').removeClass('show').addClass('disabled');
    jQuery('#section9_heading').removeClass('show').addClass('disabled');
    jQuery('#section9_repeater').removeClass('show').addClass('disabled');
    
  }else{
    jQuery('#section9_bg_image').removeClass('disabled').addClass('show');
    jQuery('#section9_heading').removeClass('disabled').addClass('show');
    jQuery('#section9_repeater').removeClass('disabled').addClass('show');
    
   
  }
})


// Add hide and show class section 13 Register now 
jQuery('#aglp-section13 input[name=section5_copy_13]').on('change', function(){
  var ischecked = jQuery(this).is(':checked');
  if(ischecked){
    jQuery('#section13_bg_image').removeClass('show').addClass('disabled');
    jQuery('#section13_heading').removeClass('show').addClass('disabled');
    jQuery('#section13_repeater').removeClass('show').addClass('disabled');
    
  }else{
    jQuery('#section13_bg_image').removeClass('disabled').addClass('show');
    jQuery('#section13_heading').removeClass('disabled').addClass('show');
    jQuery('#section13_repeater').removeClass('disabled').addClass('show');
    
   
  }
})



// Add hide and show class section 17 Register now 
jQuery('#aglp-section17 input[name=section5_copy]').on('change', function(){
  var ischecked = jQuery(this).is(':checked');
  if(ischecked){
    jQuery('#section17_bg_image').removeClass('show').addClass('disabled');
    jQuery('#section17_heading').removeClass('show').addClass('disabled');
    jQuery('#section17_repeater').removeClass('show').addClass('disabled');
    
  }else{
    jQuery('#section17_bg_image').removeClass('disabled').addClass('show');
    jQuery('#section17_heading').removeClass('disabled').addClass('show');
    jQuery('#section17_repeater').removeClass('disabled').addClass('show');
    
   
  }
})



// Add hide and show class section 9 Register now 
jQuery('#aglp-section9 input[name=section5_copy]').on('change', function(){
  var ischecked = jQuery(this).is(':checked');
  if(ischecked){
    jQuery('#section9_bg_image').removeClass('show').addClass('disabled');
    jQuery('#section9_heading').removeClass('show').addClass('disabled');
    jQuery('#section9_repeater').removeClass('show').addClass('disabled');
    
  }else{
    jQuery('#section9_bg_image').removeClass('disabled').addClass('show');
    jQuery('#section9_heading').removeClass('disabled').addClass('show');
    jQuery('#section9_repeater').removeClass('disabled').addClass('show');
    
   
  }
})




// var editorIds  = ["textarea#editor", "section11_editor"];

// // Include tinymce editor
// tinymce.init({
//   selector: 'textarea#editor',
//   skin: 'bootstrap',
//   plugins: 'lists, link, image, media',
//   toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
//   menubar: false
// });

// tinymce.init({
//   selector: 'textarea#section11_editor',
//   skin: 'bootstrap',
//   plugins: 'lists, link, image, media',
//   toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
//   menubar: false
// });
 
// Cropper Js
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result)
      };
      reader.readAsDataURL(input.files[0]);
      setTimeout(initCropper, 1000);
  }
}

function initCropper(image){
  var $modal = jQuery('#preview-modal');
  var cropper = new Cropper(image, {
    aspectRatio: 1.52,
    zoomable: true,
    zoomOnTouch: true,
    zoomOnWheel: true,
    cropBoxResizable: true,
    cropBoxMovable: true,
    wheelZoomRatio: 0.2,
    movable:true,
    autoCrop: true, 
    viewMode: 1, 
    preview:'.preview'
  });


  // on cancelCrop 
  document.getElementById('cropCancelled').addEventListener('click', function(){
    $this.val('');
    cropper.destroy();
    cropper = null;
  })

  // On crop button clicked
  document.getElementById('crop').addEventListener('click', function(){
      var cropbtn = jQuery(this);
      cropbtn.text('Cropping..');
      if (typeof cropper.getCroppedCanvas() !== "undefined") {
      cropper.getCroppedCanvas().toBlob(function(blob){
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function(){
        var base64data = reader.result;
    
        form_data = new FormData();
        form_data.append('file', base64data);
        form_data.append('file_name', file_name);
        form_data.append('action', 'preview_image');
         // End  
         jQuery.ajax({
          url: ajax_object.ajax_url,
          type: 'POST',
          contentType: false,
          processData: false,
          dataType: "json",
          data: form_data,
          success: function (response) {
            cropbtn.text('Crop');
            setTimeout( function() {
              $this.val('');
              $this.addClass('hide');
              $this.siblings('span').addClass('hide');
              $this.prev().val(response.url);
              $this.parent().children('.field-image').remove();
              $this.siblings('.urlInput').before('<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'+ response.url +'" alt="" /></div>');
              $modal.modal('hide');
              cropper.destroy();
              cropper = null;
              fnImageClose();
            },1000);
          }
        });
        };
      });
    }
  })
}
 
var xamulaiRepeaterSections = ["repeaterS2", "repeaterS3", "repeaterS6", "repeaterS7","repeaterS8","repeaterS9", "repeaterS10","repeaterS11_1","repeaterS11_2", "repeaterS13", "repeaterS14", "repeaterS15", "repeaterS16"];
xamulaiRepeaterSections.forEach(function(item, index){
  jQuery('#'+item).createRepeater({
    showFirstItemToDefault: true,
  });
});
 

// fetch  local storage value 
var activatedId = localStorage.getItem('activeTabId'); 
if(activatedId){
  // Show preview button always 
  jQuery('.preview-button').removeClass('hide').addClass('show');
  jQuery('.save-changes-btn').addClass('hide').removeClass('show');

  //remove activate class everywhere 
  var contentTabId = activatedId.replace('-tab','');
  jQuery('#aglp-pills-tab a').removeClass('active');
  jQuery('#aglp-pills-tab #'+activatedId).addClass('active');
  jQuery('.tab-pane').removeClass('active show');
  jQuery('#'+contentTabId).addClass('active show');
}


// Update Meta Fields
function aglpUpdateMetaFields(){
  var metaImage = jQuery('#metaImage').val();
  var metaTitle  = jQuery('#metaTitle').val();
  var metaDescription  = jQuery('#metaDescription').val();
  var metaGSV  = jQuery('#metaGSV').val();
  var metaGAS  = jQuery('#metaGAS').val();
   
  // Add spinner
  jQuery('#save_meta_data').attr('disabled', true).text('Saving...').prepend('<i class="mr_10 fas fa-spinner fa-spin"></i>');
  
  var data = {
    'action': 'update_aglp_seo_meta',
    'meta_image': metaImage,
    'meta_title': metaTitle,
    'meta_desc': metaDescription,
    'meta_gsv': metaGSV,
    'meta_gas': metaGAS,
  }
  jQuery.post(ajax_object.ajax_url, data, function(response) {

    if(response.status == 1){
      jQuery('#save_meta_data').next().removeClass('alert-danger').addClass('alert-success');
    } else {
      jQuery('#save_meta_data').next().removeClass('alert-success').addClass('alert-danger');
    }   
  
    // Remove spinner and disable  
    jQuery('#save_meta_data').next().removeClass('hide').text(response.message);
    jQuery('#save_meta_data').text('Save Meta');
    jQuery('#save_meta_data .fa-spinner').remove();
    jQuery('#save_meta_data').removeAttr('disabled', true);

    setTimeout(function(){ 
      jQuery('#save_meta_data').next().addClass('hide');
    }, 3000);
    
  });
}

// Validate Video URL
function validateVideoUrl(data) {
  var url = data.value;
  var fieldId = data.id;
  var checkUrl = isValidUrl(url);
  if (!checkUrl && url) {
    url = url.trim();
    jQuery('#'+fieldId).val('');
    jQuery('#'+fieldId).prev('.videoUrlValidate').removeClass('hide');
    setTimeout(function(){ 
      jQuery('#'+fieldId).prev('.videoUrlValidate').addClass('hide');
    }, 3000);
  } else {
    jQuery('#'+fieldId).prev('.videoUrlValidate').addClass('hide');
  }
}

// Validate URL
function validateUrl(data) {
  var url = data.value;
  var fieldId = data.id;
  var checkUrl = isValidUrl(url);
  jQuery( '.invalid-url' ).remove();
  if (!checkUrl && url && (!url.startsWith('#'))) {
    jQuery('#'+fieldId).val('');
    jQuery('#'+fieldId).parent().prepend('<label class="error f12 invalid-url">Please add valid URL or #hash</label>');
  } else if (!url) {
    jQuery('#'+fieldId).parent().prepend('<label class="error f12 invalid-url">Please add Url</label>');
  }
}

function isValidUrl(url) {
  return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}

function fnImageClose() {
  jQuery('.fimg-close').remove();
  jQuery('.field-image').append('<span class="fimg-close">&times</span>');
  jQuery('.fimg-close').click(function(){
    jQuery(this).parent().next().val('');
    jQuery(this).parent().siblings('.ajaxFileUpload').val('');
    jQuery(this).parent().siblings('.ajaxFileUpload').removeClass('hide');
    jQuery(this).parent().siblings('span').removeClass('hide');
    jQuery(this).parent().remove();
    jQuery('.preview-button').addClass('hide').removeClass('show');
    jQuery('.save-changes-btn').removeClass('hide').addClass('show');
  });
}

// Recurring payment 
// jQuery('.cancle_plan').on( 'click', function(){
  
  

// });


function canclePlan(){

  jQuery("#mi-modal").modal('show');

  jQuery("#modal-btn-yes").on("click", function(){
    callback(true);
    jQuery("#mi-modal").modal('hide');
  });

  jQuery("#modal-btn-no").on("click", function(){
    jQuery("#mi-modal").modal('hide');
  });
}


function callback(confirm){
   if(confirm){
      jQuery('#cancle_plan').text('Cancelling..');
      var subId = jQuery('#subscriber_id').val();
      var data = {
      'action': 'custom_subscription_payment_getway',
      'subscriber_id': subId
    }
      jQuery.post(ajax_object.ajax_url, data, function(response) {
          if(response.payment_data.subscriber_status == 'canceled'){
              jQuery('#cancle_plan').addClass("disabled").text('Cancelled');
              window.location.href = window.location.href;
          }
      });
   }
}
