<?php

if (isset($_POST['submit'])) {

     //Obteniendo los datos
     $uid = $_POST['uid'];
     $pwd = $_POST['pwd'];
     $pwdRepeat = $_POST['pwdrepeat'];
     $email = $_POST['email'];


     //Instanciando la clase SingupContr
     include "../Classes/dbh.classes.php";
     include "../Classes/signup.classes.php";
     include "../Classes/signup-contr.classes.php";


     $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);


     //Running error handlers and user signup
     $signup->signupUser();

     //Volviendo a la pagina principal 
     header("Location: ../index.php?error=none");
}
