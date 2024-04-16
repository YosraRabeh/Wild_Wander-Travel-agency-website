<?php
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__DIR__));
require 'config.php';

class blogC
{

    public function listblogs()
    {
        $sql = "SELECT * FROM blog";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteblog($ide)
    {
        $sql = "DELETE FROM blog WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addblog($blog)
{
    $sql = "INSERT INTO blog(title, user, date, contenu)
    VALUES (:title, :usn, STR_TO_DATE(:date, '%d/%m/%y'), :contenu)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'title' => $blog->gettitle(),
            'usn' => $blog->getuser(),
            'date' => $blog->getdate(),
            'contenu' => $blog->getcontenu()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showblog($id)
    {
        $sql = "SELECT * from blog where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateblog($blog, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE blog SET 
                title = :title,
                user = :user, 
                date = :date, 
                contenu = :contenu
            WHERE id = :idblog'
        );

        // Convert the date format from "dd/mm/yyyy" to "yyyy-mm-dd" for MySQL
        $dateFormatted = date_format(date_create_from_format('d/m/Y', $blog->getdate()), 'Y-m-d');

        $query->execute([
            'idblog' => $id,
            'title' => $blog->gettitle(),
            'user' => $blog->getuser(),
            'date' => $dateFormatted, // Use the formatted date
            'contenu' => $blog->getcontenu()
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error updating blog: " . $e->getMessage();
    }
}

    function getbytitle($title) {
        $sql = "SELECT * from blog where title = :title";
        $db = config::getConnexion();
        try {
          $query = $db->prepare($sql);
          $query->execute([
            ':title' => $title
          ]);
    
          $admin = $query->fetch();
          return $admin;
        } catch (Exception $e) {
          die('Error: '. $e->getMessage());
        }
      }

      function getbyid($id) {
        $sql = "SELECT * from blog where id = :id";
        $db = config::getConnexion();
        try {
          $query = $db->prepare($sql);
          $query->execute([
            ':id' => $id
          ]);
    
          $admin = $query->fetch();
          return $admin;
        } catch (Exception $e) {
          die('Error: '. $e->getMessage());
        }
      }
}
