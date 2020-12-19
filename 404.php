<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
get_header(); 
?>
<div class="page-section pt_50">
   <div class="container">
   <style type="text/css">
    span.err_message {
        font-size: 8rem;
    }
    </style>

    <div class="mainbox vh_50 d-flex align-items-center justify-content-center">
        <div class="mainbox text-center">
        <div class="err"><span class="err_message text-danger">Page not found.</span></div>
            <div class="msg">Error 404<p>Let's go back to <a href="<?php echo esc_url(site_url('/')); ?>">home</a> and try from there.</p></div>
        </div>
    </div>
   </div>
</div>
<?php get_footer(); ?>