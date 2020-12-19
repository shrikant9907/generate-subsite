<?php
// Get Settings Data
$network_id = get_current_network_id();
$autolpSettings = unserialize(get_network_option($network_id, 'aglp_network_options'));
global $post;
$postid = $post->ID;
$prevData = get_post_meta($postid, 'lp_template_data', true);
foreach($autolpSettings AS $key => $value){
  $template_section = preg_replace('#[_]#',"", $key);
  if($template_section){
    get_template_part('template-parts/xamulai-fe/'.$template_section);
  }
}

?>