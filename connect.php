<?php
class Database {
     private $dbn="mysql:host=localhost;dbname=company";
     private $user='root';
     private $pass='';
     public $conn;
     public function __construct()
     {
      try{
      $this->conn=new PDO($this->dbn,$this->user,$this->pass);
      // echo "successfully connected";
        }  
        catch(PDOException $e){
            echo $e->getMessage();
        }
      }
      public function inserdata($fname,$lname,$email,$phone){
$insert ="INSERT into users (first_name,last_name,email,phone_number) values(:fname,:lname,:email,:phone)";
$stmt=$this->conn->prepare($insert);
$stmt->execute(['fname'=>$fname,'lname'=>$lname,'email'=>$email,'phone'=>$phone]);
return true;
      }
      public function read(){
            $data=array();
            $select="SELECT * from users";
            $stmt=$this->conn->prepare($select);
            $stmt->execute();
            $fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($fetch as $row){
            $data[]=$row;
            }
            return $data;
      }
      public function getid($id){
    $select ="SELECT * from users where id=:id";
    $stmt=$this->conn->prepare($select);
    $stmt->execute(['id'=>$id]);
   $result= $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
      }

      public function update($id,$fname,$lname,$email,$phone){
            $update="UPDATE users set first_name=:fname,last_name=:lname,email=:email,phone_number=:phone where id=:id ";
            $stmt=$this->conn->prepare($update);
            $stmt->execute(['id'=>$id,'fname'=>$fname,'lname'=>$lname,'email'=>$email,'phone'=>$phone]);
return true;
      }
public function delete($id){
$delete="DELETE from users where id=:id";
$stmt=$this->conn->prepare($delete);
$stmt->execute(['id'=>$id]);
return true;
}
public function totalrow(){
      $select="SELECT * from users";
      $stmt=$this->conn->prepare($select);
      $stmt->execute();
      $row_count=$stmt->rowCount();
      return $row_count;

}

      
        
}


?>