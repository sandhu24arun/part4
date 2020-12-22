<?php include '../view/header.php'; ?>
<?php
session_start();
require('../model/database.php');
require('../model/accounts_db.php');
require('../model/questions_db.php');

print "<body>";
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){

  $email = $_SESSION['email'];
  $id = $_SESSION['id'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $results = getAllAnswers($email, $id)->getAllAnswersInaList();

  print "<h3> Hello {$fname} {$lname}! <br><br>";
  foreach($results as $value){
    print "<form action='index.php', method='post'>
           <input type='hidden' name='action' value='delete_question'>
           <input type='hidden' name='action' value='update_question'>
           <label for='title'>Title: 
                <input type='text' name='title' value='{$value->getTitle()}'/>
           </label><br>
           <label for='body'>Body:
                <input type='text' name='body' value='{$value->getBody()}'/>
           </label><br>
           
           <label for='skills'>Skills: 
                <input type='text' name='skills' value='{$value->getSkills()}'/>
           </label><br>
           <label for='score'>Score: 
                <input type='text' name='score' value='{$value->getScore()}'/>
           </label><br>
           
           <input type='submit' value='delete' /> 
           <input type='submit' value='update' /> 
           </form><br> ";
  }

  //print "</table><br><br>";

  print "<style>
             
            main {display: flex;}
            main > * {border: 1px solid;}
            body {background: #b6e3e2; text-align: center;}
            h3 {  border:  1px solid;
                  padding: 10px;
                  min-width: 200px;
                  background: #8fb5b4;
                  box-sizing: border-box;
                  text-align: center;
            }
            table {border-collapse: collapse; font-family: helvetica}
            td, th {border:  1px solid;
                  padding: 10px;
                  min-width: 200px;
                  background: #8fb5b4;
                  box-sizing: border-box;
                  text-align: left;
            }
            .table-container {
              position: relative;
              max-height:  300px;
              width: 500px;
              overflow: scroll;
            }
            .center {
              margin-left: auto;
              margin-right: auto;
            }
            
            /* MAKE LEFT COLUMN FIXEZ */
            tr > :first-child {
              position: -webkit-sticky;
              position: sticky; 
              background: hsl(180, 50%, 70%);
              left: 0; 
            }

        </style>";

  print "<form action='index.php', method='post'>
      <input type='hidden' name='action' value='add_question'>
      <label for='questionname'>Question Name</label><br>
      <input type='text' name='questionsName' minlength='3' required /><br>
      <label for='questionbody'>Question Body:</label><br>
      <textarea rows='4' name='mainTextBox' cols='50' maxlength='500' required>Enter text here...</textarea><br>
      <textarea rows='4' name='secondTextBox' cols='50' maxlength='50' required> Multiple skills separate by comma...</textarea><br>
      <input type='submit' value='Add a Question' /><br>
      </form><br>";
  
    print "<form action='index.php' method='post'> 
    <input type='hidden' name='action' value='logout_user'>
    <input type='submit' value='Logout!!!!!' /><br>
         </form>";

  print "<form action='index.php' method='post'> 
    <input type='hidden' name='action' value='go_to_all_questions'>
    <input type='submit' value='Get All Questions!' /><br>
         </form>";
  
} else{
  echo "please login!";
  session_destroy();
  header( "refresh:1; url=index.php" );
 // header("url=index.html");
  
}

print "</body>";
?>
<?php include '../view/header.php'; ?>






