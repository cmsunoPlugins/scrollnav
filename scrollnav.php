<?php
session_start(); 
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])!='xmlhttprequest') {sleep(2);exit;} // ajax request
if(!isset($_POST['unox']) || $_POST['unox']!=$_SESSION['unox']) {sleep(2);exit;} // appel depuis uno.php
?>
<?php
include('../../config.php');
include('lang/lang.php');
// ********************* actions *************************************************************************
if (isset($_POST['action']))
	{
	switch ($_POST['action'])
		{
		// ********************************************************************************************
		case 'plugin': ?>
		<div class="blocForm">
			<h2>ScrollNav</h2>
			<p><?php echo T_("Add a lateral sliding menu.");?></p>
			<p><?php echo T_("The Format -Title 2- (H2 HTML tags) inside pages will be submenu.");?></p>
			<h3><?php echo T_("Parameters :");?></h3>
			<table class="hForm">
				<tr>
					<td><label><?php echo T_("Scrollnav Version :");?></label></td>
					<td>
						<select name="scroV3" id="scroV3" onChange="f_version_scrollnav(this)">
							<option value="0"><?php echo T_("Version 2 - JQuery Required");?></option>
							<option value="1"><?php echo T_("Version 3 - Pure JavaScript, less options");?></option>
						</select>
					</td>
					<td><em><?php echo T_("Version 2 is more complete");?></em></td>
				</tr>
				<tr class="v2">
					<td><label><?php echo T_("Top Start");?></label></td>
					<td><input type="text" class="input" name="scroTopi" id="scroTopi" style="width:50px;" /></td>
					<td><em><?php echo T_("Margin up when the page is at the top (px).");?></em></td>
				</tr>
				<tr class="v2">
					<td><label><?php echo T_("Top Fixed");?></label></td>
					<td><input type="text" class="input" name="scroTopf" id="scroTopf" style="width:50px;" /></td>
					<td><em><?php echo T_("Margin up when the menu becomes fixed (px).");?></em></td>
				</tr>
				<tr class="v2">
					<td><label><?php echo T_("Menu Title");?></label></td>
					<td><input type="text" class="input" name="scroTit" id="scroTit" style="width:100px;" /></td>
					<td><em><?php echo T_("If you want a title at the top of the menu, write it. Otherwise, empty it.");?></em></td>
				</tr>
				<tr class="v2">
					<td><label><?php echo T_("Speed");?></label></td>
					<td><input type="text" class="input" name="scroSpeed" id="scroSpeed" style="width:100px;" /></td>
					<td><em><?php echo T_("Set the animated page scroll speed (ms). Empty it for no animation.");?></em></td>
				</tr>
				<tr class="v2">
					<td><label><?php echo T_("Top Offset");?></label></td>
					<td><input type="text" class="input" name="scroOfs" id="scroOfs" style="width:50px;" /></td>
					<td><em><?php echo T_("When click, position of the window relative to the beginning of the section (px).");?></em></td>
				</tr>
			</table>
			<div class="bouton fr" onClick="f_save_scrollnav();" title="<?php echo T_("Save settings");?>"><?php echo T_("Save");?></div>
			<div class="clear"></div>
		</div>
		<?php break;
		// ********************************************************************************************
		case 'save':
		$q = file_get_contents('../../data/busy.json'); $a = json_decode($q,true); $Ubusy = $a['nom'];
		$q = @file_get_contents('../../data/'.$Ubusy.'/scrollnav.json');
		if($q) $a = json_decode($q,true);
		else $a = Array();
		$a['topi'] = ($_POST['topi']?$_POST['topi']:0);
		$a['topf'] = ($_POST['topf']?$_POST['topf']:0);
		$a['tit'] = $_POST['tit'];
		$a['sp'] = ($_POST['sp']?$_POST['sp']:false);
		$a['ofs'] = ($_POST['ofs']?$_POST['ofs']:0);
		$a['v3'] = ($_POST['v3']?$_POST['v3']:0);
		$out = json_encode($a);
		if (file_put_contents('../../data/'.$Ubusy.'/scrollnav.json', $out)) echo T_('Backup performed');
		else echo '!'.T_('Impossible backup');
		break;
		// ********************************************************************************************
		}
	clearstatcache();
	exit;
	}

?>
