<?php

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

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	// language file
	qa_register_plugin_phrases('q2apro-onsitenotifications-lang-*.php', 'q2apro_onsitenotifications_lang');

	// page for ajax
	qa_register_plugin_module('page', 'q2apro-onsitenotifications-page.php', 'q2apro_onsitenotifications_page', 'On-Site-Notifications Page');

	// layer
	qa_register_plugin_layer('q2apro-onsitenotifications-layer.php', 'q2apro On-Site-Notifications Layer');

	// admin
	qa_register_plugin_module('module', 'q2apro-onsitenotifications-admin.php', 'q2apro_onsitenotifications_admin', 'q2apro On-Site-Notifications Admin');
   
	// track events
	qa_register_plugin_module('event', 'q2apro-history-check.php','q2apro_history_check','Q2APRO History Check Mod');


/*
	Omit PHP closing tag to help avoid accidental output
*/