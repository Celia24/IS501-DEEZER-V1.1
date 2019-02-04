
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

$(".playlt").hover(
                  function()
                  {
                    $(this).css("opacity","0.8");
                  },
                  function()
                  {
                    $(this).css("opacity","1");           
                  }
              )