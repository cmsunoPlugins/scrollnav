//
// CMSUno
// Plugin Scrollnav
//
function f_save_scrollnav(){
	jQuery(document).ready(function(){
		var topi=document.getElementById("scroTopi").value;
		var topf=document.getElementById("scroTopf").value;
		var tit=document.getElementById("scroTit").value;
		var sp=document.getElementById("scroSpeed").value;
		var ofs=document.getElementById("scroOfs").value;
		var ver=document.getElementById("scroV3").value;
		jQuery.post('uno/plugins/scrollnav/scrollnav.php',{'action':'save','unox':Unox,'topi':topi,'topf':topf,'tit':tit,'sp':sp,'ofs':ofs,'v3':ver},function(r){
			f_alert(r);
		});
	});
}
//
function f_load_scrollnav(){
	jQuery(document).ready(function(){
		jQuery.getJSON("uno/data/"+Ubusy+"/scrollnav.json?r="+Math.random(),function(r){
			if(r.topi!=undefined)document.getElementById('scroTopi').value=r.topi;
			if(r.topf!=undefined)document.getElementById('scroTopf').value=r.topf;
			if(r.tit!=undefined)document.getElementById('scroTit').value=r.tit;
			if(r.sp!=undefined)document.getElementById('scroSpeed').value=r.sp;
			if(r.ofs!=undefined)document.getElementById('scroOfs').value=r.ofs;
			if(r.v3!=undefined)jQuery('#scroV3').val(r.v3);
			f_version_scrollnav(document.getElementById('scroV3'));
		});
	});
}
//
function f_version_scrollnav(f){
	if(f.options[f.selectedIndex].value=='0')jQuery('.v2').show();
	else jQuery('.v2').hide();
}
//
f_load_scrollnav();
