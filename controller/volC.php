<?php
include 'database_configuration.php';



class volC{

    public function listVol($sortOption = 'mostRecent') 
    {
        $sql = "SELECT * FROM flight";

        switch ($sortOption) {
            case 'mostRecent':
                $sql .= " ORDER BY check_in DESC";
                break;
            case 'leastRecent':
                $sql .= " ORDER BY check_in ASC";
                break;
            case 'alphabetically':
                $sql .= " ORDER BY company ASC";
                break;
            case 'mostExpencive':
                    $sql .= " ORDER BY amount ASC";
                break;
            default:
                $sql .= " ORDER BY check_in DESC";
                break;
        }

        $db = database_configuration::getConnexion();
        try 
        {
            $stmt = $db->prepare($sql); //stmt == statement
            $stmt->execute();

            // Fetch the results
            $flight = $stmt->fetchAll();
            return $flight;
        } 
        catch (Exception $e) 
        {
            die('Erreur : ' . $e->getMessage());
        }
    }


    public function fetchVolById($id)
    {
        $db = database_configuration::getConnexion();
        $sql = "SELECT * FROM flight WHERE id = :id";
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            if ($req->rowCount() > 0) {
                return $req->fetch(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function afficher_vols()
    {
        $flight = $this->listVol();
        echo '<html>
                <body>
                    <table border="1" width="100%">
                        <tr>
                            <th>company</th>
                            <th>departure_city</th>
                            <th>destination_city</th>
                            <th>check_in</th>
                            <th>check out </th>
                            <th> adults  </th>
                            <th> children </th>
                            <th> amount  </th>
                            <th> id </th>
                        </tr>';
        foreach ($flight as $f) {
            echo '<tr>
                        <td>' . $f['company'] . '</td>
                        <td>' . $f['departure_city'] . '</td>
                        <td>' . $f['destination_city'] . '</td>
                        <td>' . $f['check_in'] . '</td>
                        <td>' . $f['check_out'] . '</td>
                        <td>' . $f['adults_1'] . '</td>
                        <td>' . $f['children_1'] . '</td>
                        <td>' . $f['amount'] . '</td>
                        <td>' . $f['id'] . '</td>
                  </tr>';
                        
                
        }
        echo '</table></body></html>';
    }


    function ajouter_Vol()
    {
        $db = database_configuration::getConnexion();
        $sql = "INSERT INTO flight (company, departure_city, destination_city, check_in, check_out, adults_1 , children_1 , amount , id ) VALUES (:company, :departure_city, :destination_city, :check_in, :check_out, :adults_1 , :children_1 , :amount , :id)";
        $req = $db->prepare($sql);
        $req->bindValue(':company', $_POST['company']);
        $req->bindValue(':departure_city', $_POST['departure_city']);
        $req->bindValue(':destination_city', $_POST['destination_city']);
        $req->bindValue(':check_in', $_POST['check_in']);
        $req->bindValue(':check_out', $_POST['check_out']);
        $req->bindValue(':adults_1', $_POST['adults_1']);
        $req->bindValue(':children_1', $_POST['children_1']);
        $req->bindValue(':amount', $_POST['amount']);
        $req->bindValue(':id', $_POST['id']);
        $req->execute();
       
    }

    function modifier_vol($Vol){
        $conn = config::getConnexion();
        
        $sql = 'UPDATE  flight SET company = : company  ,
                    departure_city = : departure_city,
                     destination_city = : destination_city ,
                     check_in = :check_in ,
                     check_out = : check_out  ,
                     adults_1 = : adult_1 , 
                     children_1 = : children_1 ,
                     amount :=amount,
                     id := id     WHERE  id:=id'  ; 
         try {
            $req = $conn->prepare($sql);
            $req->bindValue(':company',$Vol->getCompany());
            $req->bindValue(':departure_city',$Vol->getDeparture_city());
            $req->bindValue(':destination',$Vol->getDestination());
            $req->bindValue(':check_in',$Vol->getCheck_in());
            $req->bindValue(':check_out',$Vol->getCheck_out());
            $req->bindValue(':adults_1',$Vol->getAdults_1());
            $req->bindValue(':Children_1',$Vol->getChildren_1());
            $req->bindValue(':amount',$Vol->getAmount());
            $req->bindValue(':id',$Vol->getId());
            
        
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }


   public function supprimer_Vol_by_id($id){
        $conn = config::getConnexion();
        $sql = "DELETE FROM flight WHERE id=:id";

        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
 
}

    function getAllCon(){
        $conn = config::getConnexion();
        $sql = "SELECT * FROM flight";

        try {
            $result=$conn->query($sql);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
            if(!empty($rows)){
                return $rows[0];
            }
            
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
    function deleteVol($id){
        $conn = config::getConnexion();
        $sql = "DELETE FROM flight WHERE id=:id";

        try {
            $req = $conn->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (PDOException $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

   

 function rechercher($input,$colonne) {
        if($colonne == "all") 
        {        $sql = "SELECT * from flight WHERE ( company LIKE \"%$input%\") OR ( destination LIKE \"%$input%\") OR ( Departure_city LIKE \"%$input%\") ";
       } else {
   $sql = "SELECT * from flight WHERE ( $colonne LIKE \"%$input%\")  "; }
   $db = config::getConnexion();
   try { $liste=$db->query($sql); 
    

       return $liste;
   }
   catch (PDOException $e) {
    die('Erreur: '.$e->getMessage());
   }
}




?>