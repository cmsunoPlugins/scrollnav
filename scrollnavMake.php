<?php
if (!isset($_SESSION['cmsuno'])) exit();
?>
<?php
if(file_exists('data/'.$Ubusy.'/scrollnav.json'))
	{
	$q1 = file_get_contents('data/'.$Ubusy.'/scrollnav.json');
	$a1 = json_decode($q1,true);
	$Uhead .= '<script src="uno/plugins/scrollnav/jquery.scrollNav.min.js"></script>'."\r\n";
	$Ufoot .= '<script type="text/javascript">jQuery(window).load(function(){jQuery(".content").scrollNav({sections:".nav1",subSections:".nav2",showHeadline:'.($a1["tit"]?'true,headlineText:"'.$a1["tit"].'"':"false").',showTopLink:false,animated:'.($a1["sp"]?'true,speed:'.$a1["sp"]:"false").',scrollOffset:'.$a1["ofs"].',fixedMargin:'.$a1["topf"].'});});</script>'."\r\n";
	$Ustyle .= '.scroll-nav{position:absolute;top:'.$a1["topi"].'px}.scroll-nav.fixed{position:fixed;top:'.$a1["topf"].'px}'."\r\n";
	$tmp = $Ucontent;
	$b = 0; $out = "";
	for($v=0; $v<strlen($tmp); ++$v)
		{
		if (substr($tmp,$v,17)=='<h2 class="nav1">') { $b=1; $out .= '<h2 class="nav1">'; }
		if ($b==1 && substr($tmp,$v,2)=='<a') $b=2;
		if ($b==2 && substr($tmp,$v,1)=='>') { $b=3; ++$v; }
		if ($b==3 && substr($tmp,$v,3)=='</a') $b=2;
		if (substr($tmp,$v,5)=="</h2>") $b=0;
		if ($b==0 || $b==3) $out .= substr($tmp,$v,1);
		}
	$Ucontent = $out;
	$Uhtml = str_replace('[[menu]]','',$Uhtml); // suppression du menu classique
	$Ujsmenu = ''; // suppression du menu classique
	}
?>
