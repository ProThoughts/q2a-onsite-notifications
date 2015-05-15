/*
	Plugin Name: On-Site-Notifications
	Plugin URI: http://www.q2apro.com/plugins/on-site-notifications
	Plugin Description: Facebook-like / Stackoverflow-like notifications on your question2answer forum that can replace all email-notifications.
	Plugin Version: 1.0
	Plugin Date: 2014-03-29
	Plugin Author: q2apro.com
	Plugin Author URI: http://www.q2apro.com
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: http://www.q2apro.com/pluginupdate?id=61
	
	Licence: Copyright © q2apro.com - All rights reserved

*/

$(document).ready(function(){

	$(document).on("click", "#nfyReadClose", function() {
		$("#nfyWrap").fadeOut(500, function(){$(this).remove() });
	});
	$(".notifybub").click(function() {
		// user clicked on N bubble again to hide event-box
		if( $("#nfyWrap").length>0 && $("#nfyWrap").is(":visible") ) {
			$("#nfyWrap").fadeOut(500, function(){$(this).remove() });
		}
		else {
		var evrequest = "receiveNotify";
			$.ajax({
				 type: "POST",
				 url: eventnotifyAjaxURL, // root
				 data: {ajax:evrequest},
				 cache: false,
				 success: function(data) {
					// remove Event-Box if formerly loaded
					$("#nfyWrap").fadeOut(500, function(){$(this).remove() });
					// insert ajax-loaded html 
					// $(".qa-nav-user").append(data);
					$(".qa-history-new-event-link").append(data);
					// make yellow notification bubble gray
					$(".ntfy-event-new").addClass('ntfy-read');
				 }
			});
		}
	});
	
	$(document).click(function(event) { 
		if($(event.target).parents().index($('#nfyWrap')) == -1) {
			if($('#nfyWrap').is(":visible")) {
				$("#nfyWrap").fadeOut(500, function(){$(this).remove() });
			}
		}        
	})

});