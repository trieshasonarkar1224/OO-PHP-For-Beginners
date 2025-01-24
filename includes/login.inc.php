<?php

if (isset($_POST['submit'])) {

     //Obteniendo los datos
     $uid = $_POST['uid'];
     $pwd = $_POST['pwd'];
     

     //Instanciando la clase SingupContr
     include "../Classes/dbh.classes.php";
     include "../Classes/login.classes.php";
     include "../Classes/login-contr.classes.php";


     $signup = new loginContr($uid, $pwd);


     //Running error handlers and user signup
     $signup->loginUser();

     //Volviendo a la pagina principal  
     header("Location: ../index.php?error=none");
}
