<?php
/**
 * Chronolabs REST Session Identity Selector API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @package         identity
 * @since           1.0.2
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: functions.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Screening API Service REST
 * @link			https://screening.labs.coop Screening API Service Operates from this URL
 * @filesource
 */

	define('PATH_CACHE', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'cache');
	
	error_reporting(E_ERROR);
	ini_set('display_errors', true);
	define('MAXIMUM_QUERIES', 128 * 1831);
	ini_set('memory_limit', '256M');
	
	include dirname(__FILE__).'/class/identity.php';
	include dirname(__FILE__).'/functions.php';
	
	$help=false;
	if ((!isset($_GET['output']) || empty($_GET['output'])) || (!isset($_REQUEST['unique']) || empty($_REQUEST['unique']))) {
		$help=true;
	} elseif (isset($_GET['output']) && !empty($_GET['output']) && isset($_REQUEST['unique']) && !empty($_REQUEST['unique'])) {
		$output = (string)trim($_GET['output']);
		$algorithm = (string)trim($_GET['algorithm']);
		$unique = (string)trim($_REQUEST['unique']);
		$mode = (string)trim($_GET['type']);
		$length = (integer)trim($_REQUEST['length']);
		if (empty($mode))
			$mode = 'default';
		parse_str(parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY), $__vars);
		$__vars = array_merge($__vars, $_GET);
		$__vars = array_merge($__vars, $_POST);
		unset($__vars['length']);
		unset($_POST['length']);
		unset($__vars['type']);
		unset($_POST['type']);
		unset($__vars['output']);
		unset($_POST['output']);
		unset($__vars['algorithm']);
		unset($_POST['algorithm']);
		unset($__vars['unique']);
		unset($_POST['unique']);
		if (count($__vars))
			$unique = sha1($unique . json_encode($__vars));
	} else {
		$help=true;
	}
	if ($help==true) {
		if (function_exists('http_response_code'))
			http_response_code(400);
		include dirname(__FILE__).'/help.php';
		exit;
	}
	if (function_exists('http_response_code'))
		http_response_code(200);
	$data = identity::getInstance(true)->getIdentity($unique, $output, $mode, $algorithm, $length);
	switch ($output) {
		default:
			echo '<h1>Session Method: ' . strtoupper($algorithm) . '</h1>';
			echo '<pre style="font-family: \'Courier New\', Courier, Terminal; font-size: 0.77em;">';
			if (!is_array($data))
				echo $data;
			else
				echo "{ '". implode("' } { '", $data) . "' }";
			echo '</pre>';
			break;
		case 'raw':
			if (!is_array($data))
				echo $data;
			else
				echo "{ '". implode("' } { '", $data) . "' }";
			break;
		case 'json':
			header('Content-type: application/json');
			echo json_encode($data);
			break;
		case 'serial':
			header('Content-type: text/html');
			echo serialize($data);
			break;
		case 'xml':
			header('Content-type: application/xml');
			$dom = new XmlDomConstruct('1.0', 'utf-8');
			$dom->fromMixed(array('root'=>$data));
 			echo $dom->saveXML();
			break;
	}
?>
		