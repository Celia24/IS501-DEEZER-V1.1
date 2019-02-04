function borde(id){
 if (id=="mu") {
   $("#mu").addClass("borde-a");
   $("#fav").removeClass("borde-a");
   $("#pla").removeClass("borde-a");
   $("#alb").removeClass("borde-a");
   $("#art").removeClass("borde-a");
   $("#um").css("color","#32323d");
   $("#alp").css("color","#72727d");
   $("#bla").css("color","#72727d");
   $("#tra").css("color","#72727d");
   $("#mas").css("color","#72727d");
   $("#af").css("color","#72727d");
 }
 if (id=="fav") {
 	$("#fav").addClass("borde-a"); 
   $("#mu").removeClass("borde-a");
   $("#pla").removeClass("borde-a");
   $("#alb").removeClass("borde-a");
   $("#art").removeClass("borde-a");
   $("#af").css("color","#32323d");
   $("#alp").css("color","#72727d"); 
   $("#bla").css("color","#72727d");
   $("#tra").css("color","#72727d");
   $("#mas").css("color","#72727d");
   $("#um").css("color","#72727d");
 }
 if (id=="pla") {
 	$("#pla").addClass("borde-a");
   $("#fav").removeClass("borde-a");
   $("#mu").removeClass("borde-a");
   $("#alb").removeClass("borde-a");
   $("#art").removeClass("borde-a");
   $("#alp").css("color","#32323d");
   $("#um").css("color","#72727d");
   $("#bla").css("color","#72727d");
   $("#tra").css("color","#72727d");
   $("#mas").css("color","#72727d");
   $("#af").css("color","#72727d");
 }
 if (id=="alb") {
 	$("#alb").addClass("borde-a");
   $("#fav").removeClass("borde-a");
   $("#pla").removeClass("borde-a");
   $("#mu").removeClass("borde-a");
   $("#art").removeClass("borde-a");
   $("#bla").css("color","#32323d");
   $("#alp").css("color","#72727d");
   $("#um").css("color","#72727d");
   $("#tra").css("color","#72727d");
   $("#mas").css("color","#72727d");
   $("#af").css("color","#72727d");
 }
 if (id=="art") {
 	$("#art").addClass("borde-a");
   $("#fav").removeClass("borde-a");
   $("#pla").removeClass("borde-a");
   $("#alb").removeClass("borde-a");
   $("#mu").removeClass("borde-a");
   $("#tra").css("color","#32323d");
   $("#alp").css("color","#72727d");
   $("#bla").css("color","#72727d");
   $("#um").css("color","#72727d");
   $("#mas").css("color","#72727d");
   $("#af").css("color","#72727d");
 }
 
}

function redimensionariframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }

function sobre(id){
	if (id!="sma") {
		$("#"+id).css("border-bottom","3px solid rgb(0, 127, 235)");
		$("#"+id).click(function(){
			$("#"+id).css("border-bottom","");
			borde(id);

		});
	}else{
		$("#"+id).click(function(){

		});
	    $("#flecha").removeClass("glyphicon glyphicon-chevron-down");
        $("#flecha").addClass("glyphicon glyphicon-chevron-up");
        $("#mas").css("color","#32323d");
	}
    
	
}

function unsobre(id){
	if (id=="sma") {
		$("#flecha").addClass("glyphicon glyphicon-chevron-down");
		$("#mas").css("color","#72727d");
	}
	if ($("#"+id).css("border-bottom")=="3px solid rgb(0, 127, 235)"){
		$("#"+id).css("border-bottom","");
	}
    
}




function ifra4(link){
    if (link==1){
      borde22(1);
    	$("#ifra4").html('<iframe class="contenido4" onload="redimensionariframe(this)" src="favoritas.php" frameborder="0"  ></iframe>');
    }

    if(link==2){
      borde22(2);
    	$("#ifra4").html("<iframe class='contenido4' onload='redimensionariframe(this)' src='playlists.php' frameborder='0' ></iframe>");
    }

     if(link==3){
      borde22(2);
    	$("#ifra4").html("<iframe class='contenido4' onload='redimensionariframe(this)' src='albumes.php' frameborder='0' ></iframe>");
    }

    if(link==4){
      borde22(2);
      $("#ifra4").html("<iframe class='contenido4' onload='redimensionariframe(this)' src='artistas.php' frameborder='0' ></iframe>");
    }

    if(link==5){
      borde22(2);
      $("#ifra4").html("<iframe class='contenido4' onload='redimensionariframe(this)' src='mimusica.php' frameborder='0' ></iframe>");
    }

}


