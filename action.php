<?php
require_once('connect.php');

$obj=new Database();
 $obj->read();
if(isset($_POST['action']) && ($_POST['action'])=="view"){
    

      $output='';
      $data= $obj->read();
      if($obj->totalrow()>0){
 $output.="<table class='table table-bordered' id='table'>
    <thead class='bg-secondary '>
      <tr class='text-center'>
  <th>Id</th>
  <th>Firstname</th>
  <th>Lastname</th>
  <th>Email</th>
  <th>phone</th>
  <th>Action</th>
      </tr>
    </thead>";
    foreach($data as $row){
      $id=$row['id'];
    $name=$row['first_name'];
      $lname=$row['last_name'];
      $email=$row['email'];
      $phone=$row['phone_number'];
      $output.="<tbody class='bg-info'>
      <tr class='bg-info text-center'>
        <td> $id</td>
        <td>$name</td>
        <td>$lname</td>
        <td>$email</td>
        <td>$phone</td>
        <td >
        <a href='#' class='mx-2 text-success showBtn  text-decoration-none'data-bs-toggle='modal' data-bs-target='#showmodal'  id='$id'><i class='fa-solid fa-exclamation '></i>  </a>
       <a href='#' class='mx-2 text-info editBtn  text-decoration-none'data-bs-toggle='modal' data-bs-target='#updatemodal'  id='$id'><i class='fa-solid fa-pen-to-square '></i>  </a>
       <a href='#' class='mx-2 text-danger delBtn  text-decoration-none' data-bs-toggle='modal' data-bs-target='#deletemodal' id='$id'><i class='fa-solid fa-trash' ></i> </a>
        </td>
      </tr>";
    }
    $output.="</tbody></table>";
    
    echo $output;
}
else{
    echo"<div><h1>Till now no user present here please add user</h1></div>";
}
}
if(isset($_POST['action']) && ($_POST['action'])=="insert"){
     
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $obj->inserdata($fname,$lname,$email,$phone);
      
}
if(isset($_POST['edit_id'])){
      $id=$_POST['edit_id'];
    $row=$obj->getid($id);
   echo json_encode($row);

}
if(isset($_POST['action']) && $_POST['action']=="update"){
      $id=$_POST['id'];
     $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $obj->update($id,$fname,$lname,$email,$phone);


}
if(isset($_POST['del_id'])){
$id=$_POST['del_id'];
$obj->delete($id);
}
if(isset($_POST['show_id'])){
  $id=$_POST['show_id'];
  $row=$obj->getid($id);
  echo json_encode($row);
}
?>