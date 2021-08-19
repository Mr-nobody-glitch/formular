<?php  
class user{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function insertuser($username,$pswrd){
        try {
            //code..
            $result = $this->getuserbyusername($username);
            if($result['num'] > 0){
                return false;
            }else{
                $new_password = md5($pswrd.$username);
                $sql = " INSERT INTO `users`( username, pswrd) VALUES  (:username,:pswrd)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':pswrd', $new_password);
                //exe statements
                $stmt->execute();
                return true;
            }
           
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getmessage();
            return false;
        }

    }
    public function getuser($username,$pswrd){
        try{
            $sql = "SELECT * FROM `users` where username = :username and pswrd = :pswrd ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':pswrd', $pswrd);
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
    public function getuserbyusername($username){
        try{
            $sql = "SELECT count(*) as num FROM `users` where username = :username  ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
        
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
}
