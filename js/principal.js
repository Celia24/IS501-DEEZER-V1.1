$(document).ready(function(){
   $('[data-toggle="popover"]').popover({html:true});

$(".playlt").hover(
                    function()
                    {
                        $(this).addClass("visible");
                        $(this).find(".option").css("visibility","visible")
                    },
                    function()
                    {
                        $(this).removeClass("visible");
                         $(this).find(".option").css("visibility","hidden")           
                    }
                )

$(".popl").hover(
                    function()
                    {
                        $(this).addClass("visible");
                        $(this).find(".option").css("visibility","visible")
                    },
                    function()
                    {
                        $(this).removeClass("visible");
                         $(this).find(".option").css("visibility","hidden")           
                    }
                )

$(".lanzamiet").hover(
                    function()
                    {
                        $(this).addClass("visible");
                        $(this).find(".option").css("visibility","visible")
                    },
                    function()
                    {
                        $(this).removeClass("visible");
                         $(this).find(".option").css("visibility","hidden")           
                    }
                )

$(".list").hover(
                    function()
                    {
                        $(this).addClass("visible");
                    },
                    function()
                    {
                        $(this).removeClass("visible");           
                    }
                )

$(".btnreproducir").hover(
                    function()
                    {
                        $(this).css("background-color","#32323D");
                        $(this).css("cursor","pointer");
                        $(this).find(".glyphicon-play").css("color","#fff");
                        $(this).find("#btn").css("color","#fff");
                    },
                    function()
                    {
                        $(this).css("background-color","#EFE2E9");
                        $(this).find(".glyphicon-play").css("color","black");
                        $(this).find("#btn").css("color","black");         
                    }
                )

});