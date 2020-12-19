<?php
// Get Settings Data
$network_id = get_current_network_id();
$autolpSettings = unserialize(get_network_option($network_id, 'aglp_network_options'));

global $post;
$postid = $post->ID;
$prevData = get_post_meta($postid, 'lp_template_data', true);
?>

<?php if(isset($autolpSettings['section_1']))  { ?>
  <!-- Banner Section Start -->
  <section class="section-banner pt_75 pb_60 bg_black text-white text-center relative">
    <video class="section-bg-video w-100" autoplay="" muted="" playsinline="" loop="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/videos/surviral-compressed_1024X768.mp4"></video>
    <div class="overlay_b absolute w-100 "></div>
    <div class="container">

     <h1 class="banner-title-before" data-transkey="bannerTitleBefore" >Surviral</h1>
     <h2 class="banner-heading" data-transkey="bannerHeading">surviral</h2>
     
     <p class="banner-description mb_85" data-transkey="bannerDescription">Introducing the strongest AI based automated customer interaction tool</p>
     <p class="banner-actions"><a class="btn btn-primary r_30 px_30 py_15" href="<?php echo site_url('/registration/'); ?>" data-transkey="bannerButtonText"><i aria-hidden="true" class="fas fa-power-off mr_20"></i>Get Started Now!</a></p>   

    </div>
  </section>
  <!-- Banner section end -->
<?php } ?>

