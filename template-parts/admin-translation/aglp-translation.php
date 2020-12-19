<?php 
    $section_id = base64_decode($_GET['section_id']);
    if(!$section_id){
    ?>
        <div class="translat-header">
            <div class="right-section">
                <!-- <button class="btn-trans" id="searchBtn">Search</button> -->
                <button class="btn-trans" id="addSection">Add Section</button>
                <button class="btn-trans" id="gerrateBtn">Generate Language file</button>
            </div>
        </div>
        <?php      
            $args = array(
                'post_type'=>'algp_transaltion',
                'posts_per_page'=> -1
            );

            $the_query = new WP_Query($args); 
            if($the_query->have_posts()):
        ?>
    <div class="tableResponsive">
    <table class="translateTable common-table sections-table">
                <thead>
                    <tr>
                        <th class="first-cloumn">Section</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <!-- Get all translation section start -->
                        <?php 
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <tr>
                                <td><a href="<?php echo admin_url().'network/admin.php?page=algp_transaltion&&section_id='.base64_encode(get_the_ID()); ?>" class="section-name" section-id="<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></td>
                                <td>
                                    <a href="javascript:void(0);" delete-id="<?php echo get_the_ID(); ?>" class="delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>   
                            </tr> 
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <!-- Get all translation section End -->
                </tbody>
        </table>
    </div>
        <?php endif; 
    }else{     
    ?>
     <!-- second table -->
            <div class="translat-header">
            <div class="left-section">
                <!-- Creating custom breadcrum -->
                <a href="<?php echo admin_url().'network/admin.php?page=algp_transaltion';?>" rel="nofollow">Back</a>
                &nbsp;&nbsp;&#187;&nbsp;&nbsp;
                <span><?php echo get_the_title($section_id);?></span>
            </div>
            <div class="right-section">
                <!-- <button class="btn-trans" id="searchBtn">Search</button> -->
                <button class="btn-trans" id="addkey">Add Key</button>
                <button class="btn-trans" onclick="generateJson(<?php echo $section_id; ?>)">Generate Language file</button>
            </div>
            </div>
            <?php 
                // Fetch all meta kyes 
                $get_keys = get_post_meta($section_id);

                // Remove uncessar ids 
                unset($get_keys['_edit_lock']);
               
            ?>  
            <div class="tableResponsive">
            <table class="translateTable">
                <thead>
                    <tr>
                        <th class="first-cloumn">Key</th>
                        <th>English</th>
                        <th>हिंदी</th>
                        <th>日本人</th>
                        <th>한국어</th>
                        <th>中文（简单）</th>
                        <th>中文(傳統)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($get_keys){ ?>
                            <?php foreach( $get_keys AS $get_key => $get_value) { ?>
                                <tr id="meta-id-<?php echo $get_key; ?>">
                                    <td>
                                    <?php echo $get_key; ?>
                                    <input type="hidden" name="key" class="meta-key" value="<?php echo $get_key; ?>"/>
                                    <input type="hidden" name="post_id" class="post-id" value="<?php echo $section_id; ?>"/>
                                    </td>
                                    <?php 
                                        //get key data
                                        foreach($get_value AS $data){

                                            $array = unserialize($data);
                                           
                                        if( is_array($array))
                                            foreach($array AS  $key => $value){
                                                ?>
                                                <td>
                                                    <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" >
                                                </td>

                                                <?php 
                                            }
                                        }
                                    ?>
                                    <td>
                                        <div class="tactions">
                                        <button class="update-btn" >Update</button>
                                        <a class="delete-keys-btn" delete-id="<?php echo $section_id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </td>    
                                </tr>   
                            <?php } ?>  
                    <?php }else{  ?>
                        <tr>
                            <td class='text-center' colspan="8">No content yet</td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
                    </div>
            <!-- End second table -->
                <?php } ?>

<!-- The Modal -->
<div id="addkeyModel" class="modal">
    <div class="modal-content">
        <form action="#" method="post" id="add-key" enctype="multipart/form-data" autocomplete=off>
            <input type="hidden" name="post_id" id="post-id" value="<?php echo $section_id; ?>" />
            <div class="modal-header">
                Add Translation Key
                <span class="modal-close close">&times;</span>
                
            </div>
            <div class="modal-body">
                <div class="form-group full">
                    <label for="translation-key" id="key">Key(Use camelCase)</label>
                    <input type="text" required="required" name="key" id="translation-key" placeholder="Add key for translation." value=""/>
                </div>
                <div class="form-group">
                    <label for="">English</label>
                    <input type="text" name="en" placeholder="Add English Translation." value=""/>
                </div>

                <div class="form-group">
                    <label for="">Hindi(हिंदी)</label>
                    <input type="text" name="hi" placeholder="Add Hindi Translation." value=""/>
                </div>

                <div class="form-group">
                    <label for="">Japanese(日本人)</label>
                    <input type="text" name="ja" placeholder="Add Japanese Translation." value=""/>
                </div>
                <div class="form-group">
                    <label for="">Korean(한국어)</label>
                    <input type="text" name="ko" placeholder="Add Korean Translation" value=""/>
                </div>
                <div class="form-group">
                    <label for="">Chinese(中文（简单）)</label>
                    <input type="text" name="zh" placeholder="Add Chinese Standard Translation" value=""/>
                </div>
                <div class="form-group">
                    <label for="">Chinese Traditional(中文(傳統))</label>
                    <input type="text" name="zh_tw" placeholder="Add Chinese Traditional Translation" value=""/>
                </div>
            </div>
            <div class="modal-footer">
            <input type="submit" value="Save Changes" id="add-key-button" class="button-primary button btn" />
            </div>
        </form>
    </div>
</div>

<!-- The Modal -->
<div id="add-section-model" class="modal">
<div class="modal-content">
        <form action="#" method="post" id="add-section" enctype="multipart/form-data" autocomplete=off>
            <div class="modal-header">
                Create Section 
                <span class="modal-close close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group full">
                    <!-- <label for="">Section Name</label> -->
                    <input type="text" required="required" name="section_name" placeholder="Add Section name." value=""/>
                </div>
               
            </div>
            <div class="modal-footer">
            <input type="submit" value="Save Changes" id="add-section-button" class="button-primary button btn" />
            </div>
        </form>
    </div>   
</div>
