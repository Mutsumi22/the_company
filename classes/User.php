<?php
include 'Database.php';
//  Inheritance, Inherit
class User extends Database
{


    public function register($firstname, $lastname, $username, $password)
    {
        // add security to the password
        // iamHandsome123 = #q231asdasd*&@!$1231
        $password = password_hash($password, PASSWORD_DEFAULT);
        // save the data to users table
        $sql = "INSERT INTO users (first_name,last_name,username,password) VALUES ('$firstname','$lastname','$username','$password')";
        if ($this->conn->query($sql)) {
            header('location:../views/login.php');
            exit;
        } else {
            die('Something went wrong! Please try again later!' . $this->conn->error);
        }
    }

    public function login($username, $password)
    {
        // command to find a user
        $sql = "SELECT * FROM users WHERE username = '$username'";
        // executing the command
        if ($result = $this->conn->query($sql)) {
            // found
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    session_start();

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['full_name'] = $user['first_name'] . ' ' . $user['last_name'];
                    header('location:../views/dashboard.php');
                } else {
                    header('location:../views/login.php');
                    exit;
                }
            } else {
                // not found
                header('location:../views/login.php');
                exit;
            }
        } else {
            die('Something went wrong! Please try again later!' . $this->conn->error);
        }
    }

    public function getAllUsers(){
            $sql = "SELECT * FROM users";
            if($result = $this->conn->query($sql)){
                return $result;
            }else{
                die('Something went wrong! Please try again later!' . $this->conn->error);
            }
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die('Something went wrong! Please try again later!' . $this->conn->error);
        }
    }
    public function updateUser($id, $firstname, $lastname, $username){
        $sql = "UPDATE users SET first_name = '$firstname', last_name = '$lastname', username = '$username' WHERE id = $id";
        if($this->conn->query($sql)){
            header('location:../views/dashboard.php');
            exit;
        }else{
            die('Something went wrong! Please try again later!' . $this->conn->error);
        }

    }

    public function logout(){
        session_start();
        session_destroy();
        // ↓login ページに戻る
        header('location:../views/login.php'); 
        exit;
    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id = $id";

        if($this->conn->query($sql)){
            session_destroy();      //deleteの時は必ず　session_destroy 
            header('location:../views/login.php');
            exit;
        }else{
            die('Something went wrong! Please try again later!' . $this->conn->error);

        }
    }
}