<?php if(isset($autolpSettings['section_2']))  { ?>
  <!-- Carousel Section Start -->
  <section id="section_2" class="section-carousel common-section bg-white pt_80 pb_80">
    <div class="container-fluid">

    <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="areYouWorrideHeadding">Are you worried about attracting customers?</h2>
    <p class="section-description text-center" data-transkey="areYouWorrideDescription">We are entering an era where traditional marketing practices do not work.</p>
   
    <div class="carousel-ui text-left pt_5">
      <div class="slider slickFiveItems">
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/09/Webp.net-resizeimage-2.jpg" />
          <p class="mb_10" data-transkey="advertisementsCost" >Advertisement costs are high..</p>
        </div>
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/09/Webp.net-resizeimage.jpg" />
          <p class="mb_10" data-transkey="iWantToBeInfluencer" >I want to be an influencer</p>
        </div>
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/08/girl-1848477_640.jpg" />
          <p class="mb_10" data-transkey="noCustomerVisit">No customers visit my store</p>
        </div>
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/08/cat-334383_640.jpg" />
          <p class="mb_10" data-transkey="noImpactEven" >No impact even after spending on paid advertisements..</p>
        </div>
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/08/people-1492052_640.jpg" />
          <p class="mb_10" data-transkey="thingsAreGoodBut" >Things are good but they don’t sell..</p>
        </div>
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/08/people-1492052_640.jpg" />
          <p class="mb_10" data-transkey="thingsAreGoodBut">Things are good but they don’t sell..</p>
        </div>
      </div>
    </div>
 
    </div>
  </section>
  <!-- Carousel Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_3']))  { ?>
  <!-- Simple Section Start -->
  <section id="section_3" class="section-simple common-section bg-white pt_80">
    <div class="container">

    <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="leaveItHeading" >Leave it to Surviral.</h2>
    <p class="section-description text-center" data-transkey="leaveItDescription">Surviral is an Instagram automated marketing tool powered by artificial intelligence.<br /> It is affordable, easy to use, and more effective than existing traditional marketing.</p>

    </div>

    <p><img class="img-fluid w-100" alt="" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/all-3-1536x922.jpg"></p>
  </section>
  <!-- Simple Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_4']))  { ?>
  <!-- Cards Listing Section Start -->
  <section id="section_4" class="section-cardlisting common-section bg-white pt_80 pb_80">
    <div class="container">
      <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="whyIsInstagramHeading" >Why is Instagram important?</h2>
      <p class="section-description text-center" data-transkey="whyIsInstagramDescription" >Instagram is a fantastic platform for the most effective marketing nowadays
      </p>
    </div>
    <div class="container-fluid">
      <div class="form-row">
        <div class="col-12 col-sm-6 col-md-4">
             <div class="card r_0 border-0 text-center mb_30">
               <img class="img-fluid mb_20 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/instagram-5409107_640.jpg" alt="" />
               <h3 class="mb_15" data-transkey="whyIsInstagramOverwhelming">①<br />Overwhelming number of users</h3>
               <div class="numbers mb_15">1,000,000,000</div>
               <div class="description mb_15" data-transkey="overIbillionUsers">Over 1 billion users worldwide, Around 33 million users in Japan,<br /> & One out of four people use Instagram.</div>
             </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
             <div class="card r_0 border-0 text-center mb_30">
               <img class="img-fluid mb_20 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/people-2570925_640.jpg" alt="" />
               <h3 class="mb_15" data-transkey="enormousActive">②<br />Enormous active rate</h3>
               <div class="numbers mb_15">84.7%</div>
               <div class="description mb_15" data-transkey="comparedTo">Compared to TWITTER and FACEBOOK,<br /> users open INSTAGRAM almost every day.</div>
             </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
             <div class="card r_0 border-0 text-center mb_30">
               <img class="img-fluid mb_20 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/phone-photo-2985169_640.jpg" alt="" />
               <h3 class="mb_15" data-transkey="impressivePurchase">③<br />Impressive purchase rate</h3>
               <div class="numbers mb_15">74.2%</div>
               <div class="description mb_15" data-transkey="threeOutOfFour">Three out of four people <br />makes purchase decisions based on something that they see on Instagram</div>
             </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Cards Listing Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_5']))  { ?>
  <!-- Parallex Section Start -->
  <section id="section_5" class="section-parallax common-section bg-dark pt_50 pb_50 text-center position-relative">
    <div class="overlay_b position-absolute"></div>
    <div class="container">
      <h2 class="main-heading-ui text-white" data-transkey="registerNowLimit" >Register now! A limited number of free trial campaigns are in progress</h2>
       <p class="section-actions position-relative"><a class="btn btn-primary r_30 px_30 py_15" href="<?php echo site_url('/registration/'); ?>" data-transkey="getStartedNowButton"><i aria-hidden="true" class="fas fa-power-off mr_20"></i>Get Started Now!</a></p>   
    </div>
  </section>
  <!-- Parallex Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_6']))  { ?>
  <!-- Cards Icon Section Start -->
  <section id="section_6" class="section-cardicons common-section bg-white pt_80 pb_80">
    <div class="container">
      <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="whySurviralHeading" >Why Surviral?</h2>
      <p class="section-description text-center" data-transkey="immenseEfficiencyDescription">Immense efficiency and effectiveness made possible by artificial intelligence.</p>
    </div>
    <div class="container-fluid">
      <div class="form-row">
        <div class="col-12 col-sm-6 col-md-4">
             <div class="card r_0 border-0 text-center mb_30">
               <img class="img-fluid mb_20 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/2arrow-3110803_640.jpg" alt="" />
               <h3 class="mb_15"data-transkey="leaveEverthingToAi" >①<br />Leave everything to AI!</h3>
               <div class="description mb_15" data-transkey="thinkingInvestigation">Thinking, investigating, moving your hands, analyzing and taking countermeasures,AI will take care of all these efforts.</div>
             </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
             <div class="card r_0 border-0 text-center mb_30">
               <img class="img-fluid mb_20 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/arrow-3110803_640-2.jpg" alt="" />
               <h3 class="mb_15" data-transkey="saveHugeAmount">②<br />Save a huge amount of time!</h3>
               <div class="description mb_15" data-transkey="automateTedious">Automate tedious tasks that take about 2-3 hours a day .You can make good use of that time in an effective way.</div>
             </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
             <div class="card r_0 border-0 text-center mb_30">
               <img class="img-fluid mb_20 w-100" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/1arrow-3110803_640.jpg" alt="" />
               <h3 class="mb_15" data-transkey="inconceivableCost">③<br />Inconceivable cost reductions</h3>
               <div class="description mb_15" data-transkey="reduceSiteProduction">Reduce site production, SEO, advertising, and huge marketing costs. You can even expect better results at less than a tenth the price .</div>
             </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Cards Icon Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_7']))  { ?>
    <!-- Carousel Section Start -->
  <section id="section_7" class="section-carousel three-carousel bg-light-pink common-section pt_80 pb_80">
    <div class="container-fluid">

    <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="onlyStepsItsJustSimple">Only 3 steps, It’s just simple!</h2>
    <!-- <p class="section-description text-center">We are entering an era where traditional marketing practices do not work.</p> -->
   
    <div class="carousel-ui text-left pt_5">
      <div class="slider slickThreeItems">
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 max_w_300 mx-auto" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/top.png" />  
          <h3 class="mb_15" data-transkey="firstFillYourInformation" >① First, Fill your information</h3>
          <p class="mb_10" data-transkey="enterYourInstagram">Enter your Instagram Information and the layer you want to reach. AI will recommend effective hashtags. </p>
        </div>
             <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 max_w_300 mx-auto" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/chart.png" />  
          <h3 class="mb_15" data-transkey="post">②Post</h3>
          <p class="mb_10" data-transkey="postInformation">Post the information and photos you want to publish as usual. You can also make a schedule post to publish it at the right time.</p>
        </div>
        <div class="img-card text-center w_250 max_w_100p px_5">
          <img class="img-fluid mb_25 max_w_300 mx-auto" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/type.png" />  
          <h3 class="mb_15" data-transkey="theRestFully">③ The rest is fully automatic</h3>
          <p class="mb_10" data-transkey="aiWillAct">AI will act on your target audience to get</p>
        </div>
      </div>
    </div>
 
    </div>
  </section>
  <!-- Carousel Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_8']))  { ?>
  <!-- Parallex Section2 Start -->
  <section id="section_8" class="section-parallax common-section bg-dark pt_50 pb_50 text-center position-relative">
    <div class="overlay_b position-absolute"></div>
    <div class="container">
      <h2 class="main-heading-ui text-white" data-transkey="registerNowLimit">Register now! A limited number of free trial campaigns are in progress</h2>
       <p class="section-actions position-relative"><a class="btn btn-primary r_30 px_30 py_15" href="<?php echo site_url('/registration/'); ?>" data-transkey="getStartedNowButton"><i aria-hidden="true" class="fas fa-power-off mr_20"></i>Get Started Now!</a></p>   
    </div>
  </section>
  <!-- Parallex Section2 End -->
<?php } ?>

