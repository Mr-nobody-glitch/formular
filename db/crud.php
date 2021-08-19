<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($name, $lastname, $date, $mail, $phone, $exp, $avtr_path)
    {
        try {
            //code...
            $sql = " INSERT INTO `client`( Firstname, Lastname, Dateofbirth, Email_address,Contact_number, Specialty_id, avtr_path) VALUES  (:name,:lastname,:date,:mail,:phone,:exp,:avtr_path)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':date', $date);
            $stmt->bindparam(':mail', $mail);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':exp', $exp);
            $stmt->bindparam(':avtr_path', $avtr_path);
            
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getmessage();
            return false;
        }
    }
    public function edit($id, $name, $lastname, $date, $mail, $phone, $exp)
    {
        try {
            $sql = "UPDATE `client` SET `Firstname`=:name,`Lastname`=:lastname,`Dateofbirth`=:date,`Email_address`=:mail,`Contact_number`=:phone,`Specialty_id`=:exp WHERE Client_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);

            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':date', $date);
            $stmt->bindparam(':mail', $mail);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':exp', $exp);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getmessage();
            return false;
        }
     
    }

    public function getattendees()
    {
        try {
            $sql = "SELECT * FROM `client`  a inner join specialties s on a.Specialty_id = s.Specialty_id";
            $result = $this->db->query($sql);
            return $result;
        }catch (PDOException $e) {
            //throw $th;
            echo $e->getmessage();
            return false;
        }
       
    }
    public function getattendeedetails($id)
    {
        try{
            $sql = "SELECT * FROM `client` a inner join specialties s on a.Specialty_id = s.Specialty_id  where Client_id =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
        catch (PDOException $e) {
            //throw $th;
            echo $e->getmessage();
            return false;
        }

    }
    public function delete($id){
        try{
            $sql="DELETE FROM `client` WHERE Client_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
    
        }
        catch (PDOException $e) {
            //throw $th;
            echo $e->getmessage();
            return false;
        }
     



    }
    public function getspec()
    {
        $sql = "SELECT * FROM `specialties` ";
        $result = $this->db->query($sql);
        return $result;
    }
}
