<?php
session_start();
require('../model/database.php');
require('../model/accounts_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'go_back_home';
    }
}
/*
 * Default Error
 */
if ($action == 'go_back_home') {
    $error = "Missing or incorrect user. <a href='index.php'> GO BACK TO Login";
    include('../errors/error.php');
}
/*
 * Login a user
 */
else if ($action == 'login_user') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if($email == NULL || $password == NULL){

        $error = "Check username and password <a href='index.php'> GO BACK TO Login" ;
        include('../errors/error.php');
    }
    else{
            $userObject = loginCheck($email, $password);
            if($userObject->getEmail() == $email && $userObject->getPassword() == $password){
                $_SESSION['email'] = $userObject->getEmail();
                $_SESSION['id'] = $userObject->getId();
                $_SESSION['fname'] = $userObject->getFname();
                $_SESSION['lname'] = $userObject->getLname();
                header( "refresh:1; url=../questions/allQuestions.php" );
            }else{
                session_destroy();
                $error = "User Might not Exist! Register <a href='registration.php'> HERE";
                include('../errors/error.php');
                //header( "refresh:5; url=registration.php" );
            }
    }
}
/*
 *  Register a user
 */
else if($action == "register"){
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $date = filter_input(INPUT_POST, 'date');

    $userObject = loginCheck($email, $password);
    if($userObject->getEmail() == $email){
        $error = "Email in use Already\n <a href='registration.php'> GO BACK TO Register";
        include('../errors/error.php');
        //echo "<a href='registration.php'> GO BACK TO Register";
    }
    else{

        $bool = registerUser($email, $fname, $lname, $date, $password);
        if($bool == true){
            header("refresh:1; url=../questions/allQuestions.php");
        } else{
            $error = "Something Went Wrong Sorry <a href='registration.php'> GO BACK TO Register";
        }
    }

}
?>