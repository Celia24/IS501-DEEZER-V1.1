$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();


$("#btnmas").hover(
	                 function()
	                 {
	                 	$("#btnmas").css("backgroundColor","#E8E8EC");
	                 	$("#btnmas").css("cursor","pointer");
	                 	$("#btnmas").css("border-bottom","2px solid #dedee3");
	                 },
	                 function()
	                 {
                        $("#btnmas").css("backgroundColor","#efeff2");
                        $("#btnmas").css("cursor","pointer");
                        $("#btnmas").css("border-bottom","none");
	                 }
	              )

$(".can").hover(
                 	function()
                 	{
                 		$(this).addClass("hova");
                 		$(this).find(".ub").show();
                 		$(this).find(".oculto").css("visibility","visible");
	                },
                 	function()
                 	{
                 		$(this).removeClass("hova");
                 		$(this).find(".ub").hide();  
                 		$(this).find(".oculto").css("visibility","hidden");        		
	                }
	            )

$("#btnmas_artist").hover(
	                 function()
	                 {
	                 	$("#btnmas_artist").css("backgroundColor","#E8E8EC");
	                 	$("#btnmas_artist").css("cursor","pointer");
	                 	$("#btnmas_artist").css("border-bottom","2px solid #dedee3");
	                 },
	                 function()
	                 {
                        $("#btnmas_artist").css("backgroundColor","#efeff2");
                        $("#btnmas_artist").css("cursor","pointer");
                        $("#btnmas_artist").css("border-bottom","none");
	                 }
	              )

$(".cann").hover(
                 	function()
                 	{
                 		$(this).addClass("hova");
                 		$(this).find(".ub1").show();
                 		$(this).find(".oculto").css("visibility","visible");
	                },
                 	function()
                 	{
                 		$(this).removeClass("hova");
                 		$(this).find(".ub1").hide();
                 		$(this).find(".oculto").css("visibility","hidden");          		
	                }
	            )


$("#btnficha").hover(
	                 function()
	                 {
	                 	$("#btnficha").css("backgroundColor","#E8E8EC");
	                 	$("#btnficha").css("cursor","pointer");
	                 	$("#btnficha").css("border-bottom","2px solid #dedee3");
	                 },
	                 function()
	                 {
                        $("#btnficha").css("backgroundColor","#efeff2");
                        $("#btnficha").css("cursor","pointer");
                        $("#btnficha").css("border-bottom","none");
	                 }
	              )

$(".cont1").hover(
                 	function()
                 	{
                 		$(this).addClass("hov");
	                },
                 	function()
                 	{
                 		$(this).removeClass("hov");          		
	                }
	            )

$(".ub1").hover(
                 	function()
                 	{
                 		$(this).addClass("hov");
	                },
                 	function()
                 	{
                 		$(this).removeClass("hov");          		
	                }
	            )

$(".cont").hover(
                 	function()
                 	{
                 		$(this).addClass("hov");
	                },
                 	function()
                 	{
                 		$(this).removeClass("hov");          		
	                }
	            )

$(".ub").hover(
                 	function()
                 	{
                 		$(this).addClass("hov");
	                },
                 	function()
                 	{
                 		$(this).removeClass("hov");          		
	                }
	            )

$(".contentsimi").hover(
                 	function()
                 	{
                 		$(this).find(".opcion").css({"visibility":"visible"});
	                },
                 	function()
                 	{
                 		$(this).find(".opcion").css("visibility","hidden");        		
	                }
	            )

$(".content1").hover(
                 	function()
                 	{
                 		$(this).find(".opcion1").css({"visibility":"visible"});
	                },
                 	function()
                 	{
                 		$(this).find(".opcion1").css("visibility","hidden");        		
	                }
	            )


$("#ultimolanzamiento").hover(
                    function()
                    {
                        $(this).addClass("visible");
                        $(this).find("#menudes").css("visibility","visible");
                        $(this).find("#favorito").css("visibility","visible");
                    },
                    function()
                    {
                        $(this).removeClass("visible");
                         $(this).find("#menudes").css("visibility","hidden");
                        $(this).find("#favorito").css("visibility","hidden");             
                    }
                )

$(".art").hover(
                    function()
                    {
                        $(this).addClass("visible");
                        $(this).find(".opt").css("visibility","visible")
                    },
                    function()
                    {
                        $(this).removeClass("visible");
                         $(this).find(".opt").css("visibility","hidden")           
                    }
                )

});