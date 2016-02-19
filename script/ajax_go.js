/* 
    AJAX GO - AJAX SEMPLICE E VELOCE
    Fabio Donatantonio 2010 - http://www.donatantonio.it/
*/
var myRequest = null;
var the_box = null;

function CreateXmlHttpReq(handler) {
 	var xmlhttp = null;
	try {
    	xmlhttp = new XMLHttpRequest();
  	}catch(e){
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  xmlhttp.onreadystatechange = handler;
  return xmlhttp;
}

function aggiornamento() {
	e = document.getElementById(the_box);
    if (myRequest.readyState == 4 && myRequest.status == 200) {
        e.innerHTML = myRequest.responseText;
    }
}

function ajax_go(url,id_box) {
	the_box = id_box;
	 var r = Math.random();
	if(url.indexOf("?")==-1)
		url = url + "?rand="+escape(r);
	else
		url = url + "&rand="+escape(r);
   
    myRequest = CreateXmlHttpReq(aggiornamento);
    myRequest.open("GET",url);
    myRequest.send(null);
}