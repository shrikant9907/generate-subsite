
  <?php 
  // Get network schedule maintenance data
  $network_id = get_current_network_id();
  $mdata = get_network_option($network_id, 'maintenance_data', true );
  $mdata = unserialize($mdata);

  if(!is_super_admin() && is_user_logged_in() && is_page('registration') && ($mdata['show'] == 'yes')): 
  ?>
  <div class="mtsnb hide alert bg-warning fixed_bottom mb_0 pti_20 pbi_20 alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="container-fluid">
        <div class="f18 font_bold mb_5 text-danger d-inline-block">Scheduled Maintenance Alert !!</div>
        <div class="f14"><div class="mr_5 f16 font_bold d-inline-block"><?php echo $mdata['title']; ?></div> <?php echo $mdata['desc']; ?> </div>
    </div>
  </div>
  <?php endif; ?>

  <?php wp_footer(); ?>

</body>
</html>  
