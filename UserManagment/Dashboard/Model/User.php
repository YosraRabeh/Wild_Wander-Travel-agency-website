<?php
class User
{
    private $idUser=null ;
    private $username=null ;
    private $email=null ;
    private $password=null ;
    private $dob=null ;
    private $role=null ;
    
    function __construct($username,$email,$password,$dob,$role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->dob = $dob;
        $this->role = $role;
    }

    function getIDUser()
    {
        return $this->$idUser;
    }

    function getUsername()
    {
        return $this->username;
    }
    function setUsername(string $username)
    {
        $this->username = $username;
    }


    function getEmail()
    {
        return $this->email;
    }
    function setEmail(string $email)
    {
        $this->email = $email;
    }



    function getPassword()
    {
        return $this->password;
    }
    function setPassword(string $password)
    {
        $this->password = $password;
    }



    function getDate()
    {
        return $this->dob;
    }
    function setDate(date $dob)
    {
        $this->dob = $dob;
    }

    function getRole()
    {
        return $this->role;
    }
    function setRole(string $role)
    {
        $this->role = $role;
    }



}
?>