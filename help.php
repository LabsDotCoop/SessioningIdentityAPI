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
	$uniqueid = md5(microtime(true) . __FILE__);
	$pu = parse_url($_SERVER['REQUEST_URI']);
	$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower($_SERVER['HTTP_HOST']).$pu['path'];
	if (strlen($theip = whitelistGetIP(true))==0)
		$theip = "127.0.0.1";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 	$servicename = "Client Session Identity"; 
		$servicecode = "CSI"; ?>
	<meta property="og:url" content="<?php echo (isset($_SERVER["HTTPS"])?"https://":"http://").$_SERVER["HTTP_HOST"]; ?>" />
	<meta property="og:site_name" content="<?php echo $servicename; ?> Open Services API's (With Source-code)"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="rating" content="general" />
	<meta http-equiv="author" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="copyright" content="Chronolabs Cooperative &copy; <?php echo date("Y")-1; ?>-<?php echo date("Y")+1; ?>" />
	<meta http-equiv="generator" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="apple-touch-icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<meta property="og:image" content="//labs.partnerconsole.net/execute2/external/reseller-logo"/>
	<link rel="stylesheet" href="/style.css" type="text/css" />
	<link rel="stylesheet" href="//css.ringwould.com.au/3/gradientee/stylesheet.css" type="text/css" />
	<link rel="stylesheet" href="//css.ringwould.com.au/3/shadowing/styleheet.css" type="text/css" />
	<title><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</title>
	<meta property="og:title" content="<?php echo $servicecode; ?> API"/>
	<meta property="og:type" content="<?php echo strtolower($servicecode); ?>-api"/>
	<!-- AddThis Smart Layers BEGIN -->
	<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
	<script type="text/javascript">
	  addthis.layers({
		'theme' : 'transparent',
		'share' : {
		  'position' : 'right',
		  'numPreferredServices' : 6
		}, 
		'follow' : {
		  'services' : [
			{'service': 'twitter', 'id': 'ChronolabsCoop'},
			{'service': 'twitter', 'id': 'Cipherhouse'},
			{'service': 'twitter', 'id': 'OpenRend'},
			{'service': 'facebook', 'id': 'Chronolabs'},
			{'service': 'linkedin', 'id': 'founderandprinciple'},
			{'service': 'google_follow', 'id': '105256588269767640343'},
			{'service': 'google_follow', 'id': '116789643858806436996'}
		  ]
		},  
		'whatsnext' : {},  
		'recommended' : {
		  'title': 'Recommended for you:'
		} 
	  });
	</script>
	<!-- AddThis Smart Layers END -->
</head>
<?php 
	$data = chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))) . chr(mt_rand(ord("0"),ord("Z"))); 
	$hashes = array_Keys($GLOBALS['hashing']->hashes);
	$hash = $hashes[mt_rand(0, count($hashes)-1)];
	$modes = array('raw'=>'Raw', 'html'=>'HTML', 'json'=>'Json', 'serial'=>'Serialisation', 'xml'=>'XML'); 
?>
<body>
<div class="main">
    <h1><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</h1>
    <p>This is an API Service for creating client session identity via a URL with GET or POST methods as per normal REST API Services.</p>
    <h2>Examples of Calls (Using JSON)</h2>
    <p>There is a couple of calls to the API which I will explain, in this example it will return a JSON String!</p>
    <blockquote>If you wanted to return an <?php echo strtoupper($hash); ?> of the data '<?php echo htmlspecialchars($data); ?>' you would use the following URL :: <a target="_blank" href="<?php echo $source; ?>v1/<?php echo $hash; ?>/json.api?data=<?php echo urlencode($data); ?>"><?php echo $source; ?>v1/<?php echo $hash; ?>/json.api?data=<?php echo urlencode($data); ?></a>.<br/><br/>You need to provide the algorithm in the URL path as seen in the example as well as the GET or POST method form variable containing the information you want to hash in the variable <strong>'data'</strong>.</blockquote>
    <h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a target="_blank" href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2>Session Types Available</h2>
    <p>This is a list of the checksums available you would use in the URL path the part in this information just following this paragraph in <em>italics bold</em>!</p>
    <blockquote>
<?php foreach (identity::getInstance(true)->_preset as $key => $types) { ?>
        <em><strong><?php echo $key; ?></strong></em> - <?php echo $types['desc']; ?> - length: <?php echo $types['length']; ?> - algorithm: <?php echo $types['length']; ?><br />
<?php } ?>
    </blockquote>
    <h2>Checksums/Hashes Algorithms Available</h2>
    <p>This is a list of the checksums available you would use in the URL path the part in this information just following this paragraph in <em>italics bold</em>!</p>
    <blockquote>
<?php foreach (identityHashesAPI::getInstance(true)->identityHashes as $crckey => $values) { ?>
        <em><strong><?php echo $crckey; ?></strong></em> - <?php echo $values['info']['description']; ?><br />
<?php } ?>
    </blockquote>
<?php foreach ($modes as $mode => $title) { ?>
    <h2><?php echo $title; ?> Document Output</h2>
    <p>This is done with the <em><?php echo $mode; ?>.api</em> extension at the end of the url.</p>
    <blockquote>
<?php foreach (identity::getInstance(true)->_preset as $key => $types) { ?>
    	<font color="#009900">Get typal <?php echo strtoupper($key); ?> session id with unique hash of <em>'<?php echo $uniqueid; ?>'</em></font><br/>
        <em><strong><a target="_blank" href="<?php echo $source; ?>v1/<?php echo  (($key!='default') ? $key . '/' : "" ). $uniqueid . '/'; echo $mode; ?>.api"><?php echo $source; ?>v1/<?php echo  (($key!='default') ? $key . '/' : "" ). $uniqueid . '/'; echo $mode; ?>.api</a></strong></em><br /><br />
<?php foreach (identityHashesAPI::getInstance(true)->identityHashes as $crckey => $values) { ?>
    	<font color="#009900">Get typal <?php echo strtoupper($key); ?> session id with unique hash of <em>'<?php echo $uniqueid; ?>'</em> as well as the Checksum type of <em>'<?php echo $crckey; ?>'</em> at the length of <em>'<?php echo ($length = mt_rand(10,32)); ?>'</em>.</font><br/>
        <em><strong><a target="_blank" href="<?php echo $source; ?>v1/<?php echo  (($key!='default') ? $key . '/' : "" ). $uniqueid . '/' . $crckey . '/' . $length. '/' . $mode; ?>.api"><?php echo $source; ?>v1/<?php echo  (($key!='default') ? $key . '/' : "" ). $uniqueid . '/' . $crckey . '/' . $length. '/' .  $mode; ?>.api</a></strong></em><br /><br />
<?php } ?>
<?php } ?>
    </blockquote>
<?php } ?>
     <?php if (file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apis-labs.coop.html')) {
    	readfile(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apis-labs.coop.html');
    }?>	
    <h2>Limits</h2>
    <p>There is a limit of <?php echo MAXIMUM_QUERIES; ?> queries per hour. This will reset every hour and the response of a 404 document not found will be provided if you have exceeded your query limits. You can add yourself to the whitelist by using the following form API <a href="https://whitelist.labs.coop/">Whitelisting form</a>. This is only so this service isn't abused!!</p>
    <h2>The Author</h2>
    <p>This was developed by Simon Roberts in 2014 and is part of the Chronolabs System and Xortify and offering on-going support to existing libraries. if you need to contact simon you can do so at the following address <a target="_blank" href="mailto:wishcraft@users.sourceforge.net">wishcraft@users.sourceforge.net</a></p></body>
</div>
</html>
<?php 
