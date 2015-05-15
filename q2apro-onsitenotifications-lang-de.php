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

	return array(
		// default
		'enable_plugin' => 'On-Site-Notifications Plugin aktivieren', // Enable Plugin (checkbox)
		'minimum_level' => 'Auf Seite zugreifen und Posts bearbeiten können:', // Level to access this page and edit posts:
		'plugin_disabled' => 'Dieses Plugin wurde deaktiviert.', // Plugin has been disabled.
		'access_forbidden' => 'Zugriff nicht erlaubt.', // Access forbidden.
		'plugin_page_url' => 'Seite im Forum öffnen:', // Open page in forum:
		'contact' => 'Bei Fragen bitte ^1q2apro.com^2 besuchen.', // For questions please visit ^1q2apro.com^2
		'admin_maxeventsshow' => 'Maximal anzuzeigende Events im Benachrichtigungsfenster:', // extra
		
		// plugin
		'my_notifications' => 'Meine Benachrichtigungen',
		'show_notifications' => 'Benachrichtigungen anzeigen',
		'one_notification' => '1 neue Benachrichtigung',
		'x_notifications' => 'neue Benachrichtigungen',
		'close' => 'schließen',
		'in_answer' => 'Antwort bei',
		'in_comment' => 'Kommentar zu',
		'in_bestanswer' => 'Beste Antwort bei',
		'in_upvote' => 'Pluspunkt für',
		'in_downvote' => 'Minuspunkt für',
		'no_notifications_label' => 'Wenn es keine Benachrichtigungen gibt, soll dieses Zeichen angezeigt werden:', // Label for notify bubble on top, next to user name
	);


/*
	Omit PHP closing tag to help avoid accidental output
*/