<?php if(isset($autolpSettings['section_9']))  { ?>
  <!-- Cards Icon2 Section Start -->
  <section id="section_9" class="section-cardicons common-section bg-white pt_70 pb_40">
    <div class="container">
      <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="artificialIntelligence" >Artificial Intelligence Targeting</h2>
      <p class="section-description text-center mb_60" data-transkey="aiActomatically">AI automatically analyze and approaches the optimal target layer for you</p>
    </div>
    <div class="container-fluid">
      <div class="form-row">
        <div class="col-3">
             <div class="card r_0 border-0 text-center mb_30">
               <div class="card-icon text-white mx-auto"><i class="far fa-heart" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="interest">Interest</div>
             </div>
        </div>
        <div class="col-3">
             <div class="card r_0 border-0 text-center mb_30">
               <div class="card-icon text-white mx-auto"><i class="fas fa-map-marked-alt" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="area">Area</div>
             </div>
        </div>
        <div class="col-3">
             <div class="card r_0 border-0 text-center mb_30">
               <div class="card-icon text-white mx-auto"><i class="far fa-grin" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="gender">Gender</div>
             </div>
        </div>
        <div class="col-3">
             <div class="card r_0 border-0 text-center mb_30">
               <div class="card-icon text-white mx-auto"><i class="far fa-edit" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="postedContent">Posted Content</div>
             </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Cards Icon2 Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_10']))  { ?>
  <!-- Cards Icon2 Section Start -->
  <section id="section_10" class="section-cardicons common-section bg-light-pink pt_70 pb_50">
    <div class="container">
      <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="listOfFunctionsHeading" >List of Functions that can be Automated at Surviral</h2>
      <p class="section-description text-center mb_60" data-transkey="onceYouHaveDecided">Once you have decided the rules, leave the troublesome work to us</p>
    </div>
    <div class="container">
      <div class="form-row">
        <div class="col-4">
             <div class="card r_0 border-0 text-center mb_15 bg-transparent">
               <div class="card-icon text-white mx-auto"><i class="far fa-thumbs-up" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="like">Like</div>
               <div class="description mb_15" data-transkey="likePostOfYour">Like posts of your target audience</div>
             </div>
        </div>
        <div class="col-4">
             <div class="card r_0 border-0 text-center mb_15 bg-transparent">
               <div class="card-icon text-white mx-auto"><i class="far fa-plus-square" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="follow">Follow</div>
               <div class="description mb_15" data-transkey="followTheTarget" >Follow the target audience</div>
             </div>
        </div>
        <div class="col-4">
             <div class="card r_0 border-0 text-center mb_15 bg-transparent">
               <div class="card-icon text-white mx-auto"><i class="far fa-window-close" aria-hidden="true"></i></div>
               <div class="section-description"data-transkey="unfollow" >Unfollow</div>
               <div class="description mb_15" data-transkey="automaticUnfollow">Automatic unfollow the users</div>
             </div>
        </div>
              <div class="col-4">
             <div class="card r_0 border-0 text-center mb_15 bg-transparent">
               <div class="card-icon text-white mx-auto"><i class="far fa-comment-dots" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="comment">Comment</div>
               <div class="description mb_15" data-transkey="commentOnTheTarget">Comment on the target post</div>
             </div>
        </div>
        <div class="col-4">
             <div class="card r_0 border-0 text-center mb_15 bg-transparent">
               <div class="card-icon text-white mx-auto"><i class="far fa-envelope" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="message">Message</div>
               <div class="description mb_15" data-transkey="automaticDirect">Automatic direct messaging</div>
             </div>
        </div>
        <div class="col-4">
             <div class="card r_0 border-0 text-center mb_15 bg-transparent">
               <div class="card-icon text-white mx-auto"><i class="fas fa-chart-line" aria-hidden="true"></i></div>
               <div class="section-description" data-transkey="performanceAnalysis">Performance analysis</div>
               <div class="description mb_15" data-transkey="generateDetailedReport">Generate a detailed report</div>
             </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Cards Icon2 Section End -->
<?php } ?>

