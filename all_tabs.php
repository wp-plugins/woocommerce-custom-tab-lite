<?php 
  //list all tabs 
  
  function pctm_list_all(){
  global $table_prefix, $wpdb;

        $pctm_wp_list_table = new Pctm_Tab_Table();
        $pctm_wp_list_table->prepare_items();
        
        if(!$_GET['action'] || !$_GET['id']){  
       ?> 
         <div class="wrap" >
      
           <h2>All Custom Tabs  <a href="<?php echo get_admin_url().'admin.php?page=pctm-add-tab'?>" class="button button-primary">Add New Tab</a></h2><br />
                <form action="" method="post">
                    <?php $pctm_wp_list_table->display(); ?>
               </form>
        </div>
      
        <?php
       
             if($_REQUEST['action']=='delete'){
                $ar=$_REQUEST['id'];
                foreach($ar as $id){
                $table_name= $table_prefix."options";
                $del=$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE option_id =%d",$id));
                }
                if($del==1){
                wp_redirect("admin.php?page=pctm-tab-manager");
                }
            }
            else  if($_REQUEST['action2']=='delete'){
                
                $ar=$_REQUEST['id'];
                foreach($ar as $id){
                $table_name= $table_prefix."options";
                $del=$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE option_id =%d",$id));
                }
                if($del==1){
                wp_redirect("admin.php?page=pctm-tab-manager");
                }
            }
         
        }
       
            else if($_REQUEST['action']=='delete' && $_REQUEST['id']!=''){
                $id=sanitize_text_field($_REQUEST['id']);
                $table_name= $table_prefix."options";
                $del=$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE option_id =%d",$id));
                if($del==1){
                wp_redirect("admin.php?page=pctm-tab-manager");
            }
        }
       ?>
     <?php
   }
   ?>
