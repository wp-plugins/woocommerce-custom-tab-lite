<?php

/**
 * this is use for change the settings for Tab Manager is disable or enable 
*/

   function pctm_change_settings(){
   
   add_option( 'enable_tab', 'checked' );
   if(isset($_REQUEST['save_set'])){
    $value=sanitize_text_field($_REQUEST['enable_tab']);
    if(!empty($value)){
    update_option( 'enable_tab', 'checked' );
            echo "<div class='updated'><p>Your Plugin is Successfully Enabled</p></div>";
    }
    else{
       update_option( 'enable_tab', $value );
       echo "<div class='error'><p>Your Plugin is Successfully Disabled</p></div>";
     }
   } 
  

       ?>
       <div class="wrap">
        <h2 id="add-new-user"> Settings For Tab <br /></h2>
           <p>Enable Tab for All Products</p>
        <form  method="post">
              <p><input type="checkbox" name="enable_tab" id="enable_tab" <?php echo get_option('enable_tab');?> />Enable Custom Tab plugin </p>
              <p class="submit"><a href="<?php echo get_admin_url()."admin.php"; ?>" class="button button-primary">Back</a> <input type="submit" value="Save Settings" class="button button-primary" id="save_set" name="save_set"></p>
        </form>
     </div>
    
<?php  }
  ?>