function recortar(texto){
  if(texto.length>10){
    texto=texto.slice(0,11)+"...";
  }
  document.write(texto);
}

function recortar2(texto){
  if(texto.length>46){
    texto=texto.slice(0,46)+"...";
  }
  document.write(texto);
}

function recortar3(texto){
  if(texto.length>16){
    texto=texto.slice(0,16)+"...";
  }
  return texto;
}

function borde2(id){
  var a1=window.parent.document.getElementById("start");
  var b1=window.parent.document.getElementById("start2");
  var c1=window.parent.document.getElementById("mod");
  var d1=window.parent.document.getElementById("start4");
  var aa=window.parent.document.getElementById("first");
  var aaa=window.parent.document.getElementById("first");
  aaa=$(aaa);
  var bb=window.parent.document.getElementById("first2");
  var bbb=window.parent.document.getElementById("first2");
  bbb=$(bbb);
  var cc=window.parent.document.getElementById("first3");
  var ccc=window.parent.document.getElementById("first3");
  ccc=$(ccc);
  var dd=window.parent.document.getElementById("first4");
  var ddd=window.parent.document.getElementById("first4");
  ddd=$(ddd);
  d1.classList.contains("bordee"); 
  a1.classList.contains("bordee");
  b1.classList.contains("bordee");
  c1.classList.contains("bordee");
  if (id==1) {  
       if (a1) {
        a1.classList.remove("bordee");
        d1.classList.add("bordee");
        aa.classList.remove("margen");
        dd.classList.add("margen");
          $(aaa).css("color","#C2C2CA");
          $(ddd).css("color","white");
       }
       if (b1) {
        b1.classList.remove("bordee");
        d1.classList.add("bordee");
        bb.classList.remove("margen");
        dd.classList.add("margen");
        $(bbb).css("color","#C2C2CA");
        $(ddd).css("color","white");
       }
       if (c1) {
        c1.classList.remove("bordee");
        d1.classList.add("bordee");
        cc.classList.remove("margen");
        dd.classList.add("margen");
        $(ccc).css("color","#C2C2CA");
        $(ddd).css("color","white");
       }
       if (d1) {
        d1.classList.add("bordee");
        dd.classList.add("margen");
        $(ddd).css("color","white");
       }
  }

  if (id==2) {
       if (a1) {
        a1.classList.remove("bordee");
        c1.classList.add("bordee");
        aa.classList.remove("margen");
        cc.classList.add("margen");
        $(aaa).css("color","#C2C2CA");
        $(ccc).css("color","white");
       }
       if (b1) {
        b1.classList.remove("bordee");
        c1.classList.add("bordee");
        bb.classList.remove("margen");
        cc.classList.add("margen");
        $(bbb).css("color","#C2C2CA");
        $(ccc).css("color","white");
       }
       if (c1) {
        c1.classList.add("bordee");
        cc.classList.add("margen");
        $(ccc).css("color","white");
       }
       if (d1) {
        d1.classList.remove("bordee");
        c1.classList.add("bordee");
        dd.classList.remove("margen");
        cc.classList.add("margen");
        $(ddd).css("color","#C2C2CA");
        $(ccc).css("color","white");
       }
  }

}


