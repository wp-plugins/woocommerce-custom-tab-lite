<?php
/**
*This page is used for create Tab from database
*/
ob_start();

    //add tab function
    
 function pctm_add_tab(){
      
     
      global $wpdb;
      $table_name = $wpdb->prefix . 'options';
      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      //create tab
      
     if(isset($_REQUEST['eid']))
        {
         $edit_id=sanitize_text_field($_REQUEST['eid']);
         
         $query = $wpdb->prepare("select * FROM $table_name WHERE option_id=".$edit_id);
         $res = $wpdb->get_results($query,ARRAY_A);
         $content=$res[0]['option_value'];
         $prior=$res[0]['autoload'];
         $prior=substr($prior,3);
         $prior=$prior-31;
         
         
         ?>
        <div class="wrap">
        <h2 id="add-new-user"> Edit Custom Tag <br /></h2>
           <br /><br />
        <form  id="edittab" name="edittab" method="post"  >
              <table>
            	<tbody>
                    <tr class="form-field form-required">
                		<th scope="row"><label for="tab_name">Custom Tab Label <span class="description">(required)</span></label></th>
                		<td><input type="text" aria-required="true" value="<?php echo $res[0]['option_name'];?>" id="tab_name" required name="tab_name"></td>
                	</tr>
                     <br />
                	<tr class="form-field form-required">
                		<th scope="row"><label for="description">Custom Tab Content  <span class="description">(required)</span></label></th>
                        
                         <td ><?php wp_editor($content, 'listingeditor' ,$settings = array('textarea_name' => tab_description,'textarea_rows'=>5,'editor_css' => '<style>  .form-field textarea{ border-width: 0 } </style>') ); ?></td>
                	<input type="hidden" name="hide_id" value="<?php echo $res[0]['option_id'];?>"/>
                	</tr>
                    <tr class="form-field form-required">
                		<th scope="row"><label for="description">Priority of Tab  <span class="description">(required)</span></label></th>
                        <td ><input type="number" aria-required="true" style='width: 10%;' min="0" value="<?php echo isset($prior)?$prior:0;?>" id="tab_prior" required name="tab_prior" size="10"/>   <br />    The plugin tabs are displayed after  the WooCommerce Tabs</td>
                  </tr>
                </tbody>
            </table>
                 <p class="submit"><a href="<?php echo get_admin_url()."admin.php?page=pctm-tab-manager"; ?>" class="button button-primary">Back</a> <input type="submit" value="Save" class="button button-primary" id="edittab" name="edittab"> </p>
        </form>
     </div>
    
         
         <?php
       }else{
    ?>

    <div class="wrap">
        <h2 id="add-new-user"> Add Custom Tag <br /></h2>
           <p> Create New Custom Tag For All Product's</p>
        <form  id="addtab" name="addtab" method="post"  >
              <table>
            	<tbody>
                    <tr class="form-field form-required">
                		<th scope="row"><label for="tab_name">Custom Tab Label <span class="description">(required)</span></label></th>
                		<td><input type="text" aria-required="true" value="<?php echo $res[0]['option_name'];?>" id="tab_name" required name="tab_name"></td>
                	</tr>
                     <br />
                	<tr class="form-field form-required">
                		<th scope="row"><label for="description">Custom Tab Content  <span class="description">(required)</span></label></th>
                        
                         <td ><?php wp_editor($content, 'listingeditor' ,$settings = array('textarea_name' => tab_description,'textarea_rows'=>5,'editor_css' => '<style>  .form-field textarea{ border-width: 0 } </style>') ); ?></td>
                	
                	</tr>
                    <tr class="form-field form-required">
                		<th scope="row"><label for="description">Priority of Tab  <span class="description">(required)</span></label></th>
                        <td ><input type="number" aria-required="true" style='width: 10%;' min="0"  value="<?php echo isset($prior)?$prior:0;?>" id="tab_prior" required name="tab_prior" size="10"/>   <br />    The plugin tabs are displayed after  the WooCommerce Tabs</td>
                  </tr>
                </tbody>
            </table>
                 <p class="submit"><a href="<?php echo get_admin_url()."admin.php?page=pctm-tab-manager"; ?>" class="button button-primary">Back</a> <input type="submit" value="Save" class="button button-primary" id="createtab" name="createtab"> </p>
        </form>
     </div>

    <?php
    }
     
     if(isset($_REQUEST['createtab'])){
            
        $name=sanitize_text_field($_REQUEST['tab_name']);
        $query = $wpdb->prepare("select * FROM $table_name WHERE option_name=%s",$name);
         $result = $wpdb->get_results($query,ARRAY_A);
         $tdesc=stripcslashes($_REQUEST['tab_description']);
        $priority=sanitize_text_field($_REQUEST['tab_prior']+31);
        if(!empty($result)){  
            echo "<div class='error'><p>Tab already exist</p></div>";
        }else{
           $wpdb->query( $wpdb->prepare( "INSERT INTO $table_name( option_name, option_value,autoload)VALUES ( %s, %s,%s )",$name,$tdesc,'tab'.$priority ));
           wp_redirect("admin.php?page=pctm-tab-manager");  
        }    
         //edit tabs
   }else if(isset($_REQUEST['edittab'])){
         
        $tab_name=sanitize_text_field($_REQUEST['tab_name']);
        $tdesc=stripcslashes($_REQUEST['tab_description']);
        $prior=sanitize_text_field($_REQUEST['tab_prior']+31);
        $eid=sanitize_text_field($_REQUEST['hide_id']);
        $wpdb->query($wpdb->prepare(" UPDATE {$table_name} SET  option_name = %s, option_value = %s, autoload = %s
                                             WHERE option_id = $eid;",
                                             $tab_name, $tdesc,'tab'.$prior));
        wp_redirect("admin.php?page=pctm-tab-manager");
   }
      
   }
  

 ?>