<?php
function cortar($text){
	;
	if ((strlen($text)>30)) {
		echo substr($text, 0, 30)."..."; 
	}else{
		echo $text;
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Albumes</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/perfil.css">
	<style type="text/css">
		body{
			background-color: #f8f8f9;
			overflow-x: hidden;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 x">
				
				<div class="linea"></div>
				<div class="divider-text">Recomendado hoy para ti.</div>
				<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 space">

					<div class="tarjetas">
						<div class="informacion-a">
							<span class="shadow">ALBUM</span>
							<span class="andlisten">Y si escuchas:</span>
							<table class="adjus">
								<tr>
									<td>
										<span class="name-play-a">kfdkfkdfkdf</span>
									</td>
									<tr>
										<td>
											<span class="tipop">de <span class="tipop2-a">artistasdkdkskdkskd</span></span>
										</td>
									</tr>
								</tr>
							</table>
							<div class="otherdetails">
								<img src="img/goku.jpg" width="80" height="100" class="image-a">
								<span class="reinv discos">Discografía (58)</span>  

								<span class="reinv art-same">Artistas similares</span> 
								<span class="art-alb discos-content"><span class="point">Energía</span>, <span class="point">La Familia B Sides</span></span> 
								<span class="art-alb art-content"><span class="point">Zion & Lennox</span>, <span class="point">Dragon & Caballero</span>, <span class="point">J Balvin</span></span>
								<div class="linea22"></div>
							</div>
						</div>
						<div class="col-md-3 dash2-a">
							<div class="change-a">
								<div class="fotos-a" >
									<img src="img/goku.jpg" class="perf-a">
								</div>
							</div>
							<div class="col-xs-3 circulo play-a"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
							<div class="ubicar-a">
								<div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #007feb" aria-hidden="true"></span></div>
								<div class="col-xs-3 circulo tot" data-trigger="focus"  data-placement="auto top"  data-toggle="popover"   data-html="true" data-content="
								<table id='new2'>
									<tr>
										<a href='javascript:;'><td><span class='glyphicon glyphicon-option-horizontal'  aria-hidden='true'><span class='inform'>Escuchar a continuacion</span></td><a/>
										</tr> 
										<tr>
											<a href='javascript:;'><td><span class='glyphicon glyphicon-list-alt'  aria-hidden='true'><span class='inform'>Agregar a la cola</span></td><a/>
											</tr>   
											<tr>
												<a href='javascript:;'><td><span class='glyphicon glyphicon-share'  aria-hidden='true'><span class='inform'>Compartir</span></td><a/>
												</tr> 
												<tr>
													<a href='javascript:;'><td><span class='glyphicon glyphicon-remove'  aria-hidden='true'><span class='inform'>Eliminar de Mi Musica</span></td><a/>
													</tr> 
													<tr>
														<a href='javascript:;'><td><span class='inform'>Reportar un problema</span></td><a/>
														</tr> 
													</table>
													"><span class="glyphicon glyphicon-option-horizontal app" style="color: #fff" aria-hidden="true"></span></div>
												</div>
											</div>
											<div class="footer">
												<span class="cursor alb-h"><span class="glyphicon glyphicon-heart stylo" aria-hidden="true"></span><span>Añadir a Mi música</span></span>
												<span class="cursor alb-s"><span class="glyphicon glyphicon-share stylo" aria-hidden="true"></span><span>Compartir</span></span>
												<span class="cursor alb-c"><span class="glyphicon glyphicon-comment stylo" aria-hidden="true"></span><span>Comentar</span></span>
											</div>
											<div class="comments">
												<img src="img/perfil.jpg" class="comm-alb" width="30" height="30">
												<textarea class="form-control ajustes comentario"  maxlength="250">
												</textarea>
												<span class="reinv2">COMPARTIR EN:</span>
												<span class="alb-bot face-alb"><img src="img/facebook.svg" width="14" height="14"></span>
												<span class="alb-bot twi-alb"><img src="img/twitter.svg" width="14" height="14"></span>
												<span class="faltan">quedan <span class="num">250</span> caracteres</span>
												<span class="publicar">Publicar</span>
												<div class="comentarios">
													<?php
													for ($i=0; $i < 4; $i++) { 
														echo
														'<img src="img/perfil.jpg" class="user-pic" width="30" height="30">
														<div class="fondo">
															<span class="user-alb">Juan Soler </span><span class="time-ago"> - Hace 4 horas</span><br>
															<span class="message" >dkskksskskkss</span>
														</div>';
													}
													?>
												</div>
											</div>
										</div>



										<div class="tarjetas-p">
                                            <div class="informacion-p">
												<span class="shadow">PLAYLIST</span>
												<table class="adjus-p">
													<tr>
														<td>
															<span class="name-play-a">kfdkfkdfkdf</span>
														</td>
														<tr>
															<td>
																<span class="tipop">de <span class="tipop2-a">artistasdkdkskdkskd</span></span>
															</td>
														</tr>
													</tr>
												</table>
												<div class="otherdetails">
													<span class="reinv art-p">Con los artistas:</span>
													<div class="linea22-p"></div>
													<span class="art-alb art-content-p"><span class="point">Zion & Lennox</span>, <span class="point">Dragon & Caballero</span>, <span class="point">J Balvin</span></span>
													</div>
											</div>
											<div class="col-md-3 dash2-p">
												<div class="change-p">
													<div class="fotos-p" >
														<img src="img/goku.jpg" class="perf-p">

													</div>
												</div>
												<div class="col-xs-3 circulo play-p"><span class="glyphicon glyphicon-play app" style="color: #fff" aria-hidden="true"></span></div>
												<div class="ubicar-p">

													<div class="col-xs-3 circulo"><span class="glyphicon glyphicon-heart app" style="color: #007feb" aria-hidden="true"></span></div>
													<div class="col-xs-3 circulo tot" data-trigger="focus"  data-placement="st top"  data-toggle="popover"   data-html="true" data-content="
													<table id='new2'>
														<tr>
															<a href='javascript:;'><td><span class='glyphicon glyphicon-option-horizontal'  aria-hidden='true'><span class='inform'>Escuchar a continuacion</span></td><a/>
															</tr> 
															<tr>
																<a href='javascript:;'><td><span class='glyphicon glyphicon-list-alt'  aria-hidden='true'><span class='inform'>Agregar a la cola</span></td><a/>
																</tr>   
																<tr>
																	<a href='javascript:;'><td><span class='glyphicon glyphicon-share'  aria-hidden='true'><span class='inform'>Compartir</span></td><a/>
																	</tr> 
																	<tr>
																		<a href='javascript:;'><td><span class='glyphicon glyphicon-remove'  aria-hidden='true'><span class='inform'>Eliminar de Mi Musica</span></td><a/>
																		</tr> 
																		<tr>
																			<a href='javascript:;'><td><span class='inform'>Reportar un problema</span></td><a/>
																			</tr> 
																		</table>
																		"><span class="glyphicon glyphicon-option-horizontal app" style="color: #fff" aria-hidden="true"></span></div>
																	</div>
																</div>
																<div class="footer-p">
																	<span class="cursor alb-hp"><span class="glyphicon glyphicon-heart stylo" aria-hidden="true"></span><span>Añadir a Mi música</span></span>
																	<span class="cursor alb-sp"><span class="glyphicon glyphicon-share stylo" aria-hidden="true"></span><span>Compartir</span></span>
																	<span class="cursor alb-cp"><span class="glyphicon glyphicon-comment stylo" aria-hidden="true"></span><span>Comentar</span></span>
																</div>
																<div class="comments">
																	<img src="img/perfil.jpg" class="comm-alb" width="30" height="30">
																	<textarea class="form-control ajustes comentario"  maxlength="250">
																	</textarea>
																	<span class="reinv2">COMPARTIR EN:</span>
																	<span class="alb-bot face-alb"><img src="img/facebook.svg" width="14" height="14"></span>
																	<span class="alb-bot twi-alb"><img src="img/twitter.svg" width="14" height="14"></span>
																	<span class="faltan">quedan <span class="num">250</span> caracteres</span>
																	<span class="publicar">Publicar</span>
																	<div class="comentarios">
																		<?php
																		for ($i=0; $i < 4; $i++) { 
																			echo
																			'<img src="img/perfil.jpg" class="user-pic" width="30" height="30">
																			<div class="fondo">
																				<span class="user-alb">Juan Soler </span><span class="time-ago"> - Hace 4 horas</span><br>
																				<span class="message" >dkskksskskkss</span>
																			</div>';
																		}
																		?>
																	</div>
																</div>

															</div>




									</div>
								</div>
							</div>
						</div>



						<script type="text/javascript" src="js/jquery.min.js"></script>
						<script src="js/bootstrap.js"></script>
						<script src="js/perfil.js"></script>
						<script type="text/javascript">
							$(function () {
								$('[data-toggle="popover"]').popover();
							});

							$(document).ready(function(){

								$(".alb-c").click(function(){
									if ($(this).parent().siblings('div.comments').css("display")=="none") {
										$(this).parent().siblings('div.comments').show();
									}else{
										$(this).parent().siblings('div.comments').hide();
										$(this).parent().siblings('div.comments').children('textarea.comentario').val("");
										$(this).parent().siblings('div.comments').children('span.faltan').children('span.num').text("250");
									}
								});

								$(".alb-cp").click(function(){
									if ($(this).parent().siblings('div.comments').css("display")=="none") {
										$(this).parent().siblings('div.comments').show();
									}else{
										$(this).parent().siblings('div.comments').hide();
										$(this).parent().siblings('div.comments').children('textarea.comentario').val("");
										$(this).parent().siblings('div.comments').children('span.faltan').children('span.num').text("250");
									}
								});


								$(".tot").click(function(){
									$(this).popover('toggle');
								});



								$(".ubicar-a").hover(function(){

									$(".change-a").css("opacity","1");
									$(".ubicar-a").css({"visibility":"hidden","opacity":"0"});
									$(this).css({"visibility":"visible","opacity":"1"});
									$(this).siblings("div.change-a").css("opacity","0.8");
								},function(){
									$(".tot").popover('hide');
									$(this).css({"visibility":"visible","opacity":"1"});
									$(this).siblings("div.change-a").css("opacity","0.8");
								});

								$(".ubicar-p").hover(function(){

									$(".change-p").css("opacity","1");
									$(".ubicar-p").css({"visibility":"hidden","opacity":"0"});
									$(this).css({"visibility":"visible","opacity":"1"});
									$(this).siblings("div.change-p").css("opacity","0.8");
								},function(){
									$(".tot").popover('hide');
									$(this).css({"visibility":"visible","opacity":"1"});
									$(this).siblings("div.change-p").css("opacity","0.8");
								});


								$(".play-a").hover(function(){

									$(".change-a").css("opacity","0.8");
									$(".ubicar-a").css({"visibility":"visible","opacity":"1"});
								},function(){
									
								});


                                $(".play-p").hover(function(){

									$(".change-p").css("opacity","0.8");
									$(".ubicar-p").css({"visibility":"visible","opacity":"1"});
								},function(){
									
								});


								$(".change-a").hover(function(){

									$(".change-a").css("opacity","1");
									$(".ubicar-a").css({"visibility":"hidden","opacity":"0"});
									$(this).css("opacity","0.8");
									$(this).siblings("div.ubicar-a").css({"visibility":"visible","opacity":"1"});
								},function(){
									$(".tot").popover('hide');
									$(".change-a").css("opacity","1");
									$(".ubicar-a").css({"visibility":"hidden","opacity":"0"});
								});
                                     
                                $(".change-p").hover(function(){

									$(".change-p").css("opacity","1");
									$(".ubicar-p").css({"visibility":"hidden","opacity":"0"});
									$(this).css("opacity","0.8");
									$(this).siblings("div.ubicar-p").css({"visibility":"visible","opacity":"1"});
								},function(){
									$(".tot").popover('hide');
									$(".change-p").css("opacity","1");
									$(".ubicar-p").css({"visibility":"hidden","opacity":"0"});
								});
								
                                    

							});

							

							$('.comentario').bind('keydown keyup',function(){
								if ($('.comentario').val().length==12) {
									$('.comentario').text('');
								}
                               var valor=$(this).val().length;
								var rvalor=250-valor;
								$(this).siblings('span.faltan').children('span').text(rvalor);
								
							});
						</script>
					</body>
					</html>