function borde22(id){
  var a1=window.parent.parent.document.getElementById("start");
  var b1=window.parent.parent.document.getElementById("start2");
  var c1=window.parent.parent.document.getElementById("mod");
  var d1=window.parent.parent.document.getElementById("start4");
  var aa=window.parent.parent.document.getElementById("first");
  var aaa=window.parent.parent.document.getElementById("first");
  aaa=$(aaa);
  var bb=window.parent.parent.document.getElementById("first2");
  var bbb=window.parent.parent.document.getElementById("first2");
  bbb=$(bbb);
  var cc=window.parent.parent.document.getElementById("first3");
  var ccc=window.parent.parent.document.getElementById("first3");
  ccc=$(ccc);
  var dd=window.parent.parent.document.getElementById("first4");
  var ddd=window.parent.parent.document.getElementById("first4");
  ddd=$(ddd);
  d1.classList.contains("bordee"); 
  a1.classList.contains("bordee");
  b1.classList.contains("bordee");
  c1.classList.contains("bordee");
  if (id==1) {  
       if (a1) {
        a1.classList.remove("bordee");
        d1.classList.add("bordee");
        aa.classList.remove("margen");
        dd.classList.add("margen");
          $(aaa).css("color","#C2C2CA");
          $(ddd).css("color","white");
       }
       if (b1) {
        b1.classList.remove("bordee");
        d1.classList.add("bordee");
        bb.classList.remove("margen");
        dd.classList.add("margen");
        $(bbb).css("color","#C2C2CA");
        $(ddd).css("color","white");
       } 
       if (c1) {
        c1.classList.remove("bordee");
        d1.classList.add("bordee");
        cc.classList.remove("margen");
        dd.classList.add("margen");
        $(ccc).css("color","#C2C2CA");
        $(ddd).css("color","white");
       }
       if (d1) {
        d1.classList.add("bordee");
        dd.classList.add("margen");
        $(ddd).css("color","white");
       }
  }

  if (id==2) {
       if (a1) {
        a1.classList.remove("bordee");
        c1.classList.add("bordee");
        aa.classList.remove("margen");
        cc.classList.add("margen");
        $(aaa).css("color","#C2C2CA");
        $(ccc).css("color","white");
       }
       if (b1) {
        b1.classList.remove("bordee");
        c1.classList.add("bordee");
        bb.classList.remove("margen");
        cc.classList.add("margen");
        $(bbb).css("color","#C2C2CA");
        $(ccc).css("color","white");
       }
       if (c1) {
        c1.classList.add("bordee");
        cc.classList.add("margen");
        $(ccc).css("color","white");
       }
       if (d1) {
        d1.classList.remove("bordee");
        c1.classList.add("bordee");
        dd.classList.remove("margen");
        cc.classList.add("margen");
        $(ddd).css("color","#C2C2CA");
        $(ccc).css("color","white");
       }
  }

}


function info(){
  var c1=window.parent.document.getElementById("mod");
  var ccc=window.parent.document.getElementById("first3");
  
  $(c1).removeClass("bordee");
  $(ccc).css("color","#C2C2CA");
  $(ccc).removeClass("margen");
 $('#ifra', window.parent.document).html('<iframe class="contenido" src="configuraciones.php" frameborder="0"  ></iframe>');
  
}



function comprobar(){
  var a=window.parent.document.getElementById("pla");
  var b=window.parent.document.getElementById("alb");
  var c=window.parent.document.getElementById("mu");
  var d=window.parent.document.getElementById("art");
  if (a.classList.contains("borde-a")) {
     a.classList.remove("borde-a");
  }
  if (b.classList.contains("borde-a")) {
      b.classList.remove("borde-a");
  }
  if (c.classList.contains("borde-a")) {
       c.classList.remove("borde-a");
  }
  if (d.classList.contains("borde-a")) {
       d.classList.remove("borde-a");
  }
  
}

function subventana(id){
  comprobar();
  if (id==1) {
    borde22(2);
    window.parent.document.getElementById("pla").classList.add("borde-a");
    $('#ifra4', window.parent.document).html('<iframe class="contenido4" onload="redimensionariframe(this)" src="playlists.php" frameborder="0"  ></iframe>');
  }
  if (id==2) {
    borde22(2);
    window.parent.document.getElementById("alb").classList.add("borde-a");
    $('#ifra4', window.parent.document).html('<iframe class="contenido4" onload="redimensionariframe(this)" src="albumes.php" frameborder="0"  ></iframe>');
  }
  if (id==3) {
    borde22(2);
    window.parent.document.getElementById("art").classList.add("borde-a");
    $('#ifra4', window.parent.document).html('<iframe class="contenido4" onload="redimensionariframe(this)" src="artistas.php" frameborder="0"  ></iframe>');
  }
}


function moddd(){
  $('#newplaylist',window.parent.parent.document).modal('show');

  $("body",window.parent.parent.document).append('<div class="modal-backdrop fade in" id="dropp"  ></div>');
  
if ($('body').hasClass('modal-open')) {
  $('body').removeClass('modal-open');
  $('.fade').removeClass("modal-backdrop"); 
  
}
   
} 

