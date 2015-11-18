
jQuery(document).ready(function($){
	
	jQuery('.id-select-all-1').on('click',function(){
		
        if(this.checked) { // check select status
            $('.id-select-all-1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
				
            });
			$('[type=checkbox]').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
				
				});
        }else{
            $('.id-select-all-1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"   
				
            }); 
			$('[type=checkbox]').each(function() { //loop through each checkbox
                this.checked = false;  //select all checkboxes with class "checkbox1"               
				
				});
        }
   
	});
		
});

            
        