var floatBar= new panel("#float-bar");
var listaBar= new panel("#list-bar");
function panel(id){
	this.panel=$(id);
	this.visible=false;
	this.hidePanel = function() {
		
		this.panel.animate({
			"margin-left":-500,
			"display":"none"
		},300);
		$("#float-bar-overlay").css({"display": "none"});
		this.visible=false;
	}
	this.showPanel= function(){
		
		var a = $("#sidebar").width();
		this.panel.css({
			"display":"block"
		});
		this.panel.animate({
			"margin-left":(a+30)
		},300);
		$("#float-bar-overlay").css({"display": "block"});
		this.visible=true;
	}
	this.toggle = function(){
		if (this.visible) {
			this.hidePanel();
		}else{
			this.showPanel();
		}
	}
}

function viewPlayList(){
	console.log(lista);
	// $("#list-bar").html("Hola")
	listaBar.toggle();
}