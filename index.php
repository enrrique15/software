<?php
 	session_start();
	if($_SESSION["logueado"] == TRUE) {
        $id_encargado=$_SESSION["id"];
        ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(function(){
        $("#contenido").load("proyecto.php?variable1=<?php echo $id_encargado ?>");
        $('a').click(function(){
        var _url = $(this).attr('href');
        $("#contenido").load(_url);
        return false;
    });
 
 
});
    </script>
</head>
<body class="bg-warning">

    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
        <img src="img/logo.svg" width="40" height="50" class="d-inline-block align-top" alt="">
        Control</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="proyecto.php?variable1=<?php echo $id_encargado ?>">Proyectos <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="nuevo_proyecto.php?variable1=<?php echo $id_encargado ?>">Crear Proyecto</a>
          
            <a class="nav-item nav-link" href="personal.php?variable1=<?php echo $id_encargado ?>">Personal</a>
            <a class="nav-item nav-link" href="reporte.php?variable1=<?php echo $id_encargado ?>">Reportes</a>
           <!-- <a class="nav-item nav-link" href="nosotros.php?variable1=<?php echo $id_encargado ?>">Nosotros</a>-->
            <form action="config/salir.php" method="post" style="margin-left:1000px;color: aliceblue;">
            <img src="img/usuario.png" alt="imagen de usuario" width="30">
              <?php
                require("config/conexion.php");
                $consulta = "SELECT * FROM encargado WHERE id_encargado=$id_encargado";
                if($resultado = $enlace->query($consulta)) {
                  while($row = $resultado->fetch_array()) {
                    
                    echo $row["nombre_encargado"];
                    echo " ".$row["apellido_encargado"]." ";
                  }
                  $resultado->close();
                }
        
              ?>

              <button type="submit" class="btn btn-danger" ><img src="img/salir.png" alt="imagen de salir" width="30"></button> 
            </form>
       
          </div>
        </div>
      </nav>
      <div id="contenido"></div>
      <footer class="fixed-bottom bg-dark text-white text-center">
      <p><b>Derechos Reservados: </b> Enrrique Arrazola Espinoza (2018)</p>
        <p><b>Correo: </b> enrriquearrazola@gmail.com</p>
      </footer>
</body>
</html>
<?php
} else {
    header("Location: login.php");
}
?>