<?php if(isset($autolpSettings['section_11']))  { ?>
  <!-- Accordion Section Start -->
  <section id="section_11" class="section-accordion common-section bg-white pt_80 pb_80">
    <div class="container">
      <h2 class="main-heading-ui text-center with-bottom-border" data-transkey="frequentlyAsked">Frequently Asked Questions</h2>
      <div class="row">
        <div class="col-12 col-sm-6">
            <div class="accordion_design1 ">
               <div class="accordion" id="accordionExample">

                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-transkey="areAutomation"><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10" ></i>Are automation tools safe?</h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body" data-transkey="dueToUnique">Due to the unique algorithm created by our SNS experts and artificial intelligence, it is safe and secure because it is judged only as normal human movement for Instagram.
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingOne2">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2" data-transkey="IsThreeRisk"><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10"></i>Is there a risk of account freeze?</h2>
                  </div>

                  <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionExample">
                    <div class="card-body" data-transkey="instagramHasOwn" >Instagram has its own private restrictions on each account, depending on the age of the account and the number of followers, which is constantly changing.We use artificial intelligence to assume that approximate limit and then take action on a much safer line, so don’t worry unless you take additional action yourself.</div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingOne3">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3" data-transkey="canItakeAction"><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10"></i>Can I take action on my own?</h2>
                  </div>

                  <div id="collapseOne3" class="collapse" aria-labelledby="headingOne3" data-parent="#accordionExample">
                    <div class="card-body" data-transkey="sinceAiOperates">Since AI operates while judging the limit of the number of actions, basically, please do not perform any action other than viewing or posting.</div>
                  </div>
                </div>

              </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
              <div class="accordion_design1 ">
               <div class="accordion" id="accordionExample2">

                <div class="card">
                  <div class="card-header" id="headingOne4">
                    <h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4" data-transkey="isTheTarget" ><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10"></i>Is the target changeable?</h2>
                  </div>
                  <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne4" data-parent="#accordionExample2">
                    <div class="card-body" data-transkey="yesYouCanChange">Yes, you can change the settings at any time in the web app.</div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingOne5">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5" data-transkey="howEffectiveIs"><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10"></i>How effective is it actually?</h2>
                  </div>
                  <div id="collapseOne5" class="collapse" aria-labelledby="headingOne5" data-parent="#accordionExample2">
                    <div class="card-body" data-transkey="asResultOfAutomated">As a result of automated services, the rate that leads to increased follow-up depends on the attractiveness of the account itself, the quality of posts, the target audience, and the frequency of updates.</div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingOne6">
                    <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="true" aria-controls="collapseOne6" data-transkey="whatShould"><i class="fas fa-chevron-down mr_10"></i><i class="fas fa-minus mr_10"></i>What should I do if I want to quit?</h2>
                  </div>
                  <div id="collapseOne6" class="collapse" aria-labelledby="headingOne6" data-parent="#accordionExample2">
                    <div class="card-body" data-transkey="youCanEasily">You can easily apply for suspension at any time from the account setting page.</div>
                  </div>
                </div>

              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Accordion Section End -->
<?php } 
 ?>


