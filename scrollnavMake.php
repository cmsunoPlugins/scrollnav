<?php
if (!isset($_SESSION['cmsuno'])) exit();
?>
<?php
if(file_exists('data/'.$Ubusy.'/scrollnav.json'))
	{
	$q1 = file_get_contents('data/'.$Ubusy.'/scrollnav.json');
	$a1 = json_decode($q1,true);
	$Uhead .= '<script src="uno/plugins/scrollnav/jquery.scrollNav.min.js"></script>'."\r\n";
	$Ufoot .= '<script type="text/javascript">jQuery(window).load(function(){jQuery(".content").scrollNav({sections:".nav1:not(.navOff)",subSections:".nav2",showHeadline:'.($a1["tit"]?'true,headlineText:"'.$a1["tit"].'"':"false").',showTopLink:false,animated:'.($a1["sp"]?'true,speed:'.$a1["sp"]:"false").',scrollOffset:'.$a1["ofs"].',fixedMargin:'.$a1["topf"].'});});</script>'."\r\n";
	$Ustyle .= '.scroll-nav{position:absolute;top:'.$a1["topi"].'px}.scroll-nav.fixed{position:fixed;top:'.$a1["topf"].'px}'."\r\n";
	// suppression du menu classique
	$Uhtml = str_replace('[[menu]]','',$Uhtml);
	$Ujsmenu = '';
	}
?>
