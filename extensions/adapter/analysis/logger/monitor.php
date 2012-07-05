<?php
namespace li3_monitor\extensions\adapter\analysis\logger;

use lithium\analysis\Debugger;

class Monitor extends \lithium\analysis\Logger {

	protected $_autoConfig = array('classes' => 'merge', 'methods' => 'merge');

	protected static $_configurations = array(
		'monitor' => array('adapter' => 'File')
	);

	protected $_classes = array(
		'debugger' => 'lithium\net\http\Debugger',
		'logger' => 'lithium\data\collection\Logger',
	);

	public static function __callStatic($priority = 'debug', $params = array()) {
		$trace = Debugger::trace(array('format' => 'array', 'depth' => 3, 'includeScope' => false));
		$trace = $trace[2];
		if(empty($trace)) {
			throw UnexpectedValueException('Could not trace method');
		}

		$trace = array(
			'method'	=> $trace['functionRef'],
			'line'		=> $trace['line'],
			'file'		=> $trace['file']
		);

		$message = "//////////// {$trace['file']}:{$trace['line']} -> {$trace['method']} ////////////\n";
		foreach($params as $param) {
			$dump = Debugger::export($param);
			$message = "{$message}{$dump}\n";
		}

		return parent::write($priority, $message);
	}
}
?>