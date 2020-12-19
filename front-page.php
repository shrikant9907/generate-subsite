<?php
/*
* Template Name: Surviral LP Template
*/
get_header(); 

$blog_id = get_current_blog_id();
if ($blog_id == 1) {
  get_template_part('template-parts/aglp-landing-page');
} else{
    lp_template_select($blog_id);  
}

get_footer(); 
