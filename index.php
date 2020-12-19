<?php get_header(); ?>
<div class="page-section pt_50">
   <div class="container">
   <?php
    if (have_posts()): 
        while(have_posts()): 
            the_post(); 
            the_content();
        endwhile;
    endif;
    ?>
   </div>
</div>
<?php get_footer(); ?>