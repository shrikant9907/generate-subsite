<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
    <meta charset="utf-8">

    <title><?php wp_title(); ?></title>
    <meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

    <?php 

    $blogId = get_current_blog_id(); 
    $blogusers = get_users( "blog_id=$blogId" );
    $cbuid = $blogusers['0']->ID;
    $siteName = get_user_meta($cbuid, 'site_title', true);
    $metaTitle = get_user_meta($cbuid, 'aglp_meta_title', true);
    $metaDesc = get_user_meta($cbuid, 'aglp_meta_desc', true);
    $metaImage = get_user_meta($cbuid, 'aglp_meta_image', true);
    $metaGSV = get_user_meta($cbuid, 'aglp_meta_gsv', true);
    $metaGAS = get_user_meta($cbuid, 'aglp_meta_gas', true);

    ?>   

    <meta name="title" content="<?php echo $metaTitle; ?>">
    <meta name="description" content="<?php echo $metaDesc; ?>">
    <meta name="site_name" content="<?php echo $siteName; ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php the_permalink(); ?>">
    <meta property="og:title" content="<?php echo $metaTitle; ?>">
    <meta property="og:description" content="<?php echo $metaDesc; ?>">
    <meta property="og:image" content="<?php echo $metaImage; ?>">
    <meta property="og:site_name" content="<?php echo $siteName; ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php the_permalink(); ?>">
    <meta property="twitter:title" content="<?php echo $metaTitle; ?>">
    <meta property="twitter:description" content="<?php echo $metaDesc; ?>">
    <meta property="twitter:image" content="<?php echo $metaImage; ?>">

    <!-- Google Site Verification -->
    <?php if($metaGSV) { ?>
        <meta name="google-site-verification" content="<?php echo $metaGSV; ?>" />
    <?php } ?>

    <!-- Google Analytics Script -->
    <?php if ($metaGAS)  {
        if (strpos($metaGAS,'<script>') !== false) {
            echo $metaGAS; 
        }
    } ?>

    <?php wp_head(); ?>
    <style>
        .hide{
            display: none !important;
        }
        .show{
            display: block !important;
        }
    </style>

   </head>

<body <?php body_class(); ?>>
<?php 
// Destory session
if (is_page('log-in')) {
    session_destroy();
}  

// check preview template condition
global $post;    
$template = get_page_template($post->ID);
$template_array = explode("/",$template); 
if(!(in_array('page-preview.php',$template_array))){ 
    ?>
    <div class="custom-header-ui1 main-navigation-container navigation-dark main-navigation-container-horizontal is-nav-sticky is-slicknav" data-navigation-color="navigation-dark">
        <div class="container">
        <div class="col position-relative">
            <div class="main-navigation-container-inner main_nav">
                <div class="main-navigation-logo is-slicknav-logo ">
                    <a href="<?php echo get_home_url(); ?>">
                        <!-- <span> -->
                            <!-- <img class="favicon_logo" src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/50.png" alt="" data-lazy-src="https://dy6k9vx8xmxk5.cloudfront.net/wp-content/uploads/2020/10/50.png" /> -->
                        <!-- </span> -->
                        Auto Generate LP                   
                    </a>
                </div>
                <!-- <nav id="main-navigation-menu" class="main-navigation-menu main-navigation-menu-horizontal">
                    <ul id="menu-surviral-header-menu" class="is-slicknav-navigation"></ul>
                </nav> -->

                <div class="auth-buttons position-absolute fixed_top_right">
                    <?php if(!is_user_logged_in()) { ?> 
                        <?php if(!is_page('login') && !is_page('log-in')) { ?> 
                            <a class="login-btn btn btn-outline-success" href="<?php echo get_home_url(); ?>/log-in/" data-transkey="logIn">LOGIN</a>
                        <?php } ?>
                        <?php if(!is_page('signup') && !is_page('register') && !is_page('registration') && !is_page('sign-up')) { ?> 
                            <a class="signup-btn btn btn-outline-dark" href="<?php echo get_home_url(); ?>/registration/" data-transkey="signUp" onclick="signUp()">SIGNUP</a>                    
                        <?php } ?>
                    <?php } else { ?>
                        <a class="signup-btn btn btn-outline-dark w_150" href="<?php echo get_home_url(); ?>/registration/?rstep=2" data-transkey="editLp">Edit LP</a>
                        <a class="login-btn btn btn-outline-success" data-transkey="logOut" href="<?php echo wp_logout_url(); ?>">LOG OUT</a>
                    <?php } ?>
                </div>
   
                <div class="dropdown flag-dropdown translate_wrapper">
                    <button class="dropbtn btn-default"><img src="<?php echo get_template_directory_uri(); ?>/images/icon/en_US.svg"></button>
                    <div class="dropdown-content hide">
                        <a href="#" data-lang="en" class="hide">
                            <img alt="" class="lang_flag" src="<?php echo get_template_directory_uri(); ?>/images/icon/en_US.svg" />
                        </a>
                        <a href="#" data-lang="ja">
                            <img alt="" class="lang_flag" src="<?php echo get_template_directory_uri(); ?>/images/icon/ja.svg" />
                        </a>
                        <!-- <a href="#" data-lang="ko">
                            <img  alt="" class="lang_flag" src="<?php echo get_template_directory_uri(); ?>/images/icon/ko_KR.svg" />
                        </a>
                        <a href="#" data-lang="zh">
                            <img  alt="" class="lang_flag" src="<?php echo get_template_directory_uri(); ?>/images/icon/zh_CN.svg" />
                        </a>
                        <a href="#" data-lang="zh_tw">
                            <img  alt="" class="lang_flag" src="<?php echo get_template_directory_uri(); ?>/images/icon/zh_TW.svg" />
                        </a> -->
                    </div>
                </div> 

            </div>
        </div>
        </div>
    </div>

<?php } 

