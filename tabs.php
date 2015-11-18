<?php

/**
 * In this File i have retrive the data and create the Custom tab.
 */

    //retrive all tab data
    function pctm_ret_tab_data(){
            global $wpdb;
            $table_name = $wpdb->prefix . 'options';
            $var = "%tab%";
            $query = $wpdb->prepare("select * FROM $table_name WHERE autoload LIKE %s", $var);
            $res = $wpdb->get_results($query,ARRAY_A);
            return $res;
    }    
    function pctm_my_tab( $tabs ) {
       $a=pctm_ret_tab_data();
    
       for($i=0;$i<count($a);$i++){
            $id=$a[$i]['option_id'];
            $prior=$a[$i]['autoload'];
            $prior=substr($prior,3);
            
            $ar['id'.$id]=array( 'title' => $a[$i]['option_name'], 'priority' =>$prior, 'callback' => 'pctm_my_tab_func');
        }
        $my_tab= $ar;
      
        return array_merge( $my_tab, $tabs );
               
     }

 function pctm_my_tab_func($id) {
		$tab_id= substr($id,2);
		global $wpdb;
		$table_name = $wpdb->prefix . 'options';
		$var = "%tab%";
		$query = $wpdb->prepare("select * FROM $table_name WHERE option_id=".$tab_id." and autoload LIKE %s", $var);
		$res = $wpdb->get_results($query,ARRAY_A);
		echo "<h2>".ucfirst($res[0]['option_name'])."</h2><br>";
		//echo $res[0]['option_value'];
		$content = apply_filters( 'the_content', $res[0]['option_value'] );
		$content = str_replace( ']]>', ']]&gt;', $content );
		echo apply_filters( 'pztm_woocommerce_custom_product_tabs_lite_content', $content);
	  
  }
 
//enable or disable 
$enab=get_option('enable_tab'); 
if(!empty($enab)){
 add_filter( 'woocommerce_product_tabs', 'pctm_my_tab' );
}

?>