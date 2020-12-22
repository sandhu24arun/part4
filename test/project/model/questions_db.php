<?php

require('../model/QuestionObject.php');

    function getAllAnswers($email, $id){
        global $db;
        $stmt = $db->prepare('SELECT * FROM ass99.questions where owneremail= :email and ownerid = :id ;');
        $stmt->execute(array(':email' => $email, ':id' => $id));
        $result = $stmt->fetchAll();
        return new QuestionObject($result);
    }
    function getAnswersRegardlessofUser(){
        global $db;
        $stmt = $db->prepare('SELECT * FROM ass99.questions;');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return new QuestionObject($result);

    }
    function addQuestion($email, $id, $createdDate, $title, $body, $skills, $score){
        global $db;
        $stmt = $db->prepare('insert into ass99.questions(owneremail, ownerid, createddate, title, body, skills, score)
                                value (:email, :id, :createdDate, :title, :body, :skills, :score);');

        $results = $stmt->execute(array(':email' => $email,
            ':id' => $id,
            ':createdDate' => $createdDate,
            ':title' =>  $title,
            ':body' => $body,
            ':skills' =>  $skills,
            ':score' => $score));

        return $results;
    }
    function updateQuestion($email, $id, $title , $body, $skills, $score){

        global $db;
        $stmt = $db->prepare('update ass99.questions
                                    set title = :title, body = :body, skills = :skills, score = :score
                                    where owneremail = :email AND ownerid = :id;');

        $results = $stmt->execute(
            array(':email' => $email,
                ':id' => $id,
                ':title' =>  $title,
                ':body' => $body,
                ':skills' => $skills,
                ':score' =>$score));

        return $results;
    }
    function deleteQuestion($email, $id, $title , $body){
        global $db;
        $stmt = $db->prepare('delete from ass99.questions
                                    where owneremail = :email AND ownerid = :id AND
                                    title = :title AND body = :body;');

        $results = $stmt->execute(
            array(':email' => $email,
            ':id' => $id,
            ':title' =>  $title,
            ':body' => $body));

        return $results;
    }

    function upvote($title, $body, $skills){

        global $db;
        $stmt = $db->prepare('update ass99.questions
                                    set score = score+1
                                    where title = :title AND body = :body AND skills = :skills;');

        $results = $stmt->execute(
            array(':title' =>  $title,
                ':body' => $body,
                ':skills' => $skills));

        return $results;
    }

?>


