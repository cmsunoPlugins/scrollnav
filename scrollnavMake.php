<?php
//if (!isset($_SESSION['cmsuno'])) exit();
?>
<?php
if(file_exists('data/'.$Ubusy.'/scrollnav.json')) {
	$q1 = file_get_contents('data/'.$Ubusy.'/scrollnav.json');
	$a1 = json_decode($q1,true);
	if(empty($a1["v3"])) {
		$Uhead .= '<script src="uno/plugins/scrollnav/jquery.scrollNav.min.js"></script>'."\r\n"; // V 2.7.3
		$Ufoot .= '<script type="text/javascript">jQuery(window).load(function(){jQuery(".content").scrollNav({';
			$Ufoot .= 'sections:".nav1:not(.navOff)"';
			$Ufoot .= ',subSections:".nav2"';
			$Ufoot .= ',showHeadline:'.(!empty($a1["tit"])?'true,headlineText:"'.$a1["tit"].'"':"false");
			$Ufoot .= ',showTopLink:false';
			$Ufoot .= ',animated:'.(!empty($a1["sp"])?'true,speed:'.$a1["sp"]:"false");
			if(!empty($a1["ofs"])) $Ufoot .= ',scrollOffset:'.$a1["ofs"];
			if(!empty($a1["topf"])) $Ufoot .= ',fixedMargin:'.$a1["topf"];
		$Ufoot .= '});});</script>'."\r\n";
		$Ustyle .= '.scroll-nav{position:absolute;top:'.(!empty($a1["topi"])?$a1["topi"]:'0').'px}.scroll-nav.fixed{position:fixed;top:'.(!empty($a1["topf"])?$a1["topf"]:'0').'px}'."\r\n";
	}
	else {
		$Uhead .= '<script src="uno/plugins/scrollnav/scrollnav.min.umd.js"></script>'."\r\n"; // V 3.0.2
		$Ufoot .= '<script type="text/javascript">const scontent=document.querySelector(".content");scrollnav.init(scontent,{';
			$Ufoot .= 'sections:".nav1:not(.navOff)",';
			$Ufoot .= 'subSections:".nav2"';
		$Ufoot .= '});</script>'."\r\n";
		$Ustyle .= '.scroll-nav{position:sticky;}'."\r\n";
	}
	// suppression du menu classique
	$Uhtml = str_replace('[[menu]]','',$Uhtml);
	$Ujsmenu = '';
}
?>
