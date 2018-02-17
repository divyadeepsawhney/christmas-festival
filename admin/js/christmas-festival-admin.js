jQuery(document).ready(function($) {           //wrapper
    $("#christmas-festival-snow").change(function() { 
		alert('Checkbox working');
		$.post(my_ajax_obj.ajax_url, {         //POST request
			_ajax_nonce: my_ajax_obj.nonce,     //nonce
			 action: "christmas_festival_save_settings",            //action
			 title: this.value                  //data
		 }, function(data) {                    //callback
			 alert('Settings Saved');
		 });
	});
});