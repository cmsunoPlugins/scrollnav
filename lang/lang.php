<?php
$langPlug = array(
	"fr" => "fr_FR.utf8",
	"en" => "en_US",
	"es" => "es_ES.utf8"
	);
//	
if(!empty($langPlug[$lang]))
	{
	require_once(dirname(__FILE__).'/../../../includes/lang/php-gettext/gettext.inc');
	T_setlocale(LC_MESSAGES, $langPlug[$lang]);
	T_bindtextdomain("scrollnav", dirname(__FILE__));
	T_bind_textdomain_codeset("scrollnav", "UTF-8");
	T_textdomain("scrollnav");
	}
else if(!function_exists('T_'))
	{
	function T_($f) { return $f; }
	}
?>
