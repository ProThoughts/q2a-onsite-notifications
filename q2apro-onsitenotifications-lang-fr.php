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
		'enable_plugin' => 'Activer le plugin On-Site-Notifications', // Enable Plugin (checkbox)
		'minimum_level' => 'Niveau pour accéder à cette page et à la fonction de modification des posts :', // Level to access this page and edit posts:
		'plugin_disabled' => 'Le plugin a été désactivé.', // Plugin has been disabled.
		'access_forbidden' => 'Accès interdit.', // Access forbidden.
		'plugin_page_url' => 'Ouvrir la page plugin dans le forum:', // Open page in forum:
		'contact' => 'Si vous avez des questions, visitez  ^1q2apro.com^2.', // For questions please visit ^1q2apro.com^2
		'admin_maxeventsshow' => 'Nombre maximal d\'événements à afficher dans la boîte de notification:', // extra
		
		// plugin
		'my_notifications' => 'Mes notifications',
		'show_notifications' => 'Afficher les notifications',
		'one_notification' => '1 nouvelle notification',
		'x_notifications' => 'nouvelles notifications',
		'close' => 'fermer',
		'in_answer' => 'Répondre à',
		'in_comment' => 'Commentaire à',
		'in_bestanswer' => 'Meilleure réponse à',
		'in_upvote' => 'Upvote pour',
		'in_downvote' => 'Downvote pour',
		'no_notifications_label' => 'S\'il n\'y a pas de notifications, ce sera affiché sur la bulle notifier:', // Label for notify bubble on top, next to user name
	);


/*
	Omit PHP closing tag to help avoid accidental output
*/