<?php
	/**
	 * Class for output log messages to console when using PHP 5.4 built in webserver
	 * @author iamanders <anders@iamanders.com>
	 */
	class slog {

		/**
		 * Singleton instance
		 */
		private static $_instance;
		
		/**
		 * Get singleton instance
		 */
		public static function get_instance() {
			if(!self::$_instance)
				self::$_instance = new slog();
			return self::$_instance;
		}

		/**
		 * Constructor
		 */
		public function __contruct() { }
		
		/**
		 * Print message
		 */
		private function log($type = 'info', $message) {	
			$stdout = fopen('php://stderr', 'w');
			
			if($type == 'warning') {
				fwrite($stdout, "\033[33m[" . date('D M d H:i:s Y') ."] WARNING: \033[37m" . $message . "\n");
			} elseif($type == 'error') {
				fwrite($stdout, "\033[31m[" . date('D M d H:i:s Y') ."] ERROR: \033[37m" . $message . "\n");
			} else {
				fwrite($stdout, "\033[32m[" . date('D M d H:i:s Y') ."] INFO: \033[37m" . $message . "\n");
			}
			
			fclose($stdout);
		}
		
		/**
		 * Print a warning message
		 */	
		public function warning($message) {
			$this->log('warning', $message);
		}
		
		/**
		 * Print a error message
		 */
		public function error($message) {
			$this->log('error', $message);
		}
			
		/**
		 * Print a info message
		 */
		public function info($message) {
			$this->log('info', $message);
		}
		
	}