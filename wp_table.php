<?php
global $table_prefix, $wpdb;

if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Pctm_Tab_Table extends WP_List_Table {
	//echo "wefwe";
    function __construct(){

        global $status, $page;
        //Set parent defaults

        parent::__construct( array(

            'singular'  => 'tab',     //singular name of the listed records
            'plural'    => 'tabs',    //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
        ) );

    }

    function column_default($item, $column_name){
	    }

    function column_title($item){
        //Build row actions

        $actions = array(
            'edit'      => sprintf('<a href="?page=%s&action=%s&p=%s">Edit</a>',$_REQUEST['page'],'edit',$item['id']),
            'delete'    => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id']),
        );

        //Return the title contents
        return sprintf('%1$s <span style="color:silver">(id:%2$s)</span>%3$s',

            /*$1%s*/ $item['option_name'],

            /*$2%s*/ $item['option_id'],

            /*$3%s*/ $this->row_actions($actions)
        );
    }
    function column_cb($item){
        return sprintf(
             '<input type="checkbox" name="%1$s[]" value="%2$s" />',

            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['ID']                //The value of the checkbox should be the record's id
        );

    }

    function get_columns(){
        $columns = array(
            'id'          => '<label for="id-select-all-1" class="screen-reader-text">Select All</label><input class="id-select-all-1" name="select-all-1" type="checkbox" />', //Render a checkbox instead of text
            'name'        => 'Name',
            'description' => 'Description'
       );
        return $columns;
    }
    
    function get_sortable_columns() {
        $sortable_columns = array(

            'name'     => array('option_name',false),  //true means it's already sorted
            'description'     => array('option_value',false)
         );
        return $sortable_columns;
    }

        function get_bulk_actions() {
            $actions = array(
                'delete'    => 'Delete',
             );
          return $actions;
      }
   
     function prepare_items() {
	   global $wpdb, $table_prefix, $_wp_column_headers;
       $table_name=$table_prefix."options";
	  
        $var = "%tab%";
        $query = $wpdb->prepare("select * FROM $table_name WHERE autoload LIKE %s", $var);
        
        /* -- Ordering parameters -- */
       //Parameters that are going to be used to order the result

       $orderby = !empty($_GET["orderby"]) ? mysql_real_escape_string($_GET["orderby"]) : 'ASC';
       $order = !empty($_GET["order"]) ? mysql_real_escape_string($_GET["order"]) : '';


       if(!empty($orderby) & !empty($order)){ $query.=' ORDER BY '.$orderby.' '.$order; }

		/* -- Pagination parameters -- */
        //Number of elements in your table?
        $totalitems = $wpdb->query($query); //return the total number of affected rows
        //How many to display per page?
        $perpage = 5;
        //Which page is this?
        $paged = !empty($_GET["paged"]) ? mysql_real_escape_string($_GET["paged"]) : '';
        //Page Number
        if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ $paged=1; }
        //How many pages do we have in total?
        $totalpages = ceil($totalitems/$perpage);
        //adjust the query to take pagination into account

       if(!empty($paged) && !empty($perpage)){
          $offset=($paged-1)*$perpage;
         $query.=' LIMIT '.(int)$offset.','.(int)$perpage;
       }

		/* -- Register the pagination -- */
      $this->set_pagination_args( array(
         "total_items" => $totalitems,
         "total_pages" => $totalpages,
         "per_page" => $perpage,
     ) );

      //The pagination links are automatically built according to those parameters
		/* -- Register the Columns -- */

      $columns = $this->get_columns();
      $hidden = array();
      
      $sortable = $this->get_sortable_columns();
	  $this->_column_headers = array($columns, $hidden, $sortable);

	/* -- Fetch the items -- */
       
      $this->items = $wpdb->get_results($query);

    }

		function display_rows() 
		{
			//Get the records registered in the prepare_items method
			$records = $this->items;

			//Get the columns registered in the get_columns and get_sortable_columns methods
			list( $columns, $hidden ) = $this->get_column_info();
			//Loop for each record
			if(!empty($records)){foreach($records as $rec){
					//Open the line
			echo '<tr class="alternate" id="record_'.$rec->id.'">';
					foreach ( $columns as $column_name => $column_display_name ) {
							//Style attributes for each col
							$class = "class='$column_name column-$column_name'";
							$style = "";

							if ( in_array( $column_name, $hidden ) ) $style = ' style="display:none;"';

							$attributes = $class . $style;
							//edit link

						  	//Display the cell
                            $content=$rec->option_value;
                            //$description=preg_replace("/<img[^>]+\>/i",'', $content);
                            $description= strip_tags($content,'<p>');
                            if(strlen($description)>150){
                                $description=substr($description,0,150)."...";
                            }
                                                        
                            switch ( $column_name ) {
                             		case "id": echo '<th '.$attributes.'><input name="id[]" type="checkbox" value="'.stripslashes($rec->option_id).'" /></th>';break;
                                	case "name": echo '<td '.$attributes.'>'.stripslashes($rec->option_name).'<div class="row-actions"><span class="edit"><a href="?page=pctm-add-tab&amp;action=edit&amp;eid='.stripslashes($rec->option_id).'">Edit</a> | </span><span class="delete"><a href="?page=pctm-tab-manager&amp;action=delete&amp;id='.stripslashes($rec->option_id).'">Delete</a></span></div></td>'; break;
                                    case "description": echo '<td '.$attributes.'>'.stripslashes($description).'</td>'; break;
                            }
                  }

					//Close the line
					echo'</tr>';
			}
          }
		}
        
}
wp_enqueue_script("accept-js", plugin_dir_url( __FILE__ )."js/accept.js",array('jquery'),'',true);
?>