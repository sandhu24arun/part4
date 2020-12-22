<?php
function loginCheck($email, $password){
    global $db;
    //try{
        echo $email;
        echo $password;
        $stmt = $db->prepare('SELECT email, password FROM ass99.accounts where email= :email and password = :pass ;');
        $stmt->execute(array(':email' => $email, ':pass' => $password));
        $result = $stmt->fetch();
        //var_dump($result);
        //$stmt->closeCursor();
        return $result;
//        if($result['email'] == $email){
//            if($result['password'] == $password){
//                return true;
//            }
//        }
//        else{
//            return false;
//        }
//    } catch(PDOException $e){
//        print $e->getMessage();
//    }
}


    
    
?>