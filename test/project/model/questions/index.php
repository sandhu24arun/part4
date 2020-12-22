<?php
session_start();
require('../model/database.php');
require('../model/questions_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'logout_user';
    }
}

if ($action == 'logout_user') {
    echo "WE IN THIS BITCH";
    session_destroy();
    header( "refresh:0; url=../index.php" );

} else if ($action == 'add_question') {
    $userEmail = $_SESSION['email'];
    $userId = $_SESSION['id'];
    $questionsName = filter_input(INPUT_POST, "questionsName");
    $mainTextBox = filter_input(INPUT_POST, "mainTextBox");
    $secondTextBox = filter_input(INPUT_POST, 'secondTextBox');
    $date = date("Y-m-d H:i:s");

    $bool = addQuestion($userEmail, $userId, $date,
        $questionsName, $mainTextBox, $secondTextBox, 0);
    var_dump($bool);
    if($bool == true){
        header( "refresh:0; url=allQuestions.php" );
    }

} else if ($action == 'delete_question') {

    $userEmail = $_SESSION['email'];
    $userId = $_SESSION['id'];
    $title = filter_input(INPUT_POST, "title");
    $body = filter_input(INPUT_POST, "body");
    $skills = filter_input(INPUT_POST, 'skills');
    $score = filter_input(INPUT_POST, 'score');
    echo $userEmail . $userId . $title . $body;
    if(deleteQuestion($userEmail, $userId, $title, $body) == true){

        header( "refresh:0; url=allQuestions.php" );
    }


} else if ($action == 'update_question') {

    $userEmail = $_SESSION['email'];
    $userId = $_SESSION['id'];
    $title = filter_input(INPUT_POST, "title");
    $body = filter_input(INPUT_POST, "body");
    $skills = filter_input(INPUT_POST, 'skills');
    $score = filter_input(INPUT_POST, 'score');
    echo $userEmail . $userId . $title . $body;
    //echo "update the bitch";
    if(updateQuestion($userEmail, $userId, $title, $body, $skills, $score) == true){

        header( "refresh:0; url=allQuestions.php" );
    }



} else if($action == 'go_to_all_questions'){

    header( "refresh:0; url=../view/AllTheDamnQuestions.php" );
} else if($action == 'up_vote'){

    $title = filter_input(INPUT_POST, "title");
    $body = filter_input(INPUT_POST, "body");
    $skills = filter_input(INPUT_POST, 'skills');
    $score = filter_input(INPUT_POST, 'score');

    if(upvote($title, $body, $skills) == true){
        header( "refresh:0; url=../view/AllTheDamnQuestions.php" );
    }


}

?>
<?php include '../view/header.php'; ?>