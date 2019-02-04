var lista; // LISTA REPRODUCCION
soundManager.setup({
	onready: function() {
		lista = new playList(); // LISTA DE REPRODUCCION CREADA ARGUMENTO VACIO
	},
	ontimeout: function() {
		// Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
	}
});	
function nextSound(){
	lista.next();
}
// OBJETO PLAYLIST CREADA EN SoundManager.onready
function playList(){
	this.isPlaying=false;
	// Definicion DE ARREGLO PLAYLIST (El id se puede obtener de una DataBase)
	// Donde esté guardado el URL del archivo, cover, informacion de artista, etc.
	// Elementos
	// {id:"photo",url:"path/to/song.mp3", cover: "path/to/img.jpg(png) , artist: John Doe, title: Some song"}
	this.arraySong = [
	//, + iteraciones // Agregar coverimage, artist, titulo
		{
			id:"photo",
			title: "Photograph",
			artist: "Ed Sheeran",
			url:"music/photo.mp3",
			cover: "img/cover/x.jpg",
		},
		{
			id:"rend",
			title: "My Lighthouse",
			artist: "Rend Collective",
			url:"music/rend.mp3",
			cover: "img/cover/art_of_celebration.jpg",
		}
	];
	this.i=0; // CONTADOR DE REPRODUCCION
	this.initSounds = function(){
		for (var i = 0; i < this.arraySong.length; i++) {
			soundManager.createSound({
				id: this.arraySong[i].id,
				url: this.arraySong[i].url,
			});
		}
	}
	// Devuelve Objeto Sound actual en reproduccion
	this.getCurrent=function(){
		return soundManager.getSoundById(this.arraySong[this.i].id);
	}
	// Reproducir la cancion actual
	this.play = function(){
		soundManager.pauseAll();
		var id = this.arraySong[this.i].id;
		// soundManager.getSoundById(id).play();
		soundManager.play(id, {
			// onfinish: lista.next
			whileplaying : function(){
				// Update position
			},
			onfinish: nextSound
		});
		// Cambiar icono
		document.getElementById("player-play").setAttribute("class","");
		document.getElementById("player-play").setAttribute("class","glyphicon glyphicon-pause");
	}
	// Pausar canción Actual
	this.pause=function(){
		soundManager.pauseAll();
		// Cambiar icono
		document.getElementById("player-play").setAttribute("class","");
		document.getElementById("player-play").setAttribute("class","glyphicon glyphicon-play");	
	}
	// Reproducir/Pausar Cancion Actual
	this.toogle=function(){
		if (this.isPlaying==true) {
			this.pause();
			this.isPlaying=false;
		}else{
			this.play();
			this.isPlaying=true;
		}
	}
	this.prev=function(){
		this.i--;
		if (this.i<this.arraySong.length && this.i>=0) {
			soundManager.stopAll();
			this.play();
			this.changeInfoSong();
		}else{
			this.i++;
		}
	}
	this.next=function(){
		this.i++;
		if (this.i<this.arraySong.length && this.i>=0) {
			soundManager.stopAll();
			this.play();
			this.changeInfoSong();
		}else{
			this.i--;
			this.pause();
		}
	}
	this.changeInfoSong = function(){
		var cancion = this.arraySong[this.i];
		// Cambiar titulo
		document.getElementById("player-title").innerHTML=cancion.title;
		// Cambiar artista
		document.getElementById("player-artist").innerHTML=cancion.artist;
		// Cmabiar cover
		var imgURL = cancion.cover;
		document.getElementById("player").style.backgroundImage="url("+imgURL+")";
	}
	this.stop = function(){
		soundManager.stopAll();
		// Cambiar icono
		document.getElementById("player-play").setAttribute("class","");
		document.getElementById("player-play").setAttribute("class","glyphicon glyphicon-play");	
	}
	this.clear = function(){
		this.arraySong =[];
	}
	// METODOS DE INICIO
	this.initSounds();
}