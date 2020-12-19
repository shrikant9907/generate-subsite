<?php 
// Added translation section data
add_action( 'wp_ajax_custom_add_section', 'custom_add_translation_section' );
add_action( 'wp_ajax_nopriv_custom_add_section', 'custom_add_translation_section' );

function custom_add_translation_section(){
        // Fetch section info
        $section_name      = $_POST['section_name'];
        // get blog id
        $blog_id = get_current_blog_id(); 
        // parse data
        parse_str($section_name, $data);
        

        if(isset($data)){
            if( $blog_id == 1 ){
                $post_title = wp_strip_all_tags( $data['section_name'] );
                    // set current blog id 
                    switch_to_blog($blog_id);
                        // set post data 
                        $translation_post = array(
                            'post_title'    => $post_title,
                            'post_status'   => 'publish',
                            'post_type'     => 'algp_transaltion',
                            'post_author'   => 1,
                        );
                        
                        // Insert the post into the database
                        $post_id  = wp_insert_post( $translation_post );

                    restore_current_blog();

                    $output['message'] = 'New section added successfully!';
                    $output['inserted_id'] = $post_id;
                    $output['status_code'] = 2;

            }else{
                    $output['message'] = 'You have not permission to access this';
                    $output['blog_id'] = $blog_id;
                    $output['status_code'] = 1;

            }
        }else{
                    $output['message'] = 'Sorry section name not getting';
                    $output['status_code'] = 0;
        }

        return wp_send_json( $output );

        die(); 
}


// Delete Section
add_action( 'wp_ajax_delete_section', 'delete_translation_section' ); 
add_action( 'wp_ajax_nopriv_delete_section', 'delete_translation_section'); 


function delete_translation_section(){
    // get post id 
    $post_id = $_POST['delete_id'];
    
    // check 
    if($post_id){
          wp_delete_post( $post_id, true);
          $output['message'] = 'Post Deleted Successfully!!'; 
          $output['status'] = 1; 

    }else{
        $output['message'] = 'No post id found!!';
        $output['status'] = 0;
    }

    return wp_send_json( $output );
    
    die();
}

add_action( 'wp_ajax_add_section_keys', 'add_key_translation' ); 
add_action( 'wp_ajax_nopriv_add_section_keys', 'add_key_translation'); 

function add_key_translation(){

     // Fetch keys info
     $key_info     = $_POST['add_key'];
     parse_str($key_info, $data);
     
    //  var_dump($data);
     if( $data['post_id']){
        $key[0] = $data['key'];
        $post_id['id'] = $data['post_id'];
            //Remove user data 
            unset($data['post_id']);
            unset($data['key']);

            // check all tranlsation value empty 
            if ($data && $data['en']) {
                foreach($data as $dkey => $dval) {
                    if (!$data[$dkey]) {
                        $data[$dkey] = $data['en'];
                    }
                } 
            }
           // check key already exist or not  

           $post_key  = get_post_meta( $post_id['id'], $key[0] );
           
             if(empty( $post_key )){

                update_post_meta( $post_id['id'], $key[0], $data );

                $output['message'] = 'Data Updated Successfully!!';
                $output['status_code'] = 1; 

           }else{
                $output['message'] = 'Existing key already exist!!';
                $output['status_code'] = 2; 
           }

     } else {
        $outut['message'] = 'Unable to add new key.';
        $output['status_code'] = 0; 
     }
     
        return wp_send_json(  $output ); 

     die(); 
}


// Delete meta keys info 
add_action('wp_ajax_delete_kyes', 'delete_meta_kyes');
add_action('wp_ajax_nopriv_delete_kyes', 'delete_meta_kyes');

function delete_meta_kyes(){
    
    $delete_id = $_POST['delete_id'];
    $meta_key = $_POST['meta_key'];
    
    if($delete_id && $meta_key){
        delete_post_meta($delete_id, $meta_key);
        echo 1;
    } else {
        echo 0;
    }
    die(); 
}

// Generate Json files 
add_action( 'wp_ajax_generate_json' , 'generate_translation_json_file' );
add_action( 'wp_ajax_nopriv_generate_json', 'generate_translation_json_file' );

function generate_translation_json_file(){

    $args = array(
        'numberposts' => -1,
        'post_type'   => 'algp_transaltion'
      );
       
    $transSections = get_posts( $args );
    if ($transSections) { 

        foreach($transSections as $transVal) {
            $post_id = $transVal->ID;
            $post_name = sanitize_title($transVal->post_name);
            if($post_id){
                $get_keys = get_post_meta($post_id);

                foreach($get_keys as $gkey => $gval) {
                    $arrayVal = unserialize($gval['0']);
                    $output[$post_name][$gkey] = $arrayVal;
                }
            }
        }
        if($output){
            print_r(json_encode($output));
            $file_path = get_stylesheet_directory().'/langauges/languages.json';
            if(file_exists($file_path) && is_array($output)){
                $f = fopen($file_path, "w");
                fwrite($f, json_encode($output));
                fclose($f);
            }
        }
        
        // File Generate
        $output['status_code'] = 1;
        echo $output['message'] = 'Language.json file has been updated.';
    } else {
        echo $output['message'] = 'Translations not found.';
        $output['status_code'] = 0;
    }
    
    die();
}


// Update meta key value 

add_action( 'wp_ajax_update_meta_key_value', 'update_meta_key_value' );
add_action( 'wp_ajax_nopriv_update_meta_key_value', 'update_meta_key_value'); 

function update_meta_key_value(){
    $meta_key = $_POST['meta_keys'];
    
    if( $meta_key ){
        $key['post_id'] = $meta_key['post_id'];
        $key['key'] = $meta_key['key'];
        // unset uncessary value 
        unset($meta_key['post_id']); 
        unset($meta_key['key']); 

            update_post_meta( $key['post_id'], $key['key'], $meta_key ); 

    }
    die(); 

}


