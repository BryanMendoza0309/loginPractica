<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Registro</title>

    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    
    
</head>
<body>
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
 <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
    
  <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form method="POST" action="loginRegister.php" class="aa-login-form">
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" name="usuario" id="usaurio_id" placeholder="Username or email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="contraseña" id="contraseña_id" placeholder="Password">
                    <button id="ingresar_id" type="submit" name="btn_ingresar" class="aa-browse-btn">Login</button>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form method="POST" action="loginRegister.php" class="aa-login-form">
                    <label for="">Nickname<span>*</span></label>
                    <input type="text" name="reg_nickname" id="reg_nickname_id" placeholder="Nickname">
                    <label for="">Username or Email address<span>*</span></label>
                    <input type="text" name="reg_usuario" id="reg_usaurio_id" placeholder="Username or email">
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="reg_password" id="reg_password_id" placeholder="Password">
                    <button type="submit" name="btn_registrar" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>

 <?php
	if(isset($_POST['btn_ingresar'])){
    include("coneccionBaseDatos.php");
	$resultados = mysqli_query($mysqli,"SELECT * FROM $tabla_db"); 
	$cont=0;
	$user = $_POST['usuario'];
  $contras = $_POST['contraseña'];  
	while($consultados = mysqli_fetch_array($resultados)){
		if($consultados["usuario"] == $user && $contras == $consultados["clave"]){
      $cont = 1;
			session_start();
			ob_start();
			$_SESSION['usuario_U']= $consultados["usuario"];
			$_SESSION['Nombre_U']= $consultados["Nombre"];
      $_SESSION['clave_U']= $consultados["clave"];
      
			header("Location:Bienvenida.php");	
		}
	} 
	if($cont == 0){
		?>
		<center><h1>DATOS INCORRECTOS</h1></center>
		<?php
	}
	mysqli_close($mysqli);
}

if(isset($_POST['btn_registrar'])){
    include("coneccionBaseDatos.php");
    $nickname = $_POST['reg_nickname'];
    $userRegis = $_POST['reg_usuario'];
    $passwordRegis = $_POST['reg_password'];
    if($nickname != "" && $userRegis != "" && $passwordRegis != ""){
    $resultados = mysqli_query($mysqli,"SELECT * FROM $tabla_db"); 
    $cont=0;
    $cont2=0;
	while($consultados = mysqli_fetch_array($resultados)){
        $cont2 = 1;
		if(($userRegis != $consultados["usuario"] && $nickname != $consultados["Nombre"]) ){
            $cont = 1;
            $mysqli->query("INSERT INTO $tabla_db (Nombre,usuario,clave) values ('$nickname','$userRegis','$passwordRegis')");
		}
    }
    if($cont2 == 0){
        $cont = 1;
        $mysqli->query("INSERT INTO $tabla_db (Nombre,usuario,clave) values ('$nickname','$userRegis','$passwordRegis')");
    }
	if($cont == 0){
		?>
		<center><h1>DATOS EXCISTENTE</h1></center>
		<?php
    }else{
        ?>
		<center><h1>DATOS REGISTRADOS</h1></center>
		<?php
    }
}else{
    ?>
		<center><h1>CAMPOS VACIOS</h1></center>
		<?php
}
	mysqli_close($mysqli);
}

?>






    <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 
 
</body>
</html>