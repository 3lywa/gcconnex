<?php

	/**
	 * Elgg library
	 * Contains important functionality core to Elgg
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	/**
	 * Getting directories and moving the browser
	 */

	/**
	 * Adds messages to the session so they'll be carried over, and forwards the browser.
	 * Returns false if headers have already been sent and the browser cannot be moved.
	 *
	 * @param string $location URL to forward to browser to
	 * @return nothing|false
	 */

		function forward($location) {
			
			if (!headers_sent()) {
				 $_SESSION['messages'] = system_messages();
				 header("Location: {$location}");
				 exit;
			}
			return false;
			
		}
		
	/**
	 * Templating
	 */
		
	/**
	 * Handles templating views
	 *
	 * @param string $view The name and location of the view to use
	 * @param array $vars Any variables that the view requires, passed as an array
	 * @param string $viewtype Optionally, the type of view that we're using (most commonly 'default')
	 * @param boolean $debug If set to true, the viewer will complain if it can't find a view
	 * @return string The HTML content
	 */
		function elgg_view($view, $vars = "", $viewtype = "", $debug = false) {
		
		    global $CONFIG, $strings;
		    
		    static $usercache;
		    if (!is_array($usercache)) {
		        $usercache = array();
		    }
		
		    if (empty($vars)) {
		        $vars = array();
		    }
		
		    // Load session and configuration variables
		    if (is_array($_SESSION)) {
		        $vars = array_merge($vars, $_SESSION);
		    }
			if (!empty($CONFIG))
		    	$vars = array_merge($vars, get_object_vars($CONFIG));
		    if (is_callable('page_owner')) {
		        $vars['page_owner'] = page_owner();
		    } else {
		    	$vars['page_owner'] = -1;
		    }
		    if ($vars['page_owner'] != -1) {
		        if (!isset($usercache[$vars['page_owner']])) {
		    	       $vars['page_owner_user'] = get_user($vars['page_owner']);
		    	       $usercache[$vars['page_owner']] = $vars['page_owner_user'];
		        } else {
		            $vars['page_owner_user'] = $usercache[$vars['page_owner']];
		        }
		    }
		     
		    if (empty($_SESSION['view'])) {
		        $_SESSION['view'] = "default";
		    }
		    if (empty($viewtype) && is_callable('get_input'))
		        $viewtype = get_input('view');
		    if (empty($viewtype)) {
		        $viewtype = $_SESSION['view'];
		    }
		
		    ob_start();
		    if (!@include($CONFIG->viewpath . "views/{$viewtype}/{$view}.php")) {
		        $success = false;
		        if ($viewtype != "default") {
		            if (@include($CONFIG->viewpath . "views/default/{$view}.php")) {
		                $success = true;
		            }
		        }
		        if (!$success && $debug == true) {
		            echo " [This view ({$view}) does not exist] ";
		        }
		    }
		    $content = ob_get_clean();
		
		    return $content;
		
		}

	/**
	 * Library loading and handling
	 */

	/**
	 * Recursive function designed to load library files on start
	 * (NB: this does not include plugins.)
	 *
	 * @param string $directory Full path to the directory to start with
	 * @param string $file_exceptions A list of filenames (with no paths) you don't ever want to include
	 * @param string $file_list A list of files that you know already you want to include
	 * @return array Array of full filenames
	 */
		function get_library_files($directory, $file_exceptions = array(), $file_list = array()) {
			
			if (is_file($directory)) {
				$file_list[] = $directory;
			} else if ($handle = opendir($directory)) {
				while ($file = readdir($handle)) {
					if (!in_array($file,$file_exceptions)) {
						$file_list = get_library_files($directory . "/" . $file, $file_exceptions, $file_list);
					}
				}
			}
			
			return $file_list;
			
		}
		
	/**
	 * Ensures that the installation has all the correct files, that PHP is configured correctly, and so on.
	 * Leaves appropriate messages in the error register if not.
	 *
	 * @return true|false True if everything is ok (or Elgg is fit enough to run); false if not.
	 */
		function sanitise() {
			
			if (!file_exists(dirname(dirname(__FILE__)) . "/settings.php"))
				register_error(elgg_view("messages/sanitisation/settings"));
			
		}
		
	/**
	 * Registers
	 */
		
	/**
	 * Message register handling
	 * If no parameter is given, the function returns the array of messages so far and empties it.
	 * Otherwise, any message or array of messages is added.
	 *
	 * @param string|array $message Optionally, a single message or array of messages to add
	 * @param string $register By default, "errors". This allows for different types of messages, eg errors.
	 * @return true|false|array Either the array of messages, or a response regarding whether the message addition was successful
	 */
		
		function system_messages($message = null, $register = "messages") {
			
			static $messages;
			if (!isset($messages)) {
				$messages = array();
			}
			if (!isset($messages[$register])) {
				$messages[$register] = array();
			}
			if (!empty($message) && is_array($message)) {
				$messages[$register] = array_merge($messages[$register], $message);
				return true;
			} else if (!empty($message) && is_string($message)) {
				$messages[$register][] = $message;
				return true;
			} else if (!is_string($message) && !is_array($message)) {
				if (!empty($register)) {
					$returnarray = $messages[$register];
					$messages[$register] = array();
				} else {
					$returnarray = $messages;
					$messages = array();
				}
				return $returnarray;
			}
			return false;
			
		}
		
	/**
	 * An alias for system_messages($message) to handle standard user information messages
	 *
	 * @param string|array $message Message or messages to add
	 * @return true|false Success response
	 */
		function system_message($message) {
			return system_messages($message, "messages");
		}
		
	/**
	 * An alias for system_messages($message) to handle error messages
	 *
	 * @param string|array $message Error or errors to add
	 * @return true|false Success response
	 */
		function register_error($error) {
			return system_messages($error, "errors");
		}

?>