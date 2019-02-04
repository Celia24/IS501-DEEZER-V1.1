<!DOCTYPE html>
<html>
<head>
	<title>deezer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/comentarios.css">
	<link rel="stylesheet" type="text/css" href="fantastic/css/font-awesome.min.css">
</head>
<body>
<center>
	<div id="contenedor">
		<h2>Comentarios</h2>
		<div id="comentario">
			<div id="perfil"></div>
			<textarea id="coment" maxlength="250"></textarea>
			<p id="num1">COMPARTIR EN:</p>
			<div id="btnsociales">
				<div id="facebook"><i class="fa fa-facebook fa-1x"></i></div>
				<div id="twitter"><i class="fa fa-twitter fa-1x"></i></div>
			</div>
			<p id="num2">quedan 250 caracteres</p>
			<div id="btnpublic"><p id="mm">Publicar</p></div>
		</div>
	</div>
</center>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$("#twitter").hover(
		function()
		{
			$(this).css("background","#37ABDE");
			$(this).css("cursor","pointer");
		},
		function()
		{
			$(this).css("background","#92929d");
			$(this).css("cursor","pointer");
		})

	$("#facebook").hover(
		function()
		{
			$(this).css("cursor","pointer");
		},
		function()
		{
			$(this).css("cursor","pointer");
		})
	$("#btnpublic").hover(
		function()
		{
			$(this).css("background","#fff");
			$(this).css("cursor","pointer");
		},
		function()
		{
			$(this).css("background","#F8F8F9");
			$(this).css("cursor","pointer");
		})
	$("#comentario").hover(
		function()
		{
		$("#comentario").css("box-shadow","1px 1px 2px 2px #d1d1d7");
	    },
	    function()
	    {
		$("#comentario").css("box-shadow","1px 1px 1px 1px #d1d1d7");
	    })
	$("#coment").click(function(){
		$(this).css("border","1px solid blue")
	})
	$(document).ready(function(){
    $("#coment").bind("input keyup paste", function (){
    var maximo = 250;
    var disponivel = maximo - $(this).val().length;
    if(disponivel < 0) {
    var texto = $(this).val().substr(0, maximo); 
    $(this).val(texto);
    disponivel = 0;
    }
    $("#num2").text(disponivel);
    });
    });
</script>
</body>
</html>