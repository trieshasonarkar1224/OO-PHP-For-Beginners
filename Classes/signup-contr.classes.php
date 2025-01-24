<?php
//Change something inside the database


class SignupContr extends Signup
{
    //properties inside the class
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    //Data from the user : ($uid, $pwd, $pwdRepeat, $email)
    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        //this->properties = User_data
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }
    

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            // echo "Invalid username!";
            header("location: ../index.php?error-username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            // echo "Invalid email!";
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            // echo "Password dont match!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            // echo "username or email taken!";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }
    //Basic error handling to throw error messages
    private function emptyInput()
    {

        if (empty($this->uid) || empty($this->pwd)  || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        
        return $result;
    }

    private function invalidUid()
    {


        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) //checking if only these characters exist inside the username
        {                                                  //!preg_match("/^[a-zA-Z0-9]*$/", $this->uid) : "Si el "username" no cumple con el patrón"
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


    // Verifica si el correo no tiene un formato válido
    private function invalidEmail()
    {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) //filter_var : Retorna true si el correo tiene un formato correcto
        {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {


        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck()
    {


        if (!$this->checkuser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
