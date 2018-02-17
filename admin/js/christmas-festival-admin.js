jQuery(document).ready(function($) {           //wrapper
    $("#christmas-festival-snow").change(function() { 

		var snow;
		if($(this).prop("checked") == true){
			snow = "ON";
		}
		else if($(this).prop("checked") == false){
			snow = "OFF";
		}
		$.post(my_ajax_obj.ajax_url, {         //POST request
			_ajax_nonce: my_ajax_obj.nonce,     //nonce
			 action: "christmas_festival_save_settings",            //action
			 snow_status: snow                 //data
		 }, function(data) {                    //callback
			 alert('Settings Saved');
		 });
	});
});