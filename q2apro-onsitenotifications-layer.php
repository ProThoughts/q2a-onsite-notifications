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

	class qa_html_theme_layer extends qa_html_theme_base {
		
		var $plugin_url_onsitenotifications;

		// needed to get the plugin url
		function qa_html_theme_layer($template, $content, $rooturl, $request)
		{
			if(qa_opt('q2apro_onsitenotifications_enabled')) {
				global $qa_layers;
				$this->plugin_url_onsitenotifications = $qa_layers['q2apro On-Site-Notifications Layer']['urltoroot'];
			}
			qa_html_theme_base::qa_html_theme_base($template, $content, $rooturl, $request);
		}
		
		function head_script(){
			qa_html_theme_base::head_script();
			if(qa_opt('q2apro_onsitenotifications_enabled')) {
				
				$url = qa_opt('site_url');
				//$url = preg_replace("/^http:/i", "https:", $url);
				if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
    // SSL connection
					$url = preg_replace("/^http:/i", "https:", $url);
				}
				$this->output('<script type="text/javascript">
						var eventnotifyAjaxURL = \''.$url.'eventnotify\';
					</script>');  
				$this->output('<script type="text/javascript" src="'. $url . $this->plugin_url_onsitenotifications .'script.min.js"></script>');
//				$url = tohttps(qa_opt('site_url'));
			//	$this->output('<link rel="stylesheet" type="text/css" href="'. $url . $this->plugin_url_onsitenotifications .'styles.css">');
			}
		}
		function doctype() {
			/* The following code originates from q2a plugin "History" by NoahY and has been modified by q2apro.com
			 * It is licensed under GPLv3 http://www.gnu.org/licenses/gpl.html
			 * Link to plugin: https://github.com/NoahY/q2a-history
			 */
			if(qa_opt('q2apro_onsitenotifications_enabled') && qa_get_logged_in_userid()) {

				qa_db_query_sub(
					'CREATE TABLE IF NOT EXISTS ^usermeta (
					meta_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
					user_id bigint(20) unsigned NOT NULL,
					meta_key varchar(255) DEFAULT NULL,
					meta_value longtext,
					PRIMARY KEY (meta_id),
					UNIQUE (user_id,meta_key)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8'
				);		

				$last_visit = qa_db_read_one_value(
					qa_db_query_sub(
						'SELECT UNIX_TIMESTAMP(meta_value) FROM ^usermeta WHERE user_id=# AND meta_key=$',
						qa_get_logged_in_userid(), 'visited_profile'
					),
					true
				);

				// first time visitor, we set the last visit manually in the past
				if(is_null($last_visit)) {
					$last_visit = '1981-03-31 06:25:00';
				}
				// select and count all in_eventcount that are newer as last visit
				$eventcount = qa_db_read_one_value(
					qa_db_query_sub(
						'SELECT COUNT(event) FROM ^eventlog 
								WHERE userid=# AND DATE_SUB(CURDATE(),INTERVAL # DAY) <= datetime 
								AND FROM_UNIXTIME(#) <= datetime 
								AND (event LIKE "in_%"
								OR event LIKE "new_%")',
								qa_get_logged_in_userid(), 
								qa_opt('q2apro_onsitenotifications_maxage'), 
								$last_visit
					)
				);
				// q2apro notification tooltip
				$tooltip = qa_lang('q2apro_onsitenotifications_lang/show_notifications');
					$tooltip='';
				if($eventcount) {
					$tooltip = $eventcount.' '.qa_lang('q2apro_onsitenotifications_lang/x_notifications');
					// only one event
					if($eventcount==1) {
						$tooltip = qa_lang('q2apro_onsitenotifications_lang/one_notification');
					}
					$tooltip='';
					// add notify bubble to user navigation highlighted
					$this->content['loggedin']['suffix'] = @$this->content['loggedin']['suffix'].' <a class="qa-history-new-event-link" title="'.$tooltip.'"><span class="notifybub ntfy-event-new">'.$eventcount.'</span></a>';
				}
				else {
					// add notify bubble to user navigation
					$this->content['loggedin']['suffix'] = @$this->content['loggedin']['suffix'].' <a class="qa-history-new-event-link" title="'.$tooltip.'"><span class="notifybub ntfy-event-nill">'.qa_opt('q2apro_onsitenotifications_nill').'</span></a>';
				}
			}
			
			qa_html_theme_base::doctype();
		}

	} // end qa_html_theme_layer
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
