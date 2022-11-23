//
// CMSUno
// Plugin Scrollnav
//
function f_save_scrollnav(){
	let x=new FormData();
	x.set('action','save');
	x.set('unox',Unox);
	x.set('topi',document.getElementById("scroTopi").value);
	x.set('topf',document.getElementById("scroTopf").value);
	x.set('tit',document.getElementById("scroTit").value);
	x.set('sp',document.getElementById("scroSpeed").value);
	x.set('ofs',document.getElementById("scroOfs").value);
	x.set('v3',document.getElementById("scroV3").value);
	fetch('uno/plugins/scrollnav/scrollnav.php',{method:'post',body:x})
	.then(r=>r.text())
	.then(r=>f_alert(r));
}
//
function f_load_scrollnav(){
	fetch("uno/data/"+Ubusy+"/scrollnav.json?r="+Math.random())
	.then(r=>r.json())
	.then(function(r){
		if(r.topi!=undefined)document.getElementById('scroTopi').value=r.topi;
		if(r.topf!=undefined)document.getElementById('scroTopf').value=r.topf;
		if(r.tit!=undefined)document.getElementById('scroTit').value=r.tit;
		if(r.sp!=undefined)document.getElementById('scroSpeed').value=r.sp;
		if(r.ofs!=undefined)document.getElementById('scroOfs').value=r.ofs;
		if(r.v3!=undefined)document.getElementById('scroV3').value=r.v3;
		f_version_scrollnav(document.getElementById('scroV3'));
	});
}
//
function f_version_scrollnav(f){
	if(f.options[f.selectedIndex].value=='0')document.querySelectorAll(".v2").forEach(a=>a.style.display='table-row');
	else document.querySelectorAll(".v2").forEach(a=>a.style.display='none');
}
//
f_load_scrollnav();
