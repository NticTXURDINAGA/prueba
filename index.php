<?php session_start(); ?>

<?php
include './includes/lenguajes.php';

include './includes/conex.php';

include "./includes/newmail.php";

//IDIOMA
if (isset($_GET['leng']))  {$_SESSION['leng']=$_GET['leng'];} else {$_SESSION['leng']=1;}


if (isset($_GET['n'])) { ?>
                          <br>
                          <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <p><?php echo $leng[5][$_SESSION['leng']]; ?></p>
                           </div>
                  <?php      }



if (strlen($_POST['JILKcorreor'])>0)
{
  $consulta = 'SELECT Idni,Ipass from ikasle where Imail="'.$_POST['JILKcorreor'].'"';
  //echo $consulta;
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE COMPROBACION DE ALUMNO");
  // echo "PROBANDO ",$consulta;  //COMPROBACIONES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
  while ($columna = mysqli_fetch_array( $resultado )) { $Idni=$columna['Idni'];$Ipass=$columna['Ipass'];}

  if ($Idni>0){

    $destinos[]=$_POST['JILKcorreor'];
    //$destinos[]='ntic@fptxurdinaga.com';
    $Asunto='RECORDATORIO CONTRASEÑA. JILK (CIFP TXURDINAGA LHII)';
//    $Cuerpo='<h1>Hola Usuario del JILK.</h1><p>Tu CLAVE es '.$Ipass.'</p><p>Un saludo.</p>';
    $Cuerpo='<h3>Hola alumno del CIFP TXURDINAGA LHII</h3>
              <h4>Nos ponemos en contacto contigo desde el CIFP TXURDINAGA LHII para informarte de tu clave de acceso al <b>JILK</b></h4>

              <h2>Datos de Acceso</h2>
              <h3><a href=http://jilk.fptxurdinaga.net target=_blank > JILK.fpTXurdinaga.net </a></h3>
              <p><b>Usuario:</b> tu correo electronico, posteriormente puedes cambiarlo.</p>
              <p><b>Contraseña: </b>'.$Ipass.'</p>
              <br>
              <br>
              <h3>Muchas gracias por tu colaboración y un saludo.</h3>
              ';
    nuevomail($Asunto,$destinos,$Cuerpo);


   }
else {
  if (!isset($_GET['n'])) {
  ?>
  <br>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          <p><?php echo $leng[5][$_SESSION['leng']]; ?></p>
   </div>
  <?php
                    }
}



}


if (strlen($_POST['JILKcorreo'])>0)
{
  if (($_POST['JILKcorreo']=='admin@fptxurdinaga.com') AND ($_POST['JILKdni']=='admin'))
  {
      $_SESSION['JILKquien']='yes';
      header('Location: ./admin/index.php');
  }
  else
  {
      $consulta = 'SELECT Idni from ikasle where Imail="'.$_POST['JILKcorreo'].'" AND Ipass="'.strtoupper($_POST['JILKdni']).'"';
      //echo $consulta;
      $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos DE COMPROBACION DE ALUMNO");
      // echo "PROBANDO ",$consulta;  //COMPROBACIONES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
      while ($columna = mysqli_fetch_array( $resultado )) { $Idni=$columna['Idni'];}

      // iniciar session 1 vez
      if ($Idni>0){  $_SESSION['Idni'] = $Idni;  }
      header('Location: ./ikasle/index.php');
  }

}
?>

  <!DOCTYPE html>
  <html lang="es">
  <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>JILK - CIFP TXURDINAGA LHII  </title>
     <!-- Bootstrap -->
     <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="./css/estilos.css" media="screen" />

  </head>

  <body>
      <!-- conexion BD -->
      <div class="container" style="margin-top:40px">


    		<div class="row">
      			<div class="col-sm-6 col-md-4 col-md-offset-4">
      				<div class="panel panel-default">
      					<div class="panel-heading">
      						<strong>JILK     </strong><a href="index.php?leng=1" > ES</a> | <a href="index.php?leng=2" >EU </a> | <a href="index.php?leng=3" >IN </a>
      					</div>
      					<div class="panel-body">
      						<form role="form" action="" method="POST">
      							<fieldset>
      								<div class="row">
      									<div class="center-block">
      								<!--		<img class="profile-img"
      											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt=""> -->
                            <img class="profile-img" src="./imagenes/logoTX.png" alt="">
                        <!--    <div class="centrados"><a href="index.php?leng=1" > ES</a> | <a href="index.php?leng=2" >EU </a></div> -->
      									</div>
      								</div>
      								<div class="row">
      									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
      										<div class="form-group">
      											<div class="input-group">
      												<span class="input-group-addon">
      													<i class="glyphicon glyphicon-user"></i>
      												</span>
      												<input class="form-control"   name="JILKcorreo" type="email" autofocus placeholder=<?php echo '"'.$leng[1][$_SESSION['leng']].'"'; ?>>
      											</div>
      										</div>
      										<div class="form-group">
      											<div class="input-group">
      												<span class="input-group-addon">
      													<i class="glyphicon glyphicon-lock"></i>
      												</span>
      												<input class="form-control" placeholder=<?php echo '"'.$leng[2][$_SESSION['leng']].'"'; ?> name="JILKdni" type="password" value="">
      											</div>
      										</div>
      										<div class="form-group">
      											<input type="submit" class="btn btn-lg btn-primary btn-block" value=<?php echo '"'.$leng[3][$_SESSION['leng']].'"'; ?>>
      										</div>
      									</div>
      								</div>
      							</fieldset>
      						</form>
      					</div>

      <div class="panel-footer ">

                  <a href="#" data-toggle="modal" data-target="#myModalcs"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> <?php echo $leng[4][$_SESSION['leng']]; ?></a></li>



                <!-- Modal -->
                           <form role="form" action="#" method="POST">
                                          <div class="modal fade" id="myModalcs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title" id="myModalLabel"><?php echo $leng[6][$_SESSION['leng']]; ?></h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                      </span>
                                                      <input class="form-control" placeholder=<?php echo '"'.$leng[1][$_SESSION['leng']].'"'; ?> name="JILKcorreor" type="email" autofocus>
                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                  <button  class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <?php echo $leng[8][$_SESSION['leng']]; ?> </button>
                                                  <button  type=submit class="btn btn-default" ><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> <?php echo $leng[7][$_SESSION['leng']]; ?> </button>


                                                </div>
                                              </div>
                                            </div>
                                          </div>
                          </form>

      					</div>
                      </div>
      			</div>
      		</div>
      	</div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<?php // mysqli_close( $conexion ); ?>
