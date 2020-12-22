<?php


class UserObject
{
    private $email="";
    private $password="";
    private $id="";
    private $fname="";
    private $lname="";

    /**
     * UserObject constructor.
     * @param $result
     */
    public function __construct($result)
    {
        $this->password = $result['password'];
        $this->email = $result['email'];
        $this->id = $result['id'];
        $this->fname = $result['fname'];
        $this->lname = $result['lname'];
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}