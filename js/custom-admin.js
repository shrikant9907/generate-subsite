jQuery('document').ready(function(){

    jQuery('.modal-close').on('click', function(){
        jQuery(this).closest('.modal').hide();
    });

});


// Here Model start 
    var modal = document.getElementById("add-section-model");
    var addSection = document.getElementById("addSection");

    jQuery('#addSection').on('click', function(){
        modal.style.display = "block";
    });

    //add key popup 
    var addkeyModel = document.getElementById("addkeyModel");
    var addkey = document.getElementById("addkey");
    jQuery('#addkey').on('click', function(){

        addkeyModel.style.display = "block";

    });

 // Translation key 
 jQuery('#translation-key').on('keypress', function(e){
    if (e.which == 32){
        jQuery('#key').css('color','red').text('Space is not allowed'); 
        return false;
    }else{
        jQuery('#key').css('color','black').text('Key(Use camelCase)'); 
        return true;
    }
 });


// Add section start 
jQuery( "#add-section" ).submit(function( event ) {
    event.preventDefault();
    var data = {
        'action': 'custom_add_section',
        'section_name': jQuery(this).serialize()
    }
    jQuery('#add-section-button').val('Adding..')
    jQuery.post(translation_object.ajax_url, data, function(response) {
        if(response.status_code == 2){
            jQuery('.alertadmin').remove();
            jQuery('#add-section .modal-body').prepend("<div class='alertadmin alert-success'>"+response.message+"</div>");
        }

        setTimeout(function(){ 
            jQuery('#add-section-button').val('Add Section');
            window.location.href = window.location.href;
        }, 2000);        
    });

  });
// Add section End

// Delete sections 
  jQuery( '.delete-btn' ).on( 'click', function(e){
      e.preventDefault(); 
    var currentElement = jQuery(this);  
    var deleteId = jQuery(this).attr('delete-id');
    var data = {
        'action': 'delete_section',
        'delete_id': deleteId 
    }

    jQuery.post( translation_object.ajax_url, data, function(response){
        if(response.status == 1)
        currentElement.parent().parent().remove();
    });

  });

  // Delete keys 
  jQuery( '.delete-keys-btn' ).on( 'click', function(e){
    e.preventDefault(); 
  var currentElement = jQuery(this);  
  var deleteId = jQuery(this).attr('delete-id');
  var meta_key = jQuery(this).closest('tr').find(".meta-key").val();
  var data = {
      'action': 'delete_kyes',
      'delete_id': deleteId,
      'meta_key' :meta_key
  }

  jQuery.post( translation_object.ajax_url, data, function(response){
        if(response == '1') {
            alert('1 row deleted.');
            var trs = currentElement.closest('tbody').find('tr');
        
            if (trs.length == '1') {
                currentElement.parent().parent().parent().parent().append('<tr><td class="text-center" colspan="8">No content yet</td></tr>');
            }
     
            currentElement.parent().parent().parent().remove();
        }
  });

});

  jQuery( '#add-key' ).on( 'submit', function(e){
      e.preventDefault();
      jQuery('#add-key-button').text('Key Adding..')
      var data = {
            'action': 'add_section_keys',
            'add_key': jQuery(this).serialize()
        }
       jQuery.post( translation_object.ajax_url, data, function(response){
            if(response.status_code == 1){
                jQuery('#add-key .modal-body').prepend('<p class="alertadmin alert-success">'+response.message+'</p>'); 
                window.location.href = window.location.href;
            } else {
                jQuery('#add-key .modal-body').prepend('<p class="alertadmin alert-danger">'+response.message+'</p>'); 
            }
       });

  });

  // generated json file 

  function generateJson(){

    var data = {
        'action': 'generate_json',
    }

    jQuery.post( translation_object.ajax_url, data , function(response){
        alert(response);
    });

  }


// update key data 
jQuery('.update-btn').on('click', function() {
    var row = jQuery(this).closest('tr');
    var columns = row.find('input');
    var keyData = {};
    //append array for input data 
    jQuery.each(columns, function(i, item) {
            keyData[item.name] = item.value;
    });
    
   // ajax
    var data = {
        'action': 'update_meta_key_value',
        'meta_keys': keyData, 
    }
    jQuery.post( translation_object.ajax_url, data , function(response){
        window.location.href = window.location.href;
    });
});