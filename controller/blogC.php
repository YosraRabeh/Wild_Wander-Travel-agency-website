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
    VALUES (:title, :usn, STR_TO_DATE(:date, '%d/%m/%Y'), :contenu)";

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

class commentsC
{


    public function listcomments($idg)
    {
    $sql = "SELECT * FROM comments WHERE blog = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $idg);
    try {
        $req->execute(); // Execute the prepared statement
        $liste = $req->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as associative array
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
    }


    function deletecomments($ide)
    {
        $sql = "DELETE FROM comments WHERE id_comment = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute(); // Execute the prepared statement
            $liste = $req->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as associative array
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcomments($comments)
{
    $sql = "INSERT INTO comments(content,date, user,  blog)
    VALUES (:content, STR_TO_DATE(:date, '%d/%m/%Y'),:usn,  :blog)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'content' => $comments->getcontent(),
            'date' => $comments->getdate(),
            'usn' => $comments->getuser(),
            'blog' => $comments->getblog()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showcomments($id)
    {
        $sql = "SELECT * from comments where id_comment = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comments = $query->fetch();
            return $comments;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatecomments($comments, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE comments SET 
                content = :content,
                date = :date, 
                user = :user, 
                blog = :blog
            WHERE id_comment = :idcomments'
        );

        // Convert the date format from "dd/mm/yyyy" to "yyyy-mm-dd" for MySQL
        $dateFormatted = date_format(date_create_from_format('d/m/Y', $comments->getdate()), 'Y-m-d');

        $query->execute([
            'idcomments' => $id,
            'content' => $comments->getcontent(),
            'date' => $dateFormatted, // Use the formatted date
            'user' => $comments->getuser(),
            'blog' => $comments->getblog()
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error updating comments: " . $e->getMessage();
    }
}

    function getbycontent($content) {
        $sql = "SELECT * from comments where content = :content";
        $db = config::getConnexion();
        try {
          $query = $db->prepare($sql);
          $query->execute([
            ':content' => $content
          ]);
    
          $admin = $query->fetch();
          return $admin;
        } catch (Exception $e) {
          die('Error: '. $e->getMessage());
        }
      }

      function getbyid($id) {
        $sql = "SELECT * from comments where id = :id";
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
