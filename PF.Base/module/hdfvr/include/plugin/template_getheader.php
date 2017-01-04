<?php 
//include module js and css files to across the site
Phpfox::getLib('template')->setHeader('cache', 
	array(
		'style.css' => 'module_hdfvr',
		'jwplayer6.7/jwplayer.js' => 'module_hdfvr',
		'swfobject.js' => 'module_hdfvr',
		'javascript.js' => 'module_hdfvr',
		'callsback.js' => 'module_hdfvr'
	));

$rtmpConnectionString = Phpfox::getParam('hdfvr.hdfvr_rtmp_connectionstring');
$baseURL = Phpfox::getParam('core.path');
$pluginURL = $baseURL . 'module/hdfvr/';

Phpfox::getLib('template')->setHeader(array(												
	'<script type="text/javascript">$Behavior.jwplayer = function() { jwplayer.key="//ZZSZButwV80Dk+P22Virq7OzykOoYaF317tA=="; hdfvrRtmpConnectionString = "'.$rtmpConnectionString.'"; hdfvrModulePath = "'.$pluginURL.'"; }</script>',
));
?>