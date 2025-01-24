<?php
//database related stuff 
//run querys
// writing code inside the database 
class Signup extends Dbh
{

    protected function setUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }



    protected function checkuser($uid, $email)
    {

        //Here we are preparing the query to match the data from the user 

        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$stmt->execute(array($uid, $email))) { //If the expression is false that means the if block must be executed to throw an error message to the user and send it to the index  
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // We haven't check if we got any results back from the database 

        if ($stmt->rowCount() > 0) { //If we grabb anything there's at least one user in db 

            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}