<?php 
// Get Settings Data
$blog_id = get_current_blog_id();
if ($blog_id == 1) {
  $network_id = get_current_network_id();
  $autolpSettings = unserialize(get_network_option($network_id, 'aglp_network_options' ));
} else {
  global $post;
  $postid = $post->ID;
  $autolpSettings = unserialize(get_post_meta($postid, 'lp_template_data', true));
}
if(isset($autolpSettings['section_12']) && (is_front_page() || is_page('preview') || is_page('demos')))  { ?>
  <!-- Footer Start -->
  <footer class="site-footer landing bg-dark text-white position-relative pb_10">

  <!-- This register now section will display on frontpage only -->
  <?php if(is_front_page() || is_page('demos')) { ?> 
    <div class="pt_50 pb_50 text-center">
      <div class="overlay_b position-absolute"></div>
      <div class="container">
        <h2 class="main-heading-ui text-white" data-transkey="registerNowLimit">Register now! A limited number of free trial campaigns are in progress</h2>
        <p class="section-actions position-relative" data-transkey="getStartedNowButton"><a class="btn btn-primary r_30 px_30 py_15" href="<?php echo site_url('/registration/'); ?>"><i aria-hidden="true" class="fas fa-power-off mr_20"></i>Get Started Now!</a></p>   
      </div>
    </div>
  <?php } ?>
  
  <div class="container-fluid">
  <div class="overlay_b position-relative pt_25">
  <div class="container pb_60">
    <div class="form-row">
      <!-- <div class="col-12 col-xs-12 col-sm-6 col-md-1 d-lg-flex d-none"></div> -->
      <div class="col-12 col-xl-7">
        <div class="form-row">
          <div class="col">
            <div class="second-cloumn mb_30 px_5">
              <h3 class="footer-title d-none" data-transkey="nobordeZltd">NOBORDER.z Ltd.</h3>
                <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=500%207th%20Ave%208th%20floor%20New%20York%2C%20NY%2010018&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" aria-label="500 7th Ave 8th floor New York, NY 10018"></iframe>
            </div>  
          </div>  
          <div class="col">
            <div class="second-cloumn mb_30 px_5">
              <h3 class="footer-title d-none" data-transkey="nobordeZltd">NOBORDER.z Ltd.</h3>
                <img class="img-fluid footer-img" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/4-1024x684.jpg" alt="" />
            </div> 
          </div>
        </div> 
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="second-cloumn mb_30 px_5">
          <h3 class="footer-title" data-transkey="nobordeZltd">NOBORDER.z Ltd.</h3>
            <p data-transkey="footerAddressSec">500 7th Ave 8th floor New York, NY 10018<br />
info@noborders.net<br />
Entertainment x Internet Technology development</p>
          </div>  
      </div>
      <div class="col-12 col-md-6 col-xl-2">
        <div class="second-cloumn mb_30 px_5">
          <h3 class="footer-title" data-transkey="footerTitleSec">Sitemap</h3>
            <ul>
              <li class="foot-link"><a class="noreplace" href="#section_2" data-transkey="footerLinkAreYou">Are you worried</a></li>
              <li class="foot-link"><a class="noreplace" href="#section_3" data-transkey="footerLinkLeaveIt">Leave it</a></li>
              <li class="foot-link"><a class="noreplace" href="#section_4" data-transkey="footerLinkWhyInstagram">Why is Instagram</a></li>
              <li class="foot-link"><a class="noreplace" href="#section_6" data-transkey="footerLinkWhySurvival">Why Survival</a></li>
              <li class="foot-link"><a class="noreplace" href="#section_9" data-transkey="footerLinkArtifical">Artificial intelligence</a></li>
              <li class="foot-link"><a class="noreplace" href="#section_10" data-transkey="footerLinkListFunction">List of functions</a></li>
              <li class="foot-link"><a class="noreplace" href="#section_11" data-transkey="footerLinkFaqs">FAQs</a></li>
            </ul>
          </div>  
      </div>
    </div>
  </div>
    <div class="copyright text-center border-top f12 pt_5 pb_5">
      <p class="p-0 m-0" data-transkey="surviralCopyrightText">©2020 SURVIRAL All Rights Reserved</p>
    </div>
  </div>
  </div>

  
  </footer>
  <!-- Footer End -->
<?php } ?>
