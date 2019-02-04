<!DOCTYPE html>
<html lang="es">
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/artsimi.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="fantastic/css/font-awesome.min.css">
</head>
<body>
<div id="contenedor">
  <div id="meu">
  <?php
    for ($i=1; $i <= 16 ; $i++) 
    {
    echo '<div id="artista" class="art">
             <div id="options" class="opt">
                  <div id="option"><span class="glyphicon glyphicon-play app"></span></div>
                  <div id="option"><span class="glyphicon glyphicon-heart app"></span></div>
             </div>
          </div>'; 

    echo '<tr>
         <td><a id="banda">Black Sabbath</a></td>
         <td><span id="fans">999,000</span></td>
         </tr>';
    }
  ?>
   </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/artsimi.js"></script>
</body>
</html>
