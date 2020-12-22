<?php
require('../model/UserObject.php');
function loginCheck($email, $password){
        global $db;
        $stmt = $db->prepare('SELECT * FROM ass99.accounts where email= :email and password = :pass ;');
        $stmt->execute(array(':email' => $email, ':pass' => $password));
        $result = $stmt->fetch();
        return new UserObject($result);

}
function registerUser($email, $fname, $lname, $date, $password){
    global $db;
    $stmt = $db->prepare('insert into ass99.accounts(email, fname, lname, birthday, password)
                                value (:email, :fname, :lname, :dater, :password);');

    return $stmt->execute(array(':email' => $email,
                         ':fname' => $fname,
                         ':lname' => $lname,
                         ':dater' =>  $date,
                         ':password' => $password));
}



    
    
?>