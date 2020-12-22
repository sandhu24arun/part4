<?php


class QuestionObject
{
    private $ownerEmail;
    private $ownerId;
    private $createdDate;
    private $title;
    private $body;
    private $skills;
    private $score;
    private $allQuestions;

    /**
     * Questions constructor.
     * @param $ownerEmail
     * @param $ownerId
     * @param $createdDate
     * @param $title
     * @param $body
     * @param $skills
     * @param $score
     */
    public function __construct($arr)
    {

        if(gettype($arr[0]) == "array"){
            //var_dump(($arr));
            $this->allQuestions = $this->listOfQuestions($arr);
        }
        else{
            $this->ownerEmail = $arr['owneremail'];
            $this->ownerId = $arr['ownerid'];
            $this->createdDate = $arr['createddate'];
            $this->title = $arr['title'];
            $this->body = $arr['body'];
            $this->skills = $arr['skills'];
            $this->score = $arr['score'];
        }

    }

    /**
     * @return mixed
     */
    public function getOwnerEmail()
    {
        return $this->ownerEmail;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }
    public function getAllAnswersInaList(){

        return $this->allQuestions;
    }
    private function listOfQuestions($arrofArrs){

        $objects = array();
        foreach ($arrofArrs as $arr){
//            var_dump($arr['owneremail']);
//            var_dump($arr['ownerid']);
//            var_dump($arr['createddate']);
//            var_dump($arr['title']);
//            var_dump($arr['body']);
//            var_dump($arr['skills']);
//            var_dump($arr['score']);

           array_push($objects, new QuestionObject($arr));
        }
        return $objects;
    